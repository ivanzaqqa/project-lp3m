<div class="container">
    <h5>Daftar Usulan Penelitian</h5>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="PeriodePengajuan">Periode Pengajuan</label>
                <select class="form-control form-control-sm" id="PeriodePengajuan">
                    <option>Ganjil 2021</option>
                    <option>Genap 2021</option>
                </select>
            </div>
            <div class="form-group">
                <label for="namaketuapengusul">Nama Ketua Pengusul</label>
                <input type="text" class="form-control form-control-sm" id="namaketuapengusul" readonly>
            </div>
            <div class="form-group">
                <label for="NamaKetuaPengusul">Fakultas</label>
                <input type="text" class="form-control form-control-sm" id="fakultas" readonly>
            </div>
            <div class="form-group">
                <label for="programstudi">Nama Ketua Pengusul</label>
                <input type="text" class="form-control form-control-sm" id="programstudi" readonly>
            </div>
            <div class="form-group">
                <label for="idsinta">ID Sinta</label>
                <input type="text" class="form-control form-control-sm" id="idsinta" readonly>
                <button type="submit" class="mt-2 btn btn-md btn-warning">Submit</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="judulpenelitian">Judul Penelitian</label>
                <input type="text" class="form-control form-control-sm" id="judulpenelitian" placeholder="Masukkan Judul Penelitian">
            </div>
            <div class="form-group">
                <label for="matkul">Mata Kuliah Yang Diampu</label>
                <input type="text" class="form-control form-control-sm" id="matkul" placeholder="Masukkan Mata Kuliah">
            </div>
            <div class="form-group">
                <label for="kelompokriset">Kelompok Riset</label>
                <input type="text" class="form-control form-control-sm" id="kelompokriset" placeholder="Masukkan Kelompok Riset">
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
<!-- /.container-fluid -->
</div>