<?= $this->extend('layout/template') ?>
<?= $this->section('sidebar') ?>

<!-- Sidebar -->
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="<?= base_url('template') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2 mt-2" alt="User Image">
        </div>
        <div class="info">
            <a class="d-block"><?= session()->get('fullname') ?></a>
            <?php if (session()->get('position') == 11) { ?>
                <a class="d-block">HOD</a>
            <?php } elseif (session()->get('position') == 22) { ?>
                <a class="d-block">Clerk</a>
            <?php } elseif (session()->get('position') == 33) { ?>
                <a class="d-block">Leader VF/EPS</a>
            <?php } elseif (session()->get('position') == 44) { ?>
                <a class="d-block">Leader Cutting/Packing</a>
            <?php } elseif (session()->get('position') == 66) { ?>
                <a class="d-block">Staff</a>
            <?php } elseif (session()->get('position') == 77) { ?>
                <a class="d-block">Supervisor</a>
            <?php } elseif (session()->get('position') == 88) { ?>
                <a class="d-block">Management</a>
            <?php } elseif (session()->get('position') == 99) { ?>
                <a class="d-block">Master Admin</a>
            <?php } ?>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <?php
    $db = \Config\Database::connect();
    $role = session()->get('role');

    $menu = $db->table('tblweb_aksesmenu')
        ->select('tblweb_menu.*')
        ->join('tblweb_menu', 'tblweb_menu.id = tblweb_aksesmenu.menu_id')
        ->where(['tblweb_aksesmenu.privilege_id ' => $role, 'tblweb_menu.stts' => "true", 'tblweb_menu.app' => "web 1"])
        ->orderBy('tblweb_menu.id', 'ASC')
        ->get()->getResultArray();
    ?>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php foreach ($menu as $m) : ?>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas <?= $m['icon'] ?>"></i>
                        <p>
                            <?= $m['menu'] ?>
                            <i class="right fas fa-cog"></i>
                        </p>
                    </a>

                    <?php
                    $subMenu = $db->table('tblweb_submenu')
                        ->select('tblweb_submenu.*')
                        ->join('tblweb_menu', 'tblweb_submenu.menu_id = tblweb_menu.id')
                        ->where(['tblweb_submenu.menu_id' => $m['id'], 'tblweb_submenu.stts' => "true"])
                        ->orderBy('tblweb_submenu.id', 'ASC')
                        ->get()->getResultArray();
                    ?>
                    <ul class="nav nav-treeview">
                        <?php foreach ($subMenu as $sm) : ?>
                            <li class="nav-item">
                                <a href="<?= base_url($sm['url']) ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p><?= $sm['sub_menu'] ?></p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                </li>
            <?php endforeach; ?>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

<?= $this->endSection() ?>