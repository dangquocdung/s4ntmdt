@foreach($advancedData as $key => $advData)

<section class="product-area pt-50">
    <div class="container">
        <div class="product-style">
            <h2 class="title text-center">{{ trans('frontend.'.$key) }}</h2>
            <div class="tab-content another-product-style jump">
                <div class="tab-pane fade show active" id="latest_products" role="tabpanel">
                  <div class="isotope-grid cols-4 mb-2">
                    <div class="gutter-sizer"></div>
                    <div class="grid-sizer"></div>
                      @foreach($advData as $item)
                            <div class="grid-item" style="position: absolute; left: 0px; top: 0px; margin-bottom:60px">
                              <div class="single-product mb-25">
                                  <div class="product-img">
                                      <a href="{{ route('details-page', $item->slug) }}">
                                        <div class="can-giua-img">

                                          @if(!empty($item->image_url))
                                            <img src="{{ get_image_url( $item->image_url ) }}" alt="{{ basename( get_image_url( $item->image_url ) ) }}" />
                                          @else
                                            <img  src="{{ default_placeholder_img_src() }}" alt="" />
                                          @endif

                                        </div>
                                      </a>
                                      @if ( $item->price < $item->regular_price )
                                        @php
                              
                                          $tiengiam =  $item->regular_price - $item->price;
                                
                                          $phantram = round(($tiengiam/$item->regular_price)*100);
                                            
                                        @endphp
                                        <span class="giam-gia">Giảm giá {{ $phantram }}%</span>
                              
                                      @endif

                                      <span class="gia-bia">
                                        {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item->id, $item->price)), get_frontend_selected_currency()) !!}
                                      </span>
                
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
                                      <div class="product-title">
                                          <h4><a href="{{ route('details-page', $item->slug) }}">{!! $item->title !!}</a></h4>
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

@endforeach

