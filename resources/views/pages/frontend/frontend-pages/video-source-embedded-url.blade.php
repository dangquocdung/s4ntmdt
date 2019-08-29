@section('embedded-content')

@php
  $pVideo = '<div class="wrapper"><div class="video-wrapper">';
  $pVideo .= $single_product_details['_product_video_feature_source_embedded_code'];
  $pVideo .= '</div></div>';
@endphp

<div class="gallery-item video-btn text-center">
  <a href="#" data-toggle="tooltip" data-type="video" data-video="{{ $pVideo }}"></a>
</div>

@endsection



