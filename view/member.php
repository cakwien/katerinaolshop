    
    <section class="content-header">
      <h1>
        Data Member
        <small>List Data Member / Pelanggan</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <a class="btn btn-success" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-plus"></i> <b>Tambah Member</b></a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode Member</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>No. Hp</th>
                                <th>Opsi</th>
                                
                            </tr>
                        </thead>
                       
                        <tbody>
                        <?php
                            $no=1;
                            foreach($tampilmember as $mem)
                            {
                            ?>
                            
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$mem['kd_member']?></td>
                                <td><?=$mem['nm_member']?></td>
                                <td><?=$mem['alamat']?></td>
                                <td><?=$mem['no_hp']?></td>
                                <td><a href="?p=member&hapus=<?=$mem['id_member']?>" class="btn-sm btn-danger" data-confirm="Hapus member <?=$mem['nm_member']?> "><i class="fa fa-trash"></i> Hapus</a>
                                <a href="#" class="btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a>
                                </td>
                               
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
                <h4 class="modal-title">Tambah Data Member / Pelanggan</h4>
              </div>
              <div class="modal-body">
               
                  <div class="form-group">
                      <label>Kode Member</label>
                      <input type="text" name="kd_member" class="form-control" value="<?=$kdmember?>" readonly>
                  </div>
                   
                  <div class="form-group">
                      <label>Nama Member</label>
                      <input type="text" name="nm_member" class="form-control" required>
                  </div>
                  
                  <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" name="alamat" class="form-control">
                  </div>
                  
                  <div class="form-group">
                      <label>No Telepon</label>
                      <input type="text" name="no_hp" class="form-control">
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