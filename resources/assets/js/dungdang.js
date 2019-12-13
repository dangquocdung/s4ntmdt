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

$('#share-content>a').on('click', function(e){

    e.preventDefault();
    var share_url = null;
    var window_url = null;
    var product_url = null;
    
    product_url = window.location.href;

    if($(this).data('name') == 'fb'){
        share_url = '//www.facebook.com/sharer.php?u=';
    }
    else if($(this).data('name') == 'tweet'){
        share_url = '//twitter.com/share?text=' + encodeURI($('#product_title').val()) + '&url=';
    }
    else if($(this).data('name') == 'gplus'){
        share_url = '//plus.google.com/share?url=';
    }
    else if($(this).data('name') == 'pi'){
        share_url = '//pinterest.com/pin/create/button/?media=' + $('#product_img').val() + '&description=' + encodeURI($('#product_title').val()) + '&url=';
    }
    else if($(this).data('name') == 'lin'){
        share_url = '//www.linkedin.com/shareArticle?mini=true&url=';
    }

    if($(this).data('name') == 'fb' || $(this).data('name') == 'tweet' || $(this).data('name') == 'gplus' || $(this).data('name') == 'pi' || $(this).data('name') == 'lin'){
        window_url = share_url + product_url;
        window.open(window_url, "_blank", "scrollbars=yes, resizable=yes, toolbar=yes, top=50, left=50, width=500, height=500");
    }
    else if($(this).data('name') == 'print'){
        window.print();
    }
    
});
