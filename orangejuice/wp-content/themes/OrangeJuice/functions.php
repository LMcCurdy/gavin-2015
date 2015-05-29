<?php
if ( function_exists( 'add_theme_support' ) ):
  add_theme_support( 'menus' );
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-thumbnails' );
endif;



function register_my_menus() {
  register_nav_menus(
    array(
      'mainmenu' => __( 'Main Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

define('WP_MEMORY_LIMIT', '64M');

/*
Create a sidebar in the Widgets section
*/
/*
if ( function_exists('register_sidebars') ):
  register_sidebar(array(
    'name'=>'Logo',
	'id'=>'logo',
    'before_title'=>'',
    'after_title'=>'',
	'before_widget' => '',
	'after_widget'  => ''
  ));
endif;
*/



add_editor_style( 'editor-style.css' );



function my_init_method() {
  if (is_admin() == false ):
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js');
    wp_enqueue_script( 'jquery' );
  endif;
}    
add_action('init', 'my_init_method');



/*
Remove the automatic p tag - I would advise not disabling this; makes it easier on the client to update.
*/
// remove_filter('the_content', 'wpautop');



// remove width and height from images
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/*
function testshortcode_shortcode( $atts, $content = null ) {
	return '<article class="testshortcode">' . $content . '</article>';
}
add_shortcode( 'testshortcode', 'testshortcode_shortcode' );
*/



/**
 * Restricts certain menu items from appearing the WP Admin area. Does not
 * affect Administrator users.
 *
 * @action admin_menu
 */
 /*
function restrict_admin_menu_items() {
 	
	$user_id = get_current_user_id();
	
 	// Don't restrict Administrator users.
	if ( $user_id!="2" )
		return;
 
 	// Array of the menu item slugs you want to remove.
	$restricted = array(
		'menu-posts', // Posts
		'menu-comments', // Comments
		'menu-plugins', // Plugins
		'menu-users', // Users
		'menu-tools', // Tools
		'menu-settings', // Settings
		'toplevel_page_wpseo_dashboard', // SEO
	);
 
 	global $menu;
 
	foreach ( $menu as $item => $data ) {
 
		if ( ! isset( $data[5] ) ) {
			continue; // Move along if the current $item doesn't have a slug.
		} elseif ( in_array( $data[5], $restricted ) ) {
			unset( $menu[$item] ); // Remove the current $item from the $menu.
		}
	}
}
add_action( 'admin_menu', 'restrict_admin_menu_items' );
*/
?>
