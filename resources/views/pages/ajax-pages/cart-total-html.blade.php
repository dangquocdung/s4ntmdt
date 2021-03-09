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


    
    <tr>
      <td>{!! trans('frontend.tax') !!}:</td>
      <td class="text-gray-dark">{!! price_html( get_product_price_html_by_filter(Cart::getTax()), get_frontend_selected_currency() ) !!}</td>
    </tr>

    <tr class="cart-grand-total">
      <td></td>
      <td class="text-lg text-gray-dark value text-medium">{!! price_html( get_product_price_html_by_filter(Cart::getCartTotal()), get_frontend_selected_currency() ) !!}</td>
    </tr>

  </table>
</section>