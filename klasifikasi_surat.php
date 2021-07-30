<div class="box box-solid">
  <div class="box-header ">
    <div class="form-group">
      <div class="col-md-12">
        <h3 class="box-title">DATA KLASIFIKASI SURAT</h3>
      </div>
    </div>
  </div>
  <div class="box-body">
    <table id="tabel1" class="table table-bordered text-center table-hover">
      <thead style="background: #5383FE; color: white;">
        <tr>
          <th class="text-center" width="3%">No. </th>
          <th class="text-center">Kode</th>
          <th class="text-center">Jenis Klasifikasi</th>
          <th class="text-center">Jumlah Klasifikasi</th>
        </tr>
      </thead>
      <tbody>
        <tr>
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


  function tampil() {
    var nomor = 0;

    $('#tabel1').dataTable({
      "ajax": "tampil.php?data=klasifikasi",
      "destroy": true,
      "columns": [{
          "data": "aksi"
        },
        {
          "data": "kode_klasifikasi"
        },
        {
          "data": "jenis_klasifikasi"
        },
        {
          "data": "jumlah_klasifikasi"
        },
      ],
      "aoColumnDefs": [{
          "aTargets": [0],
          "mRender": function(data, type, full) {
            nomor = nomor + 1;
            return nomor;
          }
        },
        //{
        //},
      ],
      "lengthChange": false,
      "scrollCollapse": true,
      "autoWidth": true,
      "ordering": false,
      "info": false
    });
  }
</script>