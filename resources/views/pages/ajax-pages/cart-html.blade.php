
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
    @if( Cart::count() >0 )
      <!-- Alert-->
      <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;"><span class="alert-close" data-dismiss="alert"></span><img class="d-inline align-center" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIuMDAzIDUxMi4wMDMiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMi4wMDMgNTEyLjAwMzsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSIxNnB4IiBoZWlnaHQ9IjE2cHgiPgo8Zz4KCTxnPgoJCTxnPgoJCQk8cGF0aCBkPSJNMjU2LjAwMSw2NGMtNzAuNTkyLDAtMTI4LDU3LjQwOC0xMjgsMTI4czU3LjQwOCwxMjgsMTI4LDEyOHMxMjgtNTcuNDA4LDEyOC0xMjhTMzI2LjU5Myw2NCwyNTYuMDAxLDY0eiAgICAgIE0yNTYuMDAxLDI5OC42NjdjLTU4LjgxNiwwLTEwNi42NjctNDcuODUxLTEwNi42NjctMTA2LjY2N1MxOTcuMTg1LDg1LjMzMywyNTYuMDAxLDg1LjMzM1MzNjIuNjY4LDEzMy4xODQsMzYyLjY2OCwxOTIgICAgIFMzMTQuODE3LDI5OC42NjcsMjU2LjAwMSwyOTguNjY3eiIgZmlsbD0iIzUwYzZlOSIvPgoJCQk8cGF0aCBkPSJNMzg1LjY0NCwzMzMuMjA1YzM4LjIyOS0zNS4xMzYsNjIuMzU3LTg1LjMzMyw2Mi4zNTctMTQxLjIwNWMwLTEwNS44NTYtODYuMTIzLTE5Mi0xOTItMTkycy0xOTIsODYuMTQ0LTE5MiwxOTIgICAgIGMwLDU1Ljg1MSwyNC4xMjgsMTA2LjA2OSw2Mi4zMzYsMTQxLjE4NEw2NC42ODQsNDk3LjZjLTEuNTM2LDQuMTE3LTAuNDA1LDguNzI1LDIuODM3LDExLjY2OSAgICAgYzIuMDI3LDEuNzkyLDQuNTY1LDIuNzMxLDcuMTQ3LDIuNzMxYzEuNjIxLDAsMy4yNDMtMC4zNjMsNC43NzktMS4xMDlsNzkuNzg3LTM5Ljg5M2w1OC44NTksMzkuMjMyICAgICBjMi42ODgsMS43OTIsNi4xMDEsMi4yNCw5LjE5NSwxLjI4YzMuMDkzLTEuMDAzLDUuNTY4LTMuMzQ5LDYuNjk5LTYuNGwyMy4yOTYtNjIuMTQ0bDIwLjU4Nyw2MS43MzkgICAgIGMxLjA2NywzLjE1NywzLjU0MSw1LjYzMiw2LjY3Nyw2LjcyYzMuMTM2LDEuMDY3LDYuNTkyLDAuNjQsOS4zNjUtMS4yMTZsNTguODU5LTM5LjIzMmw3OS43ODcsMzkuODkzICAgICBjMS41MzYsMC43NjgsMy4xNTcsMS4xMzEsNC43NzksMS4xMzFjMi41ODEsMCw1LjEyLTAuOTM5LDcuMTI1LTIuNzUyYzMuMjY0LTIuOTIzLDQuMzczLTcuNTUyLDIuODM3LTExLjY2OUwzODUuNjQ0LDMzMy4yMDV6ICAgICAgTTI0Ni4wMTcsNDEyLjI2N2wtMjcuMjg1LDcyLjc0N2wtNTIuODIxLTM1LjJjLTMuMi0yLjExMi03LjMxNy0yLjM4OS0xMC42ODgtMC42NjFMOTQuMTg4LDQ3OS42OGw0OS41NzktMTMyLjIyNCAgICAgYzI2Ljg1OSwxOS40MzUsNTguNzk1LDMyLjIxMyw5My41NDcsMzUuNjA1TDI0Ni43LDQxMS4yQzI0Ni40ODcsNDExLjU2MywyNDYuMTY3LDQxMS44NCwyNDYuMDE3LDQxMi4yNjd6IE0yNTYuMDAxLDM2Mi42NjcgICAgIEMxNjEuOSwzNjIuNjY3LDg1LjMzNSwyODYuMTAxLDg1LjMzNSwxOTJTMTYxLjksMjEuMzMzLDI1Ni4wMDEsMjEuMzMzUzQyNi42NjgsOTcuODk5LDQyNi42NjgsMTkyICAgICBTMzUwLjEwMywzNjIuNjY3LDI1Ni4wMDEsMzYyLjY2N3ogTTM1Ni43NTksNDQ5LjEzMWMtMy40MTMtMS43MjgtNy41MDktMS40NzItMTAuNjg4LDAuNjYxbC01Mi4zNzMsMzQuOTIzbC0zMy42NDMtMTAwLjkyOCAgICAgYzQwLjM0MS0wLjg1Myw3Ny41ODktMTQuMTg3LDEwOC4xNi0zNi4zMzFsNDkuNTc5LDEzMi4yMDNMMzU2Ljc1OSw0NDkuMTMxeiIgZmlsbD0iIzUwYzZlOSIvPgoJCTwvZz4KCTwvZz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" width="18" height="18" alt="Medal icon">&nbsp;&nbsp;With this purchase you will earn <strong>290</strong> Reward Points.</div>
      <!-- Shopping Cart-->
     
        @include('pages-message.notify-msg-error')
        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>{!! trans('frontend.cart_item') !!}</th>
                <th class="text-center">{!! trans('frontend.price') !!}</th>
                <th class="text-center">{!! trans('frontend.quantity') !!}</th>
                <th class="text-center">{!! trans('frontend.total') !!}</th>
                <th class="text-center">
                  {{-- <a class="btn btn-sm btn-outline-danger" href="#">Clear Cart</a> --}}

                  <input type="submit" name="empty_cart" class="btn btn-sm btn-outline-danger" value="{{ trans('frontend.empty_cart') }}">  

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
                        {{-- <span><em>Size:</em> 10.5</span>
                        <span><em>Color:</em> Dark Blue</span> --}}
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                      {!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}

                  </td>
                  <td class="text-center">
                    <div class="count-input">
                      <input type="number" class="form-control text-center" name="cart_quantity[{{ $index }}]" value="{{ $items->quantity }}" min="1">
                      {{-- <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select> --}}
                    </div>
                  </td>
                  <td class="text-center text-lg text-medium">{!! price_html(  get_product_price_html_by_filter(Cart::getRowPrice($items->quantity, $items->price)), get_frontend_selected_currency() ) !!}</td>
                  <td class="text-center"><a class="remove-from-cart" href="{{ route('removed-item-from-cart', $index)}}" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="shopping-cart-footer">
          <div class="column">
            <form class="coupon-form" method="post">

              <input type="text" class="form-control form-control-sm" id="apply_coupon_code" name="apply_coupon" placeholder="{{ trans('frontend.coupon_code_placeholder_text') }}">
              <button class="btn btn-outline-primary btn-sm" name="apply_coupon_post" id="apply_coupon_post">{!! trans('frontend.apply_coupon_label') !!}</button>
              
              {{-- <input class="form-control form-control-sm" type="text" placeholder="Coupon code" required>
              <button class="btn btn-outline-primary btn-sm" type="submit">Apply Coupon</button> --}}
            </form>
          </div>
          <div class="column text-lg">{!! trans('frontend.cart_sub_total') !!}: <span class="text-medium">{!! price_html( get_product_price_html_by_filter(Cart::getTotal()), get_frontend_selected_currency() ) !!}</span></div>
        </div>
      

        <div class="shopping-cart-footer">
          <div class="column">
            <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}"><i class="icon-arrow-left"></i>&nbsp;{{ trans('frontend.return_to_shop') }}</a>
          </div>
          <div class="column">
            <input type="submit" name="update_cart" class="btn btn-primary" value="{{ trans('frontend.update_cart') }}">
            {{-- <a class="btn btn-primary" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Your cart" data-toast-message="is updated successfully!">Update Cart</a> --}}
            
            <a class="btn btn-success" href="{{ route('checkout-page') }}">{!! trans('frontend.checkout') !!}</a></div>
        </div>

    @else

      <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;">
        <span class="alert-close" data-dismiss="alert"></span>
        {{ trans('frontend.empty_cart_msg') }}
      </div>

      @include('pages-message.notify-msg-error')
      {{-- <h2 class="cart-shopping-label2">{{ trans('frontend.shopping_cart') }}</h2>
      <div class="empty-cart-msg">{{ trans('frontend.empty_cart_msg') }}</div>
      <div class="cart-return-shop"><a class="btn btn-secondary check_out" href="{{ route('shop-page') }}">{{ trans('frontend.return_to_shop') }}</a></div> --}}

        <div class="column">
          <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}"><i class="icon-arrow-left"></i>&nbsp;{{ trans('frontend.return_to_shop') }}</a>
        </div>
    @endif
    <!-- Related Products Carousel-->
    <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
    <!-- Carousel-->
    <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
      <!-- Product-->
      <div class="grid-item">
        <div class="product-card">
          <div class="product-badge text-danger">22% Off</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/09.jpg" alt="Product"></a>
          <h3 class="product-title"><a href="shop-single.html">Rocket Dog</a></h3>
          <h4 class="product-price">
            <del>$44.95</del>$34.99
          </h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
          </div>
        </div>
      </div>
      <!-- Product-->
      <div class="grid-item">
        <div class="product-card">
            <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
            </div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/03.jpg" alt="Product"></a>
          <h3 class="product-title"><a href="shop-single.html">Oakley Kickback</a></h3>
          <h4 class="product-price">$155.00</h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
          </div>
        </div>
      </div>
      <!-- Product-->
      <div class="grid-item">
        <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/12.jpg" alt="Product"></a>
          <h3 class="product-title"><a href="shop-single.html">Vented Straw Fedora</a></h3>
          <h4 class="product-price">$49.50</h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
          </div>
        </div>
      </div>
      <!-- Product-->
      <div class="grid-item">
        <div class="product-card">
            <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i>
            </div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/11.jpg" alt="Product"></a>
          <h3 class="product-title"><a href="shop-single.html">Top-Sider Fathom</a></h3>
          <h4 class="product-price">$90.00</h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
          </div>
        </div>
      </div>
      <!-- Product-->
      <div class="grid-item">
        <div class="product-card"><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/04.jpg" alt="Product"></a>
          <h3 class="product-title"><a href="shop-single.html">Waist Leather Belt</a></h3>
          <h4 class="product-price">$47.00</h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
          </div>
        </div>
      </div>
      <!-- Product-->
      <div class="grid-item">
        <div class="product-card">
          <div class="product-badge text-danger">50% Off</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/01.jpg" alt="Product"></a>
          <h3 class="product-title"><a href="shop-single.html">Unionbay Park</a></h3>
          <h4 class="product-price">
            <del>$99.99</del>$49.99
          </h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  
