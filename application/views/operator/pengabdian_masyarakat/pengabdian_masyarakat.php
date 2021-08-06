<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-primary" style="position: absolute; margin-top: 10px;">Daftar Pengabdian Masyarakat</h6>
            <button class="btn btn-dark" type="button" style="margin-left: 1050px;"><a href="<?php echo base_url('operator/exportexcel_pengabmas') ?>" style="color: white;">Export</a></button>
        </div>
        <div class="card-body">
            <div class="table-responsive table-striped">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-sidebar text-white text-sm">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Judul Penelitian</th>
                            <th>Periode Pengajuan</th>
                            <th>Tanggal Submit</th>
                            <th>Matkul Diampu</th>
                            <th>Mahasiswa Yang Dilibatkan</th>
                            <th>Kelompok Riset</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data->name; ?></td>
                                <td><?= $data->judul_pengabmas ?></td>
                                <td><?= $data->tahun_periode; ?></td>
                                <td><?=date('d-m-Y', strtotime($data->tgl_submit))?></td>
                                <td><?= $data->matkul_diampu; ?></td>
                                <td><?= $data->mhs_terlibat; ?></td>
                                <td><?= $data->kelompok_riset; ?></td>
                                <td>
                                    <?php 
                                        echo form_dropdown('id_status'.$data->id_pengabmas,
                                        array(1=>"Didanai", 2=>"Ditolak", 3=>"-- Pilih --"),
                                        $data->id_status,
                                        array('class'=>"btn btn-md btn-primary dropdown-toggle",
                                        'onchange' => "changeStat($data->id_pengabmas)"
                                    ));?>

                            <script type="text/javascript">
                            function changeStat(id_pengabmas) {
                            $.ajax( {
                            url:"<?=base_url()?>operator/changestat_pengabmas",
                            type:"POST",
                            dataType:"json",
                            data:{id_pengabmas:id_pengabmas},
                            success:function(data) {
                            alert(data.msg);
                                }
                            })
                        }
                    </script>
                                </td>
                                <td>

                                    <div class="dropdown">
                                        <button class="btn btn-md btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pilih Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">

                                            <button class="dropdown-item dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Download
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <a class="dropdown-item" href="<?php echo base_url().'upload/pengabdian_masyarakat/'.$data->file_proposal; ?>">Proposal</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo base_url().'upload/pengabdian_masyarakat/'.$data->file_rps; ?>">RPS</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo base_url().'upload/pengabdian_masyarakat/'.$data->form_integrasi; ?>">Form Integrasi</a>
                                            </div>
                                            <button class="dropdown-item" type="button">Tahapan Pelaksanaan</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<footer class=" bg-sidebar">
    <div class="container my-auto">
        <div class="copyright my-auto">
            <span style="font-size: 13px;">Copyright &copy; Sistem Management Hibah Internal Universitas Kadiri</span>
        </div>
    </div>
</footer>