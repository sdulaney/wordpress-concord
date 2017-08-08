<?php

function get_press_data($post_id = '') {
    $data_array 	= array();
	$i				= 0;
	$args = array(
		'post_type' 		=> 'post',
		'p' 				=> $post_id,
		'posts_per_page'	=> '-1',
		'orderby'			=> 'date',
		'order'   			=> 'DESC'
	);

	if ( $post_id ) {
		$args['p'] = $post_id;
	}

	$query = new WP_Query( $args );

	while ( $query->have_posts() ) {
		$query->the_post();
		$data_array[$i]['title'] 	= get_the_title();
		$data_array[$i]['link']		= get_permalink();
		$data_array[$i]['anchor']	= basename(get_permalink());
		$data_array[$i]['photo']	= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$data_array[$i]['link_external'] = get_permalink();

		$i++;
	}
	return $data_array;
}


function get_services_data($post_id = '') {
	$data_array 	= array();
	$i				= 0;
	$args = array(
		'post_type' 		=> 'services',
		'p' 				=> $post_id,
		'posts_per_page'	=> '-1',
		'orderby'			=> 'menu_order',
		'order'				=> 'ASC'
	);

	if ( $post_id ) {
		$args['p'] = $post_id;
	}

	$query = new WP_Query( $args );

	while ( $query->have_posts() ) {
		$query->the_post();
		$data_array[$i]['id']		= get_the_ID();
		$data_array[$i]['title'] 	= get_the_title();
		$data_array[$i]['content'] 	= apply_filters('the_content', get_the_content());
		$data_array[$i]['link']		= '#';
		$data_array[$i]['anchor']	= basename(get_permalink());
        $thumb                      = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );

		$data_array[$i]['photo']	= $thumb[0];
		$hero_img					= get_field('service_hero_image');
		$data_array[$i]['hero_img']	= $hero_img['url'];
		$data_array[$i]['quote']	= get_field('services_quote');
		$data_array[$i]['gallery']	= get_field('services_gallery');
		$data_array[$i]['case_studies'] = get_field('associated_case_studies');

		$i++;
	}

	return $data_array;
}


function get_services_grid() {
	$services = get_services_data();
	
	$html = '<div class="row">';
		
	if ( !$services ) 
		return false;

	$html .= '<div class="row property-grid services-grid collapse">';
	
	foreach ( $services as $service ) {
		$image 	= $service['photo'];
		
		$html .= '<div class="medium-6 large-4 columns">';
		$html .= '<div class="image-wrapper overlay-fade-in">';

		if ( $image ) {	
			$html .= '<a href="#"><img class="img-responsive" src="' . $image . '" /></a>';
		}
		
		$html .= '<div class="image-overlay-content">';
		$html .= '<a href="services/#' . $service['anchor'] . '"></a>';
	    $html .=	'<h2><span>' . $service['title'] . '</span></h2>';
        if ( $service['anchor'] == 'property-management' ) {
            $html .= '<div class="listings-button"><a href="https://concordrealestate.appfolio.com/listings/" target="_blank">View Property Listings</a></div>';
        }
		$html .= '</div>';	

		$html .= '</div>';			
		
		
		$html .= '</div>';
		
	}
	
	$html .= '</div>';
	
	return $html;
}

add_shortcode( 'services_grid', 'get_services_grid' );


function get_careers_data($post_id = '') {
	$data_array 	= array();
	$i				= 0;
	$args = array(
		'post_type' 		=> 'careers',
		'p' 				=> $post_id,
		'posts_per_page'	=> '-1'
	);

	if ( $post_id ) {
		$args['p'] = $post_id;
	}

	$query = new WP_Query( $args );

	while ( $query->have_posts() ) {
		$query->the_post();
		$data_array[$i]['id']		= get_the_ID();
		$data_array[$i]['title'] 	= get_the_title();
		$data_array[$i]['content']	= apply_filters('the_content', get_the_content());
		$data_array[$i]['link']		= '#';
		$data_array[$i]['anchor']	= basename(get_permalink());
		$data_array[$i]['photo']	= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$pdf_array					= get_field('career_pdf');

		$data_array[$i]['pdf']		= $pdf_array['url'];

		$i++;
	}
	return $data_array;
}


