@section('vendors-home-page-content')

<!-- Latest Products-->
<section>
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.only_latest_label') }}</h2>

  @if(count($vendor_advanced_items['latest_items']) > 0)  
    <div class="row">
      @foreach($vendor_advanced_items['latest_items'] as $latest)

        <?php $reviews  = get_comments_rating_details($latest->id, 'product');?>

        <div class="col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <div class="product-badge bg-danger">Sale</div>
            <a class="product-thumb" href="{{ route('details-page', $latest->slug) }}">

                @if(!empty($latest->image_url))  
                <img class="products-page-product-img" src="{{ get_image_url($latest->image_url) }}" alt="">
                @else
                <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="">
                @endif

              
            </a>
            <div class="product-card-body">
              
              <h3 class="product-title"><a href="{{ route('details-page', $latest->slug) }}">{!! get_product_title( $latest->id ) !!}</a></h3>
              <h4 class="product-price">
                <!-- <del>$62.00</del>$49.99 -->

                @if ( $latest->regular_price <   $latest->regular_price )

                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest->id, $latest->regular_price)), get_frontend_selected_currency()) !!}
                </del>

                @endif


                @if( $latest->type == 'simple_product' )
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest->id, $latest->price)), get_frontend_selected_currency()) !!}
                @elseif( $latest->type == 'configurable_product' )
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest->id) !!}
                @elseif( $latest->type == 'customizable_product' || $latest->type == 'downloadable_product')
                  @if(count(get_product_variations($latest->id))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $latest->id) !!}
                  @else
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest->id, $latest->price)), get_frontend_selected_currency()) !!}
                  @endif
                @endif
              </h4>
            </div>
            <div class="product-button-group">

              <a class="product-button btn-wishlist product-wishlist" data-id="{{ $latest->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
              </a>
              <a class="product-button btn-compare product-compare" data-id="{{ $latest->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
              </a>
              <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $latest->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $latest->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
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


<!-- Best sales Products-->
<section>
  <h2 class="h3 pb-3 text-center">{{ trans('frontend.best_sales_label') }}</h2>

  @if(count($vendor_advanced_items['best_sales']) > 0)  
    <div class="row">
    @foreach($vendor_advanced_items['best_sales'] as $best_sales)

        <?php $reviews  = get_comments_rating_details($best_sales->id, 'product');?>

        <div class="col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <div class="product-badge bg-danger">Sale</div>
            <a class="product-thumb" href="{{ route('details-page', $best_sales->slug) }}">

                @if(!empty($best_sales->image_url))  
                <img class="products-page-product-img" src="{{ get_image_url($best_sales->image_url) }}" alt="">
                @else
                <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="">
                @endif

              
            </a>
            <div class="product-card-body">
              
              <h3 class="product-title"><a href="{{ route('details-page', $best_sales->slug) }}">{!! get_product_title( $best_sales->id ) !!}</a></h3>
              <h4 class="product-price">
                <!-- <del>$62.00</del>$49.99 -->

                @if ( $best_sales->regular_price <   $best_sales->regular_price )

                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_sales->id, $best_sales->regular_price)), get_frontend_selected_currency()) !!}
                </del>

                @endif


                @if( $best_sales->type == 'simple_product' )
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_sales->id, $best_sales->price)), get_frontend_selected_currency()) !!}
                @elseif( $best_sales->type == 'configurable_product' )
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $best_sales->id) !!}
                @elseif( $best_sales->type == 'customizable_product' || $best_sales->type == 'downloadable_product')
                  @if(count(get_product_variations($best_sales->id))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $best_sales->id) !!}
                  @else
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($best_sales->id, $best_sales->price)), get_frontend_selected_currency()) !!}
                  @endif
                @endif
              </h4>
            </div>
            <div class="product-button-group">

              <a class="product-button btn-wishlist product-wishlist" data-id="{{ $best_sales->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
              </a>
              <a class="product-button btn-compare product-compare" data-id="{{ $best_sales->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
              </a>
              <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $best_sales->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $best_sales->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
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


