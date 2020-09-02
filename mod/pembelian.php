<?php

class pembelian
{
    function tampil($con)
    {
        $q=mysqli_query($con,"select * from penjualan");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }
    function beli($con,$time,$id_barang,$jumlah_beli,$harga_beli,$harga_jual)
    {
        $q=mysqli_query($con,"insert into pembelian value('','$time','$id_barang','$jumlah_beli','$harga_beli','$harga_jual')");
        if ($q)
        {
            $pesan = "Pembelian Berhasil, Stok baru ditambahkan...";
        }
        else
        {
            $pesan = "Pembelian gagal, Stok tidak di tambahkan...";    
        }
    }
}

?>