<?php

$homepage = get_option( 'show_on_front');
if( $homepage == "page" ) {
	$meta = get_post_custom_values("_wp_page_template",get_option( 'page_on_front'));
	if($homepage == "page" && $meta[0] == "template-homepage.php") {$has_homepage=true;} else {$has_homepage=false;}
}
	
	
function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array( 
				'top-menu' => __('Top Menu','quadrum-theme'),
				'main-menu' => __('Main Menu','quadrum-theme'),
				'secondary-menu' => __('Secondary Menu','quadrum-theme'),
				'footer-menu' => __('Footer Menu','quadrum-theme'),
			)
		);
	}	
}



function orange_register_sidebar($name, $id, $description){
	register_sidebar(array('name'=>$name,
		'id' => $id,
		'description' => $description,
		'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
	));
}


/* -------------------------------------------------------------------------*
 * 							DEFAULT SIDEBARS								*
 * -------------------------------------------------------------------------*/

$orange_sidebars=array(
	array('name'=>'Default Sidebar', 'id'=>'default','description' => __('The default page sidebar.','quadrum-theme')),
	array('name'=>'Footer', 'id'=>'footer', 'description' => __('Footer widget area, supports up to 3 widgets.','quadrum-theme')),
	array('name'=>'Woocommerce', 'id'=>'ot_woocommerce', 'description' => __('Woocommerce Page Sidebar','quadrum-theme')),	
	array('name'=>'bbPress', 'id'=>'ot_bbpress', 'description' => __('bbPress Page Sidebar','quadrum-theme')),
	array('name'=>'BuddyPress', 'id'=>'ot_buddypress', 'description' => __('BuddyPress Page Sidebar','quadrum-theme'))	
);	
	
$sidebar_strings = get_option(THEME_NAME.'_sidebar_names');
$generated_sidebars = explode("|*|", $sidebar_strings);
array_pop($generated_sidebars);
$orange_generated_sidebars=array();
	
foreach($generated_sidebars as $sidebar) {
	$orange_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar), 'description'=>$sidebar);
	$orange_generated_sidebars[]=array('name'=>$sidebar, 'id'=>convert_to_class($sidebar), 'description'=>$sidebar);
}
 
 /* -------------------------------------------------------------------------*
 * 							REGISTER ALL SIDEBARS
 * -------------------------------------------------------------------------*/

if (function_exists('register_sidebar')) {
	
	//register the sidebars
	foreach($orange_sidebars as $sidebar){
		orange_register_sidebar($sidebar['name'], $sidebar['id'], $sidebar['description']);
	}
	
}

add_action('init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' );
add_theme_support( "title-tag" )
?>