    
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
                    <h4 class="pull-left">Periode   </h4>
                <a class="btn btn-primary pull-right" href="?p=ct_labarugi">
                <i class="fa fa-print"></i> Cetak Laporan Laba Rugi</a>
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
    
    
    
    

</section>