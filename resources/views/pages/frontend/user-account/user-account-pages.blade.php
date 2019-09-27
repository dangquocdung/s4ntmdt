@extends('layouts.frontend.master')

@php

  if(Request::is('user/account')){

    $title = 'frontend_user_dashboard_title';

  } 
  elseif (Request::is('user/account/dashboard')) {
    $title = 'frontend_user_dashboard_title';
  }
  elseif (Request::is('user/account/my-address')) {
    $title = 'frontend_user_address_title';
  }
  elseif (Request::is('user/account/my-address/add')) {
    $title = 'frontend_user_address_add_title';
  }
  elseif (Request::is('user/account/my-address/edit')) {
    $title = 'frontend_user_address_edit_title';
  }
  elseif (Request::is('user/account/my-profile')) {
    $title = 'frontend_user_profile_edit_title';
  }
  elseif (Request::is('user/account/my-orders')) {
    $title = 'frontend_my_order_title';
  }
  elseif (Request::is('user/account/my-saved-items')) {
    $title = 'frontend_wishlist_items_title';
  }
  elseif (Request::is('user/account/my-coupons')) {
    $title = 'frontend_coupons_items_title';
  }
  elseif (Request::is('user/account/download')) {
    $title = 'frontend_download_options_title';
  }
  elseif(Request::is('user/account/order-details/*')) {
    $title = 'user_order_details_page_title';
  }

@endphp

@if(Request::is('user/account'))
  @section('title',  trans('frontend.frontend_user_dashboard_title') .' | '. get_site_title() )
@elseif (Request::is('user/account/dashboard'))
  @section('title',  trans('frontend.frontend_user_dashboard_title') .' | '. get_site_title() )
@elseif (Request::is('user/account/my-address'))
  @section('title',  trans('frontend.frontend_user_address_title') .' | '. get_site_title() )
@elseif (Request::is('user/account/my-address/add'))
  @section('title',  trans('frontend.frontend_user_address_add_title') .' | '. get_site_title() ) 
@elseif (Request::is('user/account/my-address/edit'))
  @section('title',  trans('frontend.frontend_user_address_edit_title') .' | '. get_site_title() )
@elseif (Request::is('user/account/my-profile'))
  @section('title',  trans('frontend.frontend_user_profile_edit_title') .' | '. get_site_title() )
@elseif (Request::is('user/account/my-orders'))
  @section('title',  trans('frontend.frontend_my_order_title') .' | '. get_site_title() )
@elseif (Request::is('user/account/my-saved-items'))
  @section('title',  trans('frontend.frontend_wishlist_items_title') .' | '. get_site_title() ) 
@elseif (Request::is('user/account/my-coupons'))
  @section('title',  trans('frontend.frontend_coupons_items_title') .' | '. get_site_title() )
@elseif (Request::is('user/account/download'))
  @section('title',  trans('frontend.frontend_download_options_title') .' | '. get_site_title() )  
@elseif(Request::is('user/account/order-details/*'))
  @section('title',  trans('frontend.user_order_details_page_title') .' | '. get_site_title() )  