<!-- Featured Products-->
<section>
  <h2 class="h3 pb-3 text-center">{!! trans('frontend.featured_products_label') !!}</h2>

  @if(count($vendor_advanced_items['features_items']) > 0)  
    <div class="row">
    @foreach($vendor_advanced_items['features_items'] as $features_items)

        <?php $reviews  = get_comments_rating_details($features_items->id, 'product');?>

        <div class="col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <div class="product-badge bg-danger">Sale</div>
            <a class="product-thumb" href="{{ route('details-page', $features_items->slug) }}">

                @if(!empty($features_items->image_url))  
                <img class="products-page-product-img" src="{{ get_image_url($features_items->image_url) }}" alt="">
                @else
                <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="">
                @endif

              
            </a>
            <div class="product-card-body">
              
              <h3 class="product-title"><a href="{{ route('details-page', $features_items->slug) }}">{!! get_product_title( $features_items->id ) !!}</a></h3>
              <h4 class="product-price">
                <!-- <del>$62.00</del>$49.99 -->

                @if ( $features_items->regular_price <   $features_items->regular_price )

                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_items->id, $features_items->regular_price)), get_frontend_selected_currency()) !!}
                </del>

                @endif


                @if( $features_items->type == 'simple_product' )
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_items->id, $features_items->price)), get_frontend_selected_currency()) !!}
                @elseif( $features_items->type == 'configurable_product' )
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_items->id) !!}
                @elseif( $features_items->type == 'customizable_product' || $features_items->type == 'downloadable_product')
                  @if(count(get_product_variations($features_items->id))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $features_items->id) !!}
                  @else
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($features_items->id, $features_items->price)), get_frontend_selected_currency()) !!}
                  @endif
                @endif
              </h4>
            </div>
            <div class="product-button-group">

              <a class="product-button btn-wishlist product-wishlist" data-id="{{ $features_items->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
              </a>
              <a class="product-button btn-compare product-compare" data-id="{{ $features_items->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
              </a>
              <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $features_items->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $features_items->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
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


<!-- Recommended Products-->
<section>
  <h2 class="h3 pb-3 text-center">{!! trans('frontend.recommended_items') !!}</h2>

  @if(count($vendor_advanced_items['recommended_items']) > 0)  
    <div class="row">
    @foreach($vendor_advanced_items['recommended_items'] as $recommended_items)

        <?php $reviews  = get_comments_rating_details($recommended_items->id, 'product');?>

        <div class="col-md-4 col-sm-6">
          <div class="product-card mb-30">
            <div class="product-badge bg-danger">Sale</div>
            <a class="product-thumb" href="{{ route('details-page', $recommended_items->slug) }}">

                @if(!empty($recommended_items->image_url))  
                <img class="products-page-product-img" src="{{ get_image_url($recommended_items->image_url) }}" alt="">
                @else
                <img class="products-page-product-img" src="{{ default_placeholder_img_src() }}" alt="">
                @endif

              
            </a>
            <div class="product-card-body">
              
              <h3 class="product-title"><a href="{{ route('details-page', $recommended_items->slug) }}">{!! get_product_title( $recommended_items->id ) !!}</a></h3>
              <h4 class="product-price">
                <!-- <del>$62.00</del>$49.99 -->

                @if ( $recommended_items->regular_price <   $recommended_items->regular_price )

                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_items->id, $recommended_items->regular_price)), get_frontend_selected_currency()) !!}
                </del>

                @endif


                @if( $recommended_items->type == 'simple_product' )
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_items->id, $recommended_items->price)), get_frontend_selected_currency()) !!}
                @elseif( $recommended_items->type == 'configurable_product' )
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_items->id) !!}
                @elseif( $recommended_items->type == 'customizable_product' || $recommended_items->type == 'downloadable_product')
                  @if(count(get_product_variations($recommended_items->id))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $recommended_items->id) !!}
                  @else
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($recommended_items->id, $recommended_items->price)), get_frontend_selected_currency()) !!}
                  @endif
                @endif
              </h4>
            </div>
            <div class="product-button-group">

              <a class="product-button btn-wishlist product-wishlist" data-id="{{ $recommended_items->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
              </a>
              <a class="product-button btn-compare product-compare" data-id="{{ $recommended_items->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
              </a>
              <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $recommended_items->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $recommended_items->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
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