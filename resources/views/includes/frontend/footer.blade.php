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
        <div class="col-md-4">
            <!-- Contact Info-->
            <section class="widget widget-light-skin">

                <h3 class="widget-title">Thông tin liên hệ</h3>
                <p class="text-white">MST/ĐKKD/QĐTL: Số 1889/QĐ-UBND</p>
                <p class="text-white">Cơ quan chủ quản: Sở Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng H&agrave; Tĩnh</p>
                <p class="text-white">Cơ quan quản trị: Trung t&acirc;m C&ocirc;ng nghệ th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng H&agrave; Tĩnh</p>
                <p class="text-white">Địa chỉ: Số 18, đường 26/3, th&agrave;nh phố H&agrave; Tĩnh, tỉnh H&agrave; Tĩnh</p>
                <p class="text-white">Điện thoại: 0239&nbsp;895589. Fax: 0239&nbsp;853962. Hotline: 0916334566, Email:<a href="mailto:ttcntt-tt@hatinh.gov.vn">ttcntt-tt@hatinh.gov.vn</a></p>
                <p class="text-white"><em>* Phiên bản Sàn GDTMĐT đang chạy thử nghiệm. Mọi chi tiết và yêu cầu hỗ trợ vui lòng liên hệ với ban quản trị.</em></p>
            </section>
        </div>
        <div class="col-md-4">
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
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary btn-block mt-0" id="subscribtion_submit" type="button">Đăng kí</button>
                </div>
                </form>
                <!-- <h3 class="widget-title">Ứng dụng di động</h3> -->

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
        <div class="col-md-4">
            <a href="http://online.gov.vn/HomePage/WebsiteDisplay.aspx?DocId=19094"><img alt="" src="http://online.gov.vn/seals/2ZgbypVobA+pgtjkpLPKdw==.jpgx" style="float:left" /></a>
        </div>

    </div>
</div>
</footer>