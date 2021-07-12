<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-icon">
                <img widht="300" class="logo" src="<?= base_url() ?>/assets/img/default/logo.png" alt="">
            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dosen') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Penelitian</span>
            </a>
            <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu</h6>
                    <a class="collapse-item" href="<?= base_url('dosen/arsip_penelitian') ?>">Arsip</a>
                    <a class=" collapse-item" href="<?= base_url('dosen/daftarusulanpenelitian') ?>"">Daftar Usulan Penelitian</a>
                </div>
            </div>
        </li>
        <hr class=" sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Pengabdian Mayarakat</span>
            </a>
            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu</h6>
                    <a class="collapse-item" href="<?= base_url('dosen/arsip_pengabdian') ?>"">Arsip</a>
                    <a class=" collapse-item" href="<?= base_url('dosen/daftarusulanpengabdian') ?>"">Daftar Usulan Pengabdian</a>
                </div>
            </div>
        </li>
        <!-- <li class=" nav-item">
                        <a class="nav-link" href="<?= base_url('dosen/arsip') ?>">
                            <i class="fas fa-fw fa-file-archive"></i>
                            <span>Penelitian</span></a>
        </li> -->
        <!-- <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dosen/daftarusulanpenelitian') ?>">
                <i class="fas fa-fw fa-list"></i>
                <span>Pengabdian Masyarakat</span></a>
        </li> -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dosen/daftarusulanpenelitian') ?>">
                <i class="fas fa-fw fa-search-plus"></i>
                <span>Insentif Publikasi</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('dosen/editprofile') ?>">
                <i class="fas fa-fw fa-user-edit"></i>
                <span>Edit Profile</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>