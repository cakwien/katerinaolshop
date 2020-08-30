<?php



if (!empty($_GET['p']))
{
    $p=strtolower($_GET['p']);
    //LOGIN START SESSION
    if ($p=="login")
    {
        if (!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $induk->login($con,$username,$password);
        }
        include("view/login.php");
    }
    
    //LOGOUT DESTROY SESSION
    else if ($p=="logout")
    {
        session_start();
        session_destroy();
        header('location:?p=login');
    }
    
    else if ($p == "main")
    {
        $jml_barang=$barang->hitungbarang($con);
        $jml_sup=$supplier->hitungsupplier($con);
        $jml_member=$member->hitungmember($con);
        $jml_penjualan=$penjualan->hitungpenjualan($con);
        $beranda="active";
        include("view/home.php");
    }
    //DATA JENIS
    else if ($p =="jenis")
    {
        if (!empty($_POST['simpan']))
        {
            $input=$jenis->simpanjenis($con,$_POST['jenis']);
        }
        
        if (!empty($_GET['hapus']))
        {
            $id_jenis = $_GET['hapus'];
            $jenis->hapusjenis($con,$id_jenis);
        }
        //tabel jenis
        $listjenis=$jenis->tampil($con);
        
        $hal_jenis="active";
        $in_barang="active";
        include('view/home.php');
    }
    //DATA BARANG
    elseif ($p=="barang")
    {
        
        $listbarang=$barang->tampil($con);
        $listjenis=$jenis->tampil($con);
        $jml_barang=$barang->hitungbarang($con);
        if (!empty($_POST['simpan']))
        {
            $kd_barang = $_POST['kd_barang'];
            $nm_barang = $_POST['nm_barang'];
            $id_jenis  = $_POST['id_jenis'];
            $stok_awal = $_POST['stok_awal'];
            $satuan    = $_POST['satuan'];
            $harga_beli = $_POST['harga_beli'];
            $harga_jual = $_POST['harga_jual'];
            $time = time();
            $input=$barang->simpan($con,$kd_barang,$nm_barang,$id_jenis,$satuan,$stok_awal,$harga_beli,$harga_jual);
        }
        
        
        $in_barang="active";
        $hal_barang="active";
        include('view/home.php');
    }
    
    //DATA SUPPLIER
    elseif($p=="supplier")
    {
        $tampilsupplier=$supplier->tampil($con);
        $jum_sup=$supplier->jumlahsupplier($con);
        if (!empty($_POST['simpan']))
        {
            $nm_supplier   = $_POST['nm_supplier'];
            $alamat        = $_POST['alamat'];
            $no_hp         = $_POST['no_hp'];
            $input=$supplier->simpan($con,$nm_supplier,$alamat,$no_hp);
        }
        
        if (!empty($_GET['hapus']))
        {
            $id_supplier=$_GET['hapus'];
            $supplier->hapus($con,$id_supplier);
        }
        
        $in_barang="active";
        $hal_sup="active";
        include('view/home.php');
    }
    
    //DATA MEMBER
    else if ($p=="member")
    {
        $kdmember=$member->kode_member($con,"M","5");
        $tampilmember=$member->tampil($con);
        if (!empty($_POST['simpan']))
        {
            $kd_member = $_POST['kd_member'];
            $nm_member = $_POST['nm_member'];
            $alamat = $_POST['alamat'];
            $no_hp=$_POST['no_hp'];
            $input=$member->simpan($con,$kd_member,$nm_member,$alamat,$no_hp);
        }
        
        if (!empty($_GET['hapus']))
        {
            $id_member = $_GET['hapus'];
            $member->hapus($con,$id_member);
        }
        
        $hal_member="active";
        include('view/home.php');
    }
    
    
    //TRANSAKSI
    else if($p=="transaksi")
    {
        $listbarang = $barang->tampil($con);
        $hal_trans="active";
        include('view/home.php');
    }
    
    
    else
    {
        
        echo "salah alamat";
    }
}else
{
    header('location:?p=login');
}

?>