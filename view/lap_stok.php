    
    <section class="content-header">
      <h1>
       Laporan Stok Barang
        <small>Laporan data stok barang (update transaksi terakhir)</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <a class="btn btn-primary pull-right" href="?p=ct_lapstok">
                <i class="fa fa-print"></i> Cetak Laporan Stok</a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Jenis Barang</th>
                                <th>Stok Masuk</th>
                                <th>Stok Keluar</th>
                                <th>Stok Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;

                                foreach($list_stok_barang as $isi)
                                {
                                    
                            ?>
                            
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$isi['kd_barang']?></td>
                                <td><?=$isi['nm_barang']?></td>
                                <td><?=$isi['satuan']?></td>
                                <td><?=$isi['jenis']?></td>
                                <td><?=$isi['stok_masuk']?></td>
                                <td><?=$isi['stok_keluar']?></td>
                                <td><?=$isi['stok_akhir']?></td>
                            </tr>
                            
                            
                            <?php $no++; }  ?>
                           
                        </tbody>
                    
                    </table>
                
                </div>
            </div>
        </div>
    </div>
    
    
    
    
  

</section>