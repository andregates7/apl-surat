<?php 
	include 'config.php';
		$id 			= $_POST['id'];
		$username 		= $_POST['username'];
		$password 		= md5($_POST['password']);
		$level 			= $_POST['level'];
		$nama 			= $_POST['nama'];
		$tempat_lahir 	= $_POST['tempat_lahir'];
		$tanggal_lahir 	= $_POST['tanggal_lahir'];
		$telepon 		= $_POST['telepon'];
		$alamat 		= $_POST['alamat'];
	
	$images_arr=array("png","jpg","jpeg");

	$image_name= $_FILES['foto']['name'];
	$tmp_name= $_FILES['foto']['tmp_name'];

	$target='foto/';
	$target_file=$target.$image_name;
	if($image_name==""){
		$image_name="default.png";
	}
	if (move_uploaded_file($tmp_name, $target_file)) {
		$images_arr=$target_file;
	}
	
		$sql = $koneksi->query("UPDATE user SET username='$username',password='$password',level='$level',nama='$nama',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',telepon='$telepon',alamat='$alamat',foto='$image_name' WHERE id='$id'");
		
			if ($sql) {
			
				echo '<script type="text/javascript">window.location="menu.php?open=user"</script>';
			}else{
				echo "<script> alert('Gagal menyimpan data')</script>";
				echo '<script type="text/javascript">window.location="menu.php?open=user"</script>';
			}

	
 ?>