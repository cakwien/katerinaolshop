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
        $listsupplier = $supplier->tampil($con);
        $jml_barang=$barang->hitungbarang($con);
        if (!empty($_POST['simpan']))
        {
            $kd_barang = $_POST['kd_barang'];
            $nm_barang = $_POST['nm_barang'];
            $id_jenis  = $_POST['id_jenis'];
            $id_supplier = $_POST['id_supplier'];
            $stok_awal = $_POST['stok_awal'];
            $satuan    = $_POST['satuan'];
            $harga_beli = $_POST['harga_beli'];
            $harga_jual = $_POST['harga_jual'];
            $time = time();
            $input=$barang->simpan($con,$kd_barang,$nm_barang,$id_jenis,$id_supplier,$satuan,$stok_awal,$harga_beli,$harga_jual);
        }

        if (!empty($_GET['hapus']))
        {
            $id_barang = $_GET['hapus'];
            $barang->hapus($con,$id_barang);
        }
        
        
        $in_barang="active";
        $hal_barang="active";
        include('view/home.php');
    }

    elseif($p=="barang_edit")
    {
        $listjenis = $jenis->tampil($con);
        if(!empty($_GET['edit']))
        {
            $id_barang = $_GET['edit'];
            $dt=$barang->edit($con,$id_barang);
            $nm_barang = $dt['nm_barang'];
            $id_jenis = $dt['id_jenis'];
            $kd_barang = $dt['kd_barang'];
            $satuan = $dt['satuan'];
        }
        
        if (!empty($_POST['id_barang']))
        {
            $id_barang = $_POST['id_barang'];
            $kd_barang = $_POST['kd_barang'];
            $nm_barang = $_POST['nm_barang'];
            $satuan = $_POST['satuan'];
            $id_jenis = $_POST['id_jenis'];
            $input=$barang->update($con,$kd_barang,$nm_barang,$id_jenis,$satuan,$id_barang);
        }

        

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
    elseif ($p=="edit_member")
    {
        $id_member = $_GET['edit'];
        $dt=$member->member_show($con,$id_member);
        $kd_member = $dt['kd_member'];
        $nm_member = $dt['nm_member'];
        $alamat = $dt['alamat'];
        $no_hp = $dt['no_hp'];

        if (!empty($_POST['nm_member']))
        {
            $nm_member = $_POST['nm_member'];
            $kd_member = $_POST['kd_member'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $input = $member->member_update($con,$kd_member, $nm_member, $alamat,$no_hp,$id_member);
        }

        include('view/home.php');

    }
    
    
    //TRANSAKSI
    else if($p=="transaksi")
    {
        if (!empty($_GET['n']))
        {
            $nota = $_GET['n'];
            $tampil_pembelian=$penjualan->tampilbarang($con,$nota);
            if (!empty($_POST['cari_kd']))
            {
                $kd_barang = $_POST['cari_kd'];
                $nta = $_GET['n'];
                $penjualan->cari_barang($con,$kd_barang,$nta);
            }

            if (!empty($_GET['id_barang']))
            {
                $id_barang=$_GET['id_barang'];
                $show_brg=$penjualan->barang_harga($con,$id_barang);
                $kd_barang=$show_brg['kd_barang'];
                $id_barang=$show_brg['id_barang'];
                $nm_barang=$show_brg['nm_barang'];
                $harga_jual=$show_brg['harga_jual'];
                $stok_akhir = $show_brg['stok_akhir'];
                
                if (!empty($_POST['jumlah_jual']))
                {
                    
                    if ($_POST['jumlah_jual'] <= $stok_akhir)
                    {
                        $time = time();
                        //$total_harga = ($_POST['harga_jual'] * $_POST['jumlah_jual']) - $_POST['diskon'];
                        //$input=$penjualan->tambahbarang($con,$_POST['nota'],$_POST['id_barang'],$_POST['jumlah_jual'],$_POST['harga_jual'],$total_harga,$_POST['diskon'],$time);
                        //header('location?p=transaksi&n='.$_POST['nota']);
                        
                        $a=$_POST['id_barang'];
                        $b=$_POST['nota'];
                        $c=$_POST['harga_jual'];
                        $d=$_POST['jumlah_jual'];
                        $e=$_POST['diskon'];
                        $f1= $c - $e; // harga jual dikurangi diskon
                        $f = $f1 * $d; // dikalikan dengan jumlah barang yang di jual

                           
                        $q_harga_beli = mysqli_query($con,"select harga_beli from pembelian where id_barang = '$a' order by time desc limit 1");
                        $show_harga_beli = mysqli_fetch_array($q_harga_beli);
                        //total harga beli
                        $g = $show_harga_beli[0] * $d;
    
                        //total diskon
                        $tot_dis = $e * $d;
    
                        //total harga jual
     
                        $tot_harga_jual = $d * $c;
    
                        //cek stok barang
                        $stok -> stok_keluar($con,$d,$a);
                        mysqli_query($con,"insert into penjualan value ('','$b','$a','$d','$c','$tot_harga_jual','$g','$f','$e','$tot_dis','$time')");
                        header('location:?p=transaksi&n='.$b);
                    }
                    else
                    {
                        header('location:?p=transaksi&n='.$b.'&id_barang='.$a.'&pse='.rhs("Jumlah pemelian melebihi persediaan stok barang"));
                    }
                    
                }
            }
            
            if (!empty($_POST['pay']))
            {
                $kembali = $_POST['bayar'] - $_POST['total_harga'];
                $waktu = time();
                $pay=$penjualan->bayar($con,$_GET['n'],$_POST['total_harga'],$_POST['bayar'],$kembali,$waktu);
            }
            
            if (!empty($_GET['batal']))
            {
                $stok -> stok_batal($con,$_GET['jk'],$_GET['id']);
                $penjualan->batalbarang($con,$_GET['batal'],$_GET['n']);
            }
            
        }
        
        $hal_trans="active";
        include('view/home.php');
    }
    
    else if($p=="ctnota")
    {
        include('view/cetaknota.php');
    }

    else if ($p=="lapjual")
    {
        $listpenjualan = $penjualan -> lap_penjualan_2($con);
        $listpenjualan2 = $penjualan -> lap_penjualan_1($con);
        $jumlah_terjual = $penjualan -> hitung_barang_terjual($con);
        $hal_lapjual="active";
        $in_lap="active";
        include('view/home.php');
    }

    //tambah stok
    else if($p=="tambahstok")
    {
        include('view/home.php');
    }
    
    elseif ($p=="stokmasuk")
    {
        $liststokmasuk = $laporan -> lap_stok_masuk($con);
        $listbarang = $barang -> tampil($con);

        if (!empty($_POST['simpan']))
        {
            $id_barang = $_POST['id_barang'];
            $jumlah_beli = $_POST['jumlah_beli'];
            $harga_beli  = $_POST['harga_beli'];
            $harga_jual  = $_POST['harga_jual'];
            $time = time();
            $total_harga_beli = $_POST['harga_beli'] * $_POST['jumlah_beli'];
            $total_harga_jual = $_POST['harga_jual'] * $_POST['jumlah_beli'];
            $input = $stok->stok_masuk($con,$time,$id_barang,$jumlah_beli,$harga_beli,$total_harga_beli,$harga_jual,$total_harga_jual);
        }

        $hal_stokmasuk="active";
        $in_barang = "active";
        include('view/home.php');
    }
    elseif ($p=="profil")
    {
        $listuser = $induk->tampil($con);
        if (!empty($_POST['username']))
        {
            $qcek_username = mysqli_query($con,"select username from user where username = '$username'");
            $dtcek = mysqli_fetch_array($qcek_username);
            if (empty($dtcek[0]))
            {
                $input=$induk->simpan($con,$_POST['nm_user'],$_POST['username'],$_POST['password'],$_POST['tipe']);    
            }
            else
            {
                header('location:?p=profil&pse='.rhs("Username sudah digunakan.. coba username lain..."));
            }
        }

        if (!empty($_GET['hapus']))
        {
            $id_user = $_GET['hapus'];
            $induk -> user_hapus($con,$id_user);
        }
        $hal_profil="active";
        include('view/home.php');
        

       
    }

    elseif ($p=="edit_profil") //update_profil.php
    {
        

        if (!empty($_GET['edit']))
        {
            $id_user = $_GET['edit'];
            $dt = $induk->user_show($con,$id_user);
            $nm_user = $dt['nm_user'];
            $username = $dt['username'];
            $password = $dt['password'];
            $level = $dt['level'];
        }else{
            $id_user = "";
            $nm_user = "";
            $username = "";
            $password = "";
            $level = "";
        }

        if (!empty($_POST['id_user']))
        {
            $nm_user = $_POST['nm_user'];
            $id_user = $_POST['id_user'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $level = $_POST['level'];
            $id_user = $_POST['id_user'];
            $input=$induk->update($con,$nm_user,$username,$password,$level,$id_user);
            //echo "BERHASIL UPDATE";
        }

        

        $hal_profil="active";
        include('view/home.php');
    }

    //laporan
    //cetak laporan penjualan
    else if ($p=="ct_lap_penjualan")
    {
        include('view/cetakpenjualan.php');
    }

    elseif ($p=="ct_lap_penjualan_all")
    {
        include('view/cetakpenjualan_all.php');
    }

    //Data Stok Barang
    elseif ($p=="lapstok")
    {
        $list_stok_barang = $barang->tampil($con);
        $in_lap="active";
        $hal_lapstok = "active";
        include('view/home.php');
    }

    elseif($p=="ct_lapstok")
    {
        $list_stok_barang = $barang->tampil($con);
        
        include('view/cetaklapstok.php');
    }

    elseif ($p=="laplabarugi")
    {
        if (!empty($_POST['do']))
        {
           
            header('location:?p=laplabarugi&tgl1='.strtotime($_POST['tgl1']).'&tgl2='.strtotime($_POST['tgl2']));
        }
        
        if(empty($_GET['tgl1']) && empty($_GET['tgl2']))
        {
            $tgl1=""; $tgl2="";
            $hpp=$laporan->harga_pokok_penjualan($con);
            $jual_bersih = $laporan->penjualan_bersih($con);
            $diskon = $laporan->diskon($con);
            $periode="Keseluruhan";
            
            $laba_bersih = $jual_bersih[0] - $hpp[0] - $diskon[0]; 
        }
        else
        {
           $tgl1 = $_GET['tgl1'];
           $tgl2 = $_GET['tgl2'] + 86364;

            $periode = "<a class='btn-sm btn-danger'><b>".tglindo(date('Y-m-d',$tgl1))."</b></a> s/d <a class='btn-sm btn-danger'><b>".tglindo(date('Y-m-d',$tgl2))."</b></a>";

            $hpp = $laporan->harga_pokok_penjualan_tgl($con,$tgl1,$tgl2);
            $jual_bersih = $laporan->penjualan_bersih_tgl($con,$tgl1,$tgl2);
            $diskon = $laporan->diskon_tgl($con,$tgl1,$tgl2);

            $laba_bersih = $jual_bersih[0] - $hpp[0] - $diskon[0];
        }
        
        
        $in_lap = "active";
        $hal_laplabarugi="active";
        include('view/home.php');
    }
    elseif ($p=="ct_labarugi")
    {
        $tgl1=""; $tgl2="";
        $hpp=$laporan->harga_pokok_penjualan($con);
        $jual_bersih = $laporan->penjualan_bersih($con);
        $diskon = $laporan->diskon($con);
        $laba_bersih = $jual_bersih[0] - $hpp[0] - $diskon[0]; 
        
        include('view/cetaklabarugi.php');
    }

    elseif ($p=="ct_labarugi_periode")
    {
       
        if (!empty($_GET['tgl1']) && !empty($_GET['tgl2']))
        {
            $tgl1 = $_GET['tgl1'];
            $tgl2 = $_GET['tgl2'] + 86364;

            $periode = "<a class='btn-sm btn-danger'><b>".tglindo(date('Y-m-d',$tgl1))."</b></a> s/d <a class='btn-sm btn-danger'><b>".tglindo(date('Y-m-d',$tgl2))."</b></a>";

            $hpp = $laporan->harga_pokok_penjualan_tgl($con,$tgl1,$tgl2);
            $jual_bersih = $laporan->penjualan_bersih_tgl($con,$tgl1,$tgl2);
            $diskon = $laporan->diskon_tgl($con,$tgl1,$tgl2);

            $laba_bersih = $jual_bersih[0] - $hpp[0] - $diskon[0];
        }
        else
        {
            $tgl1=""; $tgl2="";
            $hpp=$laporan->harga_pokok_penjualan($con);
            $jual_bersih = $laporan->penjualan_bersih($con);
            $diskon = $laporan->diskon($con);
            $laba_bersih = $jual_bersih[0] - $hpp[0] - $diskon[0]; 
        }
        
        include('view/cetaklabarugi_per.php');
    }

    elseif($p=="up")
    {
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