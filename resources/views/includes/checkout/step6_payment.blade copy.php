@section('payment')
 <!-- Payment -->
 @if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
 <div id="payment" class="step well">
     <h4>{!! trans('frontend.choose_payment') !!}</h4>

     @if($payment_method_data['payment_option']['enable_payment_method'] == 'yes' && ($payment_method_data['bacs']['enable_option'] == 'yes' || $payment_method_data['cod']['enable_option'] == 'yes' || $payment_method_data['paypal']['enable_option'] == 'yes' || $payment_method_data['stripe']['enable_option'] == 'yes'))
     <div class="table-responsive">
         <table class="table table-hover"> 
         <tbody>  

             @if($payment_method_data['bacs']['enable_option'] == 'yes')
             <tr>
                 <td class="align-middle">
                     @if(old('payment_option') == 'bacs')
                     <input type="radio" class="shopist-iCheck" checked name="payment_option" value="bacs"> 
                     @else
                     <input type="radio" class="shopist-iCheck" name="payment_option" value="bacs"> 
                     @endif

                 </td>
                 <td class="align-middle">
                 <span class="text-gray-dark">{{ $payment_method_data['bacs']['method_title'] }}</span><br>
                 <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                 </td>
             </tr>
             @endif

             @if($payment_method_data['cod']['enable_option'] == 'yes')
             <tr>
                 <td class="align-middle">
                     @if(old('payment_option') == 'cod')
                     <input type="radio" class="shopist-iCheck" checked name="payment_option" value="cod"> 
                     @else
                     <input type="radio" class="shopist-iCheck" name="payment_option" value="cod"> 
                     @endif

                 </td>
                 <td class="align-middle">
                 <span class="text-gray-dark">{{ $payment_method_data['cod']['method_title'] }}</span><br>
                 <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                 </td>
             </tr>
             @endif

             @if($payment_method_data['paypal']['enable_option'] == 'yes')
             <tr>
                 <td class="align-middle">
                     @if(old('payment_option') == 'paypal')
                     <input type="radio" class="shopist-iCheck" checked name="payment_option" value="paypal"> 
                     @else
                     <input type="radio" class="shopist-iCheck" name="payment_option" value="paypal"> 
                     @endif

                 </td>
                 <td class="align-middle">
                 <span class="text-gray-dark">{{ $payment_method_data['paypal']['method_title'] }}</span><br>
                 <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                 </td>
             </tr>
             @endif

             @if($payment_method_data['stripe']['enable_option'] == 'yes')
             <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
             <input type="hidden" name="stripe_api_key" value="{{ $stripe_api_key }}" id="stripe_api_key">
             <tr>
                 <td class="align-middle">
                     @if(old('payment_option') == 'stripe')
                     <input type="radio" class="shopist-iCheck" checked name="payment_option" value="stripe"> 
                     @else
                     <input type="radio" class="shopist-iCheck" name="payment_option" value="stripe"> 
                     @endif

                 </td>
                 <td class="align-middle">
                 <span class="text-gray-dark">{{ $payment_method_data['stripe']['method_title'] }}</span><br>
                 <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                 </td>
             </tr>
             @endif

             @if($payment_method_data['2checkout']['enable_option'] == 'yes')
             <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
             <input type="hidden" name="2checkout_api_data" value="{{ $twocheckout_api_data }}" id="2checkout_api_data">
             <tr>
                 <td class="align-middle">
                     @if(old('payment_option') == '2checkout')
                     <input type="radio" class="custom-control-input shopist-iCheck" checked name="payment_option" value="2checkout"> 
                     @else
                     <input type="radio" class="custom-control-input shopist-iCheck" name="payment_option" value="2checkout"> 
                     @endif
                 </td>
                 <td class="align-middle">
                 <span class="text-gray-dark">{{ $payment_method_data['2checkout']['method_title'] }}</span><br>
                 <span class="text-muted text-sm">{{ $payment_method_data['bacs']['method_description'] }}</span>
                 </td>
             </tr>
             @endif
         </tbody>
         </table>

         @if($payment_method_data['stripe']['enable_option'] == 'yes')
         <div id="stripePopover">
             <p>{{ $payment_method_data['stripe']['method_description'] }}</p><br>

             <div id="stripe_content">
             <div class="input-group row">
                 <div class="col-xs-12 required">    
                 <label class="control-label">{!! trans('frontend.email_address_label') !!}</label> 
                 <input class="form-control" type="email" id="email_address" name="email_address" placeholder="email address">
                 </div>
             </div>

             <div class="input-group row">
                 <div class="col-xs-12 required">      
                 <label class="control-label">{!! trans('frontend.card_number_label') !!}</label> 
                 <input class="form-control" type="text" id="card_number" name="card_number" placeholder="card number">
                 </div>
             </div>

             <div class="input-group row">
                 <div class="col-xs-4 required">  
                 <label class="control-label">{!! trans('frontend.cvc_label') !!}</label> 
                 <input class="form-control" type="text" id="card_cvc" name="card_cvc" placeholder="ex. 311">
                 </div>
                 <div class="col-xs-4 required">  
                 <label class="control-label">{!! trans('frontend.expiration_month_label') !!}</label> 
                 <input class="form-control" type="text" id="card_expiry_month" name="card_expiry_month" placeholder="MM">
                 </div>
                 <div class="col-xs-4 required">  
                 <label class="control-label">{!! trans('frontend.expiration_year_label') !!}</label> 
                 <input class="form-control" type="text" id="card_expiry_year" name="card_expiry_year" placeholder="YYYY">
                 </div>  
             </div>
             </div>
         </div>
         @endif

         @if($payment_method_data['2checkout']['enable_option'] == 'yes')
         <div id="twocheckoutPopover">
             <p>{{ $payment_method_data['2checkout']['method_description'] }}</p><br>

             <div id="2checkout_content" style="padding-left: 15px;">  
             <div class="input-group row">
                 <div class="col-xs-12 required">      
                 <label class="control-label">{!! trans('frontend.card_number_label') !!}</label> 
                 <input class="form-control" type="text" id="2checkout_card_number" name="2checkout_card_number" placeholder="card number">
                 </div>
             </div>

             <div class="input-group row">
                 <div class="col-xs-4 required">  
                 <label class="control-label">{!! trans('frontend.cvc_label') !!}</label> 
                 <input class="form-control" type="text" id="2checkout_card_cvc" name="2checkout_card_cvc" placeholder="ex. 123">
                 </div>
                 <div class="col-xs-4 required">  
                 <label class="control-label">{!! trans('frontend.expiration_month_label') !!}</label> 
                 <input class="form-control" type="text" id="2checkout_card_expiry_month" name="2checkout_card_expiry_month" placeholder="MM">
                 </div>
                 <div class="col-xs-4 required">  
                 <label class="control-label">{!! trans('frontend.expiration_year_label') !!}</label> 
                 <input class="form-control" type="text" id="2checkout_card_expiry_year" name="2checkout_card_expiry_year" placeholder="YYYY">
                 </div>  
             </div>
             </div>
         </div>
         @endif
     </div>
     @else
     <p>{{ trans('frontend.checkout_payment_method_label') }}</p>
     @endif
 </div>
 @endif
    
