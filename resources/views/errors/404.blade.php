@extends('layouts.frontend.master-no-header')

@section('title', trans('frontend.page_not_found').' | '. get_site_title() )

@section('content')

<!-- Page Content-->
<section class="fw-section margin-top-3x" style="background-image: url(img/404-bg.png);">
    <h1 class="display-404 text-center">{!! trans('frontend.404') !!}</h1>
</section>
<div class="container padding-bottom-3x mb-1">
    <div class="text-center">
    <h2>{!! trans('frontend.page_not_found') !!}</h2>
    <p>It seems we can’t find the page you are looking for. <a href="{{route('home-page') }}">Go back to Homepage</a><br>Or try using search at the top right corner of the page.</p>
    </div>
</div>

@endsection