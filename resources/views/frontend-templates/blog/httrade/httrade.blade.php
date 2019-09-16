<!-- Page Title-->
<div class="page-title">
    <div class="container">
    <div class="column">
      <h1>{!! trans('frontend.tin-tuc') !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{!! trans('frontend.tin-tuc') !!}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->
<div class="container padding-bottom-3x mb-1">
  <div class="isotope-grid cols-3 mb-4">
    
    <div class="gutter-sizer"></div>
    <div class="grid-sizer"></div>

    @if(count($blogs_all_data) > 0)

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

    @else
      <p>{!! trans('frontend.no_blogs_data_label') !!}</p>
    @endif
    
  </div>
  
</div>