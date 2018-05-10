<style>
.clear {
    clear:both;    
}
.btn-info {
    margin-right:15px;
    text-transform:uppercase;
    padding:10px;
    display:block;
    float:left;
}
.btn-info a {
    display:block;
    text-decoration:none;
    width:100%;
    height:100%;
    color:#fff;
}
.more.label {
    float:right;    
}	
</style>
<?php $baseUrl = base_url().'themes/hospital'?>
<main id="th-main" class="th-main th-haslayout th-topbottompaddingzero">
	<!--************************************
			Features And Table Start
	*************************************-->
	<section class="th-sectionspace th-haslayout th-pattrenone" >
		<div class="container">
			<div class="row">
				<?php if(empty($front)):?>
					<div class="alert alert-info">Belum Ada Artikel</div>
				<?php else:?>
					<?php foreach ($front as $post):?>
						<!-- **************** JIKA ARTIKEL ****************  -->
						<?php if($this->uri->segment(1) == 'artikel'):?>
						<div class="">
							<a href="<?php echo base_url('artikel/read/'.$post->slug_post)?>" title="">
								<h2><?php echo $post->judul_post;?></h2>
							</a>
							<span style="font-weight:bold">Oleh : Author RS-Salamun | <?php $datetime = strtotime($post->date_created); $post_tgl = date('Y-m-d',$datetime); echo $post_tgl?></span>
							<p><?php echo strip_tags(character_limiter($post->isi,130))?></p>

							<div>
								<div class="more label">
									<a href="<?php echo base_url('artikel/read/'.$post->slug_post)?>" class="btn btn-primary btn-lg"><i class="fa fa-book"></i> Baca</a>
								</div>								
							</div>
							<div class="clear"></div>

						</div>
						<hr>
						<!-- **************** END ARTIKEL ****************  -->
						<?php else:?>
						<!-- **************** JIKA BERITA ****************  -->
						<div class="">
							<a href="<?php echo base_url('berita/read/'.$post->slug_post)?>" title="">
								<h2><?php echo $post->judul_post;?></h2>
							</a>
							<span style="font-weight:bold">Oleh : Author RS-Salamun | <?php $datetime = strtotime($post->date_created); $post_tgl = date('Y-m-d',$datetime); echo $post_tgl?></span>
							<p><?php echo strip_tags(character_limiter($post->isi,130))?></p>

							<div>
								<div class="more label">
									<a href="<?php echo base_url('berita/read/'.$post->slug_post)?>" class="btn btn-primary btn-lg"><i class="fa fa-book"></i> Baca</a>
								</div>								
							</div>
							<div class="clear"></div>

						</div>
						<hr>
						<!-- **************** END BERITA ****************  -->	
						<?php endif;?>
					<?php endforeach;?>
				<?php endif;?>
				<div class="clearfix">
          <div ><?php echo $pagination; ?></div>
            <!-- <a class="btn btn-primary text-right" href="#">Older Posts &rarr;</a> -->
          </div>
			</div>
		</div>
	</section>
	<!--************************************
			Features And Table End
	*************************************-->

</main>
<!--************************************
		Main End
*************************************-->
