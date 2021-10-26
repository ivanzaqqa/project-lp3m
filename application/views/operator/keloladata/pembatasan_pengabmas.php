<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md">
                    <h5 class="font-weight-bold text-secondary">Pembatasan Submit Pengabdian</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successsubmit') ?>
            <?= $this->session->flashdata('successdel') ?>
            <?= $this->session->flashdata('errordel') ?>
            <?= form_open_multipart('operator/proses_pembatasan_pengabmas'); ?>
            <table class="table-responsive">
                <tr>
                    <td>Tanggal Mulai</td>
                    <td>:</td>
                    <td><input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai"></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td>
                    <td>:</td>
                    <td><input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai"></td>
                </tr>
            </table>

            <?php if (empty($row)) { ?>
                <button type="submit" name="pembatasan_pengabmas" class="btn btn-sm btn-primary mt-2">Simpan</button>
            <?php } else { ?>
                <button type="submit" class="btn btn-sm btn-primary mt-2" disabled>Simpan</button>
            <?php } ?>

            <?php if (empty($row)) { ?>
                <button type="submit" href="" class="btn btn-sm btn-success mt-2" disabled>Reset Pembatasan</button>
            <?php } else { ?>
                <a type="button" href="<?= site_url('operator/reset_pembatasan_pengabmas/' . $row->id_pembatasan) ?>" onclick="return confirm('Apakah anda yakin untuk reset pembatasan ini?')" class="btn btn-sm btn-success mt-2">Reset Pembatasan</a>
            <?php } ?>

            <?php echo form_close() ?>

            <?php if (empty($row)) { ?>

            <?php } else { ?>
                <div class="alert alert-primary mt-2" role="alert">
                    Pembatasan pengabdian sedang berjalan pada tanggal <?= $row->tanggal_mulai ?> sampai tanggal <?= $row->tanggal_selesai ?>
                </div>
            <?php } ?>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>