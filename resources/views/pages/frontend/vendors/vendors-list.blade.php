@extends('layouts.frontend.master')

@section('title', trans('frontend.vendor_list_title_label') .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.vendor_list_title_label') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="index.html">Home</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.vendor_list_title_label') }}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-1">
      <div class="row justify-content-center">
        <!-- Products-->
        <div class="col-lg-9">
          <!-- Promo banner-->
          <a class="alert alert-default alert-dismissible fade show fw-section mb-30" href="shop-grid-ls.html" style="background-image: url(img/banners/shop-banner-bg.jpg);"><span class="alert-close" data-dismiss="alert"></span>
            <div class="d-flex flex-wrap flex-md-nowrap justify-content-between align-items-center">
              <div class="mx-auto mx-md-0 px-3 pb-2 text-center text-md-left"><span class="d-block text-lg text-thin mb-2">Limited Time Deals</span>
                <h3 class="text-gray-dark">Surface Pro 4</h3>
                <p class="d-inline-block bg-warning text-white">&nbsp;&nbsp;Shop Now&nbsp;<i class="icon-chevron-right d-inline-block align-middle"></i>&nbsp;</p>
              </div>
              <img class="d-block mx-auto mx-md-0" src="img/banners/shop-banner.png" alt="Surface Pro 4">
            </div>
          </a>


          
          @if(count($vendors_list) > 0)
            @foreach($vendors_list as $vendor)
              @if($vendor->user_status == 1 && !is_vendor_expired($vendor->id))
                <?php $details = json_decode($vendor->details);?>
          

                <!-- Products List-->
                <div class="product-card product-list mb-30">
                  <a class="product-thumb" href="{{ route('store-details-page-content', $vendor->name) }}">
                    <!-- <div class="product-badge bg-danger">Uy tín</div> -->
                    @if(!empty($vendor->user_photo_url))
                      <img src="{{ get_image_url($vendor->user_photo_url) }}">
                    @else
                      <img src="{{ default_placeholder_img_src() }}">
                    @endif
                  </a>
                  <div class="product-card-inner">
                    <div class="product-card-body">
                      <h3 class="product-title">
                        <a href="{{ route('store-details-page-content', $vendor->name) }}">{!! $details->profile_details->store_name !!}</a>
                      </h3>
                      <div class="vendor-address"><strong>{!! trans('frontend.address_label') !!}:</strong>&nbsp;&nbsp;{!! $details->profile_details->address_line_1 !!}</div>
                      <div class="vendor-email"><strong>{!! trans('frontend.email_label') !!}:</strong>&nbsp;&nbsp;{!! $vendor->email !!}</div>
                      <div class="vendor-phone"><strong>{!! trans('frontend.phone') !!}:</strong>&nbsp;&nbsp;{!! $details->profile_details->phone !!}</div>
                      <div class="vendor-created"><strong>{!! trans('frontend.member_since_label') !!}:</strong>&nbsp;&nbsp;{!! Carbon\Carbon::parse(  $vendor->created_at )->format('F d, Y') !!}</div>
                
                      <p class="text-sm text-muted hidden-xs-down my-1">
                        <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odit officiis illo perferendis deserunt, ipsam dolor ad dolorem eaque veritatis. -->
                      </p>
                    </div>
                  </div>
                </div>

              @endif
            @endforeach
          @else
          <br>
          <p>{!! trans('admin.no_store_label') !!}</p>
          @endif
          


          
        </div>
      </div>
    </div>
      

@endsection