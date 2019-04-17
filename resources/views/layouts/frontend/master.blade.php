<!doctype html>
<html>
<head>
    @include('includes.frontend.head')
</head>
<body>
  
    
    @include('includes.frontend.header')
    
    
    @yield('content')
    
    
    @include('includes.frontend.footer')

    <!-- JS
    ============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- Popper JS -->
    <script src="assets/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Plugins JS -->
    <script src="assets/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
    
    
</body>
</html>