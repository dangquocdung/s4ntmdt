@extends('layouts.frontend.master-no-header')
@section('title', trans('frontend.coming_soon') .' | '. get_site_title() )

@section('content')
  @include( 'frontend-templates.coming.httrade.httrade')
@endsection  