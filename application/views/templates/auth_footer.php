<div class="navbar">
    <div class="container my-auto">
        <div class="copyright my-auto">
            <span style="font-size: 12px; position: fixed; left: 0; bottom: 0; width: 100%; background-color: rgb(103,0,153); color: white; text-align: center;">Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri <img class="mt-1 mb-1" src="<?= base_url() ?>/assets/img/default/lp3m.jpeg" width="80px;" alt=""></span>
        </div>
    </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">Yakin Logout?</div>
            <div class="modal-footer">
                <button class="btn text-white" style="background-color: #670099;" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-warning" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- As a link -->
<script src="<?= base_url() ?>/vendor/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>/vendor/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>/vendor/js/sb-admin-2.min.js"></script>

<!-- //DATATABLES// -->
<script src="<?= base_url() ?>/vendor/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/vendor/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>/vendor/js/demo/datatables-demo.js"></script>
</body>

</html>

<script type="javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>