<?php

include "config.php";

switch ($_POST['simpan']) {

	case 'suratmasuk':

		$id 				= $_POST['id'];
		$no_agenda 			= $_POST['no_agenda'];
		$no_surat 			= $_POST['no_surat'];
		$asal_surat 		= $_POST['asal_surat'];
		$kode 				= $_POST['kode'];
		$isi 				= $_POST['isi'];
		$tgl_surat 			= $_POST['tgl_surat'];
		$keterangan 		= $_POST['keterangan'];
		$klasifikasi 		= $_POST['id_klasifikasi'];


		if (strlen($id) > 0) {
			$sql = $koneksi->query(" UPDATE `surat_masuk` SET `no_agenda` = '$no_agenda', `no_surat` = '$no_surat', `kode` = '$kode', `asal_surat` = '$asal_surat', `isi` = '$isi', `tgl_surat` = '$tgl_surat', `keterangan` = '$keterangan', `id_klasifikasi` = '$klasifikasi' WHERE `surat_masuk`.`id` = $id; ");
		} else {
			$sql = $koneksi->query(" INSERT INTO `surat_masuk` (`id`, `no_agenda`, `no_surat`, `kode`, `asal_surat`, `isi`, `tgl_surat`, `tgl_diterima`, `keterangan`, `id_klasifikasi`) VALUES ('', '$no_agenda', '$no_surat', '$kode', '$asal_surat', '$isi', '$tgl_surat', NOW(), '$keterangan', $klasifikasi)");
		}

		break;

		//disposisi
	case 'disposisi':

		$id 				= $_POST['id'];
		$tujuan		 		= $_POST['tujuan'];
		$tgl_dispo 			= $_POST['tgl_dispo'];
		$isi_dispo 			= $_POST['isi_dispo'];
		$sifat				= $_POST['sifat'];
		$batas_waktu 		= $_POST['batas_waktu'];
		$catatan			= $_POST['catatan'];
		$id_surat			= $_POST['id_surat'];

		if (strlen($id) > 0) {
			$sql = $koneksi->query(" UPDATE `disposisi` SET `tujuan` = '$tujuan', `isi_dispo` = '$isi_dispo', `sifat` = '$sifat', `batas_waktu` = '$batas_waktu', `catatan` = '$catatan' WHERE `disposisi`.`id` = '$id'; ");
		} else {
			$sql = $koneksi->query("INSERT INTO `disposisi` (`id`, `tujuan`, `tgl_dispo`, `isi_dispo`, `sifat`, `batas_waktu`, `catatan`, `id_surat`) VALUES ('', '$tujuan', NOW(), '$isi_dispo', '$sifat', '$batas_waktu', '$catatan', '$id_surat')");
		}

		break;

		//suratkeluar
	case 'surat_keluar':

		$id 				= $_POST['id'];
		$no_suratkeluar 	= $_POST['no_suratkeluar'];
		$surat_tujuan		= $_POST['surat_tujuan'];
		$kode 				= $_POST['kode'];
		$isi 				= $_POST['isi'];
		$tgl_surat			= $_POST['tgl_surat'];
		$keterangan 		= $_POST['keterangan'];
		$id_dispo   		= $_POST['id_dispo'];

		if (strlen($id) > 0) {
			$sql = $koneksi->query(" UPDATE `surat_keluar` SET `no_suratkeluar` = '$no_suratkeluar', `surat_tujuan` = '$surat_tujuan',`kode` = '$kode', `isi` = '$isi', `tgl_surat` = '$tgl_surat', `keterangan` = '$keterangan' WHERE `surat_keluar`.`id` = $id; ");
		} else {
			$sql = $koneksi->query(" INSERT INTO `surat_keluar` (`id`, `no_suratkeluar`, `surat_tujuan`, `kode`, `isi`, `tgl_surat`, `keterangan`, `id_dispo`) VALUES ('', '$no_suratkeluar', '$surat_tujuan', '$kode', '$isi', '$tgl_surat', '$keterangan', '$id_dispo');");
		}

		break;

	case 'gedung':

		$id					= $_POST['id'];
		$nama				= $_POST['nama'];
		$asal 				= $_POST['asal'];
		$keperluan 			= $_POST['keperluan'];
		$tgl_input			= $_POST['tgl_input'];
		$tanggal 			= $_POST['tanggal'];
		$keterangan 		= $_POST['keterangan'];

		if (strlen($id) > 0) {
			$sql = $koneksi->query(" UPDATE `gedung` SET `nama` = '$nama', `asal` = '$asal', `tgl_input` = NOW(), `keperluan` = '$keperluan', `tanggal` = '$tanggal', `keterangan` = '$keterangan' WHERE `gedung`.`id` = $id; ");
		} else {
			$sql = $koneksi->query(" INSERT INTO `gedung` (`id`, `nama`, `asal`, `keperluan`, `tanggal`, `keterangan`) VALUES ('', '$nama', '$asal', NOW(), '$keperluan', '$tanggal', '$keterangan');");
		}

		break;

	case 'bmn':

		$id 				= $_POST['id'];
		$nama_barang 		= $_POST['nama_barang'];
		$jumlah_barang		= $_POST['jumlah_barang'];
		$satuan 			= $_POST['satuan'];
		$tgl_input 			= $_POST['tgl_input'];
		$jenis_aset 		= $_POST['id_jenis_aset'];
		$keterangan 		= $_POST['keterangan'];

		if (strlen($id) > 0) {
			$sql = $koneksi->query("UPDATE `bmn` SET `nama_barang` = '$nama_barang', `jumlah_barang` = '$jumlah_barang', `satuan` = '$satuan', `tgl_input` = '$tgl_input', `id_jenis_aset` = '$jenis_aset' WHERE `bmn`.`id` = $id;");
		} else {
			$sql = $koneksi->query("INSERT INTO `bmn` (`id`, `nama_barang`, `jumlah_barang`, `satuan`, `tgl_input`, `id_jenis_aset`, `keterangan`) VALUES ('', '$nama_barang', '$jumlah_barang', '$satuan', NOW(), '$jenis_aset', '$keterangan');");
		}

		break;

	case 'kondisi':

		$id 				= $_POST['id'];
		$jumlah				= $_POST['jumlah'];
		$kondisi_barang 	= $_POST['kondisi_barang'];
		$catatan	 		= $_POST['catatan'];
		$id_bmn				= $_POST['id_bmn'];

		if (strlen($id) > 0) {
			$sql = $koneksi->query("UPDATE `kondisi` SET `jumlah` = '$jumlah', `kondisi_barang` = '$kondisi_barang', `catatan` = '$catatan' WHERE `kondisi`.`id` = $id;");
		} else {
			$sql = $koneksi->query("INSERT INTO `kondisi` (`id`, `jumlah`, `kondisi_barang`, `catatan`, `id_bmn`) VALUES ('', '$jumlah', '$kondisi_barang', '$catatan', '$id_bmn');");
		}

		break;
}
