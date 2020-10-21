<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">Data User</div>
                </div>
                <form action="" method="post" >
                <div class="box-body">
                        
                            <div class="form-group">
                                <label for="nm_user">Nama Lengkap :</label>
                                <input type="text" name="nm_user" class="form-control" value="<?=$nm_user?>">
                                <input type="text" name="id_user" value="<?=$id_user?>">
                            </div>

                            <div class="form-group">
                                <label for="userame">Username :</label>
                                <input type="text" name="username" class="form-control" value="<?=$username?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="text" name="password" class="form-control" value="<?=$password?>">
                            </div>

                            <div class="form-group">
                                <label for="level">Level :</label>
                                <select name="level" class="form-control">
                                    <option value="1" <?php $sel = $level == "1" ? 'selected=selected' : ''; echo $sel; ?>>Admin</option>
                                    <option value="2" <?php $sel = $level == "2" ? 'selected=selected' : ''; echo $sel; ?>>Kasir</option>
                                </select>
                            </div>
                </div>
                <div class="box-footer">
                    <a href="?p=profil" class="btn btn-danger pull-left"><i class="fa fa-reply"></i> Kembali</a>
                    <button class="btn btn-success pull-right"><i class="fa fa-edit"></i> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>