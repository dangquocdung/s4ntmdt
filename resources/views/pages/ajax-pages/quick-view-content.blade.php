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
    <div class="col-xs-12 col-sm-5 col-md-5">
      <div class="model__quick_view_product_image">
        @if( !empty($single_product_details['post_image_url']) && $single_product_details['_product_related_images_url']->product_image != '/images/upload.png')
          <img src="{{ get_image_url($single_product_details['post_image_url']) }}" alt="{{ basename($single_product_details['post_image_url']) }}" class="img-responsive"/>
        @else
          <img src="{{ default_placeholder_img_src() }}" alt="" class="img-responsive" />
        @endif
      </div>
    </div>      

    <div class="col-xs-12 col-sm-7 col-md-7">
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
          {!! get_limit_string(string_decode($single_product_details['post_content']),200) !!}
        </p>
        <hr>
        @endif

        <div class="row align-items-end pt-4 pb-4">
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

        @if ($single_product_details['post_sku'])
          <div class="pt-1 mb-4"><span class="text-medium">{!! trans('frontend.sku') !!}: </span>
              #{{ $single_product_details['post_sku'] }}
          </div>
        @endif

      </div>
    </div>    
  </div>      
</div>