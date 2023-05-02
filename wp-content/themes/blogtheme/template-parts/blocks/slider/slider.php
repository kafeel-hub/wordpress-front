<section id="slider">
  <div class="slider-wrapper">
    <?php if( have_rows('slides') ): ?>
      <div class="slider">
        <?php while ( have_rows('slides') ) : the_row(); ?>

          <div class="row ">
            <div class="container-fluid"> 
              <img src="<?php the_sub_field('image'); ?>" alt="">

               <div class="row">
                <div class="col col-lg-6 col-md-12 col-sm-12">

                                <div class="header-slider-col">
                                    <div class="container-fluid">
                                    <div class="slider-heading">
                                      <p class="title">
                                      <?php the_sub_field('title'); ?>
                                        <!-- Now it’s <span class="title bold-title">Real Simple</span> to cut years off
                                        your mortgage. -->
                                      </p>
                                      <p class="content"> 
                                      <?php the_sub_field('content'); ?>
                                      </p>

                                      <div class="homeslide-button">
                                        <button class="appoint-home-btn">Book an appointment<?php the_sub_field('button_1'); ?>

                                        </button>
                                          <button class="learnmore-btn">Learn More<?php the_sub_field('button_2'); ?>

                                          </button>

                                        </div>




                                    </div>

                                    </div>
                                    
                                </div>
                  </div>

                  <div class="col col-lg-6 col-md-12 col-sm-12 image-pad">
                                <div class ="slider-image-1">
                                    <img src="<?php the_sub_field('side_image'); ?>" alt="">
                                </div>
                               

                  </div>


              
                </div>



            
          
            </div>

          </div>
          
         
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>

<!-- <script>
  jQuery(document).ready(function() {
    jQuery('.slider').slick();
  });
</script> -->


