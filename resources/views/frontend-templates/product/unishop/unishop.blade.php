@section('content')

  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
    <div class="row">
      <!-- Products-->
      <div class="col-xl-9 col-lg-8 order-lg-2">
        <!-- Shop Toolbar-->
        <div class="shop-toolbar padding-bottom-1x mb-2">
          <div class="column">
            <div class="shop-sorting">
                <label for="sorting">{{ trans('frontend.sort_filter_label') }}:</label>
                <select class="form-control" id="sorting">
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
              {{-- <label for="sorting">Sort by:</label>
              <select class="form-control" id="sorting">
                <option>Popularity</option>
                <option>Low - High Price</option>
                <option>High - Low Price</option>
                <option>Avarage Rating</option>
                <option>A - Z Order</option>
                <option>Z - A Order</option>
              </select> --}}
              <span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>
            </div>
          </div>
          <div class="column">
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
              {{-- <a class="grid-view active" href="shop-grid-ls.html"><span></span><span></span><span></span></a>
              <a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span></a> --}}
            </div>
          </div>
        </div>
        <!-- Products Grid-->
        <div class="isotope-grid cols-3 mb-2">
          <div class="gutter-sizer"></div>
          <div class="grid-sizer"></div>

          @include('includes.frontend.products')

        </div>
        <nav class="phan-trang">
          <div class="column">{!! $all_products_details['products']->appends(Request::capture()->except('page'))->render() !!}</div>
        </nav>
      </div>
      <!-- Sidebar          -->
      <div class="col-xl-3 col-lg-4 order-lg-1">
        <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalShopFilters"><i class="icon-layout"></i></button>
        <aside class="sidebar sidebar-offcanvas">
          <!-- Widget Categories-->
          <section class="widget widget-categories">
            <h3 class="widget-title">Shop Categories</h3>
            <ul>
              <li class="has-children expanded"><a href="#">Shoes</a><span>(1138)</span>
                <ul>
                  <li><a href="#">Women's</a><span>(508)</span>
                    <ul>
                      <li><a href="#">Sneakers</a></li>
                      <li><a href="#">Heels</a></li>
                      <li><a href="#">Loafers</a></li>
                      <li><a href="#">Sandals</a></li>
                    </ul>
                  </li>
                  
                  <li><a href="#">Girl's Shoes</a><span>(110)</span></li>
                </ul>
              </li>
              
            </ul>
          </section>
          <!-- Widget Price Range-->
          <section class="widget widget-categories">
            <h3 class="widget-title">Price Range</h3>
            <form class="price-range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
              <div class="ui-range-slider"></div>
              <footer class="ui-range-slider-footer">
                <div class="column">
                  <button class="btn btn-outline-primary btn-sm" type="submit">Filter</button>
                </div>
                <div class="column">
                  <div class="ui-range-values">
                    <div class="ui-range-value-min">$<span></span>
                      <input type="hidden">
                    </div>&nbsp;-&nbsp;
                    <div class="ui-range-value-max">$<span></span>
                      <input type="hidden">
                    </div>
                  </div>
                </div>
              </footer>
            </form>
          </section>
          <!-- Widget Brand Filter-->
          <section class="widget">
            <h3 class="widget-title">Filter by Brand</h3>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="adidas">
              <label class="custom-control-label" for="adidas">Adidas&nbsp;<span class="text-muted">(254)</span></label>
            </div>
            
          </section>
          <!-- Widget Size Filter-->
          <section class="widget">
            <h3 class="widget-title">Filter by Size</h3>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" type="checkbox" id="xl">
              <label class="custom-control-label" for="xl">XL&nbsp;<span class="text-muted">(208)</span></label>
            </div>
            
          </section>
          <!-- Promo Banner-->
          <section class="promo-box" style="background-image: url(img/banners/02.jpg);">
            <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .45;"></span>
            <div class="promo-box-content text-center padding-top-3x padding-bottom-2x">
              <h4 class="text-light text-thin text-shadow">New Collection of</h4>
              <h3 class="text-bold text-light text-shadow">Sunglassess</h3><a class="btn btn-sm btn-primary" href="#">Shop Now</a>
            </div>
          </section>
        </aside>
      </div>
    </div>
  </div>
  
@endsection  