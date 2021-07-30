<div class="modal fade" id="modalgedung">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">EDIT DATA PEMINJAMAN GEDUNG SERBA GUNA</h4>
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
            <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
            <input type="hidden" id="simpan" name="simpan" value="gedung" />
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
                <h3 class="box-title">DATA PENGGUNAAN GEDUNG SERBA GUNA</h3>
                <button class="btn btn-success pull-right" id="tambah_acara" type="button"><i class="bx bx-plus"></i> Tambah Data</button>
            </div>
        </div>
    </div>

    <div class="box-body">
        <table id="tabel1" class="table table-bordered table-hover">
            <thead style="background: #5383FE; color: white; width:fit-content">
                <tr>
                    <th class="text-center" width="5%">No.</th>
                    <th class="text-center" width="15%">Nama</th>
                    <th class="text-center" width="20%">Asal</th>
                    <th class="text-center" width="20%">Keperluan</th>
                    <th class="text-center" width="13%">Tanggal Penggunaan</th>
                    <th class="text-center" width="15%">Keterangan</th>
                    <th class="text-center" width="16%">Aksi</th>
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
  $("#tambah_acara").on('click', function() {
    if (open) {
          document.location.href = 'menu.php?open=tambah_acara';
  }});

  $("#bsimpan").on('click', function() {
    var data = $('#formgedung').serialize();

    $("#modalgedung").modal('hide');
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
      "ajax": "tampil.php?data=gedung",
      "destroy": true,
      "columns": [{
          "data": "aksi"
        },
        {
          "data": "nama"
        },
        {
          "data": "asal"
        },
        {
          "data": "keperluan"
        },
        {
          "data": "tanggal"
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
          "aTargets": [6],
          "mRender": function(data, type, full) {
            var formmatedvalue = " <center><button type='button'  class='btn btn-sm btn-info edit' ";
            formmatedvalue = formmatedvalue + " value='" + full.id + "'> <i class='bx bx-pencil'></i></button>";

            formmatedvalue = formmatedvalue + " <button type='button' class='btn btn-sm btn-danger hapus' value='" + full.id + "'>";
            formmatedvalue = formmatedvalue + " <i class='bx bx-trash'></i></button>";
            return formmatedvalue;
          }
        },
      ],
      "lengthChange": false,
      "scrollCollapse": true,
      "autoWidth": true,
      "ordering": false,
      "info": false
    });
  }

  //EDIT
    $("#tabel1").on('click', '.edit', function() {
        $.getJSON("tampil.php?data=editgedung&id=" + $(this).val(), function(data) {
            $('#id').val(data.id);
            $('#nama').val(data.nama);
            $('#asal').val(data.asal);
            $('#keperluan').val(data.keperluan);
            $('#tanggal').val(data.tanggal);
            $('#keterangan').val(data.keterangan);
            $("#modalgedung").modal('show');
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
                    return $.post("hapus.php?hapus=gedung&id=" + id, function(data) {
                        swal("Sukses", "Data Berhasil Dihapus", "success");
                        tampil();
                    });
                }
            });
    });
</script>