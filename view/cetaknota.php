<script>
    window.print();
    setTimeout(function(){ window.location.href='?p=transaksi&n=<?php echo $nt=$penjualan->nota($con,"","8"); ?>'; }, 3000);
</script>
<!-- <meta http-equiv="refresh" content="1;url=?p=transaksi&n=<?php //echo $nt=$penjualan->nota($con,"","8"); ?>"> -->
<style>
    .judul{
        font-size:11px;
        font-family: 'Trebuchet MS';
    }
    hr{
        border:1px dashed;
    }
    table{
        font-family: 'Trebuchet MS'; 
        font-size:11px;
    }
</style>

<?php

$a=$nota->tampilbayar($con,$_GET['nota']);
$item=$nota->hitungitem($con,$_GET['nota']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="judul">Toko 15 (Katerina Olshop)</div>
<div class="judul">JL. Ikan Wijinongko</div>
<div class="judul">Perum Harapan Indah Blok A15 Banyuwangi</div>
<div class="judul">Telp. 0896-9693-4598</div>
<hr>

<div class="judul"><?php echo $_GET['nota']; ?> &nbsp; &nbsp; <?php echo date('d/M/Y H:i',$a['time']); ?></div>
<hr>
<table style="width: 90%; ">
<tbody>
<tr>
<td>Barang</td>
<td>QTY</td>
<td style="width:5%;">Sat</td>
<td>Hrg</td>
<td>Total</td>
</tr>
    <?php
    
   
    $data=$nota->cetaknota($con,$_GET['nota']);
    foreach($data as $nt)
    {
    ?>
<tr>
    <td colspan="5"><?=$nt['nm_barang']?></td>
</tr>
<tr>
    <td></td>
    <td><?=$nt['jumlah_jual']?></td>
    <td><?=$nt['satuan']?></td>
    <td><?=rp($nt['harga_jual'])?></td>
    <td><?=rp($nt['total_harga'])?></td>
</tr>
    <?php } ?>
</tbody>
</table>
<hr>


<table style="width:80%;" class="judul">
    <tr>
        <td>JUMLAH ITEM</td>
        <td>:</td>
        <td style="text-align:right">( <?=$item[0]?> )</td>
    </tr>
    <tr>
        <td>HARGA TOTAL</td>
        <td>:</td>
        <td style="text-align:right">Rp. <?=rp($a['harga_total'])?></td>
    </tr>
    <tr>
        <td>BAYAR</td>
        <td>:</td>
        <td style="text-align:right">Rp. <?=rp($a['bayar'])?></td>
    </tr>
    <tr>
        <td>KEMBALI</td>
        <td>:</td>
        <td style="text-align:right">Rp. <?=rp($a['kembali'])?></td>
    </tr>
</table>
<hr>
<div class="judul">BARANG YANG SUDAH DI BELI TIDAK</div>
<div class="judul">DAPAT DI TUKAR / DIKEMBALIKAN</div>
<div class="judul">Terimakasih sudah berbelanja di toko kami...</div>

</body>
</html>


