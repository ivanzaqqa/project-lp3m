<div id="wrapper" style="position: -webkit-sticky;
	position: sticky; top: 0; padding: 0 0px; position: absolute; width: 100%; height: 100%;">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('operator') ?>">
            <div class="sidebar-brand-icon">
                <img widht="300" class="logo" src="<?= base_url() ?>/assets/img/default/logo.png" alt="">
            </div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('operator') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-journal-whills"></i>
                <span>Penelitian</span>
            </a>
            <div id="collapse1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu</h6>
                    <a class=" collapse-item" href="<?= base_url('operator/penelitian') ?>"">Daftar Usulan Penelitian</a>
                </div>
            </div>
        </li>
        <hr class=" sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-layer-group"></i>
                <span>Pengabdian Mayarakat</span>
            </a>
            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu</h6>
                    <a class=" collapse-item" href="<?= base_url('operator/pengabdian_masyarakat') ?>">Daftar Usulan Pengabdian</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-passport"></i>
                <span>Insentif Publikasi</span>
            </a>
            <div id="collapse4" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Jurnal / Prosiding</h6>
                    <a class="collapse-item" href="<?= base_url('operator/arsip_jurnal_prosiding') ?>">Arsip</a>
                    <h6 class="collapse-header">special Scopus</h6>
                    <a class="collapse-item" href="<?= base_url('operator/arsip_special_scopus') ?>">Arsip</a>
                </div>
            </div>
        </li>
        <hr class=" sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-database"></i>
                <span>Kelola Data</span>
            </a>
            <div id="collapse3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu</h6>
                    <a class=" collapse-item" href="<?= base_url('operator/datadosen') ?>">Data Dosen</a>
                    <a class=" collapse-item" href="<?= base_url('operator/periode_pengajuan') ?>">Periode Pengajuan</a>
                    <h6 class="collapse-header">Menu Pembatasan</h6>
                    <a class=" collapse-item" href="<?= base_url('operator/pembatasan_penelitian') ?>">Pembatasan Penelitian</a>
                    <a class=" collapse-item" href="<?= base_url('operator/pembatasan_pengabdian') ?>">Pembatasan Pengabdian</a>
                </div>
            </div>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('operator/editprofile') ?>">
                <i class="fas fa-fw fa-user-edit"></i>
                <span>Edit Profile</span></a>
        </li>
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('operator/upload_template') ?>">
                <i class="fas fa-upload"></i>
                <span>Upload Template</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
            <img class="logo ml-3" style="width: 190px;" src="<?= base_url() ?>/assets/img/default/lp3m.jpeg" alt="logo lp3m">
        </li>
    </ul>