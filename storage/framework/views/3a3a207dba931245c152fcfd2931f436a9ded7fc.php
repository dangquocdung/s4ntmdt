<!-- Footer Section Start -->
<div class="footer-section section bg-ivory">
   
    <!-- Footer Top Section Start -->
    <div class="footer-top-section section pt-90 pb-50">
        <div class="container">
           
            <!-- Footer Widget Start -->
            <div class="row">
                <div class="col mb-90">
                    <div class="footer-widget text-center">
                        <div class="footer-logo">
                            <img src="assets/images/logo.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                            <img class="theme-dark" src="assets/images/logo-light.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template">
                        </div>
                        <p>Electronics product actual teachings of  he great explorer of the truth, the malder of human happiness. No one rejects</p>
                    </div>
                </div>
            </div><!-- Footer Widget End -->
            
            <div class="row">
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">CONTACT INFO</h4>
                        
                        <p class="contact-info">
                            <span>Address</span>
                            You address will be here <br>
                             Lorem Ipsum text                        </p>
                        
                        <p class="contact-info">
                            <span>Phone</span>
                            <a href="tel:01234567890">01234 567 890</a>
                            <a href="tel:01234567891">01234 567 891</a>
                        </p>
                        
                        <p class="contact-info">
                            <span>Web</span>
                            <a href="mailto:info@example.com">info@example.com</a>
                            <a href="#">www.example.com</a>
                        </p>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">CUSTOMER CARE</h4>
                        
                        <ul class="link-widget">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Cart</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">blog</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">INFORMATION</h4>
                        
                        <ul class="link-widget">
                            <li><a href="#">Track your order</a></li>
                            <li><a href="#">Locate Store</a></li>
                            <li><a href="#">Online Support</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Payment</a></li>
                            <li><a href="#">Shipping & Returns</a></li>
                            <li><a href="#">Gift coupon</a></li>
                            <li><a href="#">Special coupon</a></li>
                        </ul>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">LATEST TWEET</h4>
                        
                        <div class="footer-tweet"></div>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
            </div>
            
        </div>
    </div><!-- Footer Bottom Section Start -->
   
    <!-- Footer Bottom Section Start -->
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row">
                
                <!-- Footer Copyright -->
                <div class="col-lg-6 col-12">
                    <div class="footer-copyright"><p>&copy; Copyright, 2019 All Rights Reserved by <a href="http://www.dungthinh.com/">Dung Thinh software</a></p></div>
                </div>
                
                <!-- Footer Payment Support -->
                <div class="col-lg-6 col-12">
                    <div class="footer-payments-image"><img src="assets/images/payment-support.png" alt="Payment Support Image"></div>
                </div>
                
            </div>
        </div>
    </div><!-- Footer Bottom Section Start -->
    
</div><!-- Footer Section End -->

<!-- Popup Subscribe Section Start -->
<div class="popup-subscribe-section section bg-gray pt-55 pb-55" data-modal="popup-modal">
   
    <!-- Popup Subscribe Wrap Start -->
    <div class="popup-subscribe-wrap">
        
        <button class="close-popup">X</button>
       
        <!-- Popup Subscribe Banner -->
        <div class="popup-subscribe-banner banner">
            <a href="#"><img src="assets/images/banner/banner-7.jpg" alt="Banner"></a>
        </div>

        <!-- Popup Subscribe Form Wrap Start -->
        <div class="popup-subscribe-form-wrap">
            
            <h1>SUBSCRIBE <br>OUR NEWSLETTER</h1>
            <h4>Get latest product update...</h4>
           
            <!-- Newsletter Form -->
            <form action="#" method="post" class="popup-subscribe-form validate" target="_blank" novalidate>
                <div id="mc_embed_signup_scroll">
                    <label for="popup_subscribe" class="d-none"><?php echo string_decode($subscriptions_data['popup_content']); ?></label>
                    <input type="email" value="" name="EMAIL" class="email" id="popup_subscribe" placeholder="<?php echo e(trans('frontend.enter_email_label')); ?>" required>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                    
                    <button type="button" id="subscribtion_submit" name="subscribe" class="button"><?php echo $subscriptions_data['subscribe_btn_text']; ?></button>
                </div>
            </form>
            
            
            <?php if($subscriptions_data['subscribe_popup_cookie_set_visibility'] == true): ?>
                <p>
                    <a href="#" class="set-popup-cookie">* <?php echo $subscriptions_data['subscribe_popup_cookie_set_text']; ?></a>
                </p>
            <?php endif; ?>
            
        </div><!-- Popup Subscribe Form Wrap End -->

    </div><!-- Popup Subscribe Wrap End -->
    
</div><!-- Popup Subscribe Section End -->