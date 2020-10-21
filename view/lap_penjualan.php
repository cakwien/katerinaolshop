    
    <section class="content-header">
      <h1>
        Data Penjualan
        <small>Laporan data penjualan (All) </small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                Jumlah Barang yang Terjual : <a class="btn-sm btn-danger"><?=$jumlah_terjual[0]?></a>
                <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#print-lap">
                <i class="fa fa-print"></i> Cetak Laporan Penjualan</a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nota</th>
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Satuan</th>
                                <th>Harga Satuan</th>
                                <th>Diskon</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;
                                foreach($listpenjualan as $jual)
                                {
                                    $harga_satuan = $penjualan->barang_harga($con,$jual['id_barang'])
                            ?>
                            
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=date('d/m/Y',$jual['time'])?></td>
                                <td><?=$jual['nota']?></td>
                                <td><?=$jual['kd_barang']?> | <?=$jual['nm_barang']?></td>
                                <td><?=$jual['jumlah_jual']?></td>
                                <td><?=$jual['satuan']?></td>
                                <td style="text-align:right"><?=rp($jual['harga_jual'])?></td>
                                <td style="text-align:right"><?=rp($jual['diskon'])?></td>
                                <td style="text-align:right"><?=rp($jual['total_harga'])?></td>
                            </tr>
                            
                            
                            <?php $no++; }  ?>
                           
                        </tbody>
                    
                    </table>
                
                </div>
            </div>
        </div>
    </div>
    

    <div class="modal fade" id="print-lap">
          <div class="modal-dialog"> <form method="post" action="?p=ct_lap_penjualan">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cetak Laporan Penjualan</h4>
              </div>
              <div class="modal-body">
              
                
                   
                  <div class="form-group">
                      <label>Dari Tanggal :</label>
                      <input type="date" name="tgl1" class="form-control" autofocus>
                  </div>
                   
                    <div class="form-group">
                      <label>Hingga Tanggal :</label>
                      <input type="date" name="tgl2" class="form-control">
                  </div>
                 
                  
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <a href="?p=ct_lap_penjualan_all" class="btn btn-success pull-right"><i class="fa fa-print"></i> Cetak Semua</a>
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Cetak</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div></form>
          <!-- /.modal-dialog -->
        </div>

</section>