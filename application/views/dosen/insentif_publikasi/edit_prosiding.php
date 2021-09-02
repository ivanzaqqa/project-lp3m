<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Update Insentif Publikasi Jurnal atau Prosiding</h6>
        </div>
        <div class="card-body">
            <div class="row pl-2">
                <?php echo form_open_multipart('dosen/proses_edit_jurnal_prosiding/'); ?>
                <?= $this->session->flashdata('erroredit'); ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="font-weight-bold">Pilihan Jurnal atau Prosiding</td>
                        <td>:</td>
                        <td>
                            <div class="input-group mb-3">
                                <select class="form-control" name="nama_jurnal" id="nama_jurnal">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($nama_jurnal->result() as $key => $data) { ?>
                                        <option value="<?= $data->id_jurnal_pros ?>" <?= $data->id_jurnal_pros == $row->id_jurnal_pros ? "selected" : null ?>><?= $data->nama_jurnal ?></option>;
                                    <?php } ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">Judul Artikel</td>
                        <td>:</td>
                        <td>
                            <input type="hidden" name="id_insentif_jurpros" id="id_insentif_jurpros" value="<?= $row->id_insentif_jurpros ?>">
                            <input type="text" value="<?= $row->judul_artikel; ?>" name="judul_artikel" class="form-control form-control-sm bg-light" id="judul_artikel">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">URL Artikel</td>
                        <td>:</td>
                        <td><input type="text" value="<?= $row->url_artikel; ?>" name="url_artikel" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">File Publikasi</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($page == 'edit') {
                                if ($row->file_publikasi != null) { ?>
                                    <?= $row->file_publikasi; ?>
                            <?php }
                            } ?>
                            <input type="file" name="file_publikasi" class="form-control form-control-sm bg-light" id="file_publikasi">
                        </td>

                    <tr>
                        <td><a href="<?= base_url('dosen/arsip_jurnal_prosiding') ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                Kembali</a>
                            <button type="submit" name="edit" class="ml-2 btn btn-sm btn-warning">Update</button>
                        </td>
                    </tr>
                </table>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>