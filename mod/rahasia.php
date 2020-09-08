<?php

function rhs($isi)
{
    $encode=base64_encode($isi);
    return $encode;
}

function bukarhs($isi)
{
    $decode=base64_decode($isi);
    return $decode;
}

function rp($angka)
{
    $a=number_format($angka,2,',','.');
    return $a;
}

function hapus_id($con,$tabel,$param,$id_param,$header,$ps,$pse)
{
   // $query = "delete from ".$tabel." where ".$param." = '".$id_param."'";
    $q=mysqli_query($con, "delete from ".$tabel." where ".$param." = '".$id_param."'");
    if ($q)
    {
        header('location?p='.$header.'&ps='.rhs($ps));
    }
    else
    {
        header('location?p='.$header.'&pse='.rhs($pse));
    }
}

function tglindo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}


?>