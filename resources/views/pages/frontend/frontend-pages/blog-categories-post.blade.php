@extends('layouts.frontend.master')
@section('title',  trans('frontend.cat_post_label') .' | '. get_site_title() )

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
        <li>{!! trans('frontend.tin-tuc') !!}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-1">
  <div class="row">
    <!-- Blog Posts-->
    <div class="col-lg-9">
      <div class="isotope-grid cols-2 mb-4">
        <div class="gutter-sizer"></div>
        <div class="grid-sizer"></div>

        @if(count($blogs_cat_post['posts']) > 0)  
          @foreach($blogs_cat_post['posts'] as $row)

            <?php $total = get_comments_rating_details($row->id, 'blog');?>


            <!-- Post-->
            
            <div class="grid-item">
              <div class="blog-post">
                <a class="post-thumb" href="{{ route('blog-single-page', $row->post_slug) }}">

                  @if(get_blog_postmeta_data($row->id, 'featured_image'))
                    <img class="img-responsive" src="{{ get_image_url(get_blog_postmeta_data($row->id, 'featured_image')) }}" alt="{{ basename(get_blog_postmeta_data($row->id, 'featured_image')) }}">
                  @else
                    <img class="img-responsive" src="{{ default_placeholder_img_src() }}"  alt=""> 
                  @endif

                </a>
                <div class="post-body">
                  <ul class="post-meta">
                    <li><i class="icon-clock"></i><a href="#">{{ Carbon\Carbon::parse($row->created_at)->format('d F, Y') }}</a></li>
                    <li><i class="icon-user"></i><a href="#">{!! $total['total'] !!} {!! trans('frontend.comments_label') !!}</a></li>

                    @if (!empty($row->post_file))

                    <li><i class="icon-file"></i><a href="{{ URL::asset($row->post_file) }}">Văn bản</a></li>



                    @endif
                  </ul>
                  <h3 class="post-title">
                    <a href="{{ route('blog-single-page', $row->post_slug) }}">{!! $row->post_title !!}</a>
                  </h3>
                  <p>
                    {!! get_limit_string(string_decode($row->post_content), get_blog_postmeta_data($row->id, 'allow_max_number_characters_at_frontend')) !!}
                    <a href="{{ route('blog-single-page', $row->post_slug) }}" class="text-medium">{!! trans('frontend.read_more_label') !!}</a>
                  </p>
                </div>
              </div>
            </div>

          @endforeach

        @else
          <p>{!! trans('frontend.no_blogs_data_label') !!}</p>

        @endif

      </div>
     
    </div>
    <!-- Sidebar          -->
    <div class="col-lg-3">
      @include('includes.frontend.blog-categories')
      @yield('blog-categories-content')   
      
    </div>
  </div>
</div>

@endsection