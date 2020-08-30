<?php

class jenis
{
    function simpanjenis($con,$jenis)
    {
        $q=mysqli_query($con,"insert into jenis value('','$jenis')");
        if ($q)
        {
            $pesan="Jenis ".$jenis." berhasil ditambahkan...";
            header('location:?p=jenis&ps='.rhs($pesan).'');
        }else
        {
            $pesan="Jenis ".$jenis." gagal ditambahkan...";
            header('location:?p=jenis&pse='.rhs($pesan).'');
        }
    }
    
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from jenis");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }
    
    function hapusjenis($con,$id_jenis)
    {
        $q=mysqli_query($con,"delete from jenis where id_jenis = '$id_jenis'");
        if($q)
        {
            $pesan="Jenis berhasil dihapus...";
            header('location:?p=jenis&ps='.rhs($pesan).'');
        }else
        {
            $pesan="Jenis berhasil dihapus...";
            header('location:?p=jenis&pse='.rhs($pesan).'');
        }
    }
}

?>