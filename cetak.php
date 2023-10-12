<?php

use Fpdf\Fpdf;

require_once('../../fpdf/Fpdf.php'); // Sertakan file FPDF
require_once('../../koneksi.php'); // Sertakan file FPDF
// $db = new PDO('mysql:host=localhost;dbname=simplen', 'root', '');

class PDF extends Fpdf
{
  function Header()
  {
    // Header PDF (Opsional)
    // $this->Image('/../../logo.png', 10, 6, -1200);
    $this->SetFont('Arial', 'B', 16);
    $this->Cell(0, 10, 'Tarif Penjualan Listrik', 0, 1, 'C');
    $this->Ln(5);
    $this->SetFont('Times', '', 10);
    $this->Cell(80, 30, 'PT. PLN (PERSERO)', 1, 0, 'C');
    $this->Cell(170, 30, 'SISTEM MANAJEMEN KESELAMATAN DAN KESEHATAN KERJA', 1, 0, 'C');
    $this->Cell(30, 30, 'SNKB', 1, 0, 'C');
    $this->Ln();
    $this->Cell(140, 15, 'FORMULIR DAFTAR HADIR', 1, 0, 'C');
    $this->Cell(140, 15, 'NO DOKUMEN:  ', 1, 0, 'C');
    $this->Ln();
    $today = date("l, d/m/Y");
    $this->SetFont('Times', 'B', 9);
    $this->Cell(100, 10, 'Hari/Tanggal : ' . $today, 1, 0, 'L');
    // $this->Cell(138, 10, 'Hari/Tanggal :', 1, 0, 'C');
    $this->Cell(180, 10, 'Lokasi :  ', 1, 0, 'L');
    $this->Ln();
    $this->Cell(280, 10, 'Kegiatan', 1, 1, 'L');
    $this->Cell(280, 10, '  ', 1, 1, 'L');
    $this->Cell(0, 15, '', 0, 1, 'C');
    $this->Ln();

    // $this->Image('../../logo.png', 10, 6, -1200);
    // $this->SetFont('Arial', 'B', 14);
    // $this->Cell(276, 5, 'Formulir Daftar Hadir', 0, 0, 'C');
    // $this->Image('../../logo2.png', 270, 6, -80);
    // $this->Ln();
    // $this->SetFont('Times', '', 12);
    // $this->Cell(276, 10, 'SISTEM MANAJEMEN KESELAMATAN DAN KESEHATAN KERJA', 0, 0, 'C');
    // $this->Ln();
  }

  function headTable()
  {
    $today = date("d/m/Y");
    $this->SetFont('Times', 'B', 9);
    $this->Cell(10, 10, 'Tabel Data Jumlah Data Penjualan Per Tanggal ' . $today, 0, 0, 'L');
    $this->Ln();
    // Membuat Tabel Header
    $this->SetFont('Arial', 'B', '13');
    $this->Cell(10, 10, 'No', 1, 0, 'C');
    $this->Cell(90, 10, 'Klasifikasi', 1, 0, 'C');
    $this->Cell(25, 10, 'S', 1, 0, 'C');
    $this->Cell(25, 10, 'R', 1, 0, 'C');
    $this->Cell(25, 10, 'B', 1, 0, 'C');
    $this->Cell(25, 10, 'I', 1, 0, 'C');
    $this->Cell(25, 10, 'P', 1, 0, 'C');
    $this->Cell(52, 10, 'Total', 1, 0, 'C');
    $this->Ln();
  }

  function viewTable($pdf, $koneksi)
  {
    $this->SetFont('Times', '', '12');

    // Mengambil data dari database dengan PDO
    $nomor = 1;
    $pustaka = mysqli_query($koneksi, "select * from t_kwh");
    while ($p = mysqli_fetch_array($pustaka)) {
      $total_kwh = $p['kwh_s'] + $p['kwh_r'] + $p['kwh_b'] + $p['kwh_i'] + $p['kwh_p'];

      // Menyimpan total ke dalam array berdasarkan id_plg
      $totals[$p['id_kwh']] = $total_kwh;

      $this->Cell(10, 10, $nomor++, 1, 0, 'C');
      $this->Cell(90, 10, $p['pelanggan'], 1, 0, 'C');
      $this->Cell(25, 10, $p['kwh_s'], 1, 0, 'C');
      $this->Cell(25, 10, $p['kwh_r'], 1, 0, 'C');
      $this->Cell(25, 10, $p['kwh_b'], 1, 0, 'C');
      $this->Cell(25, 10, $p['kwh_i'], 1, 0, 'C');
      $this->Cell(25, 10, $p['kwh_p'], 1, 0, 'C');
      $this->Cell(52, 10, $total_kwh, 1, 0, 'C');
      $this->Ln();
      // $nomor++;
    }
  }

  function Footer()
  {
    // Footer PDF
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Halaman ' . $this->PageNo(), 0, 0, 'R');
  }
}

// Membuat objek PDF
$pdf = new Fpdf();
$pdf = new PDF();
$pdf->AddPage('L', 'A4', 0);
// $pdf->AddPage();

// // Mengambil data dari database dengan PDO
// $nomor = 1;
// $pustaka = mysqli_query($koneksi, "select * from t_kwh");
// while ($p = mysqli_fetch_array($pustaka)) {
//   $total_kwh = $p['kwh_s'] + $p['kwh_r'] + $p['kwh_b'] + $p['kwh_i'] + $p['kwh_p'];

//   // Menyimpan total ke dalam array berdasarkan id_plg
//   $totals[$p['id_kwh']] = $total_kwh;

//   $pdf->Cell(10, 10, $nomor++, 1, 0, 'C');
//   $pdf->Cell(40, 10, $p['pelanggan'], 1, 0, 'C');
//   $pdf->Cell(20, 10, $p['kwh_s'], 1, 0, 'C');
//   $pdf->Cell(20, 10, $p['kwh_r'], 1, 0, 'C');
//   $pdf->Cell(20, 10, $p['kwh_b'], 1, 0, 'C');
//   $pdf->Cell(20, 10, $p['kwh_i'], 1, 0, 'C');
//   $pdf->Cell(20, 10, $p['kwh_p'], 1, 0, 'C');
//   $pdf->Cell(25, 10, $total_kwh, 1, 0, 'C');
//   $pdf->Ln();
//   // $nomor++;
// }

$pdf->AliasNbPages();
// $pdf->Ln();
// $pdf->InfoDate();
$pdf->headTable();
// viewTable($pdf, $koneksi);
// $pdf->viewTable($pdf, $koneksi);
$pdf->viewTable($pdf, $koneksi);
$pdf->Output('', 'Laporan Data.pdf'); // Menampilkan atau menyimpan PDF
