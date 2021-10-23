<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md">
                    <h5 class="font-weight-bold text-secondary">Periode Pengajuan</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successalert') ?>
            <?= $this->session->flashdata('successdel') ?>
            <?= $this->session->flashdata('errordel') ?>

            <?= form_open_multipart('operator/proses_tambah_periode_pengajuan'); ?>
            <div class="table">
                <tr>
                    <td>Tambah Data Periode Pengajuan</td>
                    <td>:</td>
                    <td>
                        <input type="hidden" name="id_periode" id="id_periode" value="">
                        <input type="text" name="tahun_periode">
                    </td>
                    <td>
                        <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </td>
                </tr>
            </div>
            <?= form_close(); ?>
            <br>

            <h6 class="font-weight-bold text-black-50">Periode Pengajuan Yang Aktif</h6>
            <table class="table table-responsive table-striped">
                <thead class="bg-sidebar text-white">
                    <tr style="font-size: small;">
                        <th>No</th>
                        <th>Periode Pengajuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($row->result() as $key => $data) { ?>
                    <tbody>
                        <td><?= $no++ ?></td>
                        <td><?= $data->tahun_periode ?></td>
                        <td>
                            <a class="btn btn-sm btn-danger" href="<?= site_url('operator/del_periode_pengajuan/' . $data->id_periode) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data periode pengajuan ini?')" type="button">Hapus</a>
                            <a href="" type="button" class="btn btn-sm btn-success">Edit</a>
                        </td>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>