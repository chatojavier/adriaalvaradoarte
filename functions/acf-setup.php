<?php

/* ----------------------------
 * Advance Custom Fields Setup
 ------------------------------- */

 // Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
// function my_acf_settings_show_admin( $show_admin ) {
//     return false;
// }

// Add Options Pages

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Options',
		'menu_title'	=> 'Opciones',
		'menu_slug' 	=> 'theme-general-settings',
        'position'      => '21',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Social Media Options',
		'menu_title'	=> 'Social Media',
		'parent_slug'	=> 'theme-general-settings',
	));
	
};


/* ----------------------------
 * Edit styles of admin page
 ------------------------------- */

add_action('admin_head', 'my_custom_admincss');
function my_custom_admincss() {
  echo '<style>
  	.select2-container:not(#acf-group_60120669bc8bf .select2-container) {
  	float: left;
  	width: 70% !important
  	}
    .icon_preview:not(#acf-group_60120669bc8bf .icon_preview) {
		float: right;
		width: 30%;
		text-align: center;
	}
	.acf-input .icon_preview i {
    	font-size: 30px;
    	color: #000;
	}
	#acf-group_606274f691fad .acf-field-true-false:after {
		content: "\f10d";
		color: #000;
		font-size: 30px;
		font-family: "Font Awesome 5 Free";
		padding-top: 2rem;
	}
	#acf-group_606274f691fad .acf-field-true-false .acf-input {
		margin-bottom: 0.5rem;
  </style>';
}