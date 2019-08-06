<!-- Off-Canvas Wrapper-->
<!-- Page Content-->

@if($appearance_all_data['header_details']['slider_visibility'] == true && Request::is('/'))
<?php $count = count(get_appearance_header_settings_data());?>

<!-- Main Slider-->
<section class="hero-slider" style="background-image: url(img/hero-slider/main-bg.jpg);">
    <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
    
        @if($count > 0)
        @foreach(get_appearance_header_settings_data() as $img)
            <div class="item">
            <div class="container padding-top-3x">
                <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                    <div class="from-bottom">
                    <img class="d-inline-block w-150 mb-4" src="img/hero-slider/logo02.png" alt="Puma">
                    <div class="h2 text-body text-normal mb-2 pt-1">Puma Backpacks Collection</div>
                    <div class="h2 text-body text-normal mb-4 pb-1">starting at <span class="text-bold">$37.99</span></div>
                    </div>
                    <a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">View Offers {{ $count }}</a>
                </div>
                <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="{{ get_image_url($img->img_url) }}" alt="Puma Backpack"></div>
                </div>
            </div>
            </div>
        @endforeach
        @else
        <div class="item">
            <div class="container padding-top-3x">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                <div class="from-bottom"><img class="d-inline-block w-150 mb-4" src="img/hero-slider/logo02.png" alt="Puma">
                    <div class="h2 text-body text-normal mb-2 pt-1">Puma Backpacks Collection</div>
                    <div class="h2 text-body text-normal mb-4 pb-1">starting at <span class="text-bold">$37.99</span></div>
                </div><a class="btn btn-primary scale-up delay-1" href="shop-grid-ls.html">View Offers</a>
                </div>
                <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" src="img/hero-slider/02.png" alt="Puma Backpack"></div>
            </div>
            </div>
        </div>
        @endif
    
    </div>
</section>
@endif 

<!-- Top Categories-->
<section class="container padding-top-3x">
<h3 class="text-center mb-30">Sản phẩm được ưa chuộng</h3>
<div class="row">
    @if(count($productCategoriesTree) > 0)
    <?php $i = 1; $j = 0;?>
    @foreach($productCategoriesTree as $cat)
        @if ($i < 4)
        <div class="col-md-4 col-sm-6">
            <div class="card mb-30">
            <a class="card-img-tiles" href="{{ route('categories-page', $cat['slug']) }}">
                <div class="inner">

                    <div class="main-img"> 

                    @if( !empty($cat['img_url']) )
                        <img src="{{ get_image_url($cat['img_url']) }}"> 
                    @else
                        <img src="{{ default_placeholder_img_src() }}"> 
                    @endif

                    </div>
                
                <div class="thumblist">
                    {{-- @if( !empty($cat['img_url']) )
                    <img src="{{ get_image_url($cat['img_url']) }}"> 
                    @else
                    <img src="{{ default_placeholder_img_src() }}"> 
                    @endif --}}
                
                    <img src="img/shop/categories/02.jpg" alt="Category">
                    <img src="img/shop/categories/03.jpg" alt="Category">
                </div>
                </div>
            </a>
            <div class="card-body text-center">
                <h4 class="card-title">{!! $cat['name'] !!}</h4>
                <p class="text-muted">Starting from $49.99</p>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('categories-page', $cat['slug']) }}">View Products</a>
            </div>
            </div>
        </div>
        @endif
        <?php $i ++;?>
    @endforeach
    @endif
    
</div>
<div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="shop-categories.html">All Categories</a></div>
</section>
<!-- Promo #1-->
<section class="container-fluid padding-top-3x">
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 mb-30">
    <div class="rounded bg-faded position-relative padding-top-3x padding-bottom-3x"><span class="product-badge text-danger" style="top: 24px; left: 24px;">Sản phẩm khuyến mãi</span>
        <div class="text-center">
        <h3 class="h2 text-normal mb-1">New</h3>
        <h2 class="display-2 text-bold mb-2">Sunglasses</h2>
        <h4 class="h3 text-normal mb-4">collection at discounted price!</h4>
        <div class="countdown mb-3" data-date-time="12/30/2019 12:00:00">
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
        </div><br><a class="btn btn-primary margin-bottom-none" href="#">View Offers</a>
        </div>
    </div>
    </div>
    <div class="col-xl-5 col-lg-6 mb-30" style="min-height: 270px;">
    <div class="img-cover rounded" style="background-image: url(img/banners/home01.jpg);"></div>
    </div>
