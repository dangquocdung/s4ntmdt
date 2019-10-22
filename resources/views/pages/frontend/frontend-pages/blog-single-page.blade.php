@extends('layouts.frontend.master')

@if(!empty($blog_details_by_slug['blog_seo_title']))
  @section('title',  $blog_details_by_slug['blog_seo_title'] .' | '. get_site_title())
@else
  @section('title',  $blog_details_by_slug['post_title'] .' | '. get_site_title())
@endif

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! trans('frontend.truyen-thong') !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>
          <a href="{{ route('blogs-page-content') }}">{{ trans('frontend.truyen-thong') }}</a>
        </li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->

<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
  <div class="row"> 
    <!-- Content-->
    <div class="col-xl-9 col-lg-8">
      <h2>{!! $blog_details_by_slug['post_title'] !!}</h2>

      <!-- Post Meta-->
      <ul class="post-meta mb-4">
        <li><i class="icon-clock"></i><a href="#">{{ Carbon\Carbon::parse($blog_details_by_slug['created_at'])->format('d F, Y') }}</a></li>
        <li><i class="icon-user"></i><a href="#">{{ get_user_name_by_user_id($blog_details_by_slug['post_author_id']) }}</a></li>
        <!-- <li><i csdflass="icon-tag"></i><a href="#">Gadgets</a></li> -->
        <li><i class="icon-message-square"></i><a class="scroll-to" href="#comments">{!! $comments_rating_details['total'] !!} {!! trans('frontend.comments_label') !!}</a></li>

        @if (!empty($blog_details_by_slug['post_file']))

          <li><i class="icon-file"></i><a href="{{ URL::asset($blog_details_by_slug['post_file']) }}">Văn bản</a></li>

        @endif

      </ul>

      <p>
        {!! string_decode($blog_details_by_slug['post_content']) !!}
      </p>
      
      <!-- Post Tags + Share-->
          <div class="d-flex flex-wrap justify-content-between align-items-center pt-3 pb-4">
            <div class="pb-2">
              <a class="text-sm text-muted navi-link" href="#">#electronics,</a>
              <a class="text-sm text-muted navi-link" href="#">&nbsp;#gadgets&nbsp;</a>
            </div>
            <div class="pb-2"><span class="d-inline-block align-middle text-sm text-muted">Share post:&nbsp;&nbsp;&nbsp;</span><a class="social-button shape-rounded sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-rounded sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-rounded sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-rounded sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
          </div>

      <!-- Post Navigation-->
      <div class="entry-navigation">
        <div class="column text-left">
          <a class="btn btn-outline-secondary btn-sm" href="{{ route('blog-single-page', $blogs_data[0]['post_slug']) }}"><i class="icon-arrow-left"></i>&nbsp;Tin mới hơn</a>
        </div>
        <div class="column"><a class="btn btn-outline-secondary view-all" href="{{ route('blogs-page-content') }}" data-toggle="tooltip" data-placement="top" title="All posts"><i class="icon-menu"></i></a></div>
        <div class="column text-right">
          <a class="btn btn-outline-secondary btn-sm" href="{{ route('blog-single-page', $blogs_data[2]['post_slug']) }}"><i class="icon-arrow-right"></i>&nbsp;Tin cũ hơn</a>
        </div>
      </div>

      <!-- Relevant Posts-->
      @if(count($advanced_data['latest_items']) > 0)  
        <h3 class="padding-top-3x padding-bottom-1x">{{ trans('frontend.latest_from_the_blog') }}</h3>

        <div class="owl-carousel" data-owl-carousel="{ 'nav': false, 'dots': true, 'loop': false, 'autoHeight': true, 'margin': 30, 'responsive': {'0':{'items':1},'630':{'items':2},'991':{'items':3},'1200':{'items':3}} }">

        @foreach($advanced_data['latest_items'] as $row)

          <div class="widget widget-featured-posts">
            <div class="entry">

              <div class="entry-thumb">
                <a href="{{ route('blog-single-page', $items['post_slug'])}}">
                    @if(!empty($items['blog_image']))  
                      <img class="img-responsive" src="{{ get_image_url($items['blog_image']) }}"  alt="{{ basename($items['blog_image']) }}">          
                    @else
                      <img class="img-responsive" src="{{ default_placeholder_img_src() }}"  alt="">         
                    @endif
                  </a>
              </div>
                    
              <div class="entry-content">
                <h4 class="entry-title">
                  <a href="{{ route('blog-single-page', $row['post_slug']) }}">{!! $row['post_title'] !!}</a>
                </h4>
                <!-- <span class="entry-meta">by Oliasvia Reyes</span> -->
              </div>

            </div>
          </div>
          @endforeach

        </div>
      @endif

      <!-- Relevant Posts-->
      @if(count($advanced_data['best_items']) > 0)  
        <h3 class="padding-top-3x padding-bottom-1x">{{ trans('frontend.lbest_from_the_blog_title') }}</h3>

        <div class="owl-carousel" data-owl-carousel="{ 'nav': false, 'dots': true, 'loop': false, 'autoHeight': true, 'margin': 30, 'responsive': {'0':{'items':1},'630':{'items':2},'991':{'items':3},'1200':{'items':3}} }">

        @foreach($advanced_data['best_items'] as $row)

          <div class="widget widget-featured-posts">
            <div class="entry">

              <div class="entry-thumb">
                <a href="{{ route('blog-single-page', $items['post_slug'])}}">
                    @if(!empty($items['blog_image']))  
                      <img class="img-responsive" src="{{ get_image_url($items['blog_image']) }}"  alt="{{ basename($items['blog_image']) }}">          
                    @else
                      <img class="img-responsive" src="{{ default_placeholder_img_src() }}"  alt="">         
                    @endif
                  </a>
              </div>
                    
              <div class="entry-content">
                <h4 class="entry-title">
                  <a href="{{ route('blog-single-page', $row['post_slug']) }}">{!! $row['post_title'] !!}</a>
                </h4>
                <!-- <span class="entry-meta">by Oliasvia Reyes</span> -->
              </div>

            </div>
          </div>
          @endforeach

        </div>
      @endif


      <!-- Comments-->
      @if(count($comments_details) > 0)
        <section class="padding-top-3x" data-offset-top="60" id="comments">
          <h3 class="padding-bottom-1x">Comments</h3>
          <!-- Comment-->
          @foreach($comments_details as $comment) 

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
          @endforeach

        </section>
      @endif

      <!-- Comment Form-->
      @if($blog_details_by_slug['allow_comments_at_frontend'] == 'yes')

        @include('pages-message.notify-msg-success')
        @include('pages-message.notify-msg-error')
        @include('pages-message.form-submit')

        <h4 class="padding-top-2x padding-bottom-1x">{!! trans('frontend.add_a_review_label') !!}</h4>
        <form class="row" id="new_comment_form" method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="comments_target" id="comments_target" value="blog">
          <input type="hidden" name="selected_rating_value" id="selected_rating_value" value="">
          <input type="hidden" name="object_id" id="object_id" value="{{ $blog_details_by_slug['id'] }}">

          <div class="col-12">
            <div class="form-group">
              <label for="product_review_content">{!! trans('frontend.write_your_review_label') !!}</label>
              <textarea name="product_review_content" id="product_review_content" class="form-control form-control-rounded" rows="7" placeholder="Write your comment here..." required></textarea>
            </div>
          </div>
          <div class="col-12 text-right">
            <input name="review_submit" id="review_submit" class="btn btn-primary btn-sm" value="{{ trans('frontend.submit_label') }}" type="submit">
          </div>
        </form>
      @endif

    </div>
    <!-- Sidebar          -->
    <div class="col-xl-3 col-lg-4">
      @include('includes.frontend.blog-categories')
      @yield('blog-categories-content')   

    </div>
  </div>
</div>

@endsection