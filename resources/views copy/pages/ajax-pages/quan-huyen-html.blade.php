@foreach(get_quanhuyen_list($matp) as $val)
  <option value="{{ $val['maqh'] }}" {{ ($loop->iteration == 1)?'selected':'' }}> {!! $val['name'] !!}</option>
@endforeach