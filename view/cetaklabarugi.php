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
</style>


<h3>LAPORAN LABA RUGI</h3>
<h4>TOKO 51</h4>
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