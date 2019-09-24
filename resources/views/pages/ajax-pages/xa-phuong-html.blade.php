@foreach(get_xaphuong_list($maqh) as $val)
  <option value="{{ $val['xaid'] }}"> {!! $val['name'] !!}</option>
@endforeach