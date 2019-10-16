@include('includes.frontend.home-section')
@yield('categories-slider-area')

<section class="container padding-top-1x padding-bottom-1x">
  <div class="row">
  @foreach($productCategoriesTree as $cat)

  @if ( in_array($cat['id'],[8,14,18,]) )

    <div class="col-lg-4 col-sm-6">
      <div class="card border-0 bg-secondary mb-30">
        <div class="card-body d-table w-100">
          <div class="d-table-cell align-middle">
            <a href="{{ route('categories-page', $cat['slug']) }}">

              @if( !empty($cat['img_url']) )
                <img class="d-block" src="{{ get_image_url($cat['img_url']) }}" alt="{!! $cat['name'] !!}"> 
              @else
                <img class="d-block" src="{{ default_placeholder_img_src() }}" alt="{!! $cat['name'] !!}"> 
              @endif
              
            </a>
          </div>
          <div class="d-table-cell align-middle pl-2">
            <h3 class="h6 text-thin top-product">
              {!! $cat['name'] !!}
            </h3>
            <a class="text-decoration-none" href="{{ route('categories-page', $cat['slug']) }}">Chi tiết&nbsp;<i class="icon-chevron-right d-inline-block align-middle text-lg"></i></a>
          </div>
        </div>
      </div>
    </div>

    @endif

    @endforeach
    
  </div>
</section>

@include('includes.frontend.home-spcl')
@yield('htc__product__area')


<!-- Recommended Products-->
<section class="container padding-bottom-1x mb-2">
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.recommended_products') }}</h2>
  <div class="row">

  @foreach($advancedData['recommended_items'] as $key => $recommended_product)
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="product-card mb-30">
        @if ( $recommended_product->price < $recommended_product->regular_price )
            @php
              $tiengiam =  $recommended_product->regular_price - $recommended_product->price;
              $phantram = round(($tiengiam/$recommended_product->regular_price)*100);
            @endphp
          <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>
        @endif
        <a class="product-thumb" href="{{ route('details-page', $recommended_product->slug) }}">
          @if(!empty($recommended_product->image_url))
          <img class="products-page-product-img" src="{{ get_image_url( $recommended_product->image_url ) }}" alt="{{ basename( get_image_url( $recommended_product->image_url ) ) }}" />
          @else
          <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-body">
          <!-- <div class="product-category"><a href="#">Smart home</a></div> -->
          <h3 class="product-title"><a href="{{ route('details-page', $recommended_product->slug) }}">{!! $recommended_product->title !!}</a></h3>
          <h4 class="product-price">
            @if ( $recommended_product->price < $recommended_product->regular_price )
              <del>
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->regular_price)), get_frontend_selected_currency()) !!}
              </del>
            @endif
            @if( $recommended_product->type == 'simple_product' )
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->price)), get_frontend_selected_currency()) !!}
            @elseif( $recommended_product->type == 'configurable_product' )
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_product->id) !!}
            @elseif( $recommended_product->type == 'customizable_product' || $recommended_product->type == 'downloadable_product')
              @if(count(get_product_variations($recommended_product->id))>0)
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_product->id) !!}
              @else
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_product->id, $recommended_product->price)), get_frontend_selected_currency()) !!}
              @endif
            @endif
          </h4>
        </div>
        <div class="product-button-group">

          <a class="product-button btn-wishlist product-wishlist" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
            <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
          </a>
          <a class="product-button btn-compare product-compare" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
            <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
          </a>
          <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $recommended_product->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
            <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
          </a>

       </div>
      </div>
    </div>  
  @endforeach
  </div>
</section>

