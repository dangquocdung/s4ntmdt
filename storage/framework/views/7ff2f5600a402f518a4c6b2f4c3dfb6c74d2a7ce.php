<meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?>
    </title>
    <!-- SEO Meta Tags-->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <?php if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['meta_keywords'])): ?>
    <meta name="keywords" content="<?php echo e($single_product_details['meta_keywords']); ?>">

    <?php elseif( Request::is('blog/*') && !empty($blog_details_by_slug['meta_keywords'])): ?>
    <meta name="keywords" content="<?php echo e($blog_details_by_slug['meta_keywords']); ?>">

    <?php elseif((Request::is('store/details/home/*') || Request::is('store/details/products/*') || Request::is('store/details/reviews/*') || Request::is('store/details/cat/products/*')) && !empty($store_seo_meta_keywords)): ?>
    <meta name="keywords" content="<?php echo e($store_seo_meta_keywords); ?>">

    <?php elseif(!empty($seo_data) && $seo_data['meta_tag']['meta_keywords']): ?>
    <meta name="keywords" content="<?php echo e($seo_data['meta_tag']['meta_keywords']); ?>">
    <?php endif; ?>

    <?php if(!empty($seo_data) && $seo_data['meta_tag']['meta_description']): ?>
    <meta name="description" content="<?php echo e($seo_data['meta_tag']['meta_description']); ?>">
    <?php endif; ?>

    <?php if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['_product_seo_description'])): ?>
    <meta name="description" content="<?php echo e($single_product_details['_product_seo_description']); ?>">
    <?php endif; ?>

    <?php if((Request::is('product/details/*') || Request::is('product/customize/*')) && !empty($single_product_details['post_slug'])): ?>
    <link rel="canonical" href="<?php echo e(route('details-page', $single_product_details['post_slug'])); ?>">
    <?php endif; ?>

    <?php if(Request::is('blog/*') && !empty($blog_details_by_slug['blog_seo_description'])): ?>
    <meta name="description" content="<?php echo e($blog_details_by_slug['blog_seo_description']); ?>">
    <?php endif; ?>

    <?php if(Request::is('blog/*') && !empty($blog_details_by_slug['blog_seo_url'])): ?>
    <link rel="canonical" href="<?php echo e(route('blog-single-page', $blog_details_by_slug['blog_seo_url'])); ?>">
    <?php endif; ?>

    <?php if((Request::is('store/details/home/*') || Request::is('store/details/products/*') || Request::is('store/details/reviews/*') || Request::is('store/details/cat/products/*')) && !empty($store_seo_meta_description)): ?>
    <meta name="description" content="<?php echo e($store_seo_meta_description); ?>">
    <?php endif; ?>

    <meta name="author" content="Dang Quoc Dung">
    <!-- Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon and Apple Icons-->
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="apple-touch-icon" href="touch-icon-iphone.png">
    <link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
    <!-- Vendor Styles including: Bootstrap, Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="css/vendor.min.css">
    <!-- Main Template Styles-->
    <link id="mainStyles" rel="stylesheet" media="screen" href="css/styles.min.css">
    <!-- Modernizr-->
    <script src="js/modernizr.min.js"></script>