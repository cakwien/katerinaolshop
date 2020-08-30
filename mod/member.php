<?php

class member
{
     function hitungmember($con)
    {
        $q=mysqli_query($con,"select count(id_member) from member");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function kode_member($con,$awalan,$lebar)
    {
        $query="select kd_member from member order by kd_member desc limit 1";
        $hasil=mysqli_query($con,$query);
        $jumlahrecord = mysqli_num_rows($hasil);
        if($jumlahrecord == 0)
            $nomor=1;
        else
        {
            $row=mysqli_fetch_array($hasil);
            $nomor=intval(substr($row[0],strlen($awalan)))+1;
        }
        if($lebar>0)
            $angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
        else
            $angka = $awalan.$nomor;
        return $angka;
    }
    
    function simpan($con,$kd_member,$nm_member,$alamat,$no_hp)
    {
        $q=mysqli_query($con,"insert into member value('','$kd_member','$nm_member','$alamat','$no_hp')");
        if ($q)
        {
            header('location:?p=member');
        }else
        {
            header('location:?p=member');
        }
    }
    
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from member");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
        
    }
    
    function hapus($con,$id_member)
    {
        $q=mysqli_query($con,"delete from member where id_member = '$id_member'");
        if ($q)
        {
            $pesan="Member berhasil dihapus...";
            header('location:?p=member&ps='.rhs($pesan));
        }else
        {
            $pesan="Member Gagal dihapus...";
            header('location:?p=member&pse='.rhs($pesan));
        }
    }
}

?>