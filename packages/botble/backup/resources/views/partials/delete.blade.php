<div class="modal-container">
    <div class="modal-title">{{ __('Xác nhận xoá bản sao lưu #:id', ['id' => $backup['key']]) }}</div>
    <div class="modal-body">
        <p>
            {{ __('Bạn thật sự muốn xoá bản sao lưu này ":name"?', ['name' => $backup['name']]) }}
        </p>
    </div>
    <div class="modal-footer">
        <a href="javascript:;" class="btn btn-primary" data-fancybox-close>{{ __('Không')  }}</a>
        <button type="button" class="btn btn-info btn-confirm-delete-backup" data-url="{{ route('backup.delete.post', $backup['key']) }}">{{ __('Có, hãy xoá nó đi') }}</button>
    </div>
</div>