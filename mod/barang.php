<?php

class barang
{
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from barang join jenis on barang.id_jenis = jenis.id_jenis");
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
}

?>