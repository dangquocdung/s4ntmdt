<section class="widget widget-categories chuyen-muc">
  <h3 class="widget-title">{{ trans('frontend.category_label') }}</h3>
  @if (count($productCategoriesTree) > 0)
  <ul>
    @foreach ($productCategoriesTree as $data)
    <li class="has-children">
      @if(count($data['children'])>0)
        {{-- <a href="{{ route('categories-page', $data['slug']) }}">{!! $data['name'] !!}</a> --}}
        <a href="#">{!! $data['name'] !!}</a>

        <ul style="display:none">
          @foreach($data['children'] as $data)
            @include('pages.common.product-children-category', $data)
          @endforeach
        </ul>
      @else
        <a href="{{ route('categories-page', $data['slug']) }}"> {!! $data['name'] !!} </a>
      @endif
    </li>
    @endforeach
  </ul>
  @endif
</section>

<script>
$(document).ready(function(){
  $(".has-children a").click(function (e) {

    if ($(this).attr("href") == '#') {
      e.preventDefault();
      $(this).closest('li').children('ul').toggle();
    }

  });
})
</script>