function get_team_data($member_id = '', $orderby='', $terms='') {
	$team_members 	= array();
	$i				= 0;
	$args = array(
		'post_type' 		=> 'team_members',
        'post_status' => 'publish',
		'p' 				=> $member_id,
		'posts_per_page'	=> '-1'
	);

	if ( $orderby ) {
		$args['orderby']	= $orderby;
		$args['order'] 		= 'ASC';
	}

	if ( $member_id ) {
		$args['p'] = $member_id;
	}

	if ( $terms ) {
		$args['tax_query'] = array(
        	array (
            'taxonomy' => 'team_category',
            'field' => 'slug',
            'terms' => $terms,
        	)
    		);
	}
	
	$query = new WP_Query( $args );

	while ( $query->have_posts() ) {
		$query->the_post();
		$team_members[$i]['name'] 		= get_field('member_name');
		$team_members[$i]['title'] 		= get_field('member_title');
		$team_members[$i]['bio'] 		= get_field('member_bio');
		$team_members[$i]['office']		= get_field('member_office_number');
		$team_members[$i]['direct'] 	= get_field('member_direct_number');
		$team_members[$i]['fax'] 		= get_field('member_fax_number');
		$team_members[$i]['email'] 		= get_field('member_email');
		$team_members[$i]['photo']		= wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		$team_members[$i]['terms']		= get_the_terms($post->ID, 'team_category');	
	
		$alt_image 	= get_field('member_alt_image');
		$team_members[$i]['alt_image']	= $alt_image['url'];

		$i++;
	}
	return $team_members;
}

function get_team() {
	$team = get_team_data();
	
	$html = '<div class="row">';
	
	
	if ( !$team ) 
		return false;
	
	foreach ( $team as $person ) {
		$image 	= $person['photo'];
		$bio 	= $person['bio'];
		$use_lazy = false;
		
		if ( !$bio ) $bio = '';
	
		$html .= '<div class="row bio-row">';
		
		if ( $image ) {	

			$html .= '<div class="columns small-3 medium-3 large-3 bio-image">';
			if ( $use_lazy ){
				$html .= '<img class="img-responsive lazyimg" data-original="' . $image . '" />';
			} else {
				$html .= '<img class="img-responsive" src="' . $image . '" />';
			}
			$html .= '</div>';
			
			$html .= '<div class="columns small-9 medium-9 large-9">';
		} else {
			$html .= '<div class="columns small-3 medium-3 large-3 bio-image">';
			//$html .= '<img class="img-responsive lazyimg" data-original="' . $image . '" />';
			$html .= '</div>';
			
			$html .= '<div class="columns small-9 medium-9 large-9">';
		}
		
		
		
		$html .= '<div class="bio-name">' . $person['name'] . '</div>';
		
		$html .= '<div class="bio-title">' . $person['title'] . '</div>';
		$html .= $bio;
		$html .= '</div>';
		
		$html .= '</div>';
	}
	
	$html .= '</div>';
	
	return $html;
}

add_shortcode( 'team', 'get_team' );


function get_team_grid() {
	$team = get_team_data();
	$use_lazy = false;
	$html = '<div class="row team-grid">';
	
		
	if ( !$team ) 
		return false;
	
	foreach ( $team as $person ) {
		$image 	= $person['photo'];
		
		if ( $image ) {	
			$html .= '<div class="columns small-4 medium-3 large-2 bio-image">';
			if ( $use_lazy ){
				$html .= '<img class="img-responsive lazyimg" data-original="' . $image . '" />';
			} else {
				$html .= '<img class="img-responsive" src="' . $image . '" />';
			}
			$html .= '<div class="bio-name">' . $person['name'] . '</div>';
			$html .= '</div>';
			
		} else {
			// nothing
		}
		
	}
	
	$html .= '</div>';
	
	return $html;
}

add_shortcode( 'team_grid', 'get_team_grid' );


