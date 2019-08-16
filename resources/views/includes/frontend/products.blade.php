@if($all_products_details['products']->count() > 0)


  @if($all_products_details['selected_view'] == 'grid')
    @foreach($all_products_details['products'] as $products)
      <?php 
      $reviews          = get_comments_rating_details($products->id, 'product');
      $reviews_settings = get_reviews_settings_data($products->id);
      ?>
      <!-- Product-->
      <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
        <div class="product-card">
          <div class="product-badge text-danger">50% Off</div><a class="product-thumb" href="shop-single.html"><img src="img/shop/products/01.jpg" alt="Product"></a>
          <h3 class="product-title"><a href="shop-single.html">Unionbay Park</a></h3>
          <h4 class="product-price">
            <del>$99.99</del>$49.99
          </h4>
          <div class="product-buttons">
            <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="icon-heart"></i></button>
            <button class="btn btn-outline-primary btn-sm" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
          </div>
        </div>
      </div>
    @endforeach
  @endif
@else
  <p class="not-available">{!! trans('frontend.product_not_available') !!}</p>
@endif
    