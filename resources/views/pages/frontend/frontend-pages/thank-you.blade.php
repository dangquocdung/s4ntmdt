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
        <div class="card text-center">
          @if( count($order_details_for_thank_you_page) > 0)

          <div class="card-body padding-top-2x">
            <h3 class="card-title">{{ trans('frontend.order_received') }}</h3>
            <p class="card-text">{{ trans('frontend.thank_you_msg') }}</p>
            <p class="card-text">{{ trans('frontend.order_number') }}:&nbsp; <span class="text-medium">#{!! $order_details_for_thank_you_page['order_id'] !!}</span> - 
            {{ trans('frontend.date') }}:&nbsp; <span class="text-medium">{!! $order_details_for_thank_you_page['order_date'] !!}</span> - 
            {{ trans('frontend.total') }}:&nbsp; <span class="text-medium">{!! price_html( $order_details_for_thank_you_page['_final_order_total'], $order_details_for_thank_you_page['_order_currency'] ) !!}</span> - 
            {{ trans('frontend.payment_method') }}:&nbsp; <span class="text-medium">{!! get_payment_method_title($order_details_for_thank_you_page['_payment_method']) !!}</span></p>

            @if(isset($order_details_for_thank_you_page['_payment_details']['method_instructions']))  
            <div class="row">
                <div class="col-12">
                  <p class="payment_ins">*{!! $order_details_for_thank_you_page['_payment_details']['method_instructions'] !!}</p>
                </div>
            </div>
            @endif

            <div class="padding-top-1x padding-bottom-1x">
              <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}">
                <i class="icon-shopping-cart"></i>&nbsp;{{ trans('frontend.tiep_tuc_mua_sam') }}
              </a>
              <a class="btn btn-outline-primary" href="#">
                <i class="icon-map-pin"></i>&nbsp;{{ trans('frontend.chi_tiet_don_hang') }}
              </a>
            </div>

          </div>

          @endif
        </div>
      </div>
  
@endsection  