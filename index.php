<?php
ob_start();
session_start();

if (isset($_SESSION['admin'])) {
	header("location:./menu.php");
	die();
}

require('config.php');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<!-- Responsive screen browser -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- icon -->
	<link href='img/logo.jpg' rel='shortcut icon'>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
	<link rel="stylesheet" href="./style.css">
	<!-- Font -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,600&display=swap" rel="stylesheet">

	<title>LLDIKTI Wilayah XI Kalimantan</title>
</head>

<body>
	<!-- background -->
	<section class="side">
		<img src="./img/img.svg" alt="">
	</section>

	<section class="main">

		<!-- Main Start -->
		<div class="login-container">
			<div class="avatar">
				<img src="./img/avatar.svg" alt="">
				<p class="welcome-message">Selamat Datang</p>
			</div>

			<?php
			if (isset($_GET['msg'])) {
				if ($_GET['msg'] == "0") {
					echo "<div class='alert'>Username atau Password Salah !!</div>";
				}
			}
			?>

			<form action="" method="post" class="login-form">

				<div class="form-control">
					<input name="user" type="text" placeholder="Username" required autocomplete="off">
					<i class="fas fa-user"></i>
				</div>
				<div class="form-control">
					<input name="pass" type="password" placeholder="Password" required autocomplete="off">
					<i class="fas fa-lock"></i>
				</div>

				<button name="login" class="submit" value="login">Login</button>

				<!-- Main End -->

			</form>

			<?php
			if (isset($_POST['login'])) {
				$user = $_POST['user'];
				$pass = md5($_POST['pass']);
				$data_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'");
				$data = mysqli_fetch_array($data_user);
				$level = $data['level'];
				$nama = $data['nama'];
				if ($data > 0) {
					$_SESSION['nama'] = $nama;
					$_SESSION['level'] = $level;
					header('location:menu.php');
				} else {
					header("location:index.php?msg=0");
				}
			}
			?>

		</div>
	</section>

</body>

</html>