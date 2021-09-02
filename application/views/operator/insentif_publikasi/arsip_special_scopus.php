<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Arsip Insentif Publikasi special Scopus </h6>
        </div>
        <div class="card-body">
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
                            <td><?= $data->nama_scopus; ?></td>
                            <td>
                                <?php
                                echo form_dropdown(
                                    'id_status' . $data->id_insentif_scopus,
                                    array(1 => "Disetujui", 2 => "Ditolak", 3 => "-- Pilih --"),
                                    $data->id_status,
                                    array(
                                        'class' => "btn btn-md btn-primary dropdown-toggle",
                                        'onchange' => "changeStat($data->id_insentif_scopus)"
                                    )
                                ); ?>

                                <script type="text/javascript">
                                    function changeStat(id_insentif_scopus) {
                                        $.ajax({
                                            url: "<?= base_url() ?>operator/changestat_scopus",
                                            type: "POST",
                                            dataType: "json",
                                            data: {
                                                id_insentif_scopus: id_insentif_scopus
                                            },
                                            success: function(data) {
                                                alert(data.msg);
                                            }
                                        })
                                    }
                                </script>
                            </td>
                            <td><button class="btn btn-sm btn-warning">Upload</button></td>
                            <td>
                                <a href="<?= base_url('operator/detail_special_scopus') ?>" class="btn btn-sm text-white" style="background-color: #670099;">Detail</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.container-fluid -->
</div>