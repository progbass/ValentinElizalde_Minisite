<?php
add_filter('show_admin_bar', '__return_false');



add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
function theme_enqueue_scripts(){

	wp_register_script('modernizr', get_bloginfo('template_url') . '/js/modernizr.js');
	wp_enqueue_script('modernizr');

	wp_register_script('require', get_bloginfo('template_url') . '/bower_components/requirejs/require.js', array(), false, true);
	$app_base = get_template_directory_uri();
	wp_enqueue_script('require');
	wp_localize_script( 'require', 'require', array(
	    'baseUrl' => $app_base
	));

	wp_register_script('global', get_bloginfo('template_url') . '/js/global.js', array('require'), false, true);
	wp_enqueue_script('global');


	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Holtwood+One+SC|Open+Sans:400,400i,700,700i,800,800i');
	//wp_enqueue_style('global', get_bloginfo('template_url') . '/css/global.css');
	wp_enqueue_style('global', get_bloginfo('template_url') . '/css/global.css');
}

//Add Featured Image Support
add_theme_support('post-thumbnails');

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

function register_menus() {
	register_nav_menus(
		array(
			'main-nav' => 'Main Navigation',
			'secondary-nav' => 'Secondary Navigation',
			'sidebar-menu' => 'Sidebar Menu'
		)
	);
}
add_action( 'init', 'register_menus' );


function get_short_title( $title ) {
	$max = 65;
	if( strlen( $title ) > $max ) {
		return substr( $title, 0, $max ). " &hellip;";
	} else {
		return $title;
	}
}
