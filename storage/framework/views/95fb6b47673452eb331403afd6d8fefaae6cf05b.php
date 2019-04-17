<!doctype html>
<html>
<head>
    <?php echo $__env->make('includes.frontend.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
  
    
    <?php echo $__env->make('includes.frontend.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    
    <?php echo $__env->yieldContent('content'); ?>
    
    
    <?php echo $__env->make('includes.frontend.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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