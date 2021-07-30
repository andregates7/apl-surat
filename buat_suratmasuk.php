<div class="box box-solid">
    <div class="box-header with-border">
        <h4 class="title">TAMBAH DATA SURAT MASUK</h4>
    </div>
    <div class="box-body">
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
        <button type="button" class="btn btn-success" id="batal" name="batal">Batal</button>
        <input type="hidden" id="simpan" name="simpan" value="suratmasuk" />
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

    $("#bsimpan").on('click', function() {
        var data = $('#formsuratmasuk').serialize();

        $.ajax({
            type: 'POST',
            url: "simpan.php",
            data: data,
            success: function() {
                swal("Sukses", "Data Berhasil Disimpan", "success");
                document.location.href = 'menu.php?open=suratmasuk';
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