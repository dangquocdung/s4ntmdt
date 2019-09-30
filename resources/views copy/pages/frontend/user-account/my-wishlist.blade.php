@if(!empty($frontend_account_details) && $frontend_account_details->wishlists_details)

    <!-- Wishlist Table-->
    <div class="table-responsive wishlist-table mb-0">
        <table class="table">
            <thead>
            <tr>
                <th>{{ trans('frontend.my_saved_items') }}</th>
                <th class="text-center"><a class="btn btn-sm btn-outline-danger delete_all_item_from_wishlist" href="#">{{ trans('frontend.delete-all') }}</a></th>
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
                                <h4 class="product-title">
                                    <a href="{{ route('details-page', get_product_slug($items)) }}" target="_blank">{!! get_product_title($items) !!}</a>
                                </h4>
                                <div class="text-lg mb-1">{!! price_html(get_product_price($items), get_frontend_selected_currency()) !!}</div>
                                <div class="text-sm">Số lượng:
                                    <div class="d-inline text-success">{!! get_product_availability($items) !!}</div>
                                </div>
                            </div>
                        </div>
            
                    </td>
                    <td class="text-center">
                        <a class="remove-from-cart delete_item_from_wishlist" href="" data-id="{{ $items }}"><i class="icon-x"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <hr class="mb-4">
    <div class="custom-control custom-checkbox">
        <input class="custom-control-input" type="checkbox" id="inform_me" checked>
        <label class="custom-control-label" for="inform_me">Inform me when item from my wishlist is available</label>
    </div> --}}

@else
    <p>{{ trans('frontend.no_saved_items_yet_label') }}</p>
@endif
