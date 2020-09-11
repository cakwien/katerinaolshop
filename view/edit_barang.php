<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-header">
                        <div class="box-title">
                            Edit Data Barang
                        </div>
                    </div>  
                    <form method="post" action="">
                    <div class="box-body">
                       
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" name="kd_barang" class="form-control" value="<?=$kd_barang?>">
                                <input type="hidden" name="id_barang" value="<?=$id_barang?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="nm_barang" class="form-control" value="<?=$nm_barang?>">
                            </div>

                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="id_jenis" class="form-control">
                                <?php foreach ($listjenis as $j){ ?>
                                    <option value="<?=$j['id_jenis']?>" <?php if($id_jenis == $j['id_jenis']){echo "selected=selected";} else { echo ""; } ?>><?=$j['jenis']?></option>
                                <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Satuan</label>
                                <select name="satuan" class="form-control">
                                    <option value="pcs" <?php if ($satuan == "pcs") { echo "selected = selected";} ?>>pcs</option>
                                    <option value="box" <?php if ($satuan == "box") { echo "selected = selected";} ?>>box</option>
                                    <option value="kodi" <?php if ($satuan == "kodi") { echo "selected = selected";} ?>>kodi</option>
                                    <option value="lusin" <?php if ($satuan == "lusin") { echo "selected = selected";} ?>>lusin</option>
                                    <option value="psg" <?php if ($satuan == "psg") { echo "selected = selected";} ?>>psg</option>
                                </select>
                            </div>
                        
                           
                        
                    </div>
                    <div class="box-footer">
                        <a href="?p=barang" class="btn btn-danger pull-left"><i class="fa fa-reply"></i> Kembali</a>
                        <button class="btn btn-success pull-right"><i class="fa fa-edit"></i> Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>