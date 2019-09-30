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
              <li><a href="index.html">Home</a>
              </li>
              <li class="separator">&nbsp;</li>
              <li>{{ trans('frontend.checkout') }}</li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-2">
        <div class="card text-center">
          @if( count($order_details_for_thank_you_page) > 0)

          <div class="card-body padding-top-2x">
            <h3 class="card-title">{{ trans('frontend.order_received') }}</h3>
            <p class="card-text">{{ trans('frontend.thank_you_msg') }}</p>
              <u>You can now:</u>
            </p>
            <div class="padding-top-1x padding-bottom-1x">
              <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}">
                <i class="icon-shopping-cart"></i>&nbsp;{{ trans('frontend.tiep_tuc_mua_sam') }}
              </a>
              <a class="btn btn-outline-primary" href="order-tracking.html">
                <i class="icon-map-pin"></i>&nbsp;{{ trans('frontend.theo_doi_don_hang') }}
              </a>
            </div>

          </div>

          @endif
        </div>
      </div>
  
@endsection  