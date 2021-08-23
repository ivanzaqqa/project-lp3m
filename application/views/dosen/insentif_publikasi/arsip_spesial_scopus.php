<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Arsip Insentif Publikasi Spesial Scopus </h6>
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
                        <td>Ditolak</td>
                        <td><button class="btn btn-sm btn-warning">Download</button></td>
                        <td>
                            <a href="<?= base_url('dosen/edit_spesial_scopus') ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('dosen/detail_spesial_scopus') ?>" class="btn btn-sm text-white" style="background-color: #670099;">Detail</a>
                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>
    <!-- /.container-fluid -->
</div>