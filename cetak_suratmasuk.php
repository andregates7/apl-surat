<?php
include "config.php";
require('fpdf/mc_table.php');

//tanggal
$today = date('Y-m-d');

function TanggalIndo($tanggal)
{
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
  $a = explode("-", $tanggal);
  $bulan = $BulanIndo[(int)$a[1] - 1];
  $result = $a[2] . ' ' . $bulan . ' ' . $a[0];
  return ($result);
}

$tgl = TanggalIndo($today);

//batas tanggal
$id     = $_GET['id'];
$result = $koneksi->query("SELECT * FROM surat_masuk")->fetch_all(MYSQLI_ASSOC);
$header = $koneksi->query("SELECT * FROM surat_masuk WHERE id='$id'")->fetch_assoc();

//Create a new PDF file
$pdf = new PDF_MC_Table('P', 'mm', array(150, 100)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Cell(10);
$pdf->Image("./img/lg-kemdikbud.png", 10, 7, 8, 15);

$pdf->SetFont('Arial', '', 7);
$pdf->Cell(20);
$pdf->Cell(20, 5, 'LLDIKTI Wilayah XI Kalimantan', 0, 0, 'C');
$pdf->Ln();

$pdf->SetFont('Arial', '', 4);
$pdf->Cell(30);
$pdf->Cell(20, 3, 'Jl. Adhyaksa, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123', 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', '', 4);
$pdf->Cell(30);
$pdf->Cell(20, 3, 'Telp. (0511) 3304583', 0, 0, 'C');
$pdf->Ln();

$pdf->Line(10, 24, 90, 24);
$pdf->Ln(5);


$pdf->SetFont('Arial', '', 5);
//line 1
$pdf->Cell(1);
$pdf->Cell(10, 3, 'Tanggal Surat', 0, 0, 'L');
$pdf->Cell(4);
$pdf->Cell(5, 3, ':', 0, 0, 'C');
$pdf->Cell(1);
$pdf->Cell(20, 3, TanggalIndo($header['tgl_surat']), 0, 0, 'L');

$pdf->Cell(15);
$pdf->Cell(10, 3, 'No. Agenda', 0, 0, 'L');
$pdf->Cell(1);
$pdf->Cell(5, 3, ':', 0, 0, 'C');
$pdf->Cell(1);
$pdf->Cell(20, 3, $header['no_agenda'], 0, 0, 'L');
$pdf->Ln();

//line 3
$pdf->Cell(1);
$pdf->Cell(10, 3, 'Asal Surat', 0, 0, 'L');
$pdf->Cell(4);
$pdf->Cell(5, 3, ':', 0, 0, 'C');
$pdf->Cell(1);
$pdf->Cell(20, 3, $header['asal_surat'], 0, 0, 'L');
$pdf->Ln();

//line 4
$pdf->Cell(1);
$pdf->Cell(10, 3, 'No. Surat', 0, 0, 'L');
$pdf->Cell(4);
$pdf->Cell(5, 3, ':', 0, 0, 'C');
$pdf->Cell(1);
$pdf->Cell(20, 3, $header['no_surat'], 0, 0, 'L');
$pdf->Ln();

//line 5
$pdf->Cell(1);
$pdf->Cell(10, 3, 'Tanggal Surat', 0, 0, 'L');
$pdf->Cell(4);
$pdf->Cell(5, 3, ':', 0, 0, 'C');
$pdf->Cell(1);
$pdf->Cell(20, 3, TanggalIndo($header['tgl_diterima']), 0, 0, 'L');
$pdf->Ln(5);

//table Head
$pdf->SetFont('Arial', '', 5);
$pdf->Cell(10, 3, 'Isi Surat', 0, 0, 'L');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(4);
$pdf->Cell(5, 3, '', 0, 0, 'C');
$pdf->Cell(1);
$pdf->Cell(20, 3, $header['isi'], 0, 0, 'L');

//table content


//footer  columns

$pdf->SetFont('Arial', '', 6);


$pdf->Output('Surat Masuk.pdf', 'I');
