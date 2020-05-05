@extends('layouts.admin.master')
@section('title', trans('admin.pages_list_title') .' | '. get_site_title())

@section('content')
<div class="row">
  <div class="col-6">
    <h5>{!! trans('admin.pages_list') !!}</h5>
  </div>
  <div class="col-6">
    <div class="pull-right">
      <a href="{{ route('admin.add_page') }}" class="btn btn-primary pull-right btn-sm">{!! trans('admin.add_new_page') !!}</a>
    </div>  
  </div>
</div>
<br>
<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <div id="table_search_option">
          <form action="{{ route('admin.all_pages') }}" method="GET"> 
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="input-group">
                  <input type="text" name="term_page" class="search-query form-control" placeholder="{{ trans('admin.post_title_search_placeholder') }}" value="{{ $search_value }}" />
                  <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                      <span class="fa fa-search"></span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </form>  
        </div>  
          
        <table class="table table-bordered table-responsive admin-data-table admin-data-list">
          <thead class="thead-dark">
            <tr>
              <th>{!! trans('admin.post_title') !!}</th>
              <th>{!! trans('admin.status') !!}</th>
              <th>{!! trans('admin.action') !!}</th>
            </tr>
          </thead>
          <tbody>
            @if(count($pages_list)>0)
              @foreach($pages_list as $row)
                <tr>
                  <td>{!! $row['post_title'] !!}</td>

                  @if($row['post_status'] == 1)
                    <td>{!! trans('admin.enable') !!}</td>
                  @else
                    <td>{!! trans('admin.disable') !!}</td>
                  @endif

                  <td>
                    <div class="btn-group">
                      <button class="btn btn-success btn-flat" type="button">{!! trans('admin.action') !!}</button>
                      <button data-toggle="dropdown" class="btn btn-success btn-flat dropdown-toggle" type="button">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul role="menu" class="dropdown-menu">
                        <li><a target="_blank" href="{{ route('custom-page-content', $row['post_slug']) }}"><i class="fa fa-eye"></i>{!! trans('admin.view') !!}</a></li>  
                        
                        @if(in_array('add_edit_delete_pages', $user_permission_list))
                          <li><a href="{{ route('admin.update_page', $row['post_slug']) }}"><i class="fa fa-edit"></i>{!! trans('admin.edit') !!}</a></li>
                        @endif
                        
                        @if(in_array('add_edit_delete_pages', $user_permission_list))
                          <li><a class="remove-selected-data-from-list" data-track_name="pages_list" data-id="{{ $row['id'] }}" href="#"><i class="fa fa-remove"></i>{!! trans('admin.delete') !!}</a></li>
                        @endif
                      </ul>
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
            <tr><td colspan="3"><i class="fa fa-exclamation-triangle"></i> {!! trans('admin.no_data_found_label') !!}</td></tr>
            @endif
          </tbody>
          <tfoot class="thead-dark">
              <th>{!! trans('admin.post_title') !!}</th>
              <th>{!! trans('admin.status') !!}</th>
              <th>{!! trans('admin.action') !!}</th>
          </tfoot>
        </table>
        <br>
        <div class="products-pagination">{!! $pages_list->appends(Request::capture()->except('page'))->render() !!}</div>
      </div>
    </div>
  </div>
</div>
@endsection