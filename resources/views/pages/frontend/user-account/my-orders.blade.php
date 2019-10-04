
@if(count($orders_list_data) > 0) 

  <div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
          <th>{{ trans('admin.user_account_order_id') }}</th>
          <th>{{ trans('admin.user_account_order_status') }}</th>
          <th>{{ trans('admin.user_account_order_total') }}</th>
          <th>{{ trans('admin.user_account_order_date') }}</th> 
          <th>{{ trans('admin.user_account_order_action') }}</th>  
      </tr>
      </thead>
      <tbody>
        @foreach($orders_list_data as $row)
          <tr>
            <td><a class="navi-link" href="#" data-toggle="modal" data-target="#orderDetails">#{!! $row['_post_id'] !!}</a></td>
            <td><span class="text-danger">{!!  $row['_order_status'] !!}</span></td>
            <td>{!!  price_html($row['_final_order_total'], $row['_order_currency']) !!}</td>  
            <td>{!!  Carbon\Carbon::parse($row['_order_date'])->format('F d, Y') !!}</td>  
            <td><a class="btn btn-link-primary margin-bottom-none" href="{{ route('account-order-details-page', [$row['_post_id'], $row['_order_process_key']]) }}">{!! trans('frontend.user_account_view_label') !!}</a></td>
          </tr>
        @endforeach


        {{-- <tr>
          <td><a class="navi-link" href="#" data-toggle="modal" data-target="#orderDetails">78A643CD409</a></td>
          <td>August 08, 2017</td>
          <td><span class="text-danger">Canceled</span></td>
          <td><span>$760.50</span></td>
        </tr> --}}

      </tbody>
    </table>
  </div>
  <hr>
  <div class="text-right"><a class="btn btn-link-primary margin-bottom-none" href="#"><i class="icon-download"></i>&nbsp;Order Details</a></div>

@else
  <p>{{ trans('frontend.order_list_not_available') }}</p>
@endif



<h5><label>{{ trans('admin.frontend_user_order_list') }}</label></h5>

@if(count($orders_list_data) > 0) 

  <div class="table-responsive">
    <table class="table table-hover mb-0">
      <thead>
        <tr>
            <th>{{ trans('admin.user_account_order_id') }}</th>
            <th>{{ trans('admin.user_account_order_status') }}</th>
            <th>{{ trans('admin.user_account_order_total') }}</th>
            <th>{{ trans('admin.user_account_order_date') }}</th> 
            <th>{{ trans('admin.user_account_order_action') }}</th>  
        </tr>
      </thead>
      <tbody>
          @foreach($orders_list_data as $row)
            <tr>
              <td>#{!! $row['_post_id'] !!}</td>
              <td>{!!  $row['_order_status'] !!}</td>
              <td>{!!  price_html($row['_final_order_total'], $row['_order_currency']) !!}</td>  
              <td>{!!  Carbon\Carbon::parse($row['_order_date'])->format('F d, Y') !!}</td>  
              <td><a class="btn btn-default btn-sm" href="{{ route('account-order-details-page', [$row['_post_id'], $row['_order_process_key']]) }}">{!! trans('frontend.user_account_view_label') !!}</a></td>
            </tr>
          @endforeach
      </tbody>
    </table>

  </div>

@else
  <p>{{ trans('frontend.order_list_not_available') }}</p>
@endif

{{-- <hr>
<div class="text-right"><a class="btn btn-link-primary margin-bottom-none" href="#"><i class="icon-download"></i>&nbsp;Order Details</a></div> --}}
