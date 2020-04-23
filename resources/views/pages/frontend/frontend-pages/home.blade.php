@extends('layouts.frontend.master')
@section('title', trans('frontend.shopist_home_title') .' | '. get_site_title() )

@section('facebook')

  <meta property="fb:app_id" content="474963156565592" />
  <meta property="og:url" content="{{ Request::url() }}" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Sàn Giao dịch thương mại điện tử tỉnh Hà Tĩnh" />
  <meta property="og:description" content="Sàn Giao dịch thương mại điện tử tỉnh Hà Tĩnh, nơi mua sắm nhanh chóng, tiện lợi, tiết kiệm, an toàn và tin cậy" />
  <meta property="og:image" content="{{ URL::asset(get_site_logo_image()) }}"/>

  @if($appearance_all_data['header_details']['slider_visibility'] == false && Request::is('/'))
    @foreach(get_appearance_header_settings_data() as $img)

      @if($img->img_url)

          <meta property="og:image" content="{{ get_image_url($img->img_url) }}"/>

      @endif

    @endforeach
  @endif

@stop

@section('content')
  <div id="home_page">
    @include( 'frontend-templates.home.' .$appearance_settings['home']. '.' .$appearance_settings['home'] )
  </div>
@endsection