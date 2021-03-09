@extends('layouts.admin.master')
@section('title', trans('admin.manage_log_page_title') .' | '. get_site_title())

@section('content')
<div class="row">
  <div class="col-6">
    <h5>{!! trans('admin.log_title') !!}</h5>
  </div>
  
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <table class="table table-bordered table-responsive admin-data-table admin-data-list" id="user-list-tbl">
          <thead class="thead-dark">
            <tr>
              <th>ID</th>
              <th>Tên</th>
              <th>IP</th>
              <th>Thao tác</th>
              <th>Thời gian</th>

            </tr>
          </thead>
          <tbody>
            @if(count($log_data)>0)
            @foreach($log_data as $row)
            <tr>
              <td>{!! $row->id !!}</td>
              <td>{!! $row->name !!}</td>
              
              <td>{!! $row->display_name !!}</td>
              
              <td>{!! $row->email !!}</td>
              
              <td>{!! $row->user_photo_url !!}</td>
              
          

            </tr>
            @endforeach
            @endif
          </tbody>
         
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
