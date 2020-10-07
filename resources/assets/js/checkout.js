/*scroll to top*/
$(document).ready(function() {
    
    //checkout multistep
    var current = 1;
    var is_enable_selected = false;

    widget = $("#checkout_page .step");
    btnnext = $("#checkout_page .next");
    btnsubmit = $("#checkout_page .submit");

    // Init buttons and UI
    widget.not(':eq(0)').hide();
    hideButtons(current);
    setProgress(current);

    // Next button click action
    btnnext.click(function(e) {
        e.preventDefault();

        if (checkoutStepValidation()) {
            if (current < widget.length) {
                widget.show();
                //alert($('#checkout_page .checkout-content').find('#guest_user_address').index());
                if ($('#selected_user_mode').val().length > 0 && $('#selected_user_mode').val() == 'login_user' && !is_enable_selected && $('#is_user_login').val() == false) {
                    var get_authentication_index = parseInt($('#checkout_page .checkout-content').find('#authentication').index()) - 1;

                    widget.not(':eq(' + get_authentication_index + ')').hide();
                    is_enable_selected = true;
                } else if ($('#selected_user_mode').val().length > 0 && $('#selected_user_mode').val() == 'login_user' && !is_enable_selected && $('#is_user_login').val() == true) {
                    var get_login_user_address_index = parseInt($('#checkout_page .checkout-content').find('#login_user_address').index()) - 1;
                    var get_payment_index = parseInt($('#checkout_page .checkout-content').find('#payment').index()) - 1;

                    widget.not(':eq(' + get_login_user_address_index + ')').hide();
                    is_enable_selected = true;
                    current = get_payment_index;
                } else if ($('#selected_user_mode').val().length > 0 && $('#selected_user_mode').val() == 'guest' && !is_enable_selected) {
                    var get_guest_user_address_index = parseInt($('#checkout_page .checkout-content').find('#guest_user_address').index()) - 1;
                    var get_payment_index = parseInt($('#checkout_page .checkout-content').find('#payment').index()) - 1;

                    widget.not(':eq(' + get_guest_user_address_index + ')').hide();
                    is_enable_selected = true;
                    current = get_payment_index;
                } else {
                    widget.not(':eq(' + (current++) + ')').hide();
                }

                setProgress(current);
            }

            hideButtons(current);
        }
    })

    if ($('#apply_coupon_post').length > 0) {
        $('#apply_coupon_post').on('click', function(e) {
            e.preventDefault();

            if ($('#apply_coupon_code').val().length == 0 && $('#apply_coupon_code').val() == '') {
                $('#apply_coupon_code').css({ 'border': '1px solid #f06953' });
                return false
            } else {
                $('#apply_coupon_code').css({ 'border': '1px solid #cccccc' });
                shopist_frontend.ajaxCall.applyCoupon($('#apply_coupon_code').val());
            }
        });
    }

    if ($('#checkout_page #user_mode .checkout-process-user-mode').length > 0) {

        $('#selected_user_mode').val('guest');

        $('#checkout_page #user_mode .checkout-process-user-mode input[type="radio"]').on('ifClicked', function(event) {
            $('#selected_user_mode').val(this.value);
        });
    }

    if ($('#account_bill_phone_number').length > 0 || $('#account_shipping_phone_number').length > 0 || $('#account_bill_zip_or_postal_code').length > 0 || $('#account_shipping_zip_or_postal_code').length > 0 || $('#account_bill_fax_number').length > 0 || $('#account_shipping_fax_number').length > 0) {
        $("#account_bill_phone_number, #account_shipping_phone_number, #account_bill_zip_or_postal_code, #account_shipping_zip_or_postal_code, #account_bill_fax_number, #account_shipping_fax_number").ForceNumericOnly();
    }
    
    if ($('#different_shipping_address').length > 0) {
        $('#different_shipping_address').on('ifChecked', function(event) {
            $('.different-shipping-address').show();
        });
        $('#different_shipping_address').on('ifUnchecked', function(event) {
            $('.different-shipping-address').hide();
        });
    }

});

