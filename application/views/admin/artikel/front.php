<!-- Custom Style Safety -->
<style>

/* .th-poststwo .th-posttitel {
    padding: 0px 0 15px;
}	 */
</style>
<?php $baseUrl = base_url().'themes/hospital'?>
<div class="th-innerpagebanner th-haslayout th-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo $baseUrl;?>/assets/images/bgparallax/bgparallax-05.jpg">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
				<div class="th-pagetitle">
					<h1><?php echo $this->uri->segment(1); if($this->uri->segment(1) == 'artikel'){echo ' Kesehatan'; }?></h1>
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
	<section class="th-sectionspace th-haslayout th-pattrenone" style="padding:0px;" >
		<div class="container">
			<div class="row">
				<div id="th-twocolumns" class="th-twocolumns">
					<div class="col-md-9 col-sm-8 col-xs-12">
						<div id="th-content" class="th-content">
							<div  class="th-posts th-poststwo th-postslist">
								<article class="th-post">
									<div id="yw0" class="list-view">

										<div class="items">
											<div class="row">
												<?php foreach ($front as $post): ?>
													<div class="col-md-4" style="padding-top:20px">
														<figure>
															<?php if($post->jenis_post == 'kesehatan'):?>
															<a href="<?php echo base_url('artikel/read/'.$post->slug_post)?>"><img class="img-responsive" src="<?php echo base_url('assets/image/post/'.$post->gambar) ?>" alt="image description"></a>
															<?php else:?>
															<a href="<?php echo base_url('berita/read/'.$post->slug_post)?>"><img class="img-responsive" src="<?php echo base_url('assets/image/post/'.$post->gambar) ?>" alt="image description"></a>
															<?php endif;?>
														</figure>
													</div>
													<div class="col-md-8">
														<div class="th-postcontent" style="padding-left:0px; padding-top:10px">
															<ul class="th-postmate" style="width:100%; right:0; top:10px; position:inherit; margin:10px 0;">
																<li>
																	<a href="#">
														              <i class="fa fa-calendar"></i>
														              <span><?php $datetime = strtotime($post->date_created); $post_tgl = date('Y-m-d',$datetime); echo $post_tgl?></span>
														            </a>
																</li>
																<li>
																	<a href="#">
														              <i class="fa fa-user"></i>
														              <span>Author RS-Salamun</span>
														            </a>
																</li>	
															</ul>
															<div class="th-posttite">
																<?php if($post->jenis_post == 'kesehatan'):?>
																	<h3><a href="<?php echo base_url('artikel/read/'.$post->slug_post)?>"><?php echo $post->judul_post?></a></h3>
																<?php else:?>
																	<h3><a href="<?php echo base_url('berita/read/'.$post->slug_post)?>"><?php echo $post->judul_post?></a></h3>

																<?php endif;?>
															</div>
															<div class="th-description">
																<?php echo strip_tags(character_limiter($post->isi,130))?>
															</div>
														</div>
													</div>
												<?php endforeach;?>
												<!-- <div class="clearfix"> -->
										          <div style="margin-left:50px;"><?php echo $pagination; ?></div>
										          <!-- <div style="margin-left:50px;"><?php echo $information; ?></div> -->
										            <!-- <a class="btn btn-primary text-right" href="#">Older Posts &rarr;</a> -->
										         <!-- </div> -->
											</div>
										</div>
									</div>
								</article>

							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-4 col-xs-12">
							<aside id="th-sidebar" class="th-sidebar">
								<div class="th-widget th-widgetcategories th-widgetcount th-leficon" style="margin-top:24px;">
									<div class="th-widgettitle">
										<span class="th-widgeticon">
											<i class="fa fa-folder-o"></i>
										</span>
										<h3>Categories</h3>
									</div>
									<ul>
										<li>
											<a href="#">
												<span>Emergency Care</span>
												<span>(13)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>Surgical Center</span>
												<span>(17)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>Cancer Cure</span>
												<span>(21)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>Intesive Treatments</span>
												<span>(16)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>Talented Doctors</span>
												<span>(23)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>Blood Bank 24/7</span>
												<span>(09)</span>
											</a>
										</li>
									</ul>
								</div>

								<div class="th-widget th-widgetarchives th-widgetcount th-leficon">
									<div class="th-widgettitle">
										<span class="th-widgeticon">
											<i class="fa fa-folder-o"></i>
										</span>
										<h3>Archives</h3>
									</div>
									<ul>
										<li>
											<a href="#">
												<span>EOctober 2016</span>
												<span>(28)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>September 2016</span>
												<span>(13)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>August 2016</span>
												<span>(18)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>July 2016</span>
												<span>(32)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>June 2016</span>
												<span>(16)</span>
											</a>
										</li>
										<li>
											<a href="#">
												<span>May 2016</span>
												<span>(11)</span>
											</a>
										</li>
									</ul>
								</div>
                							</aside>
						</div>
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
