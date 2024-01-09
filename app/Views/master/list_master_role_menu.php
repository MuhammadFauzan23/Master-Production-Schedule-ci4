<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <lottie-player src="<?= base_url('asset/animasi/user_profile.json') ?>" class="text-center" background="transparent" speed="0.5" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Hak Akses Pengguna</h5>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>MENU</th>
                                        <th>ICON</th>
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
                                            <td class="text-center"><?= $m['icon'] ?></td>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="input-data" type="checkbox" <?= cek_akses($id, $m['id']); ?> data-role="<?= $id; ?>" data-menu="<?= $m['id']; ?>" onclick="ubah(<?= $id ?>, <?= $m['id'] ?>)">
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- ./card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!--/. section-->
<script>
    function ubah(id, menuId) {
        $.ajax({
            type: "post",
            url: "<?= base_url('master/role_aksi?stts=roleAjax') ?>",
            data: {
                'id_role': id,
                'menu_id': menuId
            },
            dataType: "json",
            success: function(response) {
                if (response.stts == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Proses Berhasil!',
                        text: 'Data berhasil di perbarui!',
                        timer: 1500,
                        showClass: {
                            popup: 'animate__animated animate__fadeInUp'
                        },
                    })
                }
            },
            error: function(xhr, opsi, errors) {
                console.log(xhr.status + "\n" + xhr.responseText + "\n" + errors);
            }
        });
    }

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