<option selected>{!! trans('frontend.chon-quan-huyen') !!}</option>
@foreach(get_quanhuyen_list($matp) as $val)
  <option value="{{ $val['maqh'] }}"> {!! $val['name'] !!}</option>
@endforeach