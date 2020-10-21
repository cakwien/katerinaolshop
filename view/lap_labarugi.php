    
    <section class="content-header">
      <h1>
        Laporan Laba Rugi
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="pull-left">Periode : <?=$periode?> &nbsp;   </h4>


               
                    <a class="btn btn-primary pull-right" href="?p=ct_labarugi_periode&tgl1=<?=$tgl1?>&tgl2=<?=$tgl2?>">
                    <i class="fa fa-print"></i> Cetak Laporan Laba Rugi</a> &nbsp;
                    
                    <a class="btn btn-success pull-right" data-toggle="modal" data-target="#periode">
                    <i class="fa fa-edit" ></i> Ganti Periode</a>
                </div>
                
                <div class="box-body">
                
                   <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Keterangan</th>
                                <th style="width:30%;">Jumlah</th>
                                
                            </tr>
                        </thead>
                       
                        <tbody>
                        
                            <tr>
                                <td></td>
                                <td>Penjualan Bersih</td>
                                <td><span class="pull-left">Rp.</span> <span class="pull-right"><?=rp($jual_bersih[0])?></span></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>Harga Pokok Penjualan</td>
                                <td><span class="pull-left">Rp.</span> <span class="pull-right"><?=rp($hpp[0])?></span></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>Diskon Penjualan</td>
                                <td><span class="pull-left">Rp.</span>  <span class="pull-right"><?=rp($diskon[0])?></span></td>
                            </tr>

                            

                        </tbody>

                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Laba Bersih</th>
                                <th><strong><span class="pull-left">Rp.</span> <span class="pull-right"><?=rp($laba_bersih)?></span></strong></th>
                            </tr>
                        </tfoot>
                    
                    </table>
                
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="periode">
          <div class="modal-dialog"> <form method="post" action="?p=laplabarugi">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Periode Penjualan</h4>
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
                <a href="?p=laplabarugi" class="btn btn-success pull-right"><i class="fa fa-print"></i> Lihat Semua Data</a>
               <input type="submit" name="do" value="Load Data" class="btn btn-primary pull-right">
              </div>
            </div>
            <!-- /.modal-content -->
          </div></form>
          <!-- /.modal-dialog -->
        </div>
    

</section>