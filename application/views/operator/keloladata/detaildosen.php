<div class="container-fluid">
    <div class="card shadow">
        <div class="row">
            <div class="col-2">
                <a href="" name="tambahdatadosen" type="button" class="ml-2 mt-2 mb-2 mr-2 btn btn-warning btn-sm">Tambah Data Dosen</a>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($row->result() as $key => $data) { ?>
                <div class="col-6">
                    <div class="ml-2 mt-2 mr-2 card bg-light" style="width: 35rem;">
                        <div class="card-header" style="background-color: #670099;">
                            <h5 class="font-weight-bold text-white">Detail <?= $data->name; ?></h5>
                        </div>
                    </div>
                    <div class="ml-2 mb-2 card-body bg-gradient-secondary text-white" style="width: 35rem;">
                        <table>
                            <tr>
                                <td class="font-weight-bold">Nidn</td>
                                <td>:</td>
                                <td><?= $data->nidn ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">ID Sinta</td>
                                <td>:</td>
                                <td><?= $data->id_sinta ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Nama</td>
                                <td>:</td>
                                <td><?= $data->name ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Email</td>
                                <td>:</td>
                                <td><?= $data->email ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Jenis Kelamin</td>
                                <td>:</td>
                                <td><?= $data->jk ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Program Studi</td>
                                <td>:</td>
                                <td><?= $data->program_studi ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Fakultas</td>
                                <td>:</td>
                                <td><?= $data->fakultas ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Alamat</td>
                                <td>:</td>
                                <td><?= $data->alamat ?></td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">No Handphone</td>
                                <td>:</td>
                                <td><?= $data->no_hp ?></td>
                            </tr>

                        </table>
                    </div>
                </div>
            <?php } ?>
            <div class="col-6">
                <img style="width: 20rem;" class="ml-4 mt-3 mb-3 img-profile rounded-circle" src="<?= base_url('assets/img/users/') . $data->image ?>" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="<?= base_url('operator/datadosen') ?>" type="button" class="ml-2 mt-2 mb-2 mr-2 btn btn-sm text-white" style="background-color: #670099;">Kembali</a>
                <a href="<?= base_url('') ?>" type="button" class="ml-2 mt-2 mb-2 mr-2 btn btn-warning btn-sm">Hapus</a>
                <a href="<?= base_url('') ?>" type="button" class="ml-2 mt-2 mb-2 mr-2 btn btn-sm text-white" style="background-color: #670099;">Edit</a>
            </div>
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