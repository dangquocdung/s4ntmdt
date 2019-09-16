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

      @foreach($blogs_all_data as $row)

        <!-- Post-->
        <div class="grid-item">
          <div class="blog-post">
            <a class="post-thumb" href="{{ route('blog-single-page', $row['post_slug']) }}">
            
              @if(!empty($row['featured_image']))
                <img src="{{ get_image_url($row['featured_image']) }}" alt="{{ basename($row['featured_image']) }}">
              @else
                <img src="{{ default_placeholder_img_src() }}" alt="media">
              @endif
            
            </a>
            <div class="post-body">
              <ul class="post-meta">
                <li><i class="icon-clock"></i><a href="#">{{ Carbon\Carbon::parse($row['created_at'])->format('d F, Y') }}</a></li>
                <!-- <li><i class="icon-user"></i><a href="#">Paul G.</a></li>
                <li><i class="icon-tag"></i><a href="#">Video Games</a></li> -->
              </ul>
              <h3 class="post-title"><a href="{{ route('blog-single-page', $row['post_slug']) }}">{!! $row['post_title'] !!}</a></h3>
              <p>
                {!! get_limit_string(string_decode($row['post_content']), $row['allow_max_number_characters_at_frontend']) !!}
                <a href="{{ route('blog-single-page', $row['post_slug']) }}" class="text-medium">{!! trans('frontend.read_more_label') !!}</a>
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