function get_team_grid_orbit($atts) {
	extract(shortcode_atts(array(
      		'terms' => '',
   	), $atts));
	$team = get_team_data('', 'menu_order', $terms);
	$team_array = array();

	// filter team member without a photo
	foreach ( $team as $index => $data ) {
		if ( $data['photo']) {
			$team_array[] = $data; // new array
		}
	}

	// split array for use with orbit slides
	$chunk = array_chunk($team_array, 12);

	$html = '<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="autoPlay:false"> 
  <ul class="orbit-container">';

    $i = 0;
    $active_slide = 'is-active ';
    foreach ( $chunk as $team ) {
    	if ( $i > 0 ) $active_slide = '';
	    $html .= '<li class="' . $active_slide .'orbit-slide">';
		$html .= '<div class="row team-grid">';
		
			
		if ( !$team ) 
			return false;
		
		foreach ( $team as $person ) {
			$image 			= $person['photo'];
			$dual 			= '';
			$dual_bg_image 	= $person['alt_image'];
			$use_lazy		= true;
			
			if ( $image ) {	
				if ($person['alt_image']) {
					$dual 			= ' dual-image';
					$dual_bg_image	= ' style="background-image: url(\'' . $person['alt_image'] . '\');"';
				}
				$html .= '<div class="columns xsmall-6 small-4 medium-4 large-3 xlarge-2 bio-image">';
				$html .= '<a class="team-image-link" href="' . get_site_url() . '/our-team/#' . str_replace(' ', '_', strtolower($person['name'])) . '"' . $dual_bg_image . '>';
				if ( $use_lazy ) {
					$html .= '<img width="446" height="600" class="img-responsive lazyimg team-image' . $dual . '" data-original="' . $image . '" />';
				} else {
					$html .= '<img class="img-responsive team-image' . $dual . '" src="' . $image . '" />';
				}
				$html .= '</a>';
				$html .= '<div class="bio-name"><a href="' . get_site_url() . '/our-team/#' . str_replace(' ', '_', strtolower($person['name'])) . '">' . $person['name'] . '</a></div>';
				$html .= '</div>';
				
			} else {
				// nothing
			}
			
		}
		
		$html .= '</div>';
		$html .= ' </li>';
		$i++;

	} // end foreach

	$html .= '
	  </ul>';

	$bullets ='
	  <nav class="orbit-bullets">';
      
    $i = 0;
    $is_active = ' class="is-active"';  

	foreach ( $chunk as $team ) {
		if ( $i > 0 ) $is_active = '';
		$bullets .= '<button' . $is_active . ' data-slide="' . $i . '"><span class="show-for-sr">Slide</span></button>';
		$i++;
	}
	  $bullets .= '</nav>';

	if ( count($chunk) < 2 ) $bullets = '';	
	$html .= $bullets;
	$html .='</div>';
	
	return $html;
}

add_shortcode( 'team_grid_orbit', 'get_team_grid_orbit' );


