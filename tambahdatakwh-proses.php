<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../login/login.php");
}
include '../../koneksi.php';

$bulan_input = $_POST['bulan']; // Mengambil nilai dari input tanggal

// Ubah format tanggal menjadi "Bulan Tahun" (contoh: "Oktober 2023")
$periode = date('F Y', strtotime($bulan_input));

$bulan = $_POST['bulan'];
$pelanggan = $_POST['pelanggan'];
$kwh_s = $_POST['kwh_s'];
$kwh_r = $_POST['kwh_r'];
$kwh_b = $_POST['kwh_b'];
$kwh_i = $_POST['kwh_i'];
$kwh_p = $_POST['kwh_p'];
// $jumlah = $_POST['jumlah'];

// Menjumlahkan nilai dari $kwh_s sampai $kwh_p
$total_kwh = $kwh_s + $kwh_r + $kwh_b + $kwh_i + $kwh_p;

mysqli_query($koneksi, "INSERT INTO t_kwh (id_kwh, bulan, pelanggan, kwh_s, kwh_r, kwh_b, kwh_i, kwh_p, total_kwh) VALUES (NULL, '$periode', '$pelanggan', '$kwh_s','$kwh_r','$kwh_b','$kwh_i','$kwh_p', '$total_kwh')");

header("location:datakwh.php");
