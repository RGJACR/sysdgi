<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DGI - SYSTEM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="vistas/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="vistas/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="vistas/plugins/summernote/summernote-bs4.min.css">
</head>
<!-- <body class="hold-transition sidebar-mini layout-fixed login-page">
<div class="wrapper">; -->

  <!-- Preloader -->
<!--   <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vistas/dist/img/dre.png" alt="DRE-DGI" height="110" width="110">
  </div> -->
  <!-- datatable -->
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">



<!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="vistas/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="vistas/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="vistas/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="vistas/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="vistas/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="vistas/plugins/moment/moment.min.js"></script>
<script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="vistas/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="vistas/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="vistas/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="vistas/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="vistas/dist/js/pages/dashboard.js"></script> -->
<!-- datatable -->
<script type="text/javascript" src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="vistas/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="vistas/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!--SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>



<?php 

    if ((isset($_SESSION['iniciarsesion']) && $_SESSION['iniciarsesion']=="ok")){
      // code...
      // 
      // 
      echo '<body class="hold-transition sidebar-mini layout-fixed">';
      echo '<div class="wrapper">';
      include "modulos/encabezado.php";
      include "modulos/menu.php";

      if(isset($_GET['ruta']))
      {
        if ($_GET['ruta']=="escale"||$_GET['ruta']=="directivo"||
          $_GET['ruta']=="nexus"||$_GET['ruta']=="siagie"||
          $_GET['ruta']=="docente"||$_GET['ruta']=="inicio"||$_GET['ruta']=="salir") 
        {
           // code...
         include "vistas/modulos/". $_GET['ruta'].".php";
       }
       else{
         include "vistas/modulos/404.php";
       } 
         // echo $_GET['ruta'];
     }

      // include "modulos/inicio.php";
     include "modulos/footer.php";
    }

    else{
      echo '<body class="hold-transition sidebar-mini layout-fixed login-page">';
      include "vistas/modulos/login.php";
      // echo "incorrecto";
    }

 ?>
 
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/docente.js"></script> 
<script src="vistas/js/directivo.js"></script> 

</body>
</html>
