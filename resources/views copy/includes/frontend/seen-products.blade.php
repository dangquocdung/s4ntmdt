@section('seen-products')

@if ($seen_items <> '')
<h3 class="text-center padding-top-2x mt-2 padding-bottom-1x">{{ trans('frontend.sp_da_xem') }}</h3>
<!-- Carousel-->
<div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
    
    <!-- Product-->
    @foreach($seen_items as $products)
    <?php 
        $reviews          = get_comments_rating_details($products['id'], 'product');
        $reviews_settings = get_reviews_settings_data($products['id']);      
    ?>
    
    <!-- Product-->
    <div class="product-card">

        @if ( $products['product_price'] < $products['product_regular_price'] )
        <div class="product-badge bg-danger">Giảm giá</div>
        @endif

        <a class="product-thumb" href="{{ route('details-page', $products['post_slug']) }}">
            @if($products['product_image'])
            <img src="{{ get_image_url($products['product_image']) }}" alt="{{ basename($products['product_image']) }}" />
            @else
            <img src="{{ default_placeholder_img_src() }}" alt="" />
            @endif
        </a>
        
        <div class="product-card-body">
        <h3 class="product-title">
            <a href="{{ route('details-page', $products['post_slug']) }}">{!! $products['post_title'] !!}</a>
        </h3>
        <h4 class="product-price">
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
        </h4>
        </div>

        <div class="product-button-group">

        <a class="product-button btn-wishlist product-wishlist" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="{{ trans('frontend.add_to_wishlist_label') }}" data-original-title="{{ trans('frontend.add_to_wishlist_label') }}">
            <i class="icon-heart"></i><span>Wishlist</span>
        </a>
        <a class="product-button btn-compare product-compare" data-id="{{ $products['id'] }}" data-toggle="tooltip" title="" data-original-title="{{ trans('frontend.add_to_compare_list_label') }}">
            <i class="icon-repeat"></i><span>Compare</span>
        </a>
        <a class="product-button add-to-cart-bg" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!" data-id="{{ $products['id'] }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ trans('frontend.add_to_cart_label') }}"><i class="icon-shopping-cart"></i><span>To Cart</span></a>             
        
        </div>
    </div>

    @endforeach
    
</div>
@endif

@endsection