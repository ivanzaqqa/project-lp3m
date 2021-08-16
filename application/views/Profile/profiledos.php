<div class="container-fluid">
    <h5 class=" mb-3 text-gray-800">My Profile</h5>
    <div class="card mb-2 shadow-lg" style="width: 20rem;">
        <img class="card-img-top" src="<?= base_url('assets/img/users/') . $this->fungsi->user_login()->image; ?>" alt="Card image cap">
        <!-- <div class="card-body">
            <h5 class=" mb-3 text-gray-800">My Profile</h5>
        </div> -->
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Nama</b>: <?= $this->fungsi->user_login()->name; ?></li>
            <li class="list-group-item"><b>NIDN</b>: <?= $this->fungsi->user_login()->nidn; ?></li>
            <li class="list-group-item"><b>IDSinta</b>: <?= $this->fungsi->user_login()->id_sinta; ?></li>
            <li class="list-group-item"><b>Nama Lengkap</b>: <?= $this->fungsi->user_login()->name; ?></li>
        </ul>
        <div class="card-body">
            <button href="#" class="btn btn-primary">Detail</button>
            <a href="<?= base_url('dosen/editprofile/') ?>" class="btn btn-warning">Update Data</a>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<footer class=" bg-sidebar">
    <div class="container my-auto">
        <div class="copyright my-auto">
            <span style="font-size: 13px;">Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
        </div>
    </div>
</footer>