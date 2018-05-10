                <footer id="th-footer" class="th-footer th-haslayout">
                     <div class="th-footertopbar">
                        <div class="container">
                           <div class="row">
                              <ul class="th-fservices">
                                 <li>
                                    <span class="th-fserviceicon"><i class="fa fa-ambulance"></i></span>
                                    <div class="th-contentbox">
                                       <strong>Ambulance <span>Service</span></strong>
                                    </div>
                                 </li>
                                 <li>
                                    <span class="th-fserviceicon"><i class="fa fa-user-md"></i></span>
                                    <div class="th-contentbox">
                                       <strong>Intensive <span>Care Unit</span></strong>
                                    </div>
                                 </li>
                                 <li>
                                    <span class="th-fserviceicon"><i class="fa fa-heartbeat"></i></span>
                                    <div class="th-contentbox">
                                       <strong>24/7 Emergency <span>Admissions</span></strong>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="th-footermiddlebox th-sectionspace th-haslayout th-parallaximg" data-appear-top-offset="600" data-parallax="scroll" data-image-src="<?php echo $baseUrl;?>/assets/images/bgparallax/bgparallax-03.jpg">
                        <div class="container">
                           <div class="row">
                              <div class="th-fcols">
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="th-fcol">
                                       <strong class="th-logo">
                                       <a href="#">
                                       <img src="<?php echo $baseUrl;?>/assets/images/flogo.png" alt="image description">
                                       </a>
                                       </strong>
                                       <ul class="th-faddressinfo">
                                          <li>
                                             <span class="th-addressicon"><img src="<?php echo $baseUrl;?>/assets/images/icon/img-08.png" alt="image description"></span>
                                             <address>Jalan Ciumbuleuit No. 203 <br> Bandung - Indonesia</address>
                                          </li>
                                          <li>
                                             <span class="th-addressicon"><img src="<?php echo $baseUrl;?>/assets/images/icon/img-09.png" alt="image description"></span>
                                             <div class="th-phone">
                                                <span>(022) 2032090 <br>Call Center</span>
                                             </div>
                                          </li>
                                          <li>
                                             <span class="th-addressicon"><img src="<?php echo $baseUrl;?>/assets/images/icon/img-10.png" alt="image description"></span>
                                             <div class="th-phone">
                                                <span><a href="mailto:rsausalamun@gmail.com">info@rsausalamun.com</a></span>
                                             </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="th-fcol">
                                       <div class="th-borderheading">
                                          <h3>About Us</h3>
                                       </div>
                                       <div class="th-description">
                                          <p>Above the law sunny days sweeping the clouds away fateful trip</p>
                                          <p>That started my way to where the air is sweet can you tell me how to get how to get to sesame street.</p>
                                       </div>
                                       <ul class="th-socialicons th-socialiconsround">
                                          <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="th-fcol">
                                       <div class="th-borderheading">
                                          <h3>Sitemap</h3>
                                       </div>
                                       <ul class="th-usefullinks">
                                          <li><a href="">Home</a></li>
                                          <li><a href="#">Tentang Kami</a></li>
                                          <li><a href="#">Berita</a></li>
                                          <li><a href="#">Informasi</a></li>
                                          <li><a href="#">Download</a></li>
                                          <li><a href="#">Kontak Kami</a></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-sm-6 col-xs-6">
                                    <div class="th-fcol">
                                       <div class="th-borderheading">
                                          <h3>Recent Posts</h3>
                                       </div>
                                       <ul class="th-recentpost">
                                          <?php $limit_post = $this->artikel_model->listing_limit();?>
                                          <?php foreach ($limit_post as $post):?>

                                          <li>
                                             <figure>
                                                <?php if($post->jenis_post = "kesehatan"):?>
                                                <a href="<?php echo base_url('artikel/read/'.$post->slug_post)?>"><i><img src="<?php echo base_url('assets/image/post/thumbs/'.$post->gambar);?>" alt="image description" width="80" height="80"></i></a>
                                                <?php else:?>
                                                <a href="<?php echo base_url('berita/read/'.$post->slug_post)?>"><i><img src="<?php echo base_url('assets/image/post/thumbs/'.$post->gambar);?>" alt="image description" width="80" height="80"></i></a>
                                                <?php endif;?>
                                             </figure>
                                             <div class="th-shortcontent">
                                                <time datetime="2011-01-12"><?php $datetime = strtotime($post->date_created); $post_tgl = date('Y-m-d',$datetime); echo $post_tgl?></time>
                                                <p><?php echo strip_tags(character_limiter($post->isi,20))?></p>
                                             </div>
                                          </li>
                                          <?php endforeach;?>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="th-footerbottombar">
                        <div class="container">
                           <div class="row">
                              <div class="col-sm-12 col-xs-12">
                                 <span class="th-copyright">Copyrights &copy;  2017 RSAU dr. M. Salamun</span>
                                 <?php /*
                                    <nav class="th-footernav">
                                    <ul>
                                      <li><a href="#">Home</a></li>
                                      <li><a href="#">About Us</a></li>
                                      <li><a href="#">Projects</a></li>
                                      <li><a href="#">Help</a></li>
                                      <li><a href="#">FAQ</a></li>
                                      <li><a href="#">Contact</a></li>
                                    </ul>
                                     </nav>
                                    */?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </footer>
               </div>
               <script src="<?php echo $baseUrl;?>/assets/js/vendor/jquery-library.js"></script>
               <!-- FANCYBOX 3 -->
               <script src="<?php echo base_url()?>assets/fancybox/dist/jquery.fancybox.min.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/vendor/bootstrap.min.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/moment-with-locales.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/bootstrap-datetimepicker.min.js"></script>
               <script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/owl.carousel.min.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/finalcountdown.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/jquery.countTo.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/isotope.pkgd.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/parallax.min.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/prettyPhoto.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/appear.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/gmap3.js"></script>
               <script src="<?php echo $baseUrl;?>/assets/js/themefunction.js"></script>
               <?php /*
                  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mSibFUfbssvlZbdgqmszbPMeNTUovl2VqVa728nHP1rEfi3sCdEzsjFEWvPn2zXV4Xb6yQlUyVT8443oymMscsXv5IJ7q%2fePDRBtLrck5dK2G%2beQh5vajjJJqmugPmbAPfSP5Rqy2B2c32h%2b6HHWNw3e%2b3kreqjfiITvWvmLFLYe2nPxnsQH1m%2fVa8kiwplld6vTdLWLseZbyw4%2fyQ7AJf%2bwZ1CAsrv%2bodV5RYcrjx3h%2blh7Op6NgH6B0A3uI204P5HaW3AygMSNbXIRH%2fEPCgpR99mf9rygyqueWmu%2bp3UlQLoKETpaBZHpxNSJPSmYaNdjE2sqzdf1b%2bWHOPxYaQ0ULdmzBXtfjdmeNF4uQ9cfnYA6Ozvzi7g%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
                  */?>
            </body>
         </html>