@if($all_products_details['products']->count() > 0)
  @if($all_products_details['selected_view'] == 'grid')
    <div class="isotope-grid cols-3 mb-2">
      <div class="gutter-sizer"></div>
      <div class="grid-sizer"></div>
      @foreach($all_products_details['products'] as $products)
        <?php 
        $reviews          = get_comments_rating_details($products->id, 'product');
        $reviews_settings = get_reviews_settings_data($products->id);
        ?>
        <!-- Product-->
        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
          <div class="product-card">

            <a class="product-thumb" href="{{ route('details-page', $products->slug ) }}">
                @if(!empty($products->image_url))
                  <img src="{{ get_image_url( $products->image_url ) }}" alt="{{ basename( get_image_url( $products->image_url ) ) }}" />
                @else
                  <img src="{{ default_placeholder_img_src() }}" alt="" />
                @endif
            </a>
            <div class="product-card-body">
              {{-- <div class="product-category"><a href="#">{!! $products->title !!}</a></div> --}}
              <h3 class="product-title">
                <a href="{{ route('details-page', $products->slug ) }}">{!! $products->title !!}</a>
              </h3>
              <h4 class="product-price">
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->regular_price)), get_frontend_selected_currency()) !!}
                </del>
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
              </h4>
            </div>

            <div class="product-buttons">
              <button class="btn btn-outline-secondary btn-sm btn-wishlist product-wishlist" data-id="{{ $products->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                <i class="icon-heart"></i>
              </button>
              <button class="btn btn-outline-secondary btn-sm btn-wishlist product-compare" data-id="{{ $products->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                <i class="icon-repeat"></i>
              </button>
              <button class="btn btn-outline-primary btn-sm add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $products->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Chọn</button>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif

  @if($all_products_details['selected_view'] == 'list')

  <div class="isotope-list mb-2">
  
    @foreach($all_products_details['products'] as $products)
      <?php 
      $reviews          = get_comments_rating_details($products->id, 'product');
      $reviews_settings = get_reviews_settings_data($products->id);
      ?>
      <!-- Product-->
      <div class="product-card product-list list-item">
        <a class="product-thumb" href="shop-single.html">
          <div class="product-badge text-danger">50% Off</div>
          @if(!empty($products->image_url))
            <img src="{{ get_image_url( $products->image_url ) }}" alt="{{ basename( get_image_url( $products->image_url ) ) }}" />
          @else
            <img src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-info">
          <h3 class="product-title">
              <a href="{{ route('details-page', $products->slug ) }}">{!! $products->title !!}</a>
          </h3>
          <h4 class="product-price">
              <del>
                {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->regular_price)), get_frontend_selected_currency()) !!}
              </del>
              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
            </h4>
          <p class="hidden-xs-down intro">{!! $products->title !!}</p>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist product-wishlist" data-id="{{ $products->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
              <i class="icon-heart"></i>
            </button>
            <button class="btn btn-outline-secondary btn-sm btn-wishlist product-compare" data-id="{{ $products->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
              <i class="icon-repeat"></i>
            </button>
            <button class="btn btn-outline-primary btn-sm add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $products->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Chọn</button>
          </div>
        </div>
      </div>
    @endforeach

  </div>
    
  @endif
@else
  <p class="not-available">{!! trans('frontend.product_not_available') !!}</p>
@endif
    