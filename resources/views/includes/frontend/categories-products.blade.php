@if($product_by_cat_id['products']->count() > 0)
  @if($product_by_cat_id['selected_view'] == 'grid')
    <div class="isotope-grid cols-4 mb-2">
      <div class="gutter-sizer"></div>
      <div class="grid-sizer"></div>

      @foreach($product_by_cat_id['products'] as $item)
        <div class="grid-item" style="position: absolute; left: 0px; top: 0px; margin-bottom:60px">
          <div class="single-product mb-35">
              <div class="product-img">
                <a href="{{ route('details-page', $item['slug']) }}">
                  <div class="can-giua-img">

                    @if(!empty($item['image_url']))
                      <img src="{{ get_image_url( $item['image_url'] ) }}" alt="{{ basename( get_image_url( $item['image_url'] ) ) }}" />
                    @else
                      <img  src="{{ default_placeholder_img_src() }}" alt="" />
                    @endif
                  </div>
                </a>
                @if ( $item['price'] < $item['regular_price'] )
                  @php
        
                    $tiengiam =  $item['regular_price'] - $item['price'];
          
                    $phantram = round(($tiengiam/$item['regular_price'])*100);
                      
                  @endphp
                  <span class="giam-gia">Giảm giá {{ $phantram }}%</span>
        
                @endif

                <span class="gia-bia">                                        
                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item['id'], $item['regular_price'])), get_frontend_selected_currency()) !!}
                </span>


                <div class="product-action">

                  <a class="animate-left quick-view-popup" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                    <i class="ion-eye"></i>
                  </a>

                  <a class="animate-right add-to-cart-bg" data-id="{{ $item['id'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                    <i class="ion-bag"></i>
                  </a>

                  <a class="animate-left product-wishlist" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                    <i class="ion-heart"></i>
                  </a>

                  <a class="animate-right product-compare" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                    <i class="ion-ios-list-outline"></i>
                  </a>


                </div>
              </div>
              <div class="product-content">
                  <div class="product-title">
                      <h4><a href="{{ route('details-page', $item['slug']) }}">{!! $item['title'] !!}</a></h4>
                  </div>
              </div>
          </div>
        </div>
      @endforeach

    </div>
  @endif

  @if($product_by_cat_id['selected_view'] == 'list')

  <div class="isotope-grid cols-1 mb-2">
      <div class="gutter-sizer"></div>
      <div class="grid-sizer"></div>
  
      @foreach($product_by_cat_id['products'] as $item)
        <?php 
          $reviews          = get_comments_rating_details($item['id'], 'product');
          $reviews_settings = get_reviews_settings_data($item['id']);
        ?>
        
        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">

          <div class="single-product single-product-list product-list-right-pr mb-40">
            <div class="product-img list-img-width">
                <a href="{{ route('details-page', $item['slug']) }}">
                  @if(!empty($item['image_url']))
                    <img src="{{ get_image_url( $item['image_url']) }}" alt="{{ basename( get_image_url( $item['image_url']) ) }}"/>
                  @else
                    <img  src="{{ default_placeholder_img_src() }}" alt="" />
                  @endif
                </a>

                <div class="product-action">
                    <!-- <a title="Quick View" data-toggle="modal" data-target="#exampleModal" class="animate-right" href="#"><i class="ion-eye"></i></a> -->

                    <a class="animate-right quick-view-popup" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                      <i class="ion-eye"></i>
                    </a>

                </div>
            </div>
            <div class="product-content-list">
                <div class="product-list-info">
                    <h4><a href="{{ route('details-page', $item['slug']) }}">{!! $item['title'] !!}</a></h4>

                    <div class="price-list">

                      <span class="new">
                        {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item['id'], $item['price'])), get_frontend_selected_currency()) !!}
                      </span>

                      @if ( $item['price'] < $item['regular_price'] )

                        <span class="old">
                          {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item['id'], $item['regular_price'])), get_frontend_selected_currency()) !!}
                        </span>

                      @endif

                    </div>

                </div>

                @if($reviews_settings['enable_reviews_add_link_to_product_page'] && $reviews_settings['enable_reviews_add_link_to_product_page'] == 'yes')
                  <div class="rating-stars">
                    <div class="star-rating">
                      <span style="width:{{ $reviews['percentage'] }}%"></span>
                    </div>

                  </div>
                @endif 

                <div class="product-list-cart-wishlist">
                    <div class="product-list-cart">
                        <a class="btn-hover list-btn-style add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $item['id'] }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                          {{ trans('frontend.add_to_cart_label') }}
                        </a>
                    </div>
                    <div class="product-list-cart">
                      <a class="btn-hover list-btn-wishlist product-wishlist" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                        <i class="ion-heart-empty"></i>
                      </a>
                    </div>
                    <div class="product-list-cart">
                      <a class="btn-hover list-btn-wishlist product-compare" data-id="{{ $item['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                        <i class="ion-ios-analytics-outline"></i>
                      </a>
                    </div>
                    <div class="product-list-cart">

                      <a class="btn-hover list-btn-wishlist btn-store" href="{{ route('store-details-page-content', get_user_name_by_user_id($item['author_id'])) }}" target="_blank" data-toggle="tooltip" title="{{ get_user_name_by_user_id($item['author_id']) }}" data-original-title="{{ trans('frontend.gian-hang') }}">
                        <i class="ion-ios-home-outline"></i>
                      </a>

                    </div>

                </div>

            </div>
          </div>

        </div>
      @endforeach

  </div>
    
  @endif
@else
  <p class="not-available">{!! trans('frontend.product_not_available') !!}</p>
@endif
    