function checkoutStepValidation() {
    var returnVal = true;
    var visible_step = $('#checkout_page .checkout-content .step:visible');
    var msgStr = '<div class="alert alert-danger alert-dismissible fade show text-center margin-bottom-1x"><span class="alert-close" data-dismiss="alert"></span><i class="icon-alert-triangle"></i>&nbsp;&nbsp;<strong>';
    msgStr += frontendLocalizationString.error_message_text + ' </strong><span class="error-msg"></span></div>';

    var emailMsg = '';

    removeERRORMessageFromChekoutStep();

    if (visible_step.attr('id') && visible_step.attr('id') == 'user_mode') {
        if ($('#selected_user_mode').val().length == 0) {
            $('#' + visible_step.attr('id')).find('.checkout-process-user-mode').before(msgStr);
            $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.user_mode_select_msg);
            returnVal = false;
        }
    } else if (visible_step.attr('id') && visible_step.attr('id') == 'guest_user_address') {
        var errorStr = [];
        var isChecked = $("#different_shipping_address").prop("checked");

        if ($('#account_bill_first_name').length > 0 && $('#account_bill_first_name').val().length == 0 && $('#account_bill_first_name').val() == '') {
            errorStr.push('no_account_bill_first_name');
        }

        if (isChecked && $('#account_shipping_first_name').length > 0 && $('#account_shipping_first_name').val().length == 0 && $('#account_shipping_first_name').val() == '') {
            errorStr.push('no_account_shipping_first_name');
        }

        if ($('#account_bill_last_name').length > 0 && $('#account_bill_last_name').val().length == 0 && $('#account_bill_last_name').val() == '') {
            errorStr.push('no_account_bill_last_name');
        }

        if (isChecked && $('#account_shipping_last_name').length > 0 && $('#account_shipping_last_name').val().length == 0 && $('#account_shipping_last_name').val() == '') {
            errorStr.push('no_account_shipping_last_name');
        }

        if ($('#account_bill_email_address').length > 0 && $('#account_bill_email_address').val().length == 0 && $('#account_bill_email_address').val() == '') {
            errorStr.push('no_account_bill_email_address');
        }

        if (isChecked && $('#account_shipping_email_address').length > 0 && $('#account_shipping_email_address').val().length == 0 && $('#account_shipping_email_address').val() == '') {
            errorStr.push('no_account_shipping_email_address');
        }

        if ($('#account_bill_phone_number').length > 0 && $('#account_bill_phone_number').val().length == 0 && $('#account_bill_phone_number').val() == '') {
            errorStr.push('no_account_bill_phone_number');
        }

        if (isChecked && $('#account_shipping_phone_number').length > 0 && $('#account_shipping_phone_number').val().length == 0 && $('#account_shipping_phone_number').val() == '') {
            errorStr.push('no_account_shipping_phone_number');
        }

        var get_bill_country_name = '';
        var get_shipping_country_name = '';

        if ($('#account_bill_select_country').length > 0) {
            get_bill_country_name = $('#account_bill_select_country :selected').val();
        }

        if (isChecked && $('#account_shipping_select_country').length > 0) {
            get_shipping_country_name = $('#account_shipping_select_country :selected').val();
        }

        if (get_bill_country_name == '') {
            errorStr.push('no_account_bill_select_country');
        }

        if (isChecked && get_shipping_country_name == '') {
            errorStr.push('no_get_shipping_country_name');
        }

        if ($('#account_bill_address_line_1').length > 0 && $('#account_bill_address_line_1').val().length == 0 && $('#account_bill_address_line_1').val() == '') {
            errorStr.push('no_account_bill_address_line_1');
        }

        if (isChecked && $('#account_shipping_address_line_1').length > 0 && $('#account_shipping_address_line_1').val().length == 0 && $('#account_shipping_address_line_1').val() == '') {
            errorStr.push('no_account_shipping_address_line_1');
        }

        if ($('#account_bill_town_or_city').length > 0 && $('#account_bill_town_or_city').val().length == 0 && $('#account_bill_town_or_city').val() == '') {
            errorStr.push('no_account_bill_town_or_city');
        }

        if (isChecked && $('#account_shipping_town_or_city').length > 0 && $('#account_shipping_town_or_city').val().length == 0 && $('#account_shipping_town_or_city').val() == '') {
            errorStr.push('no_account_shipping_town_or_city');
        }

        if ($('#account_bill_zip_or_postal_code').length > 0 && $('#account_bill_zip_or_postal_code').val().length == 0 && $('#account_bill_zip_or_postal_code').val() == '') {
            errorStr.push('no_account_bill_zip_or_postal_code');
        }

        if (isChecked && $('#account_shipping_zip_or_postal_code').length > 0 && $('#account_shipping_zip_or_postal_code').val().length == 0 && $('#account_shipping_zip_or_postal_code').val() == '') {
            errorStr.push('no_account_shipping_zip_or_postal_code');
        }

        if ($('#account_bill_email_address').val().length > 0 && !isValidEmail($('#account_bill_email_address').val())) {
            emailMsg += '<p>' + frontendLocalizationString.billing_email_not_valid_msg + '</p>';
        }

        if (isChecked && $('#account_shipping_email_address').val().length > 0 && !isValidEmail($('#account_shipping_email_address').val())) {
            emailMsg += '<p>' + frontendLocalizationString.shipping_email_not_valid_msg + '</p>';
        }

        if (errorStr.length > 0) {
            $('#' + visible_step.attr('id')).find('.user-address-content').before(msgStr);
            $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.required_field_still_empty_msg);
            returnVal = false;
        }

        if (emailMsg && emailMsg != '') {
            $('#' + visible_step.attr('id')).find('.user-address-content').before(msgStr);
            $('#' + visible_step.attr('id')).find('.error-msg').html(emailMsg);
            returnVal = false;
        }
    } else if (visible_step.attr('id') && visible_step.attr('id') == 'payment') {
        if ($('#selected_payment_method').val().length == 0) {
            $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
            $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.select_payment_method_msg);
            returnVal = false;
        } else if ($('#selected_payment_method').val().length > 0 && $('#selected_payment_method').val() == 'stripe') {
            var errorStr = [];
            if ($('#email_address').val().length == 0) {
                errorStr.push('email_address');
            } else if ($('#card_number').val().length == 0) {
                errorStr.push('card_number');
            } else if ($('#card_cvc').val().length == 0) {
                errorStr.push('card_cvc');
            } else if ($('#card_expiry_month').val().length == 0) {
                errorStr.push('card_expiry_month');
            } else if ($('#card_expiry_year').val().length == 0) {
                errorStr.push('card_expiry_year');
            }

            if (errorStr.length > 0) {
                $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
                $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.required_field_still_empty_msg);
                returnVal = false;
            }

            if (errorStr.length == 0) {
                var parseStripeApiData = JSON.parse($('#stripe_api_key').val());
                if (parseStripeApiData.secret_key && parseStripeApiData.secret_key != null && parseStripeApiData.secret_key != '' && parseStripeApiData.publishable_key && parseStripeApiData.publishable_key != null && parseStripeApiData.publishable_key != '') {
                    Stripe.setPublishableKey(parseStripeApiData.publishable_key);
                    Stripe.createToken({
                        number: $('#card_number').val(),
                        cvc: $('#card_cvc').val(),
                        exp_month: $('#card_expiry_month').val(),
                        exp_year: $('#card_expiry_year').val()
                    }, stripeResponseHandler);

                    $('#checkout_page .action').addClass('loading');
                    returnVal = false;
                } else {
                    $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
                    $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.stripe_api_empty_msg);
                    returnVal = false;
                }
            }
        } else if ($('#selected_payment_method').val().length > 0 && $('#selected_payment_method').val() == '2checkout') {
            var errorStr = [];

            if ($('#2checkout_card_number').val().length == 0) {
                errorStr.push('card_number');
            } else if ($('#2checkout_card_cvc').val().length == 0) {
                errorStr.push('card_cvc');
            } else if ($('#2checkout_card_expiry_month').val().length == 0) {
                errorStr.push('card_expiry_month');
            } else if ($('#2checkout_card_expiry_year').val().length == 0) {
                errorStr.push('card_expiry_year');
            }

            if (errorStr.length > 0) {
                $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
                $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.required_field_still_empty_msg);
                returnVal = false;
            }

            if (errorStr.length == 0) {
                var parseTwoCheckoutApiData = JSON.parse($('#2checkout_api_data').val());
                if (parseTwoCheckoutApiData.sellerId && parseTwoCheckoutApiData.sellerId != null && parseTwoCheckoutApiData.sellerId != '' && parseTwoCheckoutApiData.publishableKey && parseTwoCheckoutApiData.publishableKey != null && parseTwoCheckoutApiData.publishableKey != '') {
                    var env = 'production';
                    if (parseTwoCheckoutApiData.sandbox_enable_option && parseTwoCheckoutApiData.sandbox_enable_option == 'yes') {
                        env = 'sandbox';
                    }

                    TCO.loadPubKey(env);
                    var args = {
                        sellerId: parseTwoCheckoutApiData.sellerId,
                        publishableKey: parseTwoCheckoutApiData.publishableKey,
                        ccNo: $("#2checkout_card_number").val(),
                        cvv: $("#2checkout_card_cvc").val(),
                        expMonth: $("#2checkout_card_expiry_month").val(),
                        expYear: $("#2checkout_card_expiry_year").val()
                    };

                    TCO.requestToken(twoCheckoutSuccessCallback, twoCheckoutErrorCallback, args);

                    $('#checkout_page .action').addClass('loading');
                    returnVal = false;
                } else {
                    $('#' + visible_step.attr('id')).find('.payment-options').before(msgStr);
                    $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.twocheckout_api_empty_msg);
                    returnVal = false;
                }
            }
        }
    } else if (visible_step.attr('id') && visible_step.attr('id') == 'authentication') {
        if ($('#is_user_login').val() == false) {
            $('#' + visible_step.attr('id')).find('.user-login-content').before(msgStr);
            $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.signup_signin_checkout_msg);
            returnVal = false;
        }
    } else if (visible_step.attr('id') && visible_step.attr('id') == 'login_user_address') {
        if ($('#is_login_user_address_exists').length == 0 && $('#is_login_user_address_exists').val() != 'address_added') {
            $('#' + visible_step.attr('id')).find('.user-address-content').before(msgStr);
            $('#' + visible_step.attr('id')).find('.error-msg').html(frontendLocalizationString.billing_shipping_error_msg);
            returnVal = false;
        }
    }

    return returnVal;
}

function removeERRORMessageFromChekoutStep() {
    if ($('#checkout_page .checkout-content').find('.error-msg').length > 0) {
        $('#checkout_page .checkout-content').find('.error-msg').parent('.alert-danger').remove();
    }
}