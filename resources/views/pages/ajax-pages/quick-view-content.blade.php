<script type="text/javascript">
  $(document).ready(function(){
    $('.model__quick_view_product_info .btn-number').click(function(e){
      e.preventDefault();
      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
          if(type == 'minus') {

              if(currentVal > input.attr('min')) {
                  input.val(currentVal - 1).change();
              } 
              if(parseInt(input.val()) == input.attr('min')) {
                  $(this).attr('disabled', true);
              }

          } else if(type == 'plus') {

              if(currentVal < input.attr('max')) {
                  input.val(currentVal + 1).change();
              }
              if(parseInt(input.val()) == input.attr('max')) {
                  $(this).attr('disabled', true);
              }

          }
      } else {
          input.val(0);
      }
    });
	
    $('.model__quick_view_product_info .input-number').focusin(function(){
       $(this).data('oldValue', $(this).val());
    });
	
    $('.model__quick_view_product_info .input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".model__quick_view_product_info .btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".model__quick_view_product_info .btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            $(this).val($(this).data('oldValue'));
        }
    });
	
    $(".model__quick_view_product_info .input-number").keydown(function (e) {
      // Allow: backspace, delete, tab, escape, enter and .
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
           // Allow: Ctrl+A
          (e.keyCode == 65 && e.ctrlKey === true) || 
           // Allow: home, end, left, right
          (e.keyCode >= 35 && e.keyCode <= 39)) {
               // let it happen, don't do anything
               return;
      }
      // Ensure that it is a number and stop the keypress
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
          e.preventDefault();
      }
    });
    
//    if($('.add-to-cart-bg').length>0 || $('.single-page-add-to-cart').length>0){
//      dynamicAddToCart();
//    }
  });
</script>
<div class="container-fluid">
  <div class="row">
    @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)

      <div class="col-xs-12 col-sm-5 col-md-5">

        <div class="product-gallery">

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

    @endif    

    @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)
      <div class="col-xs-12 col-sm-7 col-md-7">
    @else
      <div class="col-12">
    @endif
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
        </div> <hr>

        @if($single_product_details['post_content'])
          <p class="text-muted">
            {!! string_decode($single_product_details['post_content']) !!}
          </p>
          <hr>
        @endif

        <div class="pt-1 mb-1 store-name">
          <span class="text-medium">{!! trans('frontend.gian-hang') !!}: </span>
          <a href="{{ route('store-details-page-content', get_user_name_by_user_id($single_product_details['_selected_vendor'])) }}" target="_blank">{{ get_user_name_by_user_id($single_product_details['_selected_vendor']) }}</a>
        </div>

        @if ($single_product_details['post_sku'])
          <div class="pt-1 mb-4"><span class="text-medium">{!! trans('frontend.sku') !!}: </span>
              #{{ $single_product_details['post_sku'] }}
          </div>
        @endif

      </div>
    </div>    
  </div>      
</div>