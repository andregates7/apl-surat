<div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">DATA SURAT BULAN INI</h3>
  </div>

  <div class="box-body">

    <div class="col-md-12">

      <br>

      <?php include "config.php"; ?>

      <div class="row">

        <div class="col-lg-4 col-xs-6">

          <?php

          $sql1 = $koneksi->query("SELECT COUNT(*) AS hitung1 FROM surat_masuk WHERE month(tgl_diterima) = month(current_date)");
          $data = mysqli_fetch_assoc($sql1);

          ?>

          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $data['hitung1']; ?></h3>
              <p style="font-size: 18pt;">Jumlah Surat Masuk</p>
            </div>
            <div class="icon">
              <i class="bx bx-envelope"></i>
            </div>
            <?php if ($_SESSION['level'] == 'Petugas') { ?>
              <a href="menu.php?open=suratmasuk" class="small-box-footer">More info <i class="bx bxs-right-arrow-circle"></i></a>
            <?php } else { ?>
              <a href="menu.php?open=#" class="small-box-footer">More info <i class="bx bxs-right-arrow-circle"></i></a>
            <?php } ?>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">

          <?php

          $sql3 = $koneksi->query("SELECT COUNT(*) AS hitung3 FROM `disposisi` WHERE month(tgl_dispo) = month(current_date)");
          $data = mysqli_fetch_assoc($sql3);

          ?>

          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $data['hitung3']; ?></h3>
              <p style="font-size: 18pt;">Jumlah Disposisi</p>
            </div>
            <div class="icon">
              <i class="bx bx-envelope-open"></i>
            </div>
            <?php if ($_SESSION['level'] == 'Petugas') { ?>
              <a href="menu.php?open=disposisi" class="small-box-footer">More info <i class="bx bxs-right-arrow-circle"></i></a>
            <?php } else { ?>
              <a href="menu.php?open=#" class="small-box-footer">More info <i class="bx bxs-right-arrow-circle"></i></a>
            <?php } ?>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">

          <?php

          $sql2 = $koneksi->query("SELECT COUNT(*) AS hitung2 FROM surat_keluar WHERE month(tgl_surat) = month(current_date)");
          $data = mysqli_fetch_assoc($sql2);

          ?>

          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $data['hitung2']; ?></h3>
              <p style="font-size: 18pt;">Jumlah Surat Keluar</p>
            </div>
            <div class="icon">
              <i class="bx bx-mail-send"></i>
            </div>
            <?php if ($_SESSION['level'] == 'Petugas') { ?>
              <a href="menu.php?open=suratkeluar" class="small-box-footer">More info <i class="bx bxs-right-arrow-circle"></i></a>
            <?php } else { ?>
              <a href="menu.php?open=#" class="small-box-footer">More info <i class="bx bxs-right-arrow-circle"></i></a>
            <?php } ?>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<div class="box-body">

  <div class="details">
    <div id="container" style="border:1px solid black;width: 100%; min-height: 400px; margin: 0 auto; position: relative;">
    </div>
  </div>

</div>

</div>
<footer class="main-footer">
</footer>
</div>

<!-- jQuery 2.2.3 -->
<script src="style/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="style/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="style/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- AdminLTE App -->
<script src="style/dist/js/app.min.js"></script>
<!-- Select2 -->
<script src="style/plugins/select2/select2.full.min.js"></script>
<!--Tabel-->
<script src="style/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="style/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- bootstrap datepicker -->

<script>
  function grafik() {

    var x = new Array();
    var y = new Array();

    <?php

    $sql = $koneksi->query("SELECT COUNT(*) AS JUMLAH FROM surat_masuk WHERE year(tgl_diterima) = year(current_date)");

    ?>

    var series = new Array();
    series.push({
      name: 'Jumlah Surat',
      // WARNA
      color: '#CD4343',
      data: y
    });

    myChart = Highcharts.chart('container', {
      plotOptions: {
        column: {
          dataLabels: {
            enabled: false,
            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
          }
        }
      },
      exporting: {
        chartOptions: {
          plotOptions: {
            series: {
              dataLabels: {
                enabled: true
              }
            }
          }
        },
        scale: 3,
        fallBackExportToServer: false
      },


      chart: {
        type: 'column'
      },
      title: {
        text: 'GRAFIK PERSURATAN TAHUN INI'
      },
      xAxis: {
        categories: x
      },
      yAxis: {
        title: {
          text: 'Jumlah'
        },
        stackLabels: {
          enabled: true,
          style: {

            color: (Highcharts.theme && Highcharts.theme.textColor)
          }
        }
      },
      series: series,
    });


  }

  $(document).ready(function() {
    grafik();
  });
</script>