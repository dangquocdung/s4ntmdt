@extends('layouts.frontend.master')
@section('title', $page_data->post_title .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{!! $page_data->post_title !!}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.ho_tro') }}</li>
      </ul>
    </div>
  </div>
</div>

<!-- Page Content-->
<div class="container padding-bottom-3x mb-2">
  <div class="row justify-content-center">
    <!-- Content-->
    <div class="col-12">
      {!! string_decode($page_data->post_content) !!}
    </div>
  </div>
</div>



@endsection