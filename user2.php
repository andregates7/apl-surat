<div class="modal fade" id="modalpegawaiedit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">EDIT PETUGAS</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="proses_edit_user.php" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Nama</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="nama" id="nama">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Username</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="username" id="username">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Password</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="password" class="form-control" name="password" id="password">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label" style="text-align:left">Confirm Password</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="password" class="form-control" name="confirmpass" id="confirmpass">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Tempat Lahir</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Tanggal Lahir</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Telepon</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="number" class="form-control" name="telepon" id="telepon">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Alamat</label>
            </div>
            <div class="col-md-9">
              <textarea style="width: 100%;" class="form-control" name="alamat" id="alamat"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Level</label>
            </div>
            <div class="col-md-9">
              <select name="level" id="level" class="form-control select2" style="width: 100%;">
                <option>Kepala Kabbag</option>
                <option>Admin</option>
                <option>Petugas</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Foto</label>
            </div>
            <div class="col-md-9">
              <input type="file" name="foto" class="form-control">
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <!-- <input type="hidden" name="simpan" value="pegawai" /> -->
        <button type="submit" id="bsimpan" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalpegawai">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">INPUT PETUGAS</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="proses_tambah_user.php" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="id" id="id">

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Nama</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="nama" id="nama">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Username</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="username" id="username">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Password</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="password" class="form-control" name="password" id="password">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label" style="text-align:left">Confirm Password</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="password" class="form-control" name="confirmpass" id="confirmpass">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Tempat Lahir</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Tanggal Lahir</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Telepon</label>
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="number" class="form-control" name="telepon" id="telepon">
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Alamat</label>
            </div>
            <div class="col-md-9">
              <textarea style="width: 100%;" class="form-control" name="alamat" id="alamat"></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Level</label>
            </div>
            <div class="col-md-9">
              <select name="level" id="level" class="form-control select2" style="width: 100%;">
                <option>Kepala Kabbag</option>
                <option>Admin</option>
                <option>Petugas</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label class="control-label">Foto</label>
            </div>
            <div class="col-md-9">
              <input type="file" name="foto" class="form-control">
              <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <!-- <input type="hidden" name="simpan" value="pegawai" /> -->
        <button type="submit" id="bsimpan" class="btn btn-success">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>


<div class="box box-solid">
  <div class="box-header ">
    <div class="form-group">
      <div class="col-md-12">
        <h3 class="box-title">DATA PEGAWAI</h3>
        <button class="btn btn-success pull-right" id="tambahpegawai" type="button"><i class="bx bx-plus"></i> Tambah Data</button>
      </div>
    </div>
  </div>
  <div class="box-body">
    <table id="example2" class="table table-bordered table-hover">
      <thead style="background: #5383FE; color: white; width:fit-content">
        <tr>
          <th class="text-center" width="5%">No</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Tempat Lahir</th>
          <th class="text-center">Tanggal Lahir</th>
          <th class="text-center">Telepon</th>
          <th class="text-center " width="21%">Alamat</th>
          <th class="text-center" width="16%">Foto</th>
          <th class="text-center" width="16%">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        include 'config.php';
        $query = mysqli_query($koneksi, "SELECT * FROM user");
        $no = 1;
        while ($dt = mysqli_fetch_array($query)) {
        ?>
          <tr>
            <td class="text-center" width="5%"><?php echo $no++; ?></td>
            <td class="text-center"><?php echo $dt['nama']; ?></td>
            <td class="text-center"><?php echo $dt['tempat_lahir']; ?></td>
            <td class="text-center"><?php echo IndonesiaTgl($dt['tanggal_lahir']); ?></td>
            <td class="text-center"><?php echo $dt['telepon']; ?></td>
            <td class="text-center " width="21%"><?php echo $dt['alamat']; ?></td>
            <td class="text-center"><img src="foto/<?php echo $dt['foto']; ?>" width="80px"></td>
            <td class="text-center" width="16%">
              <button type="button" class="bx bx-pencil btn btn-warning edit" value="<?php echo $dt['id']; ?>"></button>
              <button type="button" class="bx bx-trash btn btn-danger hapus" value="<?php echo $dt['id']; ?>"></button>
            </td>
          </tr>
        <?php
        }

        ?>

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
  $(function() {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    });
  });
</script>

<?php
function IndonesiaTgl($tanggal)
{
  $tgl = substr($tanggal, 8, 2);
  $bln = substr($tanggal, 5, 2);
  $thn = substr($tanggal, 0, 4);
  $tanggal = "$tgl-$bln-$thn";
  return $tanggal;
}
?>

<script>
  // tampil();

  $(function() {
    $(".select2").select2();
    $('.numeric').number(true, 0);
  });

  //TAMBAH
  $("#tambahpegawai").on('click', function() {
    $('#id,#username,#nama,#tempat_lahir,#tanggal_lahir,#password,#confirmpass,#telepon,#alamat').val('');
    $("#modalpegawai").modal('show');
  });

  $("#bsimpan").on('click', function() {
    var password = $('#password').val();
    var confirmpassword = $('#confirmpass').val();

    if (password == "") {
      swal({
        title: "Peringatan",
        text: "Password tidak Boleh Kosong !",
        icon: "error",
        buttons: {
          catch: {
            text: "OK",
          },
        },
        dangerMode: true,
      })
      return false;
    }

    if (password != confirmpassword) {
      swal({
        title: "Peringatan",
        text: "Password Tidak Cocok !",
        icon: "error",
        buttons: {
          catch: {
            text: "OK",
          },
        },
        dangerMode: true,
      })
      return false;
    }

    $("#modalpegawaiedit").modal('hide');
    $("#modalpegawai").modal('hide');

    swal("Sukses", "Data Berhasil Disimpan", "success");

    return;

  });


  //edit
  $("#example2").on('click', '.edit', function() {
    $.getJSON("tampil.php?data=editpegawai&id=" + $(this).val(), function(data) {
      $('#id').val(data.id);
      $('#nama').val(data.nama);
      $('#username').val(data.username);
      $('#password').val('');
      $('#confirmpass').val('');
      $('#tempat_lahir').val(data.tempat_lahir);
      $('#tanggal_lahir').val(data.tanggal_lahir);
      $('#telepon').val(data.telepon);
      $('#alamat').val(data.alamat);
      $('#level').val(data.level).change();
      $("#modalpegawaiedit").modal('show');
    });
  });

  $("#example2").on('click', '.hapus', function() {
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
          return $.post("hapus.php?hapus=pegawai&id=" + id, function(data) {
            swal("Sukses", "Data Berhasil Dihapus", "success");
            document.location.href = 'menu.php?open=user';
          });
        }
      });
  });
</script>