<!-- Page Title-->
<div class="page-title">
      <div class="container">
        <div class="column">
          <h1>{{ $single_product_details['post_title'] }}</h1>
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

            @if ($single_product_details['solid_price'] < $single_product_details['offer_price'])

              <span class="product-badge text-danger"id="hasSale">30% Off</span>

            @endif

            @if ($single_product_details['solid_price'] < $single_product_details['offer_price'])
                @php
                  $tiengiam = $single_product_details['offer_price'] - $single_product_details['solid_price'];
                  $phantram = round(($tiengiam/$single_product_details['offer_price'])*100);
                @endphp
              <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>
            @endif

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

                @if ($qty > 1)

                  @for($i=1; $i<$qty; $i++)

                    <option value="{{ $i }}">{{ $i}}</option>

                  @endfor
                @else

                  <option value="1" selected>1</option>

                @endif

                </select>
              </div>
            </div>
            <div class="col-sm-8">
              <div class="pt-4 hidden-sm-up"></div>
              <button class="btn btn-primary btn-block m-0 add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Sản phẩm" data-toast-message="đã thêm vào giỏ hàng!" data-id="{{ $single_product_details['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-bag"></i> Thêm vào giỏ hàng</button>
            </div>
          </div>

          <div class="pt-1 mb-1 store-name">
            <span class="text-medium">{!! trans('frontend.gian-hang') !!}: </span>
            <a href="{{ route('store-details-page-content', get_user_name_by_user_id($single_product_details['_selected_vendor'])) }}" target="_blank">{{ get_user_name_by_user_id($single_product_details['_selected_vendor']) }}</a>
          </div>

          <div class="pt-1 mb-4"><span class="text-medium">{!! trans('frontend.sku') !!}: </span>
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

    <div class="container">

      <div id="product_description_bottom_tab" class="product-description-bottom-tab">
        <div class="row">
          <div class="col-12">  
          <div class="product-tab-list">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs tab-style" role="tablist">

                <li class="nav-item"><a <?php if(!old('comments_target')){?>class="show active" <?php }?> href="#features" data-toggle="tab">
                  <div class="tab-menu-text">
                      <h4>{{ trans('frontend.features_label') }}</h4>
                  </div>

                </a></li>  
                <li class="nav-item">
                  <a class="show" href="#shippingInfo" data-toggle="tab">
                    <div class="tab-menu-text">
                        <h4>{{ trans('frontend.shipping_info_label') }}</h4>
                    </div>
                  </a>
              </li>

                @if($single_product_details['_product_enable_reviews'] == 'yes')
                  <li class="nav-item">
                    <a class="show <?php if(old('comments_target')){?>active <?php }?>" href="#reviews" data-toggle="tab">
                    <div class="tab-menu-text">
                        <h4>{{ trans('frontend.reviews_label') }} ({!! $comments_rating_details['total'] !!})</h4>
                    </div>

                      
                    </a>
                  </li>
                @endif

                @if( count(get_vendor_details_by_product_id($single_product_details['id'])) >0 )
                <li class="nav-item"><a class="show" href="#vendorInfo" data-toggle="tab">
                <div class="tab-menu-text">
                        <h4>{{ trans('frontend.vendor_info_label') }}</h4>
                    </div>
                  </a></li>
                @endif
              </ul>
            </div>

            <div class="tab-content">
              <div class="tab-pane fade <?php if(!old('comments_target')){?>show active<?php }?>" id="features">
                @if($single_product_details['_product_extra_features'])  
                  {!! string_decode($single_product_details['_product_extra_features']) !!}
                @else
                  {!! trans('frontend.no_features_label') !!}
                @endif
              </div>

              <div class="tab-pane fade" id="shippingInfo" >
                {!! trans('frontend.no_shippingInfo_label') !!}
              </div>

              @if($single_product_details['_product_enable_reviews'] == 'yes')
              <div class="tab-pane fade <?php if(old('comments_target')){?>show active<?php }?>" id="reviews">
                  <div class="product-reviews-content">
                    <div class="rating-box clearfix">
                        <div class="score-box">
                          <div class="score">{{ $comments_rating_details['average'] }}</div>
                          <div class="star-rating"><span style="width:{{ $comments_rating_details['percentage'] }}%"></span></div>
                          <div class="total-users"><i class="fa fa-user"></i>&nbsp;<span class="total">{{ $comments_rating_details['total'] }}</span>&nbsp;{{ trans('frontend.totals_label') }}</div>
                        </div>
                        <div class="individual-score-graph">
                          <ul>
                            <li>
                              <div class="rating-progress-content clearfix">
                                <div class="individual-rating-score">
                                  <span><i class="fa fa-star"></i> 5</span>
                                </div>
                                <div class="individual-rating-progress">
                                  <div class="progress">
                                    <div class="progress-bar progress-bar-five" role="progressbar" aria-valuenow="{{ $comments_rating_details[5] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $comments_rating_details[5] }}%">
                                    {!! $comments_rating_details[5] !!}%
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </li>
                            <li>
                                <div class="rating-progress-content clearfix">
                                    <div class="individual-rating-score">
                                        <span><i class="fa fa-star"></i> 4</span>
                                    </div>
                                    <div class="individual-rating-progress">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-four" role="progressbar" aria-valuenow="{{ $comments_rating_details[4] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $comments_rating_details[4] }}%">
                                          {!! $comments_rating_details[4] !!}%
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rating-progress-content clearfix">
                                    <div class="individual-rating-score">
                                        <span><i class="fa fa-star"></i> 3</span>
                                    </div>
                                    <div class="individual-rating-progress">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-three" role="progressbar" aria-valuenow="{{ $comments_rating_details[3] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $comments_rating_details[3] }}%">
                                          {!! $comments_rating_details[3] !!}%
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rating-progress-content clearfix">
                                    <div class="individual-rating-score">
                                        <span><i class="fa fa-star"></i> 2</span>
                                    </div>
                                    <div class="individual-rating-progress">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-two" role="progressbar" aria-valuenow="{{ $comments_rating_details[2] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $comments_rating_details[2] }}%">
                                          {!! $comments_rating_details[2] !!}%
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="rating-progress-content clearfix">
                                    <div class="individual-rating-score">
                                        <span><i class="fa fa-star"></i> 1</span>
                                    </div>
                                    <div class="individual-rating-progress">
                                        <div class="progress">
                                          <div class="progress-bar progress-bar-one" role="progressbar" aria-valuenow="{{ $comments_rating_details[1] }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $comments_rating_details[1] }}%">
                                          {!! $comments_rating_details[1] !!}%
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="user-reviews-content">
                        <h2 class="user-reviews-title">{{ $comments_rating_details['total'] }} {{ trans('frontend.reviews_for_label') }} <i><span>{{ $single_product_details['post_title'] }}</span></i></h2>
                          @if(count($comments_details) > 0)
                          <ol class="commentlist">
                            @foreach($comments_details as $comment) 
                              <li class="comment">
                                <div class="comment-container clearfix">
                                  <div class="user-img">
                                    @if(!empty($comment->user_photo_url))
                                    <img alt="" src="{{ get_image_url( $comment->user_photo_url ) }}" class="avatar photo">
                                    @else
                                    <img alt="" src="{{ default_avatar_img_src() }}" class="avatar photo">
                                    @endif
                                  </div>
                                  <div class="comment-text">
                                    <div class="star-rating">
                                      <span style="width:{{ $comment->percentage }}%"><strong itemprop="ratingValue"></strong></span>
                                    </div>
                                    <p class="meta">
                                      <span class="comment-date">{{ Carbon\Carbon::parse(  $comment->created_at )->format('F d, Y') }}</span> &nbsp; - <span class="comment-user-role"><strong >{{ trans('frontend.by_label') }} {{ $comment->display_name }}</strong></span>
                                    </p><hr>
                                    <div class="description">
                                      <p>{{ $comment->content }}</p>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              @endforeach
                          </ol>
                          @else
                          <p>{{ trans('frontend.no_review_label') }}</p>
                          @endif
                    </div>

                    <br>

                    @include('pages-message.notify-msg-success')
                    @include('pages-message.notify-msg-error')
                    @include('pages-message.form-submit')

                    <form id="new_comment_form" method="post" action="" enctype="multipart/form-data">
                      <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                      <input type="hidden" name="comments_target" id="comments_target" value="product">
                      <input type="hidden" name="selected_rating_value" id="selected_rating_value" value="">
                      <input type="hidden" name="object_id" id="object_id" value="{{ $single_product_details['id'] }}">

                      <div class="add-user-review">
                        <h2 class="add-reviews-title">{{ trans('frontend.add_a_review_label') }}</h2>
                        <hr>
                        <h2 class="rating-title">{{ trans('frontend.select_your_rating_label') }}</h2>
                        <div class="rating-select">
                          <div class="btn btn-light btn-sm" data-rating_value="1"><span class="fa fa-star"></span></div>
                          <div class="btn btn-light btn-sm" data-rating_value="2"><span class="fa fa-star"></span></div>
                          <div class="btn btn-light btn-sm" data-rating_value="3"><span class="fa fa-star"></span></div>
                          <div class="btn btn-light btn-sm" data-rating_value="4"><span class="fa fa-star"></span></div>
                          <div class="btn btn-light btn-sm" data-rating_value="5"><span class="fa fa-star"></span></div>
                        </div>
                        <br>
                        <div class="review-content">
                          <fieldset>
                            <legend>{{ trans('frontend.write_your_review_label') }}</legend>
                            <p><textarea name="product_review_content" id="product_review_content"></textarea></p>
                          </fieldset>
                        </div>
                        <br>
                        <div class="review-submit">
                          <input name="review_submit" id="review_submit" class="btn btn-sm btn-style" value="{{ trans('frontend.submit_label') }}" type="submit">
                        </div>
                      </div>
                    </form>
                </div>
              </div>
              @endif

              @if( count(get_vendor_details_by_product_id($single_product_details['id'])) >0 )
              <div class="tab-pane fade" id="vendorInfo">
                <?php  $vendor_details = get_vendor_details_by_product_id($single_product_details['id']); $parse_json = json_decode($vendor_details['details']);?>
                <div class="table-responsive">

                <table class="table">
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
                  <tr><th>{!! trans('frontend.country') !!}</th><td>{!! get_tinhthanh($parse_json->profile_details->country) !!}</td></tr>
                  @endif

                  <tr><th>{!! trans('frontend.vendor_rating_label') !!}</th><td><div class="review-stars"><div class="star-rating" style="text-align:left !important; margin:0px !important;"><span style="width:{{ $vendor_reviews_rating_details['percentage'] }}%"></span></div></div></td></tr>  
                </table>


                </div>
              </div>  
              @endif
            </div>
          </div>
        </div>    
      </div>  

    </div>

    <div class="container padding-bottom-3x padding-top-1x">       
    @if(count($related_items) > 0)   

    <div class="product-tab-list">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tab-style" role="tablist">
            <li class="nav-item">
                <a href="#latest_products" data-toggle="tab" class="show active">
                    <div class="tab-menu-text">
                        <h4>{{ trans('frontend.san-pham-tuong-tu') }}</h4>
                    </div>
                </a>
            </li>
           
        </ul>
    </div>
    <div class="tab-content another-product-style jump">
        <div class="tab-pane fade show active" id="latest_products" role="tabpanel">
        <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
        
        @foreach($related_items as $products)
  
        @if ($loop->iteration < 10 )
  
          <?php 
            $reviews          = get_comments_rating_details($products['id'], 'product');
            $reviews_settings = get_reviews_settings_data($products['id']);      
          ?>
          
          <!-- Product-->
          <div class="product-card">
  
            @if ($products['post_price'] < $products['post_regular_price'] )
                @php
                  $tiengiam = $products['post_regular_price'] - $products['post_price'];
                  $phantram = round(($tiengiam/$products['post_regular_price'])*100);
                @endphp
              <div class="product-badge bg-danger">Giảm giá {{ $phantram }}%</div>
            @endif
  
            <a class="product-thumb" href="{{ route('details-page', $products['post_slug']) }}">
                @if($products['_product_related_images_url']->product_image)
                  <img src="{{ get_image_url($products['_product_related_images_url']->product_image) }}" alt="{{ basename($products['_product_related_images_url']->product_image) }}" />
                @else
                  <img src="{{ default_placeholder_img_src() }}" alt="" />
                @endif
              </a>
            
            <div class="product-card-body">
              <h3 class="product-title"><a href="{{ route('details-page', $products['post_slug']) }}">{!! $products['post_title'] !!}</a></h3>
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
  
              <a class="product-button btn-wishlist product-wishlist" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
                <i class="icon-heart"></i><span>{{ trans('frontend.add_to_wishlist_label') }}</span>
              </a>
              <a class="product-button btn-compare product-compare" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
                <i class="icon-repeat"></i><span>{{ trans('frontend.add_to_compare_list_label') }}</span>
              </a>
              <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $products['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-shopping-cart"></i>
                <span>{{ trans('frontend.add_to_cart_label') }}</span>
              </a>             
            </div>
          </div>
  
        @endif
  
        @endforeach
          
        </div>
  
        </div>
    </div>

      <!-- Carousel-->
    
    @endif
    </div>

    <!-- Seen Products Carousel-->
    <div class="container padding-bottom-3x mb-1">       

    @include('includes.frontend.seen-products')
    @yield('seen-products')
    </div>