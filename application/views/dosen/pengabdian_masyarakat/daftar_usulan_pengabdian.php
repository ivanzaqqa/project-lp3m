<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Daftar Usulan Pengabdian Masyarakat</h6>
        </div>
        <div class="row mt-2">
            <div class="col-md ml-2">
                <div class="form-group">
                    <label for="PeriodePengajuan">Periode Pengajuan</label>
                    <select class="form-control form-control-sm bg-light" id="PeriodePengajuan">
                        <option>Ganjil 2021</option>
                        <option>Genap 2021</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="namaketuapengusul">Nama Ketua Pengusul</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="namaketuapengusul" readonly>
                </div>
                <div class="form-group">
                    <label for="NamaKetuaPengusul">Fakultas</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="fakultas" readonly>
                </div>
                <div class="form-group">
                    <label for="programstudi">Nama Ketua Pengusul</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="programstudi" readonly>
                </div>
                <div class="form-group">
                    <label for="idsinta">ID Sinta</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="idsinta" readonly>
                    <button type="submit" name="submit" class="mt-2 btn btn-md btn-warning">Submit</button>
                </div>
            </div>
            <div class="col-md mr-2">
                <div class="form-group">
                    <label for="judulpenelitian">Judul Penelitian</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="judulpenelitian" placeholder="Masukkan Judul Penelitian">
                </div>
                <div class="form-group">
                    <label for="matkul">Mata Kuliah Yang Diampu</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="matkul" placeholder="Masukkan Mata Kuliah">
                </div>
                <div class="form-group">
                    <label for="kelompokriset">Kelompok Riset</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="kelompokriset" placeholder="Masukkan Kelompok Riset">
                </div>
                <div class="form-group">
                    <label for="kelompokriset">Mahasiswa Yang Dilibatkan "NIM"</label>
                    <input type="text" class="form-control form-control-sm bg-light" id="mahasiswaterlibat" placeholder="Masukkan NIM Mahasiswa Yang Terlibat">
                </div>
                <div class="form-group">
                    <span for="fileproposal">Upload File Proposal "PDF" </span>
                    <input type="file" class="form-control-file form-control-sm" id="fileproposal">
                    <small class="text-muted">
                        Catatan: File Proposal Meliputi Cover, Pengesahan, dan BAB 1-3
                    </small>
                    <span for="fileproposal">Upload RPS "PDF"</span>
                    <input type="file" class="form-control-file form-control-sm" id="fileproposal">
                    <span for="fileproposal">Upload Form Integrasi "PDF"</span>
                    <input type="file" class="form-control-file form-control-sm" id="fileproposal">
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<footer class="sticky-footer bg-sidebar">
    <div class="container my-auto">
        <div class="text-center copyright my-auto">
            <span style="font-size: 13px;">Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
        </div>
    </div>
</footer>