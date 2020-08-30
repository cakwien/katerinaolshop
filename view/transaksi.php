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
                  <label class="col-sm-3 control-label">Barang</label>

                  <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cari"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Barang</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                  
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah</label>

                  <div class="col-sm-2">
                    <input type="text" class="form-control" placeholder="...">
                  </div>
                </div>
                  
                  
                  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-success pull-right">Tambahkan</button>
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
                    <input type="text" class="form-control" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                  
                  <div class="form-group">
                  <label class="col-sm-3 control-label">Tanggal - Jam</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                  
                   <div class="form-group">
                  <label class="col-sm-3 control-label">Kasir</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" placeholder="Nama Barang" readonly>
                  </div>
                </div>
                  
              </div>
              <!-- /.box-body -->
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
        
        
        
        
        
        
        
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-header">
                    <div class="box-title">No. Nota</div>
                </div>
                
                <div class="box-body">
                     <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jenis</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>#</th>
                            </tr> 
                        </thead>
                         <tbody>
                            <tr>
                                <td></td> 
                                <td></td> 
                                <td></td> 
                                <td></td> 
                                <td><a class="btn-xs btn-danger"><i class="fa fa-trash"></i> Batal</a></td> 
                            </tr>
                         </tbody>
                         <tfoot>
                            <tr>
                                <td colspan="3" style="width:70%"><h5 class="pull-right"><strong>Total</strong></h5></td>
                                <td><input class="form-control pull-right" readonly></td> 
                                <td><a data-toggle="modal" data-target="#bayar" class="btn btn-danger">Bayar</a></td> 
                                
                            </tr>
                         </tfoot>
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
                        <input type="text" name="total_harga" readonly class="form-control">
                    </div> 
                     
                     <div class="form-group">
                        <label>Bayar :</label>
                        <input type="text" name="total_harga" class="form-control">
                    </div> 
                     
                 
                 
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Batal</button>
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
                        <th>Nama Barang</th>  
                        <th>Jenis</th>  
                        <th>Harga</th>  
                      </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>    
                        <td></td>    
                        <td></td>    
                    </tr>  
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