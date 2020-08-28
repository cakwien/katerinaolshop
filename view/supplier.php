    
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
                Jumlah Supplier : <a class="btn-xs btn-danger">xxx</a> Supp.
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
                            <tr>
                                <td>1</td>
                                <td>Tas Branded</td>
                                <td>Tas</td>
                                <td>PT TAS</td>
                                <td>20</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Tas Branded</td>
                                <td>Tas</td>
                                <td>PT TAS</td>
                                <td>20</td>
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
                <h4 class="modal-title">Tambah Data Supplier</h4>
              </div>
              <div class="modal-body">
               <form>
                
                  <div class="form-group">
                      <label>Nama Supplier</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                 <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                <div class="form-group">
                      <label>No. Telepon</label>
                      <input type="text" name="nm_barang" class="form-control">
                  </div>
                  
                  
              </form>
                   
                  
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Tambah</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>