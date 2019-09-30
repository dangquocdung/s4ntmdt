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
            <td>
              @if(count($row['_download_history']) > 0)  
                @foreach($row['_download_history'] as $items)
                  @if(!empty($items['download_data']))
                    {!! download_file_html( $items['id'], $items['download_data'], $row['_post_id']) !!}
                  @endif
                @endforeach
              @else
              {!! trans('frontend.no_downloaded_file_label') !!}
              @endif
            </td>
          </tr>
        @endforeach

      </tbody>
    </table>
  </div>

@else
<p>{{ trans('frontend.no_downloaded_items') }}</p>
@endif