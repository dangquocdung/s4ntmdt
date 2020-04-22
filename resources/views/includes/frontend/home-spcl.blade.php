@section('product_area')
<section class="product-area pt-50">
    <div class="container">
        <div class="product-style">
            <h2 class="title text-center">{{ trans('frontend.homepage_items') }}</h2>
            <div class="tab-content another-product-style jump">
                <div class="tab-pane fade show active" id="latest_products" role="tabpanel">
                  <div class="isotope-grid cols-4 mb-2">
                    <div class="gutter-sizer"></div>
                    <div class="grid-sizer"></div>
                        @foreach($advancedData['homepage_items'] as $item)
                        <div class="grid-item" style="position: absolute; left: 0px; top: 0px; margin-bottom:60px">
                              <div class="single-product mb-35">
                                  <div class="product-img">
                                      <a href="{{ route('details-page', $item->slug) }}">
                                        @if(!empty($item->image_url))
                                          <img src="{{ get_image_url( $item->image_url ) }}" alt="{{ basename( get_image_url( $item->image_url ) ) }}" />
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

                                          <a class="animate-left quick-view-popup" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                                            <i class="ion-eye"></i>
                                          </a>
                                          <a class="animate-right add-to-cart-bg" data-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                                            <i class="ion-bag"></i>
                                          </a>
                                          <a class="animate-left product-wishlist" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                                            <i class="ion-heart"></i>
                                          </a>
                                          <a class="animate-right product-compare" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                                            <i class="ion-ios-list-outline"></i>
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
                                                    {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item->id, $item->price)), get_frontend_selected_currency()) !!}
                                              </span>
                                          </div>
                                      </div>
                                      <div class="product-cart-categori">

                                          <div class="product-categori">
                                          <span>{{ get_store_name_by_user_id($item->author_id) }}</span>


                                          </div>

                                          <div class="product-cart">
                                            <span>
                                                <del>
                                                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item->id, $item->regular_price)), get_frontend_selected_currency()) !!}
                                                </del>
                                            </span>


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


<!-- Popular Brands Carousel-->
@if(count($brands_data) > 0)  
<section class="bg-secondary padding-top-1x padding-bottom-2x">
  <div class="container">
    <div class="product-style">

      <h2 class="title text-center">{{ trans('frontend.nhan-hang-uy-tin') }}</h2>

      <!-- <h2 class="h3 text-center mb-30 pb-3">{!! trans('frontend.brands') !!}</h2> -->
      <div class="owl-carousel" data-owl-carousel='{ "nav": false, "dots": false, "loop": true, "autoplay": true, "autoplayTimeout": 4000, "responsive": {"0":{"items":2}, "470":{"items":3},"630":{"items":4},"991":{"items":5},"1200":{"items":6}} }'>
        @foreach($brands_data as $brand)  
        <a href="{{ route('brands-single-page', $brand['slug']) }}">
          @if(!empty($brand['brand_logo_img_url']))
            <img  class="d-block w-110 opacity-75 m-auto" src="{{ get_image_url($brand['brand_logo_img_url']) }}" alt="{{ basename($brand['brand_logo_img_url']) }}" title="{{ $brand['name'] }}" />
          @else
            <img  class="d-block w-110 opacity-75 m-auto" src="{{ default_placeholder_img_src() }}" alt="{{ basename($brand['brand_logo_img_url']) }}" title="{{ $brand['name'] }}" />
          @endif
        </a>
        @endforeach
      </div>
    </div>
  </div>
</section>
@endif


<section class="product-area pt-50">

  <div class="nav product-tab-list mb-45">
      @foreach($advancedData as $key => $advData)
        @if ($key!='homepage_items')

          <a class="{{ ($key=='recommended_items')?'active':'' }}" href="#{{ $key }}" data-toggle="tab" role="tab" aria-selected="false">
              {{ trans('frontend.'.$key) }}
          </a>

        @endif
      @endforeach
      <!-- <a class="" href="#features_products" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home1">
          {{ trans('frontend.features_products') }}
      </a> -->
  </div>

  <div class="container padding-bottom-2x">
      <div class="row category-tab">
          <div class="col-md-12">
              <div class="product-style-tab">

                <div class="tab-content another-product-style jump">

                  @foreach($advancedData as $key => $advData)
                    @if ($key!='homepage_items')
                      <div class="tab-pane fade {{ ($key=='recommended_items')?'show active':'' }}" id="{{ $key }}" role="tabpanel">
                        <div class="isotope-grid cols-4 mb-2">
                          <div class="gutter-sizer"></div>
                          <div class="grid-sizer"></div>
                              @foreach($advData as $item)
                              <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
                                    <div class="single-product mb-35">
                                        <div class="product-img">
                                            <a href="{{ route('details-page', $item->slug) }}">
                                              @if(!empty($item->image_url))
                                                <img src="{{ get_image_url( $item->image_url ) }}" alt="{{ basename( get_image_url( $item->image_url ) ) }}" />
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

                                              <a class="animate-left quick-view-popup" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.quick_view') }}" data-original-title="{{ trans('frontend.quick_view') }}">
                                                <i class="ion-eye"></i>
                                              </a>
                                              <a class="animate-right add-to-cart-bg" data-id="{{ $item->id }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.add_to_cart_label') }}" data-original-title="{{ trans('frontend.add_to_cart_label') }}">
                                                <i class="ion-bag"></i>
                                              </a>
                                              <a class="animate-left product-wishlist" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                                                <i class="ion-heart"></i>
                                              </a>
                                              <a class="animate-right product-compare" data-id="{{ $item->id }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_compare_list_label') }}" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                                                <i class="ion-ios-list-outline"></i>
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

                                              <div class="product-categori">
                                                <span>{{ get_store_name_by_user_id($item->author_id) }}</span>
                                              </div>

                                              <div class="product-cart">
                                                <span>
                                                    <del>
                                                      {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item->id, $item->regular_price)), get_frontend_selected_currency()) !!}
                                                    </del>
                                                </span>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                      
                              @endforeach
                                
                          </div>
                      </div>
                    @endif
                  @endforeach

                </div>
              </div>
          </div>
      </div>
  </div>
</section>

@stop