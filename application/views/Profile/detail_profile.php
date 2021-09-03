<div class="container-fluid">
    <div class="card shadow mb-3 bg-gray-200">
        <div class="card-header">
            <h5 class="font-weight-bold text-secondary">Detail</h5>
        </div>
        <div class="card-body">
            <?php
            foreach ($row->result() as $key => $data) { ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="font-weight-bold">NIDN</td>
                        <td>:</td>
                        <td><?= $data->nidn ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">ID Sinta</td>
                        <td>:</td>
                        <td><?= $data->id_sinta ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Username</td>
                        <td>:</td>
                        <td><?= $data->username ?></td>
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
                        <td class="font-weight-bold">Progam Studi</td>
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
                    <tr>
                        <td><a href="<?= base_url('dosen/profiledos/' . $data->id) ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                Kembali</a></td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>