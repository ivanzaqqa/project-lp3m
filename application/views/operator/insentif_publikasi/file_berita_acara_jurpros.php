<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Upload File Berita Acara Untuk Jurnal atau Prosiding</h6>
        </div>
        <div class="card-body">
            <div class="row pl-2">
                <?php echo form_open_multipart('operator/proses_upload_file_berita_acara_jurpros'); ?>
                <?= $this->session->flashdata('erroredit'); ?>
                <table class="table table-responsive">
                    <tr>
                        <td class="font-weight-bold">File Berita Acara</td>
                        <td>:</td>
                        <td>
                            <?php
                            if ($page == 'edit') {
                                if ($row->file_berita_acara != null) { ?>
                                    <?= $row->file_berita_acara; ?>
                            <?php }
                            } ?>
                            <input type="hidden" name="id" id="id" value="<?= $row->id ?>">
                            <input type="file" name="file_berita_acara" class="form-control form-control-sm bg-light" id="file_berita_acara">
                        </td>

                    <tr>
                        <td><a href="<?= base_url('operator/arsip_jurnal_prosiding') ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                Kembali</a>
                            <button type="submit" name="edit" class="ml-2 btn btn-sm btn-warning">Upload</button>
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