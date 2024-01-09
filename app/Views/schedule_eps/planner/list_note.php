<?= $this->extend('layout/tamplate'); ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content'); ?>


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="card-body ">
                        <lottie-player class="text-center" src="<?= base_url('asset/animasi/note_modal.json') ?>" background="transparent" speed="0.5" style="width: auto; height: auto;" loop autoplay></lottie-player>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col mt-2">
                                <h4>Note & List</h4>
                            </div>
                            <div class="col">
                                <div style="text-align: right;">
                                    <a href="" class="btn btn-info m-2" data-toggle="modal" data-target="#modal-xl"><i class="icon-copy dw dw-folder-2"></i> Add New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" style="width:100%">
                            <thead align="center">
                                <tr>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th>Note</th>
                                    <th style="min-width: 100px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($note_list as $note) : ?>
                                    <tr>
                                        <td class=""><?= $note['message']; ?></td>
                                        <td align="center" class=""><?= $note['tgl']; ?></td>
                                        <td align="center" class=""><a class="btn btn-info" data-toggle="modal" data-target="#message_note<?= $note['idnote']; ?>"><i class="fab fa-airbnb"></i></a></td>
                                        <td align="center" class="">
                                            <?php
                                            $id = base64_encode(urlencode($note['idnote']));
                                            ?>
                                            <a href="<?= base_url() . '/note/tampilkan_note?id=' . $id; ?>" class="btn btn-primary m-1"><?= cek_tampil($note['view_note']) ?></a>
                                            <a class="btn btn-warning m-1" data-toggle="modal" data-target="#editNote<?= $note['idnote'] ?>" href=""><i class="fas fa-edit"></i></a>
                                            <a href="<?= base_url() . '/note/delete_note?id=' . $id; ?>" class="btn btn-danger m-1 hapus"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- Modal Add Note -->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Form</h5>
            </div>
            <!-- class="was-validated" -->
            <form action="<?= base_url('note/addnote') ?>" method="POST">
                <?= csrf_field() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body">
                                <lottie-player src="<?= base_url('asset/animasi/note_modal.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="msg">Message</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="msg" name="msg" placeholder="Boleh kosong">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" id="date" name="date" placeholder="Boleh kosong">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="shift_pagi">Shift Pagi</label>
                                    <input type="text" class="form-control" id="shift_pagi" name="shift_pagi">
                                    <input type="text" class="form-control mt-1" id="flash_pagi" name="flash_pagi" placeholder="pesan">
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
        <!-- modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal -->

<?php foreach ($note_list as $note) : ?>
    <div class="modal fade" id="message_note<?= $note['idnote']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Note Remark</h5>
                </div>
                <div class="modal-body">
                    <?php $listNote = (array) json_decode($note['note']); ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr align="center">
                                <th>Shift</th>
                                <th>Desc</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Pagi</td>
                                <td><b><?= $listNote['shift_pagi'] ? $listNote['shift_pagi'] : "" ?></b></td>
                                <td><?= $listNote['flash_pagi'] ? $listNote['flash_pagi'] : "" ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editNote<?= $note['idnote'] ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- class="was-validated" -->
                <form action="<?= base_url() ?>/note/edit_note?id=<?= $note['idnote']; ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-body">
                                    <lottie-player src="<?= base_url('asset/animasi/note_modal.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="msg">Message</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="msg" name="msg" placeholder="Boleh kosong" value="<?= $note['message']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" id="date" name="date" placeholder="Boleh kosong" value="<?= $note['tgl']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="shift_pagi">Shift Pagi</label>
                                        <input type="text" class="form-control" id="shift_pagi" name="shift_pagi" value="<?= $listNote['shift_pagi'] ? $listNote['shift_pagi'] : "" ?>">
                                        <input type="text" class="form-control mt-1" id="flash_pagi" name="flash_pagi" placeholder="pesan" value="<?= $listNote['flash_pagi'] ? $listNote['flash_pagi'] : "" ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- /.col (LEFT) -->
                        </div>
                        <!-- /.col (RIGHT) -->
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
<?php endforeach; ?>

<?= $this->endSection(); ?>