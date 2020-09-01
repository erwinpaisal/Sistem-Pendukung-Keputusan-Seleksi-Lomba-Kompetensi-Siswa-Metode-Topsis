<?php
include '../config/config.php';
$id = $_GET['id'];
$q=mysqli_query($conn,"select * from siswa where id='".$id."'");
$h=mysqli_fetch_array($q);
$nama=$h['nama_siswa'];
$no_telp=$h['no_telp'];
$jk=$h['jenis_kelamin'];
$nisn=$h['NISN'];
$asal_kelas=$h['asal_kelas'];
?>
<form action="proses/p_siswa.php" method="post">
    <div class="modal-header">
        <h4 class="modal-title">Edit Siswa</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
       <div class="form-group">
           <label for="">NISN <span class="text-danger">*</span></label>
           <input type="hidden" name="action" value="update">
           <input type="number" maxlength="10" onkeypress="return hanyaAngka(event)" name="nisn" value="<?= $nisn ?>" required class="form-control" placeholder="Nomor Induk Siswa Nasional...">
       </div>
    <div class="modal-body">
       <div class="form-group">
           <label for="">Nama Siswa <span class="text-danger">*</span></label>
           <input type="hidden" name="action" value="update">
           <input type="hidden" name="id" value="<?= $id ?>">
           <input type="text" name="nama_siswa" value="<?= $nama ?>" required class="form-control" placeholder="Nama siswa...">
       </div>
        <div class="form-group">
            <label for="">Jenis kelamin <span class="text-danger">*</span></label>
            <select name="jenis_kelamin" required class="form-control">
                <option <?= $jk == 'L' ? 'selected' : '' ?> value="L" selected>Laki-laki</option>
                <option <?= $jk == 'P' ? 'selected' : '' ?> value="P" >Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">No. Telepon <span class="text-danger">*</span></label>
            <div class="input-group">
                <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                <input type="number" name="no_telp" value="<?=  $no_telp ?>" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="">Asal Kelas <span class="text-danger">*</span></label>
            <input type="text" name="asal_kelas" value="<?= $asal_kelas ?>" required class="form-control" placeholder="Asal Kelas...">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>