@endif

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">

      <h1>{{ trans('frontend.'.$title) }}</h1>

    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.frontend_user_registration_title') }}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
  <div class="row">
    <div class="col-lg-4">
      <aside class="user-info-wrapper">
        
        <div class="user-info">
          <div class="user-avatar">
            

            @if($login_user_details['user_photo_url'])
              <img src="{{ get_image_url($login_user_details['user_photo_url']) }}" alt="">
            @else
              <img src="{{ default_avatar_img_src() }}" alt="">
            @endif
            
          </div>
          <div class="user-data">
            <h4>{{ $login_user_details['user_display_name'] }}</h4>
            <span>{!! trans('frontend.member_since_label') !!} {!! Carbon\Carbon::parse($login_user_details['member_since'])->format('d-m-Y') !!}</span>
          </div>
        </div>
      </aside>
      <nav class="list-group">
        @if(Request::is('user/account/dashboard') || Request::is('user/account'))
          <a class="list-group-item active" href="{{ route('user-dashboard-page') }}"><i class="fa fa-dashboard"></i>{{ trans('frontend.dashboard') }}</a>
        @else
          <a class="list-group-item" href="{{ route('user-dashboard-page') }}"><i class="fa fa-dashboard"></i>{{ trans('frontend.dashboard') }}</a>
        @endif

        @if( Request::is('user/account/my-address') ||  Request::is('user/account/my-address/add') ||  Request::is('user/account/my-address/edit') )
          <a class="list-group-item active" href="{{ route('my-address-page') }}"><i class="fa fa-map-marker"></i> {{ trans('frontend.my_address') }}</a>
        @else
          <a class="list-group-item" href="{{ route('my-address-page') }}"><i class="fa fa-map-marker"></i> {{ trans('frontend.my_address') }}</a>

        @endif
        
        @if(Request::is('user/account/my-orders') || Request::is('user/account/order-details/**'))
          <a class="list-group-item active" href="{{ route('my-orders-page') }}"><i class="fa fa-file-text-o"></i> {{ trans('frontend.my_orders') }}</a>
        @else
          <a class="list-group-item" href="{{ route('my-orders-page') }}"><i class="fa fa-file-text-o"></i> {{ trans('frontend.my_orders') }}</a>

        @endif
        
        @if(Request::is('user/account/my-saved-items'))
          <a class="list-group-item active" href="{{ route('my-saved-items-page') }}"><i class="fa fa-save"></i> {{ trans('frontend.my_saved_items') }}</a>
        @else
          <a class="list-group-item" href="{{ route('my-saved-items-page') }}"><i class="fa fa-save"></i> {{ trans('frontend.my_saved_items') }}</a>
        @endif
        
        @if(Request::is('user/account/my-coupons'))
          <a class="list-group-item active" href="{{ route('my-coupons-page') }}"><i class="fa fa-scissors"></i> {{ trans('frontend.my_coupons') }}</a>
        @else
          <a class="list-group-item" href="{{ route('my-coupons-page') }}"><i class="fa fa-scissors"></i> {{ trans('frontend.my_coupons') }}</a>
        @endif
        
        @if(Request::is('user/account/download'))
          <a class="list-group-item active" href="{{ route('download-page') }}"><i class="fa fa-download"></i> {{ trans('frontend.user_account_download_title') }}</a>
        @else
          <a class="list-group-item" href="{{ route('download-page') }}"><i class="fa fa-download"></i> {{ trans('frontend.user_account_download_title') }}</a>
        @endif
        
        @if(Request::is('user/account/my-profile'))
          <a class="list-group-item active" href="{{ route('my-profile-page') }}"><i class="fa fa-user"></i> {{ trans('frontend.my_profile') }}</a>
        @else
          <a class="list-group-item" href="{{ route('my-profile-page') }}"><i class="fa fa-user"></i> {{ trans('frontend.my_profile') }}</a>
        @endif
        
        @if(is_frontend_user_logged_in())
        <form method="post" action="{{ route('user-logout') }}" enctype="multipart/form-data">
          <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">  
          <button type="submit" class="btn btn-default btn-block"><i class="fa fa-circle-o-notch"></i> {!! trans('admin.sign_out') !!}</button>
        </form>
        @endif
        
      </nav>
    </div>
    <div class="col-lg-8">
      <div class="padding-top-2x mt-2 hidden-lg-up"></div>

      @if(Request::is('user/account/dashboard') || Request::is('user/account'))
        @include('pages.frontend.user-account.my-dashboard')
      @elseif(Request::is('user/account/my-address'))  
        @include('pages.frontend.user-account.my-address')
      @elseif(Request::is('user/account/my-address/add'))  
        @include('pages.frontend.user-account.add-address')
      @elseif(Request::is('user/account/my-address/edit'))  
        @include('pages.frontend.user-account.edit-address')
      @elseif(Request::is('user/account/my-profile') )  
        @include('pages.frontend.user-account.user-profile')  
      @elseif(Request::is('user/account/my-orders') )
        @include('pages.frontend.user-account.my-orders') 
      @elseif(Request::is('user/account/view-orders-details/*') )
        @include('pages.frontend.user-account.user-order-details')
      @elseif(Request::is('user/account/my-saved-items') )
        @include('pages.frontend.user-account.my-wishlist') 
      @elseif(Request::is('user/account/my-coupons') )
        @include('pages.frontend.user-account.my-coupons')
      @elseif(Request::is('user/account/download') )
        @include('pages.frontend.user-account.download')  
      @elseif(Request::is('user/account/order-details/*') )
        @include('pages.frontend.user-account.order-details')  
      @endif
      
    </div>
  </div>
</div>
@endsection  