/* PROPERTIES */
function get_property_data($property_id = '', $posts_per_page = 0, $type = '', $category_slug = '') {
	$properties 	= array();
	$i				= 0;
	if ($posts_per_page < 1 OR !$posts_per_page) { 
    

		$args = array(
			'post_type' => 'properties',
			'posts_per_page' => -1,
            'post_status' => 'publish',
  			'nopaging'			=> true,
            'orderby'   => 'menu_order',
            'order' => 'ASC'
              
		);
	} else {
	$args = array(
		'post_type' => 'properties',
        'post_status' => 'publish',
		'posts_per_page'	=> $posts_per_page
		);
	}
	if ( $type == 'sold' ) {

		$args['meta_query'] = array(
				array(
					'key'	  	=> 'property_status_sold',
					'value'	  	=> '1',
					'compare' 	=> '=',
				)
			);
	}

	if ( $type == 'active' ) {

		$args['meta_query'] = array(
				'relation'		=> 'OR',
				array(
					'key'	  	=> 'property_status_sold',
					'value'	  	=> '1',
					'compare' 	=> '!=',
				),
				array(
					'key'	  	=> 'property_status_sold',
					'compare'  	=> 'NOT EXISTS',
				)
			);
	}

	if ( $category_slug ) {
		$args['tax_query'] = array(
                array(
                    'taxonomy' => 'properties_category',
                    'field' => 'slug',
                    'terms' => array ($category_slug)
                )
            );
	}

    if ( $property_id ) {
		if ( is_array($property_id)) {
			$args['post__in'] = $property_id;
            $args['orderby'] = 'post__in';
		} else {
			$args['p'] = $property_id;		
		}
	}

	$query = new WP_Query( $args );

	while ( $query->have_posts() ) {
		$query->the_post();
		$post_title						= get_the_title();
		$properties[$i]['street'] 		= get_field('property_street');
		$thumb                       	= wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
        $properties[$i]['thumb']     	= $thumb[0];
		$properties[$i]['price'] 		= get_field('property_price');
		$properties[$i]['description']	= get_field('property_description');
		$properties[$i]['pdf'] 			= get_field('property_pdf_document');
		$properties[$i]['is_sold'] 		= get_field('property_status_sold');
		$properties[$i]['case_study']	= get_field('property_related_case_study');

        
		$properties[$i]['name']			= $post_title;

		if ( $properties[$i]['street'] ) {
			$properties[$i]['name']		= $properties[$i]['street'];
		}

		$properties[$i]['street_2']		= get_field('property_street_2');
		$properties[$i]['city']			= get_field('property_city');
		$properties[$i]['state']		= get_field('property_state');
		$properties[$i]['zip']			= get_field('property_zip');
		$properties[$i]['area']			= get_field('property_area');
       
		$properties[$i]['agent']		= get_field('property_agent'); 
        $properties[$i]['ID']        	= get_the_ID();

		$i++;
	}
	return $properties;
}


function get_properties($post_id = '', $posts_per_page = 0, $type = '', $category_slug = '') {
	$properties = get_property_data($post_id, $posts_per_page, $type, $category_slug);
	
	
		
	if ( !$properties ) 
		return false;

	$html = '<div class="row property-grid collapse">';
	
	foreach ( $properties as $property ) {
		$image 					= $property['thumb'];
		$property_status_sold 	= $property['is_sold'];
		$property_pdf_document	= $property['pdf'];

		$agent			= get_team_data($property['agent']);
		$agent_email 		= $agent[0]['email'];
		$html .= '<div id="property' . $property['ID'] . '" class="medium-6 large-4 columns">';
		$html .= '<div class="image-wrapper overlay-fade-in" style="height: 300px;background:url(\'' . $image . '\')no-repeat center center;background-size:cover;">';

		if ( $image ) {	
			//$html .= '<img class="img-responsive" src="' . $image . '" />';
		}
		
		$html .= '<div class="image-overlay-content">';
	    $html .=	'<h2 class="address">' . $property['street'] . '<br />' . $property['city'] . ', ' . $property['state'];
        $html .= '</h2>';
	    $html .=	'<p class="price">' . $property['price'] . '</p>';
	    $html .=    '<p class="description">' . $property['description'] . '</p>';
	    //$html .=    '<p>' . $property['units'] . '</p>';
		
		if ( $agent_email ) {
			$html .=    '<p class="description"><a style="color:white;text-transform:uppercase;border:solid 1px white;display:inline-block;padding:6px;margin-top:20px;position:relative;" href="mailto:' . $agent_email . '">Contact Agent</a></p>';
		}
	
		$html .= '</div>';	

		if ( $property_status_sold ) {
			$sold_link = '/concord/case-studies/';
			//print_r($property['case_study']);
			if ( $case_study_link = $property['case_study'] ) $sold_link = $case_study_link->guid;
			$html .= '<a href="' . $sold_link . '" class="grid-icon triangle sold"><span class="text-rotate">Sold</span></a>';
		}

		if ( $property_pdf_document && !$property_status_sold ) {
			$html .= '<a href="' . $property_pdf_document . '" target="_blank" class="grid-icon triangle download"><i class="fa fa-download" aria-hidden="true"></i></a>';
		}

		$html .= '</div>';			
		
		
		$html .= '</div>';
		
	}
	
	$html .= '</div>';
	
	return $html;
}

