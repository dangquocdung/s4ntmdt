@section('vendors-products-page-content')

  <!-- Shop Toolbar-->
  <div class="shop-toolbar">
    
    <div class="column">
      <div class="shop-view">
        @if($vendor_products['selected_view'] == 'grid')
          <a class="grid-view active" href="{{ $vendor_products['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><span></span><span></span><span></span></a> 
        @else  
          <a class="grid-view" href="{{ $vendor_products['action_url_grid_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.grid_label') }}"><span></span><span></span><span></span></a>
        @endif

        @if($vendor_products['selected_view'] == 'list')
          <a class="list-view active" href="{{ $vendor_products['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><span></span><span></span><span></span></a>
        @else  
          <a class="list-view" href="{{ $vendor_products['action_url_list_view'] }}" data-toggle="tooltip" data-placement="top" title="{{ trans('frontend.list_label') }}"><span></span><span></span><span></span></a>
        @endif
      </div>
    </div>
  </div>
  <div class="products-list">
    <br>  
    @include('includes.frontend.vendor-products')
    @yield('vendor-products-content')
  </div>
@endsection 