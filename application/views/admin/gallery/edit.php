<section class="content">
<?php 
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');
?>
<?php echo form_open_multipart(base_url('administrator/gallery/edit/'.$gallery->id_gallery),array('class'=>'form-horizontal'));?>
<div class="card">
  <h5 class="card-header"><?php echo $title_panel?></h5>
  <div class="card-body">
        <div class="form-group">
            <label class="control-label">Gambar</label>
                <div class="">
                    <input type="file" class="form-control" name="gambar">
                    <span class="text-info">Digunakan Jika Ingin Mengganti Gambar</span> |
                    <span class="text-danger">Agar Gambar Rapi disarankan resolusi gambar adalah 1366 x 661</span><br>
                    <?php if(! empty($gallery)):?>
                    <img src="<?php echo base_url('assets/image/gallery/thumbs/'.$gallery->gambar)?>" class="img img-responsive img-thumbnail" width="50%"/>
                  <?php endif;?>
                </div>
        </div>
        <div class="form-group">
            <label class=" control-label">Jenis Gallery</label>
            <div class="">
                <select name="jenis_gambar" class="form-control">
                    <option value="Slider" <?php if($gallery->jenis_gambar == "Slider"){echo "selected";}?>>Slider</option>
                    <option value="gallery" <?php if($gallery->jenis_gambar == "gallery"){echo "selected";}?>>Gallery</option>
                </select>
            </div>      
        </div>
        <div class="form-group">
            <label class=" control-label">Deskripsi</label>
               <!--  <div class="col-sm-5"> -->
                    <textarea name="deskripsi" class="form-control" id="content"><?php echo $gallery->deskripsi ?></textarea>
                <!-- </div> -->
        </div>
       
  </div>
  <div class="card-footer text-muted">
     <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Ubah Gambar">
      <a href="<?php echo base_url('administrator/gallery')?>" class="btn btn-default btn-lg">Batal</a>
  </div>
</div>
<?php echo form_close();?>
</section>
