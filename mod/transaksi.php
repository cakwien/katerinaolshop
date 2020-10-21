<?php 
 class penjualan
 {
     function hitungpenjualan($con)
     {
         $q=mysqli_query($con,"select count(id_pembayaran) from pembayaran");
         $dt=mysqli_fetch_array($q);
         return $dt;
     }
     
     function hitung_barang_terjual($con)
     {
         $q=mysqli_query($con,"select sum(jumlah_jual) from penjualan");
         $dt=mysqli_fetch_array($q);
         return $dt;
     }

     function nota($con,$awalan,$lebar)
        {
            //$awalan="";
            //$lebar="5";
            $query="select nota from pembayaran order by nota desc limit 1";
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
     
     function batalbarang($con,$id_penjualan,$nota)
     {
         $q=mysqli_query($con,"delete from penjualan where id_penjualan = '$id_penjualan'");
         if ($q)
         {
            $pesan="Data barang berhasil dihapus...";
            header('location:?p=transaksi&n='.$nota.'&ps='.rhs($pesan));
         }else
         {
             $pesan="Data barang gagal dihapus...";
             header('location:?p=transaksi&n='.$nota.'&pse='.rhs($pesan));
         }
     }
     
     function tambahbarang($con,$nota,$id_barang,$jumlah_jual,$harga_jual,$total_harga,$diskon,$time)
     {
         $q=mysqli_query($con,"insert into penjualan value('','$nota','$id_barang','$jumlah_jual','$harga_jual','$total_harga','$diskon','$time')");
         if ($q)
         {
             header('location:?p=transaksi&n='.$nota);
         }else
         {
             $pesan="Barang Tidak ditemukan...";
             header('location:?p=transaksi&n='.$nota.'&pse='.rhs($pesan));
         }
     }
     
     function tampilbarang($con,$nota)//-> tampil barang yang masuk dilist pembelian
     {
         $list=array();
         $q=mysqli_query($con,"select * from penjualan join barang on penjualan.id_barang = barang.id_barang where penjualan.nota='$nota'");
         while($dt=mysqli_fetch_array($q))
         {
             $list[]=$dt;
         }
         return $list;
     }
     
     function barang_harga($con,$id_barang)// --> id_barang, nm_barang, hrg_barang, hrg_beli
     {
         $q=mysqli_query($con,"select pembelian.harga_jual, barang.stok_akhir, barang.id_barang, barang.nm_barang, barang.kd_barang from pembelian join barang on pembelian.id_barang = barang.id_barang where pembelian.id_barang = '$id_barang' order by time desc limit 1");
         $dt=mysqli_fetch_array($q);
         return $dt;
     }
     
     function harga_bayar($con,$nota)
     {
         $q=mysqli_query($con,"select sum(total_harga) from penjualan where nota = '$nota'");
         $dt=mysqli_fetch_array($q);
         return $dt;
     }
     
     function bayar($con,$nota,$total_harga,$bayar,$kembali,$time)
     {
         $q=mysqli_query($con,"insert into pembayaran value('','$nota',$total_harga,'$bayar','$kembali','$time')");
         if ($q)
         {
            header('location:?p=ctnota&nota='.$nota);
         }else
         {
             $pesan="Pembayaran Gagal...";
             header('location:?p=transaksi&n='.$nota.'&pse='.rhs($pesan));
         }
     }

      function lap_penjualan($con)
     {
        $list=array();
        $q=mysqli_query($con,"select penjualan.id_penjualan,penjualan.time, penjualan.harga_jual, penjualan.total_harga_jual, penjualan.harga_beli, penjualan.total_harga_beli, penjualan.nota, penjualan.diskon, barang.id_barang,barang.nm_barang, barang.kd_barang, penjualan.jumlah_jual, barang.satuan, penjualan.total_harga from penjualan join barang on penjualan.id_barang = barang.id_barang join jenis on barang.id_jenis = jenis.id_jenis");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
     }

     function lap_penjualan_1($con)
     {
        $list=array();
        $q=mysqli_query($con,"select * from penjualan group by nota");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
     }

     function lap_penjualan_2($con)
     {
        $list=array();
        $q=mysqli_query($con,"select * from penjualan join barang on penjualan.id_barang = barang.id_barang");
        while($dt=mysqli_fetch_array($q))
        {
            $list[]=$dt;
        }
        return $list;
     }

     function cari_barang($con,$kd_barang,$nota)
     {
         $q=mysqli_query($con,"select * from barang where kd_barang =  '$kd_barang'");
         $dt=mysqli_fetch_array($q);
         if (!empty($dt[0]))
         {
            $id=$dt['id_barang'];
            header('location:?p=transaksi&n='.$nota.'&id_barang='.$id);
         }
         else
         {
            $pesan = "Barang tidak ada...";
            header('location:?p=transaksi&n='.$nota.'&pse='.rhs($pesan));
         }
     }

     
    
     
    
}

?>