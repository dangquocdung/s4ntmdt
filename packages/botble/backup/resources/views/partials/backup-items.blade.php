@if (count($backups) > 0)
    @foreach ($backups as $key => $backup)
        <tr>
            <td><input name="id[]" type="checkbox" class="input-checkbox-minimal" value="{{ $key }}"></td>
            <td>{{ $backup['name'] }}</td>
            <td>{{ $backup['description'] }}</td>
            <td style="width: 80px;" class="text-center">{{ human_file_size(get_backup_size($key)) }}</td>
            <td style="width: 150px;" class="text-center">{{ $backup['date'] }}</td>
            <td style="width: 150px;" class="text-center">
                <a href="{{ route('backup.download.database', $key) }}" class="text-success" title="Tải về tệp cơ sở dữ liệu"><i class="fa fa-database"></i></a>
                <a href="{{ route('backup.download.media.folder', $key) }}" class="text-primary" title="Tải về thư mục lưu trữ"><i class="fa fa-download"></i></a>
                <a data-fancybox data-type="ajax" data-src="{{ route('backup.edit', $backup['key']) }}" href="javascript:;" class="text-primary" title="Sửa thông tin"><i class="fa fa-edit"></i></a>
                <a data-fancybox data-type="ajax" data-src="{{ route('backup.delete', $backup['key']) }}" href="javascript:;" class="text-danger" title="Xoá"><i class="fa fa-trash-o"></i></a>
                <a data-fancybox data-type="ajax" data-src="{{ route('backup.restore', $backup['key']) }}" href="javascript:;" class="text-info" title="Khôi phục"><i class="fa fa-refresh"></i></a>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="6" class="text-center">{{ __('Hiện tại không có bản sao lưu nào!') }}</td>
    </tr>
@endif