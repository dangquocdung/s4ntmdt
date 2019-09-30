@extends('layouts.frontend.master')
@section('title',  trans('frontend.shopist_order_received_title') .' | '. get_site_title() )

@section('content')
    <!-- Page Title-->
    <div class="page-title">
        <div class="container">
          <div class="column">
            <h1>{{ trans('frontend.shopist_order_received_title') }}</h1>
          </div>
          <div class="column">
            <ul class="breadcrumbs">
              <li>
                <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>{{ trans('frontend.checkout') }}</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="card ">
          @if( count($order_details_for_thank_you_page) > 0)

          <div class="card-body padding-top-2x">
            <h3 class="card-title text-center">{{ trans('frontend.order_received') }}</h3>
            <p class="card-text text-center">{{ trans('frontend.thank_you_msg') }}</p>
            </p>
            
            <div class="row padding-top-1x mt-3">
              <div class="col-sm-6">
                <h5>Shipping to:</h5>
                <ul class="list-unstyled">
                  <li><span class="text-muted">Client:&nbsp; </span>Daniel Adams</li>
                  <li><span class="text-muted">Address:&nbsp; </span>44 Shirley Ave. West Chicago, IL 60185, USA</li>
                  <li><span class="text-muted">Phone:&nbsp; </span>+1(808) 764 554 330</li>
                </ul>
              </div>
              <div class="col-sm-6">
                <h5>Payment method:</h5>
                <ul class="list-unstyled">
                  <li><span class="text-muted">Credit Card:&nbsp; </span>**** **** **** 5300</li>
                </ul>
              </div>
            </div>
            <div class="padding-top-1x padding-bottom-1x">
              <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}">
                <i class="icon-shopping-cart"></i>&nbsp;{{ trans('frontend.tiep_tuc_mua_sam') }}
              </a>
              <a class="btn btn-outline-primary" href="#">
                <i class="icon-map-pin"></i>&nbsp;{{ trans('frontend.theo_doi_don_hang') }}
              </a>
            </div>

          </div>

          @endif
        </div>
      </div>
  
@endsection  