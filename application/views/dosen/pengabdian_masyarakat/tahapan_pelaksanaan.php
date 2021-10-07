<div class="container">
    <h3 class="text-center"><?= $data; ?></h3><br>
    <h2 class="text-center font-weight-bold">Judul Penelitian</h2>
    <h4 class="text-center">Author</h4>
    <a href="<?= site_url('dosen/arsippengabdian') ?>" class="btn btn-md btn-primary mb-3"><i class="fas fa-chevron-circle-left"></i> Kembali</a>
    <div class="row mb-3">
        <div class="col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-responsive border-0">
                        <tr>
                            <td class="font-weight-bold">Hasil Review Proposal</td>
                            <td>:</td>
                            <td>
                                <button class="btn-sm btn-primary">Download</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Surat Tugas Penelitian</td>
                            <td>:</td>
                            <td>
                                <button class="btn-sm btn-primary">Download</button>
                            </td>
                        </tr>
                    </table>
                    <h5 class="card-title ml-2">Log Book</h5>
                    <table class="table table-responsive border-0">
                        <tr>
                            <td class="font-weight-bold">Tanggal Kegiatan</td>
                            <td>:</td>
                            <td>
                                <input type="date" name="tgl_kegiatan" class="form-control form-control-sm bg-light">
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Uraian Kegiatan</td>
                            <td>:</td>
                            <td>
                                <textarea class="form-control form-control-sm bg-light" name="uraian_kegiatan" id="" cols="30" rows="5"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Dokumentasi</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="dokumentasilogbook" class="form-control form-control-sm bg-light">
                                <small>*Dokumentasi Tidak Wajib Diisi (File Gambar, Word, PDF) atau (Semua File) Ukuran Maks (10 MB)
                                </small>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" name="submit" class="ml-2 btn btn-md btn-warning">Simpan</button>
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
                            <tr>
                                <th scope="row">1</th>
                                <td>27-11-99</td>
                                <td>Otto</td>
                                <td>
                                    <a type="button" href="" class="btn btn-sm btn-primary">Download</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <table class="table table-responsive border-0">
                        <tr>
                            <td class="font-weight-bold">Laporan Akhir</td>
                            <td>:</td>
                            <td>
                                <span>Nama file laporan akhir.pdf (tanggal upload)</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Laporan Akhir</td>
                            <td>:</td>
                            <td> <input type="file" name="file_laporan_akhir" class="form-control form-control-sm bg-light" id="file_laporan_akhir">
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary" type="button">Upload</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Laporan Keuangan</td>
                            <td>:</td>
                            <td>
                                <span>Nama file laporan Keuangan.pdf (tanggal upload)</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Laporan Keuangan</td>
                            <td>:</td>
                            <td> <input type="file" name="file_laporan_keuangan" class="form-control form-control-sm bg-light" id="file_laporan_keuangan">
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary" type="button">Upload</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Artikel Ilmiah</td>
                            <td>:</td>
                            <td>
                                <span>Nama file laporan akhir.pdf (tanggal upload)</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Artikel Ilmiah</td>
                            <td>:</td>
                            <td> <input type="file" name="file_artikel_ilmiah" class="form-control form-control-sm bg-light" id="file_artikel_ilmiah">
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary" type="button">Upload</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">URL Artikel Ilmiah</td>
                            <td>:</td>
                            <td>
                                <span>url</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit URL Artikel Ilmiah</td>
                            <td>:</td>
                            <td> <input type="text" name="url_artikel_ilmiah" class="form-control form-control-sm bg-light" id="url_artikel_ilmiah">
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary" type="button">Simpan</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Sertifikat HKI</td>
                            <td>:</td>
                            <td>
                                <span>Nama file Sertifikat HKI.pdf (tanggal upload)</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Submit Sertifikat HKI (Jika Ada)</td>
                            <td>:</td>
                            <td> <input type="file" name="file_sertifikat_hki" class="form-control form-control-sm bg-light" id="file_sertifikat_hki">
                            </td>
                            <td>
                                <a href="" class="btn btn-sm btn-primary" type="button">Upload</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Hasil Monev Internal</td>
                            <td>:</td>
                            <td>
                                <a type="button" href="" class="btn btn-sm btn-primary">Download</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Berita Acara Insentif Publikasi</td>
                            <td>:</td>
                            <td>
                                <a type="button" href="" class="btn btn-sm btn-primary">Download</a>
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