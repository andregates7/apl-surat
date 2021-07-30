<?php 
	include 'config.php';
    
    $id 				= $_POST['id'];
    $no_agenda 			= $_POST['no_agenda'];
    $no_surat 			= $_POST['no_surat'];
    $asal_surat 		= $_POST['asal_surat'];
    $kode 				= $_POST['kode'];
    $isi 				= $_POST['isi'];
    $tgl_surat 			= $_POST['tgl_surat'];
    $keterangan 		= $_POST['keterangan'];
    $klasifikasi 		= $_POST['id_klasifikasi'];
	
	$file_arr=array("doc","docx","pdf");

	$file_name= $_FILES['file']['name'];
	$tmp_name= $_FILES['file']['tmp_name'];

	$target='uploads/suratmasuk/';
	$target_file=$target.$file_name;
	
	if (move_uploaded_file($tmp_name, $target_file)) {
		$file_arr=$target_file;
	}
	
		$sql = $koneksi->query("UPDATE `surat_masuk` SET `no_agenda` = '$no_agenda', `no_surat` = '$no_surat', `kode` = '$kode', `asal_surat` = '$asal_surat', `isi` = '$isi', `tgl_surat` = '$tgl_surat', `keterangan` = '$keterangan', `id_klasifikasi` = '$klasifikasi', `file` = '$file_name' WHERE `surat_masuk`.`id` = $id; ");
		
			if ($sql) {
				
				echo '<script type="text/javascript">window.location="menu.php?open=user"</script>';
			}else{
				echo "<script> alert('Gagal menyimpan data')</script>";
				echo '<script type="text/javascript">window.location="menu.php?open=user"</script>';
			}return;