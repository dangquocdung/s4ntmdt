    @section('cart_summary')
    <div id="cart_summary" class="step well">
        <div class="shopping-cart-summary-content">
            <h4>{!! trans('frontend.shopping_cart_summary_label') !!}</h4>
            {{-- <hr class="padding-bottom-1x"> --}}
       
            <div class="table-responsive shopping-cart">
            <table class="table">
                <thead>
                <tr>
                    <th>{!! trans('frontend.cart_item') !!}</th>
                    <th class="text-center">{!! trans('frontend.price') !!}</th>
                    <th class="text-center">{!! trans('frontend.quantity') !!}</th>
                    <th class="text-center">{!! trans('frontend.total') !!}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @php

                    // dd(Cart::named('thanh-toan')->items());

                @endphp

                @foreach(Cart::named('thanh-toan')->items() as $index => $items)
                
                <tr>
                    <td>
                        <div class="product-item">
                            <a class="product-thumb" href="{{ route('details-page', get_product_slug($items->id)) }}" target="_blank">
                            @if($items->img_src)
                                <img src="{{ get_image_url($items->img_src) }}" alt="product">
                            @else
                                <img src="{{ default_placeholder_img_src() }}" alt="no_image">
                            @endif
                            </a>

                            <div class="product-info">
                            <h4 class="product-title"><a href="{{ route('details-page', get_product_slug($items->id)) }}" target="_blank">{!! $items->name !!}</a></h4>
                            
                            @if(count($items->options) > 0)
                                @foreach($items->options as $key => $val)
                                @if($count == count($items->options))
                                    {!! $key .' &#8658; '. $val !!}
                                @else
                                    {!! $key .' &#8658; '. $val. ' , ' !!}
                                @endif
                                <?php $count ++ ; ?>
                                @endforeach
                            @endif
                            @if(get_product_type($items->id) === 'customizable_product')
                                @if($items->acces_token)
                                @if(count(get_customize_images_by_access_token($items->acces_token))>0)
                                    <button class="btn btn-block btn-sm view-customize-images" data-images="{{ json_encode( get_customize_images_by_access_token($items->acces_token) ) }}">{{ trans('frontend.design_images') }}</button>
                                @endif
                                @endif
                            @endif
                            
                            @if( count(get_vendor_details_by_product_id($items->product_id)) >0 )
                                <p class="vendor-title">
                                    {!! trans('frontend.ban_boi_shop') !!}: {!! get_vendor_name_by_product_id( $items->product_id) !!}
                                </p>
                            @endif
                            </div>
                        </div>
                    </td>

                    <td class="text-center text-lg">
                        {!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}
                    </td>

                    <td class="text-center text-lg">

                     {{ $items->quantity }}

                    </td>

                    <td class="text-center text-lg">
                        {!! price_html($items->price*$items->quantity) !!}
                    </td>

                    <td class="text-center"><a class="remove-from-cart" href="{{ route('removed-item-from-cart-buy', $index)}}" data-toggle="tooltip" title="Xoá sản phẩm"><i class="icon-x"></i></a></td>

      
                </tr>

                @endforeach

                </tbody>
            </table>
            </div>

            <div class="shopping-cart-footer">
            <!-- <div class="column">
                <div class="coupon-form">
                <input type="text" class="form-control form-control-sm" id="apply_coupon_code" name="apply_coupon" placeholder="{{ trans('frontend.coupon_code_placeholder_text') }}">
                <button class="btn btn-outline-primary btn-sm" name="apply_coupon_post" id="apply_coupon_post">{!! trans('frontend.apply_coupon_label') !!}</button>
                </div>
            </div> -->

            <div class="column text-lg">{!! trans('frontend.cart_sub_total') !!}: <span class="text-medium">{!! price_html( get_product_price_html_by_filter(Cart::named('thanh-toan')->getTotal()), get_frontend_selected_currency() ) !!}</span></div>

            </div>
        </div>

        <!-- @include('pages.ajax-pages.cart-total-html') -->

    </div>


    @endsection
