<?php 
/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Staff', 'post type general name'),
    'singular_name' => _x('Staff Member', 'post type singular name'),
    'add_new' => _x('Add New', 'Staff Member'),
    'add_new_item' => __('Add New Staff Member'),
    'edit_item' => __('Edit Staff Member'),
    'new_item' => __('New Staff Member'),
    'view_item' => __('View Staff Member'),
    'search_items' => __('Search Staff'),
    'not_found' =>  __('No Staff found'),
    'not_found_in_trash' => __('No Staff found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Staff'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('staff',$args); // name used in query
  
  // Add more between here
  
  // and here
  
  } // close custom post type

  /*##############################################
Custom Taxonomies     */
add_action( 'init', 'build_taxonomies', 0 );

function build_taxonomies() {
// custom tax
	register_taxonomy( 'staff_type', 'staff',
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Staff Type',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'staff-type' ),
			'_builtin' => true
		) );

} // End build taxonomies