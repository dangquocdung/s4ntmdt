<footer class="site-footer" style="background-image: url(/img/footer-bg.png);">

<div class="container">
    <div class="row">
        <div class="col-6">
            <!-- Categories-->
            <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">Danh mục sản phẩm</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                        @foreach($productCategoriesTree as $cat)
                            @if ($loop->iteration < 6)
                            <li>
                                <a href="{{ route('categories-page', $cat['slug']) }}">{!! $cat['name'] !!}</a>
                            </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                        @foreach($productCategoriesTree as $cat)
                            @if ($loop->iteration >= 6)
                            <li>
                                <a href="{{ route('categories-page', $cat['slug']) }}">{!! $cat['name'] !!}</a>
                            </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        @if(count($pages_list) > 0)

        <div class="col-6">
            <!-- Categories-->
            <section class="widget widget-links widget-light-skin">
                <h3 class="widget-title">Hỗ trợ khách hàng</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                        @foreach($pages_list as $pages)
                            @if ($loop->iteration < 6)
                                <li> <a href="{{ route('custom-page-content', $pages['post_slug']) }}">{!! $pages['post_title'] !!}</a></li>
                            @endif

                        @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                        @foreach($pages_list as $pages)
                            @if ($loop->iteration >= 6)
                                <li> <a href="{{ route('custom-page-content', $pages['post_slug']) }}">{!! $pages['post_title'] !!}</a></li>
                            @endif
                        @endforeach
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        @endif

    </div>
    {{-- <hr class="hr-light mt-2 margin-bottom-2x hidden-md-down"> --}}
    <div class="row">
        <div class="col-6">
            <!-- Contact Info-->
            <section class="widget widget-light-skin">

                <h3 class="widget-title">Thông tin liên hệ</h3>
                <p class="text-white"><em>* Phiên bản Sàn GDTMĐT đang chạy thử nghiệm. Mọi chi tiết và yêu cầu hỗ trợ vui lòng liên hệ với ban quản trị.</em></p>
                <p class="text-white">Điện thoại: +84 (098) 624 2487</p>
                <ul class="list-unstyled text-sm text-white">
                <li><span class="opacity-50">Thứ 2 - Thứ 6:&nbsp;</span>9.00 am - 8.00 pm</li>
                <li><span class="opacity-50">Thứ 7:&nbsp;</span>10.00 am - 6.00 pm</li>
                </ul>
                <p><a class="navi-link-light" href="mailto:hotro@hatinhtrade.com.vn">hotro@hatinhtrade.com.vn</a></p>
                <a class="social-button shape-circle sb-facebook sb-light-skin" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['fb'] }}"><i class="socicon-facebook"></i></a>
                <a class="social-button shape-circle sb-twitter sb-light-skin" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['twitter'] }}"><i class="socicon-twitter"></i></a>
                <a class="social-button shape-circle sb-instagram sb-light-skin" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['instagram'] }}"><i class="socicon-instagram"></i></a>
                <a class="social-button shape-circle sb-google-plus sb-light-skin" href="//{{ $appearance_all_data['footer_details']['follow_us_url']['youtube'] }}"><i class="socicon-youtube"></i></a>
            </section>
        </div>
        <div class="col-6">
            <!-- Subscription-->
            <section class="widget widget-light-skin">
                <h3 class="widget-title">Nhận thông báo</h3>
                <form class="row" action="#" method="post" target="_blank" novalidate>
                <div class="col-sm-9">
                    <div class="input-group input-light">
                        <input class="form-control" type="email" id="subscribe_options_email"  placeholder="{{ trans('frontend.enter_email_label') }}" />
                        <span class="input-group-addon"><i class="icon-mail"></i></span>
                    </div>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;" aria-hidden="true">
                        <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                    </div>
                    <p class="form-text text-sm text-white opacity-50 pt-2">
                        Đăng ký nhận bản tin của chúng tôi. Đừng bỏ lỡ hàng ngàn sản phẩm và chương trình siêu hấp dẫn.
                    </p>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary btn-block mt-0" id="subscribtion_submit" type="button">Đăng kí</button>
                </div>
                </form>
                <h3 class="widget-title">Ứng dụng di động</h3>
                <a class="market-button apple-button mb-light-skin" href="javascript:void(0)">
                    <span class="mb-subtitle">Tải về trên</span>
                    <span class="mb-title">App Store</span>
                </a>
                <a class="market-button google-button mb-light-skin" href="javascript:void(0)">
                    <span class="mb-subtitle">Tải về trên</span>
                    <span class="mb-title">Google Play</span>
                </a>

            </section>
        </div>
    </div>
</div>
</footer>