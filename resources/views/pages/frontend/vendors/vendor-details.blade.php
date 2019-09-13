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
        


      </div>
      
    

         
    </div>
    <!-- Sidebar          -->
    <div class="col-lg-3 order-lg-1">
      


    </div>
  </div>
</div>



@endsection 