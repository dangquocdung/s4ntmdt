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

                                        @if (count($cat['children'])>0)

                                        <i class="zmdi zmdi-chevron-right"></i>

                                        @endif

                                    </a>

                                    @if (count($cat['children'])>0)

                                        <div class="category-menu-dropdown">

                                            @if (count($cat['children']) < 7)

                                                <div class="category-common">
                                                    <h4 class="categories-subtitle"> {!! $cat['name'] !!} </h4>
                                                    <ul>
                                                        @foreach($cat['children'] as $data)

                                                        <li>
                                                            <a href="{{ route('categories-page', $data['slug']) }}"> 
                                                                @if( !empty($data['img_url']) )
                                                                    <img src="{{ get_image_url($data['img_url']) }}"> 
                                                                @else
                                                                    <img src="{{ default_placeholder_img_src() }}"> 
                                                                @endif
                        
                                                                {!! $data['name'] !!} </a>
                                                        </li>

                                                        @endforeach
                                                    </ul>
                                                </div>  

                                                <div class="category-menu-dropdown-right">
                                                    <div class="menu-right-img">
                                                            <a href="{{ route('categories-page', $cat['slug']) }}">
                                                                @if( !empty($cat['img_url']) )
                                                                    <img src="{{ get_image_url($cat['img_url']) }}"> 
                                                                @else
                                                                    <img src="{{ default_placeholder_img_src() }}"> 
                                                                @endif
                        
                                                            </a>
                                                    </div>
                                                </div>
                                            
                                            @else

                                            <?php

                                                $n = count($cat['children']);
                                                $m= $n/2;

                                            ?>

                                                <div class="category-common">
                                                    <h4 class="categories-subtitle"> {!! $cat['name'] !!} </h4>
                                                    <ul>
                                                        @foreach($cat['children'] as $data)
                                                        @if ($loop->iteration <= $m)

                                                        <li>
                                                            <a href="{{ route('categories-page', $data['slug']) }}"> 
                                                                @if( !empty($data['img_url']) )
                                                                    <img src="{{ get_image_url($data['img_url']) }}"> 
                                                                @else
                                                                    <img src="{{ default_placeholder_img_src() }}"> 
                                                                @endif
                        
                                                                {!! $data['name'] !!} </a>
                                                        </li>
                                                        @endif

                                                        @endforeach
                                                    </ul>
                                                </div>  

                                                <div class="category-common">
                                                    <h4 class="categories-subtitle"> {!! $cat['name'] !!} </h4>
                                                    <ul>
                                                        @foreach($cat['children'] as $data)
                                                        @if ($loop->iteration > $m)

                                                        <li>
                                                            <a href="{{ route('categories-page', $data['slug']) }}"> 
                                                                @if( !empty($data['img_url']) )
                                                                    <img src="{{ get_image_url($data['img_url']) }}"> 
                                                                @else
                                                                    <img src="{{ default_placeholder_img_src() }}"> 
                                                                @endif
                        
                                                                {!! $data['name'] !!} </a>
                                                        </li>
                                                        @endif

                                                        @endforeach
                                                    </ul>
                                                </div>  

                                            @endif

                                        </div>

                                    @endif
                                </li>

                                @endforeach
                            </ul>
                        </div>

                        @endif
                    </div>
                </div>
    
            <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12">

                @if($appearance_all_data['header_details']['slider_visibility'] == true && Request::is('/'))
  
                <!-- Start Slider Area -->
                <div class="owl-carousel" data-owl-carousel='{ "autoplay": true, "loop": true }'>
                    @foreach(get_appearance_header_settings_data() as $img)

                    @if($img->img_url)
                        <img src="{{ get_image_url($img->img_url) }}" alt="Sản phẩm nổi bật" />
                    @endif

                    @endforeach

                </div>

                @endif

                <!-- Start Slider Area -->
            </div>
            <!-- End Left Feature -->
        </div>
    </div>
</section>
<!-- End Feature Product -->

@stop