@php
  $video = '<div class="wrapper"><div class="video-wrapper">'. $single_product_details['_product_video_feature_source_embedded_code'] . '</div></div>';
@endphp

<div class="gallery-item video-btn text-center">
  <a href="#" data-toggle="tooltip" data-type="video" data-video="{{ $video }}"></a>
</div>