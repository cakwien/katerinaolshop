    
    <section class="content-header">
      <h1>
        Supplier
        <small>Data Pihak Supplier Barang </small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                Jumlah Supplier : <a class="btn-sm btn-danger"><?=$jum_sup[0]?></a>
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> <b>Tambah Supplier</b></a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Supplier</th>
                                <th>Alamat</th>
                                <th>No Telp</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=1;
                            foreach($tampilsupplier as $sup){
                            ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$sup['nm_supplier']?></td>
                                <td><?=$sup['alamat']?></td>
                                <td><?=$sup['no_hp']?></td>
                                <td><a href="?p=supplier&hapus=<?=$sup['id_supplier']?>" class="btn-sm btn-danger" data-confirm="Hapus <?=$sup['nm_supplier'] ?>"><i class="fa fa-trash"></i> Hapus</a></td>
                            </tr>
                           <?php $no++; } ?>
                        </tbody>
                    
                    </table>
                
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="modal fade" id="tambahdata">
          <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="">
                
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Supplier</h4>
              </div>
              <div class="modal-body">
               
                
                  <div class="form-group">
                      <label>Nama Supplier</label>
                      <input type="text" name="nm_supplier" class="form-control" required>
                  </div>
                 <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control">
                  </div>
                <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="text" name="no_hp" class="form-control">
                  </div>
                  
                  
            
                   
                  
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
              </div>  </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>