<script>
    window.print();
</script>
<style>
    table.minimalistBlack {
    font-family: Arial, Helvetica, sans-serif;
    border: 0px solid #000000;
    width: 60%;
    height: 20%;
    margin-left: auto;
     margin-right: auto;
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
    h3,h4{
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
    .judul{
        font-size:15px;
        text-align: center;
        font-family: 'Trebuchet MS';
    }
    .sub{
        font-size:20px;
    }
</style>


<h3>LAPORAN LABA RUGI</h3>
<div class="judul sub">Toko 15 (Katerina Olshop)</div>
<div class="judul">JL. Ikan Wijinongko</div>
<div class="judul">Perum Harapan Indah Blok A15 Banyuwangi</div>
<div class="judul">Telp. 0896-9693-4598</div>
<br>
<?php 
    if (!empty($_GET['tgl1']) && !empty($_GET['tgl2']))
    {
        
?>

<div class="judul sub">Periode : <?=tglindo(date('Y-m-d',$tgl1))?> - <?=tglindo(date('Y-m-d',$tgl2))?></div>

    <?php } ?>
<br>
<table class="minimalistBlack">
<thead>
<tr>
    <th>Keterangan</th>
    <th>Jumlah (Rp.)</th>
   
</tr>
</thead>
<tfoot>
<tr>
<td  style="text-align:right">Total</td>
<td style="text-align:right"><?=rp($laba_bersih)?></td>
</tr>
</tfoot>
<tbody>

    <tr>
        <td>Penjualan Bersih</td>
        <td style="text-align:right"><?=rp($jual_bersih[0])?></td>
    </tr>

    <tr>
        <td>Harga Pokok Penjualan</td>
        <td style="text-align:right"><?=rp($hpp[0])?></td>
    </tr>

    <tr>
        <td>Total Diskon Penjualan</td>
        <td style="text-align:right"><?=rp($diskon[0])?></td>
    </tr>

</tbody>
</tr>
</table>