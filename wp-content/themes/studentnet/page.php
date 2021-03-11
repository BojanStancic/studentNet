<?php 

get_header();

while (have_posts()) {
	the_post(); 
	pageBanner();

?>

		<div class="container container--narrow page-section">

		<?php

		$theParent = wp_get_post_parent_id(get_the_ID());

		 if ($theParent) { ?>
		    <div class="metabox metabox--position-up metabox--with-home-link">
		      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
		    </div>
			<?php } ?>

	    
	    <?php 
	    $testArray = get_pages(array(
	    	'child_of' => get_the_ID()

	    ));

	    if ($theParent or $testArray) { ?>
	    <div class="page-links">
	      <h2 class="page-links__title"><a href=" <?php echo get_permalink($theParent); ?> "><?php echo get_the_title($theParent); ?></a></h2>
	      <ul class="min-list">
	        <?php 

	        	if($theParent) {
	        		$findChildrenOf = $theParent;
	        	} else {
	        		$findChildrenOf = get_the_ID();
	        	}


	        	wp_list_pages(array(
	        		'title_li' => NULL,
	        		'child_of' => $findChildrenOf,
	        		'sort_column' => 'menu_order'

	        	));

	         ?>
	      </ul>
	    </div>
		<?php } ?>

	    <div class="generic-content">
	      <?php 
		      the_content(); 


		      //This is just a test for query vars(variables)
		      $skyColor = sanitize_text_field(get_query_var('skyColor'));
		      $grassColor = sanitize_text_field(get_query_var('grassColor'));

	      if ($skyColor == 'blue' AND $grassColor == 'green') {
	      	echo '<p>The sky is blue today, and the grass is green, life is great :)</p>';
	      }


	      ?>

	      <form method="post">
	      	<input type="text" name="skyColor" placeholder="Sky color" >
	      	<input type="text" name="grassColor" placeholder="Grass color" >
	      	<button>Submit</button>
	      </form>

	    </div>

	  </div>


<?php }

get_footer();
 ?>