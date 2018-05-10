<!-- Custom Style Safety -->
<style>
.th-innerpagebanner.th-parallaximg:before {
    opacity: 0.85 !important;
    background: #000000a1 !important;
    
}
.th-innerpagebanner{
	height: 450px !important;
}
</style>
<?php $baseUrl = base_url().'themes/hospital'?>
<?php if($post->gambar != ''):?>
<div class="th-innerpagebanner th-haslayout th-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo base_url('assets/image/post/'.$post->gambar)?>">
<?php else:?>
<div class="th-innerpagebanner th-haslayout th-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="#">
<?php endif;?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="th-pagetitle" style=>
					<h1><?php echo $post->judul_post?></h1>
				</div>
				<ol class="th-breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<?php if($this->uri->segment(1) == 'artikel'):?>
						<li><a href="<?php echo base_url('artikel')?>">Artikel</a></li>
					<?php else:?>
						<li><a href="<?php echo base_url('berita')?>">Berita</a></li>
					<?php endif;?>
					<li><span><?php echo $post->judul_post?></span></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<main id="th-main" class="th-main th-haslayout th-topbottompaddingzero">
	<!--************************************
			Features And Table Start
	*************************************-->
	<section class="th-sectionspace th-haslayout th-pattrenone" style="padding:50px">
		<div class="container" >
			<div class="row">
				<div style="color:black;font-weight:bold;margin-bottom:20px;">Oleh <a href="#">author rs-salamun</a> | 
					<?php 
						$datetime = strtotime($post->date_created); 
						$post_tgl = date('Y-M-d H:i:s',$datetime); 
						echo $post_tgl;?>
				</div>
				<?php echo $post->isi;?>
				<!-- **************** JIKA ARTIKEL ****************  -->
			<?php if($this->uri->segment(1) == 'artikel'):?>
				<div class="text-right"><a href="<?php echo base_url('artikel')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali Ke Artikel</a></div>
			<!-- **************** END ARTIKEL ****************  -->
			<?php else:?>
			<!-- **************** JIKA BERITA ****************  -->
				<div class="text-right"><a href="<?php echo base_url('berita')?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Kembali Ke Berita</a></div>
			<!-- **************** END BERITA ****************  -->
			<?php endif;?>
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
