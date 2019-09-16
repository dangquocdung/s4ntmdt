@extends('layouts.frontend.master')
@if(!empty($blog_details_by_slug['blog_seo_title']))
  @section('title',  $blog_details_by_slug['blog_seo_title'] .' | '. get_site_title())
@else
  @section('title',  trans('frontend.blog_details_page_label') .' | '. get_site_title())
@endif

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! trans('frontend.blog_details_page_label') !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{!! trans('frontend.blog_details_page_label') !!}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->
<div class="container padding-bottom-3x mb-1">
  <div class="isotope-grid cols-3 mb-4">
    <div class="gutter-sizer"></div>
    <div class="grid-sizer"></div>
    <!-- Post-->
    <div class="grid-item">
      <div class="blog-post"><a class="post-thumb" href="blog-single-ns.html"><img src="img/blog/02.jpg" alt="Blog Post"></a>
        <div class="post-body">
          <ul class="post-meta">
            <li><i class="icon-clock"></i><a href="#">Mar 30, 2018</a></li>
            <li><i class="icon-user"></i><a href="#">Paul G.</a></li>
            <li><i class="icon-tag"></i><a href="#">Video Games</a></li>
          </ul>
          <h3 class="post-title"><a href="blog-single-ns.html">VR: Next Level of Video Gaming</a></h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam... <a href='blog-single-ns.html'>Read more</a></p>
        </div>
      </div>
    </div>
    <!-- Post-->
    <div class="grid-item">
      <div class="blog-post">
        <div class="post-body">
          <ul class="post-meta">
            <li><i class="icon-clock"></i><a href="#">Mar 15, 2018</a></li>
            <li><i class="icon-user"></i><a href="#">Gregory S.</a></li>
            <li><i class="icon-tag"></i><a href="#">Ecommerce</a></li>
          </ul>
          <h3 class="post-title"><a href="blog-single-ns.html">Different Ways Ecommerce Companies Can Capitalize on Apps</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris... <a href='blog-single-ns.html'>Read more</a></p>
        </div>
      </div>
    </div>
    <!-- Post-->
    <div class="grid-item">
      <div class="blog-post"><a class="post-thumb" href="blog-single-ns.html"><img src="img/blog/03.jpg" alt="Blog Post"></a>
        <div class="post-body">
          <ul class="post-meta">
            <li><i class="icon-clock"></i><a href="#">Feb 23, 2018</a></li>
            <li><i class="icon-user"></i><a href="#">Cedric D.</a></li>
            <li><i class="icon-tag"></i><a href="#">Gadgets</a></li>
          </ul>
          <h3 class="post-title"><a href="blog-single-ns.html">What Apps Will Increase Your Productivity</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam... <a href='blog-single-ns.html'>Read more</a></p>
        </div>
      </div>
    </div>
    <!-- Post-->
    <div class="grid-item">
      <div class="blog-post"><a class="post-thumb" href="blog-single-ns.html"><img src="img/blog/01.jpg" alt="Blog Post"></a>
        <div class="post-body">
          <ul class="post-meta">
            <li><i class="icon-clock"></i><a href="#">Feb 06, 2018</a></li>
            <li><i class="icon-user"></i><a href="#">Olivia R.</a></li>
            <li><i class="icon-tag"></i><a href="#">Drones</a></li>
          </ul>
          <h3 class="post-title"><a href="blog-single-ns.html">The Complete Guide: How To Make Professional Video With Drones</a></h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque... <a href='blog-single-ns.html'>Read more</a></p>
        </div>
      </div>
    </div>
    <!-- Post-->
    <div class="grid-item">
      <div class="blog-post"><a class="post-thumb" href="blog-single-ns.html"><img src="img/blog/04.jpg" alt="Blog Post"></a>
        <div class="post-body">
          <ul class="post-meta">
            <li><i class="icon-clock"></i><a href="#">Jan 11, 2018</a></li>
            <li><i class="icon-user"></i><a href="#">Cynthia G.</a></li>
            <li><i class="icon-tag"></i><a href="#">Photography</a></li>
          </ul>
          <h3 class="post-title"><a href="blog-single-ns.html">How Photography Changed My Life</a></h3>
          <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores... <a href='blog-single-ns.html'>Read more</a></p>
        </div>
      </div>
    </div>
    <!-- Post-->
    <div class="grid-item">
      <div class="blog-post"><a class="post-thumb" href="blog-single-ns.html"><img src="img/blog/05.jpg" alt="Blog Post"></a>
        <div class="post-body">
          <ul class="post-meta">
            <li><i class="icon-clock"></i><a href="#">Dec 29, 2017</a></li>
            <li><i class="icon-user"></i><a href="#">Logan C.</a></li>
            <li><i class="icon-tag"></i><a href="#">Gadgets</a></li>
          </ul>
          <h3 class="post-title"><a href="blog-single-ns.html">Perfect Freelancer's Working Desk</a></h3>
          <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore cum... <a href='blog-single-ns.html'>Read more</a></p>
        </div>
      </div>
    </div>
    <!-- Post-->
    <div class="grid-item">
      <div class="blog-post">
        <div class="post-body">
          <ul class="post-meta">
            <li><i class="icon-clock"></i><a href="#">Dec 18, 2017</a></li>
            <li><i class="icon-user"></i><a href="#">Andy W.</a></li>
            <li><i class="icon-tag"></i><a href="#">Ecommerce</a></li>
          </ul>
          <h3 class="post-title"><a href="blog-single-ns.html">Tips &amp; Tricks: Make Your Ecommerce Startup Stand Out</a></h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim... <a href='blog-single-ns.html'>Read more</a></p>
        </div>
      </div>
    </div>
  </div>
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
    <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-chevron-right"></i></a></div>
  </nav>
</div>

@endsection