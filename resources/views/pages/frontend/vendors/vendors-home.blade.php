@section('vendors-home-page-content')

<!-- Featured Products-->
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
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($latest->id, $latest->regular_price)), get_frontend_selected_currency()) !!}
                </del>
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

@endsection