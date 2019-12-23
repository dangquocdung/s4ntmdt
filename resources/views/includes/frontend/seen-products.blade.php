@section('seen-products')

@if ($seen_items <> '')

<div class="product-style">
  <h2 class="title text-center">{{ trans('frontend.sp_da_xem') }}</h2>

  <div class="tab-content another-product-style jump">
      <div class="tab-pane fade show active" id="sp_daxem" role="tabpanel">

          <!-- Carousel-->
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:4}} }">
              
              <!-- Product-->
              @foreach($seen_items as $item)
                <div class="single-product mb-35">
                      <div class="product-img">
                        <a href="{{ route('details-page', $item['post_slug']) }}">
                          @if(!empty($item['product_image']))
                            <img src="{{ get_image_url( $item['product_image'] ) }}" alt="{{ basename( get_image_url( $item['product_image'] ) ) }}" />
                          @else
                            <img  src="{{ default_placeholder_img_src() }}" alt="" />
                          @endif
                        </a>
                        @if ( $item['product_price'] < $item['product_regular_price'] )
                          @php
                
                            $tiengiam =  $item['product_regular_price'] - $item['product_price'];
                  
                            $phantram = round(($tiengiam/$item['product_regular_price'])*100);
                              
                          @endphp
                          <span>Giảm giá {{ $phantram }}%</span>
                
                        @endif

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
                        <div class="product-title-price">
                            <div class="product-title">
                                <h4><a href="{{ route('details-page', $item['post_slug']) }}">{!! $item['post_title'] !!}</a></h4>
                            </div>
                            <div class="product-price">
                                <span>
                                    {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item['id'], $item['product_price'])), get_frontend_selected_currency()) !!}
                                </span>
                            </div>
                        </div>
                        <div class="product-cart-categori">
                            <div class="product-categori">
                                <span>{{ get_user_name_by_user_id($item['author_id']) }}</span>
                            </div>
                            <div class="product-cart">
                              <span>
                                <del>
                                  {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($item['id'], $item['product_regular_price'])), get_frontend_selected_currency()) !!}
                                </del>
                              </span>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach

          </div>

      </div>
  </div>
</div>
@endif

@endsection