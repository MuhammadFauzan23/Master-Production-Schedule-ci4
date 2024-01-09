<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Release for teenagers</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/asset/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/asset/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/asset/logo/etw-color-Big.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/dropzone/min/dropzone.min.css">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/dist/css/adminlte.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/4.1.0/css/fixedColumns.dataTables.min.css">

    <!-- Date Time Picker Jquery -->
    <link rel="stylesheet" href="<?= base_url('asset') ?>/date/css/jquery.datetimepicker.css">

    <!-- jQuery -->
    <script src="<?= base_url('template') ?>/plugins/jquery/jquery.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('template') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('template') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('template') ?>/plugins/select2/js/select2.full.min.js"></script>

    <!-- Date time picker -->
    <script src="<?= base_url('asset') ?>/date/js/jquery.datetimepicker.full.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid mt-5">
            <?= $this->renderSection('content') ?>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="<?= base_url('template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>