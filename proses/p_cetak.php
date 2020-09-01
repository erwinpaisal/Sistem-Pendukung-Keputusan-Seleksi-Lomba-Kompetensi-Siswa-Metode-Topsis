<?php
include "../config/config.php";
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//this will be something like: http://www.yourapp.com/templates/log.php
$fileUrl = $base_url . "/page/pdf.php";

//get file content after the script is server-side interpreted
$fileContent = file_get_contents( $fileUrl ) ;
//print_r($fileContent);
//die();
//$html .= "</html>";
$dompdf->loadHtml($fileContent);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');