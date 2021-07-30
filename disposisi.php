<div class="modal fade" id="modaldiposisi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EDIT DISPOSISI</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formdisposisi">

          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Asal Surat</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="asal_surat" id="asal_surat" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Tujuan</label>
            </div>
            <div class="col-md-9">
              <select name="tujuan" id="tujuan" class="form-control select2" style="width: 100%;">
                <option>Bagian UMUM</option>
                <option>Kabbag Kelembagaan & Sistem Informasi</option>
                <option>Kabbag Akademik & Kemahasiswaan dan Sumber Daya</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Isi Disposisi</label>
            </div>
            <div class="col-md-9">
              <textarea style="width: 100%;" class="form-control" name="isi_dispo" id="isi_dispo" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Sifat Disposisi</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="sifat" id="sifat" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Batas Waktu</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="date" class="form-control" name="batas_waktu" id="batas_waktu" required>
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
        <input type="hidden" id="simpan" name="simpan" value="disposisi" />
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
        <h3 class="box-title">DATA DISPOSISI</h3>
      </div>
    </div>
  </div>
  <div class="box-body">
    <table id="tabel1" class="table table-bordered table-hover">
      <thead style="background: #5383FE; color: white;">
        <tr>
          <th class="text-center" width="3%">No.</th>
          <th class="text-center" width="10%">No. Surat</th>
          <th class="text-center" width="15%">Asal Surat</th>
          <th class="text-center" width="15%">Tujuan</th>
          <th class="text-center" width="25%">Isi Disposisi</th>
          <th class="text-center" width="12%">Batas Waktu</th>
          <th class="text-center" width="23%">Aksi</th>
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
    var data = $('#formdisposisi').serialize();

    $("#modaldiposisi").modal('hide');
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
      "ajax": "tampil.php?data=disposisi",
      "destroy": true,
      "columns": [{
          "data": "aksi"
        },
        {
          "data": "no_surat"
        },
        {
          "data": "asal_surat"
        },
        {
          "data": "tujuan"
        },
        {
          "data": "isi_dispo"
        },
        {
          "data": "batas_waktu"
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

            formmatedvalue = formmatedvalue + " <button type='button' class='btn btn-sm btn-success suratkeluar' value='" + full.id + "'>";
            formmatedvalue = formmatedvalue + " <i class='bx bx-send'></i></button>";

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
    $.getJSON("tampil.php?data=editdisposisi&id=" + $(this).val(), function(data) {
      $('#id').val(data.id);
      $('#asal_surat').val(data.asal_surat);
      $('#tujuan').val(data.tujuan);
      $('#isi_dispo').val(data.isi_dispo);
      $('#sifat').val(data.sifat);
      $('#batas_waktu').val(data.batas_waktu);
      $('#catatan').val(data.catatan);
      $("#modaldiposisi").modal('show');
    });
  });

  $("#tabel1").on('click', '.suratkeluar', function() {
    var id = $(this).val();
    swal({
        title: "Ingin Membuat Surat Balasan?",
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
          document.location.href = 'menu.php?open=buat_suratkeluar&id=' + $(this).val(),
            function(data) {
              $('#id').val(data.id);
            };
        };
      });
  });

  $("#tabel1").on('click', '.cetak', function() {
    var id = $(this).val();
    window.open("cetak_disposisi.php?id=" + id);
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
          return $.post("hapus.php?hapus=disposisi&id=" + id, function(data) {
            swal("Sukses", "Data Berhasil Dihapus", "success");
            tampil();
          });
        }
      });
  });
</script>