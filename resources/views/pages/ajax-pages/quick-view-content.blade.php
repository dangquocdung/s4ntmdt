<script>

  var $productCarousel = $('.product-carousel');

  if ($productCarousel.length) {
    var activeHash = function activeHash(e) {
      var i = e.item.index;
      var $activeHash = $('.owl-item').eq(i).find('[data-hash]').attr('data-hash');
      $('.product-thumbnails li').removeClass('active');
      $('[href="#' + $activeHash + '"]').parent().addClass('active');
      $('[data-hash="' + $activeHash + '"]').parent().addClass('active');
    };

    // Carousel init
    $productCarousel.owlCarousel({
      items: 1,
      loop: false,
      dots: false,
      URLhashListener: true,
      startPosition: 'URLHash',
      onTranslate: activeHash
    });
  } 


</script>

  <div class="model__quick_view_product_info">
    <h2 class="product-title">{{ $single_product_details['post_title'] }}</h2>

    <div class="rating-stars">
      <div class="star-rating">
        <span style="width:{{ $comments_rating_details['percentage'] }}%"></span>
      </div>
    </div>

    <div class="model__quick_view_product_price">
      @if(get_product_type($single_product_details['id']) == 'simple_product')
        @if($single_product_details['post_regular_price'] && $single_product_details['post_regular_price'] >0 && $single_product_details['post_sale_price'] && $single_product_details['post_sale_price']>0 && $single_product_details['post_regular_price'] > $single_product_details['post_sale_price'] )
        <span class="offer-price">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($single_product_details['id'], $single_product_details['post_regular_price'])), get_frontend_selected_currency()) !!}</span>
        @endif
        <span class="solid-price">{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($single_product_details['id'], $single_product_details['post_price'])), get_frontend_selected_currency()) !!}</span>

        @if($single_product_details['post_regular_price'] && $single_product_details['post_sale_price'] && $single_product_details['post_regular_price'] > $single_product_details['post_sale_price'] && $single_product_details['_product_sale_price_start_date'] && $single_product_details['_product_sale_price_end_date'] && $single_product_details['_product_sale_price_end_date'] >= date("Y-m-d"))
        <p class="offer-message-label">&#10148; {{ trans('frontend.offer_msg') }}  <i>{!! date("F j, Y", strtotime($single_product_details['_product_sale_price_start_date'])) !!} {{ trans('frontend.to') }} {!! date("F j, Y", strtotime($single_product_details['_product_sale_price_end_date'])) !!} </i></p>
        @endif

      @elseif(get_product_type($single_product_details['id']) == 'configurable_product' || get_product_type($single_product_details['id']) == 'customizable_product')
        <span class="solid-price">{!! get_product_variations_min_to_max_price_html($currency_symbol, $single_product_details['id']) !!} </span>
      @endif
    </div> 

    <div class="model__quick_view_product_stock">
      @if( get_product_type($single_product_details['id']) == 'simple_product' || (get_product_type($single_product_details['id']) == 'customizable_product' && count(get_product_variations($single_product_details['id'])) == 0))

        @if( $single_product_details['post_stock_availability'] == 'in_stock' || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'only_allow' && $single_product_details['post_stock_availability'] == 'in_stock') || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['post_stock_availability'] == 'in_stock') )
          <p class="availability-status"><span>{{ trans('frontend.single_product_availability_label') }}: </span> <span class="in-stock">{{ trans('frontend.single_product_availability_status_instock_label') }}</span></p>
        @else
          <p class="availability-status"><span>{{ trans('frontend.single_product_availability_label') }}: </span> <span class="in-stock">{{ trans('frontend.single_product_availability_status_outstock_label') }}</span></p>
        @endif

        @if( ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'only_allow' && $single_product_details['post_stock_availability'] == 'in_stock') || ($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['post_stock_availability'] == 'in_stock') )
          <p class="availability-status"><span>{{ trans('frontend.single_product_available_stock_label') }}: </span> <span class="stock-amount">{{ $single_product_details['post_stock_qty'] }}</span></p>
        @endif

        @if($single_product_details['_product_manage_stock'] == 'yes' && $single_product_details['_product_manage_stock_back_to_order'] == 'allow_notify_customer' && $single_product_details['post_stock_availability'] == 'in_stock')
          <p class="stock-notify-msg">&#10148; {{ trans('frontend.product_available_msg') }}</p>
        @endif
      @endif
    </div>

    @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)

    <div class="product-gallery">
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
              <li class="{{ ($count==1)?'active':'' }}">
                <a href="#{{ $count }}">
                    @if(!empty($row->url) && (basename($row->url) !== 'no-image.png'))  
                    <img src="{{ get_image_url($row->url) }}" alt="Product">
                    @else
                    <img src="{{ default_placeholder_img_src() }}" alt="Product"/>
                    @endif
                </a>
              </li>
          <?php $count ++;?>
          @endforeach
          
        </ul>
      @endif
    </div>

    @endif    




    @if($single_product_details['post_content'])
      <p class="text-muted">
        {!! string_decode($single_product_details['post_content']) !!}
      </p>
    @endif

    <div class="pt-20 mb-1 store-name">
      <span class="text-medium">{!! trans('frontend.gian-hang') !!}: </span>

      <a href="{{ route('store-products-page-content', get_user_name_by_user_id($single_product_details['_selected_vendor'])) }}" target="_blank">
        {{ get_store_name_by_user_id($single_product_details['_selected_vendor']) }}
      </a>

    </div>

    @if ( isset($single_product_details['post_sku']) )
      <div class="pt-1 mb-4"><span class="text-medium">{!! trans('frontend.sku') !!}: </span>
          #{{ $single_product_details['post_sku'] }}
      </div>
    @endif

  </div>
