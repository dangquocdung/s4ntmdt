<!-- Main Slider-->

<section class="hero-slider" style="background-image: url(img/hero-slider/main-bg.jpg);">
  <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
    
    @foreach($advancedData['recommended_items'] as $key => $recommended_product)

    <div class="item">
      <div class="container padding-top-3x">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
            <div class="from-bottom">
              @if(!empty($recommended_product->image_url))
              <img class="d-inline-block w-150 mb-4" src="{{ get_image_url( $recommended_product->image_url ) }}" alt="{{ basename( get_image_url( $recommended_product->image_url ) ) }}" />
              @else
              <img class="d-inline-block w-150 mb-4" src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
              <div class="h2 text-body mb-2 pt-1">{!! $recommended_product->title !!}</div>
              <div class="h2 text-body mb-4 pb-1">{{ trans('frontend.gia-thap-nhat') }} <span class="text-medium">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->price)), get_frontend_selected_currency()) !!}</span></div>
            </div>
            <a class="btn btn-primary scale-up delay-1" href="{{ route('details-page', $recommended_product->slug ) }}">{{ trans('frontend.product_details_label') }}&nbsp;<i class="icon-arrow-right"></i></a>
          </div>
          <div class="col-md-6 padding-bottom-2x mb-3">
            @if(!empty($recommended_product->image_url))
            <img class="d-block mx-auto" src="{{ get_image_url( $recommended_product->image_url ) }}" alt="{{ basename( get_image_url( $recommended_product->image_url ) ) }}" />
            @else
            <img class="d-block mx-auto" src="{{ default_placeholder_img_src() }}" alt="" />
            @endif
          </div>
        </div>
      </div>
    </div>

    @endforeach
    
  </div>
</section>
<!-- Top Categories/Deals-->

<section class="container padding-top-3x padding-bottom-2x">
  <div class="row">

  @foreach($advancedData['recommended_items'] as $key => $recommended_product)

    <div class="col-lg-4 col-sm-6">
      <div class="card border-0 bg-secondary mb-30">
        <div class="card-body d-table w-100">
          <div class="d-table-cell align-middle">
            @if(!empty($recommended_product->image_url))
            <img class="d-block w-100" src="{{ get_image_url( $recommended_product->image_url ) }}" alt="{{ basename( get_image_url( $recommended_product->image_url ) ) }}" />
            @else
            <img class="d-block w-100" src="{{ default_placeholder_img_src() }}" alt="" />
            @endif
          </div>
          <div class="d-table-cell align-middle pl-2">
            <h3 class="h6 text-thin">
              {!! $recommended_product->title !!}
            </h3>
            <h4 class="h6 d-table w-100 text-thin">
              <span class="d-table-cell align-bottom" style="line-height: 1.2;">GIẢM<br>GIÁ&nbsp;</span><span class="d-table-cell align-bottom h1 text-medium">50%</span>
            </h4>
            <a class="text-decoration-none" href="{{ route('details-page', $recommended_product->slug) }}">Mua ngay&nbsp;<i class="icon-chevron-right d-inline-block align-middle text-lg"></i></a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
  </div>
</section>

<!-- Today sale Products-->

@if (count($advancedData['todays_deal']) > 0)
<section class="container padding-bottom-2x mb-2">
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.todays_deal') }}</h2>
  <div class="row">

  @foreach($advancedData['todays_deal'] as $key => $todays_sales_product)

    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="product-card mb-30">
        <div class="product-badge bg-danger">Sale</div>
        <a class="product-thumb" href="{{ route('details-page', $todays_sales_product->slug) }}">
          @if(!empty($todays_sales_product->image_url))
          <img class="products-page-product-img" src="{{ get_image_url( $todays_sales_product->image_url ) }}" alt="{{ basename( get_image_url( $todays_sales_product->image_url ) ) }}" />
          @else
          <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-body">
          <div class="product-category"><a href="#">Smart home</a></div>
          <h3 class="product-title"><a href="{{ route('details-page', $todays_sales_product->slug) }}">{!! $todays_sales_product->title !!}</a></h3>
          <h4 class="product-price">
            <!-- <del>$62.00</del>$49.99 -->
            <del>
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($todays_sales_product->id, $todays_sales_product->regular_price)), get_frontend_selected_currency()) !!}
            </del>
            @if( $todays_sales_product->type == 'simple_product' )
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($todays_sales_product->id, $todays_sales_product->price)), get_frontend_selected_currency()) !!}
            @elseif( $todays_sales_product->type == 'configurable_product' )
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $todays_sales_product->id) !!}
            @elseif( $todays_sales_product->type == 'customizable_product' || $todays_sales_product->type == 'downloadable_product')
              @if(count(get_product_variations($todays_sales_product->id))>0)
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $todays_sales_product->id) !!}
              @else
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($todays_sales_product->id, $todays_sales_product->price)), get_frontend_selected_currency()) !!}
              @endif
            @endif
          </h4>
        </div>
        <div class="product-button-group">

          <a class="product-button btn-wishlist product-wishlist" data-id="{{ $todays_sales_product->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
            <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
          </a>
          <a class="product-button btn-compare product-compare" data-id="{{ $todays_sales_product->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
            <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
          </a>
          <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $todays_sales_product->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $todays_sales_product->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
            <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
          </a>

       </div>
      </div>
    </div>  
  @endforeach
  </div>

  <div class="text-center">
    <a class="btn btn-outline-secondary" href="{{ Request::is('cac-san-pham')?'active':''}}">{{ trans('frontend.view_all_products') }}</a>
  </div>

