@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_shop_title') .' | '. get_site_title() )

@section('content')
  @include( 'frontend-templates.coming.htttrade.httrade )
@endsection  