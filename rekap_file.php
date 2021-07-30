<div class="modal modal-primary fade" id="modalstatusdispo">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TANGGAL DISPOSISI</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formstatusdispo">          
          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Tanggal Disposisi</label>
              <input type="hidden"  name="id" id="id"> 
            </div>
            <div class="col-md-9">
               <input style="width: 100%;" type="text" autocomplete="off" class="form-control datepicker" name="tanggal" id="tanggal">     
            </div>
          </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="statusdispo" />
        <button type="button" id="simpanstatusmotor" class="btn btn-info" >Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">PENCARIAN BERKAS ELEKTRONIK</h3>
  </div>
  <div class="box-body">
    <div>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <div class="col-md-6">
            <button type="button" class="btn btn-default pull-right" name="bulan" id="bulan">
              <span>
                <i class="fa fa-calendar"></i> Pilih Tanggal
              </span>
              <i class="fa fa-caret-down"></i>
            </button>
          </div>
          <div class="col-md-2">
            <button class="btn btn-primary" id="filter" type="button">Filter</button>
            <button class="btn btn-success" id="cetak" type="button">Cetak</button>
          </div>
        </div>
      </form>
    </div>
    <table id="tabel1" class="table table-bordered table-hover">
      <thead style="background: #5383FE; color: white;">
        <tr>
          <th class="text-center" width="3%">No. </th>
          <th class="text-center" width="10%">No. Agenda</th>
          <th class="text-center" width="25%">File</th>
          <th class="text-center" width="25%">Asal Surat</th>
          <th class="text-center" width="20%">Jenis Klasifikasi</th>
          <!-- <th class="text-center" width="15%">Status</th> -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <!-- <td></td> -->
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
<script src="style/sweetalert.min.js"></script>
<script src="style/plugins/moment/min/moment.min.js"></script>
<script src="style/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="style/plugins/datetime/datetime.js"></script>
<script>
  $(function() {
    $('.datepicker').datepicker({
      autoclose: true,
      format: "yyyy-mm-dd"
    });
    $(".monthpicker").datepicker({
      format: "yyyy-mm",
      startView: "months",
      minViewMode: "months",
      autoclose: true
    });
    $(".select2").select2();
  });

  var awal = "";
  var akhir = "";

  $(function() {
    $('#bulan').daterangepicker({
        ranges: {
          'Hari ini': [moment(), moment()],
          'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
          '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
          'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
          'Bulan Lalu': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        awal = start.format('YYYY-MM-DD');
        akhir = end.format('YYYY-MM-DD');
        $('#bulan span').html(start.format('DD/MMMM/YYYY') + ' - ' + end.format('DD/MMMM/YYYY'))
      }
    )
  });

  function formatDesimal(num) {
    var n = num.toString(),
      p = n.indexOf('.');
    return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, function($0, i) {
      return p < 0 || i < p ? ($0 + ',') : $0;
    });
  }

  function tampil() {
    var nomor = 0;
    var bulan=$('#bulan').val();

    if($('#bulan').val()==''){bulan="-"}
    $('#tabel1').dataTable({
      "ajax": "tampil.php?data=file&awal="+awal+"&akhir="+akhir,
      "destroy": true,
      "columns": [
        {"data": "aksi", className: "center"},
        {"data": "no_agenda", className: "center"},
        {"data": "file"},
        {"data": "asal_surat"},
        {"data": "jenis_klasifikasi", className: "center"},
      ],
      "aoColumnDefs": [{
          "aTargets": [0],
          "mRender": function(data, type, full) {
            nomor = nomor + 1;
            return nomor;
          }
        },
        // {
        // "aTargets": [ 5 ],
        // "mRender": function (data, type, full) {
        //     if (full.status_dispo == '1'){
        //        var formmatedvalue = "<button type='button' class='btn btn-xs btn-warning statusdispo' value='"+full.id+"'> Belum di Disposisi</button>";
        //     }else if (full.status_dispo == '2'){
        //        var formmatedvalue = "<span class='btn btn-xs btn-success' disabled >Sudah di Disposisi</span>";
        //     }           
        //     return formmatedvalue;
        //   }
        // },
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

  $("#cetak").on('click', function() {
    if ($('#awal').val() == '') {
      alert('Pilih Tanggal');
    } else {
      var bulan = $('#bulan').val();
      window.open("report_file.php?awal=" + awal + "&akhir=" + akhir);
    }
  });

  $("#filter").on('click',function(){
    tampil();
  });

</script>