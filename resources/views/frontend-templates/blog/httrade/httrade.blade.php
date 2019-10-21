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
        <li>{!! trans('frontend.truyen-thong') !!}</li>
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

        @if(count($blogs_all_data) > 0)

        @foreach($blogs_all_data as $row)

        <!-- Post-->
        
        <div class="grid-item">
          <div class="blog-post">
            <a class="post-thumb" href="{{ route('blog-single-page', $row['post_slug']) }}">

            @if(!empty($row['featured_image']))
                <img src="{{ get_image_url($row['featured_image']) }}" alt="{{ basename($row['featured_image']) }}">
              @else
                <img src="{{ default_placeholder_img_src() }}" alt="Blog Post">
              @endif

            </a>
            <div class="post-body">
              <ul class="post-meta">
                <li><i class="icon-clock"></i><a href="#">{{ Carbon\Carbon::parse($row['created_at'])->format('d-m-Y H:i') }}</a></li>
                <li><i class="icon-user"></i><a href="#">{{ get_user_name_by_user_id($row['post_author_id']) }}</a></li>
                @if (!empty($row['post_file']))
                  <li><i class="icon-file"></i><a href="{{ URL::asset($row['post_file']) }}">Văn bản</a></li>
                @endif

              </ul>
              <h3 class="post-title"><a href="{{ route('blog-single-page', $row['post_slug']) }}">{!! $row['post_title'] !!}</a></h3>
              <p>
                {{-- {!! get_limit_string(string_decode($row['post_content']), $row['allow_max_number_characters_at_frontend']) !!} --}}
                {{-- <a href="{{ route('blog-single-page', $row['post_slug']) }}" class="text-medium">{!! trans('frontend.read_more_label') !!}</a> --}}
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