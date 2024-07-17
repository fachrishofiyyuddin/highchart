<?php
// koneksi
$hostname   = "localhost";
$username   = "root";
$password   = "root";
$dbname     = "highchart";
$koneksi    = mysqli_connect($hostname, $username, $password, $dbname);
// if ($koneksi) {
//     echo "koneksi berhasil";
// } else {
//     echo "koneksi gagal";
// }