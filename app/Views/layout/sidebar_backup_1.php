<?= $this->extend('layout/template') ?>
<?= $this->section('sidebar') ?>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
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
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= base_url('Schedule/dashboard') ?>" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>


            <?php if (session()->get('position') == 11 && (session()->get('privilege') == 3)) { ?>
                <li class=" nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            List Schedule
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?= base_url('schedule/viewform') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Production</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('note/viewnote') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Note</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?= base_url('maintenance/viewmaintenance') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maintenance</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Master Holiday
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Schedule/viewHoliday') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Holiday</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } elseif (session()->get('position') == 22 && (session()->get('privilege') == 3)) { ?>
                <li class=" nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            List Schedule
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?= base_url('schedule/viewform') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Production</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('note/viewnote') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Note</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="<?= base_url('maintenance/viewmaintenance') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Maintenance</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } elseif (session()->get('position') == 11 && (session()->get('privilege') == 1)) { ?>
                <li class=" nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-biohazard"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Master/viewUser') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User Master</p>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
            <li class=" nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                        User Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?= base_url('User/dataUser') ?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>


    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->

<?= $this->endSection() ?>