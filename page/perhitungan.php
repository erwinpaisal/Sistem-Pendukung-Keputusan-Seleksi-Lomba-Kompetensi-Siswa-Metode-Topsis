<?php
include "helpers.php";

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
$kriteria = mysqli_query($conn,$q_kriteria);
$kri = mysqli_query($conn,$q_kriteria);
?>
<style>
    .table{
        font-size: 10pt;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title">Bobot</h3>
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
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>#</td>
                            <td>C1</td>
                            <td>C2</td>
                            <td>C3</td>
                            <td>C4</td>
                            <td>C5</td>
                        </tr>
                        <tr>
                            <td>Bobot</td>
                            <?php while ($h = mysqli_fetch_array($bobot)) : ?>
                            <td><?= $h['bobot'] ?></td>
                            <?php
                            $bot[] = $h['bobot'];
                            ?>
                            <?php endwhile; ?>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>Benefit</td>
                            <td>Benefit</td>
                            <td>Benefit</td>
                            <td>Benefit</td>
                            <td>Benefit</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    OBOT KRITERIA ALTERNATIF-->
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">Bobot Kriteria Alternatif</h5>
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
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NISN</th>
                            <th>Siswa</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C4</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; while($row =mysqli_fetch_array($kriteria)) : ?>
                        <tr>

                            <td><?= $no++ ?>.</td>
                            <td><?= $row['NISN'] ?></td>
                            <td><?= $row['nama_siswa'] ?></td>
                            <td style="text-align: center"><?= matrix($row['c1']) ?></td>
                            <td style="text-align: center"><?= matrix($row['c2']) ?></td>
                            <td style="text-align: center"><?= matrix($row['c3']) ?></td>
                            <td style="text-align: center"><?= matrix($row['c4']) ?></td>
                            <td style="text-align: center"><?= matrix($row['c5']) ?></td>
                        </tr>
                        <?php
                        $c1 = ($c1) + pow(matrix($row['c1']),2);
                        $c2 = ($c2) + pow(matrix($row['c2']),2);
                        $c3 = ($c3) + pow(matrix($row['c3']),2);
                        $c4 = ($c4) + pow(matrix($row['c4']),2);
                        $c5 = ($c5) + pow(matrix($row['c5']),2);
                        ?>
                        <?php endwhile; ?>
                        <?php
                        $p_c1 = sqrt($c1);
                        $p_c2 = sqrt($c2);
                        $p_c3 = sqrt($c3);
                        $p_c4 = sqrt($c4);
                        $p_c5 = sqrt($c5);
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--pembagian-->
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">Bobot Kriteria Alternatif Pembagian</h5>
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
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td colspan="2"><b>PEMBAGI</b></td>
                            <td><b><?= $p_c1 ?></b></td>
                            <td><b><?= $p_c2 ?></b></td>
                            <td><b><?= $p_c3 ?></b></td>
                            <td><b><?= $p_c4 ?></b></td>
                            <td><b><?= $p_c5 ?></b></td>
                        </tr>
                        </thead>
                    </table>
                    <br>
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NISN</th>
                            <th>Siswa</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; $k=0; while ($row = mysqli_fetch_array($kri)) : ?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $row['NISN'] ?></td>
                            <td><?= $row['nama_siswa'] ?></td>
                            <td style="text-align: center"><?= matrix($row['c1'])/$p_c1 ?></td>
                            <td style="text-align: center"><?= matrix($row['c2'])/$p_c2 ?></td>
                            <td style="text-align: center"><?= matrix($row['c3'])/$p_c3 ?></td>
                            <td style="text-align: center"><?= matrix($row['c4'])/$p_c4 ?></td>
                            <td style="text-align: center"><?= matrix($row['c5'])/$p_c5 ?></td>
                        </tr>
                        <?php
                        $k++;
                        $bagi[$k]['nama_siswa'] = $row['nama_siswa'];
                        $bagi[$k]['c1'] =  matrix($row['c1'])/$p_c1;
                        $bagi[$k]['c2'] =  matrix($row['c2'])/$p_c2;
                        $bagi[$k]['c3'] =  matrix($row['c3'])/$p_c3;
                        $bagi[$k]['c4'] =  matrix($row['c4'])/$p_c4;
                        $bagi[$k]['c5'] =  matrix($row['c5'])/$p_c5;
                        ?>
                        <?php  endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    {{--perkalian--}}-->
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">Bobot Kriteria Alternatif Perkalian</h5>
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
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Siswa</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $r = 1; foreach ($bagi as $ko => $val) : ?>
                        <tr>
                            <td><?= $r++ ?>.</td>
                            <td><?= $val['nama_siswa'] ?></td>
                            <td style="text-align: center"><?= $val['c1']*$bot[0] ?></td>
                            <td style="text-align: center"><?= $val['c2']*$bot[1] ?></td>
                            <td style="text-align: center"><?= $val['c3']*$bot[2] ?></td>
                            <td style="text-align: center"><?= $val['c4']*$bot[3] ?></td>
                            <td style="text-align: center"><?= $val['c5']*$bot[4] ?></td>
                        </tr>
                        <?php
                        $kali[$ko]['nama_siswa'] = $val['nama_siswa'];
                        $kali[$ko]['c1'] = $val['c1']*$bot[0];
                        $kali[$ko]['c2'] = $val['c2']*$bot[1];
                        $kali[$ko]['c3'] = $val['c3']*$bot[2];
                        $kali[$ko]['c4'] = $val['c4']*$bot[3];
                        $kali[$ko]['c5'] = $val['c5']*$bot[4];
                        $tamp_kali['nama_siswa'][$k] = $val['nama_siswa'];
                        $tamp_kali['c1'][$ko] = $val['c1']*$bot[0];
                        $tamp_kali['c2'][$ko] = $val['c2']*$bot[1];
                        $tamp_kali['c3'][$ko] = $val['c3']*$bot[2];
                        $tamp_kali['c4'][$ko] = $val['c4']*$bot[3];
                        $tamp_kali['c5'][$ko] = $val['c5']*$bot[4];
                        ?>
                       <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    {{--      max min--}}-->
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">A+ & A-</h5>
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
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>#</th>
                            <th>C1</th>
                            <th>C2</th>
                            <th>C3</th>
                            <th>C4</th>
                            <th>C5</th>
                        </tr>
                        <tr>
                            <td>A+</td>
                            <td><?= $max['c1'] = max($tamp_kali['c1']) ?></td>
                            <td><?= $max['c2'] = max($tamp_kali['c2']) ?></td>
                            <td><?= $max['c3'] = max($tamp_kali['c3']) ?></td>
                            <td><?= $max['c4'] = max($tamp_kali['c4']) ?></td>
                            <td><?= $max['c5'] = max($tamp_kali['c5']) ?></td>
                        </tr>
                        <tr>
                            <td>A-</td>
                            <td><?= $min['c1'] = min($tamp_kali['c1']) ?></td>
                            <td><?= $min['c2'] = min($tamp_kali['c2']) ?></td>
                            <td><?= $min['c3'] = min($tamp_kali['c3']) ?></td>
                            <td><?= $min['c4'] = min($tamp_kali['c4']) ?></td>
                            <td><?= $min['c5'] = min($tamp_kali['c5']) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    {{--      D+ & D- --}}-->
    <div class="col-md-6 col-xs-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">D+</h5>
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
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Siswa</th>
                            <th>Hasil</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $j=1; foreach ($kali as $k => $val) : ?>
                        <tr>
                            <td><?= $j++ ?>.</td>
                            <td><?= $d_plus[$k]['nama_siswa'] = $val['nama_siswa'] ?></td>
                            <td style="text-align: center"><?= $d_plus[$k]['hasil'] = sqrt((pow(($max['c1']-$val['c1']),2))+(pow(($max['c2']-$val['c2']),2))+(pow(($max['c3']-$val['c3']),2))+(pow(($max['c4']-$val['c4']),2))+(pow(($max['c5']-$val['c5']),2))) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="card-title">D-</h5>
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
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Siswa</th>
                            <th>Hasil</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $m=1; foreach ($kali as $k => $val) : ?>
                        <tr>
                            <td><?= $m++ ?>.</td>
                            <td><?= $d_min[$k]['nama_siswa'] = $val['nama_siswa'] ?></td>
                            <td style="text-align: center"><?= $d_min[$k]['hasil'] = sqrt((pow(($min['c1']-$val['c1']),2))+(pow(($min['c2']-$val['c2']),2))+(pow(($min['c3']-$val['c3']),2))+(pow(($min['c4']-$val['c4']),2))+(pow(($min['c5']-$val['c5']),2))) ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    {{--      Hasil--}}-->
    <div class="col-md-6 col-xs-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h5 class="card-title">Hasil</h5>
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
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Siswa</th>
                            <th>Hasil</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $l=1; foreach($d_plus as $k => $val) : ?>
                        <tr>
                            <td><?= $l++ ?>.</td>
                            <td><?= $hasil[$k]['nama_siswa'] = $val['nama_siswa'] ?></td>
                            <td style="text-align: center"><?= $hasil[$k]['hasil'] = $d_min[$k]['hasil']/($d_min[$k]['hasil']+$val['hasil'])  ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
    usort($hasil, 'sortByName');
    ?>
    <div class="col-md-6 col-xs-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h5 class="card-title">Rangking</h5>
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
                            <th>No.</th>
                            <th>Siswa</th>
                            <th>Hasil</th>
                            <th>Rangking</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($hasil as $k => $val) : ?>
                        <tr>
                            <td><?= $k+1 ?>.</td>
                            <td><?= $val['nama_siswa'] ?></td>
                            <td style="text-align: center"><?= $val['hasil'] ?></td>
                            <td style="text-align: center"><?= $k+1 ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

