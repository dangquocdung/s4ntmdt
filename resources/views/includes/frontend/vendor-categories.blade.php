@section('vendor-categories-content')

  @if (count($productCategoriesTree) > 0) 

    <h3 class="widget-title">{!! trans('frontend.shop_categories') !!}</h3>

    <ul>

      @foreach ($productCategoriesTree as $data)

        @if(in_array($data['id'], $vendor_selected_cats_id))

          @if(count($data['children'])>0)

          @if (isset($vendor_products['parent_id']))

            @if( $data['id'] == $vendor_products['parent_id'] )
              <li class="has-children expanded">
            @else
              <li class="has-children">
            @endif

          @else

            <li class="has-children expanded">

          @endif

              <a href="#">{!! $data['name'] !!}</a>
              <!-- <span>(123456)</span> -->

                @if(count($data['children'])>0)
                <ul>
                  @foreach($data['children'] as $data)
                  @if (isset($vendor_products['selected_cat'][0]))
                    <li class="{{ ($data['id']==$vendor_products['selected_cat'][0])?'active':'' }}">
                  @else
                    <li>
                  @endif
                      <a href="{{ route('store-products-cat-page-content', array($data['slug'], $user_name)) }}"> {!! $data['name'] !!} </a>
                      @include('pages.common.vendor-children-category', array('data' => $data, 'user_name' => $user_name))
                    </li>
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