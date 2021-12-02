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
    $a=number_format($angka,0,',','.');
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

function hari($hari)
{
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}


function update_zip($con,$file,$file_tmp)
{
	
}


?>