@section('vendors-reviews-page-content')

<div class="products-list">

  <div class="card border-default">
    <div class="card-body">
      <div class="text-center">
        <div class="d-inline align-baseline display-3 mr-1">4.2</div>
        <div class="d-inline align-baseline text-sm text-warning mr-1">
            <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
            </div>
        </div>
      </div>
      <div class="pt-3">
        <label class="text-medium text-sm">5 stars <span class='text-muted'>- 38</span></label>
        <div class="progress margin-bottom-1x">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 75%; height: 2px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <label class="text-medium text-sm">4 stars <span class='text-muted'>- 10</span></label>
        <div class="progress margin-bottom-1x">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 20%; height: 2px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <label class="text-medium text-sm">3 stars <span class='text-muted'>- 3</span></label>
        <div class="progress margin-bottom-1x">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 7%; height: 2px;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <label class="text-medium text-sm">2 stars <span class='text-muted'>- 1</span></label>
        <div class="progress margin-bottom-1x">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 3%; height: 2px;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <label class="text-medium text-sm">1 star <span class='text-muted'>- 0</span></label>
        <div class="progress mb-2">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 0; height: 2px;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <div class="pt-2"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#leaveReview">Leave a Review</a></div>
    </div>
  </div>
  <!-- Messages-->
  <div class="comment">
    <div class="comment-author-ava"><img src="img/reviews/01.jpg" alt="Avatar"></div>
    <div class="comment-body">
      <p class="comment-text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi.</p>
      <div class="comment-footer"><span class="comment-meta">Daniel Adams</span></div>
    </div>
  </div>
  <div class="comment">
    <div class="comment-author-ava"><img src="img/reviews/03.jpg" alt="Avatar"></div>
    <div class="comment-body">
      <p class="comment-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
      <div class="comment-footer"><span class="comment-meta">Jacob Hammond, Staff</span></div>
    </div>
  </div>
  <div class="comment">
    <div class="comment-author-ava"><img src="img/reviews/03.jpg" alt="Avatar"></div>
    <div class="comment-body">
      <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      <div class="comment-footer"><span class="comment-meta">Jacob Hammond, Staff</span></div>
    </div>
  </div>
  <!-- Reply Form-->
  <h5 class="mb-30 padding-top-1x">Leave Message</h5>
  <form method="post">
    <div class="form-group">
      <textarea class="form-control form-control-rounded" id="review_text" rows="8" placeholder="Write your message here..." required></textarea>
    </div>
    <div class="text-right">
      <button class="btn btn-outline-primary" type="submit">Submit Message</button>
    </div>
  </form>

</div>

@endsection 