@if($product_by_cat_id['products']->count() > 0)
  @if($product_by_cat_id['selected_view'] == 'grid')
    <div class="isotope-grid cols-4 mb-2">
      <div class="gutter-sizer"></div>
      <div class="grid-sizer"></div>

      @foreach($product_by_cat_id['products'] as $item)
        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
          <div class="single-product mb-35">
              <div class="product-img">
                  <a href="{{ route('details-page', $item['post_slug']) }}">
                    @if(!empty($item['image_url']))
                      <img src="{{ get_image_url( $item['post_image_url'] ) }}" alt="{{ basename( get_image_url( $item['post_image_url'] ) ) }}" style="max-height:200px"/>
                    @else
                      <img  src="{{ default_placeholder_img_src() }}" alt="" />
                    @endif
                  </a>
                  @if ( $item['post_price'] < $item['post_regular_price'] )
                    @php
          
                      $tiengiam =  $item['post_regular_price'] - $item['post_price'];
            
                      $phantram = round(($tiengiam/$item['post_regular_price'])*100);
                        
                    @endphp
                    <span>Giảm giá {{ $phantram }}%</span>
          
                  @endif

                  <div class="product-action">

                      <a class="animate-left product-wishlist" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                        <i class="ion-ios-heart-outline"></i>
                      </a>

                      <a class="animate-right product-compare" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                          <i class="ion-ios-analytics-outline"></i>
                        </a>

                      <a class="animate-left quick-view-popup" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                        <i class="ion-ios-eye-outline"></i>
                      </a>

                  </div>
              </div>
              <div class="product-content">
                  <div class="product-title-price">
                      <div class="product-title">
                          <h4><a href="{{ route('details-page', $item['post_slug']) }}">{!! $item['post_title'] !!}</a></h4>
                      </div>
                      <div class="product-price">
                          <span>
                              {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item['id'], $item['post_price'])), get_frontend_selected_currency()) !!}
                          </span>
                      </div>
                  </div>
                  <div class="product-cart-categori">
                      <div class="product-cart">
                          <span>{{ get_user_name_by_user_id($item['author_id']) }}</span>
                      </div>
                      <div class="product-categori">
                          <a class="add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $item['id'] }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                            <i class="ion-bag"></i>{{ trans('frontend.add_to_cart_label') }}
                          </a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
      @endforeach

    </div>
  @endif

  @if($product_by_cat_id['selected_view'] == 'list')

  <div class="isotope-list mb-2">
  
    @foreach($product_by_cat_id['products'] as $products)
      <?php 
        $reviews          = get_comments_rating_details($products['id'], 'product');
        $reviews_settings = get_reviews_settings_data($products['id']);
      ?>
      
      <!-- Products List-->
      <div class="product-card product-list mb-30">
        <a class="product-thumb" href="{{ route('details-page', $products['slug'] ) }}">
          <!-- <div class="product-badge bg-danger">Sale</div> -->
          @if(!empty($products['image_url']))
            <img src="{{ get_image_url( $products['image_url'] ) }}" alt="{{ basename( get_image_url( $products['image_url'] ) ) }}" />
          @else
            <img src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
        <div class="product-card-inner">
          <div class="product-card-body">
            <!-- <div class="product-category"><a href="#">Smart home</a></div> -->
            <h3 class="product-title">
              <a href="{{ route('details-page', $products['slug'] ) }}">{!! $products['title'] !!}</a>
            </h3>
            <h4 class="product-price">
                <del>
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['regular_price'])), get_frontend_selected_currency()) !!}
                </del>
                @if( $products['type'] == 'simple_product' )
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['price'])), get_frontend_selected_currency()) !!}
                @elseif( $products['type'] == 'configurable_product' )
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
                @elseif( $products['type'] == 'customizable_product' || $products['type'] == 'downloadable_product')
                  @if(count(get_product_variations($products['id']))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
                  @else
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['price'])), get_frontend_selected_currency()) !!}
                  @endif
                @endif
              </h4>
            <p class="text-sm text-muted hidden-xs-down my-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore odit officiis illo perferendis deserunt, ipsam dolor ad dolorem eaque veritatis.</p>
          </div>

          <div class="product-button-group">
            <a class="product-button btn-wishlist product-wishlist" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
              <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
            </a>
            <a class="product-button btn-compare product-compare" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
              <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
            </a>
            <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="{!! $products['title'] !!}" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $products['id'] }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
              <i class="icon-shopping-cart"></i><span>{{ trans('frontend.add_to_cart_label') }}</span>
            </a>
          </div>
        </div>
      </div>
    @endforeach

  </div>
    
  @endif
@else
  <p class="not-available">{!! trans('frontend.product_not_available') !!}</p>
@endif
    