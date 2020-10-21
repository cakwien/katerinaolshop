<?php
class laporan
{
    //laporan stok barang
    function lap_stok_masuk($con)
    {
        $list=array();
        $q=mysqli_query($con,"select pembelian.time, barang.nm_barang, barang.kd_barang, barang.satuan, jenis.jenis, pembelian.jumlah_beli, pembelian.harga_beli from pembelian join barang on pembelian.id_barang = barang.id_barang join jenis on barang.id_jenis = jenis.id_jenis");
        while($dt = mysqli_fetch_array($q))
        {
            $list[] = $dt;
        }
        return $list;
    }

    function harga_pokok_penjualan($con)
    {
        $q_hpp = mysqli_query($con,"select sum(total_harga_beli) from penjualan");
        $hpp = mysqli_fetch_array($q_hpp);
        return $hpp;
    }

    function penjualan_bersih($con)
    {
        $q_jualbersih = mysqli_query($con,"select sum(total_harga_jual) from penjualan");
        $jualbersih = mysqli_fetch_array($q_jualbersih);
        return $jualbersih;
    }

    function diskon($con)
    {
        $q_diskon = mysqli_query($con,"select sum(total_diskon) from penjualan");
        $diskon = mysqli_fetch_array($q_diskon);
        return $diskon;
    }

    //laporan laba rugi per hari per tanggal

    //penjualan bersih

    function penjualan_bersih_tgl($con,$tgl1,$tgl2)
    {
        $q=mysqli_query($con,"select sum(total_harga_jual) from penjualan where time between '$tgl1' and '$tgl2'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function harga_pokok_penjualan_tgl($con,$tgl1,$tgl2)
    {
        $q=mysqli_query($con,"select sum(total_harga_beli) from penjualan where time between '$tgl1' and '$tgl2'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }

    function diskon_tgl($con,$tgl1,$tgl2)
    {
        $q=mysqli_query($con,"Select sum(diskon) from penjualan where time between '$tgl1' and '$tgl2'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }



    
}
?>