</section>
@endif

<!-- Featured Products-->
<section class="container padding-bottom-2x mb-2">
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.features_products') }}</h2>
  <div class="row">

  @foreach($advancedData['features_items'] as $key => $features_product)

    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="product-card mb-30">
        <div class="product-badge bg-danger">Sale</div>
        <a class="product-thumb" href="{{ route('details-page', $features_product->slug) }}">
          @if(!empty($features_product->image_url))
          <img class="products-page-product-img" src="{{ get_image_url( $features_product->image_url ) }}" alt="{{ basename( get_image_url( $features_product->image_url ) ) }}" />
          @else
          <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-body">
          <div class="product-category"><a href="#">Smart home</a></div>
          <h3 class="product-title"><a href="{{ route('details-page', $features_product->slug) }}">{!! $features_product->title !!}</a></h3>
          <h4 class="product-price">
            <!-- <del>$62.00</del>$49.99 -->
            <del>
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->regular_price)), get_frontend_selected_currency()) !!}
            </del>
            @if( $features_product->type == 'simple_product' )
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->price)), get_frontend_selected_currency()) !!}
            @elseif( $features_product->type == 'configurable_product' )
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_product->id) !!}
            @elseif( $features_product->type == 'customizable_product' || $features_product->type == 'downloadable_product')
              @if(count(get_product_variations($features_product->id))>0)
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_product->id) !!}
              @else
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->price)), get_frontend_selected_currency()) !!}
              @endif
            @endif
          </h4>
        </div>
        <div class="product-button-group">

          <a class="product-button btn-wishlist product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
            <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
          </a>
          <a class="product-button btn-compare product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
            <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
          </a>
          <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $features_product->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
            <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
          </a>

       </div>
      </div>
    </div>  
  @endforeach
  </div>

  <div class="text-center">
    <a class="btn btn-outline-secondary" href="{{ Request::is('cac-san-pham')?'active':''}}">{{ trans('frontend.view_all_products') }}</a>
  </div>

</section>

<!-- Recommended Products-->
<section class="container padding-bottom-2x mb-2">
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.recommended_products') }}</h2>
  <div class="row">

  @foreach($advancedData['recommended_items'] as $key => $recommended_product)
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="product-card mb-30">
        <div class="product-badge bg-danger">Sale</div>
        <a class="product-thumb" href="{{ route('details-page', $features_product->slug) }}">
          @if(!empty($recommended_product->image_url))
          <img class="products-page-product-img" src="{{ get_image_url( $recommended_product->image_url ) }}" alt="{{ basename( get_image_url( $recommended_product->image_url ) ) }}" />
          @else
          <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-body">
          <div class="product-category"><a href="#">Smart home</a></div>
          <h3 class="product-title"><a href="{{ route('details-page', $recommended_product->slug) }}">{!! $recommended_product->title !!}</a></h3>
          <h4 class="product-price">
            <!-- <del>$62.00</del>$49.99 -->
            <del>
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->regular_price)), get_frontend_selected_currency()) !!}
            </del>
            @if( $recommended_product->type == 'simple_product' )
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->price)), get_frontend_selected_currency()) !!}
            @elseif( $recommended_product->type == 'configurable_product' )
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_product->id) !!}
            @elseif( $recommended_product->type == 'customizable_product' || $recommended_product->type == 'downloadable_product')
              @if(count(get_product_variations($recommended_product->id))>0)
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_product->id) !!}
              @else
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->price)), get_frontend_selected_currency()) !!}
              @endif
            @endif
          </h4>
        </div>
        <div class="product-button-group">

          <a class="product-button btn-wishlist product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
            <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
          </a>
          <a class="product-button btn-compare product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
            <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
          </a>
          <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $features_product->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
            <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
          </a>

       </div>
      </div>
    </div>  
  @endforeach
  </div>

  <div class="text-center">
    <a class="btn btn-outline-secondary" href="{{ Request::is('cac-san-pham')?'active':''}}">{{ trans('frontend.view_all_products') }}</a>
  </div>
</section>

