<?php
error_reporting(E_ALL & ~E_NOTICE);

include "config.php";

switch ($_GET['hapus']) {

	case 'pegawai':
		$id = $_GET['id'];
		$sql = $koneksi->query(" DELETE FROM `user` WHERE `id` = '$id' ");
		break;

	case 'suratmasuk':
		$id = $_GET['id'];
		$sql = $koneksi->query(" DELETE FROM `surat_masuk` WHERE `id` = '$id' ");
		break;

	case 'disposisi':
		$id = $_GET['id'];
		$sql = $koneksi->query(" DELETE FROM `disposisi` WHERE `id` = '$id' ");
		break;

	case 'suratkeluar':
		$id = $_GET['id'];
		$sql = $koneksi->query(" DELETE FROM `surat_keluar` WHERE `id` = '$id' ");
		break;

	case 'gedung':
		$id = $_GET['id'];
		$sql = $koneksi->query(" DELETE FROM `gedung` WHERE `id` = '$id' ");
		break;

	case 'bmn':
		$id = $_GET['id'];
		$sql = $koneksi->query(" DELETE FROM `bmn` WHERE `id` = '$id' ");
		break;

	case 'kondisi':
		$id = $_GET['id'];
		$sql = $koneksi->query(" DELETE FROM `kondisi` WHERE `id` = '$id' ");
		break;
}
