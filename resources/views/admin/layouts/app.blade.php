<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home | Securetech online</title>
        <!--favi icon-->
        <link rel="icon" type="image/png" href="favi.png" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="admin/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="admin/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="admin/route.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('admin.layouts.navbar')
  <div class="content-wrapper">
    @yield('contents')
  </div>


  <!-- Main Footer -->
  <footer class="main-footer">
    <small>
      <small>
      <strong>Copyright @securetech 2018 All rights reserved.</strong>
      </small>
    </small>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/plugins/knob/jquery.knob.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<script src="admin/route.js"></script>
</body>
</html>
