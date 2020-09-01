<?php

$db_name = "db_skripsi";
$host = "localhost";
$username = "root";
$passwod = "";

$base_url = "http://localhost/skripsiku";

// 1. Create a database connection
$conn = mysqli_connect($host,$username,$passwod);

if (!$conn) {
    error_log("Failed to connect to MySQL: " . mysqli_error($conn));
    die('Internal server error');
}

// 2. Select a database to use 
$db_select = mysqli_select_db($conn, $db_name);
if (!$conn) {
    error_log("Database selection failed: " . mysqli_error($conn));
    die('Internal server error');
}