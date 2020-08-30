<?php 
 class penjualan
 {
     function hitungpenjualan($con)
     {
         $q=mysqli_query($con,"select count(id_pembayaran) from pembayaran");
         $dt=mysqli_fetch_array($q);
         return $dt;
     }
 }

?>