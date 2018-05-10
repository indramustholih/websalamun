<!-- <div id="main-slider-2">
   <div id="th-homeslider" class="th-homeslider th-homesliderthree th-haslayout">
      <figure class="item">
         <img src="<?php //echo $baseUrl;?>/assets/images/main_slider/main_slider1.jpg" alt="image description">
         <figcaption>
            <div class="container">
               <div class="th-slidercontent">
                  <h1><span></span></h1>
                  <div class="th-description">
                  </div>
                  <?php /*
                     <div class="th-btns">
                     	<a class="th-btn" href="#">Purchase</a>
                     	<a class="th-btn" href="#">Learn More</a>
                     </div>
                          */?>
               </div>
            </div>
         </figcaption>
      </figure>
   </div>
</div> -->
<style>
   figcaption{
      margin-bottom: 0px;
   }
</style>
<div id="main-slider-2">
    <!--************************************
         Home Slider Start
    *************************************-->
    <div id="th-homeslider" class="th-homeslider th-homesliderthree th-haslayout">
      <?php foreach ($slider as $sliders):?>
        <figure class="item">
            <img src="<?php echo base_url('assets/image/gallery/thumbs/'.$sliders->gambar)?>" alt="<?php echo $sliders->deskripsi?>">
            <figcaption>
               <div class="container">
                  <div class="th-slidercontent">
                     <h1><span></span></h1>
                     <!-- <div class="th-description">
                      </div> -->
                  </div>
               </div>
            </figcaption>
         </figure>
        <?php endforeach;?>
    </div>
    <!--************************************
         Home Slider End
    *************************************-->
</div>