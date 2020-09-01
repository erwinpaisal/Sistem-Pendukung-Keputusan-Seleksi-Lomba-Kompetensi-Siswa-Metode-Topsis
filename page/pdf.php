<?php
include "../helpers.php";
include "../config/config.php";

$c1 = 0;
$c2 = 0;
$c3 = 0;
$c4 = 0;
$c5 = 0;
$p_c1 = 0;
$p_c2 = 0;
$p_c3 = 0;
$p_c4 = 0;
$p_c5 = 0;
$bagi = [];
$kali = [];
$bot = [];
$max = [];
$min = [];
$d_plus = [];
$d_min = [];
$hasil = [];
$q_bobot = "select * from bobot order by id";
$bobot = mysqli_query($conn, $q_bobot);
$q_kriteria = "select *, kriteria.id as kriteria_id from kriteria JOIN siswa on kriteria.siswa_id=siswa.id order by kriteria.id";
$kriteria = mysqli_query($conn, $q_kriteria);
$kri = mysqli_query($conn, $q_kriteria);
?>
<?php while ($h = mysqli_fetch_array($bobot)) : ?>

    <?php
    $bot[] = $h['bobot'];
    ?>
<?php endwhile; ?>
<?php
while ($row = mysqli_fetch_array($kriteria)) : ?>

    <?php
    $c1 = ($c1) + pow(matrix($row['c1']), 2);
    $c2 = ($c2) + pow(matrix($row['c2']), 2);
    $c3 = ($c3) + pow(matrix($row['c3']), 2);
    $c4 = ($c4) + pow(matrix($row['c4']), 2);
    $c5 = ($c5) + pow(matrix($row['c5']), 2);
    ?>
<?php endwhile; ?>
<?php
$p_c1 = sqrt($c1);
$p_c2 = sqrt($c2);
$p_c3 = sqrt($c3);
$p_c4 = sqrt($c4);
$p_c5 = sqrt($c5);
?>



<?php $no = 1;
$k = 0;
while ($row = mysqli_fetch_array($kri)) : ?>

    <?php
    $k++;
    $bagi[$k]['nama_siswa'] = $row['nama_siswa'];
    $bagi[$k]['jenis_kelamin'] = $row['jenis_kelamin'];
    $bagi[$k]['asal_kelas'] = $row['asal_kelas'];
    $bagi[$k]['c1'] = matrix($row['c1']) / $p_c1;
    $bagi[$k]['c2'] = matrix($row['c2']) / $p_c2;
    $bagi[$k]['c3'] = matrix($row['c3']) / $p_c3;
    $bagi[$k]['c4'] = matrix($row['c4']) / $p_c4;
    $bagi[$k]['c5'] = matrix($row['c5']) / $p_c5;
    ?>
<?php endwhile; ?>


<?php foreach ($bagi as $ko => $val) : ?>

    <?php
    $kali[$ko]['nama_siswa'] = $val['nama_siswa'];
    $kali[$ko]['jenis_kelamin'] = $val['jenis_kelamin'];
    $kali[$ko]['asal_kelas'] = $val['asal_kelas'];
    $kali[$ko]['c1'] = $val['c1'] * $bot[0];
    $kali[$ko]['c2'] = $val['c2'] * $bot[1];
    $kali[$ko]['c3'] = $val['c3'] * $bot[2];
    $kali[$ko]['c4'] = $val['c4'] * $bot[3];
    $kali[$ko]['c5'] = $val['c5'] * $bot[4];
    $tamp_kali['nama_siswa'][$ko] = $val['nama_siswa'];
    $tamp_kali['jenis_kelamin'][$ko] = $val['jenis_kelamin'];
    $tamp_kali['asal_kelas'][$ko] = $val['asal_kelas'];
    $tamp_kali['c1'][$ko] = $val['c1'] * $bot[0];
    $tamp_kali['c2'][$ko] = $val['c2'] * $bot[1];
    $tamp_kali['c3'][$ko] = $val['c3'] * $bot[2];
    $tamp_kali['c4'][$ko] = $val['c4'] * $bot[3];
    $tamp_kali['c5'][$ko] = $val['c5'] * $bot[4];
    ?>
<?php endforeach; ?>


<?php $max['c1'] = max($tamp_kali['c1']) ?>
<?php $max['c2'] = max($tamp_kali['c2']) ?>
<?php $max['c3'] = max($tamp_kali['c3']) ?>
<?php $max['c4'] = max($tamp_kali['c4']) ?>
<?php $max['c5'] = max($tamp_kali['c5']) ?>


