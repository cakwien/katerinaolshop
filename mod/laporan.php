<?php
class laporan
{
    //laporan stok barang
    function lap_stok_masuk($con)
    {
        $q=mysqli_query($con,"select pembelian.time, barang.nm_barang, barang.kd_barang, barang.satuan, jenis.jenis, pembelian.jumlah_beli, pembelian.harga_beli from pembelian join barang on pembelian.id_barang = barang.id_barang join jenis on barang.id_jenis = jenis.id_jenis");
        while($dt = mysqli_fetch_array($q))
        {
            $list[] = $dt;
        }
        return $list;
    }

    
}
?>