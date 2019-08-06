<meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- SEO Meta Tags-->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

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

    <meta name="author" content="Dang Quoc Dung">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <base href="{{asset('')}}">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="/css/vendor.min.css">

    {{-- <link rel="stylesheet" media="screen" href="/css/vendor-3.min.css"> --}}

    <!-- Main Template Styles-->
    {{-- <link id="mainStyles" rel="stylesheet" media="screen" href="/css/styles.min.css"> --}}

    <!-- Custom Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="/css/app.css">

    <!-- Modernizr-->
    <script src="js/modernizr.min.js"></script>