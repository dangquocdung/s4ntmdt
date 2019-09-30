@extends('layouts.frontend.master')
@section('title',  trans('frontend.blogs_page_title') .' | '. get_site_title() )
@section('breadcrumb',trans('frontend.blogs_page_title'))

@section('content')

  @include( 'frontend-templates.blog.' .$appearance_settings['blogs']. '.' .$appearance_settings['blogs'] )


   
@endsection  