<!-- Featured Products-->
<section class="container padding-bottom-1x mb-2">
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.features_products') }}</h2>
  <div class="row">

  @foreach($advancedData['features_items'] as $key => $features_product)

    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="product-card mb-30">

        @if ( $features_product->price < $features_product->regular_price )
          @php

          $tiengiam =  $features_product->regular_price - $features_product->price;

          $phantram = round(($tiengiam/$features_product->regular_price)*100);
            
        @endphp
        <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>

        @endif
        <a class="product-thumb" href="{{ route('details-page', $features_product->slug) }}">
          @if(!empty($features_product->image_url))
          <img class="products-page-product-img" src="{{ get_image_url( $features_product->image_url ) }}" alt="{{ basename( get_image_url( $features_product->image_url ) ) }}" />
          @else
          <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-body">
          
          <h3 class="product-title"><a href="{{ route('details-page', $features_product->slug) }}">{!! $features_product->title !!}</a></h3>
          <h4 class="product-price">
            @if ( $features_product->price < $features_product->regular_price )
              <del>
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->regular_price)), get_frontend_selected_currency()) !!}
              </del>
            @endif

            @if( $features_product->type == 'simple_product' )
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->price)), get_frontend_selected_currency()) !!}
            @elseif( $features_product->type == 'configurable_product' )
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_product->id) !!}
            @elseif( $features_product->type == 'customizable_product' || $features_product->type == 'downloadable_product')
              @if(count(get_product_variations($features_product->id))>0)
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_product->id) !!}
              @else
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->price)), get_frontend_selected_currency()) !!}
              @endif
            @endif
          </h4>
        </div>
        <div class="product-button-group">

          <a class="product-button btn-wishlist product-wishlist" data-id="{{ $features_product->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
            <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
          </a>
          <a class="product-button btn-compare product-compare" data-id="{{ $features_product->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
            <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
          </a>
          <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
            <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
          </a>

       </div>
      </div>
    </div>  
  @endforeach
  </div>
</section>

<!-- Latest Products-->
<section class="container padding-bottom-1x mb-2">
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.latest_products') }}</h2>
  <div class="row">

  @foreach($advancedData['latest_items'] as $key => $latest_product)

    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="product-card mb-30">

        @if ( $latest_product->price < $latest_product->regular_price )
          @php

          $tiengiam =  $latest_product->regular_price - $latest_product->price;

          $phantram = round(($tiengiam/$latest_product->regular_price)*100);
            
        @endphp
        <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>

        @endif
        <a class="product-thumb" href="{{ route('details-page', $latest_product->slug) }}">
          @if(!empty($latest_product->image_url))
          <img class="products-page-product-img" src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
          @else
          <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-body">
          
          <h3 class="product-title"><a href="{{ route('details-page', $latest_product->slug) }}">{!! $latest_product->title !!}</a></h3>
          <h4 class="product-price">
            @if ( $latest_product->price < $latest_product->regular_price )
              <del>
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->regular_price)), get_frontend_selected_currency()) !!}
              </del>
            @endif

            @if( $latest_product->type == 'simple_product' )
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), get_frontend_selected_currency()) !!}
            @elseif( $latest_product->type == 'configurable_product' )
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest_product->id) !!}
            @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
              @if(count(get_product_variations($latest_product->id))>0)
              {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest_product->id) !!}
              @else
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), get_frontend_selected_currency()) !!}
              @endif
            @endif
          </h4>
        </div>
        <div class="product-button-group">

          <a class="product-button btn-wishlist product-wishlist" data-id="{{ $latest_product->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
            <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
          </a>
          <a class="product-button btn-compare product-compare" data-id="{{ $latest_product->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
            <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
          </a>
          <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $latest_product->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
            <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
          </a>

       </div>
      </div>
    </div>  
  @endforeach
  </div>
</section>

<!-- Today sale Products-->

