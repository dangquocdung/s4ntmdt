@extends('layouts.frontend.master')
@section('title',   get_term_name($blogs_cat_post['selected_cat']) .' | '. get_site_title() )

@section('content')

<!-- Page Title-->
{!! $blogs_cat_post['breadcrumb_html'] !!}

<!-- Page Content-->
<div class="container padding-bottom-3x mb-1">
  <div class="row">

    <!-- Sidebar-->
    <div class="col-lg-3">
      @include('includes.frontend.blog-categories')
      @yield('blog-categories-content')   
    </div>

    <!-- Blog Posts-->
    <div class="col-lg-9">
      <div class="col-12">

        <div class="isotope-grid cols-3 mb-4">
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
                    <h3 class="post-title">
                      <a href="{{ route('blog-single-page', $row->post_slug) }}">{!! $row->post_title !!}</a>
                    </h3>
                  </div>
                </div>
              </div>

            @endforeach

          @else
            <p>{!! trans('frontend.no_blogs_data_label') !!}</p>

          @endif

        </div>

      </div>

      <nav class="phan-trang">
        <div class="column">
          {!! $blogs_cat_post['posts']->appends(Request::capture()->except('page'))->render() !!}
        </div>
      </nav>
  

    </div>


  </div>
</div>

@endsection