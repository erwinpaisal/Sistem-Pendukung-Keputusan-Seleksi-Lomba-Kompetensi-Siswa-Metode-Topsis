<?php
include "../config/config.php";

if (!isset($_GET['id'])){
    if (isset($_POST['submit'])){
        $nama = $_POST['nama_siswa'];
        $no_telp = $_POST['no_telp'];
        $jk = $_POST['jenis_kelamin'];
        $asal_kelas = $_POST['asal_kelas'];
        $action = $_POST['action'];
        if ($action == 'add'){
            $q = "insert into siswa (id,nama_siswa, jenis_kelamin, no_telp, asal_kelas) values(null ,'".$nama."','".$jk."', '".$no_telp."','".$asal_kelas."')";
            $add = mysqli_query($conn,$q);
            exit("<script>location.href='".$base_url."/?hal=siswa'; toastr.success('Data berhasil di simpan','Success!')</script>");
        }elseif ($action == 'update'){
            $id = $_POST['id'];
            $q="update siswa set nama_siswa='".$nama."',jenis_kelamin='".$jk."', no_telp='".$no_telp."',asal_kelas='".$asal_kelas."' where id='".$id."'";
            mysqli_query($conn,$q);
            exit("<script>location.href='".$base_url."/?hal=siswa'; toastr.success('Data berhasil di ubah','Success!')</script>");
        }
    }
}else{
    $id = $_GET['id'];
    mysqli_query($conn,"delete from siswa where id ='".$id."'");
    exit("<script>location.href='".$base_url."/?hal=siswa'; toastr.success('Data berhasil di hapus','Success!')</script>");
}