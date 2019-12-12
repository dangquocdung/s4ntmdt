<section class="widget widget-categories">
    @if (count($productCategoriesTree) > 0)
    <ul>

      @foreach ($productCategoriesTree as $data)

      @if(count($data['children'])>0)

        @if((in_array($data['id'], $product_by_cat_id['selected_cat'])) || ($data['id'] == $product_by_cat_id['parent_id']) )

          <li class="has-children expanded active">
        @else

          <li class="has-children">

        @endif

          <a href="#">{!! $data['name'] !!}</a>
          <!-- <span>(123)</span> -->

          @if(count($data['children'])>0)
          <ul>
            @foreach($data['children'] as $data)
              @include('pages.common.category-frontend-loop-extra', $data)
            @endforeach
          </ul>  
          @endif
          
        </li>

      @else

      <li class="{{ ($data['id']==$product_by_cat_id['parent_id'])?'active':'' }}">

            <a href="{{ route('categories-page', $data['slug']) }}">
              @if(in_array($data['id'], $product_by_cat_id['selected_cat']))
                <span class="active">{!! $data['name'] !!}</span>
              @else
                <span>{!! $data['name'] !!}</span>
              @endif
            </a>
        </li>

      @endif

      @endforeach
     
    </ul>
    @endif
  </section>