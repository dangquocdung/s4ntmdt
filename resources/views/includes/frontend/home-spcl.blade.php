@section('product_area')
<section class="htc__product__area pb--100 bg__white">
    <div class="container padding-bottom-3x">
        <div class="row">
            {{-- <div class="col-md-3">
                <div class="product-categories-all">
                    <div class="product-categories-title">
                        <h3>BAGS &amp; SHOES</h3>
                    </div>
                    <div class="product-categories-menu">
                        <ul>
                            <li><a href="#">awesome Rings</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="product-style-tab">
                    <div class="product-tab-list">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tab-style" role="tablist">
                            <li class="nav-item">
                                <a href="#latest_products" data-toggle="tab" class="show active">
                                    <div class="tab-menu-text">
                                        <h4>{{ trans('frontend.latest_products') }}</h4>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#todays_sale" data-toggle="tab">
                                    <div class="tab-menu-text">
                                        <h4>{{ trans('frontend.todays_sale_label') }}</h4>
                                    </div>
                                </a>
                            </li>
    
                        </ul>
                    </div>
                    <div class="tab-content another-product-style jump">
                        <div class="tab-pane fade show active" id="latest_products" role="tabpanel">
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

                                          <a class="product-button btn-store" href="{{ route('store-details-page-content', get_user_name_by_user_id($latest_product->author_id)) }}" target="_blank" data-toggle="tooltip" title="{{ get_user_name_by_user_id($latest_product->author_id) }}" data-original-title="{{ trans('frontend.gian-hang') }}">
                                            <i class="icon-home"></i><span>{{ trans('frontend.gian-hang') }}</span>
                                          </a>
                                
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
                        </div>

                        <div class="tab-pane fade" id="todays_sale" role="tabpanel">
                            <div class="row">
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
                                          <a class="product-button btn-store" href="{{ route('store-details-page-content', get_user_name_by_user_id($todays_sales_product['author_id'])) }}" target="_blank" data-toggle="tooltip" title="{{ get_user_name_by_user_id($todays_sales_product['author_id']) }}">
                                            <i class="icon-home"></i><span>{{ trans('frontend.gian-hang') }}</span>
                                          </a>
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
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="htc__product__area pb--100 bg__white padding-top-1x">
        <div class="container padding-bottom-3x">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-style-tab">
                        <div class="product-tab-list">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-style" role="tablist">
                                <li class="nav-item">
                                    <a href="#recommended_products" data-toggle="tab" class="show active">
                                        <div class="tab-menu-text">
                                            <h4>{{ trans('frontend.recommended_products') }}</h4>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="#features_products" data-toggle="tab">
                                        <div class="tab-menu-text">
                                            <h4>{{ trans('frontend.features_products') }}</h4>
                                        </div>
                                    </a>
                                </li>
        
                            </ul>
                        </div>
                        <div class="tab-content another-product-style jump">
                            <div class="tab-pane fade show active" id="recommended_products" role="tabpanel">
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

                                              <a class="product-button btn-store" href="{{ route('store-details-page-content', get_user_name_by_user_id($recommended_product->author_id)) }}" target="_blank" data-toggle="tooltip" title="{{ get_user_name_by_user_id($recommended_product->author_id) }}">
                                                <i class="icon-home"></i><span>{{ trans('frontend.gian-hang') }}</span>
                                              </a>

                                    
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
                            </div>
                            <div class="tab-pane fade" id="features_products" role="tabpanel">
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

                                              <a class="product-button btn-store" href="{{ route('store-details-page-content', get_user_name_by_user_id($features_product->author_id)) }}" target="_blank" data-toggle="tooltip" title="{{ get_user_name_by_user_id($features_product->author_id) }}">
                                                <i class="icon-home"></i><span>{{ trans('frontend.gian-hang') }}</span>
                                              </a>

                                    
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
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop