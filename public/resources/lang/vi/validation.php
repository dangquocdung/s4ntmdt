<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'The :attribute must be a date after :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => 'The :attribute confirmation does not match.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'filled'               => 'The :attribute field is required.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => 'The :attribute field is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],
    'whoops' =>'Rất tiếc!',
    'input_error' =>'Có một số vấn đề với đầu vào của bạn.',
    'billing_fill_first_name_field' =>'vui lòng điền vào trường Tên hóa đơn',
    'shipping_fill_first_name_field' =>'vui lòng điền vào tên trường vận chuyển',
    'billing_fill_last_name_field' =>'vui lòng điền vào trường Tên hóa đơn',
    'billing_fill_phone_number_field' =>'vui lòng điền vào trường Số điện thoại',
    'shipping_fill_last_name_field' =>'vui lòng điền vào trường Tên cuối cùng',
    'billing_fill_email_field' =>'vui lòng điền vào trường Email thanh toán',
    'shipping_fill_email_field' =>'vui lòng điền vào trường Email vận chuyển',
    'billing_fill_valid_email_field' =>'vui lòng điền Email hợp lệ vào trường thanh toán',
    'shipping_fill_valid_email_field' =>'vui lòng điền Email hợp lệ vào trường vận chuyển',
    'billing_country_name_field' =>'Vui lòng chọn trường Tên quốc gia thanh toán',
    'shipping_country_name_field' =>'vui lòng chọn vận chuyển trường Tên quốc gia',
    'billing_address_line_1_field' =>'vui lòng điền vào địa chỉ dòng 1 thanh toán',
    'shipping_address_line_1_field' =>'vui lòng điền vào địa chỉ giao hàng Dòng 1',
    'billing_fill_town_city_field' =>'vui lòng điền vào thanh toán trường Thành phố hoặc Thành phố',
    'shipping_fill_town_city_field' =>'vui lòng điền vào trường vận chuyển Thành phố hoặc Thành phố',
    'billing_fill_zip_postal_field' =>'vui lòng điền vào trường Zip hoặc mã bưu điện',
    'shipping_fill_zip_postal_field' =>'vui lòng điền vào vận chuyển Zip hoặc trường Mã bưu điện',
    'shipping_fill_phone_number_field' =>'vui lòng điền vào trường Số điện thoại vận chuyển',
    'fill_payment_gateway' =>'vui lòng chọn Cổng thanh toán',
    'stripe_required_msg' =>'Khóa mã thông báo sọc cần tiếp tục quá trình',
    'twocheckout_required_msg' =>'Key Khóa mã thông báo TwoCheckout cần tiếp tục quá trình',
    'display_name_required' =>'Vui lòng điền vào trường Tên hiển thị',
    'user_name_required' =>'Vui lòng điền vào trường Tên người dùng',
    'user_name_unique' =>'Trường tên người dùng là duy nhất, hãy thử với một tên khác',
    'email_required' =>'Vui lòng điền vào trường Địa chỉ Email',
    'email_unique' =>'Trường địa chỉ email là duy nhất, hãy thử với một địa chỉ khác',
    'email_is_email' =>'Vui lòng điền địa chỉ email chính xác',
    'password_required' =>'Vui lòng điền vào trường Mật khẩu',
    'password_confirmation_required' =>'Vui lòng điền vào trường Xác nhận mật khẩu',
    'secret_key_required' =>'Vui lòng điền vào trường Khóa bí mật',
    'g_recaptcha_response_required' =>'Vui lòng quản lý phản hồi recaptcha',
    'new_password_required' =>'Vui lòng điền vào trường Mật khẩu mới',
    'account_bill_first_name' =>'Vui lòng điền vào trường Tên hóa đơn',
    'account_bill_last_name' =>'Vui lòng điền vào trường Tên hóa đơn',
    'account_bill_phone_number_name' =>'Vui lòng điền vào trường Số điện thoại thanh toán',
    'account_bill_select_country' =>'Vui lòng chọn trường Tên quốc gia',
    'account_bill_adddress_line_1' =>'Vui lòng điền vào dòng Địa chỉ 1',
    'account_shipping_first_name' =>'Vui lòng điền vào trường Tên vận chuyển',
    'account_shipping_last_name' =>'Vui lòng điền vào trường Tên vận chuyển',
    'account_bill_email_address' =>'vui lòng điền vào trường Email thanh toán',
    'account_bill_email_address_is_email' =>'Vui lòng điền vào trường Email thanh toán với địa chỉ email chính xác',
    'account_bill_select_country' =>'vui lòng chọn trường Tên quốc gia thanh toán',
    'account_bill_adddress_line_1' =>'vui lòng điền vào trường Địa chỉ thanh toán 1',
    'account_bill_town_or_city' =>'vui lòng điền vào trường Billing Town hoặc City',
    'account_bill_zip_or_postal_code' =>'vui lòng điền vào Zip Zip hoặc trường Mã bưu điện',
    'account_shipping_email_address' =>'vui lòng điền vào trường Email vận chuyển',
    'account_shipping_email_address_is_email' =>'Vui lòng điền vào trường Email vận chuyển với địa chỉ email chính xác',
    'account_shipping_select_country' =>'vui lòng chọn trường Tên quốc gia vận chuyển',
    'account_shipping_adddress_line_1' =>'vui lòng điền vào địa chỉ Giao hàng Dòng 1',
    'account_shipping_town_or_city' =>'vui lòng điền vào vận chuyển Thành phố hoặc thành phố',
    'account_shipping_zip_or_postal_code' =>'vui lòng điền vào Zip vận chuyển hoặc trường Mã bưu điện',
    'account_shipping_phone_number_name' =>'Vui lòng điền vào trường Số điện thoại vận chuyển',
    'select_rating' =>'vui lòng chọn xếp hạng',
    'write_review' =>'Hãy viết đánh giá của bạn',
    'coupon_removed_from_cart_msg' =>'Phiếu giảm giá đã bị xóa khỏi giỏ hàng vì một số điều kiện sai',
    'vendor_reg_store_name' =>'vui lòng điền tên cửa hàng',
    'vendor_reg_address_line_1' =>'vui lòng điền vào Dòng địa chỉ 1',
    'vendor_reg_city' =>'vui lòng điền vào Thành phố',
    'vendor_reg_state' =>'vui lòng điền vào tiểu bang',
    'vendor_reg_country' =>'vui lòng điền quốc gia',
    'vendor_reg_zip_code' =>'vui lòng điền mã Zip',
    'vendor_reg_phone_number' =>'vui lòng điền số điện thoại',
    'vendor_reg_secret_key' =>'vui lòng điền Khóa bí mật',
    't_and_c' =>'vui lòng đọc Điều khoản và Điều kiện và chọn',
    'all_vendor_max_products' =>'vui lòng nhập số lượng sản phẩm tối đa',
    'vendor_expired_type' =>'Vui lòng chọn loại nhà cung cấp đã hết hạn',
    'vendor_commission' =>'Vui lòng nhập hoa hồng nhà cung cấp',
    'payment_options' =>'Vui lòng chọn tùy chọn rút tiền thanh toán của nhà cung cấp',
    'package_type' =>'Vui lòng chọn loại gói',
    'vendor_custom_expired_date' =>'Vui lòng nhập ngày hết hạn tùy chỉnh',
    'vendor_package_type_unique_msg' =>'Loại gói đã cho của bạn đã được sử dụng.',
    'select_vendor_payment_type_msg' =>'Chọn phương thức thanh toán',
    'select_vendor_payment_method_msg' =>'Chọn phương thức thanh toán',
    'enter_single_payment_custom_value' =>'Vui lòng nhập giá trị tùy chỉnh thanh toán duy nhất'
];
