<div class="modal fade" id="modalbmn">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">EDIT DATA BMN</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form" id="formbmn">

                    <input type="hidden" name="id" id="id">

                    <div class="form-group">
                        <div class="col-md-3">
                            <label class="control-label">Nama Barang</label>
                        </div>
                        <div class="col-md-9">
                            <input style="width: 100%;" type="text" class="form-control" name="nama_barang" id="nama_barang" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label class="control-label">Jumlah Barang</label>
                        </div>
                        <div class="col-md-9">
                            <input style="width: 100%;" type="text" class="form-control" name="jumlah" id="jumlah" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label class="control-label">Kondisi Barang</label>
                        </div>
                        <div class="col-md-9">
                            <select name="kondisi_barang" id="kondisi_barang" class="form-control select2" style="width: 100%;">
                                <option disabled></option>
                                <option>Berfungsi/Baik</option>
                                <option>Habis</option>
                                <option>Rusak (Tidak bisa Diperbaiki)</option>
                                <option>Tidak Berfungsi dengan Baik</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label class="control-label">Jenis Aset</label>
                        </div>
                        <div class="col-md-9">
                            <select name="jenis" id="jenis" class="form-control select2" style="width: 100%;" disabled>
                                <option>Aset Lancar</option>
                                <option>Aset Tetap</option>
                                <option>Aset Tidak Berwujud</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label class="control-label">Catatan</label>
                        </div>
                        <div class="col-md-9">
                            <textarea style="width: 100%;" class="form-control" name="catatan" id="catatan" required></textarea>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <input type="hidden" id="simpan" name="simpan" value="kondisi" />
                <button type="button" id="bsimpan" class="btn btn-info">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="box box-solid">
    <div class="box-header ">
        <div class="form-group">
            <div class="col-md-12">
                <h3 class="box-title">DATA KONDISI BMN</h3>
            </div>
        </div>
    </div>

    <div class="box-body">
        <table id="tabel1" class="table table-bordered table-hover">
            <thead style="background: #5383FE; color: white;">
                <tr>
                    <th class="text-center" width="5%">No.</th>
                    <th class="text-center" width="20%">Nama Barang</th>
                    <th class="text-center" width="10%">Jumlah Barang</th>
                    <th class="text-center" width="19%">Kondisi</th>
                    <th class="text-center" width="25%">Catatan</th>
                    <th class="text-center" width="12%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
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
    tampil();

    $(function() {
        $(".select2").select2();
        $('.numeric').number(true, 0);
    });

    $("#bsimpan").on('click', function() {
        var data = $('#formbmn').serialize();

        $("#modalbmn").modal('hide');
        $.ajax({
            type: 'POST',
            url: "simpan.php",
            data: data,
            success: function() {
                swal("Sukses", "Data Berhasil Disimpan", "success");
                tampil();
            }
        });
        return false;
    });

    function tampil() {
        var nomor = 0;

        $('#tabel1').dataTable({
            "ajax": "tampil.php?data=kondisi",
            "destroy": true,
            "columns": [{
                    "data": "aksi"
                },
                {
                    "data": "nama_barang"
                },
                {
                    "data": "jumlah"
                },
                {
                    "data": "kondisi_barang"
                },
                {
                    "data": "catatan"
                },
                {
                    "data": "aksi"
                }
            ],
            "aoColumnDefs": [{
                    "aTargets": [0],
                    "mRender": function(data, type, full) {
                        nomor = nomor + 1;
                        return nomor;
                    }
                },
                {
                    "aTargets": [5],
                    "mRender": function(data, type, full) {
                        var formmatedvalue = " <center><button type='button'  class='btn btn-sm btn-info edit' ";
                        formmatedvalue = formmatedvalue + " value='" + full.id + "'> <i class='bx bx-pencil'></i></button>";

                        formmatedvalue = formmatedvalue + " <button type='button' class='btn btn-sm btn-danger hapus' value='" + full.id + "'>";
                        formmatedvalue = formmatedvalue + " <i class='bx bx-trash'></i></button>";
                        return formmatedvalue;
                    }
                },
            ],
            "paging": true,
            // "lengthChange": false,
            "searching": true,
            // "ordering": true,
            // "info": true,
            // "autoWidth": false,
            "lengthChange": true,
            "scrollCollapse": true,
            "autoWidth": true,
            "ordering": true,
            "info": true
        });
    }

    //EDIT
    $("#tabel1").on('click', '.edit', function() {
        $.getJSON("tampil.php?data=editkondisi&id=" + $(this).val(), function(data) {
            $('#id').val(data.id);
            $('#nama_barang').val(data.nama_barang);
            $('#jumlah').val(data.jumlah);
            $('#kondisi_barang').val(data.kondisi_barang);
            $('#catatan').val(data.catatan);
            $("#modalbmn").modal('show');
        });
    });

    $("#tabel1").on('click', '.hapus', function() {
        var id = $(this).val();
        swal({
                title: "Hapus Data?",
                text: "Data Akan Dihapus Permanen",
                icon: "warning",
                buttons: {
                    cancel: "Batal",
                    catch: {
                        text: "Hapus",
                        value: true,
                        closeModal: false
                    },
                },
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    return $.post("hapus.php?hapus=kondisi&id=" + id, function(data) {
                        swal("Sukses", "Data Berhasil Dihapus", "success");
                        tampil();
                    });
                }
            });
    });
</script>