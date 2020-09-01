<?php
include "helpers.php";
include "config/config.php";

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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Skripsi | TOPSIS</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-navy">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="dist/img/logo.png" alt="SMKN 1" class="brand-image img-circle elevation-3"
                     style="opacity: .8">
                <span class="brand-text font-weight-light">SMKN 1 Lubuk Pakam</span>
            </a>

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                </ul>


            </div>

            <!-- Right navbar links -->
            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                &nbsp;
                <?php if(isset($_SESSION['LOGIN_ID'])) : ?>
                <a class="btn btn-danger btn-sm" href="logout.php">Logout</a>

                <?php else: ?>
                <a href="login.php" class="btn btn-success btn-sm"><i class="fa fa-lock"></i> LogIn</a>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->

        <div class="content" style="padding: 0px">
            <div class="container">
                <div class="row" style="
  /*height: 100%;*/

  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image: url('dist/img/bg-front.jpg')">
                    <div class="col-md-8" style="padding-top: 50px;">
                        <p style="color:white;text-align : center;font-size: 25pt; font-weight: bold; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif">
                            Sistem Pendukung Keputusan <br> Seleksi Lomba Kompetensi siswa
                        </p>
                        <p style="text-align: center; font-weight: bold; color: white">
                            Website ini di bangun dalam hal proses seleksi siswa yang akan mengikuti lomba kompetensi siswa
                            IT Network System Administration
                        </p>
                    </div>
                    <div class="col-md-4" style="padding-top: 50px; padding-bottom: 50px">
                        <img src="dist/img/logo.png" style="height: 300px" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12" style="margin-top: 20px">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h5 class="card-title">Hasil Perangkingan</h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                                class="fas fa-expand"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered datatable" style="font-size: 10pt">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal Kelas</th>
                                            <th>Hasil</th>
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
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            V.0.1
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; SMK Negeri 1 Lubuk Pakam 2020.</strong> All rights reserved.
    </footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
    $(function () {
        $(".datatable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
</body>
</html>
