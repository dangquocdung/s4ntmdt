<a href="" class="show-mini-cart" data-id="1">
  <div>
    <span class="cart-icon">
      <i class="icon-shopping-cart"></i>
      <span class="count-label">{!! Cart::count() !!}   </span>
    </span>
    <span class="text-label">{!! trans('frontend.menu_my_cart') !!}</span>
  </div>
</a>

@if( Cart::count() >0 )

<div class="toolbar-dropdown cart-dropdown widget-cart hidden-on-mobile">
  @foreach(Cart::items() as $index => $items)

  <!-- Entry-->
  <div class="entry">
    <div class="entry-thumb">
      <a href="{{ route('details-page', get_product_slug($items->id)) }}">
        @if($items->img_src)  
          <img src="{{ get_image_url($items->img_src) }}" alt="Sản phẩm">
        @else
          <img src="{{ default_placeholder_img_src() }}" alt="no_image">
        @endif
      </a>
    </div>
    
    <div class="entry-content">
      <h4 class="entry-title">
        <a href="{{ route('details-page', get_product_slug($items->id)) }}">{!! $items->name !!}</a>
      </h4>
      <span class="entry-meta">
        {!! $items->quantity !!} x {!! price_html( get_product_price_html_by_filter( Cart::getRowPrice(1, get_role_based_price_by_product_id($items ->id, $items->price))) ) !!}
      </span>
    </div>

    <div class="entry-delete">
      <a href="{{ route('removed-item-from-cart', $index)}}">
        <i class="icon-x"></i>
      </a>
    </div>
  </div>
  
  @endforeach

  <div class="text-right">
    <p class="text-gray-dark py-2 mb-0"><span class='text-muted'>{!! trans('frontend.total') !!}:</span> &nbsp;{!! price_html( get_product_price_html_by_filter(Cart::getTotal()) ) !!}</p>
  </div>
  <div class="d-flex">
    <div class="pr-2 w-50"><a class="btn btn-secondary btn-sm btn-block mb-0" href="{{ route('cart-page') }}">{!! trans('frontend.cart') !!}</a></div>
    <div class="pl-2 w-50"><a class="btn btn-primary btn-sm btn-block mb-0" href="{{ route('checkout-page') }}">{!! trans('frontend.checkout') !!}</a></div>
  </div>
</div>

@endif