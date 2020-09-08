<script>
    window.print();
</script>
<meta http-equiv="refresh" content="1;url=?p=lapjual">


<?php
    $tgl1 = strtotime($_POST['tgl1']);
    $tgl2 = strtotime($_POST['tgl2']) + 86364;
?>
<style>
    table.minimalistBlack {
    font-family: Arial, Helvetica, sans-serif;
    border: 0px solid #000000;
    width: 100%;
    text-align: left;
    border-collapse: collapse;
    }
    table.minimalistBlack td, table.minimalistBlack th {
    border: 1px solid #000000;
    padding: 3px 3px;
    }
    table.minimalistBlack tbody td {
    font-size: 13px;
    }
    table.minimalistBlack thead {
    background: #CFCFCF;
    border-bottom: 1px solid #000000;
    }
    table.minimalistBlack thead th {
    font-size: 13px;
    font-weight: bold;
    color: #000000;
    text-align: center;
    }
    table.minimalistBlack tfoot {
    font-size: 13px;
    font-weight: bold;
    color: #000000;
    background: #CFCFCF;
    border-top: 0px solid #000000;
    }
    table.minimalistBlack tfoot td {
    font-size: 13px;
    }
    h3{
        text-align:center;
        font-family: Arial, Helvetica, sans-serif;
    }
    .jenis{
        text-align : left;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
    }
    .tanggal{
        text-align : center;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
    }
</style>


<h3>LAPORAN PENJUALAN BARANG (PER ITEM)</h3>

<?php 
    if ($_POST['tgl1'] == $_POST['tgl2'])
    {
        ?>
        <div class="tanggal">Tanggal : <?=date('d-M-Y',$tgl1)?></div>
    <?php } else { ?>

    <div class="tanggal">Tanggal : <?=date('d-M-Y',$tgl1)?> s/d <?=date('d-M-Y',$tgl2)?></div>

    <?php } ?>
    




