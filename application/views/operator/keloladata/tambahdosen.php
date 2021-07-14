<div class="container-fluid">
    <div class="card shadow mb-3 bg-gray-200">
        <div class="card-header">
            <h5 class="font-weight-bold text-secondary">Tambah Data Dosen</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <form action="" method="POST">
                        <div class="form-group <?= form_error('nidn') ? 'has-error' : null ?> <?= form_error('nidn') ? 'has-error' : null ?> ">
                            <label class="font-weight-bold" for="nidn">NIDN *</label>
                            <input type="text" name="nidn" value="<?= set_value('nidn') ?>" class="form-control form-control-md" id="nidn" placeholder="Masukkan NIDN">
                            <?= form_error('nidn') ?>
                        </div>
                        <div class="form-group <?= form_error('id_sinta') ? 'has-error' : null ?> <?= form_error('id_sinta') ? 'has-error' : null ?> ">
                            <label class="font-weight-bold" for="idsinta">ID Sinta *</label>
                            <input type="text" name="id_sinta" value="<?= set_value('id_sinta') ?>" class="form-control form-control-md" id="idsinta" placeholder="Masukkan ID Sinta">
                            <?= form_error('id_sinta') ?>
                        </div>
                        <div class="form-group <?= form_error('username') ? 'has-error' : null ?> <?= form_error('id_sinta') ? 'has-error' : null ?> ">
                            <label class="font-weight-bold" for="nama">Username *</label>
                            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control form-control-md" id="username" placeholder="Masukkan Username">
                            <?= form_error('username') ?>
                        </div>
                        <div class="form-group <?= form_error('nama') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="nama">Nama *</label>
                            <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control form-control-md" id="nama" placeholder="Masukkan Nama">
                            <?= form_error('nama') ?>
                        </div>
                        <div class="form-group <?= form_error('email') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="email">Email *</label>
                            <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control form-control-md" id="email" placeholder="Masukkan email">
                            <?= form_error('email') ?>
                        </div>
                        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="nama">Password *</label>
                            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control form-control-md" id="password" placeholder="Masukkan Password">
                            <?= form_error('password') ?>
                        </div>
                        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="nama">Konfirmasi Password *</label>
                            <input type="password" name="passconf" value="<?= set_value('passconf') ?>" class="form-control form-control-md" id="passconf" placeholder="Konfirmasi Password">
                            <?= form_error('passconf') ?>
                        </div>
                        <div class="form-group <?= form_error('jk') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="jk">Jenis Kelamin *</label>
                            <select class="form-control" name="jk" id="jk">
                                <option value="">- Pilih -</option>
                                <option value="L" <?= set_value('jk') == 'L' ? "selected" : null ?>>Laki-Laki</option>
                                <option value="P" <?= set_value('jk') == 'P' ? "selected" : null ?>>Perempuan</option>
                            </select>
                            <?= form_error('jk') ?>
                        </div>
                        <div class="form-group <?= form_error('programstudi') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="programstudi">Program Studi *</label>
                            <input type="text" name="programstudi" value="<?= set_value('programstudi') ?>" class="form-control form-control-md" id="programstudi" placeholder="Masukkan Program Studi">
                            <?= form_error('programstudi') ?>
                        </div>
                        <div class="form-group <?= form_error('fakultas') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="fakultas">Fakultas *</label>
                            <input type="text" name="fakultas" value="<?= set_value('fakultas') ?>" class="form-control form-control-md" id="fakultas" placeholder="Masukkan Fakultas">
                            <?= form_error('fakultas') ?>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="alamat">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control form-control-md" id="alamat" placeholder="Masukkan Alamat"><?= set_value('alamat') ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="nohp">Nomor Handphone</label>
                            <input type="number" name="nohp" value="<?= set_value('nohp') ?>" class="form-control form-control-md" id="nohp" placeholder="Masukkan No Handphone">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="profile">Foto Profile </label>
                            <input type="file" name="profile" class="form-control-file form-control-md form-control" id="profile">
                        </div>
                        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
                            <label class="font-weight-bold" for="level">Level *</label>
                            <select class="form-control" name="level" id="level">
                                <option value="">- Pilih -</option>
                                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Dosen</option>
                                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Operator</option>
                            </select>
                            <?= form_error('level') ?>
                        </div>
                        <div class="form-group <?= form_error('id_sinta') ? 'has-error' : null ?>">
                            <button type="submit" class="btn text-white" style="background-color: #670099;">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <button type="button" class="btn btn-warning text-white">
                                <i class="fa fa-undo"></i> Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<footer class=" bg-sidebar">
    <div class="container my-auto">
        <div class="copyright my-auto">
            <span style="font-size: 13px;">Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
        </div>
    </div>
</footer>