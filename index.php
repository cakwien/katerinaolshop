<?php
session_start();
$hostDB			= "localhost";
$usernameDB		= "root";
$passwordDB		= "";
$namaDB			= "katerina_olshop";


//KONEKSI KE DATABASE
$con = mysqli_connect($hostDB,$usernameDB,$passwordDB,$namaDB);

//CEK KONEKSI
if(mysqli_connect_error())
{
	echo "GAGAL";
	die;
}

//SET TIMEZONE
date_default_timezone_set('Asia/Jakarta');



include('mod/induk.php');
$induk = new induk;

include('mod/jenis.php');
$jenis = new jenis;

include ('mod/barang.php');
$barang = new barang;

include('mod/supplier.php');
$supplier = new supplier;

include('mod/member.php');
$member = new member;

include('mod/stok.php');
$stok = new stok;

include('mod/transaksi.php');
$penjualan = new penjualan;

include('mod/nota.php');
$nota = new nota;

include('mod/rahasia.php');

include('control/routing.php');
?>