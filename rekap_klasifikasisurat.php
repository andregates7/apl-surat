<div class="box box-solid">
   <div class="box-header with-border">
      <h3 class="box-title">REKAP KLASIFIKASI SURAT</h3>   
    </div>
    <div class="box-body">
      <div>
        <form class="form-horizontal" role="form"> 
          <button class="btn btn-success pull-right" id="cetak" type="button">Cetak</button>
            <table id="tabel1" class="table table-bordered table-hover">
              <thead style="background: #5383FE; color: white;">
                <tr>
                <th class="text-center" width="3%">No. </th>
                <th class="text-center" width="5%">Kode</th>
                <th class="text-center" width="10%">Jenis Klasifikasi</th>
                <th class="text-center" width="5%">No. Agenda</th>
                <th class="text-center" width="25%">Asal Surat</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr> 
              </tbody>
            </table>
        </form>
      </div>
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
<script src="style/sweetalert.min.js"></script>
<script src="style/plugins/moment/min/moment.min.js"></script>
<script src="style/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="style/plugins/datetime/datetime.js"></script>
<script>

tampil(); 
function tampil(){
  var nomor=0;

  $('#tabel1').dataTable( {
      "ajax": "tampil.php?data=klasifikasi_surat",
      "destroy": true,
      "columns": [
          { "data": "aksi" },
          { "data": "kode_klasifikasi"},
          { "data": "jenis_klasifikasi"},
          { "data": "no_agenda"},
          { "data": "asal_surat"},
        ],
      "aoColumnDefs": [ {
        "aTargets": [ 0 ],
        "mRender": function (data, type, full) {
            nomor=nomor+1;
            return nomor;
          }
        },
        //{
        //},
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
    

$("#cetak").on('click',function(){
    window.open("report_klasifikasisurat.php?");
  });

</script>