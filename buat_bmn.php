<div class="box box-solid">
    <div class="box-header with-border">
        <h4 class="title">TAMBAH DATA BMN</h4>
    </div>
    <div class="box-body">
        <form class="form-horizontal" role="form" id="formbmn">

            <input type="hidden" name="id" id="id">

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Nama Barang</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="text" class="form-control" name="nama_barang" id="nama_barang" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Jumlah Barang</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="text" class="form-control" name="jumlah_barang" id="jumlah_barang" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Satuan</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="text" class="form-control" name="satuan" id="satuan" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Keterangan</label>
                </div>
                <div class="col-md-9">
                    <textarea style="width: 100%;" class="form-control" name="keterangan" id="keterangan" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Jenis Aset</label>
                </div>
                <div class="col-md-9">
                    <select name="id_jenis_aset" id="id_jenis_aset" class="form-control select2" style="width: 100%;">
                        <option value="1">Aset Lancar</option>
                        <option value="2">Aset Tetap</option>
                        <option value="3">Aset Tidak Berwujud</option>
                    </select>
                </div>
            </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" id="batal" name="batal" >Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="bmn" />
        <button type="button" id="bsimpan" class="btn btn-info">Simpan</button>
    </div>
    </form>
</div>
</div>

<script src="style/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="style/bootstrap/js/bootstrap.min.js"></script>
<script src="style/dist/js/app.min.js"></script>
<script src="style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="style/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="style/plugins/select2-3.5.4/select2.min.js"></script>
<script src="style/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="style//plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="style/jquery.number.min.js"></script>
<script src="style/sweetalert.min.js"></script>

<script>
    $(function() {
        $(".select2").select2();
        $('.numeric').number(true, 0);
    });

    $("#bsimpan").on('click', function() {
        var data = $('#formbmn').serialize();

        $.ajax({
            type: 'POST',
            url: "simpan.php",
            data: data,
            success: function() {
                swal("Sukses", "Data Berhasil Disimpan", "success");
                document.location.href = 'menu.php?open=bmn';
            }
        });
        return false;
    });

    $("#batal").on('click', function() {
        var id = $(this).val();
        swal({
                title: "Yakin ingin Kembali?",
                icon: "warning",
                buttons: {
                    cancel: "Batal",
                    catch: {
                        text: "Ya",
                        value: true,
                        closeModal: false
                    },
                },
                dangerMode: true,
            })
            .then((open) => {
                if (open) {
                    document.location.href = 'menu.php?open=bmn';
                };
            });
    });
</script>