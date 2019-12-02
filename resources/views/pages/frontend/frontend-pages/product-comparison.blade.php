@extends('layouts.frontend.master')

@section('title', trans('frontend.product_comparison_title_label') .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.product_comparison_title_label') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li><a href="{{ route('home-page')}}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.product_comparison_title_label') }}</li>
      </ul>
    </div>
  </div>
</div>
<!-- Page Content-->

<div class="container padding-bottom-2x mb-2">


</div>

@endsection