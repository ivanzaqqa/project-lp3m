<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary" style="position: absolute; margin-top: 10px;">Daftar Pengabdian Masyarakat</h6>
            <button class="btn btn-success mt-1 btn-sm" type="button" style="margin-left: 300px;"><a href="<?php echo base_url('operator/exportexcel_pengabmas') ?>" style="color: white;">Export Data</a></button>
        </div>
        <div class="card-body">
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
                                    <a href="" class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#hasilreview" style="font-size: 13px;">Hasil Review</a>
                                    <a href="" class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#surattugas" style="font-size: 13px;">Surat Tugas</a>
                                    <a href="" class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#hasilmonev" style="font-size: 13px;">Hasil Monev Internal</a>
                                    <a href="" class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#beritaacarainsentif" style="font-size: 13px;">Berita Acara Insentif Publikasi</a>
                                    <a href="" class="btn btn-sm btn-secondary mt-1" data-toggle="modal" data-target="#sertifikathaki" style="font-size: 13px;">Sertifikan HAKI</a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#logbook" style="font-size: 13px;">Log Book</a>
                                    <a href="" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#laporanakhir" style="font-size: 13px;">Laporan Akhir</a>
                                    <a href="" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#laporankeuangan" style="font-size: 13px;">Laporan Keuangan</a>
                                    <a href="" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#artikelilmiah" style="font-size: 13px;">Artikel Ilmiah</a>
                                    <a href="" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#url" style="font-size: 13px;">URL</a>
                                    <a href="" class="btn btn-sm btn-danger mt-1" data-toggle="modal" data-target="#detail" style="font-size: 13px;">Detail</a>
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
<div id="hasilreview" class="modal fade shadow-lg" role="dialog">
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
                <p> <input type="file" name="hasil_review" class="form-control form-control-sm bg-light" id="hasil_review"></p>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Hasil Review -->

<!-- Surat Tugas -->
<div id="surattugas" class="modal fade shadow-lg" role="dialog">
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
                <p> <input type="file" name="surat_tugas" class="form-control form-control-sm bg-light" id="surat_tugas"></p>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Surat Tugas -->

<!-- Log Book -->
<div id="logbook" class="modal fade shadow-lg" role="dialog">
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
                        <th>1</th>
                        <th>20-12-2021</th>
                        <th>Test</th>
                        <th><a href="" type="button" class="btn btn-sm btn-success">File Dokumentasi</a></th>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Log Book -->

<!-- Laporan Akhir -->
<div id="laporanakhir" class="modal fade shadow-lg" role="dialog">
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
                <a href="" type="button" class="btn btn-sm btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>
<!-- End Laporan Akhir -->

<!-- Laporan Keuangan -->
<div id="laporankeuangan" class="modal fade shadow-lg" role="dialog">
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
                <a href="" type="button" class="btn btn-sm btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>
<!-- End Laporan Keuangan -->

<!-- Artikel Ilmiah -->
<div id="artikelilmiah" class="modal fade shadow-lg" role="dialog">
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
                <a href="" type="button" class="btn btn-sm btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>
<!-- End Artikel Ilmiah-->

<!-- URL -->
<div id="url" class="modal fade shadow-lg" role="dialog">
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
                <h5>https://tratrata.co.id/jkdjdkk/djkdkdkdk/1234</h5>
            </div>
        </div>
    </div>
</div>
<!-- End URL-->

<!-- Sertifikat HAKI -->
<div id="sertifikathaki" class="modal fade shadow-lg" role="dialog">
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
                <a href="" type="button" class="btn btn-sm btn-primary">Download</a>
            </div>
        </div>
    </div>
</div>
<!-- End Sertifikat HAKI-->

<!-- Hasil Monev Internal -->
<div id="hasilmonev" class="modal fade shadow-lg" role="dialog">
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
                <p> <input type="file" name="hasil_monev_internal" class="form-control form-control-sm bg-light" id="hasil_monev_internal"></p>
                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>
<!-- End Sertifikat HAKI-->

<!-- Detail -->
<div id="detail" class="modal fade shadow-lg" role="dialog">
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
                        <td class="font-weight-bold">Hasil Review</td>
                        <td>:</td>
                        <td><input type="file" name="hasil_review" class="form-control form-control-sm bg-light" id="hasil_review"></td>
                        <td><a href="" type="button" class="btn btn-success btn-sm">Simpan</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Surat Tugas</td>
                        <td>:</td>
                        <td><input type="file" name="surat_tugas" class="form-control form-control-sm bg-light" id="surat_tugas"></td>
                        <td><a href="" type="button" class="btn btn-success btn-sm">Simpan</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Log Book</td>
                        <td>:</td>
                        <td><a href="" type="button" class="btn btn-sm btn-primary">Akses Log Book</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Laporan Akhir</td>
                        <td>:</td>
                        <td><a href="" type="button" class="btn btn-sm btn-primary">Download</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Laporan Keuangan</td>
                        <td>:</td>
                        <td><a href="" type="button" class="btn btn-sm btn-primary">Download</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Artikel Ilmiah</td>
                        <td>:</td>
                        <td><a href="" type="button" class="btn btn-sm btn-primary">Download</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">URL</td>
                        <td>:</td>
                        <td>
                            <p>https://tratata.co.id/ldldkdkdk</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Sertifikat HAKI</td>
                        <td>:</td>
                        <td><a href="" type="button" class="btn btn-sm btn-primary">Download</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Hasil Monev Internal</td>
                        <td>:</td>
                        <td><input type="file" name="hasil_monev_internal" class="form-control form-control-sm bg-light" id="hasil_monev_internal"></td>
                        <td><a href="" type="button" class="btn btn-success btn-sm">Simpan</a></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Berita Acara Insentif Publikasi </td>
                        <td>:</td>
                        <td><input type="file" name="berita_acara_insentif_publikasi" class="form-control form-control-sm bg-light" id="berita_acara_insentif_publikasi"></td>
                        <td><a href="" type="button" class="btn btn-success btn-sm">Simpan</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Detail -->
<!-- End Modal -->