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
                            <th>Target Jurnal</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $arsip) { ?>
                            <tr>
                                <td><?= $no++ ?>.</td>
                                <td><?= $arsip->judul_penelitian ?></td>
                                <td><?= $arsip->tahun_periode ?></td>
                                <td><?= date('d-m-Y', strtotime($arsip->tgl_submit)) ?></td>
                                <td>- <?= $arsip->mhs_terlibat ?> <br> - <?= $arsip->mhs_terlibat2 ?></td>
                                <td><?= $arsip->target_jurnal ?></td>
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
                                            <?php if ($arsip->status == "Didanai") { ?>
                                                <a class="dropdown-item" href="<?= site_url('dosen/tahapan_pelaksanaan_penelitian/' . $arsip->id_penelitian) ?>" type="button">Tahapan Pelaksanaan</a>
                                            <?php } else { ?>
                                                <a class="dropdown-item" href="" type="button" style="pointer-events:none; cursor:default;color:grey;">Tahapan Pelaksanaan</a>
                                            <?php } ?>
                                        </div>
                                        <a class="btn btn-sm btn-danger" href="<?= site_url('dosen/delpenelitian/' . $arsip->id_penelitian) ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data penelitian ini?')" type="button">Hapus Data</a>
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