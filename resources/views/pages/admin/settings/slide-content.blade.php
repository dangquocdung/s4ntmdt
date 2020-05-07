@extends('layouts.admin.master')
@section('title', trans('admin.appearance_page_title') .' | '. get_site_title())

@section('content')

<div class="row">
  <div class="col-6">
    <h4>{!! trans('admin.frontend_slide') !!}</h4>
  </div>
  <div class="col-6">
    <div class="pull-right">
      <button data-toggle="modal" data-target="#addDynamicSlide" class="btn btn-primary custom-event btn-sm" type="button">Thêm slide</button>
    </div>  
  </div>
</div>
<br>

<div class="modal fade" id="addDynamicSlide" tabindex="-1" role="dialog" aria-labelledby="updater" aria-hidden="true">
  <div class="modal-dialog add-slide-dialog">
    <div class="ajax-overlay"></div>
    
    <div class="modal-content">
      <div class="modal-header">
        <p class="no-margin">Tạo mới slide hình ảnh</p>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>    
      <div class="modal-body">
        <div class="custom-model-row">
          <div class="custom-input-group">
            <div class="custom-input-label"><label for="inputSlideName">{!! trans('admin.name') !!}</label></div>
            <div class="custom-input-element"><input type="text" placeholder="{{ trans('admin.category_name') }}" id="inputSlideName" name="inputSlideName" class="form-control"></div>
          </div>
          <div class="custom-input-group">
            <div class="custom-input-label"><label for="inputSlideUrl">Liên kết</label></div>
            <div class="custom-input-element"><input type="text" placeholder="{{ trans('admin.enter_unique_slug_name') }}" id="inputSlideUrl" name="inputSlideUrl" class="form-control">
            </div>
          </div>

          <div class="custom-input-group">
            <div class="custom-input-label"><label for="slide_status">{!! trans('admin.status') !!}</label></div>
            <div class="custom-input-element">
              <select name="slide_status" id="slide_status" class="form-control select2" style="width: 100%;">
                <option value="1">{!! trans('admin.enable') !!}</option>
                <option value="0">{!! trans('admin.disable') !!}</option>
              </select>
            </div>
          </div>

          <div class="custom-input-group">
            <div class="custom-input-label"><label for="upload_slide_img">{!! trans('admin.thumbnail') !!}</label></div>
            <div class="custom-input-element">
              <div class="uploadform dropzone no-margin dz-clickable upload-slide-img" id="upload_slide_img" name="upload_slide_img">
                <div class="dz-default dz-message">
                  <span>{!! trans('admin.drop_your_cover_picture_here') !!}</span>
                </div>
              </div>
              <br>
              <div class="slide-img-content">
                <div class="slide-sample-img"><img class="img-responsive" src="{{ default_upload_sample_img_src() }}" alt=""></div>
                <div class="slide-img"><img class="img-responsive" src="" alt=""></div>
                <br>
                <div class="slide-img-upload-btn">
                  <button type="button" class="btn btn-default attachtopost remove-slide-img">{!! trans('admin.remove_image') !!}</button>
                </div>
              </div>
            </div>
          </div>
        </div>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default attachtopost create-slide btn-sm">Lưu</button>
        <button type="button" class="btn btn-default attachtopost btn-sm" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-12">
    <div class="box">
      <div class="box-body">
        <table class="table table-bordered table-responsive admin-data-table admin-data-list">
          <thead class="thead-dark">
            <tr>
              <th>Hình ảnh</th>
              <th>Tên</th>
              <th>Loại</th>
              <th>Liên kết</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @if(count($slide_list_data)>0)
              @foreach($slide_list_data as $row)
              <tr>
                @if(!empty($row['img_url']))
                <td><img src="{{ get_image_url( $row['img_url'] ) }}" alt="{{ basename ($row['img_url']) }}"></td>
                @else
                <td><img src="{{ default_placeholder_img_src() }}" alt=""></td>
                @endif

                <td>{!! $row['name'] !!}</td>

                <td>{!! $row['type'] !!}</td>

                <td>{!! $row['url'] !!}</td>

                @if($row['status'] == 1)
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
                      <li>
                        <a href="#" class="edit-data" data-track_name="slide_list" data-id="{{ $row['id'] }}">
                          <i class="fa fa-edit"></i>{!! trans('admin.edit') !!}
                        </a>
                      </li>
                      <li>
                        <a class="remove-selected-data-from-list" data-track_name="slide_list" data-id="{{ $row['id'] }}" href="#">
                          <i class="fa fa-remove"></i>{!! trans('admin.delete') !!}
                        </a>
                      </li>
                    </ul>
                  </div>
                </td>
              </tr>
              @endforeach
            @else
            <tr><td colspan="5"><i class="fa fa-exclamation-triangle"></i> {!! trans('admin.no_data_found_label') !!}</td></tr>
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

<input type="hidden" name="hf_from_model" id="hf_from_model" value="">
<input type="hidden" name="hf_update_id" id="hf_update_id" value="">

<input type="hidden" name="hf_slide_post_for" id="hf_slide_post_for" value="slide">


@endsection