@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_cart_title') .' | '. get_site_title() )
@section('breadcrumb',trans('frontend.cart'))


@section('content')
  @include('pages.ajax-pages.cart-html')	
@endsection  