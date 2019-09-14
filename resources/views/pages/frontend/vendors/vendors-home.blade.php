@section('vendors-home-page-content')

<!-- Featured Products-->
<section class="container padding-bottom-2x mb-2">
  <h2 class="h3 pb-3 text-center">{!! trans('frontend.shop_by_cat_label') !!}</h2>

  @if(count($vendor_home_page_cats) > 0)  
    <div class="row">

   
          @foreach($vendor_home_page_cats as $cats)
          <div>
            <div class="vendor-category-content clearfix">
              <div class="vendor-category-name">
                <h2>{!! $cats['parent_cat']['name'] !!} <span class="responsive-accordian"></span></h2>
                <div class="vendor-categories-list">
                  @if(count($cats['child_cat']) > 0)  
                    <ul>
                      @foreach($cats['child_cat'] as $child_cat)
                      <li><a href="{{ route('store-products-cat-page-content', array($child_cat['slug'], $vendor_info->name)) }}">{!! $child_cat['name'] !!}</a></li>
                      @endforeach
                    </ul>
                  @endif
                </div>
              </div>
              <div class="vendor-category-image">
                @if(!empty(get_image_url($cats['parent_cat']['category_img_url'])))
                  <img class="img-fluid" src="{{ get_image_url($cats['parent_cat']['category_img_url']) }}">
                @else
                  <img class="img-fluid" src="{{ default_placeholder_img_src() }}">
                @endif
              </div>
            </div>
          </div>
          @endforeach
      </div>

  @else

    {!! trans('frontend.product_not_available') !!}

  @endif

</section>

@endsection