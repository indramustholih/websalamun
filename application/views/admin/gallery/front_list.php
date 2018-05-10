<script >
	$(document).ready(function(){
		$('[data-fancybox="gallery"]').fancybox({
		  thumbs : {
		    // autoStart : true
		  },
		  buttons : [
		    'thumbs',
		    'close'
		  ]
		});

	});
</script>
<?php $baseUrl = base_url().'themes/hospital'?>
<div class="th-innerpagebanner th-haslayout th-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo $baseUrl;?>/assets/images/bgparallax/bgparallax-05.jpg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="th-pagetitle">
					<h1>Gallery</h1>
				</div>
				<!-- <ol class="th-breadcrumb">
					<li><a href="echo base_url()">Home</a></li>
					<li><span>Tentang Kami</span></li>
				</ol> -->
			</div>
		</div>
	</div>
</div>
<main id="th-main" class="th-main th-haslayout th-topbottompaddingzero">
	<!--************************************
			Features And Table Start
	*************************************-->
	<section class="th-sectionspace th-haslayout th-pattrenone" style="padding-top:10px;" >
		<div class="container">
			<div class="row" style="padding:10px;">
				<?php foreach ($front as $image):?>
				<div class="col-lg-3 col-md-4 col-xs-6" style="padding-bottom: 10px;">
		          <a href="<?php echo base_url('assets/image/gallery/'.$image->gambar)?>" class="d-block mb-4 h-100" data-fancybox="gallery" data-caption="<?php echo $image->deskripsi?>">
		            <img class="img-fluid img-thumbnail" src="<?php echo base_url('assets/image/gallery/thumbs/'.$image->gambar)?>" alt="">
		          </a>
        		</div>
        		<?php endforeach;?>
        		
        		<div class="col-lg-12 col-md-12 col-xs-12">
        			<?php echo $pagination; ?>
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
