<div class="box box-solid">
   <div class="box-header with-border">
      <h3 class="box-title">REKAP DISPOSISI</h3>   
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
              <button class="btn btn-success" id="cetak" type="button">Cetak</button>
            </div>
        </div>
        </form>
      </div>
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
    
$(function () {
  $('.datepicker').datepicker({
    autoclose: true,
    format :"yyyy-mm-dd"
  });
  $(".monthpicker").datepicker( {
    format: "yyyy-mm",
    startView: "months", 
    minViewMode: "months",
    autoclose: true
  });
  $(".select2").select2();
});

var awal = "";
var akhir = "";

$(function () {
$('#bulan').daterangepicker(
      {
        ranges   : {
          'Hari ini'       : [moment(), moment()],
          'Kemarin'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          '7 Hari Terakhir' : [moment().subtract(6, 'days'), moment()],
          '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
          'Bulan Ini'  : [moment().startOf('month'), moment().endOf('month')],
          'Bulan Lalu'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
    awal = start.format('YYYY-MM-DD');
    akhir = end.format('YYYY-MM-DD');
        $('#bulan span').html(start.format('DD/MMMM/YYYY') + ' - ' + end.format('DD/MMMM/YYYY'))
      }
    )
});

function formatDesimal(num){
    var n = num.toString(), p = n.indexOf('.');
    return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, function($0, i){
        return p<0 || i<p ? ($0+',') : $0;
    });
}

$("#cetak").on('click',function(){
  if ($('#awal').val()==''){
    alert('Pilih Tanggal');
  }else{
    var bulan=$('#bulan').val();
    window.open("report_disposisi.php?awal="+awal+"&akhir=" + akhir);
  }
});

</script>