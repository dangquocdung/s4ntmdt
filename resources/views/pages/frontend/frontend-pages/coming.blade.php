@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_shop_title') .' | '. get_site_title() )
@section('breadcrumb',trans('frontend.products'))


@section('content')
<div id="shop_page">
  @include( 'frontend-templates.coming.htttrade.httrade )
</div>	
@endsection  