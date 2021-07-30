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
                            <label class="control-label">Tanggal Input</label>
                        </div>
                        <div class="col-md-9">
                            <input style="width: 100%;" type="date" class="form-control" value="" name="tgl_input" id="tgl_input" required>
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
                <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
                <input type="hidden" id="simpan" name="simpan" value="bmn" />
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
                <h3 class="box-title">DATA BMN</h3>
                <button class="btn btn-success pull-right" id="tambah_suratmasuk" type="button"><i class="bx bx-plus"></i> Tambah Data</button>
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
                    <th class="text-center" width="10%">Satuan</th>
                    <th class="text-center" width="12%">Tanggal Input</th>
                    <th class="text-center" width="13%">Jenis Aset</th>
                    <th class="text-center" width="18%">Keterangan</th>
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

    //TAMBAH
    $("#tambah_suratmasuk").on('click', function() {
        if (open) {
            document.location.href = 'menu.php?open=buat_bmn';
        }
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
            "ajax": "tampil.php?data=bmn",
            "destroy": true,
            "columns": [{
                    "data": "aksi"
                },
                {
                    "data": "nama_barang"
                },
                {
                    "data": "jumlah_barang"
                },
                {
                    "data": "satuan"
                },
                {
                    "data": "tgl_input"
                },
                {
                    "data": "jenis_aset"
                },
                {
                    "data": "keterangan"
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
                    "aTargets": [7],
                    "mRender": function(data, type, full) {
                        var formmatedvalue = " <center><button type='button'  class='btn btn-sm btn-info edit' ";
                        formmatedvalue = formmatedvalue + " value='" + full.id + "'> <i class='bx bx-pencil'></i></button>";

                        formmatedvalue = formmatedvalue + " <button type='button' class='btn btn-sm btn-success update' value='" + full.id + "'>";
                        formmatedvalue = formmatedvalue + " <i class='bx bx-send'></i></button>";

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
        $.getJSON("tampil.php?data=editbmn&id=" + $(this).val(), function(data) {
            $('#id').val(data.id);
            $('#nama_barang').val(data.nama_barang);
            $('#jumlah_barang').val(data.jumlah_barang);
            $('#satuan').val(data.satuan);
            $('#tgl_input').val(data.tgl_input);
            $('#id_jenis_aset').val(data.id_jenis_aset).change();
            $('#keterangan').val(data.keterangan);
            $("#modalbmn").modal('show');
        });
    });

    $("#tabel1").on('click', '.update', function() {
        var id = $(this).val();
        swal({
                title: "Proses Kondisi Barang?",
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
                    document.location.href = 'menu.php?open=kondisi_bmn&id=' + $(this).val(),
                        function(data) {
                            $('#id').val(data.id);
                        };
                };
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
                    return $.post("hapus.php?hapus=bmn&id=" + id, function(data) {
                        swal("Sukses", "Data Berhasil Dihapus", "success");
                        tampil();
                    });
                }
            });
    });
</script>