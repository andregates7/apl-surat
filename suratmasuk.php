<div class="modal fade" id="modalsuratmasuk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT DATA SURAT MASUK</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formsuratmasuk">

          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">No Agenda</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="no_agenda" id="no_agenda" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Asal Surat</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="asal_surat" id="asal_surat" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Nomor Surat</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="no_surat" id="no_surat" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Kode</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="kode" id="kode" required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label" style="text-align:left">Isi Ringkasan Surat</label>
            </div>
            <div class="col-md-9">
              <textarea style="width: 100%;" class="form-control" name="isi" id="isi" required></textarea>
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

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Kode Klasifikasi</label>
            </div>
            <div class="col-md-9">
              <select name="id_klasifikasi" id="id_klasifikasi" class="form-control select2" style="width: 100%;">
                <option value="1">000 - UMUM</option>
                <option value="2">100 - Pemerintah</option>
                <option value="3">200 - Politik</option>
                <option value="4">300 - Keamanan/Ketertiban</option>
                <option value="5">400 - Kesejahteraan Rakyat</option>
                <option value="6">500 - Perekonomian</option>
                <option value="7">600 - Pekerjaan Umum & Ketenagaan</option>
                <option value="8">700 - Pengawasan</option>
                <option value="9">800 - Kepegawaian</option>
                <option value="10">900 - Keuangan</option>
              </select>
            </div>
          </div>

          <div class="form-group">
                <div class="col-md-3">
                    <label class="control-label">File Surat</label>
                </div>
                <div class="col-md-9">
                    <input style="width: 100%;" type="file" class="form-control" name="File" id="File">
                </div>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="suratmasuk" />
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
        <h3 class="box-title">DATA SURAT MASUK</h3>
        <button class="btn btn-success pull-right" id="tambah_suratmasuk" type="button"><i class="bx bx-plus"></i> Tambah Data</button>
      </div>
    </div>
  </div>

  <div class="box-body">
    <table id="tabel1" class="table table-bordered table-hover">
      <thead style="background: #5383FE; color: white;">
        <tr>
          <th class="text-center" width="5%">No.</th>
          <th class="text-center" width="9%">Kode</th>
          <th class="text-center" width="25%">Isi Ringkasan</th>
          <th class="text-center" width="16%">Asal Surat</th>
          <th class="text-center" width="14">No. Surat</th>
          <th class="text-center" width="13%">Tanggal Surat</th>
          <th class="text-center" width="20%">File</th>
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

  //TAMBAH
  $("#tambah_suratmasuk").on('click', function() {
    if (open) {
          document.location.href = 'menu.php?open=buat_suratmasuk';
  }});

  $("#bsimpan").on('click', function() {
    var data = $('#formsuratmasuk').serialize();

    $("#modalsuratmasuk").modal('hide');
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
      "ajax": "tampil.php?data=suratmasuk",
      "destroy": true,
      "columns": [{
          "data": "aksi"
        },
        {
          "data": "kode"
        },
        {
          "data": "isi"
        },
        {
          "data": "asal_surat"
        },
        {
          "data": "no_surat"
        },
        {
          "data": "tgl_surat"
        },
        {
          "data": "file"
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

            formmatedvalue = formmatedvalue + " <button type='button' class='btn btn-sm btn-success dispo' value='" + full.id + "'>";
            formmatedvalue = formmatedvalue + " <i class='bx bx-file'></i></button>";

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
    $.getJSON("tampil.php?data=editsuratmasuk&id=" + $(this).val(), function(data) {
      $('#id').val(data.id);
      $('#no_agenda').val(data.no_agenda);
      $('#no_surat').val(data.no_surat);
      $('#kode').val(data.kode);
      $('#asal_surat').val(data.asal_surat);
      $('#isi').val(data.isi);
      $('#tgl_surat').val(data.tgl_surat);
      $('#keterangan').val(data.keterangan);
      $('#id_klasifikasi').val(data.id_klasifikasi).change();
      $("#modalsuratmasuk").modal('show');
    });
  });

  $("#tabel1").on('click', '.dispo', function() {
    var id = $(this).val();
    swal({
        title: "Ingin Disposisi Surat?",
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
          document.location.href = 'menu.php?open=buat_dispo&id=' + $(this).val(),
            function(data) {
              $('#id').val(data.id);
            };
        };
      });
  });

  $("#tabel1").on('click', '.cetak', function() {
    var id = $(this).val();
    window.open("cetak_suratmasuk.php?id=" + id);
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
          return $.post("hapus.php?hapus=suratmasuk&id=" + id, function(data) {
            swal("Sukses", "Data Berhasil Dihapus", "success");
            tampil();
          });
        }
      });
  });
</script>