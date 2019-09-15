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

    <section class="widget widget-categories">
      <h3 class="widget-title">{!! trans('frontend.store_label') !!}</h3>

      <ul class="list-icon">
        <li> <i class="icon-map-pin text-muted"></i> {!! $vendor_settings->profile_details->address_line_1 !!}</li>
        <li> <i class="icon-phone text-muted"></i> {!! $vendor_settings->profile_details->phone !!}</li>
        <li> <i class="icon-mail text-muted"></i>
          <a class="navi-link" href="mailto:{!! $vendor_info->email !!}"> {!! $vendor_info->email !!}</a>
        </li>
        <li> <i class="icon-calendar text-muted"></i> {!! Carbon\Carbon::parse( $vendor_info->created_at )->format('d-m-Y') !!}</li>
      </ul>

        @if($vendor_package_details->show_social_media_share_btn_on_store_page == true)  
          <div class="d-inline-block">
            <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="fb"><i class="socicon-facebook"></i></a>
            <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="gplus"><i class="socicon-twitter"></i></a>
            <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="instagram"><i class="socicon-instagram"></i></a>
            <a class="social-button shape-rounded sb-facebook" href="//{{ $vendor_settings->social_media->fb_follow_us_url }}" data-name="youtube"><i class="socicon-youtube"></i></a>
          </div> 
        @endif 

      </section>

      <section class="widget widget-categories">

          @include('includes.frontend.vendor-categories', array('user_name' => $vendor_info->name))
          @yield('vendor-categories-content')  

      </section>
        
        @if($vendor_package_details->show_map_on_store_page == true)

        <section class="widget widget-categories">
          <h3 class="widget-title">{!! trans('frontend.store_location_label') !!}</h3>
          <div id="location_map"></div>
        </section>
        
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
      
    </div>
  </div>
</div>

@endsection 