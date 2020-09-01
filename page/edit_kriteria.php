<?php
include "../config/config.php";
$q = "select * from siswa  order by id";
$q = mysqli_query($conn,$q);

$id = $_GET['id'];
$query=mysqli_query($conn,"select * from kriteria where id='".$id."'");
$res=mysqli_fetch_array($query);
$siswa_id=$res['siswa_id'];
$c1=$res['c1'];
$c2=$res['c2'];
$c3=$res['c3'];
$c4=$res['c4'];
$c5=$res['c5'];
?>
<form action="proses/p_kriteria.php" method="post">
    <div class="modal-header">
        <h4 class="modal-title">Edit Kriteria</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    <div class="modal-body">
       <div class="form-group">
           <label for="">Nama Siswa <span class="text-danger">*</span></label>
           <input type="hidden" name="action" value="update">
           <input type="hidden" name="id" value="<?= $id ?>">
           <select name="siswa_id" class="form-control" required>
               <option value="" selected disabled>Pilih</option>
               <?php while($h=mysqli_fetch_array($q)) : ?>
                   <option <?= $siswa_id == $h['id'] ? 'selected' : '' ?> value="<?= $h['id'] ?>" ><?= $h['nama_siswa'] ?></option>
               <?php endwhile; ?>
           </select>
       </div>
        <div class="form-group">
            <label for="">Matematika <span class="text-danger">*</span></label>
            <input type="number" min="1" max="100" value="<?= $c1 ?>" required class="form-control" name="c1" placeholder="Nilai...">
        </div>
        <div class="form-group">
            <label for="">Teknologi Jaringan Berbasis Luas <span class="text-danger">*</span></label>
            <input type="number" min="1" max="100" value="<?= $c2 ?>" required class="form-control" name="c2" placeholder="Nilai...">
        </div>
        <div class="form-group">
            <label for="">Administrasi Infrastruktur Jaringan <span class="text-danger">*</span></label>
            <input type="number" min="1" max="100" value="<?= $c3 ?>" required class="form-control" name="c3" placeholder="Nilai...">
        </div>
        <div class="form-group">
            <label for="">Administrasi Sistem Jaringan <span class="text-danger">*</span></label>
            <input type="number" min="1" max="100" value="<?= $c4 ?>" required class="form-control" name="c4" placeholder="Nilai...">
        </div>
        <div class="form-group">
            <label for="">Teknologi Layanan Jaringan<span class="text-danger">*</span></label>
            <input type="number" min="1" max="100" value="<?= $c5 ?>" required class="form-control" name="c5" placeholder="Nilai...">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
    </div>
</form>