</div>
</section>
<!-- Promo #2-->
<section class="container-fluid">
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12">
    <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url(img/banners/home02.jpg);"><span class="overlay rounded" style="opacity: .35;"></span>
        <div class="text-center">
        <h3 class="display-4 text-normal text-white text-shadow mb-1">Bộ sưu tập mới</h3>
        <h2 class="display-2 text-bold text-white text-shadow">HUGE SALE!</h2>
        <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">at our outlet stores</h4><br><a class="btn btn-primary margin-bottom-none" href="contacts.html">Locate Stores</a>
        </div>
    </div>
    </div>
</div>
</section>

<!-- Featured Products-->
<section class="container padding-top-3x padding-bottom-3x">
        <h2 class="h3 pb-3 text-center">Sản phẩm tiêu biểu</h2>
        @if(count($advancedData['features_items']) > 0)

        <div class="row">
          @foreach($advancedData['features_items'] as $key => $features_product)
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="product-card mb-30">
              <div class="product-badge bg-danger">Sale</div>
              <div class="rating-stars">
                <i class="icon-star filled"></i>
                <i class="icon-star filled"></i>
                <i class="icon-star filled"></i>
                <i class="icon-star filled"></i>
                <i class="icon-star"></i>
              </div>
              <a class="product-thumb" href="{{ route('details-page', $features_product->slug ) }}">
                  @if(!empty($features_product->image_url))
                    <img src="{{ get_image_url( $features_product->image_url ) }}" alt="{{ basename( get_image_url( $features_product->image_url ) ) }}" />
                  @else
                    <img src="{{ default_placeholder_img_src() }}" alt="" />
                  @endif
              </a>
              <div class="product-card-body">
                {{-- <div class="product-category"><a href="#">{!! $features_product->title !!}</a></div> --}}
                <h3 class="product-title">
                  <a href="{{ route('details-page', $features_product->slug ) }}">{!! $features_product->title !!}</a>
                </h3>
                <h4 class="product-price">
                  <del>
                    {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->regular_price)), get_frontend_selected_currency()) !!}
                  </del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->price)), get_frontend_selected_currency()) !!}
                </h4>
              </div>
              <div class="product-button-group">
                <a class="product-button btn-wishlist" href="#"><i class="icon-heart"></i><span>Wishlist</span></a>
                <a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a>
                <a class="product-button btn-compare" href="#"><i class="icon-repeat"></i><span>Compare</span></a>
                <a class="product-button" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-shopping-cart"></i><span>To Cart</span></a></div>
            </div>
          </div>
          @endforeach
          
        </div>
        @endif
        <div class="text-center"><a class="btn btn-outline-secondary" href="shop-grid-ls.html">View All Products</a></div>
      </section>
      <!-- Product Widgets-->
      <section class="container padding-bottom-2x">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">{!! trans('frontend.latest_label') !!}</h3>

              @if(count($advancedData['latest_items']) > 0)
                @foreach($advancedData['latest_items'] as $key => $latest_product)
                  <!-- Entry-->
                  <div class="entry">
                    <div class="entry-thumb">
                      <a href="{{ route('details-page', $latest_product->slug ) }}">
                          @if(!empty($latest_product->image_url))
                          <img class="d-block" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
                          @else
                          <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                          @endif
                      </a>
                    </div>
                    <div class="entry-content">
                      <h4 class="entry-title">
                        <a href="{{ route('details-page', $latest_product->slug ) }}">{!! $latest_product->title !!}</a>
                      </h4>
                      <span class="entry-meta">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), get_frontend_selected_currency()) !!}</span>
                    </div>
                  </div>
                @endforeach
              @else
                <p class="not-available">{!! trans('frontend.latest_products_empty_label') !!}</p>
              @endif
              
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">{!! trans('frontend.best_sales_label') !!}</h3>
              @if(count($advancedData['best_sales']) > 0)
                @foreach($advancedData['best_sales'] as $key => $best_sales_product)
                  <!-- Entry-->
                  <div class="entry">
                    <div class="entry-thumb">
                      <a href="{{ route('details-page', $best_sales_product->slug ) }}">
                          @if(!empty($best_sales_product->image_url))
                          <img class="d-block" src="{{ get_image_url( $best_sales_product->image_url ) }}" alt="{{ basename( get_image_url( $best_sales_product->image_url ) ) }}" />
                          @else
                          <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                          @endif
                      </a>
                    </div>
                    <div class="entry-content">
                      <h4 class="entry-title">
                        <a href="{{ route('details-page', $best_sales_product->slug ) }}">{!! $best_sales_product->title !!}</a>
                      </h4>
                      <span class="entry-meta">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_sales_product->id, $best_sales_product->price)), get_frontend_selected_currency()) !!}</span>
                    </div>
                  </div>
                @endforeach
              @else
                <p class="not-available">{!! trans('frontend.best_sales_products_empty_label') !!}</p>
              @endif
              
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="widget widget-featured-products">
              <h3 class="widget-title">{!! trans('frontend.todays_sale_label') !!}</h3>
              @if(count($advancedData['todays_deal']) > 0)
                @foreach($advancedData['todays_deal'] as $key => $todays_sales_product)
                  <!-- Entry-->
                  <div class="entry">
                    <div class="entry-thumb">
                      <a href="{{ route('details-page', $todays_sales_product->slug ) }}">
                          @if(!empty($todays_sales_product->image_url))
                          <img class="d-block" src="{{ get_image_url( $todays_sales_product->image_url ) }}" alt="{{ basename( get_image_url( $todays_sales_product->image_url ) ) }}" />
                          @else
                          <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="" />
                          @endif
                      </a>
                    </div>
                    <div class="entry-content">
                      <h4 class="entry-title">
                        <a href="{{ route('details-page', $todays_sales_product->slug ) }}">{!! $todays_sales_product->title !!}</a>
                      </h4>
                      <span class="entry-meta">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($todays_sales_product->id, $todays_sales_product->price)), get_frontend_selected_currency()) !!}</span>
                    </div>
                  </div>
                @endforeach
              @else
                <p class="not-available">{!! trans('frontend.todays_products_empty_label') !!}</p>
              @endif
              
            </div>
          </div>
        </div>
      </section>
      <!-- Popular Brands-->
      <section class="bg-faded padding-top-3x padding-bottom-3x">
        <div class="container">
          <h3 class="text-center mb-30 pb-2">Gian hàng hoạt động hiệu quả</h3>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/01.png" alt="Adidas"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/02.png" alt="Brooks"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/03.png" alt="Valentino"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/04.png" alt="Nike"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/05.png" alt="Puma"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/06.png" alt="New Balance"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/07.png" alt="Dior"></div>
        </div>
      </section>
      <!-- Services-->
      <section class="container padding-top-3x padding-bottom-2x">
        <div class="row">
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/01.png" alt="Shipping">
            <h6>Miễn phí vận chuyển</h6>
            <p class="text-muted margin-bottom-none">Miễn phí vận chuyển nội tỉnh</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/02.png" alt="Money Back">
            <h6>Đảm bảo hoàn tiền</h6>
            <p class="text-muted margin-bottom-none">Hoàn tiền trong vòng 30 ngày</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/03.png" alt="Support">
            <h6>Hỗ trợ 24/7</h6>
            <p class="text-muted margin-bottom-none">Hỗ trợ nhiệt thành, thân thiện</p>
          </div>
          <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/04.png" alt="Payment">
            <h6>Thanh toán an toàn</h6>
            <p class="text-muted margin-bottom-none">Có chứng nhận SSL / Chứng chỉ bảo mật</p>
          </div>
        </div>
      </section>
