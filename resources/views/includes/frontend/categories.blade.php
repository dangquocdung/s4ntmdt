<section class="widget widget-categories">
@if (count($productCategoriesTree) > 0)
  <h3 class="widget-title">{!! trans('frontend.shop_categories') !!}</h3>
  <ul>
    <!-- expanded -->
    @foreach ($productCategoriesTree as $data)

      @if (count($data['children'])>0)
        <li class="has-children">
          <a href="#">{!! $data['name'] !!}</a>
          <ul>
            @foreach($data['children'] as $data)
              @include('pages.common.product-children-category', $data)
            @endforeach
          </ul>
        </li>
      @else
        <li>
          <a href="{{ route('categories-page', $data['slug']) }}"><strong>{!! $data['name'] !!}</strong></a>
        </li>
      @endif
    @endforeach
  </ul>
@endif
</section>