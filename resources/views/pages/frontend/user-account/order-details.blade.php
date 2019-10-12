<!-- Page Content-->
<div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary ">
  <div class="w-100 text-center py-1 px-2"><span class='text-medium'>{{ trans('frontend.order_number') }}:</span> #{!! $order_details_by_order_id['order_id'] !!}</div>
  <div class="w-100 text-center py-1 px-2"><span class='text-medium'>{{ trans('frontend.payment_method') }}:</span> {{ get_payment_method_title($order_details_by_order_id['_payment_method']) }}</div>
  <div class="w-100 text-center py-1 px-2"><span class='text-medium'>{{ trans('frontend.date') }}:</span> {!! $order_details_by_order_id['order_date'] !!}</div>
</div>

<div class="accordion padding-top-1x padding-bottom-1x" id="accordion" role="tablist">
    <div class="card">
      <div class="card-header" role="tab">
        <h6><a href="#collapseOne" data-toggle="collapse">{{ get_payment_method_title($order_details_by_order_id['_payment_method']) }}</a></h6>
      </div>
      <div class="collapse" id="collapseOne" data-parent="#accordion" role="tabpanel">
        <div class="card-body">
          @if(isset($order_details_by_order_id['_payment_details']['method_instructions']))  
            <p class="payment_ins">{{ $order_details_by_order_id['_payment_details']['method_instructions'] }}</p>
          @endif
          @if(isset($order_details_by_order_id['_payment_details']['account_details']))  
            <h5>{{ trans('frontend.our_bank_details') }}</h5>
            <p>{{ trans('frontend.account_name') }}: {{ $order_details_by_order_id['_payment_details']['account_details']['account_name'] }}</p>
            <p>{{ trans('frontend.account_number') }}: {{ $order_details_by_order_id['_payment_details']['account_details']['account_number'] }}</p>
            <p>{{ trans('frontend.bank_name') }}: {{ $order_details_by_order_id['_payment_details']['account_details']['bank_name'] }}</p>
            <p>{{ trans('frontend.bank_short_code') }}: {{ $order_details_by_order_id['_payment_details']['account_details']['short_code'] }}</p>
            <p>{{ trans('frontend.iban') }}: {{ $order_details_by_order_id['_payment_details']['account_details']['iban'] }}</p>
            <p>{{ trans('frontend.bic_swift') }}: {{ $order_details_by_order_id['_payment_details']['account_details']['swift'] }}</p>
          @endif
        </div>
      </div>
    </div>
</div>

<!-- Open Ticket Modal-->
@if(count($order_details_by_order_id['ordered_items'])>0)   

<div class="table-responsive shopping-cart mb-0">
  <table class="table">
    <thead>
      <tr>
        <td>{{ trans('frontend.item') }}</td>
        <td>{{ trans('frontend.price') }}</td>
        <td>{{ trans('frontend.quantity') }}</td>
        <td>{{ trans('frontend.total') }}</td>
      </tr>
    </thead>
    <tbody>

    @foreach($order_details_by_order_id['ordered_items'] as $items)
      <tr>
        <td>
          <p>{!! $items['name'] !!}</p>
          <?php $count = 1; ?>
          @if(count($items['options']) > 0)
          <p>
            @foreach($items['options'] as $key => $val)
              @if($count == count($items['options']))
                {!! $key .' &#8658; '. $val !!}
              @else
                {!! $key .' &#8658; '. $val. ' , ' !!}
              @endif
              <?php $count ++ ; ?>
            @endforeach
          </p>
          @endif
        </td>
        <td>
          <p> {!! price_html( $items['order_price'], $order_details_by_order_id['_order_currency'] ) !!} </p>
        </td>
        <td class="text-center">
            <p> {!! $items['quantity'] !!} </p>
        </td>
        <td>
          <p>{!! price_html( $items['quantity']*$items['order_price'], $order_details_by_order_id['_order_currency'] ) !!}</p>
        </td>
      </tr>

      @endforeach

    </tbody>
  </table>
</div>

@else
  <section id="order-received-content">
    <div class="container new-container">
      <h5>{{ trans('frontend.no_content_yet') }}</h5>
    </div>
  </section> 
</div>  


@endif

