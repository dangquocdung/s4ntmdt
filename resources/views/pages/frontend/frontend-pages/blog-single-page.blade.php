@extends('layouts.frontend.master')
@if(!empty($blog_details_by_slug['blog_seo_title']))
  @section('title',  $blog_details_by_slug['blog_seo_title'] .' | '. get_site_title())
@else
  @section('title',  trans('frontend.blog_details_page_label') .' | '. get_site_title())
@endif

@section('content')
 
  
@endsection