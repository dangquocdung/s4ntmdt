<section class="widget widget-categories">
@if (count($productCategoriesTree) > 0)
  <h3 class="widget-title">Shop Categories</h3>
  <ul>
    <!-- expanded -->
    @foreach ($productCategoriesTree as $data)
      <li class="{{ (count($data['children'])>0)?'has-children':'' }}">
        <a href="#">{!! $data['name'] !!}</a>
        <ul>
          @foreach($data['children'] as $data)
            @include('pages.common.product-children-category', $data)
          @endforeach
        </ul>
      </li>
    @endforeach
  </ul>
@endif
</section>