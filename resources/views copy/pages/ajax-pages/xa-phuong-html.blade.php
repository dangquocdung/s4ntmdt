@foreach(get_xaphuong_list($maqh) as $val)
  <option value="{{ $val['xaid'] }}" {{ ($loop->iteration == 1)?'selected':'' }}> {!! $val['name'] !!}</option>
@endforeach