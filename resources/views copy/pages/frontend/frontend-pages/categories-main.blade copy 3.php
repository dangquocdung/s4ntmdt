@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_category_products') .' | '. get_site_title() )
@section('breadcrumb',trans('frontend.shopist_category_products'))

@section('breadcrumbs')
<?php if(isset($product_by_cat_id['breadcrumb_html'])){?>

      <div class="column">

          {!! $product_by_cat_id['breadcrumb_html'] !!}
        
      </div>
    
<?php }?>

@endsection

@section('content')

<div id="product-category" class="container new-container">
  <div class="row">
    <div class="col-xs-12 col-md-3">
      <div class="left-sidebar">
        @include('includes.frontend.categories-page')

        <!-- Widget Price Range-->
        <section class="widget widget-categories">
            <h3 class="widget-title">{{ trans('frontend.price_range_label') }}</h3>
            <form action="{{$product_by_cat_id['action_url'] }}" method="get" class="price-range-slider" data-start-min="1" data-start-max="1000000" data-min="0" data-max="5000000" data-step="1000">
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
              </footer>
            </form>
          </section>
      </div>
			
      
    </div>

    <div class="col-xs-12 col-md-9">
      <!-- Shop Toolbar-->
      <div class="shop-toolbar padding-bottom-1x mb-2">
          <div class="column">
            <div class="shop-sorting">
                <label for="sorting">{{ trans('frontend.sort_filter_label') }}:</label>
                <select class="form-control" id="sorting">
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
          <div class="column">
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
        <!-- Products-->
        @include('includes.frontend.categories-products')
        <nav class="phan-trang">
          <div class="column">
            {!! $product_by_cat_id['products']->appends(Request::capture()->except('page'))->render() !!}
          </div>
        </nav>
      
        
      
    </div>
  </div>
</div>
@endsection  