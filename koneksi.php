<?php
$host = "localhost";
$user = "root";
$password  = "";
$name = "db_a3";

$connection = mysqli_connect($host, $user, $password, $name);


// if ($connection) {  // bila koneksi berhasil comment kode if else ini
//     echo "Koneksi Berhasil!";
// } else {
//     echo "Koneksi Gagal! : " . mysqli_connect_error();
// };