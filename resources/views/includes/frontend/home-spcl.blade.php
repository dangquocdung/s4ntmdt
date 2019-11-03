@section('product_area')
<section class="product-area pt-50">
    <div class="container">
        <div class="product-style">
            <div class="product-tab-list text-center mb-45 nav product-menu-mrg">
                <!-- Nav tabs -->
                <a class="active" href="#latest_products" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home1">
                    <h4>{{ trans('frontend.latest_products') }}&nbsp;</h4>
                </a>
                <a class="" href="#todays_sale" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home1">
                    <h4>{{ trans('frontend.todays_sale_label') }}&nbsp;</h4>
                </a>

            </div>
            <div class="tab-content another-product-style jump">
                <div class="tab-pane fade show active" id="latest_products" role="tabpanel">
                  <div class="isotope-grid cols-5 mb-2">
                    <div class="gutter-sizer"></div>
                    <div class="grid-sizer"></div>
                        @foreach($advancedData['latest_items'] as $item)
                        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
                              <div class="single-product mb-35">
                                  <div class="product-img">
                                      <a href="{{ route('details-page', $item->slug) }}">
                                        @if(!empty($item->image_url))
                                          <img src="{{ get_image_url( $item->image_url ) }}" alt="{{ basename( get_image_url( $item->image_url ) ) }}" style="max-height:300px"/>
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
                                            <i class="ion-ios-heart-outline"></i>
                                          </a>
                
                                          <a class="animate-right product-compare" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                                              <i class="ion-ios-analytics-outline"></i>
                                            </a>
                  
                                          <a class="animate-left quick-view-popup" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                                            <i class="ion-ios-eye-outline"></i>
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
                                              <span>{{ get_user_name_by_user_id($item->author_id) }}</span>
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

                <div class="tab-pane fade" id="todays_sale" role="tabpanel">
                  <div class="isotope-grid cols-5 mb-2">
                    <div class="gutter-sizer"></div>
                    <div class="grid-sizer"></div>
                        @foreach($advancedData['todays_deal'] as $item)
                        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
                              <div class="single-product mb-35">
                                  <div class="product-img">
                                      <a href="{{ route('details-page', $item['post_slug']) }}">
                                        @if(!empty($item['image_url']))
                                          <img src="{{ get_image_url( $item['post_image_url'] ) }}" alt="{{ basename( get_image_url( $item['post_image_url'] ) ) }}" style="max-height:300px"/>
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
                </div>

            </div>
        </div>
    </div>
</section>

<section class="product-area pt-50">
        <div class="container padding-bottom-2x">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-style-tab">
                        <div class="product-tab-list text-center mb-45 nav product-menu-mrg">
                            <!-- Nav tabs -->
                            <a class="active" href="#recommended_products" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home1">
                                <h4>{{ trans('frontend.recommended_products') }}&nbsp;</h4>
                            </a>
                            <a class="" href="#features_products" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home1">
                                <h4>{{ trans('frontend.features_products') }}&nbsp;</h4>
                            </a>
            
                        </div>
            
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane fade show active" id="recommended_products" role="tabpanel">
                              <div class="isotope-grid cols-5 mb-2">
                                <div class="gutter-sizer"></div>
                                <div class="grid-sizer"></div>
                                    @foreach($advancedData['recommended_items'] as $item)
                                    <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
                                          <div class="single-product mb-35">
                                              <div class="product-img">
                                                  <a href="{{ route('details-page', $item->slug) }}">
                                                    @if(!empty($item->image_url))
                                                      <img src="{{ get_image_url( $item->image_url ) }}" alt="{{ basename( get_image_url( $item->image_url ) ) }}" style="max-height:300px"/>
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
                                                        <i class="ion-ios-heart-outline"></i>
                                                      </a>
                            
                                                      <a class="animate-right product-compare" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                                                          <i class="ion-ios-analytics-outline"></i>
                                                        </a>
                              
                                                      <a class="animate-left quick-view-popup" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                                                        <i class="ion-ios-eye-outline"></i>
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
                                                          <span>{{ get_user_name_by_user_id($item->author_id) }}</span>
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
                            <div class="tab-pane fade" id="features_products" role="tabpanel">
                              <div class="isotope-grid cols-5 mb-2">
                                <div class="gutter-sizer"></div>
                                <div class="grid-sizer"></div>
                                    @foreach($advancedData['features_items'] as $item)
                                    <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
                                          <div class="single-product mb-35">
                                              <div class="product-img">
                                                  <a href="{{ route('details-page', $item->slug) }}">
                                                    @if(!empty($item->image_url))
                                                      <img src="{{ get_image_url( $item->image_url ) }}" alt="{{ basename( get_image_url( $item->image_url ) ) }}" style="max-height:300px"/>
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
                                                        <i class="ion-ios-heart-outline"></i>
                                                      </a>
                            
                                                      <a class="animate-right product-compare" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                                                          <i class="ion-ios-analytics-outline"></i>
                                                        </a>
                              
                                                      <a class="animate-left quick-view-popup" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                                                        <i class="ion-ios-eye-outline"></i>
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
                                                          <span>{{ get_user_name_by_user_id($item->author_id) }}</span>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop