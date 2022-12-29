$(document).ready(function() {

    filter_data();

    function filter_data() {
        var action = 'fetch_data2';
        var brand = get_filter('brand');
        var type = get_filter1('type');
        var pages = get_filter1('pages');
        var total = get_filter1('total');
        var url = get_filter1('url');
        $.ajax({
            url: "fetch_data2.php",
            method: "POST",
            data: {
                action: action,
                brand: brand,
                type: type,
                pages: pages,
                total: total,
                url: url
            },
            success: function(data) {
                $('.filter_data2').html(data);
            }
        });

    }

    function get_filter1(class_name) {
        var filter = [];
        $('.' + class_name).each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function() {
        filter_data();
    });

});