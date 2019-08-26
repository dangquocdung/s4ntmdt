<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
 
  <!-- Page Content-->
  <div class="container padding-bottom-3x mb-1">
    <div class="row">
      <!-- Poduct Gallery-->
      <div class="col-md-6">
        <div class="product-gallery" id="product-gallery">
          <span class="product-badge text-danger">30% Off</span>
          <div class="gallery-wrapper">
            
            @if($single_product_details['_product_enable_video_feature'] == 'yes')
              @if($single_product_details['_product_video_feature_display_mode'] == 'popup')
                <div class="product-video-content">
                  <button class="btn btn-secondary product-video" type="button">
                    <i class="fa fa-video-camera"></i>
                    {{ trans('frontend.product_video') }}
                  </button>
                  @include('modal.product-video')  
                </div>
              @elseif($single_product_details['_product_video_feature_display_mode'] == 'content')
                <!-- <h4> {!! $single_product_details['_product_video_feature_title'] !!} </h4> -->
                <div class="product-video-content-panel">
                  @if($single_product_details['_product_video_feature_source'] == 'embedded_code')
                    @include('pages.frontend.frontend-pages.video-source-embedded-url')
                  @elseif($single_product_details['_product_video_feature_source'] == 'online_url')
                    @include('pages.frontend.frontend-pages.video-source-online-url')
                  @endif
                </div>  
              @endif
            @endif

            @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)
              <?php $count = 1;?>
              <div class="product-carousel owl-carousel gallery-wrapper">
                @foreach($single_product_details['_product_related_images_url']->product_gallery_images as $key => $row)
                  <div class="gallery-item" data-hash="{{ $count }}">
                    <a href="{{ get_image_url($row->zoom_img_url) }}" data-size="1000x667">
                    @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                      <img src="{{ get_image_url($row->url) }}"/>
                    @else
                      <img src="{{ default_placeholder_img_src() }}"/>
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
                          <img src="{{ get_image_url($row->url) }}"/>
                        @else
                          <img src="{{ default_placeholder_img_src() }}"/>
                        @endif
                      </a>
                    </li>
                  @else
                    <li>
                      <a href="#{{ $count }}">
                        @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                          <img src="{{ get_image_url($row->url) }}"/>
                        @else
                          <img src="{{ default_placeholder_img_src() }}"/>
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
      </div>
      <!-- Product Info-->
      <div class="col-md-6">
        <div class="padding-top-2x mt-2 hidden-md-up"></div>
          <div class="rating-stars">
          <i class="icon-star filled"></i>
          <i class="icon-star filled"></i>
          <i class="icon-star filled"></i>
          <i class="icon-star filled"></i>
          <i class="icon-star"></i>
        </div>
        <span class="text-muted align-middle">&nbsp;&nbsp;4.2 | 3 customer reviews</span>
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
        
        <div id="sapo" style="max-height:250px; overflow:hidden; ">
          {!! string_decode($single_product_details['post_content']) !!}
        </div>

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
                <option value="{{ $row['term_id'] }}" style="background-color:#{{ $row['color_code'] }}">{!! $row['name'] !!}</option>
              @endforeach
                
              </select>
            </div>
          </div>
          @endif
          <div class="col-sm-3">
            <div class="form-group">
              <label for="quantity">{!! trans('frontend.quantity') !!}</label>
              <select class="form-control" id="quantity">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
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
              <a class="social-button shape-circle sb-google-plus" data-name="gplus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a>
            </div>

          </div>
          <div class="sp-buttons mt-2 mb-2">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-primary" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-bag"></i> Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Product Tabs-->
    <div class="row padding-top-3x mb-3">
      <div class="col-lg-10 offset-lg-1">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item"><a class="nav-link active" href="#description" data-toggle="tab" role="tab">Description</a></li>
          <li class="nav-item"><a class="nav-link" href="#reviews" data-toggle="tab" role="tab">Reviews (3)</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="description" role="tabpanel">
          {!! string_decode($single_product_details['post_content']) !!}
          </div>
          <div class="tab-pane fade" id="reviews" role="tabpanel">
            <!-- Review-->
            <div class="comment">
              <div class="comment-author-ava"><img src="img/reviews/01.jpg" alt="Review author"></div>
              <div class="comment-body">
                <div class="comment-header d-flex flex-wrap justify-content-between">
                  <h4 class="comment-title">Average quality for the price</h4>
                  <div class="mb-2">
                      <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i><i class="icon-star"></i>
                      </div>
                  </div>
                </div>
                <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                <div class="comment-footer"><span class="comment-meta">Francis Burton</span></div>
              </div>
            </div>
            <!-- Review Form-->
            <h5 class="mb-30 padding-top-1x">Leave Review</h5>
            <form class="row" method="post">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="review_name">Your Name</label>
                  <input class="form-control form-control-rounded" type="text" id="review_name" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="review_email">Your Email</label>
                  <input class="form-control form-control-rounded" type="email" id="review_email" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="review_subject">Subject</label>
                  <input class="form-control form-control-rounded" type="text" id="review_subject" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="review_rating">Rating</label>
                  <select class="form-control form-control-rounded" id="review_rating">
                    <option>5 Stars</option>
                    <option>4 Stars</option>
                    <option>3 Stars</option>
                    <option>2 Stars</option>
                    <option>1 Star</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="review_text">Review </label>
                  <textarea class="form-control form-control-rounded" id="review_text" rows="8" required></textarea>
                </div>
              </div>
              <div class="col-12 text-right">
                <button class="btn btn-outline-primary" type="submit">Submit Review</button>
              </div>
            </form>
          </div>
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

  $('#sapo').css( 'max-height',$('#product-gallery').height() );

  console.log($('#product-gallery').height());

}).resize();

$(document).ready(function(){

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