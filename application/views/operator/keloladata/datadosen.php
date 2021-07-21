<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <h5 class="font-weight-bold text-secondary">Data Dosen</h5>
                </div>
                <div class="col-md-10">
                    <a href="<?= base_url('operator/tambah_dosen') ?>" name="tambahdatadosen" type="button" class="btn btn-warning btn-sm"> <i class="fa fa-user-plus"></i> Tambah Data Dosen</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive-md display" id="dataTable" width="100%">
                <thead class="text-white" style="background-color: #670099;">
                    <tr>
                        <th>No</th>
                        <th>Nidn</th>
                        <th>ID Sinta</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++   ?></td>
                            <td><?= $data->nidn ?></td>
                            <td><?= $data->id_sinta ?></td>
                            <td><?= $data->name ?></td>
                            <td><?= $data->program_studi ?></td>
                            <td><?= $data->fakultas ?></td>
                            <td>
                                <a href="" name="editdatadosen" type="button" class="btn btn-sm ml-1 text-white" style="background-color: #670099;"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="<?= site_url('operator/deldos/' . $data->id) ?>" onclick="return confirm('Hapus data?')" ; type="button" class="btn btn-warning btn-sm ml-1 text-white"> <i class="fa fa-trash"></i> Hapus</a>
                                <a href="<?= site_url('operator/detaildosen/' . $data->id) ?>" name="detaildatadosen" type="button" class="btn btn-sm ml-1 text-white" style="background-color: #670099;"> <i class="far fa-id-card"></i> Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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