<?php
    $q=mysqli_query($con,"select jenis.id_jenis, jenis.jenis from penjualan join barang on penjualan.id_barang = barang.id_barang join jenis on barang.id_jenis = jenis.id_jenis group by jenis.id_jenis");
    while($jenis=mysqli_fetch_array($q)){
?>

<div class="jenis">Jenis : <?=$jenis['jenis']?></div>
<table class="minimalistBlack">
<thead>
<tr>
    <th style="width : 30%">Nama Barang</th>
    <th style="width : 5%">Unit</th>
    <th style="width : 5%">Terjual</th>
    <th style="width : 10%">Harga Jual</th>
    <th style="width : 10%">Harga Pokok</th>
    <th style="width : 10%">Diskon</th>
    <th style="width : 10%">Laba / Rugi</th>
</tr>
</thead>




<tbody>
<?php 
    $param_jenis = $jenis['id_jenis'];
    $qbarang = mysqli_query($con,"select penjualan.id_penjualan, penjualan.time, barang.kd_barang, barang.nm_barang, barang.id_barang, penjualan.jumlah_jual, barang.satuan, penjualan.harga_jual, pembelian.harga_beli, penjualan.total_harga, penjualan.diskon from penjualan join barang on penjualan.id_barang = barang.id_barang join pembelian on penjualan.id_barang = pembelian.id_barang where barang.id_jenis = '$param_jenis' and penjualan.time between '$tgl1' and '$tgl2' group by penjualan.id_barang");
    while($br_jual = mysqli_fetch_array($qbarang)){
        //jumlah terjual  per item
        $id_barang = $br_jual['id_barang'];
        $id_penjualan = $br_jual['id_penjualan'];
        $q_jumlah_jual = mysqli_query($con,"select sum(jumlah_jual) from penjualan where id_barang = '$id_barang' and time between '$tgl1' and '$tgl2'");
        $jumlah_jual=mysqli_fetch_array($q_jumlah_jual);
        
        //diskon per item
        $q_diskon=mysqli_query($con,"select sum(total_diskon) from penjualan where id_barang = '$id_barang' and time between '$tgl1' and '$tgl2'");
        $dis = mysqli_fetch_array($q_diskon);

        //total harga jual per item
        $hrg_jual = $br_jual['harga_jual'] * $jumlah_jual[0];

        //total harga pokok per item
        $hrg_pokok = $br_jual['harga_beli'] * $jumlah_jual[0];

        //laba rugi per item
        $laba_rugi = ($hrg_jual - $hrg_pokok) - ($dis[0]);

?>
    <tr>
       
        <td><?=$br_jual['kd_barang']?> | <?=$br_jual['nm_barang']?></td>
        <td style="text-align:center"><?=strtolower($br_jual['satuan'])?></td>
        <td style="text-align:center"><?=$jumlah_jual[0]?></td>
        <td style="text-align:right"><?=rp($a=$br_jual['harga_jual'] * $jumlah_jual[0])?></td>
        <td style="text-align:right"><?=rp($b=$br_jual['harga_beli'] * $jumlah_jual[0])?></td>
        <td style="text-align:right"><?=rp($dis[0])?></td>
        <td style="text-align:right"><?=rp($laba_rugi)?></td>
        
    </tr>
    <?php } ?>
</tbody>

<?php

//subtotal per jenis
//------------------------------------------
// subtotal harga jual per jenis
$st_qharga_jual = mysqli_query($con,"select sum(total_harga_jual) from penjualan join barang on penjualan.id_barang = barang.id_barang where barang.id_jenis = '$param_jenis' and penjualan.time between '$tgl1' and '$tgl2'");
$st_harga_jual = mysqli_fetch_array($st_qharga_jual);

// subtotal harga pokok per jenis
$st_qharga_beli = mysqli_query($con,"select sum(total_harga_beli) from penjualan join barang on penjualan.id_barang = barang.id_barang where barang.id_jenis = '$param_jenis' and penjualan.time between '$tgl1' and '$tgl2'");
$st_harga_beli = mysqli_fetch_array($st_qharga_beli);

// subtotal diskon per jenis
$st_qdiskon = mysqli_query($con,"select sum(total_diskon) from penjualan join barang on penjualan.id_barang = barang.id_barang where barang.id_jenis = '$param_jenis' and penjualan.time between '$tgl1' and '$tgl2'");
$st_diskon = mysqli_fetch_array($st_qdiskon);

// subtotal laba rugi per jenis
$st_laba_rugi = $st_harga_jual[0] - $st_harga_beli[0] - $st_diskon[0];

// subtotal jumlah barang terjual
$st_qterjual = mysqli_query($con,"select sum(jumlah_jual) from penjualan join barang on penjualan.id_barang = barang.id_barang where barang.id_jenis = '$param_jenis' and penjualan.time between '$tgl1' and '$tgl2'");
$st_terjual = mysqli_fetch_array($st_qterjual);

?>



<tfoot>
<tr>
    <td colspan="2" style="text-align:right">SUB TOTAL</td>
    <td style="text-align:center;"><?=$st_terjual[0]?></td>
    <td style="width : 10%; text-align:right;"><?=rp($st_harga_jual[0])?></td>
    <td style="width : 10%; text-align:right;"><?=rp($st_harga_beli[0])?></td>
    <td style="width : 10%; text-align:right;"><?=rp($st_diskon[0])?></td>
    <td style="width : 10%; text-align:right;"><?=rp($st_laba_rugi)?></td>
</tr>
</tfoot>


</table>
<br>
    <?php } 

        //Grand total
        //-----------------------------------------------
        //total barang terjual
        $q_terjual= mysqli_query($con,"select sum(jumlah_jual) from penjualan where penjualan.time between '$tgl1' and '$tgl2'");
        $total_terjual = mysqli_fetch_array($q_terjual);

        //total harga jual
        $q_harga_jual = mysqli_query($con,"select sum(total_harga) from penjualan where time between '$tgl1' and '$tgl2'");
        $total_harga = mysqli_fetch_array($q_harga_jual);

        //total harga beli
        $q_harga_beli = mysqli_query($con,"select sum(total_harga_beli) from penjualan where time between '$tgl1' and '$tgl2'");
        $total_harga_beli = mysqli_fetch_array($q_harga_beli);

        //total diskon
        $q_total_diskon = mysqli_query($con,"select sum(total_diskon) from penjualan where time between '$tgl1' and '$tgl2' ");
        $total_diskon = mysqli_fetch_array($q_total_diskon);

        //total laba rugi

        $total_laba_rugi = $total_harga[0] - $total_harga_beli[0]; 



?>


<table class="minimalistBlack">
<thead>
<tr>
    <th style="width : 35%;text-align:right;">TOTAL</th>
    <th style="width : 5%;"><?=$total_terjual[0]?></th>
    <th style="width : 10% ; text-align:right"><?=rp($total_harga[0])?></th>
    <th style="width : 10%; text-align:right;"><?=rp($total_harga_beli[0])?></th>
    <th style="width : 10%; text-align:right;"><?=rp($total_diskon[0])?></th>
    <th style="width : 10%; text-align:right;"><?=rp($total_laba_rugi)?></th>
</tr>
</thead>

</table>


<p>
<?php echo date('d/m/Y H:i', time()); ?>