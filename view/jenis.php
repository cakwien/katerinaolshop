    
    <section class="content-header">
      <h1>
        Data Jenis Barang
        <small>List Jenis Barang</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <a class="btn btn-success" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> <b>Tambah Jenis</b></a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jenis Barang</th>
                                <th>Opsi</th>
                                
                            </tr>
                        </thead>
                       
                        <tbody>
                        <?php
                            $no=1;
                            foreach($listjenis as $j)
                            {
                            ?>
                            
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$j['jenis']?></td>
                                <td><a href="?p=jenis&hapus=<?=$j['id_jenis']?>" class="btn-sm btn-danger" data-confirm="Hapus Jenis <?=$j['jenis']?> ?"><i class="fa fa-trash"></i> Hapus</a></td>
                               
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
           <form method="post" action="">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Jenis Barang</h4>
              </div>
              <div class="modal-body">
               
                
                   
                  <div class="form-group">
                      <label>Jenis Barang</label>
                      <input type="text" name="jenis" class="form-control">
                  </div>
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <input type="submit" name="simpan" value="Tambah" class="btn btn-primary">
              </div>
            </div> </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>