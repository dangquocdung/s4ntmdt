<!-- Main Slider-->

<!-- <section class="hero-slider" style="background-image: url(img/hero-slider/main-bg.jpg);">
  <div class="owl-carousel large-controls dots-inside" data-owl-carousel='{ "nav": true, "dots": true, "loop": true, "autoplay": true, "autoplayTimeout": 7000 }'>
    
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
</section> -->

<!-- Main Slider-->
{{-- <section class="hero-slider" style="background-image: url(img/hero-slider/main-bg.jpg);">
  <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
    
    <div class="item">
      <div class="container padding-top-3x">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
            <div class="from-bottom">
              <img class="d-inline-block w-150 mb-4" src="img/hero-slider/logo-iphone.png" alt="apple-iphone-11">
              <div class="h2 text-body mb-2 pt-1">Siêu phẩm: Apple iPhone 11</div>
              <div class="h2 text-body mb-4 pb-1">giá từ <span class="text-medium">21.490.000đ</span></div>
            </div>
            <a class="btn btn-primary scale-up delay-1" href="/san-pham/chi-tiet/iphone-11-64gb-chinh-hang">Vào xem&nbsp;<i class="icon-arrow-right"></i></a>
          </div>
          <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto"  src="img/hero-slider/iphone-xi.png" alt="apple-iphone-11"></div>
        </div>
      </div>
    </div>

    <div class="item">
      <div class="container padding-top-3x">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
            <div class="from-bottom">
              <img class="d-inline-block w-150 mb-4" src="img/hero-slider/logo-iphone.png" alt="apple-iphone-11">
              <div class="h2 text-body mb-2 pt-1">Siêu phẩm: Apple iPhone 11 Pro</div>
              <div class="h2 text-body mb-4 pb-1">giá từ <span class="text-medium">29.990.000đ</span></div>
            </div>
            <a class="btn btn-primary scale-up delay-1" href="/san-pham/chi-tiet/apple-iphone-11-pro-64-gb-brand-new-seal">Vào xem&nbsp;<i class="icon-arrow-right"></i></a>
          </div>
          <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto"  src="img/hero-slider/iphone-xi-pro.png" alt="apple-iphone-11"></div>
        </div>
      </div>
    </div>

    <div class="item">
      <div class="container padding-top-3x">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
            <div class="from-bottom">
              <img class="d-inline-block w-150 mb-4" src="img/hero-slider/logo-iphone.png" alt="apple-iphone-11">
              <div class="h2 text-body mb-2 pt-1">Siêu phẩm: Apple iPhone 11 Pro Max</div>
              <div class="h2 text-body mb-4 pb-1">giá từ <span class="text-medium">34.490.000đ</span></div>
            </div>
            <a class="btn btn-primary scale-up delay-1" href="/san-pham/chi-tiet/apple-iphone-11-pro-max-256gb">Vào xem&nbsp;<i class="icon-arrow-right"></i></a>
          </div>
          <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto"  src="img/hero-slider/iphone-xi-pro-max.png" alt="apple-iphone-11"></div>
        </div>
      </div>
    </div>
  
  </div>
</section> --}}
<!-- Top Categories/Deals-->