<!DOCTYPE html>
<html lang="vi">
  <head>
    @include('includes.frontend.head')
    
  </head>
  <!-- Body-->
  <body>
    <!-- Off-Canvas Category Menu-->
    <div class="offcanvas-container" id="shop-categories">
      <div class="offcanvas-header">
        <h3 class="offcanvas-title">Danh mục sản phẩm</h3>
      </div>
      <nav class="offcanvas-menu">
        <ul class="menu">
        @if(count($productCategoriesTree) > 0)
          @foreach($productCategoriesTree as $cat)

            @if(isset($cat['parent']) && $cat['parent'] == 'Parent Category')
              <li class="has-children">
                <span>
                  <a href="{{ route('categories-page', $cat['slug']) }}">{!! $cat['name'] !!}</a>
                  <span class="sub-menu-toggle"></span>
                </span>
                <ul class="offcanvas-submenu">

                  @if(isset($cat['children']) && count($cat['children']) > 0)
                      @foreach($cat['children'] as $cat_sub)
                        <li><a href="{{ route('categories-page', $cat_sub['slug']) }}">{!! $cat_sub['name'] !!}</a></li>

                      @endforeach

                    <li><a href="{{ route('categories-page', $cat['slug']) }}">Tất cả</a></li>
                  @endif
                </ul>
              </li>
            @endif
          @endforeach
        @endif
        </ul>
      </nav>
    </div>
    <!-- Off-Canvas Mobile Menu-->
    <div class="offcanvas-container" id="mobile-menu">
      @if (Session::has('shopist_frontend_user_id'))
        <a class="account-link" href="account-orders.html">
          <div class="user-ava"><img src="img/account/user-ava-md.jpg" alt="Daniel Adams">
          </div>
          <div class="user-info">
            <h6 class="user-name">Daniel Adams</h6><span class="text-sm text-white opacity-60">290 Reward points</span>
          </div>
        </a>
      @endif
      <nav class="offcanvas-menu">
        <ul class="menu">
            
            <li class="has-children"><span><a href="index.html">Tài khoản</a><span class="sub-menu-toggle"></span></span>
              <ul class="offcanvas-submenu">
                  @if (Session::has('shopist_frontend_user_id'))
                  <li><a href="{{ route('user-account-page') }}">{!! trans('frontend.user_account_label') !!}</a></li>
                  @else
                  <li><a href="{{ route('user-login-page') }}">{!! trans('frontend.frontend_user_login') !!}</a></li>
                  @endif

                  @if (Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor')
                   <li><a target="_blank" href="{{ route('admin.dashboard') }}">{!! trans('frontend.vendor_account_label') !!}</a></li>
                  @else
                   <li><a target="_blank" href="{{ route('admin.login') }}">{!! trans('frontend.frontend_vendor_login') !!}</a></li>
                  @endif

                  <li><a href="{{ route('vendor-registration-page') }}">{!! trans('frontend.vendor_registration') !!}</a></li>
              </ul>
            </li>

            <li class="{{ Request::is('/')?'active':''}}"><a href="{{ route('home-page') }}"><span>{!! trans('frontend.home') !!}</span></a></li>
      
            <li class="{{ Request::is('stores')?'active':''}}"><a href="{{ route('store-list-page-content') }}"><span>Gian hàng</span></a></li>

            @if(count($productCategoriesTree) > 0)
              @foreach($productCategoriesTree as $cat)

                @if(isset($cat['parent']) && $cat['parent'] == 'Parent Category')
                  <li class="has-children">
                    <span>
                      <a href="{{ route('categories-page', $cat['slug']) }}">{!! $cat['name'] !!}</a>
                      <span class="sub-menu-toggle"></span>
                    </span>
                    <ul class="offcanvas-submenu">

                      @if(isset($cat['children']) && count($cat['children']) > 0)
                          @foreach($cat['children'] as $cat_sub)
                            <li><a href="{{ route('categories-page', $cat_sub['slug']) }}">{!! $cat_sub['name'] !!}</a></li>

                          @endforeach

                        <li><a href="{{ route('categories-page', $cat['slug']) }}">Tất cả</a></li>
                      @endif
                    </ul>
                  </li>
                @endif
              @endforeach
            @endif
            
            <li class="{{ Request::is('checkout')?'active':''}}"><a href="{{ route('checkout-page') }}"><span>{!! trans('frontend.checkout') !!}</span></a></li>
      
            <li class="{{ Request::is('cart')?'active':''}}"><a href="{{ route('cart-page') }}"><span>{!! trans('frontend.cart') !!}</span></a></li>
            
            <li class="{{ Request::is('blogs')?'active':''}}"><a href="{{ route('blogs-page-content') }}"><span>{!! trans('frontend.blog') !!}</span></a></li>
        </ul>
      </nav>
    </div>
    <!-- Topbar-->
    <div class="topbar">
      <div class="topbar-column"><a class="hidden-md-down" href="mailto:hotro@hatinhtrade.com.vn"><i class="icon-mail"></i>&nbsp; hotro@hatinhtrade.com.vn</a><a class="hidden-md-down" href="tel:0986242487"><i class="icon-bell"></i>&nbsp; 098 624 2487</a><a class="social-button sb-facebook shape-none sb-dark" href="#" target="_blank"><i class="socicon-facebook"></i></a><a class="social-button sb-twitter shape-none sb-dark" href="#" target="_blank"><i class="socicon-twitter"></i></a><a class="social-button sb-instagram shape-none sb-dark" href="#" target="_blank"><i class="socicon-instagram"></i></a><a class="social-button sb-pinterest shape-none sb-dark" href="#" target="_blank"><i class="socicon-pinterest"></i></a>
      </div>
      <div class="topbar-column"><a class="hidden-md-down" href="#"><i class="icon-download"></i>&nbsp; Get mobile app</a>
        <div class="lang-currency-switcher-wrap">
          <div class="lang-currency-switcher dropdown-toggle">
            <span class="language">
            @if(count(get_frontend_selected_languages_data()) > 0)
                @if(get_frontend_selected_languages_data()['lang_code'] == 'en')

                  <img alt="{!! get_frontend_selected_languages_data()['lang_name'] !!}" src="{{ asset('images/'. get_frontend_selected_languages_data()['lang_sample_img']) }}">

                @else

                  <img alt="{!! get_frontend_selected_languages_data()['lang_name'] !!}" src="{{ get_image_url(get_frontend_selected_languages_data()['lang_sample_img']) }}">

                @endif
              @endif
              </span>
            <span class="currency">(₫) VNĐ</span>
          </div>
          <div class="dropdown-menu">
            <div class="currency-select">
              <select class="form-control form-control-rounded form-control-sm">
                @if(count(get_frontend_selected_currency_data()) >0)
                @foreach(get_frontend_selected_currency_data() as $val)

                  <option value="{{ $val }}">{!! get_currency_name_by_code( $val ) !!}</option>

                @endforeach
                @endif
              </select>
            </div>

            <?php $available_lang = get_available_languages_data_frontend();?>  

                @if(is_array($available_lang) && count($available_lang) >0)

                @foreach(get_available_languages_data_frontend() as $key => $val)

                  @if($val['lang_code'] == 'en')

                    <a class="dropdown-item" href="#" data-lang_name="{{ $val['lang_code'] }}"><img src="{{ asset('images/'. $val['lang_sample_img']) }}" alt="&nbsp;{!! ucwords($val['lang_name']) !!}">&nbsp;{!! ucwords($val['lang_name']) !!}s</a>

                  @else

                    <a class="dropdown-item" href="#" data-lang_name="{{ $val['lang_code'] }}"><img src="{{ get_image_url($val['lang_sample_img']) }}" alt="&nbsp;{!! ucwords($val['lang_name']) !!}">&nbsp;{!! ucwords($val['lang_name']) !!}s</a>

                  @endif

                @endforeach
                @endif

          </div>
        </div>
      </div>
    </div>
    <!-- Navbar-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->

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