@section('blog-categories-content')
<div class="sidebar-toggle position-left"><i class="icon-filter"></i></div>
      <aside class="sidebar sidebar-offcanvas position-left"><span class="sidebar-close"><i class="icon-x"></i></span>
        <!-- Widget Search-->
        <!-- <section class="widget">
          <form class="input-group form-group" method="get"><span class="input-group-btn">
              <button type="submit"><i class="icon-search"></i></button></span>
            <input class="form-control" type="search" placeholder="Search blog">
          </form>
        </section> -->
        <!-- Widget Categories-->
        @if (count($categoriesTree) > 0)
    
        <section class="widget widget-categories">
          <h3 class="widget-title">{{ trans('frontend.category_label') }}</h3>
          <ul>
          @foreach ($categoriesTree as $data)

            <li><a href="{{ route('blog-cat-page', $data['slug']) }}"> {!! $data['name'] !!}</a></li>

          @endforeach
            
          </ul>
        </section>

        @endif
        <!-- Widget Featured Posts-->
        @if(count($advanced_data['best_items']) > 0)  

        <section class="widget widget-featured-posts">
          <h3 class="widget-title">{!! trans('frontend.best_from_the_blog_title') !!}</h3>

          @foreach($advanced_data['best_items'] as $items)

          <!-- Entry-->
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
                <a href="{{ route('blog-single-page', $items['post_slug'])}}">{!! $items['post_title'] !!}</a>
              </h4>
              <span class="entry-meta"><i class="fa fa-calendar"></i>&nbsp; {{ Carbon\Carbon::parse($items['post_date'])->format('d-m-Y') }}</span>
            </div>
          </div>

          @endforeach

        </section>

        @endif

        <!-- Widget Featured Posts-->
        @if(count($advanced_data['latest_items']) > 0)  

          <section class="widget widget-featured-posts">
            <h3 class="widget-title">{!! trans('frontend.latest_from_the_blog') !!}</h3>

            @foreach($advanced_data['latest_items'] as $items)

            <!-- Entry-->
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
                  <a href="{{ route('blog-single-page', $items['post_slug'])}}">{!! $items['post_title'] !!}</a>
                </h4>
                <span class="entry-meta"><i class="fa fa-calendar"></i>&nbsp; {{ Carbon\Carbon::parse($items['post_date'])->format('d-m-Y') }}</span>
              </div>
            </div>

            @endforeach

          </section>

        @endif

      </aside>

@endsection 