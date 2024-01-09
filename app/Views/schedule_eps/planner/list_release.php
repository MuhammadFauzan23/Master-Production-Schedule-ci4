<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>


<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center" style="font-size: 30px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Note & List</div>
                    <hr>
                    <?php foreach ($data_note_release as $note) : ?>
                        <?php $listNote = (array) json_decode($note['note_release']); ?>
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
                                    <td align="center"><b><?= $listNote['shift_pagi'] ? $listNote['shift_pagi'] : "" ?></b></td>
                                    <td><?= $listNote['flash_pagi'] ? $listNote['flash_pagi'] : "" ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-4">
                    <form action="<?= base_url('Release/viewrelease') ?>" method="POST">
                        <div class="row text-right mt-2">
                            <input class="custom-select col ml-2 mr-2 datepicker" id="filter" name="filter_tgl" type="text">
                            <button type="submit" name="simpan" class="btn btn-primary ml-2 mr-2">Filter</button>
                        </div>
                    </form>
                    <style type="text/css">
                        #time {
                            background: -webkit-linear-gradient(#2b32b2, #1488cc);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            font-weight: 100;
                        }

                        #clock {
                            background: -webkit-linear-gradient(#2b32b2, #1488cc);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            font-weight: 100;
                        }

                        #realtime {
                            background: -webkit-linear-gradient(#2b32b2, #1488cc);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            font-weight: 100;
                        }

                        #date_release {
                            background: -webkit-linear-gradient(#2b32b2, #1488cc);
                            -webkit-background-clip: text;
                            -webkit-text-fill-color: transparent;
                            font-weight: 100;
                        }
                    </style>
                    <hr>
                    <div id="date_release" class="text-center mt-5" style="font-size: 30px; font-family: Impact, Haettenschweiler, Arial Narrow Bold, sans-serif;">Tanggal Rilis :
                        <?php if (isset($_POST['simpan'])) { ?>
                            <?= date("d-m-Y ", strtotime($_POST['filter_tgl'])) ?>
                        <?php } ?>
                    </div>
                    <hr>
                    <div class=" text-center mt-2" class="text-center" id="realtime" style="font-size: 30px; font-family: Impact, Haettenschweiler,  Arial Narrow Bold, sans-serif;">Waktu saat ini : </div>
                    <div class="text-center" style="font-size: 30px; font-family: Impact, Haettenschweiler,  Arial Narrow Bold, sans-serif;" id="time"></div>
                    <div class="text-center" style="font-size: 30px; font-family: Impact, Haettenschweiler,  Arial Narrow Bold, sans-serif;" id="clock"></div>
                </div>
                <div class="col-md-4">
                    <div class="text-center" style="font-size: 30px; font-family: Impact, Haettenschweiler, ' Arial Narrow Bold', sans-serif;">Maintenance machine</div>
                    <hr>
                    <?php foreach ($data_maintenance_release as $mtn) : ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>Machine</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody align="center">
                                <tr>
                                    <td><b><?= $mtn['machine_release'] ?></b></td>
                                    <td><?= $mtn['tgl_release'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach; ?>
                </div>
            </div>
            <br>
            <hr style="background-color: grey;">
            <div class="row mt-5">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="text-center" style="font-size: 30px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">EPS Schedule</div>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col mt-2">
                    <div class="card-body table-responsive">
                        <table id="tableView" class="table table-bordered tableView" style="width: 100%;">
                            <thead align="center">
                                <tr>
                                    <th style="min-width: 40px;">M/C</th>
                                    <th style="min-width: 160px;">Started Time</th>
                                    <th style="min-width: 100px;">FG INT Code</th>
                                    <th style="min-width: 100px;">FG GEN Code</th>
                                    <th style="min-width: 60px;">R/C No</th>
                                    <th>BOM</th>
                                    <th style="min-width: 70px;">R-C Qty</th>
                                    <th style="min-width: 70px;">Bal R-C Qty</th>
                                    <th style="min-width: 150px;">Material Description</th>
                                    <th style="min-width: 160px;">Shortage Date</th>
                                    <th>Material Density(Kg/m3)</th>
                                    <th>Product Weight(Gr)</th>
                                    <th>Total Material(Kgs)</th>
                                    <th>Mould Size</th>
                                    <th>Mould Status</th>
                                    <th>Remarks</th>
                                    <th>Actual</th> <!-- Actual -->
                                    <th>R/C</th>
                                    <th>OP/hours</th>
                                    <th>Sec/hours</th>
                                    <th style="min-width: 100px;">Total hours required</th>
                                    <th>Running Days</th>
                                </tr>
                            </thead>

                            <tbody align="center">

                                <?php
                                function tgl_next($hari, $thour, $libur) // $hari = data hari | $thour = total hour
                                {
                                    $total_menit = $thour * 60;
                                    //----------------------------------------------------------------
                                    $start_time = DateTime::createFromFormat('d-m-Y H:i:s', trim($hari));
                                    $currentdate = $start_time->format('d-m-Y H:i:s');
                                    $ct = new DateTime($currentdate);
                                    $first_end = $start_time->setTime(16, 0, 0);
                                    $first_end = $first_end->format('d-m-Y H:i:s');
                                    $jarak_ke_jam16 = $ct->diff(new DateTime($first_end));
                                    $menit_dipakai = ($jarak_ke_jam16->h * 60) + $jarak_ke_jam16->i; //540 -> 9 jam
                                    $sisa_menit = $total_menit - $menit_dipakai;
                                    //----------------------------------------------------------------
                                    if ($sisa_menit <= 0) { //Jika kurang dari 0 menit atau tidak lewat jam 16:00 ditampilkan hari itu juga 
                                        $ct->modify('+' . ceil($total_menit) . 'minute');
                                        $final = $ct->format('d-m-Y H:i:s');
                                        return $final;
                                    } else { //Jika lebih dari jam 16:00 lanjut keesokan harinya
                                        $date = $ct->modify('+1 weekday');
                                        if ($sisa_menit <= 540) { //jika kurang dari jam 16:00 / 540 menit
                                            $d = $date->format('d-m-Y'); //ambil format tgl saja untuk di cek 
                                            while (in_array($d, $libur)) { //cek apakah tgl jatuh tempo di hari libur nasional atau engga
                                                $d = $date->modify('+1 weekday')->format('d-m-Y');
                                            }
                                            $ct->modify('+' . ceil($sisa_menit + (7 * 60)) . 'minute');
                                        } else { //Jika di hari 2nd lebih dari jam 16:00 lanjut lagi di keesokan harinya  
                                            while ($sisa_menit > 540) {
                                                $dd = $date->format('d-m-Y'); //ambil format tgl saja untuk di cek
                                                $sisa_menit -= 540;
                                                $date->modify('+1 weekday');
                                            }
                                            while (in_array($dd, $libur)) { //cek apakah proses penambahan tgl tsb jatuh  di hari libur nasional atau engga
                                                $dd = $date->modify('+1 weekday')->format('d-m-Y');
                                            }

                                            while ($sisa_menit > 540) {
                                                $sisa_menit -= 540;
                                                $date->modify('+1 weekday');
                                            }
                                            $d = $date->format('d-m-Y'); //ambil format tgl saja untuk di cek 
                                            while (in_array($d, $libur)) { //cek apakah tgl jatuh tempo di hari libur nasional atau engga
                                                $d = $date->modify('+1 weekday')->format('d-m-Y');
                                            }

                                            $sisa_menit += 7 * 60;
                                            $date->modify('+' . ceil($sisa_menit) . 'minute');
                                        }
                                        $final = $date->format('d-m-Y H:i:s');
                                        return $final;
                                    }
                                }

                                foreach ($data_holiday as $hd) {
                                    $holiday[] = $hd['tgl_libur'];
                                    // dd($holiday);
                                }

                                for ($i = 0; $i < count($data_release); $i++) :

                                    $Running_Mesin = " ";
                                    $total_jam_keseluruhan = 0;
                                    $total_running_days = 0;
                                    //-------------------------
                                    $total_Jam = 0;
                                    $no = 0;
                                    $array_tgl = [];

                                    foreach ($data_release[$i] as $form) :
                                        if ($form['gabung_release'] == 0) {
                                            $colorB = 'background-color:#7FFFD4';
                                        } else {
                                            $colorB = '';
                                        }

                                        if ($form['stts_release'] == "Sampel") {
                                            $colorB = 'background-color:#EDDA74';
                                            $sampel = '';
                                            $idfg  = explode(":", $form['idfg_release']);
                                        } else {
                                            $sampel = 'ada';
                                        }


                                        $total_Jam += $form['total_hours_release'];
                                        if ($form['gabung_release'] == 0) {
                                            $next_tgl = $form['tgl_release'];
                                        } else {
                                            $prev = $no - 1;
                                            if ($form['tgl_release'] == "YES") {
                                                $next_tgl = tgl_next($array_tgl[$prev], 0, $holiday);
                                            } else {
                                                $next_tgl = tgl_next($array_tgl[$prev], $data_release[$i][$prev]['total_hours_release'], $holiday);
                                            }
                                        }
                                        $array_tgl[$no] = $next_tgl;
                                ?>
                                        <tr>
                                            <td style="<?= $colorB ?>"><?= $form['mc_release']; ?></td>
                                            <td style="<?= $colorB ?>"><?= $next_tgl ?></td>
                                            <td style="<?= $colorB ?>"><?= $sampel ? $form['fgcodeint_release'] : $idfg[1]; ?></td>
                                            <td style="<?= $colorB ?>"><?= $sampel ? $form['fgcodegen_release'] : $idfg[0]; ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['rc_no_release']; ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['cav_release']; ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['rc_qty_release']; ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['bal_rc_qty_release']; ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['material_release']; ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['shortage_date_release']; ?></td>
                                            <td style="<?= $colorB ?>">
                                                <?php if ($form['int_density_release'] != 0) { ?>
                                                    <?= $form['int_density_release'] ?> Kg/m3
                                                <?php }
                                                if ($form['int_density_release'] == 0 || $form['int_density_release'] == " ") { ?>
                                                    <?= $form['int_density_release'] = 0 ?> Kg/m3
                                                <?php } ?>
                                            </td>
                                            <td style="<?= $colorB ?>"><?= $sampel ? $form['fgweight_release'] : 0; ?></td>
                                            <?php $total_material =  $form['fgweight_release'] *  $form['rc_qty_release'] / 1000 ?>
                                            <td style="<?= $colorB ?>"><?= $sampel ? round($total_material) : 0 ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['mould_size_release']; ?></td>
                                            <td style="<?= $colorB ?>"><?= $form['mould_status_release']; ?></td>
                                            <td style="<?= $colorB ?>" class="text-center">
                                                <a class="btn btn-secondary" data-toggle="modal" data-target="#remark<?= $form['idform_release']; ?>">
                                                    <i class="fab fa-airbnb fa-1x"></i>
                                                </a>
                                            </td>
                                            <div class="modal fade" id="remark<?= $form['idform_release']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3>Catatan / Note</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="font-size: 20px;"><?= $form['remarks_release'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <td style="<?= $colorB ?>"><?= number_format($form['act_release'], 0, ".", ",") ?></td>
                                            <td style="<?= $colorB ?>"><?= number_format($form['r_c_release'] ? $form['r_c_release'] : $form['act_release'], 0, ".", ",") ?></td>
                                            <td style="<?= $colorB ?>"><?= number_format($form['op_hours_release']) ?></td>
                                            <td style="<?= $colorB ?>"><?= number_format($form['sec_hours_release']) ?></td>
                                            <td style="<?= $colorB ?>">
                                                <?php if ($form["tgl_release"] != "YES") { ?>
                                                    <?= number_format($form['total_hours_release'], 2, ".", ","); ?>
                                                <?php } elseif ($form['total_hours_release'] < 0) { ?>
                                                    <?= abs($form['total_hours_release']); ?>
                                                <?php } elseif ($form['tgl_release'] != "NO") { ?>
                                                    <?= $form['total_hours_release'] = 0; ?>
                                                <?php } ?>
                                            </td>
                                            <?php $running_day = $form['total_hours_release'] / 8.83 ?>

                                            <?php
                                            if ($form["tgl_release"] != "YES") {
                                                $total_jam_keseluruhan += number_format($form['total_hours_release'], 2, ".", ",");
                                            }
                                            $Running_Mesin = $form['mc_release'];
                                            ?>

                                            <td style="<?= $colorB ?>"><?= number_format($running_day, 2, ".", ",") ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td style="background-color: #fcec03;"><?= $Running_Mesin ?></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                        <td style="background-color: #fcec03;">Total : <?= $total_jam_keseluruhan ?></td>
                                        <td style="border: 0; background-color: #000;"></td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript" async>
    //Javascript jam digital 
    setInterval(customTime, 500);

    function customTime() {
        now = new Date();
        if (now.getTimezoneOffset() == 0)(a = now.getTime() + (7 * 60 * 60 * 1000))
        else(a = now.getTime());
        now.setTime(a);
        var tahun = now.getFullYear()
        var hari = now.getDay()
        var bulan = now.getMonth()
        var tanggal = now.getDate()
        var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,")
        var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "/ 12 /")

        document.getElementById('time').innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;

    }

    setInterval(customClock, 500);

    function customClock() {
        var time = new Date();
        var hrs = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();

        document.getElementById('clock').innerHTML = hrs + ":" + min + ":" + sec;

    }
    //------------------------------------------------------------------------------------------------------------

    // JAVASCRIPT DATATABLE
    $('.tableView').DataTable({
        'dom': 'Bflrtip',
        "ordering": false,
        "searching": true,
        "lengthMenu": [
            [50, 60, 70, 80, 90, 90, -1],
            ["50", "60", "70", "80", "90", "All"]
        ],
        "info": true,
        "scrollY": 1000,
        "scrollX": 1000,
        "buttons": ["excel"],
        fixedColumns: {
            left: 3,
            right: 1
        }

    });
    // ---------------------------------------------------------------------------------------------------------
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
</script>

<?= $this->endSection(); ?>