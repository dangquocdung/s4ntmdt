@foreach(get_quanhuyen_list(0) as $val)
  <option value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>
@endforeach