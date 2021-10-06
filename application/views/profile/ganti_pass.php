<div class="container-fluid">

    <div class="card shadow mb-3 bg-gray-200">
        <div class="card-header">
            <h5 class="font-weight-bold text-secondary">Ganti Password</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <?= form_open_multipart('dosen/proses_ganti_password'); ?>
                <?= $this->session->flashdata('successedit'); ?>
                <?= $this->session->flashdata('erroredit'); ?>
                <div class="form-group">
                    <label class="font-weight-bold" for="nidn">Password Baru</label>
                    <input type="hidden" name="id" value="<?= $row->id ?>">
                    <input type="password" name="password" value="" class="form-control form-control-md" id="password" placeholder="Masukkan Password Baru">
                </div>
                <div class="form-group  ">
                    <label class="font-weight-bold" for="id_sinta">Ulangi Password Baru</label>
                    <input type="password" name="passconf" value="" class="form-control form-control-md" id="passconf" placeholder="Ulangi password baru">
                </div>
                <button type="submit" name="edit" class="btn btn-md text-white" style="background-color: #670099;">
                    <i class="fa fa-paper-plane"></i> Simpan
                </button>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>