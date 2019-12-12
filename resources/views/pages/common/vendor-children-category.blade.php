@if(count($data['children'])>0)
      <ul>
        @foreach($data['children'] as $data)  
          @include('pages.common.product-children-category-extra', $data)
        @endforeach
      </ul>
@endif