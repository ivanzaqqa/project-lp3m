<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Daftar Usulan Penelitian</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successalert') ?>
            <div class="row">
                <div class="col-sm">
                    <?= form_open_multipart('dosen/proses_daftarusulanpenelitian'); ?>
                    <div class="form-group <?= form_error('periodepengajuan') ? 'has-error' : null ?>">
                        <label for="PeriodePengajuan">Periode Pengajuan</label>
                        <select class="form-control form-control-sm bg-light" name="periodepengajuan" id="PeriodePengajuan">
                            <option value="">- Pilih -</option>
                            <?php foreach ($row->result() as $key => $data) { ?>
                                <option value="<?= $data->id_periode; ?>"><?= $data->tahun_periode; ?></option>
                            <?php } ?>
                        </select>
                        <?= form_error('periodepengajuan') ?>
                    </div>
                    <div class="form-group">
                        <label for="namaketuapengusul">Nama Ketua Pengusul</label>
                        <input type="hidden" name="id" id="id" value="<?= $this->fungsi->user_login()->id ?>">
                        <input type="hidden" name="id_penelitian" id="id_penelitian" value="">
                        <input type="text" name="namaketuapengusul" class="form-control form-control-sm bg-light" id="namaketuapengusul" value="<?= $this->fungsi->user_login()->name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" name="fakultas" class="form-control form-control-sm bg-light" id="fakultas" value="<?= $this->fungsi->user_login()->fakultas; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="programstudi">Program Studi</label>
                        <input type="text" name="programstudi" class="form-control form-control-sm bg-light" id="programstudi" value="<?= $this->fungsi->user_login()->program_studi; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="idsinta">ID Sinta</label>
                        <input type="text" name="idsinta" class="form-control form-control-sm bg-light" id="idsinta" value="<?= $this->fungsi->user_login()->id_sinta; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group <?= form_error('judul_penelitian') ? 'has-error' : null ?> ">
                        <label for="judul_penelitian">Judul Penelitian</label>
                        <input type="text" name="judul_penelitian" value="<?= set_value('judul_penelitian') ?>" class="form-control form-control-sm bg-light" id="judul_penelitian" placeholder="Masukkan Judul Penelitian">
                        <?= form_error('judul_penelitian') ?>
                    </div>
                    <div class="form-group <?= form_error('matkul_diampu') ? 'has-error' : null ?>">
                        <label for="matkul_diampu">Mata Kuliah Yang Diampu</label>
                        <input type="text" name="matkul_diampu" value="<?= set_value('matkul_diampu') ?>" class="form-control form-control-sm bg-light" id="matkul_diampu" placeholder="Masukkan Mata Kuliah">
                        <?= form_error('matkul_diampu') ?>
                    </div>
                    <div class="form-group <?= form_error('kelompok_riset') ? 'has-error' : null ?> ">
                        <label for="kelompok_riset">Kelompok Riset</label>
                        <input type="text" name="kelompok_riset" value="<?= set_value('kelompok_riset') ?>" class="form-control form-control-sm bg-light" id="kelompok_riset" placeholder="Masukkan Kelompok Riset">
                        <?= form_error('kelompok_riset') ?>
                    </div>
                    <div class="form-group <?= form_error('mhs_terlibat') ? 'has-error' : null ?>">
                        <label for="mhs_terlibat">Mahasiswa Yang Dilibatkan "NIM"</label>
                        <input type="text" name="mhs_terlibat" value="<?= set_value('mhs_terlibat') ?>" class="form-control form-control-sm bg-light" id="mhs_terlibat" placeholder="Masukkan Nama dan NIM Mahasiswa Yang Terlibat">
                        <?= form_error('mhs_terlibat') ?>
                    </div>
                    <div class="form-group <?= form_error('file_proposal') ? 'has-error' : null ?>">
                        <span for="file_proposal">Upload File Proposal "PDF" </span><br>
                        <?= form_error('file_proposal') ?>
                        <input type="file" name="file_proposal" value="<?= set_value('file_proposal') ?>" class="form-control-file form-control-sm" id="file_proposal" accept="application/pdf">
                        <small class="text-muted">
                            Catatan: File Proposal Meliputi Cover, Pengesahan, dan BAB 1-3
                        </small>
                    </div>
                    <div class="form-group <?= form_error('file_rps') ? 'has-error' : null ?>">
                        <span for="file_rps">Upload RPS "PDF"</span> <br>
                        <?= form_error('file_rps') ?>
                        <input type="file" name="file_rps" value="<?= set_value('file_rps') ?>" class="form-control-file form-control-sm" id="filerps" accept="application/pdf">
                    </div>
                    <div class="form-group <?= form_error('form_integrasi') ? 'has-error' : null ?>">
                        <span for="form_integrasi">Upload Form Integrasi " PDF"</span><br>
                        <?= form_error('form_integrasi') ?>
                        <input type="file" name="form_integrasi" value="<?= set_value('form_integrasi') ?>" class="form-control-file form-control-sm" id="form_integrasi" accept="application/pdf">
                    </div>
                    <div class="form-group ">
                        <button type="submit" name="submit" class="mt-2 btn btn-md btn-warning">Submit</button>
                    </div>
                </div>
                <?= form_close(); ?>
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