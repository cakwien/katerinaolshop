<?php

class stok
{
    function tambah_stok_baru($con,$time,$id_barang,$jumlah_beli,$harga_beli,$harga_jual)
    {
        mysqli_query($con,"insert into pembelian value ('','$time','$id_barang','$jumlah_beli','$harga_beli','$harga_jual')");
    }
    
    function cari_barang($con,$kd_barang)
    {
        $q=mysqli_query($con,"select id_barang from barang where kd_barang = '$kd_barang'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function stok_harga($con,$id_barang)
    {
        $q=mysqli_query($con,"select * from pembelian where id_barang = '$id_barang' order by time desc limit 1");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function cek_stok($con,$id_barang)
    {
        $q=mysqli_query($con,"select stok_keluar,stok_akhir from barang where id_barang = '$id_barang'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function edit_stok($con,$stok_keluar,$stok_akhir,$id_barang)
    {
        mysqli_query($con,"update barang set stok_keluar='$stok_keluar', stok_akhir = '$stok_akhir' where id_barang = '$id_barang'");
    }

    function stok_keluar($con,$stok_keluar,$id_barang)
    {
        mysqli_query($con,"update barang set stok_keluar = stok_keluar + '$stok_keluar', stok_akhir = stok_akhir - '$stok_keluar' where id_barang = '$id_barang'");
    }

    function stok_batal($con,$stok_keluar,$id_barang)
    {
        mysqli_query($con,"update barang set stok_keluar = stok_keluar - '$stok_keluar', stok_akhir = stok_akhir + '$stok_keluar' where id_barang = '$id_barang'");
    }

    
    

}

?>