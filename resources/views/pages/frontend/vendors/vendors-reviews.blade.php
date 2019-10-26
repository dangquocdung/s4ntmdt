@section('vendors-reviews-page-content')

<div id="vendor-reviews">
  <div class="product-reviews-content">

      @include('pages-message.notify-msg-success')
      @include('pages-message.notify-msg-error')
      @include('pages-message.form-submit')

      <!-- Leave a Review-->
      <form class="modal fade" method="post" id="new_comment_form" tabindex="-1" action="" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="comments_target" id="comments_target" value="vendor">
        <input type="hidden" name="selected_rating_value" id="selected_rating_value" value="">

        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ trans('frontend.add_a_review_label') }}</h4>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="review-rating">{{ trans('frontend.select_your_rating_label') }}</label>
                <div class="rating-select">
                  <div class="btn btn-light btn-sm" data-rating_value="1"><span class="fa fa-star"></span></div>
                  <div class="btn btn-light btn-sm" data-rating_value="2"><span class="fa fa-star"></span></div>
                  <div class="btn btn-light btn-sm" data-rating_value="3"><span class="fa fa-star"></span></div>
                  <div class="btn btn-light btn-sm" data-rating_value="4"><span class="fa fa-star"></span></div>
                  <div class="btn btn-light btn-sm" data-rating_value="5"><span class="fa fa-star"></span></div>
                </div>

              </div>
              <div class="form-group">
                <label for="review-message">{{ trans('frontend.write_your_review_label') }}</label>
                <textarea name="product_review_content" class="form-control" id="product_review_content" rows="8" required></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <input name="review_submit" id="review_submit" class="btn btn-primary" value="{{ trans('frontend.submit_label') }}" type="submit">
            </div>
          </div>
        </div>
      </form>



      <div class="padding-top-1x">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card border-default">
              <div class="card-body">
                <div class="text-center">
                  <div class="d-inline align-baseline display-3 mr-1">{{ $comments_rating_details['average'] }}</div>
                  <div class="d-inline align-baseline text-sm text-warning mr-1">

                      <div class="rating-stars">
                        <div class="star-rating">
                          <span style="width:{{ $comments_rating_details['percentage'] }}%"></span>
                        </div>
                      </div>

                  </div>
                </div>
                <div class="pt-3">
                  <label class="text-medium text-sm rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $comments_rating_details[5] }}%; height: 2px;" aria-valuenow="{{ $comments_rating_details[5] }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $comments_rating_details[4] }}%; height: 2px;" aria-valuenow="{{ $comments_rating_details[4] }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $comments_rating_details[3] }}%; height: 2px;" aria-valuenow="{{ $comments_rating_details[3] }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i></label>
                  <div class="progress margin-bottom-1x">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $comments_rating_details[2] }}%; height: 2px;" aria-valuenow="{{ $comments_rating_details[2] }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <label class="text-medium text-sm rating-stars"><i class="icon-star filled"></i></label>
                  <div class="progress mb-2">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $comments_rating_details[1] }}; height: 2px;" aria-valuenow="{{ $comments_rating_details[1] }}" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="pt-2"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#new_comment_form">{{ trans('frontend.add_a_review_label') }}</a></div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
          @if(count($comments_details) > 0)
            @foreach($comments_details as $comment) 
                <!-- Review-->
                <div class="comment">
                  <div class="comment-author-ava">
                    @if(!empty($comment->user_photo_url))
                      <img alt="" src="{{ get_image_url( $comment->user_photo_url ) }}">
                    @else
                      <img alt="" src="{{ default_avatar_img_src() }}">
                    @endif
                  </div>
                  <div class="comment-body">
                    <div class="comment-header d-flex flex-wrap justify-content-between">
                      <h4 class="comment-title">{{ $comment->display_name }}</h4>
                      <div class="mb-2">
                        <div class="rating-stars">
                          <div class="star-rating">
                            <span style="width:{{ $comment->percentage }}%"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="comment-text">{{ $comment->content }}</p>
                    <!-- <div class="comment-footer"><span class="comment-meta">{{ trans('frontend.by_label') }} {{ $comment->display_name }}</span></div> -->
                  </div>
                </div>
              @endforeach
            @else
              <p>{{ trans('frontend.no_review_label') }}</p>
            @endif
          </div>
        </div>
      </div>
  </div>
</div>

@endsection 