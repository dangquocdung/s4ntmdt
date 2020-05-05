<!doctype html>
<html>
<head>
    @include('includes.admin.head')
</head>
<body id="admin_panel" class="skin-blue sidebar-mini wysihtml5-supported">
  <div class="wrapper">
    @include('includes.admin.header')
    @include('includes.admin.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <section class="content-header">
        @yield('content-header')
      </section>
      <section class="content">
        @yield('content')
      </section>
    </div><!-- /.content-wrapper -->
    <input type="hidden" name="hf_base_url" id="hf_base_url" value="{{ url('/') }}">
    <input type="hidden" name="lang_code" id="lang_code" value="{{ $default_lang_code }}">
    <input type="hidden" name="site_name" id="site_name" value="admin">
    <div class="ajax-request-response-msg" style="display: none; background-color: #333;padding:20px 0px;position:fixed;width:100%;color:#DDD;bottom: 0px;z-index: 999;text-align: center;left: 0px; font-size:16px;"></div>
  </div><!-- ./wrapper -->

  <script>

    if ($('#inputCountry').length > 0) {

      $('#inputCountry').on('click change', function() {
          $.ajax({
              url: $('#hf_base_url').val() + '/ajax/quan-huyen',
              type: 'POST',
              cache: false,
              datatype: 'html',
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              data: { data: this.value },
              success: function(data) {
                  if (data.success == true) {
                      $("#inputState").empty();
                      $("#inputState").html(data.html);
                      $("inputCity").empty();
                  } else {
                      console.log('chua duoc');
                  }
              },
              error: function() {}
          });
      });

    }

    if ($('#inputState').length > 0) {

      $('#inputState').on('click change', function() {
          $.ajax({
              url: $('#hf_base_url').val() + '/ajax/xa-phuong',
              type: 'POST',
              cache: false,
              datatype: 'html',
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              data: { data: this.value },
              success: function(data) {
                  if (data.success == true) {
                      $("#inputCity").empty();
                      $("#inputCity").html(data.html);
                  } else {
                      console.log('chua duoc');
                  }
              },
              error: function() {}
          });

      });

    }

  
  </script>

<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function uploadImage(image) {
    var data = new FormData();
    data.append("image", image);
    $.ajax({
        url: "/admin/luu-hinh-anh",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "POST",
        success: function(filename) {
            var image = $('<img>').attr('src', '/' + filename).attr("width","100%");;
            $('.summernote').summernote("insertNode", image[0]);
        },
        error: function(data) {
            console.log(data);
        }
    });
}
</script>

</body>
</html>