<header class="site-header navbar-sticky">
  <!-- Topbar-->
  <div class="topbar d-flex justify-content-between">
    <!-- Logo-->
    <div class="site-branding d-flex">
      <a class="site-logo align-self-center" href="{{ route('home-page') }}">

      @if(get_site_logo_image())      
        <img src="{{ get_site_logo_image() }}" alt="{{ trans('frontend.your_store_label') }}">
      @else
        <img src="img/logo/logo.png" alt="{{ trans('frontend.your_store_label') }}">
      @endif
      </a>
    </div>
    <!-- Search / Categories-->
    <div class="search-box-wrap d-flex">
      <div class="search-box-inner align-self-center">
        <div class="search-box d-flex">
          <div class="btn-group categories-btn">
            <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
              <i class="icon-menu text-lg"></i>&nbsp;{{ trans('frontend.product_categories_label') }}
            </button>
            @if(count($productCategoriesTree) > 0)
              <div class="dropdown-menu mega-dropdown">
                  <div class="row">
                    @foreach($productCategoriesTree as $cat)
                    <div class="col-sm-3">
                      <a class="d-block navi-link text-center mb-30" href="{{ route('categories-page', $cat['slug']) }}">
                        @if( !empty($cat['img_url']) )
                          <img src="{{ get_image_url($cat['img_url']) }}"> 
                        @else
                          <img src="{{ default_placeholder_img_src() }}"> 
                        @endif
                        <span class="text-gray-dark">{!! $cat['name'] !!}</span>
                      </a>
                    </div>
                    @endforeach
                  </div>
              </div>
            @endif
          </div>
          <form class="input-group" action="{{ route('shop-page') }}" method="get">
            <span class="input-group-btn">
              <button type="submit"><i class="icon-search"></i></button>
            </span>
            <input class="form-control" type="search" id="srch_term" name="srch_term" placeholder="{{ trans('frontend.search_for_label') }}">
          </form>
          
        </div>
      </div>
    </div>
    <!-- Toolbar-->
    <div class="toolbar d-flex">
      <div class="toolbar-item visible-on-mobile mobile-menu-toggle">
        <a href="#">
          <div><i class="icon-menu"></i><span class="text-label">{{ trans('frontend.menu_label') }}</span></div>
        </a>
      </div>
      <div class="toolbar-item hidden-on-mobile">
        <a href="http://hdsd.hatinhtrade.com.vn/docs/san-gdtmdt-ha-tinh/2.1" target="_blank">
          <div>
            <span class="compare-icon">
              <i class="ion-ios-book" style="color:red"></i>
            </span>
            <span class="text-label">Hướng dẫn SD</span>
          </div>
        </a>
      </div>
      <div class="toolbar-item hidden-on-mobile" id="mini-compare-content">
        <a href="{{ route('product-comparison-page') }}">
          <div>
            <span class="compare-icon">
              <i class="ion-ios-list-outline"></i>
              <span class="count-label">{{ $total_compare_item }}</span>
            </span>
            <span class="text-label">{!! trans('frontend.compare_label') !!}</span>
          </div>
        </a>
      </div>

      <div class="toolbar-item hidden-on-mobile">
        <a href="{{ route('user-login-page') }}">

          @if (Session::has('dt_frontend_user_id') && !empty($user_info))
          <div>

            <i class="flag-icon">
              @if($user_info['user_photo_url'])
                <img src="{{ $user_info['user_photo_url'] }}" style="border-radius: 50%">
              @else
                <img src="{{ default_avatar_img_src() }}" style="border-radius: 50%">
              @endif
            </i>

            <span class="text-label">{!! $user_info['user_display_name'] !!}</span>

              <!-- <i class="icon-user" style="color:red"></i> -->
            
          </div>

          @else
            <div><i class="icon-user"></i><span class="text-label">{!! trans('frontend.menu_my_account') !!}</span></div>
          @endif
        </a>

        <div class="toolbar-dropdown text-center px-3">
          @if (Session::has('dt_frontend_user_id') && !empty($user_info))
            <a class="btn btn-info btn-sm btn-block" href="{{ route('user-account-page') }}">{!! trans('frontend.dashboard') !!}</a>
          @else
            <!-- <p class="text-xs mb-3 pt-2">Sign in to your account or register new one to have full control over your orders, receive bonuses and more.</p> -->
            <a class="btn btn-primary btn-sm btn-block" href="{{ route('user-account-page') }}">{!! trans('frontend.frontend_user_login') !!}</a>
            <p class="text-xs text-muted mb-2">{{ trans('frontend.new_user') }}&nbsp;<a href="{{ route('user-registration-page') }}">{{ trans('frontend.frontend_user_registration_title') }}</a></p>
          @endif

          @if (Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor')
            <a class="btn btn-primary btn-sm btn-block" target="_blank" href="{{ route('admin.dashboard') }}">{!! trans('frontend.dashboard_admin') !!}</a>
          @else
            <a class="btn btn-danger btn-sm btn-block" target="_blank" href="{{ route('admin.login') }}">{!! trans('frontend.frontend_vendor_login') !!}</a>
          @endif

          <a class="btn btn-warning btn-sm btn-block" href="{{ route('vendor-registration-page') }}">{!! trans('frontend.vendor_registration') !!}</a>

        </div>

      </div>

      <div class="toolbar-item mini-cart-content">
        @include('pages.ajax-pages.mini-cart-html')
      </div>
    </div>
    <!-- Mobile Menu-->
    <div class="mobile-menu">
      <!-- Search Box-->
      <div class="mobile-search">

        <form class="input-group" action="{{ route('shop-page') }}" method="get">
          <span class="input-group-btn">
            <button type="submit"><i class="icon-search"></i></button>
          </span>
          <input class="form-control" type="search" id="srch_term_mb" name="srch_term" placeholder="{{ trans('frontend.search_for_label') }}">
        </form>

      </div>
      <!-- Toolbar-->
      <div class="toolbar">

        <div class="toolbar-item">
          <a href="http://hdsd.hatinhtrade.com.vn/docs/san-gdtmdt-ha-tinh/2.1" target="_blank">
            <div>
              <span class="compare-icon">
                <i class="ion-ios-book" style="color:red"></i>
              </span>
              <span class="text-label">Hướng dẫn sử dụng</span>
            </div>
          </a>
        </div>

        <div class="toolbar-item">
          <a href="{{ route('product-comparison-page') }}">
            <div>
              <span class="compare-icon"><i class="ion-ios-list-outline"></i><span class="count-label">{{ $total_compare_item }}</span></span>
              <span class="text-label">So sánh sản phẩm</span>
            </div>
          </a>
        </div>
        
        <div class="toolbar-item">

          @if ( Session::has('dt_frontend_user_id') && !empty($user_info) )
            <a href="{{ route('user-account-page') }}">
              <div>
                <i class="flag-icon">
                  @if($user_info['user_photo_url'])
                    <img src="{{ $user_info['user_photo_url'] }}" style="border-radius: 50%">
                  @else
                    <img src="{{ default_avatar_img_src() }}" style="border-radius: 50%">
                  @endif
                </i>

                <span class="text-label">{!! $user_info['user_display_name'] !!}</span>
              </div>
            </a>
          @else
            <a href="{{ route('user-account-page') }}">
            <div><i class="ion-ios-contact-outline"></i><span class="text-label">{!! trans('frontend.frontend_user_login') !!}</span></div>
            </a>
          @endif
          
        </div>

        <div class="toolbar-item">
          @if (Session::has('shopist_admin_user_id') && !empty(get_current_vendor_user_info()['user_role_slug']) && get_current_vendor_user_info()['user_role_slug'] == 'vendor')
            <a href="{{ route('admin.dashboard') }}">
              <div><i class="ion-ios-people"></i><span class="text-label">{!! trans('frontend.dashboard_admin') !!}</span></div>
            </a>
          @else
            <a href="{{ route('admin.login') }}">
              <div><i class="ion-ios-people"></i><span class="text-label">{!! trans('frontend.frontend_vendor_login') !!}</span></div>
            </a>
          @endif
        </div>

        <div class="toolbar-item">
            <a href="{{ route('vendor-registration-page') }}">
              <div><i class="ion-person-add"></i><span class="text-label">{!! trans('frontend.vendor_registration') !!}</span></div>
            </a>
        </div>

      </div>
      <!-- Slideable (Mobile) Menu-->
      <nav class="slideable-menu">
        <ul class="menu" data-initial-height="385">

          <!-- <li class="has-children {{ Request::is('ban-quan-tri')?'active':''}}">
            <span>
            
              <a href="javascript:void(0)">{!! trans('frontend.gioi-thieu') !!}</a>
              <span class="sub-menu-toggle"></span>

            </span>

            <ul class="slideable-submenu">

              <li>
                <a href="{{ route('ban-quan-tri') }}"><span>{!! trans('frontend.ban-quan-tri') !!}</span></a>
              </li>
              <li>
                <a href="http://hdsd.hatinhtrade.com.vn/docs/san-gdtmdt-ha-tinh/2.1" target="_blank">
                  <span>Tài liệu Hướng dẫn sử dụng</span>
                </a>
              </li>

            </ul>

          </li> -->
    
          <li class="has-children {{ Request::is('danh-muc-san-pham')?'active':''}}">
            <span>
              <a href="javascript:void(0)">{{ trans('frontend.product_categories_label') }}</a>

              <span class="sub-menu-toggle"></span>
            </span>
            
            @if(count($productCategoriesTree) > 0)
              <ul class="slideable-submenu">
                @foreach($productCategoriesTree as $cat)
                  <li><a href="{{ route('categories-page', $cat['slug']) }}">{!! $cat['name'] !!}</a></li>
                @endforeach
              </ul>
            @endif
          </li>
          
          <li class="{{ Request::is('gian-hang')?'active':''}}"><a href="{{ route('store-list-page-content') }}"><span>{!! trans('frontend.vendor_list_title_label') !!}</span></a></li>
    
          <li class="{{ Request::is('cac-san-pham')?'active':''}}"><a href="{{ route('shop-page') }}"><span>{!! trans('frontend.all_products_label') !!}</span></a></li>

          <li class="{{ Request::is('gio-hang')?'active':''}}"><a href="{{ route('cart-page') }}"><span>{!! trans('frontend.cart') !!}</span></a></li>

          <li class="{{ Request::is('thanh-toan')?'active':''}}"><a href="{{ route('checkout-page') }}"><span>{!! trans('frontend.checkout') !!}</span></a></li>
    
          <li class="has-children {{ Request::is('truyen-thong/*')?'active':''}}">
            <span>
              <a href="javascript:void(0)">{!! trans('frontend.truyen-thong') !!}</a>
              <span class="sub-menu-toggle"></span>
            </span>
            <ul class="slideable-submenu">
              <li><a href="{{ asset('chuyen-muc/truyen-thong/san-pham-dac-trung') }}">Sản phẩm đặc trưng</a></li>
              <li><a href="{{ asset('chuyen-muc/truyen-thong/van-ban-qppl') }}">Văn bản QPPL</a></li>
              <li><a href="{{ asset('chuyen-muc/truyen-thong/tin-tuc') }}">Tin tức</a></li>
            </ul>
          </li>

        </ul>
      </nav>
    </div>
  </div>
  <!-- Navbar-->
  <div class="navbar">
    <div class="btn-group categories-btn">
      <button class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"><i class="icon-menu text-lg"></i>&nbsp;{{ trans('frontend.product_categories_label') }}</button>
      <div class="dropdown-menu mega-dropdown">
        <div class="row">
          @foreach($productCategoriesTree as $cat)

          <div class="col-sm-3">
            <a class="d-block navi-link text-center mb-30" href="{{ route('categories-page', $cat['slug']) }}">
              @if( !empty($cat['img_url']) )
                <img src="{{ get_image_url($cat['img_url']) }}"> 
              @else
                <img src="{{ default_placeholder_img_src() }}"> 
              @endif
              <span class="text-gray-dark">{!! $cat['name'] !!}</span>
            </a>
          </div>

          @endforeach

        </div>
      </div>
    </div>
    <!-- Main Navigation-->
    <nav class="site-menu">

      <ul>
        
        <li class="{{ Request::is('/')?'active':''}}"><a href="{{ route('home-page') }}"><span>{!! trans('frontend.home') !!}</span></a></li>

        <!-- <li class="{{ Request::is('ban-quan-tri')?'active':''}}">
          
          <a href="javascript:void(0)"><span>{!! trans('frontend.gioi-thieu') !!}</span></a>

          <ul class="sub-menu">

            <li>
              <a href="{{ route('ban-quan-tri') }}"><span>{!! trans('frontend.ban-quan-tri') !!}</span></a>
            </li>
            <li>
              <a href="http://hdsd.hatinhtrade.com.vn/docs/san-gdtmdt-ha-tinh/2.1" target="_blank">
                <span>Tài liệu Hướng dẫn sử dụng</span>
              </a>
            </li>

          </ul>

        </li> -->
        
        <li class="{{ Request::is('gian-hang')||Request::is('gian-hang/*')?'active':''}}"><a href="{{ route('store-list-page-content') }}"><span>{!! trans('frontend.vendor_list_title_label') !!}</span></a></li>

        <li class="{{ Request::is('cac-san-pham')||Request::is('san-pham/*')?'active':''}}">
        
          <a href="{{ route('shop-page') }}"><span>{!! trans('frontend.products_label') !!}</span></a>
    
        </li>

        <li class="{{ Request::is('gio-hang')?'active':''}}"><a href="{{ route('cart-page') }}"><span>{!! trans('frontend.cart') !!}</span></a></li>

        <li class="{{ Request::is('thanh-toan')||Request::is('thanh-toan/*')?'active':''}}"><a href="{{ route('checkout-page') }}"><span>{!! trans('frontend.checkout') !!}</span></a></li>

        <li class="has-submenu {{ Request::is('tin-tuc')||Request::is('tin-tuc/*')?'active':''}}">
        
          <a href="javascript:void(0)"><span>{!! trans('frontend.truyen-thong') !!}</span></a>

          <ul class="sub-menu">

              <li><a href="{{ asset('chuyen-muc/truyen-thong/san-pham-dac-trung') }}">Sản phẩm đặc trưng</a></li>
              <li><a href="{{ asset('chuyen-muc/truyen-thong/van-ban-qppl') }}">Văn bản QPPL</a></li>
              <li><a href="{{ asset('chuyen-muc/truyen-thong/tin-tuc') }}">Tin tức</a></li>
              <li><a href="{{ asset('chuyen-muc/truyen-thong/san-pham-can-mua') }}">Sản phẩm cần mua</a></li>

          </ul>

        </li>

      </ul>
      
    </nav>
    <!-- Toolbar ( Put toolbar here only if you enable sticky navbar )-->
    <div class="toolbar">
      <div class="toolbar-inner">
        <div class="toolbar-item">
          <a href="{{ route('product-comparison-page') }}">
            <div><span class="compare-icon"><i class="icon-repeat"></i><span class="count-label">{{ $total_compare_item }}</span></span><span class="text-label">{!! trans('frontend.compare_label') !!}</span></div>
          </a>
        </div>
        <div class="toolbar-item mini-cart-content">
          @include('pages.ajax-pages.mini-cart-html')
        </div>
      </div>
    </div>
  </div>
</header>