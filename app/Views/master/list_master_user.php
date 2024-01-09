<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h4>Master User</h4>
                    </div>
                    <a href="" style="background-color:#7FFFD4" class="btn mr-1" data-toggle="modal" data-target="#addform"> <i class="nav-icon far fa-plus-square"></i>&nbsp;Add User</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered  tableView">
                    <thead>
                        <tr>
                            <th>NIK</th>
                            <th>Username</th>
                            <th>Fullname</th>
                            <th>Privilege</th>
                            <th>Position</th>
                            <!-- <th>Level App</th> -->
                            <th>Enable Login</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($master_user as $user) : ?>
                            <tr>
                                <td><?= $user['nik'] ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['fullname'] ?></td>
                                <td><?= $user['privilege_name'] ?></td>
                                <td><?= $user['positiondesc'] ?></td>
                                <td><?= $user['enable_login'] ?></td>
                                <td>
                                    <a href="" class="btn btn-warning mb-1" data-toggle="modal" data-target="#editForm<?= $user['nik'] ?>"><i class="fas fa-edit"></i> </a>
                                    <a href="<?= base_url() . '/master/deleteuser?id=' . $user['nik']; ?>" class="btn btn-danger mb-1 hapus"><i class="far fa-trash-alt"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah User-->
<div class="modal fade" id="addform">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="was-validated" action="<?= base_url('Master/addUser') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="text" name="nik" class="form-control" id="" required>
                                <div class="invalid-feedback">
                                    NIK masih kosong...
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" id="" required>
                                <div class="invalid-feedback">
                                    Username masih kosong...
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" name="fullname" class="form-control" id="" required>
                                <div class="invalid-feedback">
                                    Fullname masih kosong...
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Privilege</label>
                                <select type="text" class="form-control" id="privilege" name="privilege" required>
                                    <option value="">-- No Privilege --</option>
                                    <?php foreach ($data_privilege as $privilege) : ?>
                                        <option value="<?= $privilege['id']; ?>"><?= $privilege['privilege_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Privilege masih kosong...
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Position :</label>
                                <select type="text" class=" form-control" id="position" name="position" required>
                                    <option value="">-- No Position --</option>
                                    <?php foreach ($data_position as $p) : ?>
                                        <option value="<?= $p['iduserposition']; ?>"><?= $p['positiondesc']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    Position masih kosong...
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Enable login</label>
                                <select type="text" class="form-control" id="" name="enable_login" required>
                                    <option value="">No Role</option>
                                    <option value="aktif">aktif</option>
                                    <option value="blokir">blokir</option>
                                </select>
                                <div class="invalid-feedback">
                                    Enable login masih kosong...
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End modal -->

<?php foreach ($master_user as $user) : ?>
    <!-- Modal Edit User-->
    <div class="modal fade" id="editForm<?= $user['nik'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT USER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="was-validated" action="<?= base_url('Master/editUser') ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">NIK</label>
                                    <input type="text" name="nik" class="form-control" id="" value="<?= $user['nik'] ?>" required>
                                    <div class="invalid-feedback">
                                        NIK masih kosong...
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control" id="" value="<?= $user['username'] ?>" required>
                                    <div class="invalid-feedback">
                                        Username masih kosong...
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" name="fullname" class="form-control" id="" value="<?= $user['fullname'] ?>" required>
                                    <div class="invalid-feedback">
                                        Fullname masih kosong...
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
                                <!-- <input type="checkbox" onclick="myFunction1()"> Tampilkan Password
                                <script>
                                    function myFunction1() {
                                        var x = document.getElementById("password");
                                        if (x.type === "password") {
                                            x.type = "text";
                                        } else {
                                            x.type = "password";
                                        }
                                    }
                                </script> -->
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Privilege</label>
                                    <select type="text" class="form-control" id="privilege" name="privilege" required>
                                        <option value="">-- No Privilege --</option>
                                        <?php foreach ($data_privilege as $privilege) : ?>
                                            <?php if ($privilege['id']  == $user['privilege']) { ?>
                                                <option value="<?= $privilege['id']; ?>" selected><?= $privilege['privilege_name']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $privilege['id']; ?>"><?= $privilege['privilege_name']; ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Privilege masih kosong...
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Position :</label>
                                    <select type="text" class=" form-control" id="position" name="position" required>
                                        <option value="">-- No Position --</option>
                                        <?php foreach ($data_position as $position) : ?>
                                            <?php if ($position['iduserposition'] == $user['position']) { ?>
                                                <option value="<?= $position['iduserposition']; ?>" selected><?= $position['positiondesc']; ?></option>
                                            <?php } else { ?>
                                                <option value="<?= $position['iduserposition']; ?>"><?= $position['positiondesc']; ?></option>
                                            <?php } ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Position masih kosong...
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Enable login</label>
                                    <select type="text" class="form-control" id="" name="enable_login" required>
                                        <?php if ($user['enable_login'] == 'aktif') { ?>
                                            <option value="">-- Select Status --</option>
                                            <option value="<?= $user['enable_login']; ?>" selected><?= $user['enable_login']; ?></option>
                                            <option value="blokir">blokir</option>
                                        <?php } elseif ($user['enable_login'] == 'blokir') { ?>
                                            <option value="">-- Select Status --</option>
                                            <option value="<?= $user['enable_login']; ?>" selected><?= $user['enable_login']; ?></option>
                                            <option value="aktif">aktif</option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Enable login masih kosong...
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="fullname" class="col-form-label">Konfirmasi Password :</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" value="" required>
                                        <div class="invalid-feedback">
                                            Konfirmasi Password Kosong...!
                                        </div>
                                    </div>
                                </div>
                                <!-- <input type="checkbox" onclick="myFunction2()"> Tampilkan Konfirmasi Password
                                <script>
                                    function myFunction2() {
                                        var y = document.getElementById("konfirmasi_password");
                                        if (y.type === "password") {
                                            y.type = "text";
                                        } else {
                                            y.type = "password";
                                        }
                                    }
                                </script> -->
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End modal -->
<?php endforeach; ?>


<script type="text/javascript" async>
    //javascript switch alert
    <?php $pesan = session()->getFlashdata('pesan') ?>
    $(function() {
        <?php if ($pesan) { ?>
            <?php if ($pesan['stts'] != true) { ?>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Terjadi Kesalahan Proses!',
                    text: '<?= $pesan['msg'] ?>',
                    timer: 2500
                })
            <?php } else { ?>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Proses OK!',
                    text: '<?= $pesan['msg'] ?>',
                    timer: 2500
                })
        <?php }
        } ?>
    });
    //.........................................................................................................

    //JAVASCRIPT DATATABLE
    $(function() {
        $('.tableView').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            stateSave: false,
            "searching": true,
            "ordering": false,
            "scrollX": false,
            // fixedColumns: {
            //     left: 2,
            //     right: 1
            // },
            lengthMenu: [
                [5, 8, 10],
                ["5", "8", "10"]

            ],
        });
    });
    //----------------------------------------------------------------------------------------------------------
</script>
<?= $this->endSection() ?>