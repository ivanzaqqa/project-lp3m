<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Submit Insentif Publikasi special Scopus</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successalert') ?>
            <div class="row pl-2">
                <?= form_open_multipart('dosen/proses_submit_special_scopus'); ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="font-weight-bold">Pilihan Scopus</td>
                        <td>:</td>
                        <td>
                            <div class="input-group mb-3 <?= form_error('pilih_scopus') ? 'has-error' : null ?>">
                                <select class="form-control form-control-sm bg-light" name="pilih_scopus" id="pilih_scopus">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($row->result() as $key => $data) { ?>
                                        <option value="<?= $data->id_scopus; ?>"><?= $data->nama_scopus; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('pilih_scopus') ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <div class="<?= form_error('judul_artikel') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">Judul Artikel</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id" id="id" value="<?= $this->fungsi->user_login()->id ?>">
                                <input type="text" name="judul_artikel" class="form-control form-control-sm bg-light" id="judul_artikel">
                            </td>
                            <?= form_error('judul_artikel') ?>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('impact_factor_jurnal') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">Impact Factor Jurnal</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="impact_factor_jurnal" class="form-control form-control-sm bg-light" id="impact_factor_jurnal">
                            </td>
                            <?= form_error('impact_factor_jurnal') ?>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('url_artikel') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">URL Artikel</td>
                            <td>:</td>
                            <td><input type="text" name="url_artikel" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                            <?= form_error('url_artikel') ?>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('file_luaran') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">File Luaran(PDF)</td>
                            <td>:</td>
                            <?= form_error('file_luaran') ?>
                            <td><input type="file" name="file_luaran" value="<?= set_value('file_luaran') ?>" class="form-control form-control-sm bg-light" id="file_luaran" accept="application/pdf"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('file_proposal_penelitian') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">File Proposal Penelitian(PDF)</td>
                            <td>:</td>
                            <?= form_error('file_proposal_penelitian') ?>
                            <td><input type="file" name="file_proposal_penelitian" value="<?= set_value('file_proposal_penelitian') ?>" class="form-control form-control-sm bg-light" id="file_proposal_penelitian" accept="application/pdf"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('file_dokumentasi_catatan') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">File Dokumentasi Kegiatan / Catatan Penelitian (PDF)</td>
                            <td>:</td>
                            <?= form_error('file_dokumentasi_catatan') ?>
                            <td><input type="file" name="file_dokumentasi_catatan" value="<?= set_value('file_dokumentasi_catatan') ?>" class="form-control form-control-sm bg-light" id="file_dokumentasi_catatan" accept="application/pdf"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('file_laporan_akhir') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">File Laporan Akhir(PDF)</td>
                            <td>:</td>
                            <?= form_error('file_laporan_akhir') ?>
                            <td><input type="file" name="file_laporan_akhir" value="<?= set_value('file_laporan_akhir') ?>" class="form-control form-control-sm bg-light" id="file_laporan_akhir" accept="application/pdf"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('file_rpp_rps') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">File RPS & Bahan Ajar(PDF)</td>
                            <td>:</td>
                            <?= form_error('file_rpp_rps') ?>
                            <td><input type="file" name="file_rpp_rps" value="<?= set_value('file_rpp_rps') ?>" class="form-control form-control-sm bg-light" id="file_rpp_rps" accept="application/pdf"></td>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('matkul_diampu') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">Matakuliah Yang Diampu</td>
                            <td>:</td>
                            <td><input type="text" name="matkul_diampu" class="form-control form-control-sm bg-light" id="matkul_diampu"></td>
                            <?= form_error('matkul_diampu') ?>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('kelompok_riset') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">Kelompok Riset</td>
                            <td>:</td>
                            <td><input type="text" name="kelompok_riset" class="form-control form-control-sm bg-light" id="kelompok_riset"></td>
                            <?= form_error('kelompok_riset') ?>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('mhs_terlibat') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">Mahasiswa Yang Terlibat "Nama(NIM)"</td>
                            <td>:</td>
                            <td><input type="text" name="mhs_terlibat" class="form-control form-control-sm bg-light" id="mhs_terlibat"></td>
                            <?= form_error('mhs_terlibat') ?>
                        </div>
                    </tr>
                </table>
                <button type="submit" name="submit" class="ml-2 btn btn-md btn-warning">Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>