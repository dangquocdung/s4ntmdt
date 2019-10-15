@extends('layouts.frontend.master')

@section('title',trans('frontend.products') .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! trans('frontend.products') !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>        </li>
        <li class="separator">&nbsp;</li>
        <li>{!! trans('frontend.products') !!}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->
<div id="product-category" class="container padding-bottom-3x mb-1">
  <div class="row">
    <!-- Products-->
    <div class="col-lg-9 order-lg-2">
      <!-- Promo banner-->
      {{-- <a class="alert alert-default alert-dismissible fade show fw-section mb-30" href="{{ route('shop-page') }}" style="background-image: url(img/banners/shop-banner-bg.jpg);"><span class="alert-close" data-dismiss="alert"></span>
        <div class="d-flex flex-wrap flex-md-nowrap justify-content-between align-items-center">
          <div class="mx-auto mx-md-0 px-3 pb-2 text-center text-md-left"><span class="d-block text-lg text-thin mb-2">Limited Time Deals</span>
            <h3 class="text-gray-dark">Surface Pro 4</h3>
            <p class="d-inline-block bg-warning text-white">&nbsp;&nbsp;Shop Now&nbsp;<i class="icon-chevron-right d-inline-block align-middle"></i>&nbsp;</p>
          </div><img class="d-block mx-auto mx-md-0" src="img/banners/shop-banner.png" alt="Surface Pro 4">
        </div>
      </a> --}}
      <!-- Shop Toolbar-->
      <div class="shop-toolbar padding-bottom-1x mb-2">
        <div class="row">
          <div class="column col-8">
            <div class="sort-filter-option">
              <label for="sorting">{{ trans('frontend.sort_filter_label') }}:</label>
              <select class="form-control select2 sort-by-filter" id="sorting" style="width: 50%;">
                @if($all_products_details['sort_by'] == 'all')  
                <option selected="selected" value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                @else
                <option value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                @endif

                @if($all_products_details['sort_by'] == 'alpaz')  
                <option selected="selected" value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                @else
                <option value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                @endif

                @if($all_products_details['sort_by'] == 'alpza')  
                <option selected="selected" value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                @else
                <option value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                @endif

                @if($all_products_details['sort_by'] == 'low-high')  
                <option selected="selected" value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                @else
                <option value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                @endif

                @if($all_products_details['sort_by'] == 'high-low')  
                <option selected="selected" value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                @else
                <option value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                @endif

                @if($all_products_details['sort_by'] == 'old-new')  
                <option selected="selected" value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                @else
                <option value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                @endif

                @if($all_products_details['sort_by'] == 'new-old')
                <option selected="selected" value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                @else
                <option value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                @endif
              </select>
              <!-- </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span> -->
            </div>
          </div>
          <div class="column col-4">
            <div class="shop-view">
              @if($all_products_details['selected_view'] == 'grid')
                <a class="grid-view active" href="{{ $all_products_details['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><span></span><span></span><span></span></a> 
              @else  
                <a class="grid-view" href="{{ $all_products_details['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><span></span><span></span><span></span></a>
              @endif

              @if($all_products_details['selected_view'] == 'list')
                <a class="list-view active" href="{{ $all_products_details['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><span></span><span></span><span></span></a>
              @else  
                <a class="list-view" href="{{ $all_products_details['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><span></span><span></span><span></span></a>
              @endif
            </div>
          </div>
        </div>
      </div>
      <!-- Products-->

      @include('includes.frontend.products')

      <!-- Pagination-->
      <nav class="phan-trang">
        <div class="column">
          {!! $all_products_details['products']->appends(Request::capture()->except('page'))->render() !!}
        </div>

        <!-- <div class="column text-left hidden-xs-down">
          <a class="btn btn-outline-secondary btn-sm" href="#"><i class="icon-chevron-left"></i>&nbsp;Previous</a>
        </div>
        <div class="column text-right hidden-xs-down">
          <a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-chevron-right"></i></a>
        </div> -->
      </nav>
         
    </div>
    <!-- Sidebar          -->
    <div class="col-lg-3 order-lg-1">
      <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
      <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
        <!-- Widget Categories-->
        @include('includes.frontend.categories')
        
        <!-- Widget Price Range-->
        <section class="widget widget-categories">
          <h3 class="widget-title">{{ trans('frontend.price_range_label') }}</h3>
          <form action="{{ $all_products_details['action_url'] }}" method="get" class="price-range-slider" data-start-min="{{ $all_products_details['min_price'] }}" data-start-max="{{ $all_products_details['max_price'] }}" data-min="{{ get_appearance_settings()['general']['filter_price_min'] }}" data-max="{{ get_appearance_settings()['general']['filter_price_max'] }}" data-step="1000">
            <div class="ui-range-slider"></div>
              <footer class="ui-range-slider-footer">
                <div class="column">
                  <button class="btn btn-outline-primary btn-sm" type="submit">{{ trans('frontend.filter_label') }}</button>
                </div>
                <div class="column">
                  <div class="ui-range-values">
                    <div class="ui-range-value-min"><span></span>đ
                      <input name="price_min" id="price_min" value="{{ $all_products_details['min_price'] }}" type="hidden">
                    </div>&nbsp;-&nbsp;
                    <div class="ui-range-value-max"><span></span>đ
                      <input name="price_max" id="price_max" value="{{ $all_products_details['max_price'] }}" type="hidden">
                    </div>
                  </div>
                </div>
              </footer>
          </form>
        </section>
        
        <!-- Widget Brand Filter-->
        @if(count($brands_data) > 0)  
        <section class="widget">
          <h3 class="widget-title">{{ trans('frontend.brands') }}</h3>

          @foreach($brands_data as $brand)  

          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" type="checkbox" id="{{ $brand['term_id'] }}">
            <label class="custom-control-label" for="apple">{{ $brand['name'] }}</label>
          </div>

          @endforeach

        </section>
        @endif
      </aside>
    </div>
  </div>
</div>

@endsection