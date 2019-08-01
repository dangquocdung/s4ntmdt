@extends('layouts.frontend.master')

@section('title', trans('frontend.vendor_list_title_label') .' | '. get_site_title())

@section('breadcrumbs',trans('frontend.vendor_list_title_label'))



@section('content')


      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <!-- Shop Toolbar-->
        {{-- <div class="shop-toolbar padding-bottom-1x mb-2">
          <div class="column">
            <div class="shop-sorting">
              <label for="sorting">Sort by:</label>
              <select class="form-control" id="sorting">
                <option>Popularity</option>
                <option>Low - High Price</option>
                <option>High - Low Price</option>
                <option>Avarage Rating</option>
                <option>A - Z Order</option>
                <option>Z - A Order</option>
              </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span>
            </div>
          </div>
          <div class="column">
            <div class="shop-view"><a class="grid-view active" href="shop-grid-ns.html"><span></span><span></span><span></span></a><a class="list-view" href="shop-list-ns.html"><span></span><span></span><span></span></a></div>
          </div>
        </div> --}}
        <!-- Products Grid-->
        <div class="isotope-grid cols-4 mb-2">
          <div class="gutter-sizer"></div>
          <div class="grid-sizer"></div>

          @if(count($vendors_list) > 0)
            @foreach($vendors_list as $vendor)
              @if($vendor->user_status == 1 && !is_vendor_expired($vendor->id))
                <?php $details = json_decode($vendor->details);?>


                <!-- Product-->
                <div class="grid-item">
                  <div class="product-card">
                    <a class="product-thumb" href="{{ route('store-details-page-content', $vendor->name) }}">

                      @if(!empty($vendor->user_photo_url))
                        <img src="{{ get_image_url($vendor->user_photo_url) }}" alt="Product">
                      @else
                        <img src="{{ default_placeholder_img_src() }}" alt="Product">
                      @endif
                                        
                    </a>
                    <h3 class="product-title"><a href="{{ route('store-details-page-content', $vendor->name) }}">{!! $details->profile_details->store_name !!}</a></h3>
                    <h4 class="product-price">
                        {!! $details->profile_details->address_line_1 !!}
                    </h4>
                    <h4 class="product-price">
                        <strong>{!! trans('frontend.email_label') !!}:</strong> {!! $vendor->email !!}
                    </h4>
                    <h4 class="product-price">
                        <strong>{!! trans('frontend.phone') !!}:</strong> {!! $details->profile_details->phone !!}
                    </h4>
                    <h4 class="product-price">
                        <strong>{!! trans('frontend.member_since_label') !!}:</strong> {!! Carbon\Carbon::parse(  $vendor->created_at )->format('F d, Y') !!}
                    </h4>
                    <div class="product-buttons">
                      <a class="btn btn-outline-primary btn-sm"  href="{{ route('store-details-page-content', $vendor->name) }}">{!! trans('frontend.view_details') !!}</a>
                    </div>
                  </div>
                </div>
                @endif
              @endforeach
            @else
              <br>
              <p>{!! trans('admin.no_store_label') !!}</p>
            @endif
          
          
        </div>
        <!-- Pagination-->
        {{-- <nav class="pagination">
          <div class="column">
            <ul class="pages">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li>...</li>
              <li><a href="#">12</a></li>
            </ul>
          </div>
          <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
        </nav> --}}
      </div>
      

@endsection