add_shortcode( 'properties', 'get_properties' );

function get_case_studies_data($post_id = '', $posts_per_page = false, $service_id = false) {
	$data_array 	= array();
	$i				= 0;
	if (!$posts_per_page) $posts_per_page = '-1';
	$args = array(
		'post_type' 		=> 'case_studies',
        'post_status' => 'publish',
		'posts_per_page'	=> $posts_per_page,
        'orderby'   => 'menu_order',
        'order' => 'ASC'

	);

	if ( $post_id ) {
		if ( is_array($post_id)) {
			$args['post__in'] = $post_id;
            $args['orderby'] = 'post__in';
            
		} else {
			$args['p'] = $post_id;		
		}
	}

	if ( $service_id ) {
		$args['meta_query'] = array(
			array(
				'key' => 'concord_services', // name of custom field
				'value' => '"' . $service_id . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
				'compare' => 'LIKE'
			)
		);
	}

	$query = new WP_Query( $args );

	while ( $query->have_posts() ) {
		$query->the_post();
		$data_array[$i]['id']				= get_the_ID();
		$data_array[$i]['title'] 			= get_the_title();
		$data_array[$i]['name'] 			= get_the_title();
		$data_array[$i]['content']			= apply_filters('the_content', get_the_content());
		$data_array[$i]['link']				= get_permalink();
		$data_array[$i]['anchor']			= basename(get_permalink());
		//$data_array[$i]['thumb']			= wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		$data_array[$i]['services']			= get_field('concord_services');
		$data_array[$i]['street']			= get_field('address_street');
		$data_array[$i]['city']				= get_field('address_city');
		$data_array[$i]['state']			= get_field('address_state');
		$data_array[$i]['zip']				= get_field('address_zip');
		
		$data_array[$i]['quote']			= get_field('case_study_quote');
		$data_array[$i]['quote_person']		= get_field('case_study_quote_person');
		$data_array[$i]['quote_link']		= get_field('case_study_quote_link');
		
		$data_array[$i]['img_banner']		= get_field('cs_single_main_banner');
		$data_array[$i]['img_related']		= get_field('cs_related_image');
		$img_featured                   	= get_field('cs_featured_cover_image');

		$data_array[$i]['img_banner']		= $data_array[$i]['img_banner']['url'];
		$data_array[$i]['img_related']		= $data_array[$i]['img_related']['url'];
		$data_array[$i]['img_featured']		= $img_featured['url'];
        $data_array[$i]['img_featured_m']	= $img_featured['sizes']['medium'];

		$i++;
	}
	return $data_array;
}

