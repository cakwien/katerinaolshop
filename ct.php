Laba Rugi check <br>

<?php
//sum harga beli dari semua produk (termasuk penambahan stok)
$q_sum_hargabeli = mysqli_query($con,"Select sum(harga_beli * jumlah_beli) from pembelian");
$sum_hargabeli = mysqli_fetch_array($q_sum_hargabeli);

// dislay tabel pembelian;
$q_pembelian = mysqli_query($con,"Select * from pembelian join barang on pembelian.id_barang = barang.id_barang");
$pembelian = mysqli_fetch_array($q_pembelian);

//penjualan bersih
$q_jualbersih = mysqli_query($con,"select sum(total_harga_jual) from penjualan");
$jualbersih = mysqli_fetch_array($q_jualbersih);

//harga pokok penjualan
$q_hpp = mysqli_query($con,"select sum(total_harga_beli) from penjualan");
$hpp = mysqli_fetch_array($q_hpp);

//total diskon 
$q_diskon = mysqli_query($con,"select sum(total_diskon) from penjualan");
$diskon = mysqli_fetch_array($q_diskon);

//total harga beli (stok)



?>
<table border="1" style="text-align:right;">
<tr>
<td>Penjualan Bersih</td>
<td><?=rp($jualbersih[0])?></td>
</tr>

<tr>
<td>Harga Pokok Penjualan</td>
<td><?=rp($hpp[0])?></td>
</tr>

<tr>
<td>Diskon</td>
<td><?=rp($diskon[0])?></td>
</tr>

<tr>
<td>Laba Bersih</td>
<td><?=rp($jualbersih[0] - $hpp[0] - $diskon[0])?></td>
</tr>


</table>