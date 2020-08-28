<?php
class jenis
{
    function tampiljenis($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from jenis");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }
    
    function simpanjenis($con,$jenis)
    {
        $q=mysqli_query($con,"insert into jenis value('','$jenis')");
        if ($q)
        {
            $pesan="Data jenis barang berhasil di tambahkan...";
        }else
            
        {
            $pesan="Data jenis barang Gagal di tambahkan...";
        }
    }
    
    function editjenis($con,$id_jenis)
    {
        $q=mysqli_query($con,"select * from jenis where id_jenis = '$id_jenis'");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function hapusjenis($con,$id_jenis)
    {
        $q=mysqli_query($con,"delete from jenis where id_jenis = '$id_jenis'");
        if ($q)
        {
            $pesan="Data jenis berhasil dihapus...";
        }else
        {
            $pesan="Data jenis gagal dihapus...";
        }
    }
}

?>