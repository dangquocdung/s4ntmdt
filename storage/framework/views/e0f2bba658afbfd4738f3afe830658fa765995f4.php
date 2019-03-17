<?php $__env->startSection('title', trans('frontend.testimonials_details_page_title') .' < '. get_site_title() ); ?>

<?php $__env->startSection('content'); ?>
<div id="testimonial_details" class="container new-container">
  <div class="row">
    <div class="col-md-12">
      <div class="testimonials-list testimonials-design">
        <div class="quote first last ">
          <div class="testimonial-left">
            <div class="avatar-image">
              <?php if(!empty($testimonials_data_by_slug['testimonial_image_url'])): ?>
              <img src="<?php echo e(get_image_url($testimonials_data_by_slug['testimonial_image_url'])); ?>" class="circle" alt="" width="61" height="80">
              <?php else: ?>
              <img src="<?php echo e(default_placeholder_img_src()); ?>" class="circle" alt="" width="61" height="80">
              <?php endif; ?>
            </div>
          </div>
          <div class="testimonial-content">
            <i class="fa fa-quote-left"></i>
            <?php if(!empty($testimonials_data_by_slug['post_title'])): ?>
            <h4><?php echo $testimonials_data_by_slug['post_title']; ?></h4>
            <?php endif; ?>
            
            <div class="testimonials-text">
            <?php if(!empty($testimonials_data_by_slug['post_content'])): ?>   
            <div class="testimonials-desc"><?php echo string_decode($testimonials_data_by_slug['post_content']); ?></div>
            <?php endif; ?>
            </div>
          </div>
          <?php if(!empty($testimonials_data_by_slug['testimonial_client_name'])): ?>  
          <div class="testimonial-author"><strong><?php echo $testimonials_data_by_slug['testimonial_client_name']; ?></strong></div>
          <?php endif; ?>
          
          <?php if(!empty($testimonials_data_by_slug['testimonial_job_title']) && !empty($testimonials_data_by_slug['testimonial_company_name']) ): ?>
          <div class="testimonial-job"><?php echo $testimonials_data_by_slug['testimonial_job_title']; ?> / <a href="//<?php echo e($testimonials_data_by_slug['testimonial_url']); ?>" target="_blank"><?php echo $testimonials_data_by_slug['testimonial_company_name']; ?></a></div>
          <?php endif; ?>
        </div> 
      </div>
    </div>
    
    <?php if(count($testimonials_data) > 0): ?>
    <div class="col-md-12">
      <div class="testimonials-slider">
        <div class="content-title">
          <h2 class="text-center title-under"><?php echo trans('frontend.testimonials_more_title'); ?></h2>
        </div>

        <div id="slider-carousel-testimonials" class="carousel slide" data-ride="carousel">
          <?php $numb = 1; ?>
          <div class="carousel-inner">
          <?php $__currentLoopData = $testimonials_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($numb == 1): ?>
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-5 ml-auto">
                        <div class="testimonials-img text-right">
                          <?php if($row['testimonial_image_url']): ?>
                          <img src="<?php echo e(get_image_url($row['testimonial_image_url'])); ?>" alt="" width="170" height="169">
                          <?php else: ?>
                          <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="" width="170" height="169">
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-5 mr-auto">
                        <div class="testimonials-text">
                          <h2><?php echo $row['post_title']; ?></h2>
                          <p><?php echo get_limit_string(string_decode($row['post_content']), 200); ?></p>
                          <a href="<?php echo e(route('testimonial-single-page', $row['post_slug'])); ?>" class="btn btn-sm testimonials-read"><?php echo trans('frontend.read_more_label'); ?></a>
                        </div>
                      </div>
                    </div>      
                  </div>
                </div>
              </div>
            <?php else: ?>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-5 ml-auto">
                        <div class="testimonials-img text-right">
                          <?php if($row['testimonial_image_url']): ?>
                          <img src="<?php echo e(get_image_url($row['testimonial_image_url'])); ?>" alt="" width="170" height="169">
                          <?php else: ?>
                          <img src="<?php echo e(default_placeholder_img_src()); ?>" alt="" width="170" height="169">
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-12 col-md-5 mr-auto">
                        <div class="testimonials-text">
                          <h2><?php echo $row['post_title']; ?></h2>
                          <p><?php echo get_limit_string(string_decode($row['post_content']), 200); ?></p>
                          <a href="<?php echo e(route('testimonial-single-page', $row['post_slug'])); ?>" class="btn btn-sm testimonials-read"><?php echo trans('frontend.read_more_label'); ?></a>
                        </div>
                      </div>
                    </div>      
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php $numb++ ; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          
          <?php if(count($testimonials_data) > 1): ?>
          <div class="slider-control-main text-center">
            <div class="prev-btn">
              <a href="#slider-carousel-testimonials" class="control-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
            </div>

            <div class="next-btn">
              <a href="#slider-carousel-testimonials" class="control-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</div>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts.frontend.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>