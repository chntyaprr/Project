<?php
// Ganti dengan detail database kamu
$host = "localhost";
$user = "root";
$password = "";
$database = "metodenumerik";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>