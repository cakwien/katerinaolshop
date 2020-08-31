<?php

class nota{
    
    function cetaknota($con,$nota)
    {
        $list=array();
        $q=mysqli_query($con,"select barang.kd_barang, barang.nm_barang, barang.satuan, penjualan.harga_jual, penjualan.jumlah_jual, penjualan.diskon, penjualan.total_harga from penjualan join barang on penjualan.id_barang = barang.id_barang where penjualan.nota = '$nota'");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }
    
    function tampilbayar($con,$nota)
    {
        $q=mysqli_query($con,"select * from pembayaran where nota = '$nota'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function hitungitem($con,$nota)
    {
        $q=mysqli_query($con,"select count(id_barang) from penjualan where nota = '$nota'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
}

?>