@extends('layouts.frontend.master')
@section('title',  trans('frontend.blogs_page_title') .' < '. get_site_title() )

@section('content')
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>Blog Right Sidebar</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.html">Home</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>Blog Right Sidebar</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
      <div class="row">
        <!-- Blog Posts-->
        <div class="col-xl-9 col-lg-8">
          <!-- Post-->
          <article class="row">
            <div class="col-md-3">
              <ul class="post-meta">
                <li><i class="icon-clock"></i><a href="blog-single-rs.html">&nbsp;Feb 11, 2017</a></li>
                <li><i class="icon-head"></i>&nbsp;John Doe</li>
                <li><i class="icon-tag"></i><a href="#">&nbsp;Fashion,</a><a href="#">&nbsp;Travel</a></li>
                <li><i class="icon-speech-bubble"></i><a href="#">&nbsp;3 Comments</a></li>
              </ul>
            </div>
            <div class="col-md-9 blog-post"><a class="post-thumb" href="blog-single-rs.html"><img src="img/blog/01.jpg" alt="Post"></a>
              <h3 class="post-title"><a href="blog-single-rs.html">High Fashion On The Lake Shore</a></h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo... <a href='blog-single-rs.html' class='text-medium'>Read More</a></p>
            </div>
          </article>
          <!-- Post-->
          <article class="row">
            <div class="col-md-3">
              <ul class="post-meta">
                <li><i class="icon-clock"></i><a href="blog-single-rs.html">&nbsp;Feb 03, 2017</a></li>
                <li><i class="icon-head"></i>&nbsp;Susan Mayer</li>
                <li><i class="icon-tag"></i><a href="#">&nbsp;Fashion,</a><a href="#">&nbsp;Travel</a></li>
                <li><i class="icon-speech-bubble"></i><a href="#">&nbsp;1 Comment</a></li>
              </ul>
            </div>
            <div class="col-md-9 blog-post">
              <h3 class="post-title"><a href="blog-single-rs.html">Must Have Clothing On Your Next Trip</a></h3>
              <p>
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Aliquid id nobis, amet dolorum earum maxime.</p>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo... <a href='blog-single-rs.html' class='text-medium'>Read More</a></p>
            </div>
          </article>
          <!-- Post-->
          <article class="row">
            <div class="col-md-3">
              <ul class="post-meta">
                <li><i class="icon-clock"></i><a href="blog-single-rs.html">&nbsp;Jan 18, 2017</a></li>
                <li><i class="icon-head"></i>&nbsp;Mike Jordan</li>
                <li><i class="icon-tag"></i><a href="#">&nbsp;Fashion,</a><a href="#">&nbsp;Casual</a></li>
                <li><i class="icon-speech-bubble"></i><a href="#">&nbsp;15 Comments</a></li>
              </ul>
            </div>
            <div class="col-md-9 blog-post"><a class="post-thumb" href="blog-single-rs.html"><img src="img/blog/02.jpg" alt="Post"></a>
              <h3 class="post-title"><a href="blog-single-rs.html">New Trends in Suburban Fashion</a></h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo... <a href='blog-single-rs.html' class='text-medium'>Read More</a></p>
            </div>
          </article>
          <!-- Post-->
          <article class="row">
            <div class="col-md-3">
              <ul class="post-meta">
                <li><i class="icon-clock"></i><a href="blog-single-rs.html">&nbsp;Dec 26, 2016</a></li>
                <li><i class="icon-head"></i>&nbsp;Paul Goodrich</li>
                <li><i class="icon-tag"></i><a href="#">&nbsp;Fashion</a></li>
                <li><i class="icon-speech-bubble"></i><a href="#">&nbsp;1 Comment</a></li>
              </ul>
            </div>
            <div class="col-md-9 blog-post">
              <h3 class="post-title"><a href="blog-single-rs.html">How To Choose Perfect Summer Suit</a></h3>
              <p>
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse. Aliquid id nobis, amet dolorum earum maxime.</p>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo... <a href='blog-single-rs.html' class='text-medium'>Read More</a></p>
            </div>
          </article>
          <!-- Pagination-->
          <nav class="pagination">
            <div class="column">
              <ul class="pages">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li>...</li>
                <li><a href="#">12</a></li>
              </ul>
            </div>
            <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
          </nav>
        </div>
        <!-- Sidebar          -->
        <div class="col-xl-3 col-lg-4">
          <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalBlogSidebar"><i class="icon-layout"></i></button>
          <aside class="sidebar sidebar-offcanvas">
            <!-- Widget Search-->
            <section class="widget">
              <form class="input-group form-group" method="get"><span class="input-group-btn">
                  <button type="submit"><i class="icon-search"></i></button></span>
                <input class="form-control" type="search" placeholder="Search blog">
              </form>
            </section>
            <!-- Widget Categories-->
            <section class="widget widget-categories">
              <h3 class="widget-title">Categories</h3>
              <ul>
                <li><a href="#">Editor's Choice</a><span>(24)</span></li>
                <li><a href="#">Fashion</a><span>(12)</span></li>
                <li><a href="#">Travel</a><span>(5)</span></li>
                <li><a href="#">Online Shopping</a><span>(7)</span></li>
                <li><a href="#">Closing Design</a><span>(3)</span></li>
              </ul>
            </section>
            <!-- Widget Featured Posts-->
            <section class="widget widget-featured-posts">
              <h3 class="widget-title">Featured Posts</h3>
              <!-- Entry-->
              <div class="entry">
                <div class="entry-thumb"><a href="blog-single-rs.html"><img src="img/blog/widget/01.jpg" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="blog-single-rs.html">Trending Winter Boots</a></h4><span class="entry-meta">by Olivia Reyes</span>
                </div>
              </div>
              <!-- Entry-->
              <div class="entry">
                <div class="entry-content">
                  <h4 class="entry-title"><a href="blog-single-rs.html">Global Travel And Vacations Luxury Travel On A Tight Budget</a></h4><span class="entry-meta">by Logan Coleman</span>
                </div>
              </div>
              <!-- Entry-->
              <div class="entry">
                <div class="entry-thumb"><a href="blog-single-rs.html"><img src="img/blog/widget/02.jpg" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="blog-single-rs.html">Hoop Earrings A Style From History</a></h4><span class="entry-meta">by Cynthia Gomez</span>
                </div>
              </div>
            </section>
            <!-- Widget Tags-->
            <section class="widget widget-tags">
              <h3 class="widget-title">Popular Tags</h3><a class="tag" href="#">#design</a><a class="tag" href="#">#fashion</a><a class="tag" href="#">#travelling</a><span class="tag active">#active tag</span><a class="tag" href="#">#shopping</a>
            </section>
            <!-- Promo Banner-->
            <section class="promo-box" style="background-image: url(img/banners/01.jpg);">
              <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .35;"></span>
              <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                <h3 class="text-bold text-light text-shadow">New 2017<br>Handbag Collection</h3>
                <h4 class="text-light text-thin text-shadow">has just arrived!</h4><a class="btn btn-sm btn-primary" href="shop-grid-ls.html">Shop Now</a>
              </div>
            </section>
          </aside>
        </div>
      </div>
    </div>
    
  </div>
@endsection  