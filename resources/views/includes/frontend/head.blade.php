    <meta charset="utf-8">

    <title>@yield('title')</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags-->
    @if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['meta_keywords']))
    <meta name="keywords" content="{{ $single_product_details['meta_keywords'] }}">

    @elseif( Request::is('blog/*') && !empty($blog_details_by_slug['meta_keywords']))
    <meta name="keywords" content="{{ $blog_details_by_slug['meta_keywords'] }}">

    @elseif((Request::is('store/details/home/*') || Request::is('store/details/products/*') || Request::is('store/details/reviews/*') || Request::is('store/details/cat/products/*')) && !empty($store_seo_meta_keywords))
    <meta name="keywords" content="{{ $store_seo_meta_keywords }}">

    @elseif(!empty($seo_data) && $seo_data['meta_tag']['meta_keywords'])
    <meta name="keywords" content="{{ $seo_data['meta_tag']['meta_keywords']}}">
    @endif

    @if(!empty($seo_data) && $seo_data['meta_tag']['meta_description'])
    <meta name="description" content="{{ $seo_data['meta_tag']['meta_description'] }}">
    @endif

    @if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['_product_seo_description']))
    <meta name="description" content="{{ $single_product_details['_product_seo_description'] }}">
    @endif

    @if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['post_slug']))
    <link rel="canonical" href="{{ route('details-page', $single_product_details['post_slug']) }}">
    @endif

    @if(Request::is('blog/*') && !empty($blog_details_by_slug['blog_seo_description']))
    <meta name="description" content="{{ $blog_details_by_slug['blog_seo_description'] }}">
    @endif

    @if(Request::is('blog/*') && !empty($blog_details_by_slug['blog_seo_url']))
    <link rel="canonical" href="{{ route('blog-single-page', $blog_details_by_slug['blog_seo_url']) }}">
    @endif

    @if((Request::is('store/details/home/*') || Request::is('store/details/products/*') || Request::is('store/details/reviews/*') || Request::is('store/details/cat/products/*')) && !empty($store_seo_meta_description))
    <meta name="description" content="{{ $store_seo_meta_description }}">
    @endif

    <meta name="author" content="Đặng Quốc Dũng">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">

    {{-- <link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ URL::asset('/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/plugins/datatable/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/plugins/datatable/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/sweetalert/sweetalert.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/plugins/select2/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/dropzone/css/dropzone.css') }}" />

    <!--load header style-->
    <link rel="stylesheet" href="{{ URL::asset('/templates-assets/header/'. $appearance_settings['header'] .'/style.css') }}" />

    <!--load home style-->
    <link rel="stylesheet" href="{{ URL::asset('/templates-assets/home/'. $appearance_settings['home'] .'/style.css') }}" />

    <!--load blogs style-->
    <link rel="stylesheet" href="{{ URL::asset('/templates-assets/blog/'. $appearance_settings['blogs'] .'/style.css') }}" />

    <!--load products style-->
    <link rel="stylesheet" href="{{ URL::asset('/templates-assets/product/'. $appearance_settings['products'] .'/style.css') }}" />

    <!--load single products style-->
    <link rel="stylesheet" href="{{ URL::asset('/templates-assets/single-product/'. $appearance_settings['single_product'] .'/style.css') }}" />


    
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="/css/vendor.min.css">
    <!-- Unishop Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{ mix('/css/styles.css') }}">


    <!-- Main Template Styles-->
    <script type="text/javascript" src="{{ URL::asset('/jquery/jquery-1.10.2.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/jquery/jquery-ui-1.11.4.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/dropzone/dropzone.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/bootstrap/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/select2/select2.full.min.js') }}"></script>


    <script type="text/javascript" src="{{ URL::asset('/designer/colorpicker/jscolor.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/ionslider/ion.rangeSlider.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/bootstrap-slider/bootstrap-slider.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/frontend/js/products-variation.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/frontend/js/products-add-to-cart.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/frontend/js/price-range.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/plugins/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/modal/js/modal.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/frontend/js/jquery.validate.js') }}"></script>

    <!--load header scripts-->
    <script type="text/javascript" src="{{ URL::asset('/templates-assets/header/'. $appearance_settings['header'] .'/script.js') }}"></script>

    <!--load home scripts-->
    <script type="text/javascript" src="{{ URL::asset('/templates-assets/home/'. $appearance_settings['home'] .'/script.js') }}"></script>

    <!--load blogs scripts-->
    <script type="text/javascript" src="{{ URL::asset('/templates-assets/blog/'. $appearance_settings['blogs'] .'/script.js') }}"></script>

    <!--load products scripts-->
    <script type="text/javascript" src="{{ URL::asset('/templates-assets/product/'. $appearance_settings['products'] .'/script.js') }}"></script>

    <!--load single products scripts-->
    <script type="text/javascript" src="{{ URL::asset('/templates-assets/single-product/'. $appearance_settings['single_product'] .'/script.js') }}"></script>
    {{-- <script type="text/javascript" src="{{ URL::asset('/templates-assets/single-product/'. $appearance_settings['single_product'] .'/jquery.elevatezoom.js') }}"></script> --}}


    <script type="text/javascript" src="{{ URL::asset('/frontend/js/common.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/frontend/js/social-network.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('/common/base64.js') }}"></script>
    

    
    
    <!-- Modernizr-->
    <script src="/js/modernizr.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
