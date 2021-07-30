<?php
include "config.php";
require('fpdf/mc_table.php');
//tanggal


$today = date('Y-m-d');
function BulanIndo($bulan)
{
    $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    $result = $BulanIndo[(int)$bulan - 1];;
    return ($result);
}

$a = explode("-", $today);
$bln = BulanIndo($a[1]);
$tgl = $a[2] . ' ' . $bln . ' ' . $a[0];
//batas tanggal

$awal   = $_GET['awal'];
$akhir  = $_GET['akhir'];

$result = $koneksi->query("SELECT bmn.nama_barang, bmn.satuan, bmn.tgl_input, kondisi.jumlah, kondisi.kondisi_barang, kondisi.catatan FROM bmn INNER JOIN kondisi ON bmn.id=kondisi.id_bmn WHERE tgl_input BETWEEN '$awal' AND '$akhir' ORDER BY tgl_input ASC;")->fetch_all(MYSQLI_ASSOC);

$mengetahui = $koneksi->query("SELECT * FROM user WHERE level = 'Kepala Kabbag' ")->Fetch_assoc();
$jabatan = $koneksi->query("SELECT * FROM user WHERE nama = 'Imam Syafii S.Sos' ")->Fetch_assoc();

session_start();
$dicetak = $_SESSION['nama'];

//Create a new PDF file
$pdf = new PDF_MC_Table('P', 'mm', array(297, 210)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Cell(10);
$pdf->Image("./img/lg-kemdikbud.png", 10, 7, 20, 20);
$pdf->Cell(170);
$pdf->Ln();

$pdf->SetFont('Arial', '', 14);
$pdf->Cell(80);
$pdf->Cell(30, 5, 'LLDIKTI Wilayah XI Kalimantan', 0, 0, 'C');
$pdf->Ln();

$pdf->SetFont('Arial', '', 9);
$pdf->Cell(80);
$pdf->Cell(30, 5, 'Jl. Adhyaksa, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123', 0, 0, 'C');
$pdf->Ln();
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(80);
$pdf->Cell(30, 5, 'Telp. (0511) 3304583', 0, 0, 'C');
$pdf->Ln();

$pdf->Line(10, 31, 200, 31);
$pdf->Ln(8);

//nama bulan
$nama_bulan = date("d-m-Y", strtotime($awal)) . " s/d " . date("d-m-Y", strtotime($akhir));

$pdf->SetFont('Arial', 'B', 13);
$pdf->Cell(80);
$pdf->Cell(30, 10, 'Rekap Peminjaman Gedung Serba Guna ' . $nama_bulan, 0, 0, 'C');
$pdf->Ln(12);

//table Head
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetWidths(array(10, 45, 15, 15, 50, 55));
$pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'C'));
$pdf->Row(array('No', 'Nama Barang', 'Jumlah', 'Satuan', 'Kondisi Barang', 'Catatan'));

//table content
$no=1;
foreach ($result as $row) {
    
    $nama_barang        = $row["nama_barang"];
    $jumlah             = $row["jumlah"];
    $satuan             = $row["satuan"];
    $kondisi_barang     = $row["kondisi_barang"];
    $catatan            = $row["catatan"];

    //Now show the columns
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetAligns(array('C', 'C', 'C', 'C', 'C', 'L'));
    $pdf->Row(array($no, $nama_barang, $jumlah, $satuan, $kondisi_barang, $catatan));
    $no++;
}

//footer  columns


$pdf->Ln(8);

$pdf->SetFont('Arial', '', 11);
$pdf->Cell(135);
$pdf->Cell(20, 8, 'Dicetak Tanggal ' . $tgl, 0, 0, 'L');


$pdf->Ln(10);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(140);
$pdf->Cell(20, 8, 'Mengetahui, ' . $jabatan['level'], 0, 0, 'L');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(145);
$pdf->Cell(20, 8, $mengetahui['nama'], 0, 0, 'L');

$pdf->Ln(7);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(1);
$pdf->Cell(20, 8, 'Di Cetak Oleh : ' . $dicetak, 0, 0, 'L');

$pdf->Output('Laporan Rekap Pelaporan Barang Milik Negara', 'I');
