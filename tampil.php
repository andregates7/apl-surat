<?php

include "config.php";
switch ($_GET['data'])
{

//petugas
case 'pegawai'   : 
  $sql = $koneksi->query("SELECT *,'' as aksi FROM user")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editpegawai'   :   
  $id =$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM `user` WHERE `id` ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;
//END petugas

//suratmasuk
case 'suratmasuk'   : 
  $sql= $koneksi->query("SELECT *,'' as aksi FROM surat_masuk GROUP BY id DESC")->fetch_all(MYSQLI_ASSOC); 
  $kirim= array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editsuratmasuk'   :   
  $id= $_GET['id'];
  $sql= $koneksi->query("SELECT * FROM `surat_masuk` where `id` ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;
//END suratmasuk

//disposisi
case 'disposisi'   : 
  $sql= $koneksi->query("SELECT disposisi.*, surat_masuk.no_agenda, surat_masuk.no_surat, surat_masuk.asal_surat FROM disposisi INNER JOIN surat_masuk ON surat_masuk.id=disposisi.id_surat GROUP BY disposisi.id DESC")->fetch_all(MYSQLI_ASSOC); 
  $kirim= array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editdisposisi'   :   
  $id= $_GET['id'];
  $sql= $koneksi->query("SELECT disposisi.*, surat_masuk.no_agenda, surat_masuk.no_surat, surat_masuk.asal_surat FROM disposisi INNER JOIN surat_masuk ON surat_masuk.id=disposisi.id_surat AND disposisi.id='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;
//END suratkeluar

//suratkeluar
case 'suratkeluar'   : 
  $sql= $koneksi->query("SELECT surat_keluar.*, disposisi.tujuan FROM surat_keluar INNER JOIN disposisi ON disposisi.id=surat_keluar.id_dispo GROUP BY surat_keluar.id DESC")->fetch_all(MYSQLI_ASSOC); 
  $kirim= array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editsuratkeluar'   :   
  $id= $_GET['id'];
  $sql= $koneksi->query("SELECT surat_keluar.*, disposisi.tujuan FROM surat_keluar INNER JOIN disposisi ON disposisi.id=surat_keluar.id_dispo AND surat_keluar.id='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;
//END suratkeluar

//klasifikasi
case 'klasifikasi'   : 
  $sql= $koneksi->query("SELECT klasifikasi.*, surat_masuk.kode, count(surat_masuk.id) AS jumlah_klasifikasi FROM klasifikasi INNER JOIN surat_masuk ON klasifikasi.id=surat_masuk.id_klasifikasi GROUP BY klasifikasi.id ORDER BY jumlah_klasifikasi DESC")->fetch_all(MYSQLI_ASSOC); 
  $kirim= array('data' => $sql); 
  echo json_encode($kirim);                       

break;
//END klasifikasi

//klasifikasi surat
case 'klasifikasi_surat'   : 
  $sql= $koneksi->query("SELECT klasifikasi.*, surat_masuk.asal_surat, surat_masuk.no_agenda FROM klasifikasi INNER JOIN surat_masuk ON klasifikasi.id=surat_masuk.id_klasifikasi GROUP BY surat_masuk.id ASC;")->fetch_all(MYSQLI_ASSOC); 
  $kirim= array('data' => $sql); 
  echo json_encode($kirim);                       

break;
//END klasifikasi

case 'gedung'   : 
  $sql = $koneksi->query("SELECT *,'' as aksi FROM gedung")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editgedung'   :   
  $id =$_GET['id'];
  $sql = $koneksi->query("SELECT * FROM `gedung` WHERE `id` ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'bmn'   : 
  $sql = $koneksi->query("SELECT bmn.*, jenis_aset.jenis_aset FROM bmn INNER JOIN jenis_aset ON jenis_aset.id=bmn.id_jenis_aset GROUP BY bmn.id ASC;")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editbmn'   :   
  $id =$_GET['id'];
  $sql = $koneksi->query("SELECT bmn.*, jenis_aset.jenis_aset FROM bmn INNER JOIN jenis_aset ON jenis_aset.id=bmn.id_jenis_aset AND bmn.id='$id';")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'kondisi'   : 
  $sql = $koneksi->query("SELECT kondisi.*, bmn.nama_barang FROM kondisi INNER JOIN bmn ON kondisi.id_bmn=bmn.id GROUP BY kondisi.id ASC;")->fetch_all(MYSQLI_ASSOC); 
  $kirim=array('data' => $sql); 
  echo json_encode($kirim);                       

break;

case 'editkondisi'   :   
  $id =$_GET['id'];
  $sql = $koneksi->query("SELECT kondisi.*, bmn.nama_barang FROM kondisi INNER JOIN bmn ON kondisi.id_bmn=bmn.id AND kondisi.id ='$id'")->fetch_assoc(); 
  echo json_encode($sql);                       

break;

case 'file'   :   
  $awal  = $_GET['awal']; 
  $akhir = $_GET['akhir'];

  $sql = $koneksi->query("SELECT surat_masuk.*, klasifikasi.jenis_klasifikasi  FROM klasifikasi JOIN surat_masuk ON klasifikasi.id=surat_masuk.id_klasifikasi WHERE tgl_diterima BETWEEN '$awal' AND '$akhir' ORDER BY no_agenda ASC;")->fetch_all(MYSQLI_ASSOC); 
  $kirim = array('data' => $sql); 
  echo json_encode($kirim);                       

break;

}
