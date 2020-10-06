@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_cart_title') .' | '. get_site_title() )

@section('content')
  {{-- @include('pages.ajax-pages.cart-html')	 --}}

    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>{{ trans('frontend.shopist_cart_title') }}</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>{{ trans('frontend.shopist_cart_title') }}</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-30" id="cart_page">

      @if (Cart::named('thanh-toan')->count() >0 )

        <div class="alert alert-danger mb-3">
          <a href="thanh-toan">Bạn có sản phẩm đang trong quá trình thanh toán!</a>
        </div>
      @endif

      @if( Cart::named('gio-hang')->count() >0 )

        <form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">  

        <div class="cart-data">

        </div>

        <!-- Shopping Cart-->

        @include('pages-message.notify-msg-error')

        @php

          $gio_hang = array();

          foreach (Cart::named('gio-hang')->items() as $key => $item) {

            if (!in_array($item->vendor_id,$gio_hang)){

              array_push($gio_hang,$item->vendor_id);

            }
          }

          // dd(Cart::named('gio-hang')->items());

        @endphp

        @foreach($gio_hang as $cart_id) 

        <div class="table-responsive shopping-cart">
          <table class="table">
            <thead>
              <tr>
                <th>{!! trans('frontend.cart_item') !!}</th>
                <th class="text-center">{!! trans('frontend.price') !!}</th>
                <th class="text-center">{!! trans('frontend.quantity') !!}</th>
                <th class="text-center">{!! trans('frontend.total') !!}</th>
                <th class="text-center">
                  {{-- <input type="submit" name="empty_cart" class="btn btn-sm btn-outline-danger" value="{{ trans('frontend.clear_cart') }}">   --}}
                </th>

              </tr>
            </thead>
            <tbody>

              <tr>
                <td>

                  <i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;{!! get_vendor_name($cart_id) !!}

                </td>

              </tr>

              @foreach(Cart::named('gio-hang')->items() as $index => $items)

              @if ($items->vendor_id == $cart_id)

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
                      
                      @if( count(get_vendor_details_by_product_id($items->product_id)) >0 )
                        <p class="vendor-title"><strong>{!! trans('frontend.vendor_label') !!}</strong> : {!! get_vendor_name_by_product_id( $items->product_id) !!}</p>
                      @endif
                    </div>
                  </div>
                </td>

                <td class="text-center text-lg">
                  {!! price_html( get_product_price_html_by_filter( $items->price ), get_frontend_selected_currency() ) !!}
                </td>

                <td class="text-center">

                  <!-- <input type="number" class="form-control text-center" name="cart_quantity[{{ $index }}]" value="{{ $items->quantity }}" min="1"> -->

                  <div class="count-input">
                    <select class="form-control" name="cart_quantity[{{ $index }}]">
                      @for( $i=1; $i<=10; $i++)
                        <option {{ ($i==$items->quantity?'selected':'' )}}>{{$i}}</option>
                      @endfor

                    </select>
                  </div>
                </td>
                <td class="text-center text-lg">
                  {!! price_html($items->price*$items->quantity) !!}
                </td>
              
                <td class="text-center"><a class="remove-from-cart" href="{{ route('removed-item-from-cart', $index)}}" data-toggle="tooltip" title="Xoá sản phẩm"><i class="icon-x"></i></a></td>

              </tr>

              @endif

              @endforeach

            </tbody>
          </table>
        </div>

        <div class="shopping-cart-footer">

          <div class="column">

            {{-- <input type="submit" name="update_cart" class="btn btn-warning update" value="{{ trans('frontend.update_cart') }}">   --}}
            
            {{-- <a class="btn btn-primary chuyen_thanh_toan" data-id="{{ $items->vendor_id }}" href="{{ route('checkout-page',['vendor'=>$items->vendor_id]) }}">{!! trans('frontend.checkout') !!}</a> --}}
            
            @if (Cart::named('thanh-toan')->count() == 0)
              <a class="btn btn-primary chuyen_thanh_toan" data-vendor="{{ get_vendor_name( $cart_id) }}" data-url={{ route('checkout-page',['vendor'=>$cart_id]) }} href="#">{!! trans('frontend.checkout') !!}</a>
            @endif
          </div>
        </div>

        <br>

        @endforeach

        {{-- @include('pages.ajax-pages.cart-total-html') --}}

        </form>    

      @else

        <div class="alert alert-info alert-dismissible fade show text-center" style="margin-bottom: 30px;">
          <span class="alert-close" data-dismiss="alert"></span>
          {{ trans('frontend.empty_cart_msg') }}
        </div>

        @include('pages-message.notify-msg-error')

        <div class="shopping-cart-footer">
          <div class="column">
            <a class="btn btn-outline-secondary" href="{{ route('shop-page') }}" style="margin-left:0; float:left">
              <i class="icon-arrow-left"></i>&nbsp;{{ trans('frontend.return_to_shop') }}
            </a>
          </div>
        </div>
        
      @endif

    </div>

    <div class="container mt-30 padding-bottom-3x">
      <!-- Seen Products Carousel-->
      @include('includes.frontend.seen-products')
      @yield('seen-products')
    </div>

@endsection  