<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package adria
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function adria_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'adria_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function adria_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'adria_pingback_header' );


/**==================================
 * Shortcode for Social Icons.
====================================*/
function get_social_icons() {
	if( have_rows('social_icons', 'option') ) : ?>
	<div class="text-sm font-medium md:flex space-x-4">
		<?php 
		while( have_rows('social_icons', 'option') ) : the_row();
		$icon    = get_sub_field('icon');
		$name    = get_sub_field('name');
		$url     = get_sub_field('url');
		$checked = get_sub_field('page_to_show');
	
		if( $checked && in_array('aboutme', $checked) ) :
		?>
		<a href="<?php echo $url ?>" class="flex items-center md:flex-col lg:mt-0 text-xl">
			<?php echo $icon ?>
		</a>
		<?php 
		endif;
		endwhile;
		?>
	</div>
	<?php endif;
}
     
// Add a shortcode that executes our function
add_shortcode( 'sc_social_icons', 'get_social_icons' );
    
//Allow Text widgets to execute shortcodes
add_filter('widget_text', 'do_shortcode');

/* ========================
 * Create new Post Type
 =========================== */
 
 function create_posttype() {
	
	// Courses Post Type
    register_post_type( 'courses',
    // PT Options
        array(
            'labels' 		=> array(
                'name' 			=> __( 'Courses' ),
                'singular_name' => __( 'Course' )
            ),
			'supports' 		=> array( 'title', 'editor', 'thumbnail' ),
            'public' 		=> true,
            'has_archive' 	=> true,
            'rewrite' 		=> array('slug' => 'courses'),
            'show_in_rest' 	=> true,
			'menu_position' => 23,
			'menu_icon'		=> 'dashicons-welcome-learn-more'
        )
    );

	// Artworks Post Type
	register_post_type( 'artworks',
	// PT Options
		array(
			'labels' 		=> array(
				'name' 			=> __( 'Artworks' ),
				'singular_name' => __( 'Artwork' )
			),
			'supports' 		=> array( 'title', 'editor', 'thumbnail' ),
			'public' 		=> true,
			'has_archive' 	=> true,
			'rewrite' 		=> array('slug' => 'artworks'),
			'show_in_rest' 	=> true,
			'menu_position' => 22,
			'menu_icon'		=> 'dashicons-art',
			'taxonomies'  	=> array('artwork_category'),
		)
	);

	// Productions Post Type
    register_post_type( 'productions',
    // PT Options
        array(
            'labels' 		=> array(
                'name' 			=> __( 'Productions' ),
                'singular_name' => __( 'Production' )
            ),
			'supports' 		=> array( 'title', 'editor', 'thumbnail' ),
            'public' 		=> true,
            'has_archive' 	=> true,
            'rewrite' 		=> array('slug' => 'productions'),
            'show_in_rest' 	=> true,
			'menu_position' => 24,
			'menu_icon'		=> 'dashicons-video-alt'
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


/**========================
	Create Taxonomies.
===========================*/
//Artwork Categories Taxonomy
function create_artwork_category_taxonomy() {

	$labels = array(
	  'name' => _x( 'Artwork Categories', 'taxonomy general name' ),
	  'singular_name' => _x( 'Artwork Category', 'taxonomy singular name' ),
	  'search_items' =>  __( 'Search Artwork Categories' ),
	  'popular_items' => __( 'Popular Artwork Categories' ),
	  'all_items' => __( 'All Artwork Categories' ),
	  'parent_item' => null,
	  'parent_item_colon' => null,
	  'edit_item' => __( 'Edit Artwork Category' ), 
	  'update_item' => __( 'Update  Artwork' ),
	  'add_new_item' => __( 'Add New Artwork Category' ),
	  'new_item_name' => __( 'New Artwork Category Name' ),
	  'separate_items_with_commas' => __( 'Separate topics with commas' ),
	  'add_or_remove_items' => __( 'Add or remove Artwork Categories' ),
	  'choose_from_most_used' => __( 'Choose from the most used Artwork Categories' ),
	  'menu_name' => __( 'Categories' ),
	); 

	register_taxonomy('artwork_category','artworks',array(
	  'hierarchical' => true,
	  'public'       => true,
	  'labels' => $labels,
	  'show_ui' => true,
	  'show_admin_column' => true,
	  'show_in_rest' => true,
	  'update_count_callback' => '_update_post_term_count',
	  'query_var' => true,
	//   'rewrite'      => array('slug' => 'artworks', 'with_front' => false),
	  'supports' => array( 'thumbnail' ),
	));
  }

  add_action( 'init', 'create_artwork_category_taxonomy', 0 );


		