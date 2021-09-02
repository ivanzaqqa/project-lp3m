<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Edit Insentif Publikasi special Scopus</h6>
        </div>
        <div class="card-body">
            <div class="row pl-2">
                <?php echo form_open_multipart('dosen/proses_edit_special_scopus'); ?>
                <?= $this->session->flashdata('erroredit'); ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="font-weight-bold">Update Insentif Publikasi Pilihan Special Scopus</td>
                        <td>:</td>
                        <td>
                            <div class="input-group mb-3">
                                <select class="form-control" name="nama_scopus" id="nama_scopus">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($nama_scopus->result() as $key => $data) { ?>
                                        <option value="<?= $data->id_scopus ?>" <?= $data->id_scopus == $row->id_scopus ? "selected" : null ?>><?= $data->nama_scopus ?></option>;
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Judul Artikel</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id_insentif_scopus" id="id_insentif_scopus" value="<?= $row->id_insentif_scopus ?>">
                            <input type="text" value="<?= $row->judul_artikel; ?>" name="judul_artikel" class="form-control form-control-sm bg-light" id="judul_artikel">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Impact Factor Jurnal</td>
                        <td>:</td>
                        <td><input type="text" value="<?= $row->impact_factor_jurnal; ?>" name="impact_factor_jurnal" class="form-control form-control-sm bg-light" id="impact_factor_jurnal"></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">URL Artikel</td>
                        <td>:</td>
                        <td><input type="text" value="<?= $row->url_artikel; ?>" name="url_artikel" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Luaran(PDF)</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($page == 'edit') {
                                if ($row->file_luaran != null) { ?>
                                    <?= $row->file_luaran; ?>
                            <?php }
                            } ?>
                            <input type="file" name="file_luaran" class="form-control form-control-sm bg-light" id="file_luaran">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Proposal Penelitian(PDF)</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($page == 'edit') {
                                if ($row->file_proposal_penelitian != null) { ?>
                                    <?= $row->file_proposal_penelitian; ?>
                            <?php }
                            } ?>
                            <input type="file" name="file_proposal_penelitian" class="form-control form-control-sm bg-light" id="file_proposal_penelitian">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Dokumentasi Kegiatan / Catatan Penelitian(PDF)</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($page == 'edit') {
                                if ($row->file_dokumentasi_catatan != null) { ?>
                                    <?= $row->file_dokumentasi_catatan; ?>
                            <?php }
                            } ?>
                            <input type="file" name="file_dokumentasi_catatan" class="form-control form-control-sm bg-light" id="file_dokumentasi_catatan">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Laporan Akhir(PDF)</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($page == 'edit') {
                                if ($row->file_laporan_akhir != null) { ?>
                                    <?= $row->file_laporan_akhir; ?>
                            <?php }
                            } ?>
                            <input type="file" name="file_laporan_akhir" class="form-control form-control-sm bg-light" id="file_laporan_akhir">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File RPP dan RPS(PDF)</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($page == 'edit') {
                                if ($row->file_rpp_rps != null) { ?>
                                    <?= $row->file_rpp_rps; ?>
                            <?php }
                            } ?>
                            <input type="file" name="file_rpp_rps" class="form-control form-control-sm bg-light" id="file_rpp_rps">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Matakuliah Yang Diampu</td>
                        <td>:</td>
                        <td><input type="text" value="<?= $row->matkul_diampu; ?>" name="matkul_diampu" class="form-control form-control-sm bg-light" id="matkul_diampu"></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Kelompok Riset</td>
                        <td>:</td>
                        <td><input type="text" value="<?= $row->kelompok_riset; ?>" name="kelompok_riset" class="form-control form-control-sm bg-light" id="kelompok_riset"></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Mahasiswa Yang Terlibat "Nama(NIM)"</td>
                        <td>:</td>
                        <td><input type="text" value="<?= $row->mhs_terlibat; ?>" name="mhs_terlibat" class="form-control form-control-sm bg-light" id="mhs_terlibat"></td>
                    </tr>
                    <tr>
                        <td><a href="<?= base_url('dosen/arsip_special_scopus') ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                Kembali</a>
                            <button type="submit" name="edit" class="ml-2 btn btn-sm btn-warning">Update</button>
                        </td>
                    </tr>
                </table>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>