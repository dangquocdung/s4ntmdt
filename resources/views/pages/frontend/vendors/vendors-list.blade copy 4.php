@extends('layouts.frontend.master')

@section('title', trans('frontend.vendor_list_title_label') .' | '. get_site_title())

@section('content')

<!-- Page Title-->
<div class="page-title">
  <div class="container">
    <div class="column">
      <h1>{{ trans('frontend.vendor_list_title_label') }}</h1>
    </div>
    <div class="column">
      <ul class="breadcrumbs">
        <li>
          <a href="{{ route('home-page') }}">{{ trans('frontend.home') }}</a>
        </li>
        <li class="separator">&nbsp;</li>
        <li>{{ trans('frontend.vendor_list_title_label') }}</li>
      </ul>
    </div>
  </div>
</div>

<div class="container padding-bottom-2x mb-2" id="vendors-page">

  <!-- Shop Toolbar-->
  <div class="shop-toolbar padding-bottom-1x mb-2">
    <div class="sort-filter-option">
      <label for="sorting">{{ trans('frontend.sort_filter_label') }}:</label>
      <select class="form-control select2 sort-by-filter" id="sorting" style="width: 30%">
      
        @if($vendors_list['sort_by'] == 'all')  
        <option selected="selected" value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
        @else
        <option value="all">{{ trans('frontend.sort_filter_all_label') }}</option>
        @endif

        @if($vendors_list['sort_by'] == 'alpaz')  
        <option selected="selected" value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
        @else
        <option value="alpaz">{{ trans('frontend.sort_filter_alpaz_label') }}</option>
        @endif

        @if($vendors_list['sort_by'] == 'alpza')  
        <option selected="selected" value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
        @else
        <option value="alpza">{{ trans('frontend.sort_filter_alpza_label') }}</option>
        @endif

        @if($vendors_list['sort_by'] == 'old-new')  
        <option selected="selected" value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
        @else
        <option value="old-new">{{ trans('frontend.sort_filter_old_new_label') }}</option>
        @endif

        @if($vendors_list['sort_by'] == 'new-old')
        <option selected="selected" value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
        @else
        <option value="new-old">{{ trans('frontend.sort_filter_new_old_label') }}</option>
        @endif
      </select>
      <!-- </select><span class="text-muted">Showing:&nbsp;</span><span>1 - 12 items</span> -->
    </div>
  </div>
  <!-- Products-->

  @if(count($vendors_list) > 0)

  <div class="isotope-grid cols-4 mb-2">
      <div class="gutter-sizer"></div>
      <div class="grid-sizer"></div>

      @foreach($vendors_list['vendors'] as $vendor)
      
        @if($vendor->user_status == 1 && !is_vendor_expired($vendor->id))
        <?php $details = json_decode($vendor->details);?>

        <div class="grid-item" style="position: absolute; left: 0px; top: 0px;">
          <div class="card mb-30 gian-hang">

            @if(!empty($vendor->user_photo_url))
              <img class="d-block mx-auto img-thumbnail rounded-circle mt-3 mb-3" src="{{ get_image_url($vendor->user_photo_url) }}" alt="{!! $details->profile_details->store_name !!}" style="height:180px;">
            @else
              <img class="d-block mx-auto img-thumbnail rounded-circle mt-3 mb-3" src="{{ default_placeholder_img_src() }}" alt="{!! $details->profile_details->store_name !!}" style="height:180px;">
            @endif

            <div class="card-header">
              <a href="{{ route('store-products-page-content', $vendor->name) }}">{!! $details->profile_details->store_name !!}</a>
            </div>  

          </div>
        </div>
        @endif
      @endforeach
          
  </div>
</div>  

@else
  <br>
  <p>{!! trans('admin.no_store_label') !!}</p>
@endif

@endsection