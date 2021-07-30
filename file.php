<?php

if (isset($_GET['open'])) {

	switch ($_GET['open']) {

		default:
			if (!file_exists("beranda.php")) die("File tidak ada");
			include "beranda.php";
			break;

		case '':
			if (!file_exists("beranda.php")) die("File tidak ada");
			include "beranda.php";
			break;

		case 'user':
			if (!file_exists("user2.php")) die("File tidak ada");
			include "user2.php";
			break;

		case 'tambah_user':
			if (!file_exists("tambah_user.php")) die("File tidak ada");
			include "tambah_user.php";
			break;

		case 'edit_user':
			if (!file_exists("edit_user.php")) die("File tidak ada");
			include "edit_user.php";
			break;

		case 'suratmasuk':
			if (!file_exists("suratmasuk.php")) die("File tidak ada");
			include "suratmasuk.php";
			break;

		case 'buat_suratmasuk':
			if (!file_exists("buat_suratmasuk.php")) die("File tidak ada");
			include "buat_suratmasuk.php";
			break;

		case 'buat_dispo':
			if (!file_exists("buat_dispo.php")) die("File tidak ada");
			include "buat_dispo.php";
			break;

		case 'disposisi':
			if (!file_exists("disposisi.php")) die("File tidak ada");
			include "disposisi.php";
			break;

		case 'buat_suratkeluar':
			if (!file_exists("buat_suratkeluar.php")) die("File tidak ada");
			include "buat_suratkeluar.php";
			break;

		case 'suratkeluar':
			if (!file_exists("suratkeluar.php")) die("File tidak ada");
			include "suratkeluar.php";
			break;

		case 'klasifikasi_surat':
			if (!file_exists("klasifikasi_surat.php")) die("File tidak ada");
			include "klasifikasi_surat.php";
			break;

		case 'tambah_acara':
			if (!file_exists("tambah_acara.php")) die("File tidak ada");
			include "tambah_acara.php";
			break;

		case 'gedung':
			if (!file_exists("gedung.php")) die("File tidak ada");
			include "gedung.php";
			break;

		case 'buat_bmn':
			if (!file_exists("buat_bmn.php")) die("File tidak ada");
			include "buat_bmn.php";
			break;

		case 'bmn':
			if (!file_exists("bmn.php")) die("File tidak ada");
			include "bmn.php";
			break;

		case 'kondisi_bmn':
			if (!file_exists("kondisi_bmn.php")) die("File tidak ada");
			include "kondisi_bmn.php";
			break;

		case 'update_bmn':
			if (!file_exists("update_bmn.php")) die("File tidak ada");
			include "update_bmn.php";
			break;

		case 'rekap_suratmasuk':
			if (!file_exists("rekap_suratmasuk.php")) die("File tidak ada");
			include "rekap_suratmasuk.php";
			break;

		case 'rekap_suratkeluar':
			if (!file_exists("rekap_suratkeluar.php")) die("File tidak ada");
			include "rekap_suratkeluar.php";
			break;

		case 'rekap_disposisi':
			if (!file_exists("rekap_disposisi.php")) die("File tidak ada");
			include "rekap_disposisi.php";
			break;

		case 'rekap_klasifikasisurat':
			if (!file_exists("rekap_klasifikasisurat.php")) die("File tidak ada");
			include "rekap_klasifikasisurat.php";
			break;

		case 'rekap_agendasurat':
			if (!file_exists("rekap_agendasurat.php")) die("File tidak ada");
			include "rekap_agendasurat.php";
			break;

		case 'rekap_file':
			if (!file_exists("rekap_file.php")) die("File tidak ada");
			include "rekap_file.php";
			break;

		case 'rekap_gedung':
			if (!file_exists("rekap_gedung.php")) die("File tidak ada");
			include "rekap_gedung.php";
			break;

		case 'rekap_bmn':
			if (!file_exists("rekap_bmn.php")) die("File tidak ada");
			include "rekap_bmn.php";
			break;
	}
} else {
	if (!file_exists("beranda.php")) die("File tidak ada");
	include "beranda.php";
}
