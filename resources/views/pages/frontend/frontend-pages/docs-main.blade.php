@extends('layouts.frontend.master')

@section('title',  trans('frontend.van-ban') .' | '. get_site_title() )

@section('content')

  @include( 'frontend-templates.doc.' .$appearance_settings['blogs']. '.' .$appearance_settings['blogs'] )

@endsection  