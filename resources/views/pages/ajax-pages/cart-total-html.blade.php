{!! Session::get('eBazar_shipping_method') !!}

<section class="widget widget-order-summary" id="cart_page">
  <h5 class="widget-title">{!! trans('frontend.order_summary') !!}</h5>
  <table class="table">
    <tr>
      <td>{!! trans('frontend.cart_sub_total') !!}:</td>
      <td class="text-gray-dark">
        {!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!}
      </td>
    </tr>

    @if(($shipping_data['shipping_option']['enable_shipping']) && ($shipping_data['flat_rate']['enable_option'] || $shipping_data['free_shipping']['enable_option'] || $shipping_data['local_delivery']['enable_option']) )
      <?php $str=''; ?>

      @if($shipping_data['shipping_option']['display_mode'] == 'radio_buttons')

        @if( $shipping_data['free_shipping']['enable_option'] && ( Cart::getSubTotalAndTax() >= $shipping_data['free_shipping']['order_amount'] ) )
          @if(Cart::getShippingMethod()['shipping_method'] == 'free_shipping')
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" checked name="shipping_method" value="free_shipping">&nbsp;&nbsp; <span>'. $shipping_data['free_shipping']['method_title'] .'</span></div>';?>
          @else
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" name="shipping_method" value="free_shipping">&nbsp;&nbsp; <span>'. $shipping_data['free_shipping']['method_title'] .'</span></div>';?>
          @endif
        @else
          <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" disabled name="shipping_method" value="free_shipping">&nbsp;&nbsp; <span>'. $shipping_data['free_shipping']['method_title'] .'</span></div>';?>
        @endif

        @if($shipping_data['flat_rate']['enable_option'] && $shipping_data['flat_rate']['method_cost'])
          @if(Cart::getShippingMethod()['shipping_method'] == 'flat_rate')
            <?php $str = '<div><label><input type="radio" class="shopist-iCheck" checked name="shipping_method" value="flat_rate">&nbsp;&nbsp; <span>'. $shipping_data['flat_rate']['method_title'] .': '. price_html( get_product_price_html_by_filter($shipping_data['flat_rate']['method_cost']), get_frontend_selected_currency() ).'</span></div>';?>
          @else
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" name="shipping_method" value="flat_rate">&nbsp;&nbsp; <span>' . $shipping_data['flat_rate']['method_title'] .': ' . price_html( get_product_price_html_by_filter($shipping_data['flat_rate']['method_cost']), get_frontend_selected_currency() ).'</span></div>';?>
          @endif
        @endif

        

        @if($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'fixed_amount' && $shipping_data['local_delivery']['delivery_fee'] )
          @if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" checked name="shipping_method" value="local_delivery">&nbsp;&nbsp; <span>'. $shipping_data['local_delivery']['method_title'] .': '. price_html( get_product_price_html_by_filter($shipping_data['local_delivery']['delivery_fee']), get_frontend_selected_currency() ) .'</span></div>';?>
          @else
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" name="shipping_method" value="local_delivery">&nbsp;&nbsp; <span>'. $shipping_data['local_delivery']['method_title'] .': '. price_html( get_product_price_html_by_filter($shipping_data['local_delivery']['delivery_fee']), get_frontend_selected_currency() ) .'</span></div>';?>
          @endif
        @elseif($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'cart_total' && $shipping_data['local_delivery']['delivery_fee'])
          @if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" checked name="shipping_method" value="local_delivery">&nbsp;&nbsp; <span>'. $shipping_data['local_delivery']['method_title'] .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPercentageTotal()), get_frontend_selected_currency() ) .'</span></div>';?>
          @else
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" name="shipping_method" value="local_delivery">&nbsp;&nbsp; <span>'. $shipping_data['local_delivery']['method_title'] .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPercentageTotal()), get_frontend_selected_currency() ) .'</span></div>';?>
          @endif
        @elseif($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'per_product' && $shipping_data['local_delivery']['delivery_fee'])
          @if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" checked name="shipping_method" value="local_delivery">&nbsp;&nbsp; <span>'. $shipping_data['local_delivery']['method_title'] .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPerProductTotal()), get_frontend_selected_currency() ) .'</span></div>';?>
          @else
            <?php $str .= '<div><label><input type="radio" class="shopist-iCheck" name="shipping_method" value="local_delivery">&nbsp;&nbsp; <span>'. $shipping_data['local_delivery']['method_title'] .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPerProductTotal()), get_frontend_selected_currency() ) .'</span></div>';?>
          @endif
        @endif

        @if($str)
          <div class="cart-shipping-total cart-total-content">
            <label>{!! trans('frontend.shipping_cost') !!}:</label>
            <div class="value" ><?php echo $str;?></div>
          </div>
          <div class="clearfix"></div>
        @else
          <div class="cart-shipping-total">
            <label>{!! trans('frontend.shipping_cost') !!}:</label>
            <div class="padding-bottom-1x">{!! trans('frontend.free') !!}</div>
          </div>
        @endif

      @elseif($shipping_data['shipping_option']['display_mode'] == 'dropdown')

        @if($shipping_data['flat_rate']['enable_option'] && $shipping_data['flat_rate']['method_cost'])
          @if(Cart::getShippingMethod()['shipping_method'] == 'flat_rate')
            <?php $str .= '<option selected value="flat_rate">'. Lang::get('frontend.flat_rate') .': '. price_html( get_product_price_html_by_filter($shipping_data['flat_rate']['method_cost']), get_frontend_selected_currency() ) .'</option>';?>
          @else
            <?php $str .= '<option value="flat_rate">' . Lang::get('frontend.flat_rate') .': '. price_html( get_product_price_html_by_filter($shipping_data['flat_rate']['method_cost']), get_frontend_selected_currency() ) .'</option>';?>
          @endif
        @endif
        @if( $shipping_data['free_shipping']['enable_option'] && ( Cart::getSubTotalAndTax() >= $shipping_data['free_shipping']['order_amount'] ) )
          @if(Cart::getShippingMethod()['shipping_method'] == 'free_shipping')
            <?php $str .= '<option selected value="free_shipping">'. Lang::get('frontend.free_shipping') .'</option>';?>
          @else
            <?php $str .= '<option value="free_shipping">'. Lang::get('frontend.free_shipping') .'</option>';?>
          @endif
        @endif

        @if($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'fixed_amount' && $shipping_data['local_delivery']['delivery_fee'] )
          @if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
            <?php $str .= '<option selected value="local_delivery">'. Lang::get('frontend.local_delivery') .': '. price_html( get_product_price_html_by_filter($shipping_data['local_delivery']['delivery_fee']), get_frontend_selected_currency() ) .'</option>';?>
          @else
            <?php $str .= '<option value="local_delivery">'. Lang::get('frontend.local_delivery') .': '. price_html( get_product_price_html_by_filter($shipping_data['local_delivery']['delivery_fee']), get_frontend_selected_currency() ) .'</option>';?>
          @endif
        @elseif($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'cart_total' && $shipping_data['local_delivery']['delivery_fee'])
          @if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
            <?php $str .= '<option selected value="local_delivery">'. Lang::get('frontend.local_delivery') .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPercentageTotal()), get_frontend_selected_currency() ) .'</option>';?>
          @else
            <?php $str .= '<option value="local_delivery">'. Lang::get('frontend.local_delivery') .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPercentageTotal()), get_frontend_selected_currency() ) .'</option>';?>
          @endif
        @elseif($shipping_data['local_delivery']['enable_option'] && $shipping_data['local_delivery']['fee_type'] === 'per_product' && $shipping_data['local_delivery']['delivery_fee'])
          @if(Cart::getShippingMethod()['shipping_method'] == 'local_delivery')
              <?php $str .= '<option selected value="local_delivery">'. Lang::get('frontend.local_delivery') .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPerProductTotal()), get_frontend_selected_currency() ) .'</option>';?>
          @else
              <?php $str .= '<option value="local_delivery">'. Lang::get('frontend.local_delivery') .': '. price_html( get_product_price_html_by_filter(Cart::getLocalDeliveryShippingPerProductTotal()), get_frontend_selected_currency() ) .'</option>';?>
          @endif
        @endif
        @if($str)
          <div class="cart-shipping-total">
            <label>{!! trans('frontend.shipping_cost') !!}:</label>
            <div class="value">
              <select name="shipping_method_dropdown" id="shipping_method_dropdown"><?php echo $str;?></select>
            </div>
          </div>
          <div class="clearfix"></div>
        @else
          <div class="cart-shipping-total">
            <label>{!! trans('frontend.shipping_cost') !!}:</label>
            <div class="value">{!! trans('frontend.free') !!}</div>
          </div>
        @endif
      @endif
    @endif


    
    <tr>
      <td>{!! trans('frontend.tax') !!}:</td>
      <td class="text-gray-dark">{!! price_html( get_product_price_html_by_filter(Cart::getTax()), get_frontend_selected_currency() ) !!}</td>
    </tr>

    <tr class="cart-shipping-cost">
      <td>{!! trans('frontend.shipping_cost') !!}:</td>
      <td class="text-gray-dark">{!! price_html( get_product_price_html_by_filter(Cart::getShippingCost()), get_frontend_selected_currency() ) !!}</td>
    </tr>

    <tr class="cart-grand-total">
      <td></td>
      <td class="text-lg text-gray-dark value text-medium">{!! price_html( get_product_price_html_by_filter(Cart::getCartTotal()), get_frontend_selected_currency() ) !!}</td>
    </tr>

  </table>
</section>