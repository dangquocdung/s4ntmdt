@extends('layouts.frontend.master')

@section('title', trans('frontend.shopist_category_products') .' | '. get_site_title() )

@section('content')

<!-- Page Title-->
{!! $product_by_cat_id['breadcrumb_html'] !!}

<!-- Page Content-->
<div id="product-category" class="container new-container padding-bottom-3x mb-1">
  <div class="row">

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
                  @if($product_by_cat_id['sort_by'] == 'all')  
                  <option selected="selected" value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                  @else
                  <option value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
                  @endif

                  @if($product_by_cat_id['sort_by'] == 'alpaz')  
                  <option selected="selected" value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                  @else
                  <option value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
                  @endif

                  @if($product_by_cat_id['sort_by'] == 'alpza')  
                  <option selected="selected" value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                  @else
                  <option value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
                  @endif

                  @if($product_by_cat_id['sort_by'] == 'low-high')  
                  <option selected="selected" value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                  @else
                  <option value="low-high">{{ trans('frontend.sort_filter_low_high_label') }}</option>
                  @endif

                  @if($product_by_cat_id['sort_by'] == 'high-low')  
                  <option selected="selected" value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                  @else
                  <option value="high-low">{{ trans('frontend.sort_filter_high_low_label') }}</option>
                  @endif

                  @if($product_by_cat_id['sort_by'] == 'old-new')  
                  <option selected="selected" value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                  @else
                  <option value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
                  @endif

                  @if($product_by_cat_id['sort_by'] == 'new-old')
                  <option selected="selected" value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                  @else
                  <option value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
                  @endif
                </select>
            </div>

          </div>
          <div class="column col-4">
            <div class="shop-view">
                @if($product_by_cat_id['selected_view'] == 'grid')
                  <a class="grid-view active" href="{{ $product_by_cat_id['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><span></span><span></span><span></span></a> 
                @else  
                  <a class="grid-view" href="{{ $product_by_cat_id['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><span></span><span></span><span></span></a>
                @endif

                @if($product_by_cat_id['selected_view'] == 'list')
                  <a class="list-view active" href="{{ $product_by_cat_id['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><span></span><span></span><span></span></a>
                @else  
                  <a class="list-view" href="{{ $product_by_cat_id['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><span></span><span></span><span></span></a>
                @endif
            </div>
          </div>
        </div>
      </div>
      <!-- Products-->
      @include('includes.frontend.categories-products')
      
      <nav class="phan-trang">
        <div class="column">
          {!! $product_by_cat_id['products']->appends(Request::capture()->except('page'))->render() !!}
        </div>
      </nav>
    </div>

    <div class="col-lg-3 order-lg-1">
      <div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
      <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
        
        @include('includes.frontend.categories-page')

        <!-- Widget Price Range-->
        <section class="widget widget-categories">
          <h3 class="widget-title">{{ trans('frontend.price_range_label') }}</h3>
          <form action="{{ $product_by_cat_id['action_url'] }}" method="get" class="price-range-slider" data-start-min="{{ $product_by_cat_id['min_price'] }}" data-start-max="{{ $product_by_cat_id['max_price'] }}" data-min="{{ get_appearance_settings()['general']['filter_price_min'] }}" data-max="{{ get_appearance_settings()['general']['filter_price_max'] }}" data-step="1000">
            <div class="ui-range-slider"></div>
            <footer class="ui-range-slider-footer">
              <div class="column">
                <button class="btn btn-outline-primary btn-sm" type="submit">{{ trans('frontend.filter_label') }}</button>

              </div>
              <div class="column">
                <div class="ui-range-values">
                  <div class="ui-range-value-min"><span></span>đ
                    <input name="price_min" id="price_min" value="{{$product_by_cat_id['min_price'] }}" type="hidden">
                  </div>&nbsp;-&nbsp;
                  <div class="ui-range-value-max"><span></span>đ
                    <input name="price_max" id="price_max" value="{{$product_by_cat_id['max_price'] }}" type="hidden">
                  </div>
                </div>
              </div>

              @if(count($colors_list_data) > 0)
              <div class="colors-filter">
                <h2>{{ trans('frontend.choose_color_label') }} <span class="responsive-accordian"></span></h2>
                <div class="colors-filter-option">
                  @foreach($colors_list_data as $terms)
                  <div class="colors-filter-elements">
                    <div class="chk-filter">
                      @if(count($all_products_details['selected_colors']) > 0 && in_array($terms['slug'], $all_products_details['selected_colors']))  
                      <input type="checkbox" checked class="shopist-iCheck chk-colors-filter" value="{{ $terms['slug'] }}">
                      @else
                      <input type="checkbox" class="shopist-iCheck chk-colors-filter" value="{{ $terms['slug'] }}">
                      @endif
                    </div>
                    <div class="filter-terms">
                      <div class="filter-terms-appearance"><span style="background-color:#{{ $terms['color_code'] }};width:21px;height:20px;display:block;"></span></div>
                      <div class="filter-terms-name">&nbsp; {!! $terms['name'] !!}</div>
                    </div>
                  </div>
                  @endforeach
                </div>
                @if($all_products_details['selected_colors_hf'])
                <input name="selected_colors" id="selected_colors" value="{{ $all_products_details['selected_colors_hf'] }}" type="hidden">
                @endif
              </div>
            @endif

            @if(count($sizes_list_data) > 0)
              <div class="size-filter">
                <h2>{{ trans('frontend.choose_size_label') }} <span class="responsive-accordian"></span></h2>
                <div class="size-filter-option">
                  @foreach($sizes_list_data as $terms)
                  <div class="size-filter-elements">
                    <div class="chk-filter">
                      @if(count($all_products_details['selected_sizes']) > 0 && in_array($terms['slug'], $all_products_details['selected_sizes']))  
                      <input type="checkbox" checked class="shopist-iCheck chk-size-filter" value="{{ $terms['slug'] }}">
                      @else
                      <input type="checkbox" class="shopist-iCheck chk-size-filter" value="{{ $terms['slug'] }}">
                      @endif
                    </div>
                    <div class="filter-terms">
                      <div class="filter-terms-name">{!! $terms['name'] !!}</div>
                    </div>
                  </div>
                  @endforeach
                </div> 
                @if($all_products_details['selected_sizes_hf'])
                <input name="selected_sizes" id="selected_sizes" value="{{ $all_products_details['selected_sizes_hf'] }}" type="hidden">
                @endif
              </div>
            @endif

            </footer>
          </form>
        </section>

        <!-- Widget Brand Filter-->
        @if(count($brands_data) > 0)
        <section class="widget widget-featured-posts">
            <h3 class="widget-title">{{ trans('frontend.brands') }}</h3>

              @foreach($brands_data as $brand_name)

              <div class="entry">
                <div class="entry-thumb" style="width:80px">

                  <a href="{{ route('brands-single-page', $brand_name['slug']) }}">
                    @if(!empty($brand_name['brand_logo_img_url']))
                    <img src="{{ get_image_url($brand_name['brand_logo_img_url']) }}" class="img-fluid" width="100%">
                    @else
                    <img src="{{ default_placeholder_img_src() }}" class="img-fluid">
                    @endif
                  </a>

                </div>
                <div class="entry-content">
                  <h4 class="entry-title mt-1">
                    <a href="{{ route('brands-single-page', $brand_name['slug']) }}">{!! $brand_name['name'] !!}</a>
                  </h4>
                  <span class="entry-meta">
                    <i class="icon-map-pin text-muted"></i> {!! $brand_name['brand_country_name'] !!}
                  </span>
                </div>
              </div>

              @endforeach

          </section>

        @endif

        @if(count($advancedData['best_sales']) > 0)
          <section class="widget widget-featured-posts">
            <h3 class="widget-title">{{ trans('frontend.best_sales_label') }}</h3>

              @foreach($advancedData['best_sales'] as $row)

              @if ($loop->iteration < 10)

              <div class="entry">
                <div class="entry-thumb" style="width:80px">

                  <a href="{{ route('details-page', $row['post_slug'])}}">
                    @if(!empty($row['post_image_url']))
                    <img class="d-block w-100" src="{{ get_image_url( $row['post_image_url'] ) }}" alt="{{ basename( get_image_url( $row['post_image_url'] ) ) }}" />
                    @else
                    <img class="d-block w-100" src="{{ default_placeholder_img_src() }}" alt="" />
                    @endif
                  </a>
                </div>
                <div class="entry-content">
                  <h4 class="entry-title mb-1">
                    <a href="{{ route('details-page', $row['post_slug'])}}">{!! $row['post_title'] !!}</a>
                  </h4>
                  @if($row['post_type'] == 'simple_product')
                    <p><strong>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($row['id'], $row['post_price'])), get_frontend_selected_currency())  !!}</strong></p>
                  @elseif($row['post_type'] == 'configurable_product')
                    <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                  @elseif($row['post_type'] == 'customizable_product' || $row['post_type'] == 'downloadable_product')
                    @if(count(get_product_variations($row['id']))>0)
                      <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
                    @else
                      <p><strong>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($row['id'], $row['post_price'])), get_frontend_selected_currency()) !!}</strong></p>
                    @endif
                  @endif

                </div>
              </div>

              @endif

              @endforeach

          </section>
        @endif

        @include('includes.frontend.seen-products-list')
        @yield('seen-products-list')   

      </aside>

    </div>

  </div>
</div>
@endsection  