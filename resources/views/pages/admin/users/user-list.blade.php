@extends('layouts.admin.master')
@section('title', trans('admin.user_list_title') .' | '. get_site_title())

@section('content')
<div class="row">
  <div class="col-6">
    <h5>{!! trans('admin.user_list_title') !!}</h5>
  </div>
  <div class="col-6">
    <div class="pull-right">
      <a href="{{ route('admin.add_new_user') }}" class="btn btn-primary pull-right btn-sm">{{ trans('admin.add_new_user_title') }}</a>
    </div>  
  </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <!-- <div id="table_search_option">
          <form action="{{ route('admin.users_list') }}" method="GET"> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="input-group">
                  <input type="text" name="term_user_name" class="search-query form-control" placeholder="Nhập tên người dùng để tìm kiếm" value="{{ $search_value }}" />
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                      <span class="fa fa-search"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>  
        </div>       -->
        <table class="table table-bordered table-responsive admin-data-table admin-data-list" id="user-list-tbl">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>{{ trans('admin.user_list_table_header_title_1') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_2') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_3') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_4') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_5') }}</th>
              <!-- <th>{{ trans('admin.user_list_table_header_title_6') }}</th> -->
              <th>{{ trans('admin.user_list_table_header_title_7') }}</th>

            </tr>
          </thead>
          <tbody>
            @if(count($user_list_data)>0)
            @foreach($user_list_data as $row)
            <tr>
              <td>{!! $row['id'] !!}</td>
              <td>{!! $row['name'] !!}</td>
              
              <td>{!! $row['display_name'] !!}</td>
              
              <td>{!! $row['email'] !!}</td>
              
              <td>{!! $row['user_role'] !!}</td>
              
              @if($row['user_status'] == 1)
              <td>{{ trans('admin.enable') }}</td>
              @else
              <td style="color:red">{{ trans('admin.disable') }}</td>
              @endif

              <!-- <td>{!! $row['created_at']->format('d/m/Y') !!}</td> -->

                
              <td>
                <div class="btn-group">
                  <button class="btn btn-success btn-flat" type="button">{{ trans('admin.action') }}</button>
                  <button data-toggle="dropdown" class="btn btn-success btn-flat dropdown-toggle" type="button">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <ul role="menu" class="dropdown-menu">
                    <li><a href="{{ route('admin.update_new_user', $row['id']) }}"><i class="fa fa-edit"></i>{{ trans('admin.edit') }}</a></li>
                    @if($row['user_role'] = 'Administrator')
                      <li><a class="remove-selected-data-from-list" data-track_name="user_list" data-id="{{ $row['id'] }}" href="#"><i class="fa fa-remove"></i>{{ trans('admin.delete') }}</a></li>
                    @endif
                  </ul>
                </div>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
          <!-- <tfoot class="thead-dark">
            <tr>
              <th>{{ trans('admin.user_list_table_header_title_1') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_2') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_3') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_4') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_5') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_6') }}</th>
              <th>{{ trans('admin.user_list_table_header_title_7') }}</th>

            </tr>
          </tfoot> -->
        </table>
          <br>  
      </div>
    </div>
  </div>
</div>
<div class="eb-overlay"></div>
<div class="eb-overlay-loader"></div>

<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

<script>

$(document).ready( function () {
    $('#user-list-tbl').DataTable({
      "language": {
        "sProcessing": "Đang xử lý...",
        "sLengthMenu": "Hiện thị _MENU_  dòng.",
        "sZeroRecords": "Không có kết quả",
        "sEmptyTable": "Không có dữ liệu",
        "sInfo": "Từ _START_ đến _END_ trong tổng số _TOTAL_ mục",
        "sInfoEmpty": "Không có dữ liệu",
        "sInfoFiltered": "(Số lượng bản ghi _MAX_)",
        "sInfoPostFix": "",
        "sSearch": "Tìm kiếm:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Đang tải...",
        "oPaginate": {
          "sFirst": "Đầu tiên", "sLast": "Cuối cùng", "sNext": "Kế tiếp", "sPrevious": "Trước"
        },
        "oAria": {
          "sSortAscending": ": Thứ tự tăng dần", "sSortDescending": ": Thứ tự giảm dần"
        }
      }
    });
} );

</script>
@endsection