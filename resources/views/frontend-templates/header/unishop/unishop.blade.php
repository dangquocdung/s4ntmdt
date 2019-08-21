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
      <div class="user-ava">
          @if(isset($login_user_details) && $login_user_details['user_photo_url'])
            <img src="{{ get_image_url($login_user_details['user_photo_url']) }}" alt="">
          @else
            <img src="{{ default_avatar_img_src() }}" alt="">
          @endif
      </div>
      <div class="user-info">
        <h6 class="user-name">{{ isset($login_user_details) && $login_user_details['user_display_name'] }}</h6>
        {{-- <span class="text-sm text-white opacity-60">290 Reward points</span> --}}
      </div>
    </a>
  @endif
  <nav class="offcanvas-menu">
    <ul class="menu">
        
        <li class="has-children"><span><a href="{{ route('user-account-page') }}">Tài khoản</a><span class="sub-menu-toggle"></span></span>
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

<header class="navbar navbar-sticky">
    <!-- Search-->
    <form class="site-search" action="{{ route('shop-page') }}" method="get">
      <input type="text" id="srch_term" name="srch_term" placeholder="{{ trans('frontend.search_for_label') }}">
      <div class="search-tools"><span class="clear-search">Tìm kiếm</span><span class="close-search"><i class="icon-cross"></i></span></div>
    </form>
  
    <div class="site-branding">
      <div class="inner">
        <!-- Off-Canvas Toggle (#shop-categories)--><a class="offcanvas-toggle cats-toggle" href="#shop-categories" data-toggle="offcanvas"></a>
        <!-- Off-Canvas Toggle (#mobile-menu)--><a class="offcanvas-toggle menu-toggle" href="#mobile-menu" data-toggle="offcanvas"></a>
        <!-- Site Logo-->
        @if(get_site_logo_image())      
        <a class="site-logo" href="{{ route('home-page') }}"><img src="{{ get_site_logo_image() }}" alt="{{ trans('frontend.your_store_label') }}"></a>      
        @endif
      </div>
    </div>
    <!-- Main Navigation-->
    <nav class="site-menu">
      <ul>
        <li class="{{ Request::is('/')?'active':''}}"><a href="{{ route('home-page') }}"><span>{!! trans('frontend.home') !!}</span></a></li>
        
        <li class="{{ Request::is('stores')?'active':''}}"><a href="{{ route('store-list-page-content') }}"><span>Gian hàng</span></a></li>
        
        <li class="has-megamenu"><a href="#"><span>Nổi bật</span></a>
          <ul class="mega-menu">
              @if(count($productCategoriesTree) > 0)
                <?php $i = 1; $j = 0;?>
                @foreach($productCategoriesTree as $cat)
                  @if($i < 5 && isset($cat['parent']) && $cat['parent'] == 'Parent Category')  
                    <li>
                      <a href="{{ route('categories-page', $cat['slug']) }}">
                      
                        @if( !empty($cat['img_url']) )
                          <img src="{{ get_image_url($cat['img_url']) }}"> 
                        @else
                          <img src="{{ default_placeholder_img_src() }}"> 
                        @endif
                      
                      </a>
                      <span class="mega-menu-title">{!! $cat['name'] !!}</span>
                      <ul class="sub-menu">
                          @if(isset($cat['children']) && count($cat['children']) > 0)
                            @foreach($cat['children'] as $cat_sub)
                              <li>
                                <a href="{{ route('categories-page', $cat_sub['slug']) }}">{!! $cat_sub['name'] !!}</a>
                              </li>
                            @endforeach
                          @endif
                      </ul>
                    </li>
                  @endif
                  <?php $i ++;?>
                @endforeach
              @endif
          </ul>
        </li>
  
        <li class="{{ Request::is('shop')?'active':''}}"><a href="{{ route('shop-page') }}"><span>{!! trans('frontend.all_products_label') !!}</span></a></li>

        <li class="{{ Request::is('cart')?'active':''}}"><a href="{{ route('cart-page') }}"><span>{!! trans('frontend.cart') !!}</span></a></li>

        <li class="{{ Request::is('checkout')?'active':''}}"><a href="{{ route('checkout-page') }}"><span>{!! trans('frontend.checkout') !!}</span></a></li>
  
        <li class="{{ Request::is('blogs')?'active':''}}"><a href="{{ route('blogs-page-content') }}"><span>{!! trans('frontend.blog') !!}</span></a></li>
        
      </ul>
    </nav>
    <!-- Toolbar-->
    <div class="toolbar">
      <div class="inner">
        <div class="tools">
          <div class="search"><i class="icon-search"></i></div>

          <div class="wishlist">
            <a href="{{ route('my-saved-items-page') }}"></a><i class="icon-heart" title="{!! trans('frontend.frontend_wishlist') !!}"></i>
          </div>

          <div class="account"><a href="account-orders.html"></a><i class="icon-head"></i>
            <ul class="toolbar-dropdown">
              {{-- <li class="sub-menu-user">
                <div class="user-ava"><img src="img/account/user-ava-sm.jpg" alt="Daniel Adams">
                </div>
                <div class="user-info">
                  <h6 class="user-name">Daniel Adams</h6><span class="text-xs text-muted">290 Reward points</span>
                </div>
              </li>
              <li><a href="account-profile.html">My Profile</a></li>
              <li><a href="account-orders.html">Orders List</a></li>
              <li><a href="account-wishlist.html">Wishlist</a></li>
              <li class="sub-menu-separator"></li>
              <li><a href="#"> <i class="icon-unlock"></i>Logout</a></li> --}}

              @if (Session::has('shopist_frontend_user_id'))
                <li class="sub-menu-user">
                    <div class="user-ava">
                        @if(isset($login_user_details) && $login_user_details['user_photo_url'])
                          <img src="{{ get_image_url($login_user_details['user_photo_url']) }}" alt="">
                        @else
                          <img src="{{ default_avatar_img_src() }}" alt="">
                        @endif
                    </div>
                    <div class="user-info">
                      <h6 class="user-name">{{ isset($login_user_details) && $login_user_details['user_display_name'] }}</h6>
                      {{-- <span class="text-sm text-white opacity-60">290 Reward points</span> --}}
                    </div>
                </li>
                <li>
                  <a href="{{ route('user-account-page') }}">{!! trans('frontend.user_account_label') !!}</a>
                </li>
                <li><a href="{{ route('my-orders-page') }}">{{ trans('frontend.my_orders') }}</a></li>
                <li><a href="{{ route('my-saved-items-page') }}">{{ trans('frontend.my_saved_items') }}</a></li>
                <li class="sub-menu-separator"></li>
                <li><a href="{{ route('user-logout') }}">{!! trans('admin.sign_out') !!}</a></li>
              @else
                <li>
                  <a href="{{ route('user-login-page') }}">{!! trans('frontend.frontend_user_login') !!}</a>
                </li>
              @endif

              @if (Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor')
              <li>
                  <a target="_blank" href="{{ route('admin.dashboard') }}">{!! trans('frontend.vendor_account_label') !!}</a>
              </li>
              @else
              <li>
                <a target="_blank" href="{{ route('admin.login') }}">{!! trans('frontend.frontend_vendor_login') !!}</a>
              </li>
              @endif
              <li>
                <a href="{{ route('vendor-registration-page') }}">{!! trans('frontend.vendor_registration') !!}</a>
              </li>
            </ul>
          </div>

          <div class="cart mini-cart-content">
            @include('pages.ajax-pages.mini-cart-html')
            
          </div>
        </div>
      </div>
    </div>
  </header>