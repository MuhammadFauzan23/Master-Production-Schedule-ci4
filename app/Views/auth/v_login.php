<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PT. Etowa | Log in Page</title>
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>/asset/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>/asset/logo/etw-color-Big.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/asset/logo/etw-color-Big.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <link rel="stylesheet" href="<?= base_url('template') ?>/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url('template') ?>/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('template') ?>/login/css/style.css">
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-6">
                    <script src="<?= base_url('asset/animasi/js') ?>/lottie-player.js"></script>
                    <lottie-player class="text-center" src="<?= base_url('asset/animasi/computer.json') ?>" background="transparent" speed="1.2" style="width: auto; height: auto;" loop autoplay></lottie-player>
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="mb-4 text-center">
                                <h3><b>Master Production Schedule</b></h3>
                                <h4>EPS Department</h4>
                                <p class="mb-4">Sign in to start your session In App</p>
                            </div>
                            <form action="<?= base_url('auth/login') ?>" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">

                                </div>
                                <div class="form-group last">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group last mb-4">
                                    <input type="checkbox" onclick="myFunction()"> Tampilkan Password
                                    <script>
                                        function myFunction() {
                                            var x = document.getElementById("password");
                                            if (x.type === "password") {
                                                x.type = "text";
                                            } else {
                                                x.type = "password";
                                            }
                                        }
                                    </script>
                                </div>

                                <input type="submit" value="Log In" class="btn btn-block btn-primary">

                            </form>
                            <p class="d-block text-center my-4 text-muted">Check release schedule <span>→</span>
                                <a style="color: black;" href="<?= base_url('release_karyawan/viewreleasekaryawan') ?>"> <b>Click Here</b> </a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('template') ?>/login/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('template') ?>/login/js/popper.min.js"></script>
    <script src="<?= base_url('template') ?>/login/js/bootstrap.min.js"></script>
    <script src="<?= base_url('template') ?>/login/js/main.js"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('template') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script>
        <?php $pesan = session()->getFlashdata('pesan') ?>
        $(function() {
            <?php if ($pesan) { ?>
                <?php if ($pesan['stts'] != true) { ?>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Terjadi Kesalahan!',
                        text: '<?= $pesan['msg'] ?>',
                        timer: 1500,
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
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



        // window.setTimeout(function() {
        //     $('.alert').fadeTo(1500, 0).slideUp(500, function() {
        //         $(this).remove();
        //     })
        // });
    </script>
</body>

</html>