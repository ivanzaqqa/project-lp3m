<div class="container">
    <h3 class="text-center">Tahapan Pelaksanaan Penelitian</h3><br>
    <h2 class="text-center font-weight-bold"><?= $row->judul_penelitian; ?></h2>
    <h4 class="text-center"><?= $this->fungsi->user_login()->name ?></h4>
    <a href="<?= site_url('dosen/arsippenelitian') ?>" class="btn btn-md btn-primary mb-3"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    <?= $this->session->flashdata('successedit') ?>
    <?= $this->session->flashdata('erroredit'); ?>
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-responsive border-0">
                        <tr>
                            <td class="font-weight-bold">Hasil Review Proposal</td>
                            <td>:</td>
                            <td>
                                <?php if ($row->hasil_review != null) { ?>
                                    <a class="btn-sm btn-primary" style="color: white;" href="<?php echo base_url() . '/upload/tahapan_pelaksanaan/' . $row->hasil_review; ?>">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Surat Tugas Penelitian</td>
                            <td>:</td>
                            <td>
                                <?php if ($row->surat_tugas != null) { ?>
                                    <a class="btn-sm btn-primary" style="color: white;" href="<?php echo base_url() . '/upload/tahapan_pelaksanaan/' . $row->surat_tugas; ?>">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>

                    <?= form_open_multipart('dosen/proses_log_book_penelitian/' . $row->id_penelitian); ?>
                    <h5 class="card-title ml-2">Log Book</h5>
                    <table class="table table-responsive border-0">
                        <tr>
                            <td class="font-weight-bold">Tanggal Kegiatan</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_penelitian" id="id_penelitian" value="<?= $row->id_penelitian ?>">
                                <input type="hidden" name="id" id="id" value="<?= $row->id ?>">
                                <input type="date" name="tgl_kegiatan" id="tgl_kegiatan" class="form-control form-control-sm bg-light">
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Uraian Kegiatan</td>
                            <td>:</td>
                            <td>
                                <textarea class="form-control form-control-sm bg-light" name="uraian_kegiatan" id="uraian_kegiatan" cols="30" rows="5" onkeyup="countChar(this)" maxlength="100"></textarea>
                                <div id="charNum"></div>
                            </td>
                        </tr>

                        <script type="text/javascript">
                            function countChar(val) {
                                var len = val.value.length;
                                if (len >= 101) {
                                    val.value = val.value.substring(0, 101);
                                } else {
                                    $('#charNum').text(100 - len + " (Maks. 100 Karakter!)");
                                }
                            };
                        </script>

                        <tr>
                            <td class="font-weight-bold">Dokumentasi</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="dokumentasi" id="dokumentasi" class="form-control form-control-sm bg-light">
                                <small>*Dokumentasi Tidak Wajib Diisi (File Gambar, Word, PDF) atau (Semua File) Ukuran Maks (10 MB)</small>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" name="submit_log_book" class="ml-2 btn btn-md btn-warning">Simpan</button>
                    <?php echo form_close() ?>

                    <hr>
                    <span>Dokumentasi Upload File</span>
                    <table class="mt-2 table table-bordered table-striped table-responsive">
                        <thead class="bg-sidebar text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Kegiatan</th>
                                <th scope="col">Uraian Kegiatan</th>
                                <th scope="col">Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($logs->result() as $key => $data) { ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $data->tgl_kegiatan; ?></td>
                                    <td><?= $data->uraian_kegiatan; ?></td>
                                    <td>
                                        <?php if ($data->dokumentasi != null) { ?>
                                            <a type="button" href="<?php echo base_url() . '/upload/dokumentasi/' . $data->dokumentasi; ?>" class="btn btn-sm btn-primary">Download</a>
                                        <?php } else { ?>
                                            <a>Tidak ada dokumentasi</a>
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body">

                    <?= form_open_multipart('dosen/proses_tahapan_pelaksanaan_penelitian/' . $row->id_penelitian); ?>
                    <table class="table table-responsive border-0">
                        <tr>
                            <td class="font-weight-bold">Laporan Akhir</td>
                            <td>:</td>
                            <td>
                                <!-- <span>Nama file laporan akhir.pdf (tanggal upload)</span> -->
                                <span><?= $row->laporan_akhir ?>

                                    <?php if ($row->tgl_upload_la != null) { ?>
                                        <br> (<?= $row->tgl_upload_la ?>)
                                    <?php } else { ?>

                                    <?php } ?>

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Laporan Akhir</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_penelitian" id="id_penelitian" value="<?= $row->id_penelitian ?>">
                                <input type="file" name="laporan_akhir" class="form-control form-control-sm bg-light" id="laporan_akhir">
                            </td>
                            <td>
                                <?php if ($row->laporan_akhir != null) { ?>
                                    <button type="submit" name="edit_laporan_akhir" onclick="return confirm('Apakah anda yakin ingin mengubah laporan akhir ini?')" class="btn btn-sm btn-primary">Update</button>
                                <?php } else { ?>
                                    <button type="submit" name="edit_laporan_akhir" onclick="return confirm('Apakah anda yakin untuk upload laporan akhir ini?')" class="btn btn-sm btn-primary">Upload</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php echo form_close() ?>

                        <?= form_open_multipart('dosen/proses_tahapan_pelaksanaan_penelitian/' . $row->id_penelitian); ?>
                        <tr>
                            <td class="font-weight-bold">Laporan Keuangan</td>
                            <td>:</td>
                            <td>
                                <!-- <span>Nama file laporan Keuangan.pdf (tanggal upload)</span> -->
                                <span><?= $row->laporan_keuangan ?>

                                    <?php if ($row->tgl_upload_lk != null) { ?>
                                        <br> (<?= $row->tgl_upload_lk ?>)
                                    <?php } else { ?>

                                    <?php } ?>

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Laporan Keuangan</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_penelitian" id="id_penelitian" value="<?= $row->id_penelitian ?>">
                                <input type="file" name="laporan_keuangan" class="form-control form-control-sm bg-light" id="laporan_keuangan">
                            </td>
                            <td>
                                <?php if ($row->laporan_keuangan != null) { ?>
                                    <button type="submit" name="edit_laporan_keuangan" onclick="return confirm('Apakah anda yakin ingin mengubah laporan keuangan ini?')" class="btn btn-sm btn-primary">Update</button>
                                <?php } else { ?>
                                    <button type="submit" name="edit_laporan_keuangan" onclick="return confirm('Apakah anda yakin untuk upload laporan keuangan ini?')" class="btn btn-sm btn-primary">Upload</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php echo form_close() ?>

                        <?= form_open_multipart('dosen/proses_tahapan_pelaksanaan_penelitian/' . $row->id_penelitian); ?>
                        <tr>
                            <td class="font-weight-bold">Artikel Ilmiah</td>
                            <td>:</td>
                            <td>
                                <!-- <span>Nama file laporan akhir.pdf (tanggal upload)</span> -->
                                <span><?= $row->artikel_ilmiah ?>

                                    <?php if ($row->tgl_upload_ai != null) { ?>
                                        <br> (<?= $row->tgl_upload_ai ?>)
                                    <?php } else { ?>

                                    <?php } ?>

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Artikel Ilmiah</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_penelitian" id="id_penelitian" value="<?= $row->id_penelitian ?>">
                                <input type="file" name="artikel_ilmiah" class="form-control form-control-sm bg-light" id="artikel_ilmiah">
                            </td>
                            <td>
                                <?php if ($row->artikel_ilmiah != null) { ?>
                                    <button type="submit" name="edit_artikel_ilmiah" onclick="return confirm('Apakah anda yakin ingin mengubah artikel ilmiah ini?')" class="btn btn-sm btn-primary">Update</button>
                                <?php } else { ?>
                                    <button type="submit" name="edit_artikel_ilmiah" onclick="return confirm('Apakah anda yakin untuk upload artikel ilmiah ini?')" class="btn btn-sm btn-primary">Upload</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php echo form_close() ?>

                        <?= form_open_multipart('dosen/proses_tahapan_pelaksanaan_penelitian/' . $row->id_penelitian); ?>
                        <tr>
                            <td class="font-weight-bold">URL Artikel Ilmiah</td>
                            <td>:</td>
                            <td>
                                <span>*https://<?= $row->url_artikel_ilmiah ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit URL Artikel Ilmiah</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_penelitian" id="id_penelitian" value="<?= $row->id_penelitian ?>">
                                <input type="text" name="url_artikel_ilmiah" class="form-control form-control-sm bg-light" id="url_artikel_ilmiah">
                            </td>
                            <td>
                                <?php if ($row->url_artikel_ilmiah != null) { ?>
                                    <button type="submit" name="edit_url_artikel_ilmiah" onclick="return confirm('Apakah anda yakin ingin mengubah url ini?')" class="btn btn-sm btn-primary">Update</button>
                                <?php } else { ?>
                                    <button type="submit" name="edit_url_artikel_ilmiah" onclick="return confirm('Apakah anda yakin untuk submit url ini?')" class="btn btn-sm btn-primary">Submit</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php echo form_close() ?>

                        <?= form_open_multipart('dosen/proses_tahapan_pelaksanaan_penelitian/' . $row->id_penelitian); ?>
                        <tr>
                            <td class="font-weight-bold">Sertifikat HKI</td>
                            <td>:</td>
                            <td>
                                <!-- <span>Nama file Sertifikat HKI.pdf (tanggal upload)</span> -->
                                <span><?= $row->sertifikat_hki ?>

                                    <?php if ($row->tgl_upload_sh != null) { ?>
                                        <br> (<?= $row->tgl_upload_sh ?>)
                                    <?php } else { ?>

                                    <?php } ?>

                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Sertifikat HKI (Jika Ada)</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_penelitian" id="id_penelitian" value="<?= $row->id_penelitian ?>">
                                <input type="file" name="sertifikat_hki" class="form-control form-control-sm bg-light" id="sertifikat_hki">
                            </td>
                            <td>
                                <?php if ($row->sertifikat_hki != null) { ?>
                                    <button type="submit" name="edit_sertifikat_hki" onclick="return confirm('Apakah anda yakin ingin mengubah sertifikat hki ini?')" class="btn btn-sm btn-primary">Update</button>
                                <?php } else { ?>
                                    <button type="submit" name="edit_sertifikat_hki" onclick="return confirm('Apakah anda yakin untuk upload sertifikat hki ini?')" class="btn btn-sm btn-primary">Upload</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php echo form_close() ?>


                        <tr>
                            <td class="font-weight-bold">Hasil Monev Internal</td>
                            <td>:</td>
                            <td>
                                <?php if ($row->hasil_monev_internal != null) { ?>
                                    <a class="btn-sm btn-primary" style="color: white;" href="<?php echo base_url() . '/upload/tahapan_pelaksanaan/' . $row->hasil_monev_internal; ?>">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Berita Acara Insentif Publikasi</td>
                            <td>:</td>
                            <td>
                                <?php if ($row->berita_acara_inspub != null) { ?>
                                    <a class="btn-sm btn-primary" style="color: white;" href="<?php echo base_url() . '/upload/tahapan_pelaksanaan/' . $row->berita_acara_inspub; ?>">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>