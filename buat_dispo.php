<?php include "config.php";

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM surat_masuk WHERE id='$id'");
?>

<div class="box box-solid">
  <div class="box-header with-border">
    <h4 class="title">TAMBAH DISPOSISI</h4>
  </div>
  <div class="box-body">
    <form class="form-horizontal" role="form" id="formdisposisi">

      <input type="hidden" name="id" id="id">

      <div class="form-group">
        <div class="col-md-3">
          <?php
          $data = "SELECT surat_masuk.* FROM surat_masuk WHERE id=$id";
          $myQry = mysqli_query($koneksi, $data) or die("gagal Query" . mysqli_error($koneksi));
          $datasurat = mysqli_fetch_array($myQry);
          ?>
          <label class="control-label">No. Agenda</label>
        </div>
        <div class="col-md-9">
          <input type="text" value="<?php echo $datasurat['no_agenda']; ?>" class="form-control" disabled>
        </div>
      </div>


      <div class="form-group">
        <div class="col-md-3">
          <?php
          $data = "SELECT surat_masuk.* FROM surat_masuk WHERE id=$id";
          $myQry = mysqli_query($koneksi, $data) or die("gagal Query" . mysqli_error($koneksi));
          $datasurat = mysqli_fetch_array($myQry);
          ?>
          <label class="control-label">No. Surat</label>
        </div>
        <div class="col-md-9">
          <input type="text" value="<?php echo $datasurat['no_surat']; ?>" class="form-control" disabled>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <?php
          $data = "SELECT surat_masuk.* FROM surat_masuk WHERE id=$id";
          $myQry = mysqli_query($koneksi, $data) or die("gagal Query" . mysqli_error($koneksi));
          $datasurat = mysqli_fetch_array($myQry);
          ?>
          <label class="control-label">Asal Surat</label>
        </div>
        <div class="col-md-9">
          <input type="text" value="<?php echo $datasurat['asal_surat']; ?>" class="form-control" name="asal_surat" id="asal_surat" readonly>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">Tujuan</label>
        </div>
        <div class="col-md-9">
          <select name="tujuan" id="tujuan" class="form-control select2" style="width: 100%;">
            <option disabled></option>
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

      <input type="hidden" value="<?php echo $datasurat['id']; ?>" name="id_surat" id="id_surat">

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="batal" name="batal" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="disposisi" />
        <button type="button" id="bsimpan" class="btn btn-info">Simpan</button>
      </div>
    </form>
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
  $(function() {
    $(".select2").select2();
    $('.numeric').number(true, 0);
  });

  //TAMBAH
  $("#tambah_disposisi").on('click', function() {
    $('#tujuan').val('Kabbag UMUM').change();
    $('#id,#isi,#sifat,#batas_waktu,#catatan').val('');
    $("#modaldiposisi").modal('show');
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
        document.location.href = 'menu.php?open=disposisi';
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
          document.location.href = 'menu.php?open=suratmasuk';
        };
      });
  });
</script>