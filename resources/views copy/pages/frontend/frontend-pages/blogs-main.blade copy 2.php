@extends('layouts.frontend.master')
@section('title',  trans('frontend.blogs_page_title') .' | '. get_site_title() )

@section('content')
<!-- Off-Canvas Wrapper-->
<div class="offcanvas-wrapper">
  <!-- Page Title-->
  <div class="page-title">
    <div class="container">
      <div class="column">
        <h1>Blog No Sidebar</h1>
      </div>
      <div class="column">
        <ul class="breadcrumbs">
          <li><a href="index.html">Home</a>
          </li>
          <li class="separator">&nbsp;</li>
          <li>Blog No Sidebar</li>
        </ul>
      </div>
    </div>
  </div>

  

    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-1">
      @if(count($blogs_all_data) > 0)
      <div class="row justify-content-center">
        <div class="col-lg-10">

          @foreach($blogs_all_data as $row)

          <!-- Post-->
          <article class="row">
            <div class="col-md-3">
              <ul class="post-meta">
                <li><i class="icon-clock"></i><a href="blog-single-ns.html">&nbsp;{{ Carbon\Carbon::parse($row['created_at'])->format('d F, Y') }}</a></li>
                {{-- <li><i class="icon-head"></i>&nbsp;John Doe</li>
                <li><i class="icon-tag"></i><a href="#">&nbsp;Fashion,</a><a href="#">&nbsp;Travel</a></li> --}}
                <li><i class="icon-speech-bubble"></i><a href="#">&nbsp;{!! $row['comments_details']['total'] !!} {!! trans('frontend.comments_label') !!}</a></li>
              </ul>
            </div>
            <div class="col-md-9 blog-post">
              <a class="post-thumb" href="{{ route('blog-single-page', $row['post_slug']) }}">

                @if(!empty($row['featured_image']))
                  <img class="img-responsive" src="{{ get_image_url($row['featured_image']) }}" alt="{{ basename($row['featured_image']) }}">
                @else
                  <img class="img-responsive" src="{{ default_placeholder_img_src() }}" alt="media">
                @endif
              </a>
              
              <h3 class="post-title"><a href="{{ route('blog-single-page', $row['post_slug']) }}">{!! $row['post_title'] !!}</a></h3>
              <p>{!! get_limit_string(string_decode($row['post_content']), $row['allow_max_number_characters_at_frontend']) !!}
                <a href='{{ route('blog-single-page', $row['post_slug']) }}' class='text-medium'>{!! trans('frontend.read_more_label') !!}</a>
              </p>
            </div>
          </article>
          @endforeach
          
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
      </div>
      @else
        <p>{!! trans('frontend.no_blogs_data_label') !!}</p>
      @endif
    </div>
  
</div>
@endsection  