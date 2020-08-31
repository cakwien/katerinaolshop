<?php 
 class penjualan
 {
     function hitungpenjualan($con)
     {
         $q=mysqli_query($con,"select count(id_pembayaran) from pembayaran");
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
         $q=mysqli_query($con,"delete from penjualan where id_penjualan = '$id_penjualan' and nota ='$nota'");
         if ($q)
         {
             $pesan="Data barang berhasil dihapus...";
             header('location:?p=transaksi&ps='.rhs($pesan));
         }else
         {
             $pesan="Data barang gagal dihapus...";
             header('location:?p=transaksi&pse='.rhs($pesan));
         }
     }
     
     function tambahbarang($con,$nota,$id_barang,$jumlah_jual,$harga_jual,$total_harga,$diskon,$time)
     {
         mysqli_query($con,"insert into penjualan value('','$nota','$id_barang','$jumlah_jual','$harga_jual','$total_harga','$diskon','$time')");
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
     
     function barang_harga($con,$id_barang)// --> id_barang, nm_barang, hrg_barang
     {
         $q=mysqli_query($con,"select pembelian.harga_jual, barang.id_barang, barang.nm_barang, barang.kd_barang from pembelian join barang on pembelian.id_barang = barang.id_barang where pembelian.id_barang = '$id_barang' order by time desc limit 1");
         $dt=mysqli_fetch_array($q);
         return $dt;
     }
     
     function harga_bayar($con,$nota)
     {
         $q=mysqli_query($con,"select sum(harga_jual) from penjualan where nota = '$nota'");
         $dt=mysqli_fetch_array($q);
         return $dt;
     }
     
     function bayar($con,$nota,$bayar,$kembali,$time)
     {
         $q=mysqli_query($con,"insert into pembayaran value('','$nota','$bayar','$kembali','$time')");
         if ($q)
         {
             $pesan="Pembayaran Berhasil...";
             header('location:?p=transaksi&ps='.rhs($pesan));
         }else
         {
             $pesan="Pembayaran Gagal...";
             header('location:?p=transaksi&pse='.rhs($pesan));
         }
     }
     
    
}

?>