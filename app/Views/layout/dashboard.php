<?= $this->extend('layout/template') ?>
<?= $this->extend('layout/sidebar_backup') ?>
<?= $this->section('content') ?>
<!-- Main content -->
<section class="content">

    <!-- <h5>pakai table</h5>
    <table>
        <tr>
            <td style="width: 3cm;"><b>Admin</b></td>
            <td>:</td>
            <td style="width: 8cm;">Semoga lulus cumlaude</td>
            <td>5h</td>
        </tr>
        <tr>
            <td style="width: 3cm;"><b>Admin</b></td>
            <td>:</td>
            <td style="width: 8cm;">Semoga lulus cumlaude</td>
            <td>Membanggakan orang tua</td>
        </tr>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>

    <h5>Pakai Div</h5>
    <div class="row">
        <div class="col-1"><b>Admin</b></div>
        <div class="col-2">
            <p>aku adalah admin di sektor piayu</p>
        </div>
        <div class="col-1">
            <p>5h</p>
        </div>
    </div>
    <div class="row">
        <div class="col-1"><b>Admin</b></div>
        <div class="col-2">
            <p>aku adalah admin di sektor piayu</p>
        </div>
        <div class="col-1">
            <p>Membanggakan orang tua</p>
        </div>
    </div> -->

    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">IP Kamu</span>
                        <span class="info-box-number">
                            <?php $exec = 'ipconfig | findstr /R /C:"IPv4.*"';
                            exec($exec, $output);
                            preg_match('/\d+\.\d+\.\d+\.\d+/', $output[0], $matches);
                            print_r($matches[0]);
                            ?>
                            <?= $_SERVER['REMOTE_ADDR'] ?>

                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-4 mt-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-desktop"></i></span>
                    <?php
                    $uaFull = strtolower($_SERVER['HTTP_USER_AGENT']);
                    $data = explode('(', $uaFull);
                    $data2 = explode(')', $data[1]);
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text"> Device Root</span>
                        <span class="info-box-number"> <?= $data2[0] ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 mt-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-firefox-browser"></i></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Browser</span>
                        <span class="info-box-number">
                            <?php
                            $arr_browsers = ["Opera", "Edg", "Chrome", "Safari", "Firefox", "MSIE", "Trident"];
                            $agent = $_SERVER['HTTP_USER_AGENT'];
                            $user_browser = '';
                            foreach ($arr_browsers as $browser) {
                                if (strpos($agent, $browser) !== false) {
                                    $user_browser = $browser;
                                    break;
                                }
                            }
                            switch ($user_browser) {
                                case 'MSIE':
                                    $user_browser = 'Internet Explorer';
                                    break;

                                case 'Trident':
                                    $user_browser = 'Internet Explorer';
                                    break;

                                case 'Edg':
                                    $user_browser = 'Microsoft Edge';
                                    break;
                            }

                            echo $user_browser;
                            ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-body ">
                            <lottie-player class="text-center" src="<?= base_url('asset/animasi/welcome_opening.json') ?>" background="transparent" speed="0.5" style="width: auto; height: auto;" loop autoplay></lottie-player>
                        </div>
                    </div>
                    <!-- ./card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>

<!-- /.content -->

<?= $this->endSection() ?>