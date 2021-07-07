<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-2">
                    <h5 class="font-weight-bold text-secondary">Data Dosen</h5>
                </div>
                <div class="col-md-10">
                    <button name="tambahdatadosen" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahDosen">Tambah Data Dosen</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive-md display" id="dataTable" width="100%">
                <thead class="bg-gradient-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nidn</th>
                        <th>ID Sinta</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>124588990</td>
                        <td>8878</td>
                        <td>Mahardi (0035)</td>
                        <td>Sipil</td>
                        <td>Teknik</td>
                        <td>
                            <img width="120" class="img-profile" src="<?= base_url() ?>/assets/img/users/erickkirek.jpg" alt="">
                        </td>
                        <td>
                            <button name="editdatadosen" type="button" class="btn btn-warning btn-sm ml-1">Edit</button>
                            <button name="hapusdatadosen" type="button" class="btn btn-danger btn-sm ml-1">Hapus</button>
                            <a href="<?= base_url('operator/detaildosen') ?>" name="detaildatadosen" type="button" class="btn btn-primary btn-sm ml-1">Detail</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>12458893</td>
                        <td>7893</td>
                        <td>Mahardi (0035)</td>
                        <td>Sipil</td>
                        <td>Teknik</td>
                        <td>
                            <img width="120" class="img-profile" src="<?= base_url() ?>/assets/img/users/dikaipip.jpg" alt="">
                        </td>
                        <td>
                            <button name="submit" type="submit" class="btn btn-warning btn-sm ml-1">Edit</button>
                            <button name="submit" type="submit" class="btn btn-danger btn-sm ml-1">Hapus</button>
                            <button name="submit" type="submit" class="btn btn-primary btn-sm ml-1">Detail</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>12458893</td>
                        <td>7893</td>
                        <td>Mahardi (0035)</td>
                        <td>Sipil</td>
                        <td>Teknik</td>
                        <td>
                            <img width="120" class="img-profile" src="<?= base_url() ?>/assets/img/users/dikaipip.jpg" alt="">
                        </td>
                        <td>
                            <button name="submit" type="submit" class="btn btn-warning btn-sm ml-1">Edit</button>
                            <button name="submit" type="submit" class="btn btn-danger btn-sm ml-1">Hapus</button>
                            <button name="submit" type="submit" class="btn btn-primary btn-sm ml-1">Detail</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal tambah data dosen -->
<div class="modal" id="tambahDosen" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" name="nidn" class="form-control form-control-sm" id="nidn" placeholder="Masukkan NIDN">
                    </div>
                    <div class="form-group">
                        <label for="idsinta">ID Sinta</label>
                        <input type="text" name="idsinta" class="form-control form-control-sm" id="idsinta" placeholder="Masukkan ID Sinta">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control form-control-sm" id="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" id="email" placeholder="Masukkan email">
                    </div>
                    <div class="form-group">
                        <label for="jk">Jenis Kelamin</label>
                        <input type="text" name="jk" class="form-control form-control-sm" id="jk" placeholder="Masukkan Jenis Kelamin">
                    </div>
                    <div class="form-group">
                        <label for="programstudi">Program Studi</label>
                        <input type="text" name="programstudi" class="form-control form-control-sm" id="programstudi" placeholder="Masukkan Program Studi">
                    </div>
                    <div class="form-group">
                        <label for="fakultas">Fakultas</label>
                        <input type="text" name="fakultas" class="form-control form-control-sm" id="fakultas" placeholder="Masukkan Fakultas">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea type="text" name="almat" class="form-control form-control-sm" id="alamat" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nohp">Nomor Handphone</label>
                        <input type="text" name="nohp" class="form-control form-control-sm" id="nohp" placeholder="Masukkan No Handphone">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Modal tambah data dosen -->

<!-- /.container-fluid -->
</div>
<footer class=" bg-sidebar">
    <div class="container my-auto">
        <div class="copyright my-auto">
            <span style="font-size: 13px;">Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
        </div>
    </div>
</footer>