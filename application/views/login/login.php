<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Universitas Kadiri</title>
    <link href="<?= base_url() ?>/vendor/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?= base_url()?>/assets/style.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/vendor/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
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
                                        <img class="pb-3 logo-login"src="<?= base_url()?>/assets/img/logo.png" alt="">
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="username" placeholder="Masukkan username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="Password">
                                        </div>
                                        <button type="submit" href="" class="btn btn-warning btn-user btn-block btn-md" name="submit" size="20">
                                            Login
                                        </button>
                                    </form>
                                    <div class="text-center">
                                        <a class="small text-white" href="forgot-password.html">Lupa Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer  class="footer-login sticky-footer bg-sidebar">
        <div class="container ">
            <div class="copyright text-center text-white">
                <span>Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
            </div>
        </div>
    </footer>
    <script src="<?= base_url() ?>/vendor/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/vendor/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>/vendor/js/sb-admin-2.min.js"></script>

</body>

</html>