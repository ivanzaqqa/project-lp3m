<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary" style="position: absolute; margin-top: 10px;">Daftar Pengabdian Masyarakat</h6>
            <button class="btn btn-success mt-1 btn-sm" type="button" style="margin-left: 245px;"><a href="<?php echo base_url('operator/exportexcel_pengabmas') ?>" style="color: white;">Export Data</a></button>
            <div class="row mt-2">
                <div class="col-sm-2">
                    <div class="dropdown">
                        <select class="btn btn-sm btn-primary dropdown-toggle" name="periodepengajuan" id="PeriodePengajuan">
                            <option>Pilih Periode Pengajuan</option>
                            <?php foreach ($periodes->result() as $key => $data) { ?>
                                <option value="<?= $data->id_periode; ?>"><?= $data->tahun_periode; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="dropdown">
                        <select class="btn btn-sm btn-primary dropdown-toggle" name="status" id="status">
                            <option>Status</option>
                            <?php foreach ($status->result() as $key => $data) { ?>
                                <option value="<?= $data->id_status; ?>"><?= $data->status; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successedit') ?>
            <?= $this->session->flashdata('erroredit'); ?>
            <div class="table-responsive table-striped">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-sidebar text-white text-sm">
                        <tr style="font-size: small;">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Judul Penelitian</th>
                            <th>Periode Pengajuan</th>
                            <th>Tanggal Submit</th>
                            <th>Matkul Diampu</th>
                            <th>Mahasiswa Yang Dilibatkan</th>
                            <th>Kelompok Riset</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Tahapan Pelaksanaan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->judul_pengabmas ?></td>
                                <td><?= $data->tahun_periode; ?></td>
                                <td><?= date('d-m-Y', strtotime($data->tgl_submit)) ?></td>
                                <td><?= $data->matkul_diampu; ?></td>
                                <td><?= $data->mhs_terlibat; ?></td>
                                <td><?= $data->kelompok_riset; ?></td>
                                <td>
                                    <?php
                                    echo form_dropdown(
                                        'id_status' . $data->id_pengabmas,
                                        array(1 => "Didanai", 2 => "Ditolak", 3 => "-- Pilih --"),
                                        $data->id_status,
                                        array(
                                            'class' => "btn btn-sm btn-primary dropdown-toggle",
                                            'onchange' => "changeStat($data->id_pengabmas)"
                                        )
                                    ); ?>

                                    <script type="text/javascript">
                                        function changeStat(id_pengabmas) {
                                            $.ajax({
                                                url: "<?= base_url() ?>operator/changestat_pengabmas",
                                                type: "POST",
                                                dataType: "json",
                                                data: {
                                                    id_pengabmas: id_pengabmas
                                                },
                                                success: function(data) {
                                                    alert(data.msg);
                                                }
                                            })
                                        }
                                    </script>
                                </td>
                                <td>

                                    <div class="dropdown">
                                        <div class="dropdown show">
                                            <a class="btn btn-warning btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Download
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="<?php echo base_url() . 'upload/pengabdian_masyarakat/' . $data->file_proposal; ?>">Proposal</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo base_url() . 'upload/pengabdian_masyarakat/' . $data->file_rps; ?>">RPS</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo base_url() . 'upload/pengabdian_masyarakat/' . $data->form_integrasi; ?>">Form Integrasi</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <!-- Hasil Review -->
                                    <?php if ($data->status == "Didanai" && $data->hasil_review != null) { ?>
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#hasilreview<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Hasil Review</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->hasil_review == null) { ?>
                                        <button class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#hasilreview<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Hasil Review</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-secondary" style="font-size: 13px;" disabled>Hasil Review</button>
                                    <?php } ?>
                                    <!-- End Hasil Review -->

                                    <!-- Surat Tugas -->
                                    <?php if ($data->status == "Didanai" && $data->surat_tugas != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#surattugas<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Surat Tugas</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->surat_tugas == null) { ?>
                                        <button class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#surattugas<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Surat Tugas</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-secondary mt-1" style="font-size: 13px;" disabled>Surat Tugas</button>
                                    <?php } ?>
                                    <!-- End Surat Tugas -->

                                    <!-- Hasil Monev Internal -->
                                    <?php if ($data->status == "Didanai" && $data->hasil_monev_internal != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#hasilmonev<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Hasil Monev Internal</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->hasil_monev_internal == null) { ?>
                                        <button class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#hasilmonev<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Hasil Monev Internal</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-secondary mt-1" style="font-size: 13px;" disabled>Hasil Monev Internal</button>
                                    <?php } ?>
                                    <!-- End Hasil Monev Internal -->

                                    <!-- Berita Acara Insentif Publikasi -->
                                    <?php if ($data->status == "Didanai" && $data->berita_acara_inspub != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#beritaacarainsentif<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Berita Acara Insentif Publikasi</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->berita_acara_inspub == null) { ?>
                                        <button class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#beritaacarainsentif<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Berita Acara Insentif Publikasi</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-secondary mt-1" style="font-size: 13px;" disabled>Berita Acara Insentif Publikasi</button>
                                    <?php } ?>
                                    <!-- End Berita Acara Insentif Publikasi -->

                                </td>

                                <td>
                                    <?php if ($data->status == "Didanai") { ?>
                                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#logbook<?= $data->id_pengabmas ?>" style="font-size: 13px;">Log Book</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-danger mt-1" style="font-size: 13px;" disabled>Log Book</button>
                                    <?php } ?>

                                    <?php if ($data->status == "Didanai" && $data->laporan_akhir != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#laporanakhir<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Laporan Akhir</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->laporan_akhir == null) { ?>
                                        <button class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#laporanakhir<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Laporan Akhir</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-danger mt-1" style="font-size: 13px;" disabled>Laporan Akhir</button>
                                    <?php } ?>

                                    <?php if ($data->status == "Didanai" && $data->laporan_keuangan != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#laporankeuangan<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Laporan Keuangan</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->laporan_keuangan == null) { ?>
                                        <button class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#laporankeuangan<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Laporan Keuangan</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-danger mt-1" style="font-size: 13px;" disabled>Laporan Keuangan</button>
                                    <?php } ?>

                                    <?php if ($data->status == "Didanai" && $data->artikel_ilmiah != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#artikelilmiah<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Artikel Ilmiah</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->artikel_ilmiah == null) { ?>
                                        <button class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#artikelilmiah<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Artikel Ilmiah</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-danger mt-1" style="font-size: 13px;" disabled>Artikel Ilmiah</button>
                                    <?php } ?>

                                    <?php if ($data->status == "Didanai" && $data->sertifikat_hki != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#sertifikathaki<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Sertifikat HAKI</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->sertifikat_hki == null) { ?>
                                        <button class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#sertifikathaki<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Sertifikat HAKI</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-danger mt-1" style="font-size: 13px;" disabled>Sertifikat HAKI</button>
                                    <?php } ?>

                                    <?php if ($data->status == "Didanai" && $data->url_artikel_ilmiah != null) { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#url<?= $data->id_pengabmas; ?>" style="font-size: 13px;">URL</button>
                                    <?php } elseif ($data->status == "Didanai" && $data->url_artikel_ilmiah == null) { ?>
                                        <button class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#url<?= $data->id_pengabmas; ?>" style="font-size: 13px;">URL</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-danger mt-1" style="font-size: 13px;" disabled>URL</button>
                                    <?php } ?>

                                    <?php if ($data->status == "Didanai") { ?>
                                        <button class="btn btn-sm btn-success mt-1" data-toggle="modal" data-target="#detail<?= $data->id_pengabmas; ?>" style="font-size: 13px;">Detail</button>
                                    <?php } else { ?>
                                        <button class="btn btn-sm btn-danger mt-1" style="font-size: 13px;" disabled>Detail</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>

<!-- Modal -->
<!-- Modal Hasil Review -->
<?php
$no = 0;
foreach ($row->result() as $key => $data) { ?>
    <div id="hasilreview<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Upload Hasil Review</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                    <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                    <p><input type="file" name="hasil_review" class="form-control form-control-sm bg-light" id="hasil_review"></p>
                    <button type="submit" name="edit_hasil_review" onclick="return confirm('Apakah anda yakin untuk upload hasil review ini?')" class="btn btn-sm btn-primary">Simpan</button>
                    <span><?= $data->hasil_review ?></span>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Hasil Review -->

    <!-- Surat Tugas -->
    <div id="surattugas<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Upload Surat Tugas</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                    <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                    <p> <input type="file" name="surat_tugas" class="form-control form-control-sm bg-light" id="surat_tugas"></p>
                    <button type="submit" name="edit_surat_tugas" onclick="return confirm('Apakah anda yakin untuk upload surat tugas ini?')" class="btn btn-sm btn-primary">Simpan</button>
                    <span><?= $data->surat_tugas ?></span>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Surat Tugas -->

<!-- Log Book -->
<?php
$no = 0;
foreach ($row->result() as $key => $data) { ?>
    <div id="logbook<?= $data->id_pengabmas ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Detail Log Book</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <table class="table table-responsive table-responsive-sm">
                        <thead class="bg-sidebar text-white">
                            <tr style="font-size: small;">
                                <th>No</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Uraian Kegiatan</th>
                                <th>Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($logs->result() as $key => $log) { ?>

                                <?php if ($log->id_pengabmas == $data->id_pengabmas) { ?>

                                    <tr>
                                        <th scope="row"><?= $no++; ?></th>
                                        <td><?= $log->tgl_kegiatan; ?></td>
                                        <td><?= $log->uraian_kegiatan; ?></td>
                                        <td>
                                            <?php if ($log->dokumentasi != null) { ?>
                                                <a type="button" href="<?php echo base_url() . '/upload/dokumentasi/' . $log->dokumentasi; ?>" class="btn btn-sm btn-primary">Download</a>
                                            <?php } else { ?>
                                                <a>Tidak ada dokumentasi</a>
                                            <?php } ?>

                                        </td>
                                    </tr>

                                <?php } ?>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Log Book -->

<!-- Laporan Akhir -->
<?php
$no = 0;
foreach ($row->result() as $key => $data) { ?>
    <div id="laporanakhir<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Download Laporan Akhir</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?php if ($data->laporan_akhir != null) { ?>
                        <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->laporan_akhir; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                        <span><?= $data->laporan_akhir ?></span>
                    <?php } else { ?>
                        <span>Laporan akhir belum di upload</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Laporan Akhir -->

    <!-- Laporan Keuangan -->
    <div id="laporankeuangan<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Download Laporan Keuangan</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?php if ($data->laporan_keuangan != null) { ?>
                        <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->laporan_keuangan; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                        <span><?= $data->laporan_keuangan ?></span>
                    <?php } else { ?>
                        <span>Laporan keuangan belum di upload</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Laporan Keuangan -->

    <!-- Artikel Ilmiah -->
    <div id="artikelilmiah<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Download Artikel Ilmiah</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?php if ($data->artikel_ilmiah != null) { ?>
                        <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->artikel_ilmiah; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                        <span><?= $data->artikel_ilmiah ?></span>
                    <?php } else { ?>
                        <span>Artikel ilmiah belum di upload</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Artikel Ilmiah-->

    <!-- Sertifikat HAKI -->
    <div id="sertifikathaki<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Download Sertifikat HAKI</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?php if ($data->sertifikat_hki != null) { ?>
                        <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->sertifikat_hki; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                        <span><?= $data->sertifikat_hki ?></span>
                    <?php } else { ?>
                        <span>Sertifikat hki belum di upload</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sertifikat HAKI-->

    <!-- URL -->
    <div id="url<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">URL Artikel Ilmiah</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?php if ($data->url_artikel_ilmiah != null) { ?>
                        <span><?= $data->url_artikel_ilmiah ?></span>
                    <?php } else { ?>
                        <span>URL belum ada</span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End URL-->

<!-- Hasil Monev Internal -->
<?php
$no = 0;
foreach ($row->result() as $key => $data) { ?>
    <div id="hasilmonev<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Upload Hasil Monev Internal</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                    <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                    <p> <input type="file" name="hasil_monev_internal" class="form-control form-control-sm bg-light" id="hasil_monev_internal"></p>
                    <button type="submit" name="edit_hasil_monev_internal" onclick="return confirm('Apakah anda yakin untuk upload hasil monev internal  ini?')" class="btn btn-sm btn-primary">Simpan</button>
                    <span><?= $data->hasil_monev_internal ?></span>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hasil Monev-->

    <!-- Berita acara insentif -->
    <div id="beritaacarainsentif<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <small class="modal-title font-weight-bold">Upload Berita Acara Insentif</small>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                    <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                    <p><input type="file" name="berita_acara_inspub" class="form-control form-control-sm bg-light" id="berita_acara_inspub"></p>
                    <button type="submit" name="edit_berita_acara_inspub" onclick="return confirm('Apakah anda yakin untuk upload berita acara insentif publikasi ini?')" class="btn btn-sm btn-primary">Simpan</button>
                    <span><?= $data->berita_acara_inspub ?></span>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!--End Berita acara insentif-->

<!-- Detail -->
<?php
$no = 0;
foreach ($row->result() as $key => $data) { ?>
    <!-- Detail -->
    <div id="detail<?= $data->id_pengabmas; ?>" class="modal fade shadow-lg" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <h3 class="modal-title font-weight-bold">Detail</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <table class="table table-responsive">
                        <tr>
                            <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                            <td class="font-weight-bold">Hasil Review</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                                <input type="file" name="hasil_review" class="form-control form-control-sm bg-light" id="hasil_review">
                                <p><?= $data->hasil_review; ?></p>
                            </td>
                            <td><button type="submit" name="edit_hasil_review" onclick="return confirm('Apakah anda yakin untuk menyimpan hasil review ini?')" class="btn btn-success btn-sm">Simpan</button></td>
                            <?php echo form_close() ?>
                        </tr>
                        <tr>
                            <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                            <td class="font-weight-bold">Surat Tugas</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                                <input type="file" name="surat_tugas" class="form-control form-control-sm bg-light" id="surat_tugas">
                                <p><?= $data->surat_tugas; ?></p>
                            </td>
                            <td><button type="submit" name="edit_surat_tugas" onclick="return confirm('Apakah anda yakin untuk menyimpan surat tugas ini?')" class="btn btn-success btn-sm">Simpan</button></td>
                            <?php echo form_close() ?>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Log Book</td>
                            <td>:</td>
                            <td><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#logbook<?= $data->id_pengabmas; ?>">Log Book</button></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Laporan Akhir</td>
                            <td>:</td>
                            <td>
                                <?php if ($data->laporan_akhir != null) { ?>
                                    <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->laporan_akhir; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Laporan Keuangan</td>
                            <td>:</td>
                            <td>
                                <?php if ($data->laporan_keuangan != null) { ?>
                                    <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->laporan_keuangan; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Artikel Ilmiah</td>
                            <td>:</td>
                            <td>
                                <?php if ($data->artikel_ilmiah != null) { ?>
                                    <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->artikel_ilmiah; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">URL</td>
                            <td>:</td>
                            <td>
                                <?php if ($data->url_artikel_ilmiah != null) { ?>
                                    <span><?= $data->url_artikel_ilmiah ?></span>
                                <?php } else { ?>
                                    <span>Belum ada url</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Sertifikat HAKI</td>
                            <td>:</td>
                            <td>
                                <?php if ($data->sertifikat_hki != null) { ?>
                                    <a href="<?php echo base_url() . 'upload/tahapan_pelaksanaan/' . $data->sertifikat_hki; ?>" type="button" class="btn btn-sm btn-primary">Download</a>
                                <?php } else { ?>
                                    <button class="btn btn-sm btn-primary" disabled>Download</button>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                            <td class="font-weight-bold">Hasil Monev Internal</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                                <input type="file" name="hasil_monev_internal" class="form-control form-control-sm bg-light" id="hasil_monev_internal">
                                <p><?= $data->hasil_monev_internal; ?></p>
                            </td>
                            <td><button type="submit" name="edit_hasil_monev_internal" onclick="return confirm('Apakah anda yakin untuk menyimpan hasil monev internal ini?')" class="btn btn-success btn-sm">Simpan</button></td>
                            <?php echo form_close() ?>
                        </tr>
                        <tr>
                            <?= form_open_multipart('operator/proses_tahapan_pelaksanaan_pengabmas'); ?>
                            <td class="font-weight-bold">Berita Acara Insentif Publikasi </td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id_pengabmas" id="id_pengabmas" value="<?= $data->id_pengabmas ?>">
                                <input type="file" name="berita_acara_inspub" class="form-control form-control-sm bg-light" id="berita_acara_inspub">
                                <p><?= $data->berita_acara_inspub; ?></p>
                            </td>
                            <td><button type="submit" name="edit_hasil_monev_internal" onclick="return confirm('Apakah anda yakin untuk menyimpan berita acara insentif publikasi ini?')" class="btn btn-success btn-sm">Simpan</button></td>
                            <?php echo form_close() ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Detail -->

<!-- End Modal -->