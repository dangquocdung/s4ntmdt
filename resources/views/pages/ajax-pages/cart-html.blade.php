
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>{{ trans('frontend.shopist_cart_title') }}</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>{{ trans('frontend.shopist_cart_title') }}</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1" id="checkout_page">

      @if( Cart::count() >0 )

      <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">  

      <div class="card-data">

        <!-- Alert-->
        <!-- <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;">
          <span class="alert-close" data-dismiss="alert"></span>
          <i class="icon-award"></i>&nbsp;&nbsp;With this purchase you will earn <span class='text-medium'>2,549</span> Reward Points.
        </div> -->

      </div>

      
      <!-- Shopping Cart-->

        @include('pages-message.notify-msg-error')

        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>{!! trans('frontend.cart_item') !!}</th>
                <th class="text-center">{!! trans('frontend.quantity') !!}</th>
                <th class="text-center">{!! trans('frontend.price') !!}</th>
                <th class="text-center">
                  <input type="submit" name="empty_cart" class="btn btn-sm btn-outline-danger" value="{{ trans('frontend.clear_cart') }}">  
                </th>

              </tr>
            </thead>
            <tbody>

              @foreach(Cart::items() as $index => $items)
              
              <tr>
                <td>
                  <div class="product-item">
                    <a class="product-thumb" href="{{ route('details-page', get_product_slug($items->id)) }}" target="_blank">
                      @if($items->img_src)
                        <img src="{{ get_image_url($items->img_src) }}" alt="product">
                      @else
                        <img src="{{ default_placeholder_img_src() }}" alt="no_image">
                      @endif
                    </a>

                    <div class="product-info">
                      <h4 class="product-title"><a href="{{ route('details-page', get_product_slug($items->id)) }}" target="_blank">{!! $items->name !!}</a></h4>
                      @if(count($items->options) > 0)
                        @foreach($items->options as $key => $val)
                          @if($count == count($items->options))
                            {!! $key .' &#8658; '. $val !!}
                          @else
                            {!! $key .' &#8658; '. $val. ' , ' !!}
                          @endif
                          <?php $count ++ ; ?>
                        @endforeach
                      @endif
                      @if(get_product_type($items->id) === 'customizable_product')
                        @if($items->acces_token)
                          @if(count(get_customize_images_by_access_token($items->acces_token))>0)
                            <button class="btn btn-block btn-sm view-customize-images" data-images="{{ json_encode( get_customize_images_by_access_token($items->acces_token) ) }}">{{ trans('frontend.design_images') }}</button>
                          @endif
                        @endif
                      @endif
                      
                      @if( count(get_vendor_details_by_product_id($items->product_id)) >0 )
                        <p class="vendor-title"><strong>{!! trans('frontend.vendor_label') !!}</strong> : {!! get_vendor_name_by_product_id( $items->product_id) !!}</p>
                      @endif
                    </div>
                  </div>
                </td>

                <td class="text-center">

                  <!-- <input type="number" class="form-control text-center" name="cart_quantity[{{ $index }}]" value="{{ $items->quantity }}" min="1"> -->

                  <div class="count-input">
                    <select class="form-control" name="cart_quantity[{{ $index }}]">
                      @for( $i=1; $i<=10; $i++)
                        <option {{ ($i==$items->quantity?'selected':'' )}}>{{$i}}</option>
                      @endfor

                    </select>
                  </div>
                </td>
                <td class="text-center text-lg">
                  {!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}
                </td>
              
                <td class="text-center"><a class="remove-from-cart" href="{{ route('removed-item-from-cart', $index)}}" data-toggle="tooltip" title="Remove item"><i class="icon-x"></i></a></td>

              </tr>

              @endforeach

            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
          <div class="column">
            <div class="coupon-form">
              <input type="text" class="form-control form-control-sm" id="apply_coupon_code" name="apply_coupon" placeholder="{{ trans('frontend.coupon_code_placeholder_text') }}">
              <button class="btn btn-outline-primary btn-sm" name="apply_coupon_post" id="apply_coupon_post">{!! trans('frontend.apply_coupon_label') !!}</button>
            </div>
          </div>

          <div class="column text-lg">{!! trans('frontend.cart_sub_total') !!}: <span class="text-medium">{!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!}</span></div>

        </div>

        <div class="shopping-cart-footer">
          <div class="column"><a class="btn btn-outline-secondary" href="{{ route('shop-page') }}"><i class="icon-arrow-left"></i>&nbsp;{{ trans('frontend.return_to_shop') }}</a></div>

          <div class="column">

            <input type="submit" name="update_cart" class="btn btn-secondary update" value="{{ trans('frontend.update_cart') }}">   

            <a class="btn btn-primary" href="{{ route('checkout-page') }}">{!! trans('frontend.checkout') !!}</a>
  
          </div>
        </div>

        <!-- @include('pages.ajax-pages.cart-total-html') -->

        </form>    



      @else

        <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;">
          <span class="alert-close" data-dismiss="alert"></span>
          {{ trans('frontend.empty_cart_msg') }}
        </div>

        @include('pages-message.notify-msg-error')

        <div class="shopping-cart-footer">
          <div class="column">
            <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}" style="margin-left:0; float:left">
              <i class="icon-arrow-left"></i>&nbsp;{{ trans('frontend.return_to_shop') }}
            </a>
          </div>
        </div>
        
      @endif

      <!-- Related Products Carousel-->
      <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
      <!-- Carousel-->
      <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
        
        <!-- Product-->
        <div class="product-card">
          <div class="product-badge bg-danger">Sale</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/01.jpg" alt="Product"></a>
          <div class="product-card-body">
            <div class="product-category"><a href="#">Smart home</a></div>
            <h3 class="product-title"><a href="shop-single.html">Echo Dot (2nd Generation)</a></h3>
            <h4 class="product-price">
              <del>$62.00</del>$49.99
            </h4>
          </div>
          <div class="product-button-group"><a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a><a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a><a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
        </div>
        
      </div>
    </div>
