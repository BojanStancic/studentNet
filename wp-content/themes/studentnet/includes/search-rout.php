<?php 
add_action('rest_api_init', 'studentnetRegisterSearch');

function studentnetRegisterSearch() {
	register_rest_route('studentnet/v1', 'search', array(
		'methods' => WP_REST_SERVER::READABLE,
		'callback' => 'studentnetSearchResults'
	));
}

function studentnetSearchResults($data) {
	$mainQuery = new WP_Query(array(
		'post_type' => array('post', 'page', 'professor', 'program', 'campus', 'event'),
		's' => sanitize_text_field($data['term'])
	));

	$resluts = array(
		'generalInfo' => array(),
		'professors' => array(),
		'programs' => array(),
		'events' => array(),
		'campuses' => array()
	);

	while ($mainQuery->have_posts()) {
		$mainQuery->the_post();

		if (get_post_type() == 'post' OR get_post_type() == 'page') {
			array_push($resluts['generalInfo'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'postType' => get_post_type(),
				'authorName' => get_the_author()
			));
		}

		if (get_post_type() == 'professor') {
			array_push($resluts['professors'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
			));
		}

		if (get_post_type() == 'program') {
			$relatedCampususe = get_field('related_campus');

			if ($relatedCampususe) {
				foreach ($relatedCampususe as $campus) {
					array_push($resluts['campuses'], array(
						'title' => get_the_title($campus),
						'permalink' => get_the_permalink($campus)
					));
				}
			}

			array_push($resluts['programs'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'id' => get_the_id()
			));
		}

		if (get_post_type() == 'event') {
			$eventDate = new DateTime(get_field('event_date'));
			$description = null;
			if (has_excerpt()) {
			      $description = get_the_excerpt();
		    } else {
			     $description = wp_trim_words(get_the_content(), 18);
			}

			array_push($resluts['events'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink(),
				'month' => $eventDate->format('M'),
				'day' => $eventDate->format('d'),
				'description' => $description
			));
		}

		if (get_post_type() == 'campus') {
			array_push($resluts['campuses'], array(
				'title' => get_the_title(),
				'permalink' => get_the_permalink()
			));
		}
		
	}

	if ($resluts['programs']) {

		$programsMetaQuery = array('relation' => 'OR');

		foreach ($resluts['programs'] as $item) {
			array_push($programsMetaQuery, array(
					'key' => 'related_programs',
					'compare' => 'LIKE',
					'value' => '"' . $item['id'] . '"'
				));
		}

		$programRelatonshipQuery = new WP_Query(array(
			'post_type' => array('professor', 'event'),
			'meta_query' => $programsMetaQuery
		));

		while ($programRelatonshipQuery->have_posts()) {
			$programRelatonshipQuery->the_post();

			if (get_post_type() == 'event') {
				$eventDate = new DateTime(get_field('event_date'));
				$description = null;
				if (has_excerpt()) {
				      $description = get_the_excerpt();
			    } else {
				     $description = wp_trim_words(get_the_content(), 18);
				}

				array_push($resluts['events'], array(
					'title' => get_the_title(),
					'permalink' => get_the_permalink(),
					'month' => $eventDate->format('M'),
					'day' => $eventDate->format('d'),
					'description' => $description
				));
			}

			if (get_post_type() == 'professor') {
				array_push($resluts['professors'], array(
					'title' => get_the_title(),
					'permalink' => get_the_permalink(),
					'image' => get_the_post_thumbnail_url(0, 'professorLandscape')
				));
			}
		}

		// removing duplicate
		$resluts['professors'] = array_values(array_unique($resluts['professors'], SORT_REGULAR));

		$resluts['events'] = array_values(array_unique($resluts['events'], SORT_REGULAR));

	}

	return $resluts;
}
