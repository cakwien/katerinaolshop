<section class="content">
    <div class="row">
      
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Kode Barang</label>

                  <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" name="cari_kd" value="<?php if(!empty($show_brg['kd_barang'])){echo $show_brg['kd_barang'];} else {echo "";} ?>" class="form-control" autofocus>
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cari"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
                </form>

          <form class="form-horizontal" method="post" action="">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Barang</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Nama Barang" value="<?php if(!empty($show_brg['nm_barang'])){echo $show_brg['nm_barang'];} else {echo "";} ?>" readonly name="nm_barang">
                      <input type="hidden" name="id_barang" value="<?php if(!empty($show_brg['id_barang'])){echo $show_brg['id_barang'];} else {echo "";} ?>">
                      <input type="hidden" name="nota" value="<?php if(!empty($_GET['n'])){echo $_GET['n'];} else {echo "";} ?>">
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Harga Jual</label>

                  <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Nama Barang" readonly name="harga_jual" value="<?php if(!empty($show_brg['harga_jual'])){echo $show_brg['harga_jual'];} else {echo "";} ?>">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah <a class="btn-sm btn-danger"><?php if(!empty($show_brg['stok_akhir'])){echo $show_brg['stok_akhir'];} else {echo "";} ?></a></label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="..." name="jumlah_jual" required autofocus>
                  </div>
                    
                     <label class="col-sm-2 control-label">Diskon</label>
                    
                    <div class="col-sm-4">
                        
                    <input type="text" class="form-control" placeholder="Diskon" name="diskon">
                  </div>
                </div>
                  
                  
                  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" name="tambah" class="btn btn-success pull-right"><i class="fa fa-cart-arrow-down"></i> Tambahkan</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        
        <!--BOX KANAN -->
         <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nota</label>

                  <div class="col-sm-6">
                    <input type="text" name="nota" value="<?php echo $nt=$penjualan->nota($con,"","8");?>" class="form-control" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                  
                   <div class="form-group">
                  <label class="col-sm-3 control-label">Kasir</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Nama Barang" value="<?php $kasir = $induk->useraktif($con,$user); echo $kasir[0];?>" readonly>
                  </div>
                </div>
                  
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
            </form>
          </div>
        </div>

        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-danger">
          <div class="box-body">
          <label>Total Harga :</label>
            <table style="width:100%;">
              <tr>
                <td style="text-align: right"><h1><b>Rp. </b></h1></td>
                <td style="text-align:right;"> <h1><b><?php $t=$penjualan->harga_bayar($con,$_GET['n']); echo rp($t[0]);?></b></h1> </td>
                <?php 
                                  $notaq=$_GET['n'];
                                  $q=mysqli_query($con,"select id_penjualan from penjualan where nota = '$notaq'");
                                  $qb=mysqli_fetch_array($q);
                                  if (!empty($qb[0]))
                                  {
                                ?>
                <td style="width:20%; text-align:center;"><button data-toggle="modal" data-target="#bayar" class="btn-lg btn-danger"><i class="fa fa-money"></i> Bayar</button></td>
                                  <?php } ?>
              </tr>
            </table>
          </div>
          </div>
        </div>
        
        
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">
                     <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Satuan</th>
                                <th>Diskon</th>
                                <th>Harga Satuan</th>
                                <th>Total Harga</th>
                                <th>#</th>
                            </tr> 
                        </thead>
                         <tbody>
                             <?php 
                             $tampil_pembelian=$penjualan->tampilbarang($con,$_GET['n']);
                             foreach($tampil_pembelian as $isi){
                             ?>
                            <tr>
                                <td><?=$isi['nm_barang']?></td> 
                                <td><?=$isi['jumlah_jual']?></td> 
                                <td><?=$isi['satuan']?></td> 
                                <td style="text-align:right"><?=rp($isi['diskon'])?></td> 
                                <td style="text-align:right"><?=rp($isi['harga_jual'])?></td> 
                                <td style="text-align:right"><?=rp($isi['total_harga'])?></td> 
                                <td><a data-confirm="Hapus Barang <?=$isi['nm_barang']?> ?" href="?p=transaksi&n=<?=$isi['nota']?>&batal=<?=$isi['id_penjualan']?>&id=<?=$isi['id_barang']?>&jk=<?=$isi['jumlah_jual']?>" class="btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                            </tr>
                             <?php } ?>
                        
                         </tbody>
                         
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    
     <div class="modal fade" id="bayar"> 
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pembayaran</h4>
              </div>
                 <form method="post" action="">
              <div class="modal-body">
             
                
                    <div class="form-group">
                        <label>Total Harga :</label>
                        <input type="text" name="tptotal_harga" readonly class="form-control" value="<?php $t=$penjualan->harga_bayar($con,$_GET['n']); echo rp($t[0]);?>">
                        <input type="hidden" name="total_harga" readonly class="form-control" value="<?php $t=$penjualan->harga_bayar($con,$_GET['n']); echo $t[0];?>">
                    </div> 
                     
                     <div class="form-group">
                        <label>Bayar :</label>
                        <input type="hidden" name="nota" class="form-control" value="<?=$_GET['n']?>">
                        <input type="text" name="bayar" class="form-control" value="<?php $t=$penjualan->harga_bayar($con,$_GET['n']); echo $t[0];?>" autofocus>
                    </div> 
              </div>
              <div class="modal-footer">
                    
                   <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>&nbsp;
                  <input name="pay" value="Bayar" class="btn btn-primary" type="submit">
                  
               </div></form> 
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    
         <div class="modal fade" id="cari"> 
          <div class="modal-dialog" style="width:90%">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cari Barang</h4>
              </div>
              <div class="modal-body">
             
                  
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Kode Barang</th>  
                        <th>Nama Barang</th>  
                        <th>Jenis</th>  
                        <th>Stok</th>  
                        <th>Harga</th>  
                      </tr>
                    </thead>
                    <tbody>
                     <?php 
                        $not = $nt=$penjualan->nota($con,"","8");
                        $listbarang = $barang->tampil($con);
                        foreach($listbarang as $brg){
                            $stok_harga=$stok->stok_harga($con,$brg['id_barang']);
                        ?>
                    <tr>
                        <td><?=$brg['kd_barang']?></td>    
                        <td><a href="?p=transaksi&n=<?=$not?>&id_barang=<?=$brg['id_barang']?>"><?=$brg['nm_barang']?></a></td>    
                        <td><?=$brg['jenis']?></td>    
                        <td><?=$brg['stok_akhir']?></td>    
                        <td><?=$stok_harga['harga_jual']?></td>    
                          
                    </tr>  
                       <?php } ?>
                    </tbody>
                  </table>
                  
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    
    
    
    
    
    
</section>