<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Arsip Insentif Publikasi Jurnal atau Prosiding</h6>
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
                    <tr>
                        <td>1</td>
                        <td>Judul 1</td>
                        <td>Judul 1</td>
                        <td>
                            <div class="input-group" size="20">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>- Pilih Status -</option>
                                    <option value="">Didanai</option>
                                    <option value="">Ditolak</option>
                                </select>
                            </div>
                        </td>
                        <td><button class="btn btn-sm btn-warning">Upload</button></td>
                        <td>
                            <a href="<?= base_url('operator/detail_jurnal_prosiding') ?>" class="btn btn-sm text-white" style="background-color: #670099;">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>