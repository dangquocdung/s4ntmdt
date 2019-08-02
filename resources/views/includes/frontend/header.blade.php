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
      
      <li class="{{ Request::is('checkout')?'active':''}}"><a href="{{ route('checkout-page') }}"><span>{!! trans('frontend.checkout') !!}</span></a></li>

      <li class="{{ Request::is('cart')?'active':''}}"><a href="{{ route('cart-page') }}"><span>{!! trans('frontend.cart') !!}</span></a></li>
      
      <li class="{{ Request::is('blogs')?'active':''}}"><a href="{{ route('blogs-page-content') }}"><span>{!! trans('frontend.blog') !!}</span></a></li>
      
    </ul>
  </nav>
  <!-- Toolbar-->
  <div class="toolbar">
    <div class="inner">
      <div class="tools">
        <div class="search"><i class="icon-search"></i></div>
        <div class="account"><a href="account-orders.html"></a><i class="icon-head"></i>
          <ul class="toolbar-dropdown">
            <li class="sub-menu-user">
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
            <li><a href="#"> <i class="icon-unlock"></i>Logout</a></li>
          </ul>
        </div>
        <div class="cart"><a href="cart.html"></a><i class="icon-bag"></i><span class="count">3</span><span class="subtotal">$289.68</span>
          <div class="toolbar-dropdown">
            <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/01.jpg" alt="Product"></a>
              <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Unionbay Park</a><span class="dropdown-product-details">1 x $43.90</span></div>
            </div>
            <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/02.jpg" alt="Product"></a>
              <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Daily Fabric Cap</a><span class="dropdown-product-details">2 x $24.89</span></div>
            </div>
            <div class="dropdown-product-item"><span class="dropdown-product-remove"><i class="icon-cross"></i></span><a class="dropdown-product-thumb" href="shop-single.html"><img src="img/cart-dropdown/03.jpg" alt="Product"></a>
              <div class="dropdown-product-info"><a class="dropdown-product-title" href="shop-single.html">Haan Crossbody</a><span class="dropdown-product-details">1 x $200.00</span></div>
            </div>
            <div class="toolbar-dropdown-group">
              <div class="column"><span class="text-lg">Total:</span></div>
              <div class="column text-right"><span class="text-lg text-medium">$289.68&nbsp;</span></div>
            </div>
            <div class="toolbar-dropdown-group">
              <div class="column"><a class="btn btn-sm btn-block btn-secondary" href="cart.html">View Cart</a></div>
              <div class="column"><a class="btn btn-sm btn-block btn-success" href="checkout-address.html">Checkout</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>