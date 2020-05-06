<div class="modal-container">
    <div class="modal-title">{{ __('Chỉnh sửa bản sao lưu #:id', ['id' => $backup['key']]) }}</div>
    <div class="modal-body">
        <div class="form-body">
            <div class="form-group">
                <label for="name" class="control-label required">{{ __('Tên') }}</label>
                <input type="text" id="name" class="form-control" value="{{ $backup['name'] }}">
            </div>
            <div class="form-group">
                <label for="description" class="control-label">{{ __('Mô tả') }}</label>
                <textarea id="description" rows="4" class="form-control">{{ $backup['description'] }}</textarea>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-primary" data-fancybox-close>{{ __('Huỷ') }}</a>
        <button class="btn btn-info backup-button-submit" data-url="{{ route('backup.edit.post', $backup['key']) }}">{{ __('Lưu thay đổi') }}</button>
    </div>
</div>