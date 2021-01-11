<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">

    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <link rel="stylesheet" href="assets/css/edit_form.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <!--     Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="assets/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/css/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="assets/css/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/css/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="assets/css/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php require_once 'header.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <!--            Nội dung hiển thị ở đây-->
            <?php echo $this->content; ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php require_once 'footer.php'; ?>
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="assets/js/script.js"></script>
<script src="assets/js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/js/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/js/jquery.vmap.min.js"></script>
<script src="assets/js/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/js/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/js/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/js/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
</body>
</html>