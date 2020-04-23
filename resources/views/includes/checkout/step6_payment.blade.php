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
                                    <span class="text-muted text-sm">{!! $payment_method_data['bacs']['method_description'] !!}</span><br>
                                    <span class="text-gray-dark"><strong>Tên tài khoản:&nbsp;</strong>{{ $payment_method_data['bacs']['account_details']['account_name'] }}</span><br>
                                    <span class="text-gray-dark"><strong>Số tài khoản:&nbsp;</strong>{{ $payment_method_data['bacs']['account_details']['account_number'] }}</span><br>
                                    <span class="text-gray-dark"><strong>Tên ngân hàng:&nbsp;</strong>{{ $payment_method_data['bacs']['account_details']['bank_name'] }}</span><br>
                                    <span class="text-gray-dark"><strong>Chi nhánh:&nbsp;</strong>{{ $payment_method_data['bacs']['account_details']['short_code'] }}</span><br>
                                    <span class="text-gray-dark"><strong>Mã IBAN:&nbsp;</strong>{{ $payment_method_data['bacs']['account_details']['iban'] }}</span><br>
                                    <span class="text-gray-dark"><strong>Mã SWIFT:&nbsp;</strong>{{ $payment_method_data['bacs']['account_details']['swift'] }}</span><br>
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
