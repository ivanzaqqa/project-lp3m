<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Submit Insentif Publikasi Jurnal atau Prosiding</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successalert') ?>
            <div class="row pl-2">
                <?= form_open_multipart('dosen/proses_submit_jurnal_pros'); ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="font-weight-bold">Pilihan Jurnal atau Prosiding</td>
                        <td>:</td>
                        <td>
                            <div class="input-group mb-3 <?= form_error('pilih_jurnal_prosiding') ? 'has-error' : null ?>">
                                <select class="form-control form-control-sm bg-light" name="pilih_jurnal_prosiding" id="pilih_jurnal_prosiding">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($row->result() as $key => $data) { ?>
                                        <option value="<?= $data->id_jurnal_pros; ?>"><?= $data->nama_jurnal; ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('pilih_jurnal_prosiding') ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <div class="<?= form_error('judul_artikel') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">Judul Artikel</td>
                            <td>:</td>
                            <td>
                                <input type="hidden" name="id" id="id" value="<?= $this->fungsi->user_login()->id ?>">
                                <input type="text" name="judul_artikel" class="form-control form-control-sm bg-light" id="judul_artikel">
                            </td>
                            <?= form_error('judul_artikel') ?>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('url_artikel') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">URL Artikel</td>
                            <td>:</td>
                            <td><input type="text" name="url_artikel" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                            <?= form_error('url_artikel') ?>
                        </div>
                    </tr>
                    <tr>
                        <div class="<?= form_error('file_publikasi') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">File Publikasi</td>
                            <td>:</td>
                            <?= form_error('file_publikasi') ?>
                            <td><input type="file" name="file_publikasi" value="<?= set_value('file_publikasi') ?>" class="form-control form-control-sm bg-light" id="file_publikasi" accept="application/pdf"></td>
                        </div>
                    </tr>
                </table>
                <button type="submit" name="submit" class="ml-2 btn btn-sm btn-warning">Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>