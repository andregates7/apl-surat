<div class="modal fade" id="modalsuratmasuk">
  <div class="modal-dialog">
    <div class="modal-content">   
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">TAMBAH DATA SURAT MASUK</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" id="formpegawai"> 

          <input type="hidden" name="id" id="id">   

          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Nomor Agenda</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="agenda" id="agenda">     
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Asal Surat</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="username" id="username">     
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Password</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="password" class="form-control" name="password" id="password">     
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-3">
              <label  class="control-label">Confirm Password</label> 
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="password" class="form-control" name="confirmpass" id="confirmpass">     
            </div>
          </div>

          <div class="form-group">   
            <div class="col-md-3">
              <label  class="control-label">Tempat Lahir</label>              
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"> 
            </div>
          </div>

          <div class="form-group">   
            <div class="col-md-3">
              <label  class="control-label">Tanggal Lahir</label>              
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"> 
            </div>
          </div>

          <div class="form-group">   
            <div class="col-md-3">
              <label  class="control-label">Telepon</label>              
            </div>
            <div class="col-md-9">
              <input style="width: 100%;" type="number" class="form-control" name="telepon" id="telepon"> 
            </div>
          </div>

          <div class="form-group">   
            <div class="col-md-3">
              <label  class="control-label">Alamat</label>              
            </div>
            <div class="col-md-9">
              <textarea style="width: 100%;" class="form-control" name="alamat" id="alamat"></textarea>
            </div>
          </div>

          <div class="form-group">   
            <div class="col-md-3">
              <label  class="control-label">Level</label>              
            </div>
            <div class="col-md-9">
              <select name="level" id="level" class="form-control select2" style="width: 100%;">
                  <option>Kepala Kabbag</option>
                  <option>Admin</option>
                  <option>Petugas</option>
              </select>
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Batal</button>
        <input type="hidden"  id="simpan" name="simpan" value="pegawai" />
        <button type="button" id="bsimpan" class="btn btn-info">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>