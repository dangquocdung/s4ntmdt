<div id="header_content">
  <div class="header-content-top">
    <div class="container">
        <div class="row">
          <div class="col-5 col-md-6">
            <div class="currency-lang">
              <div class="dropdown change-multi-currency">
                <?php if(get_frontend_selected_currency()): ?>
                <a class="dropdown-toggle" href="#" data-hover="dropdown" data-toggle="dropdown">
                  <span class="d-none d-md-inline"><?php echo get_currency_name_by_code( get_frontend_selected_currency() ); ?></span>
                  <span class="d-md-none d-xs-inline  fa fa-money money-icon"></span>
                  <?php if(count(get_frontend_selected_currency_data()) >0): ?>
                  <span class="caret"></span>
                  <?php endif; ?>
                </a>
                <?php endif; ?>
                <div class="dropdown-content">
                  <?php if(count(get_frontend_selected_currency_data()) >0): ?>
                    <?php $__currentLoopData = get_frontend_selected_currency_data(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a href="#" data-currency_name="<?php echo e($val); ?>"><?php echo get_currency_name_by_code( $val ); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php endif; ?>
                </div>
              </div>

              <div class="dropdown language-list">
                <?php if(count(get_frontend_selected_languages_data()) > 0): ?>
                  <?php if(get_frontend_selected_languages_data()['lang_code'] == 'en'): ?>
                    <a class="dropdown-toggle" href="#" data-hover="dropdown" data-toggle="dropdown">
                      <img src="<?php echo e(asset('public/images/'. get_frontend_selected_languages_data()['lang_sample_img'])); ?>" alt="lang"> <span class="d-none d-md-inline"> &nbsp; <?php echo get_frontend_selected_languages_data()['lang_name']; ?></span> <span class="caret"></span>
                    </a>
                  <?php else: ?>
                    <a class="dropdown-toggle" href="#" data-hover="dropdown" data-toggle="dropdown">
                      <img src="<?php echo e(get_image_url(get_frontend_selected_languages_data()['lang_sample_img'])); ?>" alt="lang"> <span class="d-none d-md-inline"> &nbsp; <?php echo get_frontend_selected_languages_data()['lang_name']; ?></span> <span class="caret"></span>
                    </a>
                  <?php endif; ?>
                <?php endif; ?>
                <?php $available_lang = get_available_languages_data_frontend();?>  

                <?php if(is_array($available_lang) && count($available_lang) >0): ?>
                  <div class="dropdown-content">
                    <?php $__currentLoopData = get_available_languages_data_frontend(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($val['lang_code'] == 'en'): ?>
                        <a href="#" data-lang_name="<?php echo e($val['lang_code']); ?>"><img src="<?php echo e(asset('public/images/'. $val['lang_sample_img'])); ?>" alt="lang"> &nbsp;<?php echo ucwords($val['lang_name']); ?></a>
                      <?php else: ?>
                        <a href="#" data-lang_name="<?php echo e($val['lang_code']); ?>"><img src="<?php echo e(get_image_url($val['lang_sample_img'])); ?>" alt="lang"> &nbsp;<?php echo ucwords($val['lang_name']); ?></a>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
            
          <div class="col-7 col-md-6">
            <div class="float-right">
              <ul class="right-menu top-right-menu">
                <li class="wishlist-content">
                  <a class="main" href="<?php echo e(route('my-saved-items-page')); ?>">
                    <i class="fa fa-heart"></i> 
                    <span class="d-none d-md-inline"><?php echo trans('frontend.frontend_wishlist'); ?></span> 
                  </a>    
                </li>  

                <li class="users-vendors-login dropdown"><a href="#" class="main selected dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i class="fa fa-user" aria-hidden="true"></i> <span class="d-none d-md-inline"><?php echo trans('frontend.menu_my_account'); ?></span><span class="caret"></span></a>
                  <div class="new-dropdown-menu dropdown-content my-account-menu">
                    <?php if(Session::has('shopist_frontend_user_id')): ?>
                    <a href="<?php echo e(route('user-account-page')); ?>"><?php echo trans('frontend.user_account_label'); ?></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('user-login-page')); ?>"><?php echo trans('frontend.frontend_user_login'); ?></a>
                    <?php endif; ?>

                    <?php if(Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor'): ?>
                     <a target="_blank" href="<?php echo e(route('admin.dashboard')); ?>"><?php echo trans('frontend.vendor_account_label'); ?></a>
                    <?php else: ?>
                     <a target="_blank" href="<?php echo e(route('admin.login')); ?>"><?php echo trans('frontend.frontend_vendor_login'); ?></a>
                    <?php endif; ?>

                    <a href="<?php echo e(route('vendor-registration-page')); ?>"><?php echo trans('frontend.vendor_registration'); ?></a>
                  </div>
                </li>

                <li class="mini-cart-content">
                  <?php echo $__env->make('pages.ajax-pages.mini-cart-html2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </li>
              </ul>
            </div> 
          </div>   
        </div>
    </div>
  </div>
  <div class="header-content-middle">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php if(get_site_logo_image()): ?>
            <div class="logo text-center"><img src="<?php echo e(get_site_logo_image()); ?>" title="<?php echo e(trans('frontend.your_store_label')); ?>" alt="<?php echo e(trans('frontend.your_store_label')); ?>"></div>
          <?php endif; ?>
        </div>  
      </div>
      <div class="row">
        <div class="col text-center search-and-compare-item">
          <div class="terms-search-option">  
            <form id="search_option" action="<?php echo e(route('shop-page')); ?>" method="get">
              <div class="input-group">
                <input type="text" id="srch_term" name="srch_term" class="form-control" placeholder="<?php echo e(trans('frontend.search_for_label')); ?>">
                <span class="input-group-btn">
                  <button id="btn-search" type="submit" class="btn btn-light search-btn">
                    <span class="fa fa-search"></span>
                  </button>
                </span>
              </div>
            </form>
          </div>
          <div class="items-compare-list"><a href="<?php echo e(route('product-comparison-page')); ?>" class="btn btn-light btn-compare"><i class="fa fa-exchange"></i> <span class="d-none d-lg-inline"> &nbsp; <?php echo trans('frontend.compare_label'); ?></span> <span class="compare-value"> (<?php echo $total_compare_item;?>)</span></a></div>  
        </div>  
      </div>  
    </div>
  </div> 
  <div class="header-content-menu">
    <div id="sticky_nav">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="navbar navbar-expand-lg navbar-dark nav-main" id="navbar">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-menu-small"><?php echo trans('frontend.menu_label'); ?></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto nav-list-main">
              <?php echo $dynamic_menu; ?>  
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    </div>       
  </div>  
    
  <?php if($appearance_all_data['header_details']['slider_visibility'] == true && Request::is('/')): ?>
  <?php $count = count(get_appearance_header_settings_data());?>
  <?php if($count > 0): ?>
  <div class="header-with-slider">
    <div id="slider_carousel" class="carousel slide" data-ride="carousel">
      <a class="carousel-control-prev" href="#slider_carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slider_carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <?php $numb = 1; ?>
      <div class="carousel-inner">
        <?php $__currentLoopData = get_appearance_header_settings_data(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($numb == 1): ?>
            <div class="carousel-item active">
              <?php if($img->img_url): ?>
                <img src="<?php echo e(get_image_url($img->img_url)); ?>" class="d-block w-100" alt="" />
              <?php endif; ?>
            </div>
          <?php else: ?>
            <div class="carousel-item">
              <?php if($img->img_url): ?>
                <img src="<?php echo e(get_image_url($img->img_url)); ?>" class="d-block w-100" alt="" />
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php $numb++ ; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
  </div>
  <?php else: ?>
  <div class="header-with-slider">
    <div id="slider_carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo e(asset('public/images/sunglass.jpg')); ?>" class="d-block w-100" alt="" />
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
<?php endif; ?>  
</div>