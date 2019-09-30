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
      <h1>{!! trans('frontend.tin-tuc') !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>
          <a href="{{ route('blogs-page-content') }}">{{ trans('frontend.tin-tuc') }}</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
  <div class="row justify-content-center">
    <!-- Content-->
    <div class="col-xl-9 col-lg-8 order-lg-2">
      <!-- Post Meta-->
      <ul class="post-meta mb-4">
        <li><i class="icon-clock"></i><a href="#">{{ Carbon\Carbon::parse($blog_details_by_slug['created_at'])->format('d F, Y') }}</a></li>
        <!-- <li><i class="icon-user"></i><a href="#">Gregory Smith</a></li>
        <li><i class="icon-tag"></i><a href="#">Gadgets</a></li> -->
        <li><i class="icon-message-square"></i><a class="scroll-to" href="#comments">{!! $comments_rating_details['total'] !!} {!! trans('frontend.comments_label') !!}</a></li>
      </ul>
      <h2 class="pt-4">{!! $blog_details_by_slug['post_title'] !!}</h2>

      <p>
        {!! string_decode($blog_details_by_slug['post_content']) !!}
      </p>
      

      
      <!-- Post Tags + Share-->
      {{-- <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-4">
        <div class="pb-2"><a class="text-sm text-muted navi-link" href="#">#electronics,</a><a class="text-sm text-muted navi-link" href="#">&nbsp;#gadgets&nbsp;</a></div>
        <div class="pb-2"><span class="d-inline-block align-middle text-sm text-muted">Share post:&nbsp;&nbsp;&nbsp;</span><a class="social-button shape-rounded sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-rounded sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-rounded sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-rounded sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
      </div> --}}
      <!-- Post Navigation-->
      <div class="entry-navigation">
        <div class="column text-left"><a class="btn btn-outline-secondary btn-sm" href="#"><i class="icon-arrow-left"></i>&nbsp;Prev</a></div>
        <div class="column"><a class="btn btn-outline-secondary view-all" href="blog-rs.html" data-toggle="tooltip" data-placement="top" title="All posts"><i class="icon-menu"></i></a></div>
        <div class="column text-right"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
      </div>
      <!-- Relevant Posts-->
      <h3 class="padding-top-3x padding-bottom-1x">You May Also Like</h3>
      <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;loop&quot;: false, &quot;autoHeight&quot;: true, &quot;margin&quot;: 30, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;630&quot;:{&quot;items&quot;:2},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}} }">
        
        <div class="widget widget-featured-posts">
          <div class="entry">
            <div class="entry-thumb"><a href="blog-single-rs.html"><img src="img/blog/widget/01.jpg" alt="Post"></a></div>
            <div class="entry-content">
              <h4 class="entry-title"><a href="blog-single-rs.html">Factors Behind Wearable Gadgets Popularity</a></h4><span class="entry-meta">by Olivia Reyes</span>
            </div>
          </div>
        </div>
        
      
      
      </div>
      <!-- Comments-->
      <section class="padding-top-3x" data-offset-top="60" id="comments">
        <h3 class="padding-bottom-1x">Comments</h3>
        <!-- Comment-->
        <div class="comment">
          <div class="comment-author-ava"><img src="img/reviews/01.jpg" alt="Comment author"></div>
          <div class="comment-body">
            <div class="comment-header">
              <h4 class="comment-title">Francis Burton</h4>
            </div>
            <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
            <div class="comment-footer">
              <div class="column"><span class="comment-meta">2 days ago</span></div>
              <div class="column"><a class="reply-link" href="#"><i class="icon-corner-up-left"></i>Reply</a></div>
            </div>
            
          </div>
        </div>
       
      </section>
      <!-- Comment Form-->
      <h4 class="padding-top-2x padding-bottom-1x">Leave a Comment</h4>
      <form class="row" method="post">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="comment-name">Name</label>
            <input class="form-control form-control-rounded" type="text" id="comment-name" placeholder="John Doe" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="comment-email">E-mail</label>
            <input class="form-control form-control-rounded" type="email" id="comment-email" placeholder="johndoe@email.com" required>
          </div>
        </div>
        <div class="col-12">
          <div class="form-group">
            <label for="comment-text">Comment</label>
            <textarea class="form-control form-control-rounded" rows="7" id="comment-text" placeholder="Write your comment here..." required></textarea>
          </div>
        </div>
        <div class="col-12 text-right">
          <button class="btn btn-primary" type="submit">Post Comment</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection