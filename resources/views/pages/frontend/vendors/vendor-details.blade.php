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
s
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
      
    

         
    </div>
    <!-- Sidebar          -->
    <div class="col-lg-3 order-lg-1">
      

    
    </div>
  </div>
</div>



@endsection 