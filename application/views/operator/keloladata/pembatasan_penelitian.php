<div class="container-fluid">
    <div class="card shadow mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md">
                    <h5 class="font-weight-bold text-secondary">Pembatasan Submit Penelitian</h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form>
                <table class="table-responsive">
                    <tr>
                        <td>Tanggal Mulai</td>
                        <td>:</td>
                        <td><input type="date" class="form-control" id="tanggal_mulai"></td>
                    </tr>
                    <tr>
                        <td>Tanggal Selesai</td>
                        <td>:</td>
                        <td><input type="date" class="form-control" id="tanggal_selesai"></td>
                    </tr>
                </table>
                <button type="submit" name="" class="btn btn-sm btn-primary mt-2">Simpan</button>
                <button type="reset" name="" class="btn btn-sm btn-success mt-2">Reset Pembatasan</button>
            </form>
            <div class="alert alert-primary mt-2" role="alert">
                Pembatasan penelitian sedang berjalan pada tanggal .... sampai tanggal .....
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>