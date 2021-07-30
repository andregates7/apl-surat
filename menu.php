<?php
session_start();
if (isset($_SESSION['admin'])) {
  header("location:/index.php");
  die();
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LLDIKTI Wilayah XI Kalimantan</title>

  <link href='img/logo.jpg' rel='shorcut icon' />

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="style/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="style/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="style/plugins/select2-3.5.4/select2.css">
  <link rel="stylesheet" href="style/plugins/select2-3.5.4/select2-bootstrap.css">
  <link rel="stylesheet" href="style/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="style/plugins/bootstrap-daterangepicker/daterangepicker.css">
  <link href="style/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" type="text/css" />

  <script src="style/highcharts.js"></script>

<body>
  <!--========== HEADER ==========-->
  <header class="header">
    <div class="header__container" style="font-size: 12pt; color: #19181B; font-weight: bold;">
      <a href="menu.php" class="header__logo">LLDIKTI Wilayah XI Kalimantan</a>

      <div class="navbar-text" id="clockDisplay1" style="font-size: 12pt; color: #19181B; font-weight: bold;"></div>
      <script type="text/javascript" language="javascript">
        function renderTime1() {

          var currentTime1 = new Date();
          var h = currentTime1.getHours();
          var m = currentTime1.getMinutes();
          var s = currentTime1.getSeconds();

          if (h == 0) {
            h = 0;
          }
          if (h < 10) {
            h = "0" + h;
          }
          if (m < 10) {
            m = "0" + m;
          }
          if (s < 10) {
            s = "0" + s;
          }

          var myClock1 = document.getElementById('clockDisplay1');

          myClock1.textContent = h + " : " + m + " : " + s + "";
          setTimeout('renderTime1()', 1000);
        }

        renderTime1();
      </script>

      <div class="navbar-text" style="font-size: 12pt; color: #19181B; font-weight: bold;">
        <script type='text/javascript'>
          var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
          var date = new Date();
          var day = date.getDate();
          var month = date.getMonth();
          var thisDay = date.getDay(),
            thisDay = myDays[thisDay];
          var yy = date.getYear();
          var year = (yy < 1000) ? yy + 1900 : yy;
          document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
        </script>
      </div>

      <div class="header__logo"><?php echo $_SESSION['nama']; ?>
        <?php include "config.php";

        $id = $_SESSION['nama'];
        $upload = "SELECT `user`.`foto` FROM `user` where `nama` ='$id'";
        $data = mysqli_query($koneksi, $upload);
        while ($f = mysqli_fetch_array($data)) { ?>
          <img src="<?php echo "foto/" . $f['foto']; ?>" alt="" class="header__img">
        <?php } ?>
      </div>

      <div class="header__toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
      </div>

    </div>
  </header>

  <!--========== NAV ==========-->
  <div class="nav" id="navbar">
    <nav class="nav__container">
      <div>
        <a href="menu.php" class="nav__link nav__logo">
          <img src="img/logo.jpg" alt="">
        </a>

        <div class="nav__list">
          <div class="nav__items">
            <h3 class="nav__subtitle">Dashboard</h3>

            <a href="menu.php?" class="nav__link active">
              <i class='bx bx-home nav__icon'></i>
              <span class="nav__name">Home</span>
            </a>

            <?php if ($_SESSION['level'] == 'Petugas') { ?>

              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class='bx bx-message-rounded nav__icon'></i>
                  <span class="nav__name">Transaksi Surat</span>
                  <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                </a>

                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="menu.php?open=suratmasuk" class="nav__dropdown-item">Surat Masuk</a>
                    <a href="menu.php?open=disposisi" class="nav__dropdown-item">Disposisi</a>
                    <a href="menu.php?open=suratkeluar" class="nav__dropdown-item">Surat Keluar</a>
                  </div>
                </div>
              </div>

              <a href="menu.php?open=klasifikasi_surat" class="nav__link">
                <i class='bx bx-folder nav__icon'></i>
                <span class="nav__name">Klasifikasi Surat</span>
              </a>

              <a href="menu.php?open=gedung" class="nav__link">
                <i class='bx bx-building-house nav__icon'></i>
                <span class="nav__name">Gedung Serba Guna</span>
              </a>

              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class='bx bx-box nav__icon'></i>
                  <span class="nav__name">Barang Milik Negara</span>
                  <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                </a>

                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="menu.php?open=bmn" class="nav__dropdown-item">Pencatatan BMN</a>
                    <a href="menu.php?open=update_bmn" class="nav__dropdown-item">Kondisi BMN</a>
                  </div>
                </div>
              </div>

              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                  <span class="nav__name">Rekap Laporan</span>
                  <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                </a>
                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="menu.php?open=rekap_suratmasuk" class="nav__dropdown-item">Surat Masuk</a>
                    <a href="menu.php?open=rekap_disposisi" class="nav__dropdown-item">Disposisi</a>
                    <a href="menu.php?open=rekap_suratkeluar" class="nav__dropdown-item">Surat Keluar</a>
                    <a href="menu.php?open=rekap_klasifikasisurat" class="nav__dropdown-item">Klasifikasi Surat</a>
                    <a href="menu.php?open=rekap_agendasurat" class="nav__dropdown-item">Agenda Surat</a>
                    <a href="menu.php?open=rekap_file" class="nav__dropdown-item">Pencarian Berkas Elektronik</a>
                    <a href="menu.php?open=rekap_gedung" class="nav__dropdown-item">Gedung Serba Guna</a>
                    <a href="menu.php?open=rekap_bmn" class="nav__dropdown-item">Barang Milik Negara</a>
                  </div>
                </div>
              </div>

            <?php } else if ($_SESSION['level'] == 'Admin') { ?>

              <a href="menu.php?open=user" class="nav__link">
                <i class='bx bx-user nav__icon'></i>
                <span class="nav__name">User</span>
              </a>

            <?php } else { ?>

              <div class="nav__dropdown">
                <a href="#" class="nav__link">
                  <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                  <span class="nav__name">Rekap Laporan</span>
                  <i class='bx bx-chevron-down nav__icon nav__dropdown-icon'></i>
                </a>
                <div class="nav__dropdown-collapse">
                  <div class="nav__dropdown-content">
                    <a href="menu.php?open=rekap_suratmasuk" class="nav__dropdown-item">Surat Masuk</a>
                    <a href="menu.php?open=rekap_disposisi" class="nav__dropdown-item">Disposisi</a>
                    <a href="menu.php?open=rekap_suratkeluar" class="nav__dropdown-item">Surat Keluar</a>
                    <a href="menu.php?open=rekap_klasifikasisurat" class="nav__dropdown-item">Klasifikasi Surat</a>
                    <a href="menu.php?open=rekap_agendasurat" class="nav__dropdown-item">Agenda Surat</a>
                    <a href="menu.php?open=rekap_file" class="nav__dropdown-item">Pencarian Berkas Elektronik</a>
                    <a href="menu.php?open=rekap_gedung" class="nav__dropdown-item">Gedung Serba Guna</a>
                    <a href="menu.php?open=rekap_bmn" class="nav__dropdown-item">Barang Milik Negara</a>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>

      <a href="index.php" class="nav__link nav__logout">
        <i class='bx bx-log-out nav__icon'></i>
        <span class="nav__name">Log Out</span>
      </a>
    </nav>
  </div>


  <!-- Main content -->
  <section class="content">

    <?php include "file.php"; ?>

  </section>
  <footer class="footer">
    <div class="footer__container" style="font-size: 12pt; color: #19181B; font-weight: bold;">
      <strong>Copyright &copy; 2021 Kasubbag Tata Usaha & Barang Milik Negara</strong>
    </div>
  </footer>

  <script src="./assets/js/main.js"></script>
</body>

</html>

<style>
  /*========== GOOGLE FONTS ==========*/
  @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

  /*========== VARIABLES CSS ==========*/
  :root {
    --header-height: 4.5rem;
    --nav-width: 219px;
    --body-color: #DFE9F2;

    /*========== Colors ==========*/
    --first-color: #6923D0;
    --first-color-light: #F4F0FA;
    --title-color: #19181B;
    --text-color: #58555E;
    --text-color-light: #A5A1AA;
    --container-color: #FFFFFF;

    /*========== Font and typography ==========*/
    --body-font: 'Poppins', sans-serif;
    --normal-font-size: .938rem;
    --small-font-size: .75rem;
    --smaller-font-size: .75rem;

    /*========== Font weight ==========*/
    --font-medium: 500;
    --font-semi-bold: 600;

    /*========== z index ==========*/
    --z-fixed: 100;
  }

  @media screen and (min-width: 1024px) {
    :root {
      --normal-font-size: 1.5rem;
      --small-font-size: 1.4rem;
      --smaller-font-size: 1.33rem;
    }
  }

  /*========== BASE ==========*/
  *,
  ::before,
  ::after {
    box-sizing: border-box;
  }

  body {
    margin: var(--header-height) 0 0 0;
    padding: 1rem 1rem 0;
    font-family: var(--body-font);
    font-size: var(--normal-font-size);
    background: url(./img/bg.png);
    background-color: var(--body-color);
    color: var(--text-color);
  }

  h3 {
    margin: 0;
  }

  a {
    text-decoration: none;
  }

  img {
    max-width: 100%;
    height: auto;
  }

  /*========== HEADER ==========*/
  .header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: var(--container-color);
    box-shadow: 0 1px 0 rgba(22, 8, 43, 0.1);
    padding: 01 1rem;
    z-index: var(--z-fixed);
  }

  .header__container {
    display: flex;
    align-items: center;
    height: var(--header-height);
    justify-content: space-between;
  }

  .header__img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
  }

  .header__logo {
    color: var(--title-color);
    font-weight: var(--font-medium);
    display: none;
  }


  .header__icon,
  .header__toggle {
    font-size: 2.2rem;
  }

  .header__toggle {
    color: var(--title-color);
    cursor: pointer;
  }

  .footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: var(--container-color);
    box-shadow: 0 1px 0 rgba(22, 8, 43, 0.1);
    padding: 0 6rem;
  }

  .footer__container {
    display: flex;
    align-items: center;
    height: var(--header-height);
    justify-content: space-between;
  }

  /*========== NAV ==========*/
  .nav {
    position: fixed;
    top: 0;
    left: -100%;
    height: 100vh;
    padding: 1rem 1rem 0;
    background-color: var(--container-color);
    box-shadow: 1px 0 0 rgba(22, 8, 43, 0.1);
    z-index: var(--z-fixed);
    transition: .4s;
  }

  .nav__container {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding-bottom: 3rem;
    overflow: auto;
    scrollbar-width: none;
    /* For mozilla */
  }

  /* For Google Chrome and others */
  .nav__container::-webkit-scrollbar {
    display: none;
  }

  .nav__logo {
    font-weight: var(--font-semi-bold);
    margin-bottom: 2.5rem;
  }

  .nav__list,
  .nav__items {
    display: grid;
  }

  .nav__list {
    row-gap: 2.5rem;
  }

  .nav__items {
    row-gap: 1.5rem;
  }

  .nav__subtitle {
    font-size: var(--normal-font-size);
    text-transform: uppercase;
    letter-spacing: .1rem;
    color: var(--text-color-light);
  }

  .nav__link {
    display: flex;
    align-items: center;
    color: var(--text-color);
  }

  .nav__link:hover {
    color: var(--first-color);
  }

  .nav__icon {
    font-size: 1.2rem;
    margin-right: .5rem;
  }

  .nav__name {
    font-size: var(--small-font-size);
    font-weight: var(--font-medium);
    white-space: nowrap;
  }

  .nav__logout {
    margin-top: 5rem;
  }

  /* Dropdown */
  .nav__dropdown {
    overflow: hidden;
    max-height: 21px;
    transition: .4s ease-in-out;
  }

  .nav__dropdown-collapse {
    background-color: var(--first-color-light);
    border-radius: .25rem;
    margin-top: 1rem;
  }

  .nav__dropdown-content {
    display: grid;
    row-gap: .5rem;
    padding: .75rem 2.5rem .75rem 1.8rem;
  }

  .nav__dropdown-item {
    font-size: var(--smaller-font-size);
    font-weight: var(--font-medium);
    color: var(--text-color);
  }

  .nav__dropdown-item:hover {
    color: var(--first-color);
  }

  .nav__dropdown-icon {
    margin-left: auto;
    transition: .4s;
  }

  /* Show dropdown collapse */
  .nav__dropdown:hover {
    max-height: 100rem;
  }

  /* Rotate icon arrow */
  .nav__dropdown:hover .nav__dropdown-icon {
    transform: rotate(180deg);
  }

  /*===== Show menu =====*/
  .show-menu {
    left: 0;
  }

  /*===== Active link =====*/
  .active {
    color: var(--first-color);
  }

  /* ========== MEDIA QUERIES ==========*/
  /* For small devices reduce search*/
  @media screen and (max-width: 320px) {
    .header__search {
      width: 70%;
    }
  }

  @media screen and (min-width: 768px) {
    body {
      padding: 1rem 3rem 0 6rem;
    }

    .header {
      padding: 0 3rem 0 8rem;
    }

    .header__container {
      height: calc(var(--header-height) + .5rem);
    }

    .footer {
      padding: 0 3rem 0 8rem;
    }

    .footer__container {
      height: calc(var(--header-height) + .5rem);
    }

    .header__toggle {
      display: none;
    }

    .header__logo {
      display: block;
    }

    .header__img {
      width: 40px;
      height: 40px;
      order: 1;
    }

    .nav {
      left: 0;
      padding: 1.2rem 1.5rem 0;
      width: 68px;
      /* Reduced navbar */
    }

    .nav__items {
      row-gap: 1.7rem;
    }

    .nav__icon {
      font-size: 2.3rem;
    }

    /* Element opacity */
    .nav__logo-name,
    .nav__name,
    .nav__subtitle,
    .nav__dropdown-icon {
      opacity: 0;
      transition: .3s;
    }


    /* Navbar expanded */
    .nav:hover {
      width: var(--nav-width);
    }

    /* Visible elements */
    .nav:hover .nav__logo-name {
      opacity: 1;
    }

    .nav:hover .nav__subtitle {
      opacity: 1;
    }

    .nav:hover .nav__name {
      opacity: 1;
    }

    .nav:hover .nav__dropdown-icon {
      opacity: 1;
    }
  }
</style>