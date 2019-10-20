$('.product-reviews-content .rating-select .btn').on('mouseover', function() {
    $(this).removeClass('btn-light').addClass('btn-warning');
    $(this).prevAll().removeClass('btn-light').addClass('btn-warning');
    $(this).nextAll().removeClass('btn-warning').addClass('btn-light');
});

$('.product-reviews-content .rating-select').on('mouseleave', function() {
    active = $(this).parent().find('.selected');
    if (active.length) {
        active.removeClass('btn-light').addClass('btn-warning');
        active.prevAll().removeClass('btn-light').addClass('btn-warning');
        active.nextAll().removeClass('btn-warning').addClass('btn-light');
    } else {
        $(this).find('.btn').removeClass('btn-warning').addClass('btn-light');
    }
});

$('.product-reviews-content .rating-select .btn').click(function() {
    if ($(this).hasClass('selected')) {
        $('.product-reviews-content .rating-select .selected').removeClass('selected');
    } else {
        $('.product-reviews-content .rating-select .selected').removeClass('selected');
        $(this).addClass('selected');

        if ($('.product-reviews-content #selected_rating_value').length > 0) {
            $('.product-reviews-content #selected_rating_value').val($(this).data('rating_value'));
        }
    }
});
