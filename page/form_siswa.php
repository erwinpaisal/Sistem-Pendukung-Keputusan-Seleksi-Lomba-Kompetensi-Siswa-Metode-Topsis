<form action="proses/p_siswa.php" method="post">
    <div class="modal-header">
        <h4 class="modal-title">Add Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
       <div class="form-group">
           <label for="">NISN <span class="text-danger">*</span></label>
           <input type="hidden" name="action" value="add">
           <input type="number" maxlength="10" onkeypress="return hanyaAngka(event)" name="nisn" required class="form-control" placeholder="Nomor Induk Siswa Nasional...">
       </div>
    <div class="modal-body">
       <div class="form-group">
           <label for="">Nama Siswa <span class="text-danger">*</span></label>
           <input type="hidden" name="action" value="add">
           <input type="text" name="nama_siswa" required class="form-control" placeholder="Nama siswa...">
       </div>
        <div class="form-group">
            <label for="">Jenis kelamin <span class="text-danger">*</span></label>
            <select name="jenis_kelamin" required class="form-control">
                <option value="L" selected>Laki-laki</option>
                <option value="P" >Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">No. Telepon <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                <input type="number" name="no_telp" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="">Asal Kelas <span class="text-danger">*</span></label>
            <input type="text" name="asal_kelas" required class="form-control" placeholder="Asal Kelas...">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>