<nav class="navbar navbar-expand navbar-light bg-sidebar topbar mb-4 static-top shadow">
    <a class="navbar-brand" href="#">
        <img src="<?= base_url() ?>/assets/img/default/logo.png" width="30%" alt="">
    </a>
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white-600 small"><?= $this->fungsi->user_login()->name; ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/img/users/') . $this->fungsi->user_login()->image; ?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card" style=" width: 17rem; background-color: #670099;">
                <div class="card-header">
                    Penelitian
                </div>
                <div class="card-body">
                    <p class="card-text text-white">Menu penelitian</p>
                    <a href="<?= base_url('operator/penelitian') ?>" class="btn btn-primary">Kunjungi</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning" style=" width: 17rem;">
                <div class="card-header">
                    Pengabdian Masyarakat
                </div>
                <div class="card-body">
                    <p class="card-text text-white">Menu pengabdian masyarakat</p>
                    <a href="<?= base_url('operator/pengabdian_masyarakat') ?>" class="btn btn-primary">Kunjungi</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style=" width: 17rem; background-color: #670099;">
                <div class="card-header">
                    Insentif Publikasi
                </div>
                <div class="card-body">
                    <p class="card-text text-white">Menu insentif publikasi</p>
                    <button href="#" class="btn btn-primary">Kunjungi</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning" style=" width: 17rem;">
                <div class="card-header">
                    Kelola Data
                </div>
                <div class="card-body">
                    <p class="card-text text-white">Menu kelola data dosen</p>
                    <a href="<?= base_url('operator/keloladata') ?>" class="btn btn-primary">Kunjungi</a>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer-login sticky-footer bg-sidebar" style="position: absolute; bottom: 0; width:100%;">
    <div class="container-fluid">
        <div class="copyright text-center text-white">
            <span>Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
        </div>
    </div>
</footer>