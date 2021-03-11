
<!-- Not using that at the moment, but it can be used if vi want to use slide show post from editor (it will need little ajustment)-->

<!-- <div class="hero-slider__slide" style="background-image: url(<?php  the_post_thumbnail('professorLandscape'); ?>);">
	<div class="hero-slider__interior container">
	  <div class="hero-slider__overlay">
	    <h2 class="headline headline--medium t-center"><?php echo get_field('related_programs'); ?></h2>
	    <p class="t-center"><?php echo get_field('slide_subtitle'); ?></p>
	    <p class="t-center no-margin"><a href="<?php echo site_url('/professors'); ?>" class="btn btn--blue">Meet Our Professors</a></p>
	  </div>
	</div>
</div> -->

          <?php 

          
          $professor = new WP_Query(array(
              'post_type' => 'professor',

              
            ));

          while ($professor->have_posts()) {
            $professor->the_post(); 


            ?>

<?php $relatedPrograms = get_field('related_programs');
	foreach ($relatedPrograms as $program) {
		
	}

 ?>

<div class="hero-slider__slide" style="background-image: url(<?php echo get_field('page_banner_background_image')['sizes']['pageBanner']; ?>);">
  <div class="hero-slider__interior container">
    <div class="hero-slider__overlay">
      <h2 class="headline headline--medium t-center"><?php echo the_title(); ?></h2>
      <p class="t-center"><?php echo $program->post_title; ?></p>
      <p class="t-center no-margin"><a href="<?php the_permalink(); ?>" class="btn btn--blue">Meet Our Professor</a></p>
    </div>
  </div>
</div>


  <?php } wp_reset_postdata(); ?>
