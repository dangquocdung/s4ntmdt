<a href="cart.html">
  <div>
    <span class="cart-icon"><i class="icon-shopping-cart"></i>
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
          @if($items->img_src)  
          <a href="{{ route('details-page', get_product_slug($items->id)) }}"><img src="{{ get_image_url($items->img_src) }}" alt="product"></a>
          @else
          <a href="{{ route('details-page', get_product_slug($items->id)) }}"><img src="{{ default_placeholder_img_src() }}" alt="no_image"></a>
          @endif
          {{-- <a href="shop-single.html"><img src="img/shop/widget/04.jpg" alt="Product"></a> --}}
      </div>
      <div class="entry-content">
        <h4 class="entry-title">
          <a href="{{ route('details-page', get_product_slug($items->id)) }}">{!! $items->name !!}</a>
          {{-- <a href="shop-single.html">Canon EOS M50 Mirrorless Camera</a> --}}
        </h4>
        <span class="entry-meta">1 x $910.00</span>
      </div>
      <div class="entry-delete">
        <a href="{{ route('removed-item-from-cart', $index)}}" class="icon icon-delete" title="Delete">
          <i class="icon-x"></i>
        </a>

        {{-- <i class="icon-x"></i> --}}
      </div>
    </div>
    @endforeach
    

    <div class="text-right">
      <p class="text-gray-dark py-2 mb-0"><span class='text-muted'>Subtotal:</span> &nbsp;$2,548.50</p>
    </div>
    <div class="d-flex">
      <div class="pr-2 w-50"><a class="btn btn-secondary btn-sm btn-block mb-0" href="cart.html">Expand Cart</a></div>
      <div class="pl-2 w-50"><a class="btn btn-primary btn-sm btn-block mb-0" href="checkout.html">Checkout</a></div>
    </div>
  </div>
  @endif