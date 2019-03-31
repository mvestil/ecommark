function fetchProduct(productId) {
    $.ajax({
        url: '/api/products/' + productId,
        success: function (result) {
            var data = result.data;
            console.log(result);

            $(".product-img-top").attr("src", data.attributes.main_pic_url);
            $(".product-title").html(data.attributes.name);
            $(".product-text").html(data.attributes.description);
            $(".price").html(data.attributes.price + ' SGD');
            $(".sku").html(data.attributes.sku);
            $(".stocks-available").html(data.attributes.stocks_available);

            $.each(result.included, function(index, value) {
                $(".category-item").append('<li class="list-group-item">' + value.attributes.name + '</li>');
            });

        }
    });
}