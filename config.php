<?php
$namaserver = "localhost";
$namauser = "root";
$password = "";
$namadb = "dss_kacamata";

//buat koneksi
$koneksi = new mysqli($namaserver,$namauser,$password,$namadb);

//cek koneksi
if ($koneksi->connect_error) {
	die("koneksi gagal".$koneksi->connect_error);
}
?>