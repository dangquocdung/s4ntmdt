@if(count($data['children'])>0)

<li><a href="{{ route('categories-page', $data['slug']) }}"> {!! $data['name'] !!} </a>
  <ul>

    @foreach($data['children'] as $data)  
      @include('pages.common.product-children-category-extra', $data)
    @endforeach

  </ul>


</li>


@else

<li><a href="{{ route('categories-page', $data['slug']) }}"> {!! $data['name'] !!} </a></li>


@endif

