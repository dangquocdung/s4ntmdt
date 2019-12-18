@extends('layouts.frontend.master')
@section('title',  trans('frontend.tag_details_page_label') .' | '. get_site_title() )

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! $tag_single_details['tag_details']['name'] !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>        
        </li>
        <li class="separator">&nbsp;</li>

        <li>
          <a href="{{ route('shop-page') }}">{{ trans('frontend.all_products_label') }}</a>        
        </li>


        <li class="separator">&nbsp;</li>

        <li>{!! trans('frontend.popular_tags_label') !!}</li>
      </ul>
    </div>
  </div>
</div>


<!-- Page Content-->
<div id="product-category" class="container new-container padding-bottom-3x mb-1">
  <div class="row">

    <div class="col-lg-9 order-lg-2">

      @if(count($tag_single_details['products'])>0)

        <div class="categories-products-content">
          <div class="row">
          @foreach($tag_single_details['products'] as $products)
        
          <div class="col-xs-12 col-sm-6 col-md-6 extra-padding">
            <div class="hover-product">
              <div class="hover">
                @if(get_product_image($products->id))
                <img class="img-responsive" src="{{ get_image_url(get_product_image($products->id)) }}" alt="{{ basename(get_product_image($products->id)) }}" />
                @else
                <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="" />
                @endif

                <div class="overlay">
                  <button class="info quick-view-popup" data-id="{{ $products->id }}">{{ trans('frontend.quick_view_label') }}</button>
                </div>
              </div> 
              
              <div class="single-product-bottom-section">
                <h3>{!! get_product_title($products->id) !!}</h3>
                <p>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products['price'])), get_frontend_selected_currency()) !!}</p>
                
                <div class="title-divider"></div>
                <div class="single-product-add-to-cart">
                    <a href="" data-id="{{ $products->id }}" class="btn btn-sm btn-style add-to-cart-bg" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}"><i class="fa fa-shopping-cart"></i></a>
                    <a href="" class="btn btn-sm btn-style product-wishlist" data-id="{{ $products->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="fa fa-heart"></i></a>
                    <a href="" class="btn btn-sm btn-style product-compare" data-id="{{ $products->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="fa fa-exchange"></i></a>
                    <a href="{{ route('details-page', $products->slug) }}" class="btn btn-sm btn-style product-details-view" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.product_details_label') }}"><i class="fa fa-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          </div>  
        </div>
        
        <nav class="phan-trang">
          <div class="column">
            {!! $tag_single_details['products']->appends(Request::capture()->except('page'))->render() !!}
          </div>
        </nav>

      @else
        <div class="col-md-12">
          <div class="alert-msg"><span>{{ trans('frontend.no_product_of_this_tag') }}</span> </div>
        </div>
      @endif

    </div>

    <div class="col-lg-3 order-lg-1">
      <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
      <aside class="sidebar sidebar-offcanvas position-left">
        
        <span class="sidebar-close"><i class="icon-x"></i></span>

        @if(count($popular_tags_list) > 0)
          <section class="widget widget-featured-posts">
            <h3 class="widget-title">{{ trans('frontend.popular_tags_label') }}</h3>
              @foreach($popular_tags_list as $tags)
              <div class="entry">
                <div class="entry-content">
                  <h5 class="entry-title mt-1">
                    <a href="{{ route('tag-single-page', $tags['slug']) }}"><i class="fa fa-tag" aria-hidden="true"></i> {{ ucfirst($tags['name']) }}</a>
                  </h5>
                </div>
              </div>
              @endforeach
          </section>
        @endif



      </aside>

    </div>

  </div>
</div>
@endsection  