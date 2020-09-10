    
    <section class="content-header">
      <h1>
        Data Stok Masuk
        <small>Database List Barang  Masuk</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> <b>Tambah Stok Barang</b></a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Jumlah Masuk</th>
                                <th>Satuan</th>
                                <th>Harga Beli</th>
                                <th>Harga Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;

                                foreach($liststokmasuk as $isi)
                                {
                                    
                            ?>
                            
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=date('d / m / Y',$isi['time'])?></td>
                                <td><?=$isi['kd_barang']?></td>
                                <td><?=$isi['nm_barang']?></td>
                                <td><?=$isi['jenis']?></td>
                                <td><?=$isi['jumlah_beli']?></td>
                                <td><?=$isi['satuan']?></td>
                                <td style="text-align:right"><?=rp($isi['harga_beli'])?></td>
                                <td style="text-align:right"><?=rp($isi['harga_beli'] * $isi['jumlah_beli'])?></td>
                            </tr>
                            
                            
                            <?php $no++; }  ?>
                           
                        </tbody>
                    
                    </table>
                
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="modal fade" id="tambahdata">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title">Tambah Data Barang</h5>
              </div>
              <form method="post" action="">
              <div class="modal-body">
                  <div class="form-group">
                      <label>Barang</label>
                      <select name="id_barang" class="form-control select2" style="width: 100%; height: 100%;">
                        <?php foreach($listbarang as $list){ ?>
                        <option value="<?=$list['id_barang']?>"><?=$list['kd_barang']?> | <?=$list['nm_barang']?></option>
                        <?php } ?>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Stok Masuk</label>
                      <input type="text" name="jumlah_beli" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <label>Harga Beli</label>
                      <input type="text" name="harga_beli" class="form-control" required>
                  </div>

                  <div class="form-group">
                      <label>Harga Jual</label>
                      <input type="text" name="harga_jual" class="form-control" required>
                  </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Stok Barang">
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>