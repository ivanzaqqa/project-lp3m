<div class="container-fluid">
    <div class="card shadow mb-2">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-secondary">Update Insentif Publikasi Jurnal atau Prosiding</h6>
        </div>
        <div class="card-body">
            <div class="row pl-2">
                <form action="">
                    <table class="table table-responsive">
                        <tr>
                            <td class="font-weight-bold">Pilihan Jurnal atau Prosiding</td>
                            <td>:</td>
                            <td>
                                <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>- Pilih -</option>
                                        <option value="">One</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Judul Artikel</td>
                            <td>:</td>
                            <td><input type="text" name="judul_artikel" class="form-control form-control-sm bg-light" id="judul_artikel"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">URL Artikel</td>
                            <td>:</td>
                            <td><input type="text" name="url_artikel" class="form-control form-control-sm bg-light" id="url_artikel"></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">File Publikasi</td>
                            <td>:</td>
                            <td><input type="file" name="file_publikasi" class="form-control form-control-sm bg-light" id="file_publikasi"></td>
                        </tr>
                        <tr>
                            <td><a href="<?= base_url('dosen/arsip_jurnal_prosiding') ?>" type="button" class="btn btn-sm text-white" style="background-color: #670099;"> <i class="fa fa-chevron-circle-left"></i>
                                    Kembali</a>
                                <button class="ml-2 btn btn-sm btn-warning">Update</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>