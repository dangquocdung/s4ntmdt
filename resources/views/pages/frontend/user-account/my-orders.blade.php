



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
            <td><span class="text-danger">{!!  trans('frontend.'.$row['_order_status']) !!}</span></td>
            <td>{!!  price_html($row['_final_order_total'], $row['_order_currency']) !!}</td>  
            <td>{!!  Carbon\Carbon::parse($row['_order_date'])->format('F d, Y') !!}</td>  
            <td>
              <a href="{{ route('account-order-details-page', [$row['_post_id'], $row['_order_process_key']]) }}">{!! trans('frontend.user_account_view_label') !!}</a>
            </td>
          </tr>
        @endforeach



      </tbody>
    </table>
  </div>
  <hr>
  <!-- <div class="text-right"><a class="btn btn-link-primary margin-bottom-none" href="#"><i class="icon-download"></i>&nbsp;Order Details</a></div> -->

@else
  <p>{{ trans('frontend.order_list_not_available') }}</p>
@endif
