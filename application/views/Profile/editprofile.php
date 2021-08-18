<div class="container-fluid">

    <h5 class=" mb-3 text-gray-800">Update Profile</h5>
    <div class="card shadow mb-3 bg-gray-200">
        <div class="card-header">
            <h5 class="font-weight-bold text-secondary">Update Profile</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <form action="" method="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="font-weight-bold" for="nidn">NIDN</label>
                            <input type="hidden" name="id" value="">
                            <input type="text" name="nidn" value="" class="form-control form-control-md" id="nidn" placeholder="Masukkan NIDN">
                        </div>
                        <div class="form-group  ">
                            <label class="font-weight-bold" for="idsinta">ID Sinta</label>
                            <input type="text" name="id_sinta" value="" class="form-control form-control-md" id="idsinta" placeholder="Masukkan ID Sinta">
                        </div>
                        <div class="form-group  ">
                            <label class="font-weight-bold" for="nama">Username </label>
                            <input type="text" name="username" value="" class="form-control form-control-md" id="username" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="nama">Nama </label>
                            <input type="text" name="nama" value="" class="form-control form-control-md" id="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="email">Email </label>
                            <input type="email" name="email" value="" class="form-control form-control-md" id="email" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="jk">Jenis Kelamin </label>
                            <select class="form-control" name="jk" id="jk">
                                <option value="">- Pilih -</option>
                                <option value="L" <?= $row->jk == 'L' ? "selected" : null ?>>Laki-Laki</option>
                                <option value="P" <?= $row->jk == 'P' ? "selected" : null ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="programstudi">Program Studi</label>
                            <input type="text" name="programstudi" value="" class="form-control form-control-md" id="programstudi" placeholder="Masukkan Program Studi">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="fakultas">Fakultas </label>
                            <input type="text" name="fakultas" value="" class="form-control form-control-md" id="fakultas" placeholder="Masukkan Fakultas">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="alamat">Alamat</label>
                            <textarea type="text" name="alamat" class="form-control form-control-md" id="alamat" placeholder="Masukkan Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="nohp">Nomor Handphone</label>
                            <input type="number" name="nohp" value="" class="form-control form-control-md" id="nohp" placeholder="Masukkan No Handphone">
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold" for="image">Image </label><br>
                            <!-- <?php
                                    if ($page == 'submit_edit') {
                                        if ($row->image != null) { ?>
                                <img name="image" src="<?= base_url('assets/users/' . $row->image) ?>" width="200"><br>
                        <?php }
                                    } ?> -->
                            <input type="file" name="image" class="form-control form-control-md" id="image">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="" class="btn btn-sm text-white" style="background-color: #670099;">
                                <i class="fa fa-paper-plane"></i> Simpan
                            </button>
                            <a href="<?= base_url('operator/datadosen') ?>" type="button" class="btn btn-sm btn-warning text-white">
                                <i class="fa fa-undo"></i> Batal
                            </a>
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