@if(count($data['children'])>0)

  @if( (in_array($data['id'], $product_by_cat_id['selected_cat'])) || ($data['id'] == $product_by_cat_id['parent_id']))
    <li class="active">
  @else
    <li>
  @endif
    <a href="{{ route('categories-page', $data['slug']) }}"> {!! $data['name'] !!} </a>

  <ul>

    @foreach($data['children'] as $data)  
      @include('pages.common.product-children-category-extra', $data)
    @endforeach

  </ul>


</li>


@else

@if( (in_array($data['id'], $product_by_cat_id['selected_cat'])) || ($data['id'] == $product_by_cat_id['parent_id']))
<li class="active">
@else
<li>
@endif
  <a href="{{ route('categories-page', $data['slug']) }}"> {!! $data['name'] !!} </a>

</li>


@endif