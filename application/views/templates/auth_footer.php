<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div> -->
            <div class="modal-body">Yakin Logout?</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-warning" href="">Logout</a>
            </div>
        </div>
    </div>
</div>
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