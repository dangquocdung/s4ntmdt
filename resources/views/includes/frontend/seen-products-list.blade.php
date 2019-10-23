@section('seen-products-list')

@if ($seen_items <> '')

<section class="widget widget-featured-posts">
  <h3 class="widget-title">{{ trans('frontend.sp_da_xem') }}</h3>

    @foreach($seen_items as $products)

    <div class="entry">
      <div class="entry-thumb" style="width:80px">

        <a href="{{ route('details-page', $products['post_slug'])}}">
          @if($products['product_image'])
          <img src="{{ get_image_url($products['product_image']) }}" alt="{{ basename($products['product_image']) }}" />
          @else
          <img src="{{ default_placeholder_img_src() }}" alt="" />
          @endif
        </a>
      </div>
      <div class="entry-content">
        <h4 class="entry-title mb-1">
          <a href="{{ route('details-page', $products['post_slug'])}}">{!! $products['post_title'] !!}</a>
        </h4>
        @if ( $products['product_price'] < $products['product_regular_price'] )
        <del>
            {!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($products['id'], $products['product_regular_price'])), get_frontend_selected_currency()) !!}
        </del>
        @endif
        @if(get_product_type($products['id']) == 'simple_product')
        {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
        @elseif(get_product_type($products['id']) == 'configurable_product')
        {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
        @elseif(get_product_type($products['id']) == 'customizable_product' || get_product_type($products['id']) == 'downloadable_product')
        @if(count(get_product_variations($products['id']))>0)
            {!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $products['id']) !!}
        @else
            {!! price_html( get_product_price($products['id']), get_frontend_selected_currency() ) !!}
        @endif
        @endif

      </div>
    </div>

    @endforeach

</section>
@endif

@endsection