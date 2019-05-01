<meta charset="UTF-8">
<title>@yield('title')</title>
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

<!-- CSS
============================================ -->

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="/assets/css/bootstrap.min.css">

<!-- Icon Font CSS -->
<link rel="stylesheet" href="/assets/css/icon-font.min.css">

<!-- Plugins CSS -->
<link rel="stylesheet" href="/assets/css/plugins.css">

<!-- Main Style CSS -->
<link rel="stylesheet" href="/assets/css/style.css">

<!-- Modernizer JS -->
<script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>


<script type="text/javascript" src="{{ URL::asset('jquery/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('jquery/jquery-ui-1.11.4.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('dropzone/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bootstrap/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/datatable/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/select2/select2.full.min.js') }}"></script>

@if(Request::is('product/customize/*'))
<script type="text/javascript" src="{{ URL::asset('designer/fabric-1.5.0.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('designer/customiseControls.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('designer/fabric.curvedText.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('designer/jsPDF.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('designer/designer.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('designer/designerControl.js') }}"></script>
@endif

<script type="text/javascript" src="{{ URL::asset('designer/colorpicker/jscolor.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('designer/scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/ionslider/ion.rangeSlider.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/bootstrap-slider/bootstrap-slider.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/products-variation.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/products-add-to-cart.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/price-range.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('plugins/iCheck/icheck.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('modal/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/jquery.validate.js') }}"></script>


<script type="text/javascript" src="{{ URL::asset('templates-assets/footer/black-crazy/script.js') }}"></script>

<!--load header scripts-->
<script type="text/javascript" src="{{ URL::asset('templates-assets/header/'. $appearance_settings['header'] .'/script.js') }}"></script>

<!--load home scripts-->
<script type="text/javascript" src="{{ URL::asset('templates-assets/home/'. $appearance_settings['home'] .'/script.js') }}"></script>

<!--load blogs scripts-->
<script type="text/javascript" src="{{ URL::asset('templates-assets/blog/'. $appearance_settings['blogs'] .'/script.js') }}"></script>

<!--load products scripts-->
<script type="text/javascript" src="{{ URL::asset('templates-assets/product/'. $appearance_settings['products'] .'/script.js') }}"></script>

<!--load single products scripts-->
<script type="text/javascript" src="{{ URL::asset('templates-assets/single-product/'. $appearance_settings['single_product'] .'/script.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('templates-assets/single-product/'. $appearance_settings['single_product'] .'/jquery.elevatezoom.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('frontend/js/common.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/social-network.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('common/base64.js') }}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
