<?= $this->extend('layout/tamplate') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <lottie-player src="<?= base_url('asset/animasi/privacy.json') ?>" class="text-center" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col mt-2">
                                <h3 class="card-title">
                                    <div class="m" style="font-size: 25px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Profile Employee</div>
                                </h3>
                            </div>
                            <div class="col">
                                <div style="text-align: right;">
                                    <a class="btn btn-info " data-toggle="modal" data-target="#editdata"><i class="fas fa-edit"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body box-profile" style="width: 70%;">
                            <?php foreach ($data_user as $user) ?>
                            <table class="table table-striped">
                                <tr class="text-muted">
                                    <td>Fullname</td>
                                    <td>:</td>
                                    <td style="color: black;"><b><?= $user['fullname'] ?></b></td>
                                </tr>
                                <tr class="text-muted ">
                                    <td>Username</td>
                                    <td>:</td>
                                    <td style="color: black;"><b><?= $user['username'] ?></b></td>
                                </tr>
                                <tr class="text-muted">
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td style="color: black;"><b><?= $user['nik'] ?></b></td>
                                </tr>
                                <tr class="text-muted">
                                    <td>Position</td>
                                    <td>:</td>
                                    <td style="color: black;"><b><?= $user['positiondesc'] ?></b></td>
                                </tr>
                                <tr class="text-muted">
                                    <td>Privilege</td>
                                    <td>:</td>
                                    <td style="color: black;"><b><?= $user['privilege_name'] ?></b></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- End Content -->

<!-- Modal Edit -->
<div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="m-2 p-2 was-validated" action="<?= base_url('User/editUser') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username :</label>
                        <div class="input-group">
                            <input type="text" class="form-control " id="username" name="username" value="<?= $user['username'] ?>" required>
                            <div class="invalid-feedback">
                                Username kosong...!
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fullname" class="form-label">Fullname :</label>
                        <div class="input-group">
                            <input type="text" class="form-control " id="fullname" name="fullname" value="<?= $user['fullname'] ?>" required>
                            <div class="invalid-feedback">
                                Nama lengkap kosong...!
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fullname" class="col-form-label">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" value="" required>
                            <div class="invalid-feedback">
                                Password Kosong...!
                            </div>
                        </div>
                    </div>
                    <input type="checkbox" onclick="myFunction1()"> Tampilkan Password
                    <script>
                        function myFunction1() {
                            var x = document.getElementById("password");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>

                    <div class="form-group">
                        <label for="fullname" class="col-form-label">Konfirmasi Password :</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" value="" required>
                            <div class="invalid-feedback">
                                Konfirmasi Password Kosong...!
                            </div>
                        </div>
                    </div>
                    <input type="checkbox" onclick="myFunction2()"> Tampilkan Konfirmasi Password
                    <script>
                        function myFunction2() {
                            var y = document.getElementById("konfirmasi_password");
                            if (y.type === "password") {
                                y.type = "text";
                            } else {
                                y.type = "password";
                            }
                        }
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->
<?= $this->endSection(); ?>