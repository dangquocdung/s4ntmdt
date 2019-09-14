@section('vendors-home-page-content')

<!-- Featured Products-->
<section class="container padding-bottom-2x mb-2">
  <h2 class="h3 pb-3 text-center">{!! trans('frontend.shop_by_cat_label') !!}</h2>

  @if(count($vendor_home_page_cats) > 0)  
    <div class="row">

    @foreach($vendor_home_page_cats as $cats)

      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product-card mb-30">
          <div class="product-badge bg-danger">Sale</div>
          <a class="product-thumb" href="{{ route('details-page', $features_product->slug) }}">
            @if(!empty(get_image_url($cats['parent_cat']['category_img_url'])))
              <img class="products-page-product-img" src="{{ get_image_url($cats['parent_cat']['category_img_url']) }}">
            @else
              <img class="products-page-product-im" src="{{ default_placeholder_img_src() }}">
            @endif
          </a>
          <div class="product-card-body">
            
            <h3 class="product-title"><a href="{{ route('details-page', $features_product->slug) }}">{!! $features_product->title !!}</a></h3>
            <h4 class="product-price">
              <!-- <del>$62.00</del>$49.99 -->
              <del>
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_product->id, $features_product->regular_price)), get_frontend_selected_currency()) !!}
              </del>
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
            <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $features_product->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $features_product->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
              <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
            </a>

        </div>
        </div>
      </div>  
    @endforeach
    </div>

  @else

    {!! trans('frontend.product_not_available') !!}

  @endif

</section>

@endsection