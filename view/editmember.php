<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">Data Mmeber</div>
                </div>
                <form action="" method="post" >
                <div class="box-body">
                        
                            <div class="form-group">
                                <label for="nm_user">Kode :</label>
                                <input type="text" name="kd_member" class="form-control" value="<?=$kd_member?>" readonly>
                                <input type="hidden" name="id_member" value=<?=$id_member?>>
                            </div>

                            <div class="form-group">
                                <label for="userame">Nama Member :</label>
                                <input type="text" name="nm_member" class="form-control" value="<?=$nm_member?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Alamat :</label>
                                <input type="text" name="alamat" class="form-control" value="<?=$alamat?>">
                            </div>

                            <div class="form-group">
                                <label for="password">No Hp :</label>
                                <input type="text" name="no_hp" class="form-control" value="<?=$no_hp?>">
                            </div>

                            
                </div>
                <div class="box-footer">
                    <a href="?p=member" class="btn btn-danger pull-left"><i class="fa fa-reply"></i> Kembali</a>
                    <button class="btn btn-primary pull-right"><i class="fa fa-edit"></i> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>