<a href=""></a>
<i class="icon-bag" title="{!! trans('frontend.menu_my_cart') !!}"></i>
@if( Cart::count() >0 ) 
  <span class="count">{!! Cart::count() !!}</span>
  <span class="subtotal">
      {!! price_html( get_product_price_html_by_filter(Cart::getTotal()) ) !!}
  </span>
@endif

<div class="toolbar-dropdown">
  @if( Cart::count() >0 )

    @foreach(Cart::items() as $index => $items)
    <div class="dropdown-product-item">
      <a href="{{ route('removed-item-from-cart', $index)}}" class="dropdown-product-remove">
        <i class="icon-cross"></i>
      </a>
      <a class="dropdown-product-thumb" href="{{ route('details-page', get_product_slug($items->id)) }}">
          @if($items->img_src)  
            <img src="{{ get_image_url($items->img_src) }}" alt="Sản phẩm">
          @else
            <img src="{{ default_placeholder_img_src() }}" alt="no_image">
          @endif
      </a>
      <div class="dropdown-product-info">
        <a class="dropdown-product-title" href="{{ route('details-page', get_product_slug($items->id)) }}">{!! $items->name !!}</a>
        <span class="dropdown-product-details">{!! $items->quantity !!} x {!! price_html( get_product_price_html_by_filter( Cart::getRowPrice($items->quantity, get_role_based_price_by_product_id($items ->id, $items->price))) ) !!}</span></div>
    </div>
    @endforeach
    
    <div class="toolbar-dropdown-group">
      <div class="column"><span class="text-lg">Total:</span></div>
      <div class="column text-right"><span class="text-lg text-medium">$289.68&nbsp;</span></div>
    </div>
    <div class="toolbar-dropdown-group">
      <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.html">View Cart</a></div>
      <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
    </div>

    @else
    <div class="toolbar-dropdown-group">
      <div class="column"><span class="text-lg">{!! trans('frontend.empty_cart_msg') !!}</span></div>
    </div>
    @endif
</div>