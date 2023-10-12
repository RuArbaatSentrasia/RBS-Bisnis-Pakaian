<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:../login/login.php");
}
include '../../koneksi.php';

$id = $_POST['id'];
$bulan = $_POST['bulan'];
$kwh_s = $_POST['kwh_s'];
$kwh_r = $_POST['kwh_r'];
$kwh_b = $_POST['kwh_b'];
$kwh_i = $_POST['kwh_i'];
$kwh_p = $_POST['kwh_p'];
$total_kwh = $kwh_s + $kwh_r + $kwh_b + $kwh_i + $kwh_p;

echo $id;

mysqli_query($koneksi, "UPDATE t_kwh SET
                    bulan = '$bulan', 
                    kwh_s = '$kwh_s', 
                    kwh_r = '$kwh_r', 
                    kwh_b = '$kwh_b', 
                    kwh_i = '$kwh_i', 
                    kwh_p = '$kwh_p', 
                    total_kwh = '$total_kwh' 
                WHERE id_kwh = $id
                ");
header("location:datakwh.php");
