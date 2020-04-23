@extends('layouts.frontend.master')
@section('title',  trans('frontend.brand_details_page_label') .' | '. get_site_title() )

@section('content')
<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! $brand_details_by_slug['brand_details']['name'] !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>
          {{ trans('frontend.brands') }}
        </li>

      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-1">
  <div class="row">
    <!-- Products-->
    <div class="col-lg-9 order-lg-2">

    @if(!empty($brand_details_by_slug['products']) && $brand_details_by_slug['products']->count() > 0)

      <div class="isotope-grid cols-4 mb-2">
        <div class="gutter-sizer"></div>
        <div class="grid-sizer"></div>
        @foreach($brand_details_by_slug['products'] as $products)
          <?php 
          $reviews          = get_comments_rating_details($products->id, 'product');
          $reviews_settings = get_reviews_settings_data($products->id);
          ?>
          <!-- Products Grid-->
          <div class="grid-item" style="position: absolute; left: 0px; top: 0px; margin-bottom:60px">
            <div class="product-card">
              @if ( $products->price < $products->regular_price )
                @php
        
                  $tiengiam =  $products->regular_price - $products->price;
        
                  $phantram = round(($tiengiam/$products->regular_price)*100);
                    
                @endphp
                <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>

              @endif

              <a class="product-thumb" href="{{ route('details-page', $products->slug ) }}">
                @if(!empty($products->image_url))
                  <img src="{{ get_image_url( $products->image_url ) }}" alt="{{ basename( get_image_url( $products->image_url ) ) }}" />
                @else
                  <img src="{{ default_placeholder_img_src() }}" alt="" />
                @endif
              </a>
              <div class="product-card-body">
                <!-- <div class="product-category"><a href="#">Smart home</a></div> -->
                <h3 class="product-title"><a href="{{ route('details-page', $products->slug ) }}">{!! $products->title !!}</a></h3>
                
                <h4 class="product-price">

                  @if ( $products->price < $products->regular_price )
                    <del>
                      {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->regular_price)), get_frontend_selected_currency()) !!}
                    </del>
                  @endif

                  @if( $products->type == 'simple_product' )
                    {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
                  @elseif( $products->type == 'configurable_product' )
                    {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}
                  @elseif( $products->type == 'customizable_product' || $products->type == 'downloadable_product')
                    @if(count(get_product_variations($products->id))>0)
                    {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}
                    @else
                    {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
                    @endif
                  @endif
                </h4>
              </div>
              <div class="product-button-group">
                <a class="product-button btn-store" href="{{ route('store-details-page-content', get_user_name_by_user_id($products->author_id)) }}" target="_blank" data-toggle="tooltip" title="{{ get_user_name_by_user_id($products->author_id) }}" data-original-title="{{ trans('frontend.gian-hang') }}">
                  <i class="icon-home"></i><span>{{ trans('frontend.gian-hang') }}</span>
                </a>
                <a class="product-button btn-wishlist product-wishlist" data-id="{{ $products->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                  <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
                </a>
                <a class="product-button btn-compare product-compare" data-id="{{ $products->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                  <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
                </a>
                <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $products->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $products->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                  <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    
    @else
      <p class="not-available">{!! trans('frontend.product_not_available') !!}</p>
    @endif
    

    </div>
    <!-- Sidebar-->
    <div class="col-lg-3 order-lg-1">

      <section class="widget">
        @if($brand_details_by_slug['brand_details']['brand_logo_img_url'])
          <img src="{{ get_image_url($brand_details_by_slug['brand_details']['brand_logo_img_url']) }}" alt="brand-logo">
        @else
          <img src="{{ default_placeholder_img_src() }}" alt="no-brand-logo">
        @endif
        <h3 class="widget-title">{!! $brand_details_by_slug['brand_details']['name'] !!}</h3>

        <ul class="list-icon" style="list-style:none">
          <li> <i class="icon-map-pin text-muted"></i> {!! $brand_details_by_slug['brand_details']['brand_country_name'] !!}</li>
        </ul>
      </section>
    </div>
  </div>
</div>   
@endsection