
<section class="content">
<?php 
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');
?>
<?php echo form_open(base_url('administrator/user/tambah/'),array('class'=>'form-horizontal'));?>
<div class="card">
  <h5 class="card-header"><?php echo $title_panel?></h5>
  <div class="card-body">
    <div class="form-group">
            <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo set_value('username')?>">
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="text-info">Isi password jika anda ingin mengubahnya dan tekan <b class="text-danger">tombol batal</b> untuk membatalkan aksi</span>
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Hak Akses</label>
            <div class="col-sm-5">
                <select name="akses_level" class="form-control">
                    <option value="superadmin">Superadmin</option>
                    <option value="user">User</option>
                </select>
            </div>      
        </div>
  </div>
  <div class="card-footer text-muted">
     <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan Data">
      <a href="<?php echo base_url('administrator/user')?>" class="btn btn-default btn-lg">Batal</a>
  </div>
</div>
<?php echo form_close();?>
</section>