function get_case_studies_orbit($post_id = '', $posts_per_page = false) {
    $properties = get_case_studies_data($post_id, $posts_per_page);
    $properties_array = array();

    // filter team member without a photo
	foreach ( $properties as $index => $data ) {
	    $properties_array[] = $data; // new array	
	}

	// split array for use with orbit slides
	$chunk = array_chunk($properties_array, 2);

	$html = '<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-options="autoPlay:false;">
  <ul class="orbit-container">';

    $i = 0;
    $active_slide = 'is-active ';
    foreach ( $chunk as $properties ) {
    	if ( $i > 0 ) $active_slide = '';
	    $html .= '<li class="' . $active_slide .'orbit-slide">';
		$html .= '<div class="row case-study-grid collapse">';		
			
		if ( !$properties ) 
			return false;
					
			////////


			//if (count($properties) % 2 == 0){
		        $col_class = 'medium-6 large-6';
		   // } else {
		    //    $col_class = 'medium-6 large-6 odd';
		   // }
			foreach ( $properties as $property ) {
				$image 	= $property['img_featured_m'];
				
				$html .= '<div class="' . $col_class . ' columns">';
				$html .= '<div class="image-wrapper overlay-fade-in" style="height: 350px;background:url(\'' . $image . '\')no-repeat center center;background-size:cover;">';

				if ( $image ) {	
					//$html .= '<img class="img-responsive" src="' . $image . '" />';
				}
				
				$html .= '<div class="image-overlay-content">';
				$html .= '<a class="case-study-link" href="' . $property['link'] . '"></a>';
			    $html .=	'<h2><span>' . $property['street'] . '</span>,<span>&nbsp;' . $property['city'] . '</span> ' . $property['zip'] . '</h2>';
//$html .= '<h2>' . $property['name'] . '</h2>';
			    //$html .=	'<p class="price">' . $property['price'] . '</p>';
			    //$html .=    '<p>' . $property['type'] . '</p>';
			    //$html .=    '<p>' . $property['units'] . '</p>';

			   
			   if ( count ( $property['services']) > 1 ) {
				    $html .= '<ul class="bullet-list">';
				    $html .= '<li class="bullet-list-title">What we did for our client:</li>';
					foreach ($property['services'] as $concord_service) {
						$html .= '<li>' . $concord_service->post_title . '</li>';
					}
			  		$html .=  '</ul>';
			  	}

				$html .= '</div>';	

				
				$html .= '</div>';			
				
				
				$html .= '</div>';


			////////
			
		}
		
		$html .= '</div>';
		$html .= ' </li>';
		$i++;

	} // end foreach

	$html .= '
	  </ul>
	  <nav class="orbit-bullets">';

	$i = 0;
	$is_active = ' class="is-active"';  

	foreach ( $chunk as $properties ) {
		if ( $i > 0 ) $is_active = '';
		$html .= '<button' . $is_active . ' data-slide="' . $i . '"><span class="show-for-sr">Slide</span></button>';
		$i++;
	}

	$html .='
	  </nav>
	</div>';
	
	return $html;
    
}

function get_case_studies_grid($post_id = '', $posts_per_page = 0) {
	$properties = get_case_studies_data($post_id, $posts_per_page);

	$html = '<div class="row">';
		
	if ( !$properties ) 
		return false;

	$html .= '<div class="row case-study-grid collapse">';
    /*if ( count($properties) == 3 ) {
        $col_class = 'medium-6 large-6';
    } elseif ( count($properties) == 1 ) {
        $col_class = $col_class = 'medium-6 large-6';
    } else {
        $col_class = 'medium-6 large-6';
    }
    */
    if (count($properties) % 2 == 0){
        $col_class = 'medium-6 large-6';
    } else {
        $col_class = 'medium-6 large-6 odd';
    }
	foreach ( $properties as $property ) {
		$image 	= $property['img_featured'];
		
		$html .= '<div class="' . $col_class . ' columns">';
		$html .= '<div class="image-wrapper overlay-fade-in" style="height: 350px;background:url(\'' . $image . '\')no-repeat center center;background-size:cover;">';

		if ( $image ) {	
			//$html .= '<img class="img-responsive" src="' . $image . '" />';
		}
		
		$html .= '<div class="image-overlay-content">';
		$html .= '<a class="case-study-link" href="' . $property['link'] . '"></a>';
	    //$html .=	'<h2>' . $property['name'] . '</h2>';
        $html .=	'<h2><span>' . $property['street'] . '</span>,<span>&nbsp;' . $property['city'] . '</span> ' . $property['zip'] . '</h2>';

	    //$html .=	'<p class="price">' . $property['price'] . '</p>';
	    //$html .=    '<p>' . $property['type'] . '</p>';
	    //$html .=    '<p>' . $property['units'] . '</p>';

	   
	   if ( count ( $property['services']) > 1 ) {
		    $html .= '<ul class="bullet-list">';
		    $html .= '<li class="bullet-list-title">What we did for our client:</li>';
			foreach ($property['services'] as $concord_service) {
				$html .= '<li>' . $concord_service->post_title . '</li>';
			}
	  		$html .=  '</ul>';
	  	}

		$html .= '</div>';	

		
		$html .= '</div>';			
		
		
		$html .= '</div>';
		
	}
	
	$html .= '</div>';
	
	return $html;
}

add_shortcode( 'case_studies', 'get_case_studies' );