<!-- CTA-->
<section class="fw-section padding-top-4x padding-bottom-8x" style="background-image: url(img/banners/shop-banner-bg-02.jpg);"><span class="overlay" style="opacity: .7;"></span>
  <div class="container text-center">
    <div class="d-inline-block bg-danger text-white text-lg py-2 px-3 rounded">Limited Time Offer</div>
    <div class="display-4 text-white py-4">Ultimate Printing Solution From</div>
    <div class="d-inline-block w-200 pt-2"><img class="d-block w-100" src="img/banners/shop-banner-logo.png" alt="Canon"></div>
    <div class="pt-5"></div>
    <div class="countdown countdown-inverse" data-date-time="12/30/2019 12:00:00">
      <div class="item">
        <div class="days">00</div><span class="days_ref">Days</span>
      </div>
      <div class="item">
        <div class="hours">00</div><span class="hours_ref">Hours</span>
      </div>
      <div class="item">
        <div class="minutes">00</div><span class="minutes_ref">Mins</span>
      </div>
      <div class="item">
        <div class="seconds">00</div><span class="seconds_ref">Secs</span>
      </div>
    </div>
  </div>
</section><a class="d-block position-relative mx-auto" href="shop-grid-ls.html" style="max-width: 682px; margin-top: -130px; z-index: 10;"><img class="d-block w-100" src="img/banners/shop-banner-02.png" alt="Printers"></a>
<!-- Staff Picks (Widgets)-->
<section class="container padding-top-3x padding-bottom-2x">
  <h2 class="h3 pb-3 text-center">Staff Picks</h2>
  <div class="row pt-1">
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">Best Sellers</h3>
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/01.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">GoPro Hero4 Silver</a></h4><span class="entry-meta">$287.99</span>
          </div>
        </div>
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/02.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Puro Sound Labs BT2200</a></h4><span class="entry-meta">$95.99</span>
          </div>
        </div>
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/03.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">HP OfficeJet Pro 8710</a></h4><span class="entry-meta">$89.70</span>
          </div>
        </div><a class="btn btn-outline-secondary btn-sm mb-0" href="shop-grid-ls.html">View More</a>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">New Arrivals</h3>
        <!-- Entry-->
        <div class="entry pb-2">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/05.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">iPhone X 256 GB Space Gray</a></h4><span class="entry-meta">$1,450.00</span>
          </div>
        </div>
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/04.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Canon EOS M50 Mirrorless Camera</a></h4><span class="entry-meta">$910.00</span>
          </div>
        </div>
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/07.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Microsoft Xbox One S</a></h4><span class="entry-meta">$298.99</span>
          </div>
        </div><a class="btn btn-outline-secondary btn-sm mb-0" href="shop-grid-ls.html">View More</a>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">Top Rated</h3>
        <!-- Entry-->
        <div class="entry pb-2">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/08.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Samsung Gear 360 VR Camera</a></h4><span class="entry-meta">$68.00</span>
          </div>
        </div>
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/09.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Samsung Galaxy S9+ 64 GB</a></h4><span class="entry-meta">$839.99</span>
          </div>
        </div>
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb"><a href="shop-single.html"><img src="img/shop/widget/10.jpg" alt="Product"></a></div>
          <div class="entry-content">
            <h4 class="entry-title"><a href="shop-single.html">Zeus Bluetooth Headphones</a></h4><span class="entry-meta">$28.99</span>
          </div>
        </div><a class="btn btn-outline-secondary btn-sm mb-0" href="shop-grid-ls.html">View More</a>
      </div>
    </div>
  </div>
</section>
<!-- Popular Brands Carousel-->
<section class="bg-secondary padding-top-3x padding-bottom-3x">
  <div class="container">
    <h2 class="h3 text-center mb-30 pb-3">Popular Brands</h2>
    <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/01.png" alt="IBM"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/02.png" alt="Sony"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/03.png" alt="HP"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/04.png" alt="Canon"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/05.png" alt="Bosh"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/06.png" alt="Dell"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/07.png" alt="Samsung"></div>
  </div>
</section>
<!-- Services-->
<section class="container padding-top-3x padding-bottom-2x">
  <div class="row">
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/01.png" alt="Shipping">
      <h6 class="mb-2">Free Worldwide Shipping</h6>
      <p class="text-sm text-muted mb-0">Free shipping for all orders over $100</p>
    </div>
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/02.png" alt="Money Back">
      <h6 class="mb-2">Money Back Guarantee</h6>
      <p class="text-sm text-muted mb-0">We return money within 30 days</p>
    </div>
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/03.png" alt="Support">
      <h6 class="mb-2">24/7 Customer Support</h6>
      <p class="text-sm text-muted mb-0">Friendly 24/7 customer support</p>
    </div>
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/04.png" alt="Payment">
      <h6 class="mb-2">Secure Online Payment</h6>
      <p class="text-sm text-muted mb-0">We posess SSL / Secure Certificate</p>
    </div>
  </div>
</section>