@section('vendor-categories-content')

@if (count($productCategoriesTree) > 0)
  <h3 class="widget-title">{!! trans('frontend.shop_categories') !!}</h3>
  <ul>
    <!-- expanded -->
    @foreach ($productCategoriesTree as $data)

      @if(in_array($data['id'], $vendor_selected_cats_id))

        <li class="{{ (count($data['children'])>0)?'has-children':'' }}">
          @if(count($data['children'])>0)

            <a href="#">{!! $data['name'] !!}</a>
            <ul>
              @foreach($data['children'] as $data)
                @include('pages.common.vendor-children-category', array('data' => $data, 'user_name' => $user_name))
              @endforeach
            </ul>
          @else
            <a href="{{ route('store-products-cat-page-content', array($data['slug'], $user_name)) }}"> {!! $data['name'] !!} </a>
          @endif
        </li>

      @endif

    @endforeach
  </ul>
@endif

@endsection 