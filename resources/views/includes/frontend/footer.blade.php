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
        <div class="col-md-8">
            <!-- Contact Info-->
            <section class="widget widget-light-skin">

                <h3 class="widget-title">Thông tin liên hệ</h3>

                <ul class="list-unstyled text-sm text-white">
                    <li><span class="opacity-50">MST/ĐKKD/QĐTL:&nbsp;</span>Số 1889/QĐ-UBND</li>
                    <li><span class="opacity-50">Cơ quan chủ quản:&nbsp;</span>Sở Th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng H&agrave; Tĩnh</li>
                    <li><span class="opacity-50">Cơ quan quản trị:&nbsp;</span>Trung t&acirc;m C&ocirc;ng nghệ th&ocirc;ng tin v&agrave; Truyền th&ocirc;ng H&agrave; Tĩnh</li>
                    <li><span class="opacity-50">Địa chỉ:&nbsp;</span>Số 18, đường 26/3, th&agrave;nh phố H&agrave; Tĩnh, tỉnh H&agrave; Tĩnh</li>
                    <li><span class="opacity-50">Điện thoại:&nbsp;</span> 0239&nbsp;895589,&nbsp;&nbsp;&nbsp;<span class="opacity-50">Email:&nbsp;</span><a href="mailto:ttcntt-tt@hatinh.gov.vn">ttcntt-tt@hatinh.gov.vn</a></li>
                    <li><em>* Phiên bản Sàn GDTMĐT đang chạy thử nghiệm. Mọi chi tiết và yêu cầu hỗ trợ vui lòng liên hệ với ban quản trị.</li>
                </ul>
            </section>
        </div>
        <div class="col-md-4">
            <section class="widget widget-light-skin">
                <h3 class="widget-title">Chứng nhận</h3>
                <a href="http://online.gov.vn/HomePage/WebsiteDisplay.aspx?DocId=19094">
                    <img src="http://online.gov.vn/seals/2ZgbypVobA+pgtjkpLPKdw==.jpgx"/></a>
            </section>
        </div>
    </div>
</div>
</footer>