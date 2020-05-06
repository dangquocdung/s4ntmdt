@extends('backup::master')

@section('backup-content')
    <form>
        <div class="form-group">
            <a data-fancybox data-type="ajax" data-src="{{ route('backup.create') }}" href="javascript:;" class="btn btn-info"><i class="fa fa-plus-circle"></i> {{ __('Tạo mới') }}</a>
            <a class="btn btn-danger btn-delete-selected-items hidden"><i class="fa fa-trash-o"></i> {{ __('Xoá mục chọn') }}</a>
        </div>
        <table class="table table-striped" id="table-backups">
            <thead>
                <tr>
                    <th><input class="input-checkbox-minimal input-checkbox-all" type="checkbox"></th>
                    <th>{{ __('Tên') }}</th>
                    <th>{{ __('Mô tả') }}</th>
                    <th class="text-center">{{ __('Kích thước') }}</th>
                    <th class="text-center">{{ __('Ngày tạo') }}</th>
                    <th class="text-center">{{ __('Thao tác') }}</th>
                </tr>
            </thead>
            <tbody>
                @include('backup::partials.backup-items', compact('backups'))
            </tbody>
        </table>
    </form>

    <div class="modal-container modal-confirm-delete" style="display: none;">
        <div class="modal-title">{{ __('Xác nhận xoá') }}</div>
        <div class="modal-body">
            <p>
                {{ __('Bạn muốn xoá (các) bản sao lưu này?') }}
            </p>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="btn btn-primary" data-fancybox-close>{{ __('Không')  }}</a>
            <button type="button" class="btn btn-info btn-confirm-delete-backups" data-url="{{ route('backup.delete.many.post') }}">{{ __('Có, hãy xoá nó đi') }}</button>
        </div>
    </div>
@stop