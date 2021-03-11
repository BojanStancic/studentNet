<?php 
get_header(); 
pageBanner(array(
	'title' => 'Our Professors',
	'subtitle' => 'Meet our lovely professors'
));

?>



	<div class="container container--narrow page-section">

		<ul class="link-list min-list">

		<?php 
			while (have_posts()) {
				the_post(); ?>
				<?php 

				

			$relatedPrograms = get_field('related_programs');

			if ($relatedPrograms) {

				// echo '<h2 class="headline headline--midium">Subject(s) Taught</h2>';
				
				foreach($relatedPrograms as $program) { ?>
					<li><a href=" <?php echo   get_the_permalink($program); ?> "><?php echo get_the_title($program); ?> Professor</a></li>
				   <li class="professor-card__list-item">
		            	<a class="professor-card" href=" <?php the_permalink(); ?> ">
		            		<span class="span professor-card__image"><?php the_post_thumbnail('professorLandscape'); ?></span>
		            		<span class="professor-card__name"><?php the_title(); ?></span>	
		            	</a>
		            </li>
				<?php  }
				
			}


	        
	          	wp_reset_postdata(); ?>

				    <!-- <li><a href=" <?php the_permalink(); ?> "><?php echo get_the_title(); ?></a></li> -->


		<?php } echo paginate_links(); ?>

		</ul>

		



	</div>





<?php get_footer(); ?>


