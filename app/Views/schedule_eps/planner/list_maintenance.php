<?= $this->extend('layout/tamplate'); ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <lottie-player src="<?= base_url('asset/animasi/maintenance.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col  mt-2">
                                <h4>Maintenance Machine</h4>
                            </div>
                            <div class="col">
                                <div class="text-right">
                                    <a href="" class="btn btn-info m-2" data-toggle="modal" data-target="#addMaintenance"><i class="icon-copy dw dw-folder-2"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover tableView" style="width:100%">
                            <thead align="center">
                                <tr>
                                    <th>Machine</th>
                                    <th>Date</th>
                                    <th style="min-width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <?php
                                foreach ($data_maintenance as $menten) :
                                ?>
                                    <tr>
                                        <td class=""><?= $menten['machine']; ?></td>
                                        <td class=""><?= $menten['tgl']; ?></td>
                                        <td align="center">
                                            <?php
                                            $id = base64_encode(urlencode($menten['idmaintenance']));
                                            ?>
                                            <a href="<?= base_url() . '/maintenance/tampilkan_maintenance?id=' . $id; ?>" class="btn btn-primary m-1"><?= cek_tampil($menten['view_maintenance']) ?> <?= csrf_field() ?></a>
                                            <a class="btn btn-warning m-1" data-toggle="modal" data-target="#modal-edit<?= $menten['idmaintenance'] ?>"><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url() . '/maintenance/delete_maintenance?id=' . $id; ?>" class="btn btn-danger m-1 hapus"><i class="fas fa-trash-alt"></i><?= csrf_field() ?></a>
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
    <!--/. container-fluid -->
</section>

<div class="modal fade" id="addMaintenance">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ADD Machine</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- class="was-validated" -->
            <form action="<?= base_url('maintenance/add_maintenance') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <lottie-player src="<?= base_url('asset/animasi/maintenance.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 80%; height: 80%;" loop autoplay></lottie-player>
                            </div>
                        </div>
                        <!-- /.col (LEFT) -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="date">Date / time</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" id="date" name="date" placeholder="Boleh kosong">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="machine">Machine</label>
                                    <select type="text" class="select2 rounded-0" id="machine" name="machine" required>
                                        <option value="">-- Select Machine --</option>
                                        <?php
                                        foreach ($mesin as $m) :
                                            if ($m['stsactive'] == 0) {
                                                $color = 'background-color:red;';
                                            } else {
                                                $color = '';
                                            }
                                        ?>
                                            <option style="<?= $color ?>" value="<?= $m['idmachine'] ?>"><?= " machine : " . $m['idmachine'] . " desc : " . $m['machinedesc'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col (RIGHT) -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>


    </div>
    <!-- /.modal-content -->
</div>

<?php foreach ($data_maintenance as $menten) : ?>
    <div class="modal fade" id="modal-edit<?= $menten['idmaintenance'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Machine</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- class="was-validated" -->
                <form action="<?= base_url('maintenance/edit_maintenance') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <lottie-player src="<?= base_url('asset/animasi/maintenance.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 80%; height: 80%;" loop autoplay></lottie-player>
                                </div>
                            </div>
                            <!-- /.col (LEFT) -->
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="date">Date / time</label>
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $menten['idmaintenance'] ?>">
                                            <input type="text" class="form-control datepicker" id="date" name="date" value="<?= $menten['tgl'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="machine">Machine</label>
                                        <select type="text" class="custom-select rounded-0" id="machine" name="machine" required>
                                            <option value="">-- Select Machine --</option>
                                            <?php
                                            foreach ($mesin as $m) : ?>
                                                <?php if ($m['stsactive'] == 0) {
                                                    $color = 'background-color:red;';
                                                } else {
                                                    $color = '';
                                                }
                                                ?>
                                                <?php if ($m['idmachine'] == $menten['machine']) { ?>
                                                    <option style="<?= $color ?>" value="<?= $m['idmachine'] ?>" selected><?= " Machine : " . $m['idmachine'] . " |---| " .  " desc : " . $m['machinedesc'] ?></option>
                                                <?php } else { ?>
                                                    <option style="<?= $color ?>" value="<?= $m['idmachine'] ?>"><?= " Machine : " . $m['idmachine'] . " |---| " . " desc : " . $m['machinedesc'] ?> </option>
                                                <?php } ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col (RIGHT) -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>


        </div>
        <!-- /.modal-content -->
    </div>
<?php endforeach; ?>

<!-- /.content -->


<?= $this->endSection(); ?>