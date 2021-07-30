<?php 
include "config.php";
include "roman_func.php";

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM disposisi WHERE id='$id'");
?>

<div class="box box-solid">
  <div class="box-header with-border">
    <h4 class="title">TAMBAH SURAT KELUAR</h4>
  </div>
  <div class="box-body">
    <form class="form-horizontal" role="form" id="formsuratkeluar">

      <input type="hidden" name="id" id="id">

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">Nomor Surat</label>
          <?php
          $bulan  = date('m');
          $romawi = getRoman($bulan);
          $tahun  = date('Y');
          $nomor  = "/LL11/TU/".$romawi."/".$tahun;
          
          
          $myQry  = mysqli_query($koneksi, "SELECT max(no_suratkeluar) AS nokode FROM surat_keluar WHERE month(tgl_surat)='$bulan'");
          $datasurat  = mysqli_fetch_array($myQry);
          $no1 = $datasurat['nokode'];
          $noUrut = (int) substr($no1,3,3);

          $noUrut++;

          $kode = sprintf("%04s", $noUrut);
          $noBaru = $kode.$nomor;

          ?>
        </div>
        <div class="col-md-9">
          <input style="width: 100%;" type="text" value="<?php echo $noBaru; ?>" class="form-control" name="no_suratkeluar" id="no_suratkeluar" readonly>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">Tujuan Surat</label>
          <?php
          $data = "SELECT disposisi.*, surat_masuk.no_agenda, surat_masuk.no_surat, surat_masuk.asal_surat FROM disposisi INNER JOIN surat_masuk ON surat_masuk.id=disposisi.id_surat AND disposisi.id=$id";
          $myQry = mysqli_query($koneksi, $data) or die("gagal Query" . mysqli_error($koneksi));
          $datasurat = mysqli_fetch_array($myQry);
          ?>
        </div>
        <div class="col-md-9">
          <input style="width: 100%;" type="text" value="<?php echo $datasurat['asal_surat']; ?>" class="form-control" name="surat_tujuan" id="surat_tujuan" readonly>
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
          <label class="control-label">Isi Ringkasan Surat</label>
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
          <input style="width: 100%;" type="date" class="form-control" name="tgl_surat" id="tgl_surat">
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
          <?php
          $data = "SELECT disposisi.* FROM disposisi WHERE id=$id";
          $myQry = mysqli_query($koneksi, $data) or die("gagal Query" . mysqli_error($koneksi));
          $datasurat = mysqli_fetch_array($myQry);
          ?>
          <label class="control-label">Kode Disposisi</label>
        </div>
        <div class="col-md-9">
          <select name="id_dispo" id="id_dispo" class="form-control select2" style="width: 100%;" readonly>
            <option value="<?php echo $datasurat['id']; ?>"><?php echo $datasurat['tujuan']; ?></option>
          </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" id="batal" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="surat_keluar" />
        <button type="button" id="bsimpan" class="btn btn-info">Simpan</button>
      </div>
    </form>
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
  $(function() {
    $(".select2").select2();
    $('.numeric').number(true, 0);
  });

  //TAMBAH
  $("#tambah_disposisi").on('click', function() {
    $('#tujuan').val('Kabbag UMUM').change();
    $('#id,#isi,#sifat,#batas_waktu,#catatan,#tgl_surat').val('');
    $("#modaldiposisi").modal('show');
  });

  $("#bsimpan").on('click', function() {
    var data = $('#formsuratkeluar').serialize();

    $("#modaldiposisi").modal('hide');
    $.ajax({
      type: 'POST',
      url: "simpan.php",
      data: data,
      success: function() {
        swal("Sukses", "Data Berhasil Disimpan", "success");
        document.location.href = 'menu.php?open=suratkeluar';
      }
    });
    return false;
  });

  $("#batal").on('click', function() {
    var id = $(this).val();
    swal({
        title: "Yakin ingin Kembali?",
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
          document.location.href = 'menu.php?open=disposisi';
        };
      });
  });
</script>