<?php $min['c1'] = min($tamp_kali['c1']); ?>
<?php $min['c2'] = min($tamp_kali['c2']); ?>
<?php $min['c3'] = min($tamp_kali['c3']); ?>
<?php $min['c4'] = min($tamp_kali['c4']); ?>
<?php $min['c5'] = min($tamp_kali['c5']); ?>


<?php foreach ($kali as $k => $val) : ?>

    <?php $d_plus[$k]['nama_siswa'] = $val['nama_siswa']; ?>
    <?php $d_plus[$k]['jenis_kelamin'] = $val['jenis_kelamin']; ?>
    <?php $d_plus[$k]['asal_kelas'] = $val['asal_kelas']; ?>
    <?php $d_plus[$k]['hasil'] = sqrt((pow(($max['c1'] - $val['c1']), 2)) + (pow(($max['c2'] - $val['c2']), 2)) + (pow(($max['c3'] - $val['c3']), 2)) + (pow(($max['c4'] - $val['c4']), 2)) + (pow(($max['c5'] - $val['c5']), 2))); ?>

<?php endforeach; ?>


<?php foreach ($kali as $k => $val) : ?>
    <?php $d_min[$k]['nama_siswa'] = $val['nama_siswa']; ?>
    <?php $d_min[$k]['jenis_kelamin'] = $val['jenis_kelamin']; ?>
    <?php $d_min[$k]['asal_kelas'] = $val['asal_kelas']; ?>
    <?php $d_min[$k]['hasil'] = sqrt((pow(($min['c1'] - $val['c1']), 2)) + (pow(($min['c2'] - $val['c2']), 2)) + (pow(($min['c3'] - $val['c3']), 2)) + (pow(($min['c4'] - $val['c4']), 2)) + (pow(($min['c5'] - $val['c5']), 2))); ?>

<?php endforeach; ?>

<?php foreach ($d_plus as $k => $val) : ?>

    <?php $hasil[$k]['nama_siswa'] = $val['nama_siswa']; ?>
    <?php $hasil[$k]['jenis_kelamin'] = $val['jenis_kelamin']; ?>
    <?php $hasil[$k]['asal_kelas'] = $val['asal_kelas']; ?>
    <?php $hasil[$k]['hasil'] = $d_min[$k]['hasil'] / ($d_min[$k]['hasil'] + $val['hasil']); ?>

<?php endforeach; ?>

<?php
usort($hasil, 'sortByName');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan PDF</title>
    <style>
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin-bottom: 0px;
        }

        body .header {
            font-family: 'Nunito', 'Segoe UI', arial;
        }

        .nominal {
            text-align: right;
        }

        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body style="font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;">
<div class="row">
    <div style="float: left; width: 20%">
        <img src="../dist/img/logo.png" width="100">
    </div>
    <div style="width: 80%">
        <p style="text-align: center;" class="judul">SMK Negeri Lubuk Pakam - Model Invest</p>
        <p style="text-align: center">Jl. Galang, Tj. Garbus Satu, Kec. Lubuk Pakam, Kab. Deli Serdang, Sumatra Utara 20551</p>
    </div>
</div>
<hr style="border: 1.5px solid black">
<p class="judul">Laporan Hasil Perangkingan</p>
<p class="judul" style="font-size: 12px"> </p>
<br>
<table id="customers" style="width: 100%; font-size: 10pt">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Jenis Kelamin</th>
        <th>Asal Kelas</th>
        <th>Hasil</th>
<!--        <th>Rangking</th>-->
    </tr>
    </thead>
    <tbody>
    <?php foreach ($hasil as $k => $val) : ?>
        <tr>
            <td><?= $k + 1 ?>.</td>
            <td><?= $val['nama_siswa'] ?></td>
            <td><?= $val['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
            <td><?= $val['asal_kelas'] ?></td>
            <td style="text-align: center"><?= $val['hasil'] ?></td>
<!--            <td style="text-align: center">--><?//= $k + 1 ?><!--</td>-->
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<br>
<br>
<p style="text-align: right">Mengetahui, Kepala Skolah</p>
<br><br>
<p style="text-align: right"><u>Syahrun. M.Pd</u></p>
<p style="text-align: right">Nip. 19650810 199001 1 002</p>

</body>
</html>