<hr class="mb-3">
<div class="d-flex flex-wrap justify-content-between align-items-center pb-2">

  <div class="px-2 py-1">
    <span class='text-muted'>{{ trans('frontend.shipping_cost') }}:</span> 
    <span class='text-gray-dark'>{!! price_html( $order_details_by_order_id['_final_order_shipping_cost'], $order_details_by_order_id['_order_currency'] ) !!}</span>
  </div>
  <div class="px-2 py-1">
    <span class='text-muted'>{{ trans('frontend.tax') }}:</span> 
    <span class='text-gray-dark'>{!! price_html( $order_details_by_order_id['_final_order_tax'], $order_details_by_order_id['_order_currency'] ) !!}</span>
  </div>
  @if($order_details_by_order_id['_is_order_coupon_applyed'] == true)

    <div class="px-2 py-1">
      <span class='text-muted'>{{ trans('frontend.coupon_discount_label') }}:</span> 
      <span class='text-gray-dark'> - {!! price_html( $order_details_by_order_id['_final_order_discount'], $order_details_by_order_id['_order_currency'] ) !!}</span>
    </div>

  @endif

  <div class="text-lg px-2 py-1">
    <span class='text-muted'>{{ trans('frontend.order_total') }}:</span> 
    <span class='text-gray-dark'>{!! price_html( $order_details_by_order_id['_final_order_total'], $order_details_by_order_id['_order_currency'] ) !!}</span>
  </div>
</div>

<div class="steps flex-sm-nowrap padding-top-1x">
  <div class="step active">
    <i class="icon-shopping-bag"></i>
    <h4 class="step-title">{!!  trans('frontend.on-hold') !!}</h4>
  </div>
  <div class="step active">
    <i class="icon-settings"></i>
    <h4 class="step-title">{!!  trans('frontend.pending') !!}</h4>
  </div>
  <div class="step">
    <i class="icon-award"></i>
    <h4 class="step-title">{!!  trans('frontend.processing') !!}</h4>
  </div>
  <div class="step">
    <i class="icon-truck"></i>
    <h4 class="step-title">{!!  trans('frontend.shipping') !!}</h4>
  </div>
  <div class="step">
    <i class="icon-home"></i>
    <h4 class="step-title">{!!  trans('frontend.completed') !!}</h4>
  </div>
</div>

<!-- Open Ticket Modal-->
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="row modal-body">

    <div class="col-sm-6">
      <h5>{{ trans('frontend.billing_address') }}</h5><hr>
      <p>{!! $order_details_by_order_id['customer_address']['_billing_last_name'].' '. $order_details_by_order_id['customer_address']['_billing_first_name']!!}</p>
      <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $order_details_by_order_id['customer_address']['_billing_address_1'] !!}</p>
      @if($order_details_by_order_id['customer_address']['_billing_address_2'])
        <p><strong>{{ trans('frontend.address_2') }}:</strong> {!! $order_details_by_order_id['customer_address']['_billing_address_2'] !!}</p>
      @endif
      <p><strong>{{ trans('frontend.city') }}:</strong> {!! get_xaphuong($order_details_by_order_id['customer_address']['_billing_city']) !!}</p>
      <p><strong>{{ trans('frontend.state') }}:</strong> {!! get_quanhuyen($order_details_by_order_id['customer_address']['_billing_state']) !!}</p>
      <p><strong>{{ trans('frontend.country') }}:</strong> {!! get_tinhthanh( $order_details_by_order_id['customer_address']['_billing_country'] ) !!}</p>
      <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $order_details_by_order_id['customer_address']['_billing_phone'] !!}</p>

    </div>

    <div class="col-sm-6">
      <h5>{{ trans('frontend.shipping_address') }}</h5><hr>
      <p>{!! $order_details_by_order_id['customer_address']['_shipping_last_name'].' '. $order_details_by_order_id['customer_address']['_shipping_first_name']!!}</p>
      <p><strong>{{ trans('frontend.address_1') }}:</strong> {!! $order_details_by_order_id['customer_address']['_shipping_address_1'] !!}</p>
      @if($order_details_by_order_id['customer_address']['_shipping_address_2'])
        <p><strong>{{ trans('frontend.address_2') }}:</strong> {!! $order_details_by_order_id['customer_address']['_shipping_address_2'] !!}</p>
      @endif
      <p><strong>{{ trans('frontend.city') }}:</strong> {!! get_xaphuong($order_details_by_order_id['customer_address']['_shipping_city']) !!}</p>
      <p><strong>{{ trans('frontend.state') }}:</strong> {!! get_quanhuyen($order_details_by_order_id['customer_address']['_shipping_state']) !!}</p>
      <p><strong>{{ trans('frontend.country') }}:</strong> {!! get_tinhthanh( $order_details_by_order_id['customer_address']['_shipping_country'] ) !!}</p>
      <p><strong>{{ trans('frontend.phone') }}:</strong> {!! $order_details_by_order_id['customer_address']['_shipping_phone'] !!}</p>

    </div>



    </div>
  </div>
</div>




