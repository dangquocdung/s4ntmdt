<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('includes.frontend.head')
    
  </head>
  <!-- Body-->
  <body>

    @if(get_appearance_settings()['general']['custom_css'] == true)
    @include('includes.frontend.content-custom-css')
    @endif
    
    @include('includes.frontend.header')

    <!-- Off-Canvas Wrapper-->

    <!-- Off-Canvas Wrapper-->
    <div class="offcanvas-wrapper">

        @if(!Request::is('/'))
        <!-- Page Title-->
        <div class="page-title">
          <div class="container">
            <div class="column">
              <h1>@yield('breadcrumbs')</h1>
            </div>
            <div class="column">
              <ul class="breadcrumbs">
                <li>
                  <a href="{{ route('home-page') }}">Trang chủ</a>
                </li>
                <li class="separator">&nbsp;</li>
                <li>@yield('breadcrumbs')</li>
              </ul>
            </div>
          </div>
        </div>
        @endif

        @yield('content')

        @include('includes.frontend.footer')

    </div>

    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="icon-arrow-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="/js/vendor.min.js"></script>
    <script src="/js/scripts.min.js"></script>
  </body>
</html>