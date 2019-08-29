@section('online-url-content')

  @if(!empty($single_product_details['_product_video_feature_source_online_url']))

  @php
      
      $pVideo = '<video id="product_video" controls class="embed-responsive-item"><source src="';
      $pVideo .= $single_product_details['_product_video_feature_source_online_url'];

      if(get_extension($single_product_details['_product_video_feature_source_online_url']) == 'mp4'){

        $pVideo .= '" type="video/mp4"></source></video>';

      }else{

        $pVideo .= '" type="video/ogg"></source></video>';

      }
  @endphp
    
  <div class="gallery-item video-btn text-center">
    <a href="#" data-toggle="tooltip" data-type="video" data-video="{{ $pVideo }}"></a>
  </div>

  @else
    <p>{!! trans('frontend.product_video_no_content_msg') !!}</p>
  @endif

@endsection 