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
                        <td><?= $data->nama_scopus ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Impact Factor Jurnal</td>
                        <td>:</td>
                        <td><?= $data->impact_factor_jurnal ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">URL</td>
                        <td>:</td>
                        <td><?= $data->url_artikel ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Luaran</td>
                        <td>:</td>
                        <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/special_scopus/' . $data->file_luaran; ?>">Download</a></button></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Proposal Penelitian</td>
                        <td>:</td>
                        <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/special_scopus/' . $data->file_proposal_penelitian; ?>">Download</a></button></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Dokumentasi Kegiatan / Catatan Penelitian</td>
                        <td>:</td>
                        <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/special_scopus/' . $data->file_dokumentasi_catatan; ?>">Download</a></button></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Laporan Akhir</td>
                        <td>:</td>
                        <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/special_scopus/' . $data->file_laporan_akhir; ?>">Download</a></button></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File RPP dan RPS</td>
                        <td>:</td>
                        <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/special_scopus/' . $data->file_rpp_rps; ?>">Download</a></button></td>
                    </tr>

                    <tr>
                        <td class="font-weight-bold">Matakuliah Yang Diampu</td>
                        <td>:</td>
                        <td><?= $data->matkul_diampu ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Kelompok Riset</td>
                        <td>:</td>
                        <td><?= $data->kelompok_riset ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Mahasiswa Yang Terlibat </td>
                        <td>:</td>
                        <td><?= $data->mhs_terlibat ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Status</td>
                        <td>:</td>
                        <td><?= $data->status ?></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Berita Acara</td>
                        <td>:</td>
                        <td><button class="btn btn-sm btn-warning"><a style="color: white;" href="<?php echo base_url() . '/upload/insentif_publikasi/file_berita_acara/' . $data->file_berita_acara; ?>">Download</a></button></td>
                    </tr>
                    <tr>
                        <td><a href="<?= base_url('dosen/arsip_special_scopus') ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                Kembali</a></td>
                    </tr>
                </table>
            <?php } ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>