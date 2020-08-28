    
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
                Jumlah Barang : <a class="btn-xs btn-danger">xxx</a> Pcs.
                <a class="btn btn-success pull-right" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> <b>Tambah Barang</b></a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Jenis Barang</th>
                                <th>Supplier</th>
                                <th>Stok</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Tas Branded</td>
                                <td>Tas</td>
                                <td>PT TAS</td>
                                <td>20</td>
                                <td>
                                
                                    <div class="dropdown">
                                        <a href="#" class="btn-sm btn-danger dropdown-toggle" data-toggle="dropdown"><span class="fa fa-caret-square-o-down"></span> Opsi</a>
                                        <ul class="dropdown-menu">

                                            <li role="presentation"><a role="menuitem" data-toggle="modal" data-target="#stok" tabindex="-1" href="#" ><i class="fa fa-edit"></i>Edit Barang</a></li>
                                            
                                            <li role="presentation"><a role="menuitem" data-toggle="modal" data-target="#stok" tabindex="-1" href="#" ><i class="fa fa-cubes"></i>Tambah Stok</a></li>
                                            
                                            <li role="presentation"><a role="menuitem" data-toggle="modal" data-target="#stok" tabindex="-1" href="#" ><i class="fa fa-trash"></i>Hapus Barang</a></li>
                                            
                                        

                                        </ul>
                                    </div>
                                
                                </td>
                            </tr>
                           
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
                <h4 class="modal-title">Tambah Data Barang</h4>
              </div>
                <form method="post" action="">
              <div class="modal-body">
               
                
                  <div class="form-group">
                      <label>Kode Barang</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                 <div class="form-group">
                      <label>Nama Barang</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Jenis</label>
                      <select class="form-control" style="width: 100%;">
                          <option>Jenis 1</option>
                          <option>Jenis 2</option>
                          <option>Jenis 3</option>
                      </select>
                  </div>
                    <div class="form-group">
                      <label>Supplier</label>
                      <select class="form-control select2" style="width: 100%;">
                          <option>Jenis 1</option>
                          <option>Jenis 2</option>
                          <option>Jenis 3</option>
                      </select>
                  </div>
                   <div class="form-group">
                      <label>Harga Beli</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                   <div class="form-group">
                      <label>Harga Jual</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                <div class="form-group">
                      <label>Harga Jual Member</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                <div class="form-group">
                      <label>Discont</label>
                      <input type="text" name="nm_barang" class="form-control">
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