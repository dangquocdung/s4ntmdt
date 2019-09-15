@extends('layouts.frontend.master')
@section('title', trans('frontend.vendor_details_title_label') .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! $vendor_settings->profile_details->store_name !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>
          <a href="{{ route('store-list-page-content') }}">{!! trans('frontend.vendor_list_title_label') !!}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{!! $vendor_settings->profile_details->store_name !!}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-1">
  <div class="row">
    <!-- Products-->
    <div class="col-lg-9 order-lg-2">

      <!-- Promo banner-->
      <a class="alert alert-default alert-dismissible fade show fw-section mb-30" href="{{ route('shop-page') }}" style="background-image: url('/img/banners/shop-banner-bg.jpg');">
      
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-between align-items-center">
          <div class="mx-auto mx-md-0 px-3 pb-2 text-center text-md-left">
            <span class="d-block text-lg text-thin mb-2">{!! trans('frontend.gian-hang') !!}</span>
            <h3 class="text-gray-dark">{!! $vendor_settings->profile_details->store_name !!}</h3>

            <div class="rating-stars">
              <i class="icon-star filled"></i>
              <i class="icon-star filled"></i>
              <i class="icon-star filled"></i>
              <i class="icon-star filled"></i>
              <i class="icon-star filled"></i>
            </div>

            <!-- <div class="vendor-review">
              <div class="review-stars">
                <div class="star-rating"><span style="width:{{ $vendor_reviews_rating_details['percentage'] }}%"></span></div>
              </div>
            </div> -->
            <!-- <p class="d-inline-block bg-warning text-white">&nbsp;&nbsp;Shop Now&nbsp;<i class="icon-chevron-right d-inline-block align-middle"></i>&nbsp;</p> -->
          </div>

          <!-- @if( !empty($vendor_settings) && !empty($vendor_settings->general_details->cover_img) )  
            <img class="d-block mx-auto mx-md-0" src="{{ get_image_url( $vendor_settings->general_details->cover_img ) }}" alt="{!! $vendor_settings->profile_details->store_name !!}">
          @else
            <img class="d-block mx-auto mx-md-0" src="{{ default_vendor_cover_img_src() }}" alt="{!! $vendor_settings->profile_details->store_name !!}">
          @endif -->

        </div>

      </a>
      <!-- Shop Toolbar-->
      <div class="shop-toolbar padding-bottom-1x mb-2">
        
        <ul class="nav nav-pills" role="tablist">
          @if(Request::is('gian-hang/chi-tiet/trang-chu/*'))  
            <li class="nav-item"><a class="nav-link active" href="{{ route('store-details-page-content', $vendor_info->name) }}" ><i class="icon-home"></i>&nbsp;{!! trans('frontend.shopist_home_title') !!}</a></li>
          @else  
            <li class="nav-item"><a class="nav-link" href="{{ route('store-details-page-content', $vendor_info->name) }}" ><i class="icon-home"></i>&nbsp;{!! trans('frontend.shopist_home_title') !!}</a></li>
          @endif

          @if(Request::is('gian-hang/chi-tiet/san-pham/*'))  
            <li class="nav-item"><a class="nav-link active" href="{{ route('store-products-page-content', $vendor_info->name) }}" ><i class="icon-search"></i>&nbsp;{!! trans('frontend.all_products_label') !!}</a></li>
          @else  
            <li class="nav-item"><a class="nav-link" href="{{ route('store-products-page-content', $vendor_info->name) }}" ><i class="icon-search"></i>&nbsp;{!! trans('frontend.all_products_label') !!}</a></li>
          @endif

          @if(Request::is('gian-hang/chi-tiet/danh-gia/*'))  
            <li class="nav-item"><a class="nav-link active" href="{{ route('store-reviews-page-content', $vendor_info->name) }}" ><i class="icon-mail"></i>&nbsp;{!! trans('frontend.reviews_label') !!}</a></li>
          @else  
            <li class="nav-item"><a class="nav-link" href="{{ route('store-reviews-page-content', $vendor_info->name) }}" ><i class="icon-mail"></i>&nbsp;{!! trans('frontend.reviews_label') !!}</a></li>
          @endif
        </ul>

        <div class="tab-content">

          @if(Request::is('gian-hang/chi-tiet/trang-chu/*'))
            @include('pages.frontend.vendors.vendors-home')
            @yield('vendors-home-page-content')
          @endif

          @if(Request::is('gian-hang/chi-tiet/san-pham/*'))
            @include('pages.frontend.vendors.vendors-products')
            @yield('vendors-products-page-content')
          @endif
          
          @if(Request::is('sian-hang/chi-tiet/cat/san-pham/*'))
            @include('pages.frontend.vendors.vendors-category-products')
            @yield('vendors-categoty-products-page-content')
          @endif

          @if(Request::is('gian-hang/chi-tiet/danh-gia/*'))
            @include('pages.frontend.vendors.vendors-reviews')
            @yield('vendors-reviews-page-content')  
          @endif

        </div>

      </div>

      @if($vendor_package_details->show_social_media_follow_btn_on_store_page == true)  
        <div class="d-flex flex-wrap justify-content-between" style="float:right">
          <div class="mt-2 mb-2">
            <span class="text-muted">{!! trans('frontend.share_label') !!}:&nbsp;&nbsp;</span>
            <div class="d-inline-block">
              <a class="social-button shape-rounded sb-facebook" href="{{ $vendor_settings->social_media->fb_follow_us_url  }}" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
              <a class="social-button shape-rounded sb-twitter" href="{{ $vendor_settings->social_media->twitter_follow_us_url }}" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
              <a class="social-button shape-rounded sb-instagram" href="{{ $vendor_settings->social_media->instagram_follow_us_url }}" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a>
              <a class="social-button shape-rounded sb-youtube" href="{{ $vendor_settings->social_media->youtube_follow_us_url }}" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-youtube"></i></a>
            </div>
          </div>
        </div>
      @endif
      
    </div>
    <!-- Sidebar-->
    <div class="col-lg-3 order-lg-1">

      <ul class="list-icon">
        <li> <i class="icon-map-pin text-muted"></i> {!! $vendor_settings->profile_details->address_line_1 !!}</li>
        <li> <i class="icon-phone text-muted"></i> {!! $vendor_settings->profile_details->phone !!}</li>
        <li> <i class="icon-mail text-muted"></i>
          <a class="navi-link" href="mailto:{!! $vendor_info->email !!}"> {!! $vendor_info->email !!}</a>
        </li>
        <li> <i class="icon-calendar text-muted"></i> {!! Carbon\Carbon::parse( $vendor_info->created_at )->format('d-m-Y') !!}</li>
      </ul>

      @if($vendor_package_details->show_social_media_share_btn_on_store_page == true)  
        <div class="d-flex flex-wrap justify-content-between">
          <div class="mt-2 mb-2">
            <span class="text-muted">{!! trans('frontend.share_label') !!}:&nbsp;&nbsp;</span>

            <div class="d-inline-block">
              <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="fb"><i class="socicon-facebook"></i></a>
              <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="gplus"><i class="socicon-twitter"></i></a>
              <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="instagram"><i class="socicon-instagram"></i></a>
              <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="youtube"><i class="socicon-youtube"></i></a>
            </div> 
          </div>
        </div> 
        <hr><br>
      @endif 

      @if(Request::is('store/details/products/*') || Request::is('store/details/cat/products/*'))  

        @if(Request::is('store/details/products/*'))
        <div class="product-categories-list">
            @include('includes.frontend.vendor-categories', array('user_name' => $vendor_info->name))
            @yield('vendor-categories-content')  
        </div>
        @elseif(Request::is('store/details/cat/products/*'))
        <div class="product-categories-list">
            @include('includes.frontend.vendor-categories-page')
            @yield('vendor-categories-page-content')
        </div>		
        @endif

        <div class="filter-panel">
          <div class="filter-option-title">{{ trans('frontend.filter_options_label') }}</div>
          <form action="{{ $vendor_products['action_url'] }}" method="get">
            <div class="price-filter">
              <h2><span>{!! trans('frontend.price_range_label') !!}</span></h2>
              <div class="price-slider-option">
                <input type="text" class="span2" value="" data-slider-min="{{ get_appearance_settings()['general']['filter_price_min'] }}" data-slider-max="{{ get_appearance_settings()['general']['filter_price_max'] }}" data-slider-step="5" data-slider-value="[{{ $vendor_products['min_price'] }},{{ $vendor_products['max_price'] }}]" id="price_range" ><br />
                <b>{!! price_html(get_appearance_settings()['general']['filter_price_min'], get_frontend_selected_currency()) !!}</b> <b class="pull-right">{!! price_html(get_appearance_settings()['general']['filter_price_max'], get_frontend_selected_currency()) !!}</b>

                <input name="price_min" id="price_min" value="{{ $vendor_products['min_price'] }}" type="hidden">
                <input name="price_max" id="price_max" value="{{ $vendor_products['max_price'] }}" type="hidden">
              </div>
            </div>  
                            
            @if(count($colors_list_data) > 0)
            <div class="colors-filter">
              <h2><span>{!! trans('frontend.choose_color_label') !!}</span></h2>
              <div class="colors-filter-option">
                @foreach($colors_list_data as $terms)
                <div class="colors-filter-elements">
                  <div class="chk-filter">
                    @if(count($vendor_products['selected_colors']) > 0 && in_array($terms['slug'], $vendor_products['selected_colors']))  
                    <input type="checkbox" checked class="shopist-iCheck chk-colors-filter" value="{{ $terms['slug'] }}">
                    @else
                    <input type="checkbox" class="shopist-iCheck chk-colors-filter" value="{{ $terms['slug'] }}">
                    @endif
                  </div>
                  <div class="filter-terms">
                    <div class="filter-terms-appearance"><span style="background-color:#{{ $terms['color_code'] }};width:21px;height:20px;display:block;"></span></div>
                    <div class="filter-terms-name">&nbsp; {!! $terms['name'] !!}</div>
                  </div>
                </div>
                @endforeach
              </div>
              @if($vendor_products['selected_colors_hf'])
              <input name="selected_colors" id="selected_colors" value="{{ $vendor_products['selected_colors_hf'] }}" type="hidden">
              @endif
            </div>
            @endif
                            
            @if(count($sizes_list_data) > 0)
            <div class="size-filter">
              <h2><span>{!! trans('frontend.choose_size_label') !!}</span></h2>
              <div class="size-filter-option">
                @foreach($sizes_list_data as $terms)
                <div class="size-filter-elements">
                  <div class="chk-filter">
                    @if(count($vendor_products['selected_sizes']) > 0 && in_array($terms['slug'], $vendor_products['selected_sizes']))  
                    <input type="checkbox" checked class="shopist-iCheck chk-size-filter" value="{{ $terms['slug'] }}">
                    @else
                    <input type="checkbox" class="shopist-iCheck chk-size-filter" value="{{ $terms['slug'] }}">
                    @endif
                  </div>
                  <div class="filter-terms">
                    <div class="filter-terms-name">{!! $terms['name'] !!}</div>
                  </div>
                </div>
                @endforeach
              </div> 
              @if($vendor_products['selected_sizes_hf'])
              <input name="selected_sizes" id="selected_sizes" value="{{ $vendor_products['selected_sizes_hf'] }}" type="hidden">
              @endif
            </div>
            @endif
                            
            <div class="btn-filter clearfix">
              <button class="btn btn-sm" type="submit"><i class="fa fa-filter" aria-hidden="true"></i> {!! trans('frontend.filter_label') !!}</button>
              <a class="btn btn-sm" href="{{ route('store-products-page-content', $vendor_info->name) }}"><i class="fa fa-close" aria-hidden="true"></i> {!! trans('frontend.clear_filter_label') !!}</a>  
            </div>
          </form>
        </div>
      @else
        @if($vendor_package_details->show_map_on_store_page == true)
        <div class="vendor-location">
          <div class="vendor-location-content">
            <h2><span>{!! trans('frontend.store_location_label') !!}</span></h2>
            <div id="location_map"></div>
          </div>    
        </div>  
        <br><br>
        @endif
        
        @if($vendor_package_details->show_contact_form_on_store_page == true)
        <div class="contact-vendor">
          <div class="contact-vendor-content clearfix">
            <h2><span>{!! trans('frontend.contact_vendor_label') !!}</span></h2>
            <div class="form-group">
              <input class="form-control" name="contact_name" id="contact_name" placeholder="{{ trans('frontend.enter_name_label') }}" type="text">
            </div>
            <div class="form-group">
              <input class="form-control" name="contact_email_id" id="contact_email_id" placeholder="{{ trans('frontend.enter_email_label') }}" type="text">
            </div>
            <div class="form-group">
              <textarea class="form-control" name="contact_message" id="contact_message" placeholder="{{ trans('frontend.enter_your_message_label') }}"></textarea>
            </div>  
            <button class="pull-right btn btn-default btn-style" type="button" id="sendVendorContactMessage" name="sendVendorContactMessage">{!! trans('frontend.send_label') !!} <i class="fa fa-arrow-circle-right"></i></button>  
          </div>
        </div> 
        @endif
      @endif
      
    </div>
  </div>
</div>

@endsection 