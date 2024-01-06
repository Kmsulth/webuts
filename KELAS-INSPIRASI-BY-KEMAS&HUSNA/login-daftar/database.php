<?php
$hostname = "localhost";
$dbuser = "root";
$dbpw = "";
$dbname = "db_kelasin";

// Menyimpan hasil koneksi ke dalam variabel $conn
$conn = mysqli_connect($hostname, $dbuser, $dbpw, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Ada sesuatu yang salah: " . mysqli_connect_error());
}
?>