@extends('layouts.frontend.master')

@section('title',trans('frontend.products') .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! trans('frontend.products') !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>        </li>
        <li class="separator">&nbsp;</li>
        <li>{!! trans('frontend.products') !!}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->
<div class="row no-gutters">
  <div class="col-md-6 fh-section" style="background-image: url(img/coming-soon-bg.jpg);">
    <span class="overlay" style="background-color: #000; opacity: .7;"></span>
    <div class="d-flex flex-column fh-section py-5 px-3 justify-content-between">
      <div class="w-100 text-center">
        <div class="d-inline-block mb-5" style="width: 136px;">
          <!-- <img class="d-block" src="img/logo/logo-light.png" alt="Unishop"> -->
        </div>
        <h1 class="text-white text-normal mb-3">Chúng tôi đang chuẩn bị...</h1>
        <h6 class="text-white opacity-80 mb-4">Sự kiện của chúng tôi sẽ diễn ra trong:</h6>

        @include('includes.frontend.countdown')
        @yield('countdown')
        
        <div class="pt-3 hidden-md-up"><a class="btn btn-primary scroll-to" href="#notify"><i class="icon-bell"></i>&nbsp;Notify Me!</a></div>
      </div>
      <div class="w-100 text-center">
        <p class="text-white mb-2">00 33 169 7720</p><a class="navi-link-light" href="mailto:support@unishop.com">support@unishop.com</a>
        <div class="pt-3"><a class="social-button shape-circle sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus sb-light-skin" href="#"><i class="socicon-googleplus"></i></a></div>
      </div>
    </div>
  </div>
  <div class="col-md-6 fh-section" id="notify" data-offset-top="-1">
    <div class="d-flex flex-column fh-section py-5 px-3 justify-content-center align-items-center">
      <div class="text-center" style="max-width: 500px;">
        <div class="h1 text-normal mb-3">Notify Me!</div>
        <h6 class="text-muted mb-4">Let me know when your website is live and I can start order goods. Here is my:</h6>
        <form>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Name" required>
          </div>
          <div class="form-group">
            <input class="form-control" type="email" placeholder="Email Address" required>
          </div>
          <button class="btn btn-primary" type="submit"><i class="icon-mail"></i>&nbsp;Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection