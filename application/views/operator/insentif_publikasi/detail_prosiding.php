<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Detail</h6>
        </div>
        <div class="card-body">
            <?php
            foreach ($row->result() as $key => $data) { ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="font-weight-bold">Judul Artikel</td>
                        <td>:</td>
                        <td><?= $data->judul_artikel ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Jenis Insentif</td>
                        <td>:</td>
                        <td><?= $data->nama_jurnal ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Status</td>
                        <td>:</td>
                        <td><?= $data->status ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Berita Acara</td>
                        <td>:</td>
                        <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/jurnal_prosiding/' . $data->file_publikasi; ?>">Download</a></button></td>
                    </tr>
                    <tr>
                        <td><a href="<?= base_url('dosen/arsip_jurnal_prosiding') ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                Kembali</a></td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>