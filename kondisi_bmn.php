<?php include "config.php";

$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM bmn WHERE id='$id'");
?>

<div class="box box-solid">
  <div class="box-header with-border">
    <h4 class="title">TAMBAH KONDISI BARANG</h4>
  </div>
  <div class="box-body">
    <form class="form-horizontal" role="form" id="formkondisi">

      <input type="hidden" name="id" id="id">

      <div class="form-group">
        <div class="col-md-3">
          <?php
          $data = "SELECT * FROM bmn WHERE id=$id";
          $myQry = mysqli_query($koneksi, $data) or die("gagal Query" . mysqli_error($koneksi));
          $datasurat = mysqli_fetch_array($myQry);
          ?>
          <label class="control-label">Nama Barang</label>
        </div>
        <div class="col-md-9">
          <input type="text" value="<?php echo $datasurat['nama_barang']; ?>" name="nama" id="nama" class="form-control" readonly>
        </div>
      </div>


      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">Jumlah Barang</label>
        </div>
        <div class="col-md-9">
          <input style="width: 100%;" type="number" value="" class="form-control" name="jumlah" id="jumlah" required>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <label class="control-label">Kondisi</label>
        </div>
        <div class="col-md-9">
          <select name="kondisi_barang" id="kondisi_barang" class="form-control select2" style="width: 100%;">
            <option disabled></option>
            <option>Berfungsi/Baik</option>
            <option>Habis</option>
            <option>Rusak (Tidak bisa Diperbaiki)</option>
            <option>Tidak Berfungsi dengan Baik</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3">
          <?php
          $data = "SELECT bmn.*, jenis_aset.jenis_aset FROM bmn INNER JOIN jenis_aset ON jenis_aset.id=bmn.id_jenis_aset AND bmn.id=$id";
          $myQry = mysqli_query($koneksi, $data) or die("gagal Query" . mysqli_error($koneksi));
          $datasurat = mysqli_fetch_array($myQry);
          ?>
          <label class="control-label">Jenis Aset</label>
        </div>
        <div class="col-md-9">
          <select name="jenis" id="jenis" class="form-control select2" style="width: 100%;" readonly>
            <option value="<?php echo $datasurat['id']; ?>"><?php echo $datasurat['jenis_aset']; ?></option>
          </select>
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

      <input type="hidden" value="<?php echo $datasurat['id']; ?>" name="id_bmn" id="id_bmn">

      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="batal" name="batal" data-dismiss="modal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="kondisi" />
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


  $("#bsimpan").on('click', function() {
    var data = $('#formkondisi').serialize();

    $.ajax({
      type: 'POST',
      url: "simpan.php",
      data: data,
      success: function() {
        swal("Sukses", "Data Berhasil Disimpan", "success");
        document.location.href = 'menu.php?open=update_bmn';
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
          document.location.href = 'menu.php?open=bmn';
        };
      });
  });
</script>