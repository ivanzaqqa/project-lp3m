<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md">
                    <h5 class="font-weight-bold text-secondary">Download Template Lembar Pengesahan</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php
            $no = 0;
            foreach ($row->result() as $key => $data) { ?>
                <a href="<?php echo base_url() . 'upload/templates/lembar_pengesahan/' . $data->file_lembar_pengesahan; ?>" type="button" class="btn btn-md btn-primary text-center"> <i class="fas fa-download"></i>Download</a>
            <?php } ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>