function get_case_studies_grid_overlay($post_id = '', $posts_per_page = 0, $service_id = false) {
	$properties = get_case_studies_data($post_id, $posts_per_page, $service_id);

	$html = '<div class="row">';
		
	if ( !$properties ) 
		return false;

	$html .= '<div class="row case-study-grid case-study-overlay-white collapse">';
	$count = count($properties);
	foreach ( $properties as $property ) {
		$image 	= $property['img_featured'];
		
		if ( $count == 2 ) {
			$html .= '<div class="medium-6 large-6 columns">';
		} elseif ( $count == 3 ) {
			$html .= '<div class="medium-4 large-4 columns">';
		} else {
			$html .= '<div class="columns">';
		}
		$html .= '<div class="image-wrapper overlay-fade-in" style="height: 350px;background:url(\'' . $image . '\')no-repeat center center;background-size:cover;">';

		if ( $image ) {	
			//$html .= '<img class="img-responsive" src="' . $image . '" />';
		}
		
		$html .= '<div class="overlay-white">';
		$html .= '<p class="top-title">Case Study:</p>';
		$html .= '<div class="address-wrap">';
        $html .= '<a class="case-study-link" href="' . $property['link'] . '"></a>';
	    //$html .=	'<h2>' . $property['name'] . '</h2>';
        $html .=	'<h2><span>' . $property['street'] . '</span>,<span>&nbsp;' . $property['city'] . '</span> ' . $property['zip'] . '</h2>';

		$html .= '<p>' . $property['street'] . '<br />' . $property['city']. ', ' . $property['state'] . '<br />' . $property['zip'] . '</p>';
		$html .= '</div>';
	    
		$html .= '</div>';	

		
		$html .= '</div>';			
		
		
		$html .= '</div>';
		
	}
	
	$html .= '</div>';
	
	return $html;
}

function get_services_gallery($service_id = false) {
	$gallery = get_field('services_gallery', $service_id);

	$html = '<div class="row">';
		
	if ( !$gallery ) 
		return false;

	$html .= '<div class="row case-study-grid case-study-overlay-white collapse">';
	
	$count = count($gallery);
	foreach ( $gallery as $image ) {

		if ( $count == 2 ) {
			$html .= '<div class="medium-6 large-6 columns">';
		} elseif ( $count == 3 ) {
			$html .= '<div class="medium-4 large-4 columns">';
		} else {
			$html .= '<div class="columns">';
		}
		$html .= '<div class="image-wrapper overlay-fade-in" style="height: 350px;background:url(\'' . $image['url'] . '\')no-repeat center center;background-size:cover;">';
		
		$html .= '</div>';
		$html .= '</div>';

		}
	
	$html .= '</div>';
	
	return $html;
}

function get_press_grid($post_id = '', $posts_per_page = 0) {
	$items = get_press_data($post_id, $posts_per_page);

	$html = '<div class="row">';
		
	if ( !$items ) 
		return false;

	$html .= '<div class="row property-grid press-grid collapse" style="margin-top:2em;clear:both;">';
	
	foreach ( $items as $item ) {
		$image 	= $item['photo'];
		
		$html .= '<div class="medium-6 large-4 columns">';
		$html .= '<div class="image-wrapper overlay-fade-in" style="height: 350px;background:url(\'' . $image . '\')no-repeat center center;background-size:cover;">';

		if ( $item['link_external'] ) {	
			$html .= '<a class="press-link" target="_blank" href="' . $item['link_external'] . '" />&nbsp;</a>';
		}
		
		$html .= '<div class="image-overlay-content">';
	    $html .=	'<h2>' . $item['title'] . '</h2>';
	   
		$html .= '</div>';	

		
		$html .= '</div>';			
		
		
		$html .= '</div>';
		
	}
	
	$html .= '</div>';
	
	return $html;
}

function custom_taxonomies_terms_links() {
 
    // Get post type by post.
    $post_type = 'team_members';
 
    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
            $out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "\n</ul>\n";
        }
    }
    return implode( '', $out );
}

show_admin_bar( false );

/* CUSTOM WP QUERY SORTING */
function posts_orderby_lastname ($orderby_statement) 
{
	
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
	
}
if ( is_post_type_archive('team_members') ) {
add_filter( 'posts_orderby' , 'posts_orderby_lastname' );
}
   

