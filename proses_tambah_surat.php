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
	
	$target_dir		= "uploads/surat masuk/";
	$target_file	= $target_dir.basename($_FILES["File"]["name"]);
	$uploadOk		= 1;
	$FileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if($_FILES["File"]["size"]>1000000){
		echo "File Terlalu Besar";
		$uploadOk	= 0;
	}

	if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf"){
		echo "Ekstensi yang diperbolehkan .doc | .docx | .pdf";
		$uploadOk	= 0;
	}

	if($uploadOk == 0){
		echo "File Gagal Upload";
	}else{
		if(move_uploaded_file($_FILES["File"]["tmp_name"],$target_file)){
			echo "File ". htmlspecialchars( basename($_FILES["File"]["name"])). "Berhasil di Upload.";
		}else{
			echo "Error saat Upload File.";
		}
	}
	
		$sql = $koneksi->query(" INSERT INTO `surat_masuk` (`id`, `no_agenda`, `no_surat`, `kode`, `asal_surat`, `isi`, `tgl_surat`, `tgl_diterima`, `keterangan`, `id_klasifikasi`, `file`) VALUES ('', '$no_agenda', '$no_surat', '$asal_surat', '$kode', '$isi', '$tgl_surat', '$keterangan', '$klasifikasi','$target_file') ");
		
			if ($sql) {
				
				echo '<script type="text/javascript">window.location="menu.php?open=user"</script>';
			}else{
				echo "<script> alert('Gagal menyimpan data')</script>";
				echo '<script type="text/javascript">window.location="menu.php?open=user"</script>';
			}
