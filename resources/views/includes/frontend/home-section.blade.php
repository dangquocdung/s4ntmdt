@section('categories-slider-area')
<!-- Start Feature Product -->
<section class="categories-slider-area bg__white  padding-top-1x">
    <div class="container">
        <div class="row">
            <!-- Start Left Feature -->
            <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12" id="categories-menu">
                    <div class="categories-menu mrg-xs">
                        <div class="category-heading">
                            <h3>{{ trans('frontend.product_categories_label') }}</h3>
                        </div>
                        @if(count($productCategoriesTree) > 0)

                        <div class="category-menu-list">
                            <ul>
                                @foreach($productCategoriesTree as $cat)
                          
                                <li>
                                    <a href="{{ route('categories-page', $cat['slug']) }}">
                                        @if( !empty($cat['img_url']) )
                                        <img src="{{ get_image_url($cat['img_url']) }}"> 
                                      @else
                                        <img src="{{ default_placeholder_img_src() }}"> 
                                      @endif
                                      {!! $cat['name'] !!} 

                                      <i class="zmdi zmdi-chevron-right"></i>

                                    </a>
                                    
                                    <div class="category-menu-dropdown">
                                        
                                        <div class="category-common">
                                            <h4 class="categories-subtitle"> Jewelry & Watches</h4>
                                            <ul>
                                                <li><a href="#"> Men’s Clothing</a></li>
                                                <li><a href="#"> Computer & Office</a></li>
                                                <li><a href="#"> Jewelry & Watches</a></li>
                                                <li><a href="#"> Bags & Shoes</a></li>
                                                <li><a href="#"> Phones & Accessories</a></li>
                                            </ul>
                                        </div>
                                        
                                    </div>
                                </li>

                                @endforeach
                            </ul>
                        </div>

                        @endif
                    </div>
                </div>
    
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12">
                <!-- Start Slider Area -->
                <div class="owl-carousel dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true }">
                    <img src="/img/components/img16.jpg" alt="Image">
                    <img src="/img/components/img01.jpg" alt="Image">
                    <img src="/img/components/img17.jpg" alt="Image">
                </div>
                <!-- Start Slider Area -->
            </div>
            <!-- End Left Feature -->
        </div>
    </div>
</section>
<!-- End Feature Product -->

@stop