{{-- @if (count($advancedData['todays_deal']) > 0) --}}
@if(count($advancedData['todays_deal']) > 0)
  <section class="container padding-bottom-1x mb-2">
    <h2 class="h3 pb-3 text-center">{{ trans('frontend.todays_sale_label') }}</h2>
    <div class="row">

    {{-- @foreach($advancedData['todays_deal'] as $key => $best_sales_product) --}}
    @foreach($advancedData['todays_deal'] as $key => $todays_sales_product)

      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product-card mb-30">
          @if ($todays_sales_product['post_price'] <$todays_sales_product['post_regular_price'] )
              @php
                $tiengiam = $todays_sales_product['post_regular_price'] - $todays_sales_product['post_price'];
                $phantram = ($tiengiam/$todays_sales_product['post_regular_price'])*100;
              @endphp
            <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>
          @endif
          <a class="product-thumb" href="{{ route('details-page',$todays_sales_product['post_slug']) }}">
            @if(!empty($todays_sales_product['post_image_url']))
              <img class="products-page-product-img" src="{{ get_image_url($todays_sales_product['post_image_url'] ) }}" alt="{{ basename( get_image_url($todays_sales_product['post_image_url'] ) ) }}" />
            @else
              <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="" />
            @endif
          </a>
          <div class="product-card-body">
            
            <h3 class="product-title"><a href="{{ route('details-page',$todays_sales_product['post_slug']) }}">{!!$todays_sales_product['post_title'] !!}</a></h3>

            <h4 class="product-price">
              @if ($todays_sales_product['post_price'] <$todays_sales_product['post_regular_price'] )
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($todays_sales_product['id'],$todays_sales_product['post_regular_price'])), get_frontend_selected_currency()) !!}
                </del>
              @endif

              @if($todays_sales_product['post_type'] == 'simple_product' )
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($todays_sales_product['id'],$todays_sales_product['post_price'])), get_frontend_selected_currency()) !!}
              @elseif($todays_sales_product['post_type'] == 'configurable_product' )
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(),$todays_sales_product['id']) !!}
              @elseif($todays_sales_product['post_type'] == 'customizable_product' ||$todays_sales_product['post_type'] == 'downloadable_product')
                @if(count(get_product_variations($todays_sales_product['id']))>0)
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(),$todays_sales_product['id']) !!}
                @else
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_sales_product['id'],$todays_sales_product['post_sale_price'])), get_frontend_selected_currency()) !!}
                @endif
              @endif
            </h4>
          </div>
          <div class="product-button-group">

            <a class="product-button btn-wishlist product-wishlist" data-id="{{$todays_sales_product['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
              <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
            </a>
            <a class="product-button btn-compare product-compare" data-id="{{$todays_sales_product['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
              <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
            </a>
            <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{$todays_sales_product['id'] }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
              <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
            </a>

          </div>
        </div>
      </div>  
    @endforeach
    </div>

  </section>
@endif

{{-- a --}}

<!-- Staff Picks (Widgets)-->
<section class="container padding-top-1x padding-bottom-1x">
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.staff_picks') }}</h2>

  <div class="row pt-1">
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">{{ trans('frontend.best_sellers') }}</h3>

        @foreach($advancedData['best_sales'] as $key => $best_product)

        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb">
            <a href="{{ route('details-page', $best_product['post_slug']) }}">
              @if(!empty($best_product['post_image_url']))
                <img src="{{ get_image_url( $best_product['post_image_url'] ) }}" alt="{{ basename( get_image_url( $best_product['post_image_url'] ) ) }}" />
              @else
                <img src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
            </a>
          </div>
          <div class="entry-content">
            
            <h4 class="entry-title">
              <a href="{{ route('details-page', $best_product['post_slug']) }}">{!! $best_product['post_title'] !!}</a>
            </h4>

            <span class="entry-meta">

              @if ($best_product['post_price'] < $best_product['post_regular_price'] )
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_product['id'],$best_product['post_regular_price'])), get_frontend_selected_currency()) !!}
                </del>
                &nbsp;

              @endif

              @if( $best_product['post_type'] == 'simple_product' )
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_product['id'], $best_product['post_price'])), get_frontend_selected_currency()) !!}
              @elseif( $best_product['post_type'] == 'configurable_product' )
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $best_product['id']) !!}
              @elseif( $best_product['post_type'] == 'customizable_product' || $best_product['post_type'] == 'downloadable_product')
                @if(count(get_product_variations($best_product['id']))>0)
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $best_product['id']) !!}
                @else
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_product['id'], $best_product['post_price'])), get_frontend_selected_currency()) !!}
                @endif
              @endif
            
            </span>
          </div>
        </div>

        @endforeach
        
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">{{ trans('frontend.news_arrivals') }}</h3>

        @foreach($advancedData['latest_items'] as $key => $latest_product)
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb">
            <a href="{{ route('details-page', $latest_product->slug) }}">
              @if(!empty($latest_product->image_url))
              <img src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
              @else
              <img src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
            </a>
          </div>
          <div class="entry-content">
            
            <h4 class="entry-title"><a href="{{ route('details-page', $latest_product->slug) }}">{!! $latest_product->title !!}</a></h4>

            <span class="entry-meta">

              @if ($latest_product->price < $latest_product->regular_price )
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id,$latest_product->regular_price)), get_frontend_selected_currency()) !!}
                </del>
                &nbsp;

              @endif

              @if( $latest_product->type == 'simple_product' )
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), get_frontend_selected_currency()) !!}
              @elseif( $latest_product->type == 'configurable_product' )
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest_product->id) !!}
              @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                @if(count(get_product_variations($latest_product->id))>0)
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest_product->id) !!}
                @else
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), get_frontend_selected_currency()) !!}
                @endif
              @endif
            
            </span>
          </div>
        </div>
        @endforeach
        
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">{{ trans('frontend.top_rated') }}</h3>
        
        @foreach($advancedData['latest_items'] as $key => $latest_product)
        <!-- Entry-->
        <div class="entry">
          <div class="entry-thumb">
            <a href="{{ route('details-page', $latest_product->slug) }}">
              @if(!empty($latest_product->image_url))
              <img src="{{ get_image_url( $latest_product->image_url ) }}" alt="{{ basename( get_image_url( $latest_product->image_url ) ) }}" />
              @else
              <img src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
            </a>
          </div>
          <div class="entry-content">
            
            <h4 class="entry-title"><a href="{{ route('details-page', $latest_product->slug) }}">{!! $latest_product->title !!}</a></h4>

            <span class="entry-meta">

              @if ($latest_product->price < $latest_product->regular_price )
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id,$latest_product->regular_price)), get_frontend_selected_currency()) !!}
                </del>
                &nbsp;
              @endif

              @if( $latest_product->type == 'simple_product' )
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), get_frontend_selected_currency()) !!}
              @elseif( $latest_product->type == 'configurable_product' )
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest_product->id) !!}
              @elseif( $latest_product->type == 'customizable_product' || $latest_product->type == 'downloadable_product')
                @if(count(get_product_variations($latest_product->id))>0)
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest_product->id) !!}
                @else
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest_product->id, $latest_product->price)), get_frontend_selected_currency()) !!}
                @endif
              @endif
            
            </span>
          </div>
        </div>
        @endforeach
        
      
      </div>
    </div>
  </div>
