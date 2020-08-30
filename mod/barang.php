<?php

class barang
{
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from barang join jenis on barang.id_jenis = jenis.id_jenis join pembelian where barang.id_barang = pembelian.id_barang");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
        
    }
    
    function hitungbarang($con)
    {
        $q=mysqli_query($con,"select count(id_barang) as jumlah from barang");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function simpan($con,$kd_barang,$nm_barang,$id_jenis,$satuan,$stok_awal,$harga_beli,$harga_jual)
    {
        $cek=mysqli_query($con,"select kd_barang from barang where kd_barang = '$kd_barang'");
        $dtcek=mysqli_num_rows($cek);
        if ($dtcek > 0)
        {
            $pesan="Kode barang tersebut sudah ada...";
            header('location:?p=barang&pse='.rhs($pesan));
        }
        else
        {
            $q=mysqli_query($con,"insert into barang value('','$kd_barang','$nm_barang','$id_jenis','$satuan','$stok_awal','','','$stok_awal')");
            if ($q)
            {
                $qstok = mysqli_query($con,"select id_barang from barang where kd_barang = '$kd_barang'");
                $d=mysqli_fetch_array($qstok);
                $id=$d['id_barang'];
                $time=time();
                $qtambahsok = mysqli_query($con,"insert into pembelian value ('','$time','$id','$stok_awal','$harga_beli','$harga_jual')");
                if ($qtambahstok)
                {
                    $pesan="Barang berhasil ditambahkan...";
                    header('location:?p=barang&ps='.rhs($pesan));
                }else
                {
                    $pesan="Barang gagal ditambahkan...";
                    header('location:?p=barang&pse='.rhs($pesan));
                }
            }
            else
            {
                $pesan="Barang gagal ditambahkan...";
                header('location:?p=barang&pse='.rhs($pesan));
            }
        }
        
    }
    
}

?>