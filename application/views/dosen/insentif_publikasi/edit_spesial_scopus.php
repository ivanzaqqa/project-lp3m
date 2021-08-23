<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Edit Insentif Publikasi Spesial Scopus</h6>
        </div>
        <div class="card-body">
            <div class="row pl-2">
                <form action="">
                    <table class="table table-responsive">
                        <tr>
                            <td class="font-weight-bold">Pilihan Scopus</td>
                            <td>:</td>
                            <td>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>- Pilih -</option>
                                        <option value="">One</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Judul Artikel</td>
                            <td>:</td>
                            <td><input type="text" name="judul_artikel" class="form-control form-control-sm bg-light" id="judul_artikel"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Impact Factor Jurnal</td>
                            <td>:</td>
                            <td><input type="text" name="impact_jurnal" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">URL Artikel</td>
                            <td>:</td>
                            <td><input type="text" name="url_artikel" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">File Luaran(PDF)</td>
                            <td>:</td>
                            <td><input type="file" name="file_luaran" class="form-control form-control-sm bg-light" id="file_luaran"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">File Proposal Penelitian(PDF)</td>
                            <td>:</td>
                            <td><input type="file" name="file_proposal_penelitian" class="form-control form-control-sm bg-light" id="file_proposal_penelitian"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">File Dokumentasi Kegiatan / Catatan Penelitian(PDF)</td>
                            <td>:</td>
                            <td><input type="file" name="file_dokumentasi_penelitian" class="form-control form-control-sm bg-light" id="file_dokumentasi_penelitian"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">File Laporan Akhir(PDF)</td>
                            <td>:</td>
                            <td><input type="file" name="file_laporan_akhir" class="form-control form-control-sm bg-light" id="file_laporan_akhir"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">File RPP dan RPS(PDF)</td>
                            <td>:</td>
                            <td><input type="file" name="file_rpp_rps" class="form-control form-control-sm bg-light" id="file_rpp_rps"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Matakuliah Yang Diampu</td>
                            <td>:</td>
                            <td><input type="text" name="matkul_diampu" class="form-control form-control-sm bg-light" id="matkul_diampu"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Kelompok Riset</td>
                            <td>:</td>
                            <td><input type="text" name="kelompok_riset" class="form-control form-control-sm bg-light" id="kelompok_riset"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Mahasiswa Yang Terlibat "Nama(NIM)"</td>
                            <td>:</td>
                            <td><input type="text" name="impact_jurnal" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                        </tr>
                        <tr>
                            <td><a href="<?= base_url('dosen/arsip_spesial_scopus') ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                    Kembali</a>
                                <button class="ml-2 btn btn-sm btn-warning">Update</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>