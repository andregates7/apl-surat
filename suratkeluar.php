<div class="modal fade" id="modalsuratkeluar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EDIT SURAT KELUAR</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formsuratkeluar">

          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Disposisi Surat</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="tujuan" id="tujuan" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">No. Surat</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="no_suratkeluar" id="no_suratkeluar">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Tujuan Surat</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="surat_tujuan" id="surat_tujuan" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Kode</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" class="form-control" name="kode" id="kode" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Isi Ringkasan Surat</label>
            </div>
            <div class="col-md-9">
              <textarea style="width: 100%;" type="text" class="form-control" name="isi" id="isi" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Tanggal Surat</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="date" class="form-control" name="tgl_surat" id="tgl_surat" required>
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

          <input type="hidden" name="id_dispo" id="id_dispo">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="surat_keluar" />
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
        <h3 class="box-title">DATA SURAT KELUAR</h3>
      </div>
    </div>
  </div>
  <div class="box-body">
    <table id="tabel1" class="table table-bordered table-hover">
      <thead style="background: #5383FE; color: white;">
        <tr>
          <th class="text-center" width="3%">No. </th>
          <th class="text-center" width="15%">Disposisi</th>
          <th class="text-center" width="10%">No. Surat</th>
          <th class="text-center" width="16%">Tujuan Surat</th>
          <th class="text-center" width="25%">Isi Ringkasan</th>
          <th class="text-center" width="13%">Tanggal Surat</th>
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

</div>
<footer class="main-footer">
</footer>
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
    var data = $('#formsuratkeluar').serialize();

    $("#modalsuratkeluar").modal('hide');
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
      "ajax": "tampil.php?data=suratkeluar",
      "destroy": true,
      "columns": [{
          "data": "aksi"
        },
        {
          "data": "tujuan"
        },
        {
          "data": "no_suratkeluar"
        },
        {
          "data": "surat_tujuan"
        },
        {
          "data": "isi"
        },
        {
          "data": "tgl_surat"
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
            var formmatedvalue = "<center><button type='button'  class='btn btn-sm btn-info edit' ";
            formmatedvalue = formmatedvalue + " value='" + full.id + "'> <i class='bx bx-pencil'></i></button>";

            formmatedvalue = formmatedvalue + " <button type='button' class='btn btn-sm btn-warning cetak' value='" + full.id + "'>";
            formmatedvalue = formmatedvalue + " <i class='bx bx-printer'></i></button>";

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
    $.getJSON("tampil.php?data=editsuratkeluar&id=" + $(this).val(), function(data) {
      $('#id').val(data.id);
      $('#tujuan').val(data.tujuan);
      $('#no_suratkeluar').val(data.no_suratkeluar);
      $('#surat_tujuan').val(data.surat_tujuan);
      $('#kode').val(data.kode);
      $('#isi').val(data.isi);
      $('#keterangan').val(data.keterangan);
      $("#modalsuratkeluar").modal('show');
    });
  });

  $("#tabel1").on('click', '.cetak', function() {
    var id = $(this).val();
    window.open("cetak_suratkeluar.php?id=" + id);
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
          return $.post("hapus.php?hapus=suratkeluar&id=" + id, function(data) {
            swal("Sukses", "Data Berhasil Dihapus", "success");
            tampil();
          });
        }
      });
  });
</script>