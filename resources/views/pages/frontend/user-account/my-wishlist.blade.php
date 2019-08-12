<!-- Wishlist Table-->
<div class="table-responsive wishlist-table margin-bottom-none">

    {{-- @if(count($frontend_account_details->wishlists_details) > 0) --}}
        <table class="table">
            <thead>
                <tr>
                    <th>{{ trans('frontend.frontend_my_saved_items') }}</th>
                    {{-- <th class="text-center"><a class="btn btn-sm btn-outline-danger" href="#">Clear Wishlist</a></th> --}}
                </tr>
            </thead>
            
                <tbody>
                    @foreach($frontend_account_details->wishlists_details as $items)
                    <tr>
                        <td>
                            <div class="product-item">
                                @if(get_product_image($items) && get_product_image($items) != '/images/no-image.png')
                                    <a class="product-thumb" href="{{ route('details-page', get_product_slug($items)) }}" target="_blank"><img src="{{ get_image_url(get_product_image($items)) }}" alt=""></a>
                                @else
                                    <a class="product-thumb" href="{{ route('details-page', get_product_slug($items)) }}" target="_blank"><img src="{{ default_placeholder_img_src() }}" alt=""></a>
                                @endif
                                
                                <div class="product-info">
                                    <h4 class="product-title"><a href="{{ route('details-page', get_product_slug($items)) }}">{!! get_product_title($items) !!}</a></h4>
                                    <div class="text-lg text-medium text-muted">{!! price_html(get_product_price($items), get_frontend_selected_currency()) !!}</div>
                                    <div>{{ trans('frontend.availability') }}:
                                        <div class="d-inline text-success">{!! get_product_availability($items) !!}</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="text-center"><a class="delete_item_from_wishlist" href="" data-id="{{ $items }}" data-toggle="tooltip" title="Remove item"><i class="icon-cross"></i></a></td>
                    </tr>
                    @endforeach
                
                
                </tbody>
            
        </table>


    {{-- @else
        <p class="not-available">{!! trans('frontend.my_saved_items_empty') !!}</p>
    @endif --}}

</div>
