<script>
    $(document).ready(function(){
         tinymce.init({
          selector: '#content',
          height: 500,
          menubar: false,
          plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
          ],
          toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
          content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
        });
    });
</script>
<section class="content">
<?php 
	echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ','</div>');
?>
<?php echo form_open_multipart(base_url('administrator/artikel/edit/'.$posting->id_post),array('class'=>'form-horizontal'));?>
<div class="card">
  <h5 class="card-header"><?php echo $title_panel?></h5>
  <div class="card-body">
        <div class="form-group">
            <label class=" control-label">Gambar</label>
                <div class="">
                    <input type="file" class="form-control" name="gambar">
                    <span class="text-info">Digunakan jika ingin mengganti gambar</span>
                </div>
        </div>
       <div class="form-group">
            <label class=" control-label">Judul Posting</label>
                <div class="">
                    <input type="text" class="form-control" name="judul_post" placeholder="Judul Artikel" value="<?php echo $posting->judul_post?>">
                </div>
        </div>
        <div class="form-group">
            <label class=" control-label">Tags</label>
                <div class="">
                     <input type="text" class="form-control" name="tags" placeholder="contoh : health, kesehatan" value="<?php echo $posting->tags?>">
                </div>
        </div>
        <div class="form-group">
            <label class=" control-label">Jenis Artikel</label>
            <div class="">
                <select name="jenis_post" class="form-control">
                    <option value="berita" <?php if($posting->jenis_post == 'berita'){echo "selected";}?>>Berita</option>
                    <option value="kesehatan" <?php if($posting->jenis_post == 'kesehatan'){echo "selected";}?>>Kesehatan</option>
                </select>
            </div>      
        </div>
        <div class="form-group">
            <label class=" control-label">Status Artikel</label>
            <div class="">
                <select name="status_post" class="form-control">
                    <option value="publish" <?php if($posting->status_post == 'publish'){echo "selected";}?>>Publish</option>
                    <option value="draft" <?php if($posting->status_post == 'draft'){echo "selected";}?>>Draft</option>
                </select>
            </div>      
        </div>
        <div class="form-group">
            <label class=" control-label">Isi Artikel</label>
               
                    <textarea name="isi" class="form-control" id="content"><?php echo $posting->isi?></textarea>
               
        </div>
        
  </div>
  <div class="card-footer text-muted">
     <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Simpan Data">
      <!-- <a href="<?php //echo base_url('administrator/user')?>" class="btn btn-default btn-lg">Batal</a> -->
  </div>
</div>
<?php echo form_close();?>
</section>
