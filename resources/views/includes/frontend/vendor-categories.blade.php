@section('vendor-categories-content')

@if (count($productCategoriesTree) > 0)
  <h3 class="widget-title">{!! trans('frontend.shop_categories') !!}</h3>
  <ul>
    <!-- expanded -->
    @foreach ($productCategoriesTree as $data)
      @if(in_array($data['id'], $vendor_selected_cats_id))

        <li class="{{ (count($data['children'])>0)?'has-children':'' }}">
          <a href="#">{!! $data['name'] !!}</a>
          <ul>
            @foreach($data['children'] as $data)
              @include('pages.common.product-children-category', $data)
            @endforeach
          </ul>
        </li>
      @endif

    @endforeach
  </ul>
@endif

@endsection 