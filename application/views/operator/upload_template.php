<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header">
            <?= $this->session->flashdata('successupload') ?>
            <?= $this->session->flashdata('errorupload'); ?>
            <?= $this->session->flashdata('max_size'); ?>
            <div class="row">
                <div class="col-md">
                    <h5 class="font-weight-bold text-secondary">Upload Template Lembar Pengesahan</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= form_open_multipart('operator/proses_upload_lembar_pengesahan/'); ?>
            <input type="hidden" name="id_lembar_pengesahan" id="id_lembar_pengesahan" value="">
            <input type="file" name="file_lembar_pengesahan" class="form-control form-control-sm bg-light" id="file_lembar_pengesahan">

            <?php if ($row->file_lembar_pengesahan != null) { ?>
                <button class="btn btn-sm btn-primary text-center mt-2" disabled> <i class="fas fa-download"></i>Upload</button>
            <?php } else { ?>
                <button type="submit" name="submit_lp" class="btn btn-sm btn-primary text-center mt-2"> <i class="fas fa-download"></i>Upload</button>
            <?php } ?>

            <?php echo form_close() ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>