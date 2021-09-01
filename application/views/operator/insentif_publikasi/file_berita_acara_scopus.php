<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Upload File Berita Acara Jurnal Atau Prosiding</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successalert') ?>
            <div class="row pl-2">
                <?= form_open_multipart('dosen/proses_upload_file_berita_acara_special_scopus'); ?>
                <table class="table table-responsive">
                    <tr>
                        <div class="<?= form_error('file_berita_acara') ? 'has-error' : null ?>">
                            <td class="font-weight-bold">File Berita Acara</td>
                            <td>:</td>
                            <?= form_error('file_berita_acara') ?>
                            <td><input type="file" name="file_berita_acara" value="<?= set_value('file_berita_acara') ?>" class="form-control form-control-sm bg-light" id="file_berita_acara" accept="application/pdf"></td>
                        </div>
                    </tr>
                </table>
                <button type="submit" name="edit" class="ml-2 btn btn-sm btn-warning">Simpan</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>