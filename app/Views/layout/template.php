<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT. Etowa | <?= $title ?></title>
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
    <!-- InputMask -->
    <!-- <script src="<?= base_url('template') ?>/plugins/moment/moment.min.js"></script> -->

    <script src="<?= base_url('asset/js/node_modules/moment/moment.js') ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('template') ?>/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Select2 -->
    <script src="<?= base_url('template') ?>/plugins/select2/js/select2.full.min.js"></script>
    <!-- Date time picker -->
    <script src="<?= base_url('asset') ?>/date/js/jquery.datetimepicker.full.js"></script>

</head>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li> -->
                <li class="nav-item">
                    <div class="btn-group nav-link">
                        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span><img style="width:20px;" src="<?= base_url('template') ?>/dist/img/avatar.png" class="img-circle elevation-2 user-img" alt="User Image"></span>
                            <span class="ml-3">
                                <a><?= session()->get('fullname') ?></a>
                            </span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item logout"><span class="fas fa-power-off"></span> Logout</a>
                            <a class="dropdown-item" data-widget="fullscreen" href="#" role="button"><span class="fas fa-expand-arrows-alt"></span> Fullscreen</a>
                        </div>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-success elevation-4">
            <!-- Brand Logo -->
            <a href="#/index3.html" class="brand-link">
                <img src="<?= base_url('asset') ?>/logo/etw.png" alt="PT.Etowa Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-dark">PT. Etowa Indonesia</span>
            </a>
            Strzul2022!
            <?= $this->renderSection('sidebar') ?>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>

        <footer class="main-footer">
            <div class="row">
                <div class="col-md-6">
                    <div style="text-align: left; color: black;">
                        <i class="far fa-file-alt"> License of<a href="" data-toggle="modal" data-target="#lisensi"> MPS App </a></i> <span>→</span> <a href=" https://www.etowa.com/"> PT. Etowa Packaging Indonesia</a>
                    </div>
                    <div class="modal fade" id="lisensi">
                        <div class="modal-dialog modal-lg">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h2 class="card-title">Master Production Schedule (MPS) App</h2>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4"><img style="border-radius: 5px;" src="<?= base_url('asset') ?>/logo/licensi_photo.jpg" alt="Fauzan Image" width="230" height="350"></div>
                                        <div class="col-8">
                                            <table class="table table-hover">
                                                <tr>
                                                    <td>Project Manager</td>
                                                    <td>:</td>
                                                    <td>Andi Suseno</td>
                                                </tr>
                                                <tr>
                                                    <td>Position</td>
                                                    <td>:</td>
                                                    <td>Executive</td>
                                                </tr>
                                                <tr>
                                                    <td>Developer</td>
                                                    <td>:</td>
                                                    <td>Muhammad Fauzan</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <td>Colleger</td>
                                                </tr>
                                                <tr>
                                                    <td>College</td>
                                                    <td>:</td>
                                                    <td>Batam State Polytechnic</td>
                                                </tr>
                                                <tr>
                                                    <td>Versi</td>
                                                    <td>:</td>
                                                    <td>1.1</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
                <div class="col-md-6">
                    <div style="text-align: right; color: black;">Copyright &copy; 2014-2021 <a href=" https://adminlte.io">AdminLTE.io</a>. All rights reserved.</div>
                </div>
            </div>
        </footer>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- SweetAlert2 -->
        <script src="<?= base_url('template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('template') ?>/dist/js/adminlte.min.js"></script>
        <!-- Lottie Files Animation -->
        <script src="<?= base_url('asset/animasi/js') ?>/lottie-player.js"></script>
        <script>
            // Javascript Date time picker
            $('.datetimepicker').datetimepicker()

            // Javascript Date Picker
            $('.datepicker').datetimepicker({
                i18n: {
                    de: {
                        months: [
                            'Januar', 'Februar', 'März', 'April',
                            'Mai', 'Juni', 'Juli', 'August',
                            'September', 'Oktober', 'November', 'Dezember',
                        ],
                        dayOfWeek: [
                            "So.", "Mo", "Di", "Mi",
                            "Do", "Fr", "Sa.",
                        ]
                    }
                },
                timepicker: false,
                format: 'd-m-Y'
            });
            // -------------------------------------------------

            //Initialize Select2 Elements
            $('.select2').select2()
            $('.search_select').select2()
            $('.select3').select2()
            $('.select4').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            /** add active class and stay opened when selected */
            var url = window.location;

            // for sidebar menu entirely but not cover treeview
            $('ul.nav-sidebar a').filter(function() {
                return this.href == url;
            }).addClass('active');

            // for treeview
            $('ul.nav-treeview a').filter(function() {
                return this.href == url;
            }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');

            //javascript switch alert
            <?php $pesan = session()->getFlashdata('pesan') ?>
            $(function() {
                <?php if ($pesan) { ?>
                    <?php if ($pesan['stts'] != true) { ?>
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'Terjadi Kesalahan Proses!',
                            text: '<?= $pesan['msg'] ?>',
                            timer: 1500,
                            showClass: {
                                popup: 'animate__animated animate__fadeInUp'
                            },
                            showConfirmButton: false,
                        })
                    <?php } else { ?>
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Proses berhasil!',
                            text: '<?= $pesan['msg'] ?>',
                            timer: 1500,
                            showClass: {
                                popup: 'animate__animated animate__fadeInUp'
                            },
                            showConfirmButton: false,
                        })
                <?php }
                } ?>
            });

            $('.hapus').on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href

                Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Anda tidak dapat memulihkan data ini!",
                    icon: 'warning',
                    position: 'center',
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#FF0000',
                    confirmButtonText: 'Iya, hapus data!',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = url;
                    } else if (result.dismiss) {
                        Swal.fire({
                            title: 'Proses dibatalkan!',
                            text: 'Sekarang data anda aman',
                            icon: 'error',
                            position: 'center',
                            timer: 1400,
                            showClass: {
                                popup: 'animate__animated animate__fadeInUp'
                            },
                            showConfirmButton: false,
                        })
                    }
                })

            })

            $('.edit_data').on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href
                Swal.fire({
                    title: 'Apakah anda ingin mengubah data ini?',
                    text: "Tentukan pilihan!",
                    icon: 'warning',
                    position: 'center',
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#FF0000',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = url;
                    }
                })

            })

            $('.logout').on('click', function(e) {
                e.preventDefault();
                const url = $(this).attr('href'); //mengambil nilai sesuai id dengan get att href
                Swal.fire({
                    title: 'Anda yakin ingin keluar?',
                    text: 'Tentukan pilihan anda',
                    icon: 'warning',
                    position: 'center',
                    showCancelButton: true,
                    confirmButtonColor: '#32CD32',
                    cancelButtonColor: '#FF0000',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = url;
                    } else if (result.dismiss) {
                        Swal.fire({
                            title: 'Kembali ke sistem!',
                            text: 'Terima kasih',
                            icon: 'success',
                            position: 'center',
                            timer: 1400,
                            showClass: {
                                popup: 'animate__animated animate__fadeInUp'
                            },
                            showConfirmButton: false,
                        })
                    }
                })

            })
            //.........................................................................................................
        </script>
</body>

</html>