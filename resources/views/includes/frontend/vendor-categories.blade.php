@section('vendor-categories-content')

  @if (count($productCategoriesTree) > 0) 

    <h3 class="widget-title">{!! trans('frontend.shop_categories') !!}</h3>

    <ul>

      @foreach ($productCategoriesTree as $data)

        @if(in_array($data['id'], $vendor_selected_cats_id))

          @if(count($data['children'])>0)

              <li class="has-children">

              <a href="#">{!! $data['name'] !!}</a>
              <!-- <span>(123456)</span> -->

              @if(count($data['children'])>0)
              <ul>
                @foreach($data['children'] as $data)
                  @include('pages.common.vendor-children-category', array('data' => $data, 'user_name' => $user_name))
                @endforeach
              </ul>  
              @endif
              
            </li>

          @else

            <li>
                <a href="{{ route('categories-page', $data['slug']) }}">
                
                    <span>{!! $data['name'] !!}</span>
                </a>
            </li>

          @endif

        @endif

      @endforeach
     
    </ul>
    @endif

@endsection 