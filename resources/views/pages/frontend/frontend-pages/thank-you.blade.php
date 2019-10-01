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
            {{ trans('frontend.order_number') }}:&nbsp; <span class="text-medium">#{!! $order_details_for_thank_you_page['order_id'] !!}</span> - 
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

            <div class="row padding-top-1x mt-3">
              <div class="col-sm-6">
                <h5>{{ trans('frontend.billing_address') }}:</h5>
                @if(!empty($order_details_for_thank_you_page['customer_address']))

                <ul class="list-unstyled">
                  <li><span class="text-muted">{!! $order_details_for_thank_you_page['customer_address']['_billing_first_name'].' '. $order_details_for_thank_you_page['customer_address']['_billing_last_name']!!}</span></li>
                  @if($order_details_for_thank_you_page['customer_address']['_billing_company'])
                    <li><span class="text-muted">{{ trans('frontend.company') }}:</span> {!! $order_details_for_thank_you_page['customer_address']['_billing_company'] !!}</li>
                  @endif
                  <li><span class="text-muted">{{ trans('frontend.address_1') }}:</span> {!! $order_details_for_thank_you_page['customer_address']['_billing_address_1'] !!}</li>
                  @if($order_details_for_thank_you_page['customer_address']['_billing_address_2'])
                    <li><span class="text-muted">{{ trans('frontend.address_2') }}:</span> {!! $order_details_for_thank_you_page['customer_address']['_billing_address_2'] !!}</li>
                  @endif
                  <li><span class="text-muted">{{ trans('frontend.city') }}:</span> {!! $order_details_for_thank_you_page['customer_address']['_billing_city'] !!}</li>
                  <li><span class="text-muted">{{ trans('frontend.postCode') }}:</span> {!! $order_details_for_thank_you_page['customer_address']['_billing_postcode'] !!}</li>
                  <li><span class="text-muted">{{ trans('frontend.country') }}:</span> {!! get_country_by_code( $order_details_for_thank_you_page['customer_address']['_billing_country'] ) !!}</li>

                  <br>

                  <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_phone'] !!}</p>

                  @if($order_details_for_thank_you_page['customer_address']['_billing_fax'])
                    <p><strong>{{ trans('frontend.fax') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_fax'] !!}</p>
                  @endif
                  <p><strong>{{ trans('frontend.email') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_email'] !!}</p>

                </ul>
                @endif

              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-sm-6">
                <h4>{{ trans('frontend.billing_address') }}</h4><hr>
                @if(!empty($order_details_for_thank_you_page['customer_address']))
                  <p>{!! $order_details_for_thank_you_page['customer_address']['_billing_first_name'].' '. $order_details_for_thank_you_page['customer_address']['_billing_last_name']!!}</p>
                  @if($order_details_for_thank_you_page['customer_address']['_billing_company'])
                    <p><strong>{{ trans('frontend.company') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_company'] !!}</p>
                  @endif
                  <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_address_1'] !!}</p>
                  @if($order_details_for_thank_you_page['customer_address']['_billing_address_2'])
                    <p><strong>{{ trans('frontend.address_2') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_address_2'] !!}</p>
                  @endif
                  <p><strong>{{ trans('frontend.city') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_city'] !!}</p>
                  <p><strong>{{ trans('frontend.postCode') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_postcode'] !!}</p>
                  <p><strong>{{ trans('frontend.country') }}:</strong> {!! get_country_by_code( $order_details_for_thank_you_page['customer_address']['_billing_country'] ) !!}</p>

                  <br>

                  <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_phone'] !!}</p>

                  @if($order_details_for_thank_you_page['customer_address']['_billing_fax'])
                    <p><strong>{{ trans('frontend.fax') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_fax'] !!}</p>
                  @endif
                  <p><strong>{{ trans('frontend.email') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_billing_email'] !!}</p>
                @endif
              </div>

              <div class="col-sm-6">
                <h4>{{ trans('frontend.shipping_address') }}</h4><hr>
                @if(!empty($order_details_for_thank_you_page['customer_address']))
                  <p>{!! $order_details_for_thank_you_page['customer_address']['_shipping_first_name'].' '. $order_details_for_thank_you_page['customer_address']['_shipping_last_name']!!}</p>
                  @if($order_details_for_thank_you_page['customer_address']['_shipping_company'])
                    <p><strong>{{ trans('frontend.company') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_company'] !!}</p>
                  @endif
                  <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_address_1'] !!}</p>
                  @if($order_details_for_thank_you_page['customer_address']['_shipping_address_2'])
                    <p><strong>{{ trans('frontend.address_2') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_address_2'] !!}</p>
                  @endif
                  <p><strong>{{ trans('frontend.city') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_city'] !!}</p>
                  <p><strong>{{ trans('frontend.postCode') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_postcode'] !!}</p>
                  <p><strong>{{ trans('frontend.country') }}:</strong> {!! get_country_by_code( $order_details_for_thank_you_page['customer_address']['_shipping_country'] ) !!}</p>

                  <br>

                  <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_phone'] !!}</p>

                  @if($order_details_for_thank_you_page['customer_address']['_shipping_fax'])
                    <p><strong>{{ trans('frontend.fax') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_fax'] !!}</p>
                  @endif

                  <p><strong>{{ trans('frontend.email') }}:</strong> {!! $order_details_for_thank_you_page['customer_address']['_shipping_email'] !!}</p>
                @endif
              </div>
            </div>    

            <div class="padding-top-1x padding-bottom-1x">
              <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}">
                <i class="icon-shopping-cart"></i>&nbsp;{{ trans('frontend.tiep_tuc_mua_sam') }}
              </a>
              <a class="btn btn-outline-primary" href="#" style="float: right;">
                <i class="icon-map-pin"></i>&nbsp;{{ trans('frontend.theo_doi_don_hang') }}
              </a>
            </div>

          </div>

          @endif
        </div>
      </div>
  
@endsection  