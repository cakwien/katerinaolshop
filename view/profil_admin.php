    
    <section class="content-header">
      <h1>
        Data User
        <small>List Data User / Kasir</small>
      </h1>
    </section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                <a class="btn btn-success" data-toggle="modal" data-target="#tambahdata">
                <i class="fa fa-user-plus"></i> <b>Tambah User</b></a>
                </div>
                
                <div class="box-body">
                
                   <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Opsi</th>
                                
                            </tr>
                        </thead>
                       
                        <tbody>
                        <?php
                            $no=1;
                            foreach($listuser as $mem)
                            {
                            ?>
                            
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$mem['nm_user']?></td>
                                <td><?=$mem['username']?></td>
                                <td><?=$mem['password']?></td>
                                <td><?=$mem['level']?></td>
                                <td>
                                <a href="?p=profil&hapus=<?=$mem['id_user']?>" class="btn-sm btn-danger" data-confirm="Hapus user <?=$mem['nm_user']?> "><i class="fa fa-trash"></i> Hapus</a>
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
                <h4 class="modal-title">Tambah Data User</h4>
              </div>
              <div class="modal-body">
               
                  <div class="form-group">
                      <label>Nama Lengkap User</label>
                      <input type="text" name="nm_user" class="form-control" value="" required>
                  </div>
                   
                  <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" required>
                  </div>
                  
                  <div class="form-group">
                      <label>Password</label>
                      <input type="text" name="password" class="form-control">
                  </div>
                  
                  <div class="form-group">
                     <label><input name="tipe[]" value="1" type="radio" required> Admin </label><br>
                     <label><input name="tipe[]" value="2" type="radio" required> Kasir </label>
                  </div>
                  
                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-user-plus"></i> Tambah User</button>
              </div>
            </div> </form>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>