</section>
<!-- Popular Brands Carousel-->
@if(count($brands_data) > 0)  
<section class="bg-secondary padding-top-1x padding-bottom-1x">
  <div class="container">
    <h2 class="h3 text-center mb-30 pb-3">{!! trans('frontend.brands') !!}</h2>
    <div class="owl-carousel" data-owl-carousel='{ "nav": false, "dots": false, "loop": true, "autoplay": true, "autoplayTimeout": 4000, "responsive": {"0":{"items":2}, "470":{"items":3},"630":{"items":4},"991":{"items":5},"1200":{"items":6}} }'>
      @foreach($brands_data as $brand)  
      <a href="{{ route('brands-single-page', $brand['slug']) }}">
        @if(!empty($brand['brand_logo_img_url']))
          <img  class="d-block w-110 opacity-75 m-auto" src="{{ get_image_url($brand['brand_logo_img_url']) }}" alt="{{ basename($brand['brand_logo_img_url']) }}" />
        @else
          <img  class="d-block w-110 opacity-75 m-auto" src="{{ default_placeholder_img_src() }}" alt="" />
        @endif
      </a>
      @endforeach
    </div>
  </div>
</section>
@endif
<!-- Services-->
<section class="container padding-top-3x padding-bottom-2x">
  <div class="row">
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/01.png" alt="Shipping">
      <h6 class="mb-2">Miễn phí vận chuyển</h6>
      <p class="text-sm text-muted mb-0">Miễn phí vận chuyển nội tỉnh cho các đơn hàng có giá trị từ 100.000đ</p>
    </div>
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/02.png" alt="Money Back">
      <h6 class="mb-2">Bảo đảm hoàn tiền</h6>
      <p class="text-sm text-muted mb-0">Hoàn tiền khi sản phẩm không đúng mô tả (trong vòng 30 ngày)</p>
    </div>
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/03.png" alt="Support">
      <h6 class="mb-2">Hỗ trợ khách hàng 24/7</h6>
      <p class="text-sm text-muted mb-0">Hỗ trợ khách hàng, nhà cung cấp nhiệt thành, thân thiện</p>
    </div>
    <div class="col-md-3 col-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded mx-auto mb-4" src="img/services/04.png" alt="Payment">
      <h6 class="mb-2">Thanh toán an toàn</h6>
      <p class="text-sm text-muted mb-0">Đảm bảo các tiêu chuẩn khi thanh toán trực tuyến</p>
    </div>
  </div>
</section>