<section class="content">
<?php 
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');
  if(isset($error)){
  echo '<div class="alert alert-warning">';
  echo $error;
  echo '</div>';

}
?>

<?php echo form_open_multipart(base_url('administrator/gallery/tambah'),array('class'=>'form-horizontal'));?>
<div class="card">
  <h5 class="card-header"><?php echo $title_panel?></h5>
  <div class="card-body">
        <div class="form-group">
            <label class="control-label">Gambar</label>
                <div class="">
                    <input type="file" class="form-control" name="gambar" required>
                    <span class="text-danger">Agar Gambar Rapi Disarankan resolusi gambar adalah 1366 x 661</span>
                </div>
        </div>
        <div class="form-group">
            <label class=" control-label">Jenis Gallery</label>
            <div class="">
                <select name="jenis_gambar" class="form-control">
                    <option value="Slider">Slider</option>
                    <option value="gallery">Gallery</option>
                </select>
            </div>      
        </div>
        <div class="form-group">
            <label class=" control-label">Deskripsi</label>
               <!--  <div class="col-sm-5"> -->
                    <textarea name="deskripsi" class="form-control" id="content"><?php echo set_value('deskripsi')?></textarea>
                <!-- </div> -->
        </div>
       
  </div>
  <div class="card-footer text-muted">
     <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Tambah Gambar">
      <a href="<?php echo base_url('administrator/gallery')?>" class="btn btn-default btn-lg">Batal</a>
  </div>
</div>
<?php echo form_close();?>
</section>
