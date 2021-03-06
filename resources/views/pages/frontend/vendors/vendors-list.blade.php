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
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.vendor_list_title_label') }}</li>
      </ul>
    </div>
  </div>
</div>

<div class="container padding-bottom-2x mb-2" id="vendors-page">

  

  @if(count($vendors_list) > 0)

  <div class="isotope-grid cols-4 mb-2">
      <div class="gutter-sizer"></div>
      <div class="grid-sizer"></div>

      @foreach($vendors_list as $vendor)
      
        @if($vendor->user_status == 1 && !is_vendor_expired($vendor->id))
        <?php $details = json_decode($vendor->details);?>

        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
          <div class="card mb-30 gian-hang">

            @if(!empty($vendor->user_photo_url))
              <img class="d-block mx-auto img-thumbnail rounded-circle mt-3 mb-3" src="{{ get_image_url($vendor->user_photo_url) }}" alt="{!! $details->profile_details->store_name !!}" style="height:180px;">
            @else
              <img class="d-block mx-auto img-thumbnail rounded-circle mt-3 mb-3" src="{{ default_placeholder_img_src() }}" alt="{!! $details->profile_details->store_name !!}" style="height:180px;">
            @endif

            <div class="card-header">
              <a href="{{ route('store-products-page-content', $vendor->name) }}">{!! $details->profile_details->store_name !!}</a>
            </div>  

          </div>
        </div>
        @endif
      @endforeach
          
  </div> 
  
  <!-- Pagination-->
  <nav class="phan-trang">
    <div class="column">
      {!! $vendors_list->appends(Request::capture()->except('page'))->render() !!}
    </div>

    <!-- <div class="column text-left hidden-xs-down">
      <a class="btn btn-outline-secondary btn-sm" href="#"><i class="icon-chevron-left"></i>&nbsp;Previous</a>
    </div>
    <div class="column text-right hidden-xs-down">
      <a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-chevron-right"></i></a>
    </div> -->
  </nav>

  <br>
  <br>

@else
  <br>
  <p>{!! trans('admin.no_store_label') !!}</p>
@endif

@endsection