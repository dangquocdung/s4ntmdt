@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_home_title') .' | '. get_site_title() )

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.contact') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.contact') }}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->
<div class="container padding-bottom-2x mb-2">
  <div class="row">
    <div class="col-md-7">
      <div class="display-3 text-muted opacity-75 mb-30">Customer Service</div>
    </div>
    <div class="col-md-5">
      <ul class="list-icon">
        <li> <i class="icon-mail text-muted"></i><a class="navi-link" href="mailto:customer.service@unishop.com">customer.service@unishop.com</a></li>
        <li> <i class="icon-phone text-muted"></i>+1 (080) 44 357 260</li>
        <li> <i class="icon-clock text-muted"></i>1 - 2 business days</li>
      </ul>
    </div>
  </div>
  <hr class="margin-top-2x">
  <div class="row margin-top-2x">
    <div class="col-md-7">
      <div class="display-3 text-muted opacity-75 mb-30">Tech Support</div>
    </div>
    <div class="col-md-5">
      <ul class="list-icon">
        <li> <i class="icon-mail text-muted"></i><a class="navi-link" href="mailto:support@unishop.com">support@unishop.com</a></li>
        <li> <i class="icon-phone text-muted"></i>00 33 169 7720</li>
        <li> <i class="icon-clock text-muted"></i>1 - 2 business days</li>
      </ul>
    </div>
  </div>
  <h3 class="margin-top-3x text-center mb-30">Outlet Stores</h3>
  <div class="row">
    <div class="col-md-4 col-sm-6">
      <div class="card mb-30"><img class="card-img-top" src="img/contacts/orlando.jpg" alt="Orlando">
        <div class="card-body">
          <ul class="list-icon">
            <li> <i class="icon-map-pin text-muted"></i>514 S. Magnolia St. Orlando, FL 32806, USA</li>
            <li> <i class="icon-phone text-muted"></i>+1 (786) 322 560 40</li>
            <li> <i class="icon-mail text-muted"></i><a class="navi-link" href="mailto:orlando.store@unishop.com">orlando.store@unishop.com</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="card mb-30"><img class="card-img-top" src="img/contacts/chicago.jpg" alt="Chicago">
        <div class="card-body">
          <ul class="list-icon">
            <li> <i class="icon-map-pin text-muted"></i>44 Shirley Ave. West Chicago, IL 60185, USA</li>
            <li> <i class="icon-phone text-muted"></i>+1 (847) 252 765 33</li>
            <li> <i class="icon-mail text-muted"></i><a class="navi-link" href="mailto:chicago.store@unishop.comm">chicago.store@unishop.com</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-6">
      <div class="card mb-30"><img class="card-img-top" src="img/contacts/new-york.jpg" alt="New York">
        <div class="card-body">
          <ul class="list-icon">
            <li> <i class="icon-map-pin text-muted"></i>89 Clinton Dr. Holbrook, NY 11741, USA</li>
            <li> <i class="icon-phone text-muted"></i>+1 (212) 477 690 000</li>
            <li> <i class="icon-mail text-muted"></i><a class="navi-link" href="mailto:newyork.store@unishop.com">newyork.store@unishop.com</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>  
  
@endsection