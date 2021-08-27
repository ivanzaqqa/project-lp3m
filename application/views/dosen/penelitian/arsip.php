<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Arsip Penelitian</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('successdel') ?>
            <?= $this->session->flashdata('errordel') ?>
            <div class="table-responsive table-striped">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                    <thead class="bg-sidebar text-white">
                        <tr>
                            <th>No</th>
                            <th>Judul Penelitian</th>
                            <th>Periode Pengajuan</th>
                            <th>Tanggal Submit</th>
                            <th>Mahasiswa Yang Dilibatkan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $arsip) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $arsip->judul_penelitian ?></td>
                                <td><?= $arsip->tahun_periode ?></td>
                                <td><?= date('d-m-Y', strtotime($arsip->tgl_submit)) ?></td>
                                <td><?= $arsip->mhs_terlibat ?></td>
                                <td><?= $arsip->status ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                            <button class="dropdown-item dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Download
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                <a class="dropdown-item" href="<?php echo base_url() . 'upload/penelitian/' . $arsip->file_proposal; ?>">Proposal</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo base_url() . 'upload/penelitian/' . $arsip->file_rps; ?>">RPS</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo base_url() . 'upload/penelitian/' . $arsip->form_integrasi; ?>">Form Integrasi</a>
                                            </div>
                                            <button class="dropdown-item" type="button">Tahapan Pelaksanaan</button>
                                        </div>
                                        <!-- <a href="<?= site_url('dosen/delpenelitian/' . $arsip->id) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data penelitian ini?')" type="button" class="btn btn-warning btn-sm ml-1 text-white"> <i class="fa fa-trash"></i> Hapus</a> -->
                                        <a class="btn btn-danger btn-sm rounded-0" href="<?= site_url('dosen/delpenelitian/' . $arsip->id_penelitian) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data penelitian ini?')" type="button" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></a>
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