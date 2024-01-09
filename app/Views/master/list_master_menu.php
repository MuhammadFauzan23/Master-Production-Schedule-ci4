<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card m-2 p-2">
                            <div class="row mb-3">
                                <div class="col" style="text-align: left;">
                                    <h5>Sub Menu</h5>
                                </div>
                                <div class="col" style="text-align: right;"> <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="icon-copy dw dw-folder-2"></i> Add Sub Menu</a>
                                </div>
                            </div>
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name Menu</th>
                                        <th>URL</th>
                                        <th>Status</th>
                                        <th>SUB MENU</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($sub_menu as $sm) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $sm['sub_menu'] ?></td>
                                            <td class="text-center"><?= $sm['url'] ?></td>
                                            <td class="text-center"><?= $sm['stts'] ?></td>
                                            <td class="text-center"><?= $sm['menu'] ?></td>
                                            <td class="text-center">
                                                <a href="" class="badge badge-warning text-warning" data-toggle="modal" data-target="#modalsub-menu<?= $sm['id'] ?>"> <i class="fas fa-edit fa-2x text-dark"></i></a>
                                                <a href="<?= base_url("master/hapus_menu_submenu?id=") . $sm['id'] ?>&stts=submenu" class="badge badge-danger text-warning hapus"> <i class="fas fa-trash-alt fa-2x text-dark"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->
                    <div class="col-lg-6">
                        <div class="card m-2 p-2">
                            <div class="row mb-3">
                                <div class="col" style="text-align: left;">
                                    <h5>Menu</h5>
                                </div>
                                <div class="col" style="text-align: right;">
                                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2"><i class="icon-copy dw dw-folder-2"></i> Add Menu</a>
                                </div>
                            </div>
                            <table class="table table-bordered table-hover" id="example3">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th>App</th>
                                        <th>icon</th>
                                        <th>Status</th>
                                        <th>actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($menu as $m) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $m['menu'] ?></td>
                                            <td class="text-center"><?= $m['app'] ?></td>
                                            <td class="text-center"> <i class="fas <?= $m['icon'] ?> mr-2 fa-2x"></i></td>
                                            <td class="text-center"><?= $m['stts'] ?></td>
                                            <td class="text-center">
                                                <a href="" class="badge badge-warning text-warning" data-toggle="modal" data-target="#modal-menu<?= $m['id'] ?>"> <i class="fas fa-edit fa-2x text-dark"></i></a>
                                                <a href="<?= base_url("master/hapus_menu_submenu?id=") . $m['id'] ?>&stts=menu" class="badge badge-danger text-warning hapus"> <i class="fas fa-trash-alt fa-2x text-dark"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
            </div>
        </div>
    </div>


    <!-- ----------------------------------------------------------------------------------------------------MODAL ADD---------------------------------------------------------------------------------------- -->
    <!-- modal  menu start-->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="m-2 p-2 was-validated" action="<?= base_url('master/add_menu_submenu?stts=menu') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="menu" class="col-form-label">Menu :</label>
                            <input type="text" class="form-control " id="menu" name="nama_menu" placeholder="Menu (gunakan simbol - atau _ sebagai pemisah)" required>
                            <div class="invalid-feedback"> Silahkan masukkan menu baru</div>
                        </div>

                        <div class="form-group row">
                            <label for="logo_user" class="col-form-label">Code Icon :</label>
                            <input type="text" class="form-control " id="logo_user" name="code_icon" placeholder="Icon" required>
                            <div class="invalid-feedback">
                                Icon/logo mana...
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
    <!-- modal sub menu start-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form class="m-2 p-2 was-validated" action="<?= base_url('master/add_menu_submenu?stts=submenu') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Sub Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="url" class="col-sm-2 col-form-label">Role Menu :</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" name="menu_id" id="menu_id" required>
                                    <option value="">Pilih Menu</option>
                                    <?php foreach ($menu as $j) : ?>
                                        <option value="<?= $j['id']; ?>"><?= $j['menu']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sub_menu" class="col-sm-2 col-form-label">Menu :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " id="sub_menu" name="sub_menu" placeholder="Name Menu" required>
                                <div class="invalid-feedback">
                                    Name menu kosong...
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-sm-2 col-form-label">URL :</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " id="url" name="url" placeholder="URL (master/user)" required>
                                <div class="invalid-feedback">
                                    data url kosong...
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
    <!-- skill modal end -->
    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <!-- modal edit menu start-->
    <?php foreach ($menu as $m) : ?>
        <div class="modal fade" id="modal-menu<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/master/edit_menu_submenu?data=menu&id=<?= $m['id'] ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Tambah Menu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="menu" class="col-sm-2 col-form-label">Menu :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " id="menu" name="menu" placeholder="Menu (gunakan simbol - atau _ sebagai pemisah)" value="<?= $m['menu'] ?>" required>
                                    <div class="invalid-feedback">
                                        Apa menu nya...
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="logo_user" class="col-sm-2 col-form-label">Icon :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " id="logo_user" name="logo_user" placeholder="Icon" value="<?= $m['icon'] ?>" required>
                                    <div class="invalid-feedback">
                                        Icon/logo mana...
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stts" class="col-sm-2 col-form-label">Status :</label>
                                <div class="col-sm-10">
                                    <select type="text" class="form-control" name="stts" id="stts" required>
                                        <option value="<?= $m['stts'] ?>"><?= $m['stts'] ?></option>
                                        <option value="false">false</option>
                                        <option value="true">true</option>
                                    </select>
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

    <!-- modal edit sub menu start-->
    <?php foreach ($sub_menu as $sm) : ?>
        <div class="modal fade" id="modalsub-menu<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/master/edit_menu_submenu?data=submenu&id=<?= $sm['id'] ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Tambah Sub Menu</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="url" class="col-sm-2 col-form-label">Role Menu :</label>
                                <div class="col-sm-10">
                                    <select type="text" class="form-control" name="menu_id" id="menu_id" required>
                                        <option value="<?= $sm['menu_id'] ?>">No Change</option>
                                        <?php foreach ($menu as $j) : ?>
                                            <option value="<?= $j['id']; ?>"><?= $j['menu']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sub_menu" class="col-sm-2 col-form-label">Menu :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " id="sub_menu" name="sub_menu" placeholder="Name Menu" value="<?= $sm['sub_menu'] ?>" required>
                                    <div class="invalid-feedback">
                                        Name menu kosong...
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-sm-2 col-form-label">URL :</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control " id="url" name="url" placeholder="URL (master/user)" value="<?= $sm['url'] ?>" required>
                                    <div class="invalid-feedback">
                                        data url kosong...
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="stts" class="col-sm-2 col-form-label">Status :</label>
                                <div class="col-sm-10">
                                    <select type="text" class="form-control" name="stts" id="stts" required>
                                        <option value="<?= $sm['stts'] ?>"><?= $sm['stts'] ?></option>
                                        <option value="false">false</option>
                                        <option value="true">true</option>
                                    </select>
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
        <!-- skill modal end -->
    <?php endforeach; ?>
</div>

<script>
    $(function() {
        $('#example2').DataTable({
            "paging": true,
            // "lengthChange": false,
            // "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            lengthMenu: [
                [5, 8, 10],
                ["5", "8", "10"]

            ],
        });

        $('#example3').DataTable({
            "paging": true,
            // "lengthChange": false,
            // "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            lengthMenu: [
                [5, 8, 10],
                ["5", "8", "10"]

            ],
        });

    })
</script>
<?= $this->endSection() ?>