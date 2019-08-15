@extends('layouts.frontend.master')
@if(!empty($blog_details_by_slug['blog_seo_title']))
  @section('title',  $blog_details_by_slug['blog_seo_title'] .' | '. get_site_title())
@else
  @section('title',  trans('frontend.blog_details_page_label') .' | '. get_site_title())
@endif

@section('content')
 <!-- Off-Canvas Wrapper-->
 <div class="offcanvas-wrapper">
    <!-- Page Title-->
    <div class="page-title">
      <div class="container">
        <div class="column">
          <h1>Post Right Sidebar</h1>
        </div>
        <div class="column">
          <ul class="breadcrumbs">
            <li><a href="index.html">Home</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li><a href="blog-rs.html">Blog</a>
            </li>
            <li class="separator">&nbsp;</li>
            <li>Post Right Sidebar</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container padding-bottom-3x mb-2">
      <div class="row"> 
        <!-- Content-->
        <div class="col-xl-9 col-lg-8">
          <!-- Post-->
          <div class="single-post-meta">
            <div class="column">
              <div class="meta-link"><span>by</span>John Doe</div>
              <div class="meta-link"><span>in</span><a href="#">Fashion,&nbsp;</a><a href="#">Travel</a></div>
            </div>
            <div class="column">
              <div class="meta-link"><a href="#"><i class="icon-clock"></i>Feb 11, 2017</a></div>
              <div class="meta-link"><a class="scroll-to" href="#comments"><i class="icon-speech-bubble"></i>3</a></div>
            </div>
          </div>
          <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true }">
            <figure><img src="img/blog/single/01.jpg" alt="Image">
              <figcaption class="text-white">Image Caption</figcaption>
            </figure>
            <figure><img src="img/blog/single/02.jpg" alt="Image">
              <figcaption class="text-white">Image Caption</figcaption>
            </figure>
            <figure><img src="img/blog/single/03.jpg" alt="Image">
              <figcaption class="text-white">Image Caption</figcaption>
            </figure>
          </div>
          <h2 class="padding-top-2x">New Trends in Suburban Fashion</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minima veniam, quis nostrum exercitationem.</p>
          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Ut enim ad minima veniam.</p>
          <div class="row">
            <div class="col-xl-10 offset-xl-1">
              <blockquote class="margin-top-1x margin-bottom-1x">
                <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo.</p>
                <cite>Someone famous</cite>
              </blockquote>
            </div>
          </div>
          <p class="mt-2">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
          <div class="single-post-footer">
            <div class="column"><a class="sp-tag" href="#">#design,</a><a class="sp-tag" href="#">&nbsp;#fashion,</a><a class="sp-tag" href="#">&nbsp;#travelling</a></div>
            <div class="column">
              <div class="entry-share"><span class="text-muted">Share post:</span>
                <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
              </div>
            </div>
          </div>
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
                <div class="entry-thumb"><a href="#"><img src="img/blog/widget/01.jpg" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="#">Trending Winter Boots</a></h4><span class="entry-meta">by Olivia Reyes</span>
                </div>
              </div>
            </div>
            <div class="widget widget-featured-posts">
              <div class="entry">
                <div class="entry-content">
                  <h4 class="entry-title"><a href="#">Global Travel And Vacations Luxury Travel On A Tight Budget</a></h4><span class="entry-meta">by Logan Coleman</span>
                </div>
              </div>
            </div>
            <div class="widget widget-featured-posts">
              <div class="entry">
                <div class="entry-thumb"><a href="#"><img src="img/blog/widget/03.jpg" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="#">Perfect Shoes for Yamakasi</a></h4><span class="entry-meta">by Edward Solo</span>
                </div>
              </div>
            </div>
            <div class="widget widget-featured-posts">
              <div class="entry">
                <div class="entry-thumb"><a href="#"><img src="img/blog/widget/02.jpg" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="#">Hoop Earrings A Style From History</a></h4><span class="entry-meta">by Cynthia Gomez</span>
                </div>
              </div>
            </div>
            <div class="widget widget-featured-posts">
              <div class="entry">
                <div class="entry-content">
                  <h4 class="entry-title"><a href="#">How Fashion Industry Leads To A Melting Ice In Antarctica</a></h4><span class="entry-meta">by Johnathan Doe</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Comments-->
          <section class="padding-top-3x" id="comments">
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
                  <div class="column"><a class="reply-link" href="#"><i class="icon-reply"></i>Reply</a></div>
                </div>
                <!-- Comment reply-->
                <div class="comment comment-reply">
                  <div class="comment-author-ava"><img src="img/reviews/02.jpg" alt="Comment author"></div>
                  <div class="comment-body">
                    <div class="comment-header">
                      <h4 class="comment-title">Maggie Scott</h4>
                    </div>
                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="comment-footer"><span class="comment-meta">1 day ago</span></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Comment-->
            <div class="comment">
              <div class="comment-author-ava"><img src="img/reviews/03.jpg" alt="Comment author"></div>
              <div class="comment-body">
                <div class="comment-header">
                  <h4 class="comment-title">Jacob Hammond</h4>
                </div>
                <p class="comment-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                <div class="comment-footer">
                  <div class="column"><span class="comment-meta">5 days ago</span></div>
                  <div class="column"><a class="reply-link" href="#"><i class="icon-reply"></i>Reply</a></div>
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
              <button class="btn btn-pill btn-primary" type="submit">Post Comment</button>
            </div>
          </form>
        </div>
        <!-- Sidebar          -->
        <div class="col-xl-3 col-lg-4">
          <button class="sidebar-toggle position-left" data-toggle="modal" data-target="#modalBlogSidebar"><i class="icon-layout"></i></button>
          <aside class="sidebar sidebar-offcanvas">
            <!-- Widget Search-->
            <section class="widget">
              <form class="input-group form-group" method="get"><span class="input-group-btn">
                  <button type="submit"><i class="icon-search"></i></button></span>
                <input class="form-control" type="search" placeholder="Search blog">
              </form>
            </section>
            <!-- Widget Categories-->
            <section class="widget widget-categories">
              <h3 class="widget-title">Categories</h3>
              <ul>
                <li><a href="#">Editor's Choice</a><span>(24)</span></li>
                <li><a href="#">Fashion</a><span>(12)</span></li>
                <li><a href="#">Travel</a><span>(5)</span></li>
                <li><a href="#">Online Shopping</a><span>(7)</span></li>
                <li><a href="#">Closing Design</a><span>(3)</span></li>
              </ul>
            </section>
            <!-- Widget Featured Posts-->
            <section class="widget widget-featured-posts">
              <h3 class="widget-title">Featured Posts</h3>
              <!-- Entry-->
              <div class="entry">
                <div class="entry-thumb"><a href="blog-single-rs.html"><img src="img/blog/widget/01.jpg" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="blog-single-rs.html">Trending Winter Boots</a></h4><span class="entry-meta">by Olivia Reyes</span>
                </div>
              </div>
              <!-- Entry-->
              <div class="entry">
                <div class="entry-content">
                  <h4 class="entry-title"><a href="blog-single-rs.html">Global Travel And Vacations Luxury Travel On A Tight Budget</a></h4><span class="entry-meta">by Logan Coleman</span>
                </div>
              </div>
              <!-- Entry-->
              <div class="entry">
                <div class="entry-thumb"><a href="blog-single-rs.html"><img src="img/blog/widget/02.jpg" alt="Post"></a></div>
                <div class="entry-content">
                  <h4 class="entry-title"><a href="blog-single-rs.html">Hoop Earrings A Style From History</a></h4><span class="entry-meta">by Cynthia Gomez</span>
                </div>
              </div>
            </section>
            <!-- Widget Tags-->
            <section class="widget widget-tags">
              <h3 class="widget-title">Popular Tags</h3><a class="tag" href="#">#design</a><a class="tag" href="#">#fashion</a><a class="tag" href="#">#travelling</a><span class="tag active">#active tag</span><a class="tag" href="#">#shopping</a>
            </section>
            <!-- Promo Banner-->
            <section class="promo-box" style="background-image: url(img/banners/01.jpg);">
              <!-- Choose between .overlay-dark (#000) or .overlay-light (#fff) with default opacity of 50%. You can overrride default color and opacity values via 'style' attribute.--><span class="overlay-dark" style="opacity: .35;"></span>
              <div class="promo-box-content text-center padding-top-2x padding-bottom-2x">
                <h3 class="text-bold text-light text-shadow">New 2017<br>Handbag Collection</h3>
                <h4 class="text-light text-thin text-shadow">has just arrived!</h4><a class="btn btn-sm btn-primary" href="shop-grid-ls.html">Shop Now</a>
              </div>
            </section>
          </aside>
        </div>
      </div>
    </div>
  </div>
@endsection