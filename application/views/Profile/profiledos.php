<div class="container-fluid">
    <h5 class=" mb-3 text-gray-800">My Profile</h5>
    <?= $this->session->flashdata('successedit') ?>
    <div class="card mb-2 shadow-lg" style="width: 20rem;">
        <?php
        foreach ($row->result() as $key => $data) { ?>
            <img class="card-img-top" src="<?= base_url('assets/users/') . $data->image ?>" alt="Card image cap">
            <!-- <div class="card-body">
            <h5 class=" mb-3 text-gray-800">My Profile</h5>
        </div> -->
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nama</b>: <?= $data->name ?></li>
                <li class="list-group-item"><b>NIDN</b>: <?= $data->nidn ?></li>
                <li class="list-group-item"><b>IDSinta</b>: <?= $data->id_sinta ?></li>
                <li class="list-group-item"><b>Nama Lengkap</b>: <?= $data->name ?></li>
            </ul>
            <div class="card-body">
                <a href="<?= base_url('dosen/detail_profiledos/' . $data->id) ?>" class="btn btn-sm btn-primary">Detail</a>
                <a href="<?= site_url('dosen/editprofile/' . $data->id) ?>" class="btn btn-sm btn-warning">Update</a>
                <a href="<?= site_url('dosen/ganti_password/' . $data->id) ?>" class="btn btn-sm btn-primary">Ganti Password</a>
            </div>
        <?php } ?>
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