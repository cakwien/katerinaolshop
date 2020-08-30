    
    <section class="content-header">
      <h1>
        Data Barang
        <small>Database List Barang </small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                Jumlah Data Barang : <a class="btn-sm btn-danger"><?=$jml_barang[0]?></a>
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> <b>Tambah Barang</b></a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Harga Beli</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no=1;
                                foreach($listbarang as $brg)
                                {
                                    $stok_harga=$stok->stok_harga($con,$brg['id_barang']);
                            ?>
                            
                            <tr>
                                <td><?=$no;?></td>
                                <td><?=$brg['kd_barang']?></td>
                                <td><?=$brg['nm_barang']?></td>
                                <td><?=$brg['jenis']?></td>
                                <td><?=$stok_harga['harga_beli']?></td>
                                <td><?=$stok_harga['harga_jual']?></td>
                                <td><?=$brg['stok_akhir']?></td>
                                <td><?=$brg['satuan']?></td>
                                <td>
                                
                                    <div class="dropdown">
                                       <a title="Hapus Barang" class="btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                       <a title="Tambah Stok" class="btn-sm btn-success"><i class="fa fa-plus"></i></a>
                                       <a title="Edit Barang" class="btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    </div>
                                
                                </td>
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
                      <label>Kode Barang</label>
                      <input type="text" name="kd_barang" class="form-control">
                  </div>
                 <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Jenis</label>
                      <select name="id_jenis" class="form-control" style="width: 100%;">
                          <?php foreach ($listjenis as $jenis){ ?>
                          <option value="<?=$jenis['id_jenis']?>"><?=$jenis['jenis']?></option>
                          <?php } ?>
                      </select>
                  </div>
                   <div class="form-group">
                      <label>Satuan</label>
                      <select name="satuan" class="form-control" style="width: 100%;">
                          <option value="PCS">PCS</option>
                          <option value="BOX">BOX</option>
                          <option value="KODI">KODI</option>
                          <option value="LUSIN">LUSIN</option>
                          <option value="PSG">PSG</option>
                      </select>
                  </div>
                   <div class="form-group">
                      <label>Stok Awal</label>
                      <input type="text" name="stok_awal" class="form-control">
                  </div>
                   <div class="form-group">
                      <label>Harga Beli</label>
                      <input type="text" name="harga_beli" class="form-control">
                  </div>
                   <div class="form-group">
                      <label>Harga Jual</label>
                      <input type="text" name="harga_jual" class="form-control">
                  </div>
                
                  
             
                   
                  
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <input class="btn btn-primary" type="submit" name="simpan" value="Simpan Barang">
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>