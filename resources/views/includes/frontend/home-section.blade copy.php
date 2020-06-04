<!-- Start Feature Product -->
<section class="categories-slider-area bg__white">
    <div class="container">
        <div class="row">
            <!-- Start Left Feature -->
            <div class="col-md-4 col-lg-3 col-sm-12 padding-top-1x">
                <div class="">
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
            <div class="col-md-8 col-lg-9 col-sm-12 padding-top-1x">
                @if(!empty($slide_list) > 0)
                <!-- Start Slider Area -->
                <div class="owl-carousel" data-owl-carousel='{ "autoplay": true, "loop": true }'>
                    @foreach($slide_list as $img)

                        @if(!empty($img->img_url))
                            <a href="{{ $img->url }}" target="_blank">
                                <img src="{{ get_image_url($img->img_url) }}" alt="{{ $img->name }}" />
                            </a>
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
