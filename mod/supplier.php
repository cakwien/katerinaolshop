<?php

class supplier
{
     function hitungsupplier($con)
    {
        $q=mysqli_query($con,"select count(id_supplier) as jumlah from supplier");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function tampil($con)
    {
        $list=array();
        $q=mysqli_query($con,"select * from supplier order by id_supplier desc");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
    }
    
    function jumlahsupplier($con)
    {
        $q=mysqli_query($con,"select count(id_supplier) as jumlah from supplier");
        $dt=mysqli_fetch_array($q);
        return $dt;
    }
    
    function simpan($con,$nama,$alamat,$hp)
    {
        $q=mysqli_query($con,"insert into supplier value('','$nama','$alamat','$hp')");
        if ($q)
        {
            $pesan = "Supplier berhasil di tambahkan";
            header('location:?p=supplier');
        }else
        {
            $pesan = "Supplier gagal ditambahkan";
            header('location:?p=supplier');
        }
    }
    
    function hapus($con,$id_supplier)
    {
        $q=mysqli_query($con,"delete from supplier where id_supplier='$id_supplier'");
        if ($q)
        {
            $pesan = "Supplier berhasil di Hapus...";
            header('location:?p=supplier&ps='.rhs($pesan));
        }else
        {
            $pesan = "Supplier gagal di Hapus...";
            header('location:?p=supplier&pse='.rhs($pesan));
        }
    }
}

?>