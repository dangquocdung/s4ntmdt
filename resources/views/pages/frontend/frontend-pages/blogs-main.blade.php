@extends('layouts.frontend.master')

@section('title',  trans('frontend.truyen-thong') .' | '. get_site_title() )

@section('content')

  @include( 'frontend-templates.blog.' .$appearance_settings['blogs']. '.' .$appearance_settings['blogs'] )

@endsection  