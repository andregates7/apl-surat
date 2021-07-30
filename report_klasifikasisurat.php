<?php
include "config.php";						  
require('fpdf/mc_table.php');
 //tanggal


$today = date('Y-m-d');
function BulanIndo($bulan){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");            
  $result = $BulanIndo[(int)$bulan-1];;     
  return($result);
}

$a=explode("-",$today);
$bln=BulanIndo($a[1]);
$tgl=$a[2].' '.$bln.' '.$a[0];
//batas tanggal

$result = $koneksi->query("SELECT klasifikasi.*, surat_masuk.asal_surat, surat_masuk.no_agenda FROM klasifikasi INNER JOIN surat_masuk ON klasifikasi.id=surat_masuk.id_klasifikasi GROUP BY surat_masuk.id ASC;")->fetch_all(MYSQLI_ASSOC);

$mengetahui = $koneksi->query("SELECT * FROM user WHERE level = 'Kepala Kabbag' ")->Fetch_assoc();
$jabatan = $koneksi->query("SELECT * FROM user WHERE nama = 'Imam Syafii S.Sos' ")->Fetch_assoc();

session_start();
$dicetak = $_SESSION['nama'];

//Create a new PDF file
$pdf = new PDF_MC_Table('P','mm',array(297,210)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Cell(10);
$pdf->Image("./img/lg-kemdikbud.png", 10, 7 , 20 , 20);
$pdf->Cell(170);
$pdf->Ln();

$pdf->SetFont('Arial','',14);
$pdf->Cell(80);
$pdf->Cell(30,5,'LLDIKTI Wilayah XI Kalimantan',0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','',9);
$pdf->Cell(80);
$pdf->Cell(30,5,'Jl. Adhyaksa, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',9);
$pdf->Cell(80);
$pdf->Cell(30,5,'Telp. (0511) 3304583',0,0,'C');
$pdf->Ln();

$pdf->Line(10, 31, 200, 31);
$pdf->Ln(8);

//nama bulan
$nama_bulan = date("m-Y");

$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Rekap Klasifikasi Surat Bulan '.BulanIndo($nama_bulan),0,0,'C');
$pdf->Ln(12);

//table Head
$pdf->SetFont('Arial','B',10);
$pdf->SetWidths(array(10,20,55,45,60));
$pdf->SetAligns(array('C','C','C','C','C',));
$pdf->Row(array('No','Kode','Jenis klasifikasi','No. Agenda','Asal Surat'));

//table content
$no = 1;
foreach ($result as $row) 
{
    $jenis_klasifikasi       = $row["jenis_klasifikasi"];
    $kode                    = $row["kode_klasifikasi"];
    $no_agenda               = $row["no_agenda"];
    $asal_surat             = $row["asal_surat"];

    //Now show the columns
    $pdf->SetFont('Arial','',10);
    $pdf->SetAligns(array('C','C','C','C','L'));
    $pdf->Row(array($no,$kode,$jenis_klasifikasi,$no_agenda,$asal_surat));
    $no++;
}

//footer  columns


$pdf->Ln(8);

$pdf->SetFont('Arial','',11);
$pdf->Cell(135);
$pdf->Cell(20,8,'Dicetak Tanggal '.$tgl,0,0,'L');


$pdf->Ln(10);
$pdf->SetFont('Arial','',11);
$pdf->Cell(140);
$pdf->Cell(20,8,'Mengetahui, '. $jabatan['level'],0,0,'L');

$pdf->Ln();$pdf->Ln();$pdf->Ln();
$pdf->SetFont('Arial','',11);
$pdf->Cell(145);
$pdf->Cell(20,8,$mengetahui['nama'],0,0,'L');

$pdf->Ln(7);
$pdf->SetFont('Arial','',11);
$pdf->Cell(1);
$pdf->Cell(20,8,'Di Cetak Oleh : '. $dicetak,0,0,'L');

$pdf->Output('Laporan Rekap Klasifikasi Surat','I');
?>