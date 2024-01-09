<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <lottie-player src="<?= base_url('asset/animasi/calender.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
            </div>
            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col mt-2">
                                <h3 class="card-title">Master Holiday</h3>
                            </div>
                            <div class="col">
                                <div style="text-align: right;">
                                    <a href="" style="background-color:#FF7F50" class="btn mr-1" data-toggle="modal" data-target="#hariLibur"><i class="nav-icon far fa-calendar-alt"></i>&nbsp;Holiday</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover tableView" style="width:100%">
                            <thead align="center">
                                <tr>
                                    <th>NO</th>
                                    <th>Date</th>
                                    <th>Keterangan</th>
                                    <th style="min-width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data_holiday as $holiday) : ?>
                                    <tr align="center">
                                        <td><?= $no++; ?></td>
                                        <td><?= $holiday['tgl_libur']; ?></td>
                                        <td><?= $holiday['keterangan']; ?></td>
                                        <td>
                                            <?php
                                            $tgl = base64_encode(urlencode($holiday['tgl_libur']));
                                            ?>
                                            <a href="<?= base_url() . '/schedule/deletelibur?tgl=' . $tgl; ?>" class="badge badge-danger m-1 hapus"><i class="fas fa-trash-alt fa-2x"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add Libur  -->
        <div class="modal fade" id="hariLibur">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Holiday</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Schedule/addlibur') ?>" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <lottie-player src="<?= base_url('asset/animasi/calender.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="">Date/Time</label>
                                            <input name="tgl" class="form-control datepicker" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Name day</label>
                                            <input name="hari" class="form-control" type="text">
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

</section>
<?= $this->endSection() ?>