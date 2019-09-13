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

<div class="container padding-bottom-2x mb-2">
  

  @if(count($vendors_list) > 0)

  <div class="row">

  @foreach($vendors_list as $vendor)
    @if($vendor->user_status == 1 && !is_vendor_expired($vendor->id))
    <?php $details = json_decode($vendor->details);?>


    <div class="col-md-3 col-sm-6">
      <div class="card mb-30 gian-hang">
        

        @if(!empty($vendor->user_photo_url))
          <img class="card-img-top"src="{{ get_image_url($vendor->user_photo_url) }}" alt="{!! $details->profile_details->store_name !!}">
        @else
          <img class="card-img-top" src="{{ default_placeholder_img_src() }}" alt="{!! $details->profile_details->store_name !!}">
        @endif

        <div class="card-header">
          <a href="{{ route('store-details-page-content', $vendor->name) }}">{!! $details->profile_details->store_name !!}</a>
        </div>  

        <div class="card-body">
          <ul class="list-icon">
            <li> <i class="icon-map-pin text-muted"></i> {!! $details->profile_details->address_line_1 !!}</li>
            <li> <i class="icon-phone text-muted"></i> {!! $details->profile_details->phone !!}</li>
            <li> <i class="icon-mail text-muted"></i>
              <a class="navi-link" href="mailto:{!! $vendor->email !!}"> {!! $vendor->email !!}</a>
            </li>
            <li> <i class="icon-calendar text-muted"></i> {!! Carbon\Carbon::parse(  $vendor->created_at )->format('d-m-Y') !!}</li>


          </ul>
        </div>
      </div>
    </div>
    @endif
  @endforeach
          
  </div>
</div>  

@else
  <br>
  <p>{!! trans('admin.no_store_label') !!}</p>
@endif

@endsection