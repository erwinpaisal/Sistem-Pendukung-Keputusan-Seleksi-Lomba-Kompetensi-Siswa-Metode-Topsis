<?php
// error_reporting(0)
if (!isset($_GET['hal'])) {
	$page="include 'page/home.php';";
}else{
	$page=$_GET['hal'];
switch($page){
	
	case 'siswa':
		$page="include 'page/siswa.php';";
		break;
	case 'bobot':
		$page="include 'page/bobot.php';";
		break;
	case 'kriteria':
		$page="include 'page/kriteria.php';";
		break;
	case 'perhitungan':
		$page="include 'page/perhitungan.php';";
		break;
    case 'home':
        $page="include 'page/home.php';";
        break;
    case 'print':
        $page="include 'page/pdf.php';";
        break;
	default:
		$page="include 'page/home.php';";
		break;
}
}

$CONTENT_["main"]=$page;

?>