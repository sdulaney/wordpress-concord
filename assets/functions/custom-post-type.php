<?php
/* joints Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
function cpt_team_members() { 
	// creating (registering) the custom type 
	register_post_type( 'team_members', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Team Members', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Team Member', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Team Mebers', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Team Member', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Team Member', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Team Member', 'jointswp'), /* New Display Title */
			'view_item' => __('View Team Member', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Team Members', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Team Members custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-businessman', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'team', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'our-team', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'author', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'cpt_team_members');
	

function create_case_studies_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'jointswp' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'jointswp' ),
		'search_items'      => __( 'Search Category', 'jointswp' ),
		'all_items'         => __( 'All Category', 'jointswp' ),
		'parent_item'       => __( 'Parent Category', 'jointswp' ),
		'parent_item_colon' => __( 'Parent Category:', 'jointswp' ),
		'edit_item'         => __( 'Edit Category', 'jointswp' ),
		'update_item'       => __( 'Update Category', 'jointswp' ),
		'add_new_item'      => __( 'Add New Category', 'jointswp' ),
		'new_item_name'     => __( 'New Category Name', 'jointswp' ),
		'menu_name'         => __( 'Category', 'jointswp' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'case_studies_category' ),
	);

	
}


function create_properties_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'jointswp' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'jointswp' ),
		'search_items'      => __( 'Search Category', 'jointswp' ),
		'all_items'         => __( 'All Category', 'jointswp' ),
		'parent_item'       => __( 'Parent Category', 'jointswp' ),
		'parent_item_colon' => __( 'Parent Category:', 'jointswp' ),
		'edit_item'         => __( 'Edit Category', 'jointswp' ),
		'update_item'       => __( 'Update Category', 'jointswp' ),
		'add_new_item'      => __( 'Add New Category', 'jointswp' ),
		'new_item_name'     => __( 'New Category Name', 'jointswp' ),
		'menu_name'         => __( 'Category', 'jointswp' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'properties_category' ),
	);
	register_taxonomy('properties_category', array('properties'), $args);
}

function create_team_taxonomies() {
        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
                'name'              => _x( 'Categories', 'taxonomy general name', 'jointswp' ),
                'singular_name'     => _x( 'Category', 'taxonomy singular name', 'jointswp' ),
                'search_items'      => __( 'Search Category', 'jointswp' ),
                'all_items'         => __( 'All Category', 'jointswp' ),
                'parent_item'       => __( 'Parent Category', 'jointswp' ),
                'parent_item_colon' => __( 'Parent Category:', 'jointswp' ),
                'edit_item'         => __( 'Edit Category', 'jointswp' ),
                'update_item'       => __( 'Update Category', 'jointswp' ),
                'add_new_item'      => __( 'Add New Category', 'jointswp' ),
                'new_item_name'     => __( 'New Category Name', 'jointswp' ),
                'menu_name'         => __( 'Category', 'jointswp' ),
        );

        $args = array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => 'team_category' ),
        );
        register_taxonomy('team_category', array('team_members'), $args);
}

// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_team_taxonomies', 0 );
add_action( 'init', 'create_properties_taxonomies', 0 ); 
add_action( 'init', 'create_case_studies_taxonomies', 0 ); 
	
  
 // let's create the function for the custom type
function cpt_properties() { 
	// creating (registering) the custom type 
	register_post_type( 'properties', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Properties', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Properties', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Properties', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Property', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Property', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Team Property', 'jointswp'), /* New Display Title */
			'view_item' => __('View Team Property', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Properties', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Properties custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-admin-multisite', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'properties', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'properties', /* you can rename the slug here */
			'taxonomies'	=> array('properties_category'),
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */
	
} 

	// adding the function to the Wordpress init
	add_action( 'init', 'cpt_properties');  

 // let's create the function for the custom type
function cpt_case_studies() { 
	// creating (registering) the custom type 
	register_post_type( 'case_studies', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Case Studies', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Case Study', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Case Studies', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Case Study', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Case Study', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Case Study', 'jointswp'), /* New Display Title */
			'view_item' => __('View Case Study', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Case Studies', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Case Studies custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-portfolio', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'case-studies', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'case-studies', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			'taxonomies'	=> array('case_studies_taxonomies'),
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor')
	 	) /* end of options */
	); /* end of register post type */

	register_taxonomy_for_object_type('case_studies_category', 'case_studies');
} 

// adding the function to the Wordpress init
add_action( 'init', 'cpt_case_studies');

 // let's create the function for the custom type
function cpt_services() { 
	// creating (registering) the custom type 
	register_post_type( 'services', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Services', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Service', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Services', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Service', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Service', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Service', 'jointswp'), /* New Display Title */
			'view_item' => __('View Service', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Services', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Services custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-portfolio', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'services', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'services', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */
} 

// adding the function to the Wordpress init
add_action( 'init', 'cpt_services');

// let's create the function for the custom type
function cpt_careers() { 
	// creating (registering) the custom type 
	register_post_type( 'careers', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Careers', 'jointswp'), /* This is the Title of the Group */
			'singular_name' => __('Job', 'jointswp'), /* This is the individual type */
			'all_items' => __('All Jobs', 'jointswp'), /* the all items menu item */
			'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
			'add_new_item' => __('Add New Job', 'jointswp'), /* Add New Display Title */
			'edit' => __( 'Edit', 'jointswp' ), /* Edit Dialog */
			'edit_item' => __('Edit Job', 'jointswp'), /* Edit Display Title */
			'new_item' => __('New Job', 'jointswp'), /* New Display Title */
			'view_item' => __('View Jobs', 'jointswp'), /* View Display Title */
			'search_items' => __('Search Jobs', 'jointswp'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Careers custom post type', 'jointswp' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => 'dashicons-businessman', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array( 'slug' => 'careers', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'thumbnail')
	 	) /* end of options */
	); /* end of register post type */
} 

// adding the function to the Wordpress init
add_action( 'init', 'cpt_careers');
   
	
