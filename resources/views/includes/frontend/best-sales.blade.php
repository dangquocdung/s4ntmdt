@if(count($advancedData['best_sales']) > 0)
    <section class="widget widget-featured-posts">
    <h3 class="widget-title">{{ trans('frontend.best_sales_label') }}</h3>

        @foreach($advancedData['best_sales'] as $row)

        @if ($loop->iteration < 10)

        <div class="entry">
        <div class="entry-thumb" style="width:80px">

            <a href="{{ route('details-page', $row['post_slug'])}}">
            @if(!empty($row['post_image_url']))
            <img class="d-block w-100" src="{{ get_image_url( $row['post_image_url'] ) }}" alt="{{ basename( get_image_url( $row['post_image_url'] ) ) }}" />
            @else
            <img class="d-block w-100" src="{{ default_placeholder_img_src() }}" alt="" />
            @endif
            </a>
        </div>
        <div class="entry-content">
            <h4 class="entry-title mb-1">
            <a href="{{ route('details-page', $row['post_slug'])}}">{!! $row['post_title'] !!}</a>
            </h4>
            @if($row['post_type'] == 'simple_product')
            <p><strong>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($row['id'], $row['post_price'])), get_frontend_selected_currency())  !!}</strong></p>
            @elseif($row['post_type'] == 'configurable_product')
            <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
            @elseif($row['post_type'] == 'customizable_product' || $row['post_type'] == 'downloadable_product')
            @if(count(get_product_variations($row['id']))>0)
                <p><strong>{!! get_product_variations_min_to_max_price_html(get_frontend_selected_currency(), $row['id']) !!}</strong></p>
            @else
                <p><strong>{!! price_html( get_product_price_html_by_filter(get_role_based_price_by_product_id($row['id'], $row['post_price'])), get_frontend_selected_currency()) !!}</strong></p>
            @endif
            @endif

        </div>
        </div>

        @endif

        @endforeach

    </section>
@endif
