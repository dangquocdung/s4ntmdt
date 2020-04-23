@extends('layouts.frontend.master')
@section('title', $single_product_details['_product_seo_title'] .' | '. get_site_title() )

@section('facebook')

    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $single_product_details['post_title'] }}" />
    <meta property="og:description" content="{!! string_decode($single_product_details['post_content']) !!}" />

    @if(count($single_product_details['_product_related_images_url']->product_gallery_images) > 0)

      @foreach($single_product_details['_product_related_images_url']->product_gallery_images as $key => $row)

          <meta property="og:image" itemprop="image" content="{{ get_image_url($row->url) }}"/>
                    
      @endforeach

    @else
      <meta property="og:image" itemprop="image" content="{{ get_image_url( $single_product_details['post_image_url'] ) }}"/>

    @endif

@stop

@section('content')
  <div id="product_single_page">
    @include( 'frontend-templates.single-product.' .$appearance_settings['single_product']. '.' .$appearance_settings['single_product'] )
  </div>
@endsection
