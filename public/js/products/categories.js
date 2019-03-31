$(document).ready(function () {
    $.ajax({
        url: '/api/categories',
        success: function (result) {
            var data = result.data;
            $.each(data, function(index, value) {
                var str = '<option value="' + value.id + '">' + value.attributes.name + '</option>'
                $("#category-filter").append(str);
            });
        }
    });
});

