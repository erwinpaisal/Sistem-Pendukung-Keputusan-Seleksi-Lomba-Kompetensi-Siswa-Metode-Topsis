<?php
include "../config/config.php";

if (!isset($_GET['id'])){
    if (isset($_POST['submit'])){
        $bobot = $_POST['bobot'];
        $id = $_POST['id'];
        $q="update bobot set bobot='".$bobot."' where id='".$id."'";
        mysqli_query($conn,$q);
        exit("<script>location.href='".$base_url."/?hal=bobot'; toastr.success('Data berhasil di ubah','Success!')</script>");
    }
}else{
    $id = $_GET['id'];
    $q=mysqli_query($conn,"select * from bobot where id='".$id."'");
    $h=mysqli_fetch_array($q);
    $data['id']=$h['id'];
    $data['bobot']=$h['bobot'];
    echo json_encode($data);
}