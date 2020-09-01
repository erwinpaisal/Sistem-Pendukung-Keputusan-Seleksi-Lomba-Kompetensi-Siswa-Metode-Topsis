<?php

function get($table_name, $conn){
    $q = "select * from $table_name order by id";
    $q= mysqli_query($conn,$q);
    return mysqli_fetch_array($q);
}

function matrix($nilai){
    if ($nilai >= 90 ){
        $bobot = 5;
    }elseif ($nilai >= 80 && $nilai <= 89){
        $bobot = 4;
    }elseif ($nilai >= 70 && $nilai <= 79){
        $bobot = 3;
    }elseif ($nilai >= 60 && $nilai <= 69){
        $bobot = 2;
    }elseif ($nilai <= 59){
        $bobot = 1;
    }

    return $bobot;
}

function sortByName($a, $b)
{
    $a = $a['hasil'];
    $b = $b['hasil'];

    if ($a == $b) return 0;
    return ($a > $b) ? -1 : 1;
}
