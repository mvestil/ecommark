$(document).ready(function () {
    initPaginationClicks();
    initApplyFilter();
    fetchProducts();
});

function fetchProducts(url = null) {
    var getUrl = url ? url : "/api/products";
    getUrl = appendToUrl(getUrl, extractFilters());

    renderList(false);
    renderSpinner(true);

    $.ajax({
        url: getUrl,
        success: function (result) {
            if (result.data === undefined) {
                renderSpinner(false);
                renderList(true);
                return;
            }

            $(".listing").html('');

            buildProduct(result);
            setUpPaginationLinks(result);
            renderSpinner(false);
            renderList(true);
        }
    });
}

function buildProduct(result) {
    var data = result.data;
    $.each(data, function (index, value) {
        var productHtml = '<div class="my-list">' +
            '<div class="product-image"><a href="/products/' + value.id+ '"><img src="' + value.attributes.main_pic_url + '"/></a></div>' +
            '<h3 class="product-name">' + value.attributes.name + '</h3>' +
            '<span>Price: ' + value.attributes.price + ' SGD</span>' +
            '<span class="float-right">SKU: ' + value.attributes.sku + '</span>' +
            '<div class="offer">' + value.attributes.description + '</div>' +
            '</div>';
        var blockHtml = '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">' + productHtml + '</div>';

        $(".listing:hidden").append(blockHtml);
    });
}

function renderList(shouldShow) {
    var listing = $(".listing");

    shouldShow ? listing.show() : listing.hide();
}

function renderSpinner(shouldShow) {
    var spinner = $(".spinner");

    shouldShow ? spinner.show() : spinner.hide();
}

function setUpPaginationLinks(result) {
    if (result.links.next) {
        $(".next").attr("url", result.links.next)
            .removeClass('disabled')
            .find(".page-link")
            .prop('disabled', false);
    } else {
        $(".next").attr("url", null)
            .addClass('disabled')
            .find(".page-link")
            .prop('disabled', true);
    }

    if (result.links.prev) {
        $(".previous").attr("url", result.links.prev)
            .removeClass('disabled')
            .find(".page-link")
            .prop('disabled', false);
    } else {
        $(".previous").attr("url", null)
            .addClass('disabled')
            .find(".page-link")
            .prop('disabled', true);
    }
}

function initPaginationClicks() {
    $(".page-item").on("click", function () {
        var pageUrl = $(this).attr("url");

        if (pageUrl) {
            fetchProducts(pageUrl);
        }
    });
}

function initApplyFilter()
{
    $(".apply-filter").on("click", function () {
        fetchProducts(null, extractFilters());
    });
}
function extractFilters() {
    var filters = {};

    if ($('#sold-out-filter:checked').length) {
        filters['sold_out'] = 1
    }

    var categoryFilter = $("#category-filter");
    if (categoryFilter.val() !== "0") {
        filters['category_id'] = categoryFilter.val();
    }

    var sortByFilter = $("#sort-by-filter");
    if (sortByFilter.val()) {
        filters['sort_by'] = sortByFilter.val();
    }

    var sortOrderFilter = $("#sort-order-filter");
    if (sortOrderFilter.val()) {
        filters['sort_order'] = sortOrderFilter.val();
    }

    var priceFromLiter = $("#price-from-filter");
    if (priceFromLiter.val()) {
        filters['price_from'] = priceFromLiter.val();
    }

    var priceToFilter = $("#price-to-filter");
    if (priceToFilter.val()) {
        filters['price_to'] = priceToFilter.val();
    }

    console.log(filters);

    return filters;
}

function appendToUrl(url, paramsToAppend)
{
    $.each(paramsToAppend, function(index, value) {
        console.log(index)
        console.log(value)
        url = queryParameterize(url, index, value)
    });

    return url;
}

function queryParameterize(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
        return uri + separator + key + "=" + value;
    }
}