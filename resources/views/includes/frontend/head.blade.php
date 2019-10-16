    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Đặng Quốc Dũng">
    <!-- <base href="{{ asset('/') }}" /> -->
    <!-- SEO Meta Tags-->
    @if((Request::is('san-pham/chi-tiet/*') || Request::is('san-pham/tuy-chinh/*')) && !empty($single_product_details['meta_keywords']))
    <meta name="keywords" content="{{ $single_product_details['meta_keywords'] }}">
    @elseif( Request::is('tin-tuc/*') && !empty($blog_details_by_slug['meta_keywords']))
    <meta name="keywords" content="{{ $blog_details_by_slug['meta_keywords'] }}">
    @elseif((Request::is('gian-hang/chi-tiet/trang-chu/*') || Request::is('gian-hang/chi-tiet/san-pham/*') || Request::is('gian-hang/chi-tiet/danh-gia/*') || Request::is('gian-hang/chi-tiet/danh-muc/san-pham/*')) && !empty($store_seo_meta_keywords))
    <meta name="keywords" content="{{ $store_seo_meta_keywords }}">
    @elseif(!empty($seo_data) && $seo_data['meta_tag']['meta_keywords'])
    <meta name="keywords" content="{{ $seo_data['meta_tag']['meta_keywords']}}">
    @endif
    @if(!empty($seo_data) && $seo_data['meta_tag']['meta_description'])
    <meta name="description" content="{{ $seo_data['meta_tag']['meta_description'] }}">
    @endif
    @if((Request::is('san-pham/chi-tiet/*') || Request::is('san-pham/tuy-chinh/*')) && !empty($single_product_details['_product_seo_description']))
    <meta name="description" content="{{ $single_product_details['_product_seo_description'] }}">
    @endif

    @if((Request::is('san-pham/chi-tiet/*') || Request::is('san-pham/tuy-chinh/*')) && !empty($single_product_details['post_slug']))
    <link rel="canonical" href="{{ route('details-page', $single_product_details['post_slug']) }}">
    @endif
    @if(Request::is('tin-tuc/*') && !empty($blog_details_by_slug['blog_seo_description']))
    <meta name="description" content="{{ $blog_details_by_slug['blog_seo_description'] }}">
    @endif
    @if(Request::is('tin-tuc/*') && !empty($blog_details_by_slug['blog_seo_url']))
    <link rel="canonical" href="{{ route('blog-single-page', $blog_details_by_slug['blog_seo_url']) }}">
    @endif
    @if((Request::is('gian-hang/chi-tiet/trang-chu/*') || Request::is('gian-hang/chi-tiet/san-pham/*') || Request::is('gian-hang/chi-tiet/danh-gia/*') || Request::is('gian-hang/chi-tiet/danh-muc/san-pham/*')) && !empty($store_seo_meta_description))
    <meta name="description" content="{{ $store_seo_meta_description }}">
    @endif
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">

    <link rel="stylesheet" href="{{ URL::asset('/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/plugins/datatable/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/plugins/datatable/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/sweetalert/sweetalert.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/plugins/select2/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/dropzone/css/dropzone.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('/plugins/iCheck/square/purple.css') }}" />
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ URL::asset('/css/vendor.css') }}">

    @if(Request::is('/'))
        <!-- This core.css file contents all plugings css file. -->
        <link rel="stylesheet" href="/css/core.css">
    @endif

    <!-- Responsive css -->
    <link rel="stylesheet" href="/css/responsive.css">


    <!-- HTTRADE  Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="{{ mix('/css/styles.css') }}">


    <!-- Modernizr-->
    <script src="{{ URL::asset('/js/modernizr.min.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
