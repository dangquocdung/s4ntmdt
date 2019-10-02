@extends('layouts.frontend.master-no-header')
@section('title', trans('frontend.shopist_shop_title') .' | '. get_site_title() )

@section('content')
  @include( 'frontend-templates.coming.httrade.httrade')
@endsection  