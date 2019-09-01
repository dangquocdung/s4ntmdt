<!-- Off-Canvas Wrapper-->
<div id="single_product" class="offcanvas-wrapper">
 
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
    <div class="row">
      <!-- Poduct Gallery-->
      <div class="col-md-6">

          <div class="product-gallery">
            
            <span class="product-badge text-danger"id="hasSale">30% Off</span>

            @if($single_product_details['_product_enable_video_feature'] == 'yes')

            <div class="gallery-wrapper" id="hasVideo">
              @if($single_product_details['_product_video_feature_source'] == 'embedded_code')
                @include('pages.frontend.frontend-pages.video-source-embedded-url')
                @yield('embedded-content')
              @elseif($single_product_details['_product_video_feature_source'] == 'online_url')
                @include('pages.frontend.frontend-pages.video-source-online-url')
                @yield('online-url-content')
              @endif
            </div>
            @endif

            @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)
            <?php $count = 1;?>

            <div class="product-carousel owl-carousel gallery-wrapper">
              @foreach($single_product_details['_product_related_images_url']->product_gallery_images as $key => $row)
                <div class="gallery-item" data-hash="{{ $count }}">
                  <a href="{{ get_image_url($row->url) }}" data-size="1000x667">
                    @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                    <img src="{{ get_image_url($row->url) }}" alt="Product">
                    @else
                    <img src="{{ default_placeholder_img_src() }}" alt="Product"/>
                    @endif
                  </a>
                </div>
                <?php $count ++;?>
              @endforeach
            </div>
            <ul class="product-thumbnails">
              <?php $count = 1;?>
              @foreach($single_product_details['_product_related_images_url']->product_gallery_images as $key => $row)
              @if($count == 1)
              <li class="active">
                <a href="#{{ $count }}">
                    @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                    <img src="{{ get_image_url($row->url) }}" alt="Product">
                    @else
                    <img src="{{ default_placeholder_img_src() }}" alt="Product"/>
                    @endif
                </a>
              </li>
              @else
              <li>
                <a href="#{{ $count }}">
                    @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                    <img src="{{ get_image_url($row->url) }}" alt="Product">
                    @else
                    <img src="{{ default_placeholder_img_src() }}" alt="Product"/>
                    @endif
                </a>
              </li>
              @endif
              <?php $count ++;?>
              @endforeach
              
            </ul>
            @endif
          </div>
        
      </div>
      <!-- Product Info-->
      <div class="col-md-6">

        <?php $reviews_settings = get_reviews_settings_data($single_product_details['id']);?>

        @if($reviews_settings['enable_reviews_add_link_to_details_page'] && $reviews_settings['enable_reviews_add_link_to_details_page'] == 'yes')

          <div class="comments-advices">
            <ul>
              <li class="review-stars"><div class="star-rating"><span style="width:{{ $comments_rating_details['percentage'] }}%"></span></div></li>
              <li class="read-review"><a href="#reviews" class="reviews selected"> {{ trans('frontend.single_product_read_review_label') }} (<span itemprop="reviewCount">{{ $comments_rating_details['total'] }}</span>) </a></li>
              <li class="write-review"><a class="open-comment-form" href="#new_comment_form">&nbsp;<span>|</span>&nbsp; {{ trans('frontend.single_product_write_review_label') }} </a></li>
            </ul>
          </div>
        @endif

        <h2 class="padding-top-1x text-normal">{{ $single_product_details['post_title'] }}</h2>
        
        @if( get_product_type($single_product_details['id']) == 'simple_product' || (get_product_type($single_product_details['id']) == 'downloadable_product' && count(get_product_variations($single_product_details['id'])) == 0 ) || (get_product_type($single_product_details['id']) == 'customizable_product' && count(get_product_variations($single_product_details['id'])) == 0 ) )
          <span class="h2 d-block">
          @if(!is_null($single_product_details['offer_price']))
          <del class="text-muted text-normal">{!! price_html( $single_product_details['offer_price'] ) !!}</del>
          @endif
          
          {!! price_html( $single_product_details['solid_price'] ) !!}

          @if($single_product_details['post_regular_price'] && $single_product_details['post_sale_price'] && $single_product_details['post_regular_price'] > $single_product_details['post_sale_price'] && $single_product_details['_product_sale_price_start_date'] && $single_product_details['_product_sale_price_end_date'] && $single_product_details['_product_sale_price_end_date'] >= date("Y-m-d"))
            <p class="offer-message-label">
              <i class="fa fa-bell" aria-hidden="true"></i> 
              {{ trans('frontend.offer_msg') }}  
              <i>{!! date("F j, Y", strtotime($single_product_details['_product_sale_price_start_date'])) !!} {{ trans('frontend.to') }} {!! date("F j, Y", strtotime($single_product_details['_product_sale_price_end_date'])) !!} </i>
            </p>
          @endif
          </span>
          
        @elseif( (get_product_type($single_product_details['id']) == 'configurable_product' || get_product_type($single_product_details['id']) == 'customizable_product' || get_product_type($single_product_details['id']) == 'downloadable_product') && count(get_product_variations($single_product_details['id'])) > 0 )
          <span class="h2 d-block">{!! get_product_variations_min_to_max_price_html($currency_symbol, $single_product_details['id']) !!} </span>
        @endif
        
        {!! string_decode($single_product_details['post_content']) !!}

        <!-- <hr class="mb-3"> -->

        <div class="row margin-top-1x">
          @if (count($selected_sizes['term_details']) > 0)

          <div class="col-sm-4">
            <div class="form-group">
              <label for="size">{!! trans('frontend.choose_size_label') !!}</label>
              <select class="form-control" id="size">
                <option>{!! trans('frontend.choose_size_label') !!}</option>

                @foreach ($selected_sizes['term_details'] as $row)

                  <option value="{{ $row['term_id'] }}">{!! $row['name'] !!}</option>
                @endforeach
                
              </select>
            </div>
          </div>
          @endif

          @if (count($selected_colors['term_details']) > 0)
          <div class="col-sm-5">
            <div class="form-group">
              <label for="color">{!! trans('frontend.choose_color_label') !!}</label>
              <select class="form-control" id="color">

              <option>{!! trans('frontend.choose_color_label') !!}</option>

              @foreach ($selected_colors['term_details'] as $row)
                <option value="{{ $row['term_id'] }}" style="color:#{{ $row['color_code'] }}">{!! $row['name'] !!}</option>
              @endforeach
                
              </select>
            </div>
          </div>
          @endif
          <div class="col-sm-3">
            <div class="form-group">
              <label for="quantity">{!! trans('frontend.quantity') !!}</label>

              @php

                $qty = ''; 

                if($single_product_details['_product_manage_stock_back_to_order'] == 'not_allow' && $single_product_details['post_stock_qty']>0){
                  $qty = $single_product_details['post_stock_qty'];
                }

              @endphp

              <select class="form-control" id="quantity" name="quant[1]">

                @for($i=1; $i<$qty; $i++)

                  <option value="{{ $i }}">{{ $i}}</option>


                @endfor
        

                
              </select>
                    
                  
            </div>
          </div>
        </div>

        @if (!empty($single_product_details['post_sku']))

        <div class="pt-1 mb-2">
          <span class="text-medium">SKU:</span> #{{ $single_product_details['post_sku'] }}
        </div>

        @endif

        @if (count($selected_cat['term_details']) > 0)

          <div class="padding-bottom-1x mb-2">
            <span class="text-medium">Categories:&nbsp;</span>

            @foreach ($selected_cat['term_details'] as $row)

            <a class="navi-link" href="{{ route('categories-page', $row['slug']) }}">{!! $row['name'] !!},&nbsp;</a>

            @endforeach
            
          </div>

        @endif
        <hr class="mb-3">
        <div class="d-flex flex-wrap justify-content-between">
          <div class="entry-share mt-2 mb-2">
          <span class="text-muted">Share:</span>
            <div class="share-links">
              <a class="social-button shape-circle sb-facebook" data-name="fb" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
              <a class="social-button shape-circle sb-twitter" data-name="tweet" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
              <a class="social-button shape-circle sb-instagram" data-name="lin" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a>
              {{-- <a class="social-button shape-circle sb-google-plus" data-name="gplus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a> --}}
            </div>

          </div>
          <div class="sp-buttons mt-2 mb-2">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist product-wishlist" data-id="{{ $single_product_details['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-secondary btn-sm btn-compare product-compare" data-id="{{ $single_product_details['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
              <i class="icon-repeat"></i>
            </button>
            <button class="btn btn-primary add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $single_product_details['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Thêm vào giỏ hàng</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Tabs-->
    <div class="row padding-top-3x mb-3">
      <div class="col-lg-10 offset-lg-1">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"><a class="{{ (!old('comments_target'))?'nav-link active':'' }}" href="#features" data-toggle="tab" role="tab">{{ trans('frontend.features_label') }}</a></li>

          {{-- <li class="nav-item"><a class="nav-link" href="#shippingInfo" data-toggle="tab">{{ trans('frontend.shipping_info_label') }}</a></li> --}}

          @if($single_product_details['_product_enable_reviews'] == 'yes')

            <li class="nav-item">
              <a class="nav-link" href="#reviews" data-toggle="tab" role="tab">
              {{ trans('frontend.reviews_for_label')}} ({{ $comments_rating_details['total'] }})
                </a>
            </li>
          @endif

          @if( count(get_vendor_details_by_product_id($single_product_details['id'])) >0 )
          <li class="nav-item"><a class="nav-link" href="#vendorInfo" data-toggle="tab">{{ trans('frontend.vendor_info_label') }}</a></li>
          @endif

        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="features" role="tabpanel">
            {{-- {!! string_decode($single_product_details['post_content']) !!} --}}

              @if($single_product_details['_product_extra_features'])  
                {!! string_decode($single_product_details['_product_extra_features']) !!}
              @else
                {!! trans('frontend.no_features_label') !!}
              @endif
          </div>

          @if($single_product_details['_product_enable_reviews'] == 'yes')

          <div class="tab-pane fade" id="reviews" role="tabpanel">

            @if(count($comments_details) > 0)
              @foreach($comments_details as $comment) 
                <!-- Review-->
                <div class="comment">
                  <div class="comment-author-ava">
                    @if(!empty($comment->user_photo_url))
                      <img alt="" src="{{ get_image_url( $comment->user_photo_url ) }}" class="avatar photo">
                    @else
                      <img alt="" src="{{ default_avatar_img_src() }}" class="avatar photo">
                    @endif
                  </div>
                  <div class="comment-body">
                    <div class="comment-header d-flex flex-wrap justify-content-between">
                      <h4 class="comment-title">{{ $comments_rating_details['average'] }}</h4>
                      <div class="mb-2">
                        <div class="star-rating">
                          <span style="width:{{ $comments_rating_details['percentage'] }}%"></span>
                        </div>
                      </div>
                    </div>
                    <p class="comment-text">
                        {{ $comment->content }}
                    </p>
                    <div class="comment-footer">
                      <span class="comment-meta">
                          {{ trans('frontend.by_label') }} {{ $comment->display_name }}
                      </span>
                    </div>
                  </div>
                </div>
              @endforeach
            @else
              {{ trans('frontend.no_review_label') }}
            @endif

            @include('pages-message.notify-msg-success')
            @include('pages-message.notify-msg-error')
            @include('pages-message.form-submit')

            <!-- Review Form-->
            <h5 class="mb-30 padding-top-1x">{{ trans('frontend.add_a_review_label') }}</h5>

            <form id="new_comment_form" class="row product-reviews-content" method="post" action="" enctype="multipart/form-data">

              <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="comments_target" id="comments_target" value="product">
              <input type="hidden" name="selected_rating_value" id="selected_rating_value" value="">
              <input type="hidden" name="object_id" id="object_id" value="{{ $single_product_details['id'] }}">
              
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="review_rating">{{ trans('frontend.select_your_rating_label') }}</label>
                  <div class="rating-select">
                    <div class="btn btn-light btn-sm" data-rating_value="1"><span class="fa fa-star"></span></div>
                    <div class="btn btn-light btn-sm" data-rating_value="2"><span class="fa fa-star"></span></div>
                    <div class="btn btn-light btn-sm" data-rating_value="3"><span class="fa fa-star"></span></div>
                    <div class="btn btn-light btn-sm" data-rating_value="4"><span class="fa fa-star"></span></div>
                    <div class="btn btn-light btn-sm" data-rating_value="5"><span class="fa fa-star"></span></div>
                  </div>
                  <br>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="review_text">{{ trans('frontend.write_your_review_label') }} </label>
                  <textarea class="form-control form-control-rounded" id="review_text" rows="8" name="product_review_content" id="product_review_content"></textarea>
                </div>
              </div>
              <div class="col-12 text-right">
                <button id="review_submit" class="btn btn-outline-primary" type="submit">{{ trans('frontend.submit_label') }}</button>
                {{-- <input name="review_submit" id="review_submit" class="btn btn-sm btn-style" value="{{ trans('frontend.submit_label') }}" type="submit"> --}}
              </div>
            </form>
          </div>
          @endif

          @if( count(get_vendor_details_by_product_id($single_product_details['id'])) >0 )
            <div class="tab-pane fade" id="vendorInfo">
              <?php  $vendor_details = get_vendor_details_by_product_id($single_product_details['id']); $parse_json = json_decode($vendor_details['details']);?>
              <table>
                <tr>
                  <th>{!! trans('frontend.store_name_label') !!}</th>
                  @if(!empty($parse_json->profile_details->store_name))
                  <td>{!! $parse_json->profile_details->store_name !!}</td>
                  @else
                  <td>{!! $vendor_details['user_name'] !!}</td>
                  @endif
                </tr>

                <tr><th>{!! trans('frontend.vendor_label') !!}</th><td><a target="_blank" href="{{ route('store-details-page-content', $vendor_details['user_name']) }}"><i>{!!  $vendor_details['user_name'] !!}</i></a></td></tr>

                @if(!empty($parse_json->profile_details->country))
                <tr><th>{!! trans('frontend.country') !!}</th><td>{!! $parse_json->profile_details->country !!}</td></tr>
                @endif

                <tr><th>{!! trans('frontend.vendor_rating_label') !!}</th><td><div class="review-stars"><div class="star-rating" style="text-align:left !important; margin:0px !important;"><span style="width:{{ $vendor_reviews_rating_details['percentage'] }}%"></span></div></div></td></tr>  
              </table>
            </div>  
          @endif
        </div>
      </div>
    </div>

    @if(count($related_items) > 0)   
    <!-- Related Products Carousel-->
    <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">{{ trans('frontend.related_products_label') }}</h3>
    <!-- Carousel-->
    <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
      
      @foreach($related_items as $products)
        <?php 
          $reviews          = get_comments_rating_details($products['id'], 'product');
          $reviews_settings = get_reviews_settings_data($products['id']);      
        ?>
        
        <!-- Product-->
        <div class="grid-item">
          <div class="product-card">
            <div class="product-badge text-danger">22% Off</div>
            <a class="product-thumb" href="{{ route('details-page', $products['post_slug']) }}">
              @if($products['_product_related_images_url']->product_image)
                <img src="{{ get_image_url($products['_product_related_images_url']->product_image) }}" alt="{{ basename($products['_product_related_images_url']->product_image) }}" />
              @else
                <img src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
            </a>

            <h3 class="product-title">
              <a href="{{ route('details-page', $products['post_slug']) }}">{!! get_product_title($products['id']) !!}</a>
            </h3>

            <h4 class="product-price">
              <!-- <del>$44.95</del>$34.99 -->
              @if(get_product_type($products['id']) == 'simple_product')
                {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
              @elseif(get_product_type($products['id']) == 'configurable_product')
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
              @elseif(get_product_type($products['id']) == 'customizable_product' || get_product_type($products['id']) == 'downloadable_product')
                @if(count(get_product_variations($products['id']))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
                @else
                  {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
                @endif
              @endif
            </h4>
            
            <div class="product-buttons">

              @if(get_product_type($products['id']) == 'simple_product')
                <button class="btn btn-outline-secondary btn-sm btn-wishlist product-wishlist" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                  <i class="icon-heart"></i>
                </button>
                <button class="btn btn-outline-secondary btn-sm btn-compare product-compare" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                  <i class="icon-repeat"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $products['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Chọn</button>             
              @endif

            </div>
          </div>
        </div>
        
      @endforeach

    </div>
    @endif

    @if(count($upsell_products) > 0)  
    <!-- Upsell Products Carousel-->
    <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">{!! trans('frontend.upsell_title_label') !!}</h3>
    <!-- Carousel-->
    <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
      
      @foreach($upsell_products as $products)
        <?php 
          $reviews          = get_comments_rating_details($products['id'], 'product');
          $reviews_settings = get_reviews_settings_data($products['id']);      
        ?>
        
        <!-- Product-->
        <div class="grid-item">
          <div class="product-card">
            <div class="product-badge text-danger">22% Off</div>
            <a class="product-thumb" href="shop-single.html">
              @if($products['_product_related_images_url']->product_image)
                <img src="{{ get_image_url($products['_product_related_images_url']->product_image) }}" alt="{{ basename($products['_product_related_images_url']->product_image) }}" />
              @else
                <img src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
            </a>

            <h3 class="product-title">
              <a href="shop-single.html">{!! get_product_title($products['id']) !!}</a>
            </h3>

            <h4 class="product-price">
              <!-- <del>$44.95</del>$34.99 -->
              @if(get_product_type($products['id']) == 'simple_product')
                {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
              @elseif(get_product_type($products['id']) == 'configurable_product')
                {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
              @elseif(get_product_type($products['id']) == 'customizable_product' || get_product_type($products['id']) == 'downloadable_product')
                @if(count(get_product_variations($products['id']))>0)
                  {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
                @else
                  {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
                @endif
              @endif
            </h4>
            
            <div class="product-buttons">

              @if(get_product_type($products['id']) == 'simple_product')
                <button class="btn btn-outline-secondary btn-sm btn-wishlist product-wishlist" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                  <i class="icon-heart"></i>
                </button>
                <button class="btn btn-outline-secondary btn-sm btn-compare product-compare" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                  <i class="icon-repeat"></i>
                </button>
                <button class="btn btn-outline-primary btn-sm add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $products['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Chọn</button>             
              @endif

              @if(get_product_type($single_product_details['id']) == 'customizable_product')
                <a href="{{ route('customize-page', $single_product_details['post_slug']) }}" class="btn btn-sm btn-style product-customize-bg"><i class="fa fa-gears"></i> {!! trans('frontend.customize_it') !!}</a>
              @endif

              <!-- Tuy chon san pham -->

              @if($single_product_details['post_sku'])  
                <p><label>{{ trans('frontend.sku') }}:</label><span>{{ $single_product_details['post_sku'] }}</span></p>
              @endif
              
              @if($single_product_details['_product_enable_as_latest'] == 'yes')
                <p><label>{{ trans('frontend.condition_label') }}:</label><span>{{ trans('frontend.new_label') }}</span></p>
              @endif
              
              @if(count(get_product_brands_lists($single_product_details['id'])) > 0)
                <p><label>{{ trans('frontend.brand_label') }}:</label><span>{{ get_single_page_product_brands_lists( get_product_brands_lists($single_product_details['id']) ) }}</span></p>
              @endif
              
              @if(get_single_page_product_categories_lists($single_product_details['id']))
                <p><label>{{ trans('frontend.category_label') }}:</label><span>{{ get_single_page_product_categories_lists($single_product_details['id']) }}</span></p>
              @endif
              
              @if(count(get_product_tags_lists($single_product_details['id']))>0)
                <p><label>{{ trans('frontend.tag_label') }}:</label><span>{{ get_single_page_product_tags_lists(get_product_tags_lists($single_product_details['id'])) }}</span></p>
              @endif
              
            </div>
          </div>
        </div>
        
      @endforeach

    </div>
    @endif
  </div>

  <input type="hidden" name="product_title" id="product_title" value="{{ $single_product_details['post_title'] }}"> 
  <input type="hidden" name="product_img" id="product_img" value="{{ $single_product_details['_product_related_images_url']->product_image }}"> 
  
</div>

<script>

// $(document).ready(function () {

//   console.log( $('#product-gallery').innerHeight() );

//   $('#sapo').css( 'max-height',$('#product-gallery').height() );
  
// })

$(window).on( 'resize', function () {

  // $('#sapo').css( 'max-height',$('#product-gallery').height() );

  console.log($('#product-gallery').height());

}).resize();

$(document).ready(function(){

  if( $("#hasSale").length || $("#hasVideo").length ){

    $('.product-gallery').css('padding-top','74px');
      ;
  }else{

    $('.product-gallery').css('padding-top','15px');

  }

	$('.entry-share>.share-links>.social-button').on('click', function(e){

		e.preventDefault();
		var share_url = null;
		var window_url = null;
    var product_url = null;
		
    product_url = window.location.href;

    // alert($(this).data('name'));
    
		if($(this).data('name') == 'fb'){
			share_url = '//www.facebook.com/sharer.php?u=';
		}
		else if($(this).data('name') == 'tweet'){
			share_url = '//twitter.com/share?text=' + encodeURI($('#product_title').val()) + '&url=';
		}
    else if($(this).data('name') == 'gplus'){
			share_url = '//plus.google.com/share?url=';
		}
    else if($(this).data('name') == 'pi'){
			share_url = '//pinterest.com/pin/create/button/?media=' + $('#product_img').val() + '&description=' + encodeURI($('#product_title').val()) + '&url=';
		}
    else if($(this).data('name') == 'lin'){
			share_url = '//www.linkedin.com/shareArticle?mini=true&url=';
		}

    if($(this).data('name') == 'fb' || $(this).data('name') == 'tweet' || $(this).data('name') == 'gplus' || $(this).data('name') == 'pi' || $(this).data('name') == 'lin'){
      window_url = share_url + product_url;
      window.open(window_url, "_blank", "scrollbars=yes, resizable=yes, toolbar=yes, top=50, left=50, width=500, height=500");
    }
    else if($(this).data('name') == 'print'){
      window.print();
    }
	});
})

</script>