@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_home_title') .' | '. get_site_title() )

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.ban-quan-tri') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.ban-quan-tri') }}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->
<div class="container padding-bottom-2x mb-2">

  <div class="text-center mb-30">
    <h2 class="mb-3">Ban Quản trị</h2>
    <p class="text-muted">Những người hỗ trợ bạn trong quá trình mua bán trên sàn.</p>
  </div>
  <div class="row padding-bottom-2x">
    <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="img/team/01.jpg" alt="Team">
      <h6>Mr. Bùi Đắc Thế</h6>
      <p class="text-muted mb-2">Phó Giám đốc phụ trách Sở Thông tin & Truyền thông</p>
      <div class="social-bar">
        <a class="social-button shape-circle sb-facebook" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
        <a class="social-button shape-circle sb-twitter" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
        <a class="social-button shape-circle sb-google-plus" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="img/team/02.jpg" alt="Team">
      <h6>Mr. Đặng Quốc Dũng</h6>
      <p class="text-muted mb-2">Phó Giám đốc Trung tâm CNTT & Truyền thông</p>
      <div class="social-bar">
        <a class="social-button shape-circle sb-facebook" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
        <a class="social-button shape-circle sb-twitter" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
        <a class="social-button shape-circle sb-google-plus" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="img/team/03.jpg" alt="Team">
      <h6>Mrs. Nguyễn Thị Thảo</h6>
      <p class="text-muted mb-2">Chuyên viên Sở Thông tin & Truyền thông</p>
      <div class="social-bar">
        <a class="social-button shape-circle sb-facebook" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
        <a class="social-button shape-circle sb-twitter" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
        <a class="social-button shape-circle sb-google-plus" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 mb-30 text-center"><img class="d-block w-150 mx-auto img-thumbnail rounded-circle mb-2" src="img/team/04.jpg" alt="Team">
      <h6>Mrs. Phạm Thị Phương</h6>
      <p class="text-muted mb-2">Cán bộ Trung tâm CNTT & Truyền thông</p>
      <div class="social-bar">
        <a class="social-button shape-circle sb-facebook" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a>
        <a class="social-button shape-circle sb-twitter" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a>
        <a class="social-button shape-circle sb-google-plus" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a>
      </div>    
    </div>
  </div>

  <hr>


  <div class="row align-items-center padding-top-2x padding-bottom-2x">
    <div class="col-md-5"><img class="d-block m-auto img-thumbnail" src="img/banners/about-01.png" alt="Online Shopping"></div>
    <div class="col-md-7 text-md-left text-center">
      <div class="mt-30 hidden-md-up"></div>
      <h2>Tìm kiếm, lựa chọn, mua và bán trực tuyến</h2>
      <p class="text-muted">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor, tristique nec placerat nec.
      </p>
      <a class="text-decoration-none" href="{{ route('shop-page') }}">Xem sản phẩm&nbsp;<i class="icon-arrow-right d-inline-block align-middle"></i></a>
    </div>
  </div>
  <hr>
  <div class="row align-items-center padding-top-2x padding-bottom-2x">
    <div class="col-md-5 order-md-2"><img class="d-block m-auto img-thumbnail" src="img/banners/about-02.jpg" alt="Delivery"></div>
    <div class="col-md-7 order-md-1 text-md-left text-center">
      <div class="mt-30 hidden-md-up"></div>
      <h2>Chuyển phát nhanh toàn tỉnh</h2>
      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor, tristique nec placerat nec.</p>
      <a class="text-decoration-none" href="javascript:void(0)">Phương thức vận chuyển&nbsp;<i class="icon-arrow-right d-inline-block align-middle"></i></a>
    </div>
  </div>
  <hr>
  <div class="row align-items-center padding-top-2x padding-bottom-2x">
    <div class="col-md-5"><img class="d-block m-auto img-thumbnail" src="img/banners/about-03.jpg" alt="Mobile App"></div>
    <div class="col-md-7 text-md-left text-center">
      <div class="mt-30 hidden-md-up"></div>
      <h2>Mua sắm bất kì đâu với ứng dụng di động</h2>
      <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor.</p>
      <a class="market-button apple-button" href="javascript:void(0)"><span class="mb-subtitle">Tải ứng dụng của chúng tôi trên</span><span class="mb-title">App Store</span></a>
      <a class="market-button google-button" href="javascript:void(0)"><span class="mb-subtitle">Tải ứng dụng của chúng tôi trên</span><span class="mb-title">Google Play</span></a>
    </div>
  </div>
  <hr>
  <div class="row align-items-center padding-top-2x padding-bottom-2x">
    <div class="col-md-7 text-md-left text-center">
      <div class="mt-30 hidden-md-up"></div>
      <h2>Đối tác tin cậy của các doanh nghiệp.</h2>
      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam id purus at risus pellentesque faucibus a quis eros. In eu fermentum leo. Integer ut eros lacus. Proin ut accumsan leo. Morbi vitae est eget dolor consequat aliquam eget quis dolor. Mauris rutrum fermentum erat, at euismod lorem pharetra nec. Duis erat lectus, ultrices euismod sagittis at, pharetra eu nisl. Phasellus id ante at velit tincidunt hendrerit. Aenean dolor dolor, tristique nec placerat nec.</p>
    </div>
    <div class="col-md-5">
      <div class="position-relative"><img class="d-block m-auto img-thumbnail" src="img/banners/about-05.jpg" alt="Partner">
        <div class="gallery-wrapper text-center position-absolute" style="top: 50%; left: 50%; margin: -43px 0 0 -40px;">
          <div class="gallery-item video-btn text-center">
            <a href="javascript:void(0)" data-type="video" data-video="&lt;div class=&quot;wrapper&quot;&gt;&lt;div class=&quot;video-wrapper&quot;&gt;&lt;iframe class=&quot;pswp__video&quot; width=&quot;960&quot; height=&quot;640&quot; src=&quot;https://www.youtube.com/embed/d8WNn3QbJek&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;/div&gt;&lt;/div&gt;"></a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
  
@endsection