@section('product_area')

<div class="product-collection-area pt-50 pb-50">
  <div class="container">
      <div class="row">

          @foreach($advancedData['latest_items'] as $item)
          <div class="col-6 col-md-4 col-lg-3">
              <div class="single-product mb-35">
                  <div class="product-img">
                      <a href="{{ route('details-page', $item->slug) }}">
                        @if(!empty($item->image_url))
                          <img src="{{ get_image_url( $item->image_url ) }}" alt="{{ basename( get_image_url( $item->image_url ) ) }}" style="max-height:170px"/>
                        @else
                          <img  src="{{ default_placeholder_img_src() }}" alt="" />
                        @endif
                      </a>
                      @if ( $item->price < $item->regular_price )
                        @php
              
                          $tiengiam =  $item->regular_price - $item->price;
                
                          $phantram = round(($tiengiam/$item->regular_price)*100);
                            
                        @endphp
                        <span>Giảm giá {{ $phantram }}%</span>
              
                      @endif

                      <div class="product-action">

                          <a class="animate-left product-wishlist" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                            <i class="ion-heart"></i>
                          </a>

                          <a class="animate-right product-compare" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                              <i class="ion-ios-list-outline"></i>
                            </a>
  
                          <a class="animate-left quick-view-popup" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                            <i class="ion-eye"></i>
                          </a>

                      </div>
                  </div>
                  <div class="product-content">
                      <div class="product-title-price">
                          <div class="product-title">
                              <h4><a href="{{ route('details-page', $item->slug) }}">{!! $item->title !!}</a></h4>
                          </div>
                          <div class="product-price">
                              <span>
                                  @if( $item->type == 'simple_product' )
                                    {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item->id, $item->price)), get_frontend_selected_currency()) !!}
                                  @elseif( $item->type == 'configurable_product' )
                                    {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $item->id) !!}
                                  @elseif( $item->type == 'customizable_product' || $item->type == 'downloadable_product')
                                    @if(count(get_product_variations($item->id))>0)
                                    {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $item->id) !!}
                                    @else
                                    {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item->id, $item->price)), get_frontend_selected_currency()) !!}
                                    @endif
                                  @endif
                              </span>
                          </div>
                      </div>
                      <div class="product-cart-categori">
                          <div class="product-cart">
                              <span>{{ get_store_name_by_user_id($item->author_id) }}</span>
                          </div>
                          <div class="product-categori">
                              <a class="add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="{{ trans('frontend.successfuly_added_to_cart') }}" data-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top"title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                                <i class="ion-bag"></i>{{ trans('frontend.add_to_cart_label') }}
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          @endforeach

      </div>
  </div>
</div>

@stop