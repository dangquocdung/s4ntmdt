<!-- Page Title-->
<div class="page-title">
      <div class="container">
        <div class="column">
          <!-- <h1>{{ $single_product_details['post_title'] }}</h1> -->
          <h1>{!! trans('frontend.all_products_label') !!}</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li>
              <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>        </li>
            </li>
            <li class="separator">&nbsp;</li>
            <li>
              <a href="{{ route('shop-page') }}">{!! trans('frontend.all_products_label') !!}</a>
            </li>
            <!-- <li class="separator">&nbsp;</li>
            <li>{{ $single_product_details['post_title'] }}</li> -->
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x">
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
          <div class="padding-top-2x mt-2 hidden-md-up"></div>
          <div class="sp-categories pb-3"><i class="icon-tag"></i>
          
          @if (count($selected_cat['term_details']) > 0)

            @foreach ($selected_cat['term_details'] as $row)

              <a href="{{ route('categories-page', $row['slug']) }}">{!! $row['name'] !!},&nbsp;</a>

            @endforeach
            
          @endif
        
        </div>
          
          <h2 class="mb-3">{{ $single_product_details['post_title'] }}</h2>

          @if( get_product_type($single_product_details['id']) == 'simple_product' || (get_product_type($single_product_details['id']) == 'downloadable_product' && count(get_product_variations($single_product_details['id'])) == 0 ) || (get_product_type($single_product_details['id']) == 'customizable_product' && count(get_product_variations($single_product_details['id'])) == 0 ) )
            <span class="h3 d-block">
              @if(!is_null($single_product_details['offer_price']))
                <del class="text-muted">{!! price_html( $single_product_details['offer_price'] ) !!}</del>
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
            <span class="h3 d-block">
              {!! get_product_variations_min_to_max_price_html($currency_symbol, $single_product_details['id']) !!}
            </span>
          @endif

          <p class="text-muted">
            {!! string_decode($single_product_details['post_content']) !!}
            <!-- <a href='#details' class='scroll-to'>More info</a> -->
          </p>
          
          <div class="row margin-top-1x">

            @if (count($selected_colors['term_details']) > 0)
              <div class="col-sm-6">
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

            @if (count($selected_sizes['term_details']) > 0)

              <div class="col-sm-6">
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

          </div>

          <div class="row align-items-end pb-4">
            <div class="col-sm-4">
              <div class="form-group mb-0">
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
            <div class="col-sm-8">
              <div class="pt-4 hidden-sm-up"></div>
              <button class="btn btn-primary btn-block m-0 add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $single_product_details['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Thêm vào giỏ hàng</button>
            </div>
          </div>

          <div class="pt-1 mb-4"><span class="text-medium">{!! trans('frontend.sku') !!}:</span>

            @if ($single_product_details['post_sku'])
              #{{ $single_product_details['post_sku'] }}
            @else
              #N/A
            @endif

          </div>

          <hr class="mb-2">
          <div class="d-flex flex-wrap justify-content-between">

          
            <div class="mt-2 mb-2">
              <button class="btn btn-outline-secondary btn-sm btn-wishlist product-wishlist" data-id="{{ $single_product_details['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}"><i class="icon-heart"></i>&nbsp;{!! trans('frontend.wishlist') !!}</button>
              <button class="btn btn-outline-secondary btn-sm btn-compare product-compare" data-id="{{ $single_product_details['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}"><i class="icon-repeat"></i>&nbsp;{!! trans('frontend.compare') !!}</button>
            </div>
            <div class="mt-2 mb-2">
              <span class="text-muted">{!! trans('frontend.share') !!}:&nbsp;&nbsp;</span>
              <div class="d-inline-block">
                <a class="social-button shape-rounded sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
                <a class="social-button shape-rounded sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
                <a class="social-button shape-rounded sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Details-->
    <div class="bg-secondary padding-top-3x padding-bottom-2x mb-3" id="details">
      <div class="container">

        @if($single_product_details['_product_extra_features'])  
          {!! string_decode($single_product_details['_product_extra_features']) !!}
        @else
          {!! trans('frontend.no_features_label') !!}
        @endif
        
      </div>
    </div>
    <!-- Reviews-->
    @if($single_product_details['_product_enable_reviews'] == 'yes')

    <div class="container padding-top-2x">
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card border-default">
            <div class="card-body">
              <div class="text-center">
                <div class="d-inline align-baseline display-3 mr-1">4.2</div>
                <div class="d-inline align-baseline text-sm text-warning mr-1">
                    <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                    </div>
                </div>
              </div>
              <div class="pt-3">
                <label class="text-medium text-sm">5 stars <span class='text-muted'>- 38</span></label>
                <div class="progress margin-bottom-1x">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 75%; height: 2px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <label class="text-medium text-sm">4 stars <span class='text-muted'>- 10</span></label>
                <div class="progress margin-bottom-1x">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 20%; height: 2px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <label class="text-medium text-sm">3 stars <span class='text-muted'>- 3</span></label>
                <div class="progress margin-bottom-1x">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 7%; height: 2px;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <label class="text-medium text-sm">2 stars <span class='text-muted'>- 1</span></label>
                <div class="progress margin-bottom-1x">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 3%; height: 2px;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <label class="text-medium text-sm">1 star <span class='text-muted'>- 0</span></label>
                <div class="progress mb-2">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 0; height: 2px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="pt-2"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#leaveReview">Leave a Review</a></div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <h3 class="padding-bottom-1x">Latest Reviews</h3>

          @if(count($comments_details) > 0)
              @foreach($comments_details as $comment) 
                <!-- Review-->
                <div class="comment">
                  <div class="comment-author-ava"><img src="img/reviews/02.jpg" alt="Comment author"></div>
                  <div class="comment-body">
                    <div class="comment-header d-flex flex-wrap justify-content-between">
                      <h4 class="comment-title">My husband love his new...</h4>
                      <div class="mb-2">
                          <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
                          </div>
                      </div>
                    </div>
                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor...</p>
                    <div class="comment-footer"><span class="comment-meta">Maggie Scott</span></div>
                  </div>
                </div>
              @endforeach

              <!-- View All Button--><a class="btn btn-secondary btn-block" href="#">View All Reviews</a>

          @else
            {{ trans('frontend.no_review_label') }}
          @endif

          

        </div>
      </div>
    </div>

    @endif  



    @if(count($related_items) > 0)   

    <div class="container padding-bottom-3x mb-1">             
      <!-- Related Products Carousel-->
      <h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">You May Also Like</h3>
      <!-- Carousel-->
      <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
        
      @foreach($related_items as $products)
        <?php 
          $reviews          = get_comments_rating_details($products['id'], 'product');
          $reviews_settings = get_reviews_settings_data($products['id']);      
        ?>
        

        <!-- Product-->
        <div class="product-card">
          <div class="product-badge bg-danger">Sale</div>

          <a class="product-thumb" href="{{ route('details-page', $products['post_slug']) }}">
              @if($products['_product_related_images_url']->product_image)
                <img src="{{ get_image_url($products['_product_related_images_url']->product_image) }}" alt="{{ basename($products['_product_related_images_url']->product_image) }}" />
              @else
                <img src="{{ default_placeholder_img_src() }}" alt="" />
              @endif
            </a>
          
          <div class="product-card-body">
            <h3 class="product-title"><a href="shop-single.html">Echo Dot (2nd Generation)</a></h3>
            <h4 class="product-price">
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
          </div>
          <div class="product-button-group">

            <a class="btn btn-outline-secondary btn-sm btn-wishlist product-wishlist" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
              <i class="icon-heart"></i>
            </a>
            <a class="btn btn-outline-secondary btn-sm btn-compare product-compare" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
              <i class="icon-repeat"></i>
            </a>
            <a class="btn btn-outline-primary btn-sm add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $products['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Chọn</a>             
          
            
          </div>
        </div>

      @endforeach
        

      </div>
    </div>

    @endif