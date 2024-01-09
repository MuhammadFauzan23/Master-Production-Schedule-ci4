<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <lottie-player src="<?= base_url('asset/animasi/user_profile.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col" style="text-align: left;">
                                <h5>Role User</h5>
                            </div>
                            <div class="col" style="text-align: right;">
                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2"><i class="icon-copy dw dw-folder-2"></i> Add Role</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered tableView">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Role</th>
                                    <th>Add Menu to Role</th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($role as $r) :
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class="text-center"><?= $r['privilege_name'] ?></td>
                                        <td class="text-center">
                                            <div class="btn-group dropright">
                                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ADD</button>
                                                <div class="dropdown-menu">
                                                    <?php foreach ($data_position as $p) : ?>
                                                        <a class="dropdown-item" href="<?= base_url("master/roleUser?id=") . $r['id'] . $p['iduserposition'] ?>"><?= $p['positiondesc'] ?></a>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>

                                        </td>
                                        <td class="text-center">
                                            <a href="" class="badge badge-warning text-warning" data-toggle="modal" data-target="#modal-menu<?= $r['privilege_name'] ?>"> <i class="fas fa-edit fa-2x text-dark"></i></a>
                                            <a href="<?= base_url("master/role_aksi?id=") . $r['id'] . '&stts=delete' ?>" class="badge badge-danger text-warning hapus"> <i class="fas fa-trash-alt fa-2x"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- --------------------------------------------------------------------------------------- Modal -------------------------------------------------------------------------------------- -->
<!-- modal  menu start-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/master/role_aksi?stts=add" method="POST">
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="Role" class="col-sm-2 col-form-label">Role :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control " id="role" name="role" placeholder="Role" required>
                            <div class="invalid-feedback">
                                role masih kosong...
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

<?php foreach ($data_privilage as $r) : ?>
    <div class="modal fade" id="modal-menu<?= $r['privilege_name'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="m-2 p-2 was-validated" action="<?= base_url("master/role_aksi?id=") . $r['id'] . '&stts=edit' ?>" method="POST">
                    <input type="hidden" name="csrf_test_name" value="8bd94ea3ad9aa6a6c0b0832a65095ef4" />
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="role" class="col-sm-2 col-form-label">Role :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " id="role" name="role" placeholder="role" value="<?= $r['privilege_name'] ?>" required>
                                <div class="invalid-feedback">
                                    Apa role nya...
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
<?php endforeach; ?>

<script>
    $(function() {
        $('.tableView').DataTable({
            "paging": true,
            // "lengthChange": false,
            // "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            // fixedColumns: {
            //     left: 2,
            //     right: 1
            // },
            lengthMenu: [
                [5, 10, 15],
                ["5", "10", "15"]

            ],
        });
    });
</script>
<?= $this->endSection() ?>