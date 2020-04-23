@include('includes.frontend.home-section')
@yield('categories-slider-area')

<!-- Start banner Area -->

@if($appearance_all_data['header_details']['slider_visibility'] == false && Request::is('/'))


<section class="product-area pt-20">

  <div class="container">

    <div class="owl-carousel" data-owl-carousel='{ "autoplay": true, "loop": true }'>
        @foreach(get_appearance_header_settings_data() as $img)

            @if($img->img_url)
                <img src="{{ get_image_url($img->img_url) }}" alt="Sản phẩm nổi bật" />
            @endif

        @endforeach

    </div>

  </div>

</section>

@endif

<!-- Start banner Area -->

@include('includes.frontend.home-spcl')
@yield('product_area')

@if(count($vendors_list) > 0)  
<section class="bg-secondary padding-top-1x padding-bottom-2x">
  <div class="container">
    <div class="product-style">

      <h2 class="title text-center">{{ trans('frontend.gian-hang') }}</h2>

      <div class="owl-carousel padding-top-1x" data-owl-carousel='{ "nav": false, "dots": false, "loop": true, "autoplay": true, "autoplayTimeout": 4000, "responsive": {"0":{"items":2}, "470":{"items":3},"630":{"items":4},"991":{"items":5},"1200":{"items":6}} }'>
        @foreach($vendors_list['vendors'] as $vendor)
        
          @if($vendor->user_status == 1 && !is_vendor_expired($vendor->id))
            <?php $details = json_decode($vendor->details);?>
            <a href="{{ route('store-products-page-content', $vendor->name) }}">  

              @if(!empty($vendor->user_photo_url))
                <img class="d-block w-110 opacity-75 m-auto" src="{{ get_image_url($vendor->user_photo_url) }}" alt="{!! $details->profile_details->store_name !!}" title="{!! $details->profile_details->store_name !!}">
              @else
                <img class="d-block w-110 opacity-75 m-auto" src="{{ default_placeholder_img_src() }}" alt="{!! $details->profile_details->store_name !!}" title="{!! $details->profile_details->store_name !!}">
              @endif
            </a>
          @endif
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif

@if(count($blogs_data) > 0)  

<section class="bg-secondary padding-top-1x padding-bottom-2x">
    <div class="product-style">
      <h2 class="title text-center">{{ trans('frontend.latest_from_the_blog') }}</h2>

      <div class="tab-content another-product-style jump">
          <div class="tab-pane fade show active" id="latest_products" role="tabpanel">
            <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:5}} }">
              @foreach($blogs_data as $row)
                <div class="single-product mb-35">
                    <div class="product-img" style="height:120px">
                        <a href="{{ route('blog-single-page', $row['post_slug']) }}">

                          @if(!empty($row['blog_image']))  
                            <img src="{{ get_image_url($row['blog_image']) }}"  alt="{{ basename($row['blog_image']) }}">          
                          @else
                            <img src="{{ default_placeholder_img_src() }}"  alt="">         
                          @endif

                        </a>

                    </div>
                    <div class="product-content" style="padding-top: 0; margin-top:10px; text-align:center">
                        <div class="product-title-price">
                            <div class="product-title">
                                <h4>
                                  <a href="{{ route('blog-single-page', $row['post_slug']) }}">{!! $row['post_title'] !!}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
            </div>

          </div>
      </div>
    </div>
</section>
@endif



<!-- Services-->
<section class="container padding-top-3x padding-bottom-2x">
  <div class="row">
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/01.png" alt="Shipping">
      <h6 class="mb-2">Miễn phí vận chuyển</h6>
      <p class="text-sm text-muted mb-0">Miễn phí vận chuyển nội tỉnh cho các đơn hàng có giá trị từ 100.000đ</p>
    </div>
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/02.png" alt="Money Back">
      <h6 class="mb-2">Bảo đảm hoàn tiền</h6>
      <p class="text-sm text-muted mb-0">Hoàn tiền khi sản phẩm không đúng mô tả (trong vòng 30 ngày)</p>
    </div>
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/03.png" alt="Support">
      <h6 class="mb-2">Hỗ trợ khách hàng 24/7</h6>
      <p class="text-sm text-muted mb-0">Hỗ trợ khách hàng, gian hàng nhiệt thành, thân thiện</p>
    </div>
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/04.png" alt="Payment">
      <h6 class="mb-2">Thanh toán an toàn</h6>
      <p class="text-sm text-muted mb-0">Đảm bảo các tiêu chuẩn khi thanh toán trực tuyến</p>
    </div>
  </div>
</section>

