<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Arsip Insentif Publikasi Jurnal atau Prosiding
                <button class="btn btn-success mt-1 btn-sm" type="button"><a href="<?php echo base_url('operator/exportexcel_prosiding') ?>" style="color: white;">Export Data</a></button>
            </h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successupload') ?>
            <?= $this->session->flashdata('errorupload') ?>
            <?= $this->session->flashdata('notyetupload') ?>
            <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-sidebar text-white">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Jenis Insentif</th>
                        <th>Status</th>
                        <th>File Berita Acara</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($row->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->judul_artikel; ?></td>
                            <td><?= $data->nama_jurnal; ?></td>
                            <td>
                                <?php
                                echo form_dropdown(
                                    'id_status' . $data->id_insentif_jurpros,
                                    array(1 => "Disetujui", 2 => "Ditolak", 3 => "-- Pilih --"),
                                    $data->id_status,
                                    array(
                                        'class' => "btn btn-sm btn-primary dropdown-toggle",
                                        'onchange' => "changeStat($data->id_insentif_jurpros)"
                                    )
                                ); ?>

                                <script type="text/javascript">
                                    function changeStat(id_insentif_jurpros) {
                                        $.ajax({
                                            url: "<?= base_url() ?>operator/changestat_jurpros",
                                            type: "POST",
                                            dataType: "json",
                                            data: {
                                                id_insentif_jurpros: id_insentif_jurpros
                                            },
                                            success: function(data) {
                                                alert(data.msg);
                                            }
                                        })
                                    }
                                </script>
                            </td>
                            <td>
                                <?php if ($data->file_berita_acara != null) { ?>
                                    <a class="btn btn-sm btn-warning" href="<?= base_url('operator/upload_file_berita_acara_jurpros/' . $data->id_insentif_jurpros) ?>" class="btn btn-sm btn-warning" onclick="return confirm('Apakah anda yakin untuk mengubah file berita acara ini?')">Sudah di Upload</a>
                                <?php } else { ?>
                                    <a class="btn btn-sm btn-warning" href="<?= base_url('operator/upload_file_berita_acara_jurpros/' . $data->id_insentif_jurpros) ?>" class="btn btn-sm btn-warning">Upload</a>
                                <?php } ?>
                            </td>
                            <td>
                                <a href="<?= base_url('operator/detail_jurnal_prosiding/' . $data->id_insentif_jurpros) ?>" class="btn btn-sm text-white" style="background-color: #670099;">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>