<script>
    window.print();
</script>
<meta http-equiv="refresh" content="1;url=?p=lapstok">

<style>
  
  table.laporan {
  border: 1px solid #000000;
  font-family: "Trebuchet MS", Helvetica, sans-serif;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.laporan td, table.laporan th {
  border: 1px solid #000000;
  padding: 5px 4px;
}
table.laporan tbody td {
  font-size: 12px;
}
table.laporan thead {
  background: #CFCFCF;
  background: -moz-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: -webkit-linear-gradient(top, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  background: linear-gradient(to bottom, #dbdbdb 0%, #d3d3d3 66%, #CFCFCF 100%);
  border-bottom: 1px solid #000000;
}
table.laporan thead th {
  font-size: 12px;
  font-weight: bold;
  color: #000000;
  text-align: center;
}
table.laporan tfoot {
  font-size: 12px;
  font-weight: bold;
  color: #000000;
  border-top: 1px solid #000000;
  background: #CFCFCF;
}
table.laporan tfoot td {
  font-size: 12px;
}
h3{
        text-align:center;
        font-family: Arial, Helvetica, sans-serif;
    }
    .sub{
        text-align : left;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
    }

</style>


<h3>LAPORAN STOK BARANG</h3>

<div class="sub">Update : <?=date('d - M - Y',time())?></div>
<table class="laporan">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Kode</th>
            <th rowspan="2">Nama Barang</th>
            <th rowspan="2">Jenis Barang</th>
            <th rowspan="2">Satuan</th>
            <th rowspan="2">Stok Awal</th>
            <th colspan="2">Mutasi</th>
            <th rowspan="2">Stok Akhir</th>
        </tr>
        <tr>
            <th>Stok Masuk</th>
            <th>Stok Keluar</th>
        </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach ($list_stok_barang as $isi){ ?>
        <tr>
            <td style="text-align:center;"><?=$no?></td>
            <td><?=$isi['kd_barang']?></td>
            <td><?=$isi['nm_barang']?></td>
            <td><?=$isi['jenis']?></td>
            <td style="text-align:center;"><?=$isi['satuan']?></td>
            <td style="text-align:center;"><?=$isi['stok_awal']?></td>
            <td style="text-align:center;"><?=$isi['stok_masuk']?></td>
            <td style="text-align:center;"><?=$isi['stok_keluar']?></td>
            <td style="text-align:center;"><?=$isi['stok_akhir']?></td>
        </tr>
    <?php $no++; } ?>
    </tbody>
    <?php
    //TOTAL----------------------------
    //total stok awal
    $qt_st_awal = mysqli_query($con,"select sum(stok_awal) as jum_st_awal, sum(stok_masuk) as jum_st_masuk, sum(stok_keluar) as jum_st_keluar, sum(stok_akhir) as jum_st_akhir from barang");
    $st_awal = mysqli_fetch_array($qt_st_awal);
    ?>


    <tfoot>
        <tr>
            <td colspan="5" style="text-align:right;">Total</td>
            <td style="text-align:center;"><?=$st_awal['jum_st_awal']?></td>
            <td style="text-align:center;"><?=$st_awal['jum_st_masuk']?></td>
            <td style="text-align:center;"><?=$st_awal['jum_st_keluar']?></td>
            <td style="text-align:center;"><?=$st_awal['jum_st_akhir']?></td>
        </tr>
    </tfoot>
</table>