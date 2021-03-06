<nav class="navbar navbar-light bg-sidebar">
    <span class="navbar-brand mb-0 pl-2 h1 text-white"><b>Universitas Kadiri</b></span>
</nav>

<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0 ">
                <div class="row">
                    <div class="col-lg login-page">
                        <div class="p-5">
                            <div class="text-center">
                                <img class="pb-3 logo-login" src="<?= base_url() ?>/assets/img/default/logo.png" alt="">
                                <img class="pb-2" src="<?= base_url() ?>/assets/img/default/lp3m.jpeg" width="130px;" alt="">
                            </div>
                            <?= $this->session->flashdata('message'); ?>
                            <form method="post" action="<?= site_url('auth/process') ?>">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Masukkan username">
                                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-warning btn-user btn-block btn-md" name="login" size="20">
                                    Login
                                </button>
                            </form>
                            <div class="text-center">
                                <a class="small text-white" href="">Lupa Password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>