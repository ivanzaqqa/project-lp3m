<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Arsip Insentif Publikasi special Scopus </h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successalert') ?>
            <?= $this->session->flashdata('successdel') ?>
            <?= $this->session->flashdata('errordel') ?>
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-sidebar text-white">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Jenis Insentif</th>
                        <th>Status</th>
                        <th>File Berita Acara</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($row->result() as $key => $arsip) { ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $arsip->judul_artikel ?></td>
                            <td><?= $arsip->nama_scopus ?></td>
                            <td><?= $arsip->status ?></td>
                            <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/file_berita_acara/' . $arsip->file_berita_acara; ?>">Download</a></button></td>
                            <td>
                                <a href="<?= base_url('dosen/edit_special_scopus/' . $arsip->id_insentif_scopus) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= base_url('dosen/detail_special_scopus/' . $arsip->id_insentif_scopus) ?>" class="btn btn-sm text-white" style="background-color: #670099;">Detail</a>
                                <a class="btn btn-danger btn-sm rounded-0" href="<?= site_url('dosen/del_special_scopus/' . $arsip->id_insentif_scopus) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data insentif special scopus ini?')" type="button" data-toggle="tooltip" title="Delete">Delete</i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.container-fluid -->
</div>