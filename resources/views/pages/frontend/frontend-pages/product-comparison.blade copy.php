@extends('layouts.frontend.master')

@section('title', trans('frontend.product_comparison_title_label') .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.product_comparison_title_label') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ route('home-page')}}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.product_comparison_title_label') }}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->

<div class="container padding-bottom-2x mb-2">

@if(count($compare_product_data) > 0)
  <div class="comparison-table">
    <table class="table table-bordered">
      <thead class="bg-secondary">
        <tr>
          <th class="align-middle">
            {{ trans('frontend.products') }}
          </th>

          @foreach($compare_product_data as $products)

          <td>
            <div class="comparison-item">
              <a href="{{ route('remove-compare-product-from-list', $products['id']) }}">
                <span class="remove-item"><i class="icon-x"></i></span>
              </a>
              <a class="comparison-item-thumb" href="#">
                
                  <img src="{{ get_image_url( get_product_image( $products['id'] )) }}" alt="{{ basename( get_image_url( get_product_image( $products['id'] )) ) }}">
              </a>

              <a class="comparison-item-title" href="{{ route('details-page', $products['post_slug']) }}" target="_blank">{!! get_product_title( $products['id'] ) !!}</a>

              <a class="comparison-item-title">{!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}</a>

            <!-- <a class="btn btn-outline-primary btn-sm" href="#" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</a></div> -->
          </td>

          @endforeach

        </tr>
      </thead>
      <tbody>
      @foreach($compare_product_label as $key => $label)
        <tr>

          @if( ($label !== 'Image' && $label !== 'Product' && $label !== 'Price') )
          <th>{!! $label !!}</th>
          @endif

          @foreach($compare_product_data as $products)
            @if(($label !== 'Image' && $label !== 'Product' && $label !== 'Price') )

              @if (!empty($products['_product_compare_data']) )
                <td>{!! $products['_product_compare_data'][$key] !!}</td>
              @else
                <td>N/A</td>
              @endif
            @endif
          @endforeach

        </tr>
      @endforeach
      <tr>
        <th></th>
        @foreach($compare_product_data as $products)
        <td>
          <div style="text-align:center">
            <a class="btn btn-outline-primary btn-sm add-to-cart-bg" data-id="{{ $products['id'] }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
              {{ trans('frontend.add_to_cart_label') }}
            </a>
          </div>
        </td>
        @endforeach




      </tr>
      </tbody>
    </table>
  </div>

@else
  <div class="no-comparison-label">{!! trans('frontend.product_comparison_no_label') !!}</div>
@endif

</div>

@endsection