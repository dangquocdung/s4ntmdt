$(document).ready(function() {

    $('.product-wishlist').on('click', function(e) {
        e.preventDefault();
        shopist_frontend.ajaxCall.setUserWishlistDetails($(this).data('id'));
        // alert($(this).data('id'));
    })

    var shopist_frontend = shopist_frontend || {};

    shopist_frontend.ajaxCall = {

        setUserWishlistDetails: function(data) {

            alert("thanh cong");

            $.ajax({
                url: $('#hf_base_url').val() + '/ajax/user-wishlist-data-process',
                type: 'POST',
                cache: false,
                dataType: 'json',
                data: { data: data },
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function(data) {
                    if (data.status == 'success' && data.notice_type == 'user_wishlist_saved') {

                        swal({
                                title: '',
                                text: frontendLocalizationString.wishlist_data_saved_msg,
                                showCancelButton: true,
                                cancelButtonText: frontendLocalizationString.continue_label,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: frontendLocalizationString.wishlist_items_label,
                                closeOnConfirm: false,
                                imageUrl: $('#hf_base_url').val() + '/images/thumbs-up.jpg'
                            },
                            function() {
                                location.href = $('#hf_base_url').val() + '/user/account/my-saved-items';
                            });
                    } else if (data.status == 'error' && data.notice_type == 'user_login_required') {
                        swal({
                            title: '',
                            text: frontendLocalizationString.login_for_wishlist_msg,
                            type: 'warning'
                        });
                    } else if (data.status == 'error' && data.notice_type == 'item_already_exists') {
                        swal({
                                title: '',
                                text: frontendLocalizationString.already_item_in_wishlist_msg,
                                showCancelButton: true,
                                cancelButtonText: frontendLocalizationString.continue_label,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: frontendLocalizationString.wishlist_items_label,
                                closeOnConfirm: false,
                                type: 'warning'
                            },
                            function() {
                                location.href = $('#hf_base_url').val() + '/user/account/my-saved-items';
                            });
                    }
                },
                error: function() {}
            });
        },

    }

})