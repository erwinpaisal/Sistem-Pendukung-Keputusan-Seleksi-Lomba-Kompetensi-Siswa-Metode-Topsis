<?php
include "../config/config.php";

if (!isset($_GET['id'])){
    if (isset($_POST['submit'])){
        $siswa_id = $_POST['siswa_id'];
        $c1 = $_POST['c1'];
        $c2 = $_POST['c2'];
        $c3 = $_POST['c3'];
        $c4 = $_POST['c4'];
        $c5 = $_POST['c5'];
        $action = $_POST['action'];
        if ($action == 'add'){
            $q = "insert into kriteria (id,siswa_id, c1, c2, c3, c4, c5) values(null ,'".$siswa_id."', '".$c1."', '".$c2."', '".$c3."', '".$c4."', '".$c5."')";
            $add = mysqli_query($conn,$q);
            exit("<script>location.href='".$base_url."/?hal=kriteria'; toastr.success('Data berhasil di simpan','Success!')</script>");
        }elseif ($action == 'update'){
            $id = $_POST['id'];
            $q="update kriteria set siswa_id='".$siswa_id."', c1='".$c1."', c2='".$c2."', c3='".$c3."', c4='".$c4."', c5='".$c5."' where id='".$id."'";
            mysqli_query($conn,$q);
            exit("<script>location.href='".$base_url."/?hal=kriteria'; toastr.success('Data berhasil di ubah','Success!')</script>");
        }
    }
}else{
    $id = $_GET['id'];
    mysqli_query($conn,"delete from kriteria where id ='".$id."'");
    exit("<script>location.href='".$base_url."/?hal=kriteria'; toastr.success('Data berhasil di hapus','Success!')</script>");
}