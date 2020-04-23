<footer class="site-footer" style="background-image: url(/img/footer-bg.png);">

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <section class="widget widget-light-skin">
                <h3 class="widget-title">Thông tin liên hệ</h3>
                {!! $appearance_all_data['footer_details']['footer_about_us_description'] !!}
                <br>
                <a href="{{ URL::to('http://online.gov.vn/HomePage/WebsiteDisplay.aspx?DocId=19094') }}" target="_blank">
                    <img src="{{ URL::asset('/images/dadangky.jpgx') }}"/>
                </a>
            </section>
        </div>

        @if(count($pages_list) > 0)

        <div class="col-md-6">
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
</div>
</footer>