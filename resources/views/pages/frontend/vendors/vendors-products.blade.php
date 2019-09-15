@section('vendors-products-page-content')
  
  <div class="products-list">
    <br>  
    @include('includes.frontend.vendor-products')
    @yield('vendor-products-content')
  </div>
@endsection 