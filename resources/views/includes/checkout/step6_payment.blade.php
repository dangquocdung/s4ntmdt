@section('payment')
 <!-- Payment -->
 @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
<div id="payment" class="step well">

    <h4>{!! trans('frontend.choose_payment') !!}</h4>

    @if($payment_method_data['payment_option']['enable_payment_method'] == 'yes' && ($payment_method_data['bacs']['enable_option'] == 'yes' || $payment_method_data['cod']['enable_option'] == 'yes' || $payment_method_data['paypal']['enable_option'] == 'yes' || $payment_method_data['stripe']['enable_option'] == 'yes'))
        <div class="payment-options">

            <div class="table-responsive">
                <table class="table table-hover"> 
                    <tbody>  

                        @if($payment_method_data['cod']['enable_option'] == 'yes')
                            <tr>
                                <td class="align-middle">
                                    <input type="radio" class="shopist-iCheck" name="payment_option" value="cod"> 
                                </td>
                                <td class="align-middle">
                                    <span class="text-gray-dark">{{ $payment_method_data['cod']['method_title'] }}</span><br>
                                    <span class="text-muted text-sm">{!! $payment_method_data['cod']['method_description'] !!}</span>
                                </td>
                            </tr>
                        @endif

                        @if($payment_method_data['bacs']['enable_option'] == 'yes')
                            <tr>
                                <td class="align-middle">
                                    <input type="radio" class="shopist-iCheck" name="payment_option" value="bacs"> 
                                </td>
                                <td class="align-middle">
                                    <span class="text-gray-dark">{{ $payment_method_data['bacs']['method_title'] }}</span><br>
                                    <span class="text-muted text-sm"><small>{!! $payment_method_data['bacs']['method_description'] !!}</small></span><br>
                                    <ul>
                                        <li class="text-gray-dark">Tên tài khoản:&nbsp;<strong>{{ $payment_method_data['bacs']['account_details']['account_name'] }}</strong></li>
                                        <li class="text-gray-dark">Số tài khoản:&nbsp;<strong>{{ $payment_method_data['bacs']['account_details']['account_number'] }}</strong></li>
                                        <li class="text-gray-dark">Tên ngân hàng:&nbsp;<strong>{{ $payment_method_data['bacs']['account_details']['bank_name'] }}</strong></li>
                                        <li class="text-gray-dark">Chi nhánh:&nbsp;<strong>{{ $payment_method_data['bacs']['account_details']['short_code'] }}</strong></li>
                                        <li class="text-gray-dark">Mã IBAN:&nbsp;<strong>{{ $payment_method_data['bacs']['account_details']['iban'] }}</strong></li>
                                        <li class="text-gray-dark">Mã SWIFT:&nbsp;<strong>{{ $payment_method_data['bacs']['account_details']['swift'] }}</strong></li>
                                    </ul>
                                </td>
                            </tr>
                        
                        @endif
        
        
                        @if($payment_method_data['paypal']['enable_option'] == 'yes')
                        <tr>
                            <td class="align-middle">
                                <input type="radio" class="shopist-iCheck" name="payment_option" value="paypal"> 
                            </td>
                            <td class="align-middle">
                                <span class="text-gray-dark">{{ $payment_method_data['paypal']['method_title'] }}</span><br>
                                <span class="text-muted text-sm">{!! $payment_method_data['paypal']['method_description'] !!}</span>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
    
            </div>
    
        </div>
    @else
        <p>{{ trans('frontend.checkout_payment_method_label') }}</p>
    @endif
</div>
@endif
    
@endsection