@endsection

@if($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == true || ($_settings_data['general_settings']['checkout_options']['enable_login_user'] == true && $is_user_login == true) || ($_settings_data['general_settings']['checkout_options']['enable_guest_user'] == false && $_settings_data['general_settings']['checkout_options']['enable_login_user'] == false))
<div id="payment" class="step well">
  <h2 class="step-title">{!! trans('frontend.choose_payment') !!}</h2><hr>
  @if($payment_method_data['payment_option']['enable_payment_method'] == 'yes' && ($payment_method_data['bacs']['enable_option'] == 'yes' || $payment_method_data['cod']['enable_option'] == 'yes' || $payment_method_data['paypal']['enable_option'] == 'yes' || $payment_method_data['stripe']['enable_option'] == 'yes'))
    <div class="payment-options">
     @if($payment_method_data['bacs']['enable_option'] == 'yes')
      <span>
       <label>
         @if(old('payment_option') == 'bacs')
         <input type="radio" class="shopist-iCheck" checked name="payment_option" value="bacs"> {{ $payment_method_data['bacs']['method_title'] }}
         @else
          <input type="radio" class="shopist-iCheck" name="payment_option" value="bacs"> {{ $payment_method_data['bacs']['method_title'] }}
         @endif
       </label>
      </span>
     @endif

     @if($payment_method_data['cod']['enable_option'] == 'yes')
      <span>
       <label>
         @if(old('payment_option') == 'cod')
          <input type="radio" checked name="payment_option" class="shopist-iCheck" value="cod"> {{ $payment_method_data['cod']['method_title'] }}
         @else
          <input type="radio" name="payment_option" class="shopist-iCheck" value="cod"> {{ $payment_method_data['cod']['method_title'] }}
         @endif
       </label>
      </span>
     @endif

     @if($payment_method_data['paypal']['enable_option'] == 'yes')
      <span>
       <label>
         @if(old('payment_option') == 'paypal')
          <input type="radio" checked name="payment_option" class="shopist-iCheck" value="paypal"> {{ $payment_method_data['paypal']['method_title'] }}
         @else
          <input type="radio" name="payment_option" class="shopist-iCheck" value="paypal"> {{ $payment_method_data['paypal']['method_title'] }}
         @endif
       </label>
      </span>
     @endif

     @if($payment_method_data['stripe']['enable_option'] == 'yes')
      <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
      <input type="hidden" name="stripe_api_key" value="{{ $stripe_api_key }}" id="stripe_api_key">
      <span>
       <label>
         @if(old('payment_option') == 'stripe')
          <input type="radio" checked name="payment_option" class="shopist-iCheck" value="stripe"> {{ $payment_method_data['stripe']['method_title'] }}
         @else
          <input type="radio" name="payment_option" class="shopist-iCheck" value="stripe"> {{ $payment_method_data['stripe']['method_title'] }}
         @endif
       </label>
      </span>
     @endif

     @if($payment_method_data['2checkout']['enable_option'] == 'yes')
     <script type="text/javascript" src="https://www.2checkout.com/checkout/api/2co.min.js"></script>
     <input type="hidden" name="2checkout_api_data" value="{{ $twocheckout_api_data }}" id="2checkout_api_data">
      <span>
       <label>
         @if(old('payment_option') == '2checkout')
          <input type="radio" checked name="payment_option" class="shopist-iCheck" value="2checkout"> {{ $payment_method_data['2checkout']['method_title'] }}
         @else
          <input type="radio" name="payment_option" class="shopist-iCheck" value="2checkout"> {{ $payment_method_data['2checkout']['method_title'] }}
         @endif
       </label>
      </span>
     @endif

     @if($payment_method_data['bacs']['enable_option'] == 'yes')
      <div id="bacsPopover">
        <p>{{ $payment_method_data['bacs']['method_description'] }}</p>
      </div>
     @endif
     @if($payment_method_data['cod']['enable_option'] == 'yes')
      <div id="codPopover">
        <p>{{ $payment_method_data['cod']['method_description'] }}</p>
      </div>
     @endif
     @if($payment_method_data['paypal']['enable_option'] == 'yes')
      <div id="paypalPopover">
        <p>{{ $payment_method_data['paypal']['method_description'] }}</p>
      </div>
     @endif

     @if($payment_method_data['stripe']['enable_option'] == 'yes')
      <div id="stripePopover">
        <p>{{ $payment_method_data['stripe']['method_description'] }}</p><br>

        <div id="stripe_content">
          <div class="input-group row">
            <div class="col-xs-12 required">    
              <label class="control-label">{!! trans('frontend.email_address_label') !!}</label> 
              <input class="form-control" type="email" id="email_address" name="email_address" placeholder="email address">
            </div>
          </div>

          <div class="input-group row">
            <div class="col-xs-12 required">      
              <label class="control-label">{!! trans('frontend.card_number_label') !!}</label> 
              <input class="form-control" type="text" id="card_number" name="card_number" placeholder="card number">
            </div>
          </div>

          <div class="input-group row">
            <div class="col-xs-4 required">  
              <label class="control-label">{!! trans('frontend.cvc_label') !!}</label> 
              <input class="form-control" type="text" id="card_cvc" name="card_cvc" placeholder="ex. 311">
            </div>
            <div class="col-xs-4 required">  
              <label class="control-label">{!! trans('frontend.expiration_month_label') !!}</label> 
              <input class="form-control" type="text" id="card_expiry_month" name="card_expiry_month" placeholder="MM">
            </div>
            <div class="col-xs-4 required">  
              <label class="control-label">{!! trans('frontend.expiration_year_label') !!}</label> 
              <input class="form-control" type="text" id="card_expiry_year" name="card_expiry_year" placeholder="YYYY">
            </div>  
          </div>
        </div>
      </div>
     @endif

     @if($payment_method_data['2checkout']['enable_option'] == 'yes')
      <div id="twocheckoutPopover">
        <p>{{ $payment_method_data['2checkout']['method_description'] }}</p><br>

        <div id="2checkout_content" style="padding-left: 15px;">  
          <div class="input-group row">
            <div class="col-xs-12 required">      
              <label class="control-label">{!! trans('frontend.card_number_label') !!}</label> 
              <input class="form-control" type="text" id="2checkout_card_number" name="2checkout_card_number" placeholder="card number">
            </div>
          </div>

          <div class="input-group row">
            <div class="col-xs-4 required">  
              <label class="control-label">{!! trans('frontend.cvc_label') !!}</label> 
              <input class="form-control" type="text" id="2checkout_card_cvc" name="2checkout_card_cvc" placeholder="ex. 123">
            </div>
            <div class="col-xs-4 required">  
              <label class="control-label">{!! trans('frontend.expiration_month_label') !!}</label> 
              <input class="form-control" type="text" id="2checkout_card_expiry_month" name="2checkout_card_expiry_month" placeholder="MM">
            </div>
            <div class="col-xs-4 required">  
              <label class="control-label">{!! trans('frontend.expiration_year_label') !!}</label> 
              <input class="form-control" type="text" id="2checkout_card_expiry_year" name="2checkout_card_expiry_year" placeholder="YYYY">
            </div>  
          </div>
        </div>
      </div>
     @endif
    </div>
  @else
    <p>{{ trans('frontend.checkout_payment_method_label') }}</p>
  @endif
</div>
@endif
