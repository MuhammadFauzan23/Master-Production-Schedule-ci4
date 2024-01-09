<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <lottie-player class="text-center mt-5" src="<?= base_url('asset/animasi/edit_data.json') ?>" background="transparent" speed="0.5" style="width: auto; height: auto;" loop autoplay></lottie-player>
            </div>
            <?php for ($i = 0; $i < count($schedule_list); $i++) : ?>
                <?php foreach ($schedule_list[$i] as $form2) : ?>
                    <?php if ($form2['stts'] == 'Job') { ?>
                        <div class="col-md-8">
                            <div class="col-12">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col mt-2">
                                                <h3 class="card-title">Edit data schedule</h3>
                                            </div>
                                            <div class="col">
                                                <p id="clock"></p>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- Modal  Edit List Data -->
                                        <form action="<?= base_url('schedule/updateform') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Started Time</label>
                                                            <input type="text" name="started_time" class="form-control" id="startedtime" value="<?= $form2['tgl'] ?>" readonly>
                                                            <input type="hidden" name="idform" value="<?= $form2['idform'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="name">Finishgood</label>
                                                            <select type="text" class="form-control select3 fg" style="  width: 100%;" id="fg_id" name="fg">
                                                                <option value="" selected>-- Select FG --</option>
                                                                <?php foreach ($data_fg as $fg) { ?>
                                                                    <?php if ($fg['idfg'] == $form2['idfg']) : ?>
                                                                        <option value="<?= $fg['idfg'] ?>" selected><?= $fg['idfg'] ?> || <?= $fg['fgcodeint'] ?> - <?= $fg['fgcodegen'] ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $fg['idfg'] ?>"><?= $fg['idfg'] ?> || <?= $fg['fgcodeint'] ?> - <?= $fg['fgcodegen'] ?></option>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">No Rev</label>
                                                                    <select type="text" class="form-control select3 no_rev" style="  width: 100%;" id="no_rev" name="no_rev">
                                                                        <option value="0">-- Select Rev No --</option>
                                                                        <?php foreach ($revno as $rev) { ?>
                                                                            <?php if ($rev['revno'] == $form2['no_rev']) : ?>
                                                                                <option value="<?= $rev['revno'] ?>" selected><?= $rev['revno'] ?></option>
                                                                            <?php else : ?>
                                                                                <option value="<?= $rev['revno'] ?>"><?= $rev['revno'] ?></option>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="material">BOM</label>
                                                                    <input type="text" class="form-control cav" id="cav_id" name="cav" readonly value="<?= $form2['cav'] ?>"></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="material">Material</label>
                                                            <input type="text" class="form-control material" id="material" name="material" readonly value="<?= $form2['material'] ?>"></input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Machine</label>
                                                            <select type="text" class="form-control machine" style="  width: 100%;" id="machine" name="machine">
                                                                <option value="">-- Select Machine --</option>
                                                                <?php foreach ($mesin as $mcn) { ?>
                                                                    <?php if ($mcn['idmachine'] == $form2['mc']) : ?>
                                                                        <option value="<?= $mcn['idmachine'] ?>" selected>Machine : <?= $mcn['idmachine'] ?> || Desc Machine : <?= $mcn['machinedesc'] ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $mcn['idmachine'] ?>">Machine : <?= $mcn['idmachine'] ?> || Desc Machine : <?= $mcn['machinedesc'] ?></option>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>R/C No</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="rc_no" class="form-control" id="rcno" value="<?= $form2['rc_no'] ?>" required>
                                                                        <input type="text" hidden name="sec_hours" class="form-control" id="sec_hours" value="<?= $form2['sec_hours'] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>R/C</label>
                                                                    <input type="text" name="r_c" class="form-control" id="rc" value="<?= $form2['r_c'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Actual</label>
                                                                    <input type="text" name="actual" class="form-control" id="actual" value="<?= $form2['act'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="name">R/C Qty</label>
                                                                    <input type="text" name="rc_qty" class="form-control" id="rc_qty" value="<?= $form2['rc_qty'] ?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="name">Production QTY</label>
                                                                    <input type="text" name="fg_qty_vf" class="form-control" id="" value="<?= $form2['totalqty'] ?>" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="name">Bal R-C Qty</label>
                                                                    <input type="text" name="bal_rc_qty" class="form-control" id="bal_rc_qty" value="<?= $form2['bal_rc_qty'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">Mould Size</label>
                                                                    <select type="text" class="form-control " style="  width: 100%;" id="mould_size" name="mould_size">
                                                                        <option value="">-- Select Size --</option>
                                                                        <?php foreach ($mould_sz as $sz) { ?>
                                                                            <?php if ($sz['id'] == $form2['mould_size']) : ?>
                                                                                <option value="<?= $sz['id'] ?>" selected><?= $sz['mould_size'] ?> </option>
                                                                            <?php else : ?>
                                                                                <option value="<?= $sz['id'] ?>"><?= $sz['mould_size'] ?> </option>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">Mould Status</label>
                                                                    <select type="text" class="form-control" style="  width: 100%;" id="mould_status" name="mould_status">
                                                                        <option value="">-- Select Status --</option>
                                                                        <?php foreach ($mould_stts as $stts) { ?>
                                                                            <?php if ($stts['id'] == $form2['mould_status']) : ?>
                                                                                <option value="<?= $stts['id'] ?>" selected><?= $stts['mould_name'] ?> </option>
                                                                            <?php else : ?>
                                                                                <option value="<?= $stts['id'] ?>"><?= $stts['mould_name'] ?> </option>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Shortage Date</label>
                                                            <input name="shortage_date" class="form-control" id="shortage_date" value="<?= $form2['shortage_date'] ?>"></input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Remarks</label>
                                                            <input name="remarks" class="form-control" id="remarks_id"> <?= $form2['remarks'] ?></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } elseif ($form2['stts'] == 'Sampel') {
                        $sampel = '';
                        $idfg  = explode(":", $form2['idfg']);
                    ?>
                        <div class="col-md-8">
                            <div class="col-12">
                                <div class="card mt-3">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col mt-2">
                                                <h3 class="card-title">Edit data Sampel</h3>
                                            </div>
                                            <div class="col">
                                                <p id="clock"></p>
                                            </div>
                                            <div class="col">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <!-- Modal  Edit List Data -->
                                        <form action="<?= base_url('schedule/updateform') ?>" method="post">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Started Time</label>
                                                            <input type="text" name="started_time" class="form-control" id="startedtime" value="<?= $form2['tgl'] ?>" readonly>
                                                            <input type="hidden" name="idform" value="<?= $form2['idform'] ?>">
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">FG Int Code</label>
                                                                    <input type="text" class="form-control" name="fg_int_code" id="fg_int_code" value="<?= $idfg[0] ?>"></input>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">FG Gen Code</label>
                                                                    <input type="text" class="form-control" name="fg_gen_code" id="fg_gen_code" value="<?= $idfg[1] ?>"></input>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Rev No</label>
                                                                    <input type="text" class="form-control" id="no_rev" name="no_rev" value="<?= $form2['no_rev'] ?>"></input>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">BOM</label>
                                                                    <input type="text" class="form-control cav" id="cav_id" name="cav" value="<?= $form2['cav'] ?>"></input>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Material</label>
                                                            <input type="text" class="form-control material" id="material" name="material" value="<?= $form2['material'] ?>"></input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Machine</label>
                                                            <select type="text" class="form-control machine" style="  width: 100%;" id="machine" name="machine">
                                                                <option value="">-- Select Machine --</option>
                                                                <?php foreach ($mesin as $mcn) { ?>
                                                                    <?php if ($mcn['idmachine'] == $form2['mc']) : ?>
                                                                        <option value="<?= $mcn['idmachine'] ?>" selected>Machine : <?= $mcn['idmachine'] ?> || Desc Machine : <?= $mcn['machinedesc'] ?></option>
                                                                    <?php else : ?>
                                                                        <option value="<?= $mcn['idmachine'] ?>">Machine : <?= $mcn['idmachine'] ?> || Desc Machine : <?= $mcn['machinedesc'] ?></option>
                                                                    <?php endif; ?>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>R/C No</label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="rc_no" class="form-control" id="rcno" value="<?= $form2['rc_no'] ?>" required>
                                                                        <input type="text" hidden name="sec_hours" class="form-control" id="sec_hours" value="<?= $form2['sec_hours'] ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>R/C</label>
                                                                    <input type="text" name="r_c" class="form-control" id="rc" value="<?= $form2['r_c'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Actual</label>
                                                                    <input type="text" name="actual" class="form-control" id="actual" value="<?= $form2['act'] ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="name">R/C Qty</label>
                                                                    <input type="text" name="rc_qty" class="form-control" id="rc_qty" value="<?= $form2['rc_qty'] ?>" required>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="name">Production QTY</label>
                                                                    <input type="text" name="fg_qty_vf" class="form-control" id="" value="<?= $form2['totalqty'] ?>" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="name">Bal R-C Qty</label>
                                                                    <input type="text" name="bal_rc_qty" class="form-control" id="bal_rc_qty" value="<?= $form2['bal_rc_qty'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">Mould Size</label>
                                                                    <select type="text" class="form-control " style="  width: 100%;" id="mould_size" name="mould_size">
                                                                        <option value="">-- Select Size --</option>
                                                                        <?php foreach ($mould_sz as $sz) { ?>
                                                                            <?php if ($sz['id'] == $form2['mould_size']) : ?>
                                                                                <option value="<?= $sz['id'] ?>" selected><?= $sz['mould_size'] ?> </option>
                                                                            <?php else : ?>
                                                                                <option value="<?= $sz['id'] ?>"><?= $sz['mould_size'] ?> </option>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="name">Mould Status</label>
                                                                    <select type="text" class="form-control" style="  width: 100%;" id="mould_status" name="mould_status">
                                                                        <option value="">-- Select Status --</option>
                                                                        <?php foreach ($mould_stts as $stts) { ?>
                                                                            <?php if ($stts['id'] == $form2['mould_status']) : ?>
                                                                                <option value="<?= $stts['id'] ?>" selected><?= $stts['mould_name'] ?> </option>
                                                                            <?php else : ?>
                                                                                <option value="<?= $stts['id'] ?>"><?= $stts['mould_name'] ?> </option>
                                                                            <?php endif; ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Shortage Date</label>
                                                            <input name="shortage_date" class="form-control" id="shortage_date" value="<?= $form2['shortage_date'] ?>"></input>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Remarks</label>
                                                            <input name="remarks" class="form-control" id="remarks_id"> <?= $form2['remarks'] ?></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>
</div>
<!-- /.content -->


<script type="text/javascript" async>
    //JAVASCRIPT MENAMPILKAN DATA REV/BOM
    $(".fg").change(function() {
        var id_fg = $(".fg").val();
        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            type: "POST",
            url: "<?= base_url('schedule/ambilDataRev') ?>",
            data: "finishgood=" + id_fg,
            success: function(rev_no) {
                $('.no_rev').html(rev_no)
            },
        });
        $.ajax({
            type: "POST",
            url: "<?= base_url('schedule/ambilDataRev') ?>",
            data: "finishgood=" + id_fg,
            success: function(data) {
                $('.cav').val(data.bom)
                $('.material').val(data.material_desc)
            }
        });
    });
    //----------------------------------------------------------------------------------------------------------

    //JAVASCRIPT MENAMPILKAN DATA Material
    $(".no_rev").change(function() {
        var norev = $(".no_rev").val();
        var id_fg = $(".fg").val();

        console.log(norev)
        console.log(id_fg)

        // Menggunakan ajax untuk mengirim dan dan menerima data dari server
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "<?= base_url('schedule/ambilDatamtr') ?>",
            data: "Norev=" + norev + "&idfg=" + id_fg,
            success: function(data) {
                $('.cav').val(data.bom)
                $('.material').val(data.material_desc)
                console.log(data)
            }
        });
    });
    //----------------------------------------------------------------------------------------------------------

    //JAVASCRIPT MENAMPILKAN DATA MOULD SIZE
    $.ajax({
        type: "get",
        url: "<?= base_url('schedule/MouldSize') ?>",
        dataType: "json",
        success: function(response) {
            if (response) {
                response.forEach(function(data) {
                    $('.mouldsize').append(`<option value="${data.mould_size}"> ${data.mould_size} </option>`);
                })
            } else {
                console.log(response)
            }
        }
    });
    //----------------------------------------------------------------------------------------------------------

    //JAVASCRIPT MENAMPILKAN DATA MOULD STATUS
    $.ajax({
        type: "get",
        url: "<?= base_url('schedule/MouldStatus') ?>",
        dataType: "json",
        success: function(response) {
            if (response) {
                response.forEach(function(data) {
                    $('.mouldstatus').append(`<option value="${data.mould_name}"> ${data.mould_name} </option>`);
                })
            } else {
                console.log(response)
            }
        }
    });
    //----------------------------------------------------------------------------------------------------------

    //JAVASCRIPT COPAS INPUT
    $("#rc_qty").on('change keydown paste input', function() {
        $('#bal_rc_qty').val($('#rc_qty').val())
    })

    $("#rc_qty_sampel").on('change keydown paste input', function() {
        $('#bal_rc_qty_sampel').val($('#rc_qty_sampel').val())
    })

    //----------------------------------------------------------------------------------------------------------
</script>
<?= $this->endSection() ?>