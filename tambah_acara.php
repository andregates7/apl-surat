<div class="box box-solid">
    <div class="box-header with border">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMBAH PENGGUNAAN GEDUNG SERBA GUNA</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" id="formgedung">

            <input type="hidden" name="id" id="id">

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Nama</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="text" class="form-control" name="nama" id="nama" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Asal</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="text" class="form-control" name="asal" id="asal" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">Keperluan</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="text" class="form-control" name="keperluan" id="keperluan" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-3">
                    <label style="text-align:left" class="control-label">Tanggal Penggunaan</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="date" class="form-control" name="tanggal" id="tanggal" required>
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


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="gedung" />
        <button type="button" id="bsimpan" class="btn btn-success">Simpan</button>
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
        var data = $('#formgedung').serialize();

        $.ajax({
            type: 'POST',
            url: "simpan.php",
            data: data,
            success: function() {
                swal("Sukses", "Data Berhasil Disimpan", "success");
                document.location.href = 'menu.php?open=gedung';
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
                    document.location.href = 'menu.php?open=gedung';
                };
            });
    });
</script>