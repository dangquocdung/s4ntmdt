@section('vendor-products-content')

@if($vendor_products['products']->count() > 0)
  @if($vendor_products['selected_view'] == 'grid')
    <div class="row">
      @foreach($vendor_products['products'] as $products)
        <?php 
        $reviews          = get_comments_rating_details($products->id, 'product');
        $reviews_settings = get_reviews_settings_data($products->id);
        ?>
        <!-- Products Grid-->
        <div class="col-md-4 col-sm-6">
          <div class="product-card mb-30">
            @if ( $products->price < $products->regular_price )

            @php
              $tiengiam =  $products->regular_price - $products->price;
              $phantram = round(($tiengiam/$products->regular_price)*100);
            @endphp
            <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>

            @endif

            <!-- <div class="product-badge bg-danger">Sale</div> -->
            <a class="product-thumb" href="{{ route('details-page', $products->slug ) }}">
              @if(!empty($products->image_url))
                <img src="{{ get_image_url( $products->image_url ) }}" alt="{{ basename( get_image_url( $products->image_url ) ) }}" />
              @else
                <img src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
            </a>
            <div class="product-card-body">
              <!-- <div class="product-category"><a href="#">Smart home</a></div> -->
              <h3 class="product-title"><a href="{{ route('details-page', $products->slug ) }}">{!! $products->title !!}</a></h3>
              
              <h4 class="product-price">
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->regular_price)), get_frontend_selected_currency()) !!}
                </del>

                @if( $products->type == 'simple_product' )
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
                @elseif( $products->type == 'configurable_product' )
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}
                @elseif( $products->type == 'customizable_product' || $products->type == 'downloadable_product')
                  @if(count(get_product_variations($products->id))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}
                  @else
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
                  @endif
                @endif
              </h4>
            </div>
            <div class="product-button-group">
              <a class="product-button btn-wishlist product-wishlist" data-id="{{ $products->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
              </a>
              <a class="product-button btn-compare product-compare" data-id="{{ $products->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
              </a>
              <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $products->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $products->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endif

  @if($vendor_products['selected_view'] == 'list')
    @foreach($vendor_products['products'] as $products)
      <?php 
      $reviews          = get_comments_rating_details($products->id, 'product');
      $reviews_settings = get_reviews_settings_data($products->id);
      ?>
      <!-- Products List-->
      <div class="product-card product-list mb-30">
        <a class="product-thumb" href="{{ route('details-page', $products->slug ) }}">
          <!-- <div class="product-badge bg-danger">Sale</div> -->
          @if(!empty($products->image_url))
            <img src="{{ get_image_url( $products->image_url ) }}" alt="{{ basename( get_image_url( $products->image_url ) ) }}" />
          @else
            <img src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-inner">
          <div class="product-card-body">
            <!-- <div class="product-category"><a href="#">Smart home</a></div> -->
            <h3 class="product-title"><a href="{{ route('details-page', $products->slug ) }}">{!! $products->title !!}</a></h3>
            <h4 class="product-price">
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->regular_price)), get_frontend_selected_currency()) !!}
                </del>
                @if( $products->type == 'simple_product' )
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
                @elseif( $products->type == 'configurable_product' )
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}
                @elseif( $products->type == 'customizable_product' || $products->type == 'downloadable_product')
                  @if(count(get_product_variations($products->id))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products->id) !!}
                  @else
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products->id, $products->price)), get_frontend_selected_currency()) !!}
                  @endif
                @endif
              </h4>
            <p class="text-sm text-muted hidden-xs-down my-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odit officiis illo perferendis deserunt, ipsam dolor ad dolorem eaque veritatis.</p>
          </div>

          <div class="product-button-group">
            <a class="product-button btn-wishlist product-wishlist" data-id="{{ $products->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
              <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
            </a>
            <a class="product-button btn-compare product-compare" data-id="{{ $products->id }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
              <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
            </a>
            <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $products->title !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $products->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
              <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
            </a>
          </div>
        </div>
      </div>
      
    @endforeach    
  @endif
@else
  <p class="not-available">{!! trans('frontend.product_not_available') !!}</p>
@endif

@endsection