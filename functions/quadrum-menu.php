<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
$prefix = THEME_NAME.'_';
$image = '<img src="'.THEME_IMAGE_CPANEL_URL.'logo-orangethemes-1.png" width="11" height="15" /> ';
$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
$aboutAuthor = get_option ( THEME_NAME."_about_author" ); 
$imageSize = get_option ( THEME_NAME."_image_size" );
$showSingleThumb = get_option ( THEME_NAME."_show_single_thumb" ); 
$similarPosts = get_option ( THEME_NAME."_similar_posts" ); 
$imageSize = get_option ( THEME_NAME."_image_size" ); 
$similarPostsGallery = get_option ( THEME_NAME."_similar_posts_gallery" ); 
$breakingSlider = get_option ( THEME_NAME."_breacking_news" ); 

$shopID = get_shop_page();
$contactID = ot_get_page("contact");
$galleryID = ot_get_page('gallery');
$homeID = ot_get_page('homepage');
$fullID = get_fullwidth_page();
$archiveID = get_archive_page();
$eventsID = get_events_page();
$menuID = get_menu_page();
$mapID = get_map_page();
$shareAll = get_option ( THEME_NAME."_share_all" ); 



if(isset($_GET['post'])) {
	$currentID = $_GET['post'];
} else {
	$currentID = 0;
}

global $box_array;

$box_array = array();

// block image
$box_array[] = array('id' => 'post-0','title' => ''.$image.__("Latest News Block (Style 2)",'quadrum-theme'),'page' => 'post', 'context' => 'side','priority' => 'low','fields' => array(array('name' => __("Background Image:",'quadrum-theme'),'std' => '','id' => $prefix. 'homepage_image','type'=> 'slider_image_box')),'size' => 10,'first' => 'yes');
$box_array[] = array( 'id' => 'post-1', 'title' => ''.$image.' '.__("Show Print Button",'quadrum-theme').'', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => ''.__("Show:",'quadrum-theme').'', 'std' => '', 'id' => $prefix. 'page_print', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'yes' );
$box_array[] = array( 'id' => 'post-4', 'title' => ''.$image.' '.__("Breaking Slider News",'quadrum-theme').'', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => ''.__("Show this news in the breaking news slider?",'quadrum-theme').'', 'std' => '', 'id' => $prefix. 'breaking_post', 'type'=> 'hide_show' ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'post-5', 'title' => ''.$image.' '.__("Show Breaking Slider?",'quadrum-theme').'', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => ''.__("Breaking Slider Category",'quadrum-theme').'', 'std' => 'slider_off', 'id' => $prefix. 'breaking_slider', 'type'=> 'breaking_cat' ) ), 'size' => 10, 'first' => 'no' );


$box_array[] = array( 'id' => 'post-7', 'title' => ''.$image.' '.__("Banner Code",'quadrum-theme').'', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => ''.__("Banner HTML Code",'quadrum-theme').'', 'std' => '', 'id' => $prefix. 'post_banner_code', 'type'=> 'textarea' ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array('id' => 'post-8', 'title' => ''.$image.__(" YouTube Video URL:",'quadrum-theme'),'page' => 'post','context' => 'normal','priority' => 'high','fields' => array(array('name' => __("URL:",'quadrum-theme'),'std' => '','id' => $prefix.'video','type'=> 'text')),'size' => 10,'first' => 'no' );
//post small sidebars 
$box_array[] = array( 'id' => 'sidebar-select-small', 'title' => ''.$image.__("Small Sidebar",'quadrum-theme'), 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select_small', 'type'=> 'sidebar_select_box_small' ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'sidebar-position-small', 'title' => ''.$image.__("Small Sidebar Position",'quadrum-theme'), 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position_small', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );	


if($similarPosts=="custom") {
	$box_array[] = array( 'id' => 'similar-post', 'title' => ''.$image.' Similar Posts by Category', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Similar Posts:', 'std' => 'hide', 'id' => $prefix. 'similar_posts', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
}
if($imageSize=="custom") {
	$box_array[] = array( 'id' => 'image-size-post', 'title' => ''.$image.' Image Size', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image Size:', 'std' => '', 'id' => $prefix. 'image_size', 'type'=> 'small_large' ) ), 'size' => 10, 'first' => 'no' );
}
$box_array[] = array( 'id' => 'page-1', 'title' => ''.$image.' '.__("Show Breaking Slider?",'quadrum-theme').'', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => ''.__("Breaking Slider Category",'quadrum-theme').'', 'std' => 'slider_off', 'id' => $prefix. 'breaking_slider', 'type'=> 'breaking_cat' ) ), 'size' => 10, 'first' => 'yes' );

if(!in_array($currentID, $homeID) && !in_array($currentID, $contactID) && !in_array($currentID, $galleryID) && !in_array($currentID, $archiveID) || $currentID==0) {
	$box_array[] = array( 'id' => 'page-7', 'title' => ''.$image.' '.__("Banner Code",'quadrum-theme').'', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => ''.__("Banner HTML Code",'quadrum-theme').'', 'std' => '', 'id' => $prefix. 'post_banner_code', 'type'=> 'textarea' ) ), 'size' => 10, 'first' => 'no' );
}
//gallery images
$box_array[] = array( 'id' => 'post-slider-images', 'title' => ''.$image.__("Gallery Images",'quadrum-theme'), 'page' => OT_POST_GALLERY, 'context' => 'side', 'priority' => 'low', 'fields' => array(array('name' => "", 'std' => '', 'id' => $prefix. 'gallery_images', 'type'=> 'image_select' ) ), 'size' => 0,'first' => 'no'  );


$box_array[] = array( 'id' => 'color-page', 'title' => ''.$image.' Page Title Color', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Page Color:', 'std' => get_option(THEME_NAME."_default_cat_color"), 'id' => $prefix. 'title_color', 'type'=> 'color' ) ), 'size' => 10, 'first' => 'yes' );


if($sidebarPosition=="custom") {
	$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => 'events-item', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );
}
$box_array[] = array( 'id' => 'sidebar-select-post', 'title' => ''.$image.' Main Sidebar', 'page' => 'events-item', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'no' );

$box_array[] = array( 'id' => 'show-image-post', 'title' => ''.$image.' Show Image In Single Post / News Page', 'page' => 'reviews-item', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'single_image', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );


//share buttons
if($shareAll=="custom") {
	$box_array[] = array( 'id' => 'share-post', 'title' => ''.$image.' Show Share Buttons', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show Share Buttons:', 'std' => 'hide', 'id' => $prefix. 'share_single', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
	if(!in_array($currentID, $contactID) && $currentID!=get_option('page_for_posts') && !in_array($currentID, $eventsID) && !in_array($currentID, $galleryID) && !in_array($currentID, $homeID) && !in_array($currentID, $menuID) && $currentID!=$fullID || isset($_POST['post_type']) || $currentID==0) {
		$box_array[] = array( 'id' => 'share-post', 'title' => ''.$image.' Show Share Buttons', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show Share Buttons:', 'std' => 'hide', 'id' => $prefix. 'share_single', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
	}
}

// post ratings
$box_array[] = array('id' => 'post-ratings', 'title' => ''.$image.__(" Ratings",'quadrum-theme'),'page' => 'post','context' => 'normal','priority' => 'high','fields' => array(array('name' => __("Enter the ratings like this - <b>Graphics:5; Gameplay:4,5; <br>Sound:3; Storyline:4</b>",'quadrum-theme'),'std' => '','id' => $prefix. 'ratings','type'=> 'textarea')),'size' => 10,'first' => 'no' );
$box_array[] = array('id' => 'post-ratings-summary', 'title' => ''.$image.__(" Summary",'quadrum-theme'),'page' => 'post','context' => 'normal','priority' => 'high','fields' => array(array('name' => __("Summary:",'quadrum-theme'),'std' => '','id' => $prefix.'summary','type'=> 'textarea')),'size' => 10,'first' => 'no' );

//page title
if(!in_array($currentID, $homeID)) {
	$box_array[] = array( 
		'id' => 'page-title', 
		'title' => ''.$image.' Show Page Title', 
		'page' => 'page', 
		'context' => 'normal', 
		'priority' => 'high', 
		'fields' => array(
			array(
				'name' => 'Show:', 
				'std' => '', 
				'id' => $prefix. 'title_show', 
				'type'=> 'yes_no' 
				) 
			), 
		'size' => 10, 
		'first' => 'no' 
	);

}


// contact settings
if(in_array($currentID, $contactID) || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'contact-email', 'title' => ''.$image.__("Contactform E-mail",'quadrum-theme'), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("E-mail",'quadrum-theme'), 'std' => '', 'id' => $prefix. 'contact_mail', 'type'=> 'text' ) ), 'size' => 10,'first' => 'yes'  );
	$box_array[] = array( 'id' => 'contact-map', 'title' => ''.$image.__("Google Map",'quadrum-theme'), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("URL",'quadrum-theme'), 'std' => '', 'id' => $prefix. 'map', 'type'=> 'text' ) ), 'size' => 10,'first' => 'no'  );
}

//gallery

$box_array[] = array( 'id' => 'gallery-type-box', 'title' => ''.$image.' Gallery Style', 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Gallery Style:', 'std' => '', 'id' => $prefix. 'gallery_style', 'type'=> 'gallery_style' ) ), 'size' => 10, 'first' => 'yes'  );
if($similarPostsGallery=="custom") {
	$box_array[] = array( 'id' => 'gallery-smilar-posts', 'title' => ''.$image.' Similar Posts', 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show:', 'std' => '', 'id' => $prefix. 'similar_posts', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no'  );	
}

//sidebar settings
$box_array[] = array( 'id' => 'sidebar-select-post', 'title' => ''.$image.' Main Sidebar', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'no' );
if($sidebarPosition=="custom") {
	$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );	
}



//sidebar settings
$box_array[] = array( 'id' => 'sidebar-select-box', 'title' => ''.$image.' Main Sidebar', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'yes'  );

if($sidebarPosition=="custom") {
	$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );
}

$box_array[] = array( 'id' => 'sidebar-select-small', 'title' => ''.$image.__("Small Sidebar",'quadrum-theme'), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select_small', 'type'=> 'sidebar_select_box_small' ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'sidebar-position-small', 'title' => ''.$image.__("Small Sidebar Position",'quadrum-theme'), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position_small', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );	



//sidebar settings in gallery item
$box_array[] = array( 'id' => 'sidebar-select-box', 'title' => ''.$image.' Main Sidebar', 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'yes'  );

if($sidebarPosition=="custom") {
	$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );
}

$box_array[] = array( 'id' => 'sidebar-select-small', 'title' => ''.$image.__("Small Sidebar",'quadrum-theme'), 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select_small', 'type'=> 'sidebar_select_box_small' ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'sidebar-position-small', 'title' => ''.$image.__("Small Sidebar Position",'quadrum-theme'), 'page' => OT_POST_GALLERY, 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position_small', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );	


//products page
$box_array[] = array( 'id' => 'sidebar-select-box', 'title' => ''.$image.' Main Sidebar', 'page' => 'product', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select', 'type'=> 'sidebar_select_box' ) ), 'size' => 10, 'first' => 'yes'  );

if($sidebarPosition=="custom") {
	$box_array[] = array( 'id' => 'sidebar-position-page', 'title' => ''.$image.' Sidebar Position', 'page' => 'product', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );
}

$box_array[] = array( 'id' => 'sidebar-select-small', 'title' => ''.$image.__("Small Sidebar",'quadrum-theme'), 'page' => 'product', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar name:', 'std' => '', 'id' => $prefix. 'sidebar_select_small', 'type'=> 'sidebar_select_box_small' ) ), 'size' => 10, 'first' => 'no' );
$box_array[] = array( 'id' => 'sidebar-position-small', 'title' => ''.$image.__("Small Sidebar Position",'quadrum-theme'), 'page' => 'product', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Sidebar position:', 'std' => '', 'id' => $prefix. 'sidebar_position_small', 'type'=> 'sidebar_position_box' ) ), 'size' => 10, 'first' => 'no' );	




//about author
if($aboutAuthor=="custom" && !in_array($currentID, $homeID) && !in_array($currentID, $contactID) && $currentID!=$galleryID && !in_array($currentID, $fullID)  && !in_array($currentID, $archiveID) || $currentID==0) {
	$box_array[] = array( 'id' => 'about-author-post', 'title' => ''.$image.' About Author', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'About Author:', 'std' => '', 'id' => $prefix. 'about_author', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
}

if($showSingleThumb=="on" && $currentID!=get_option('page_for_posts') && !in_array($currentID, $homeID) && !in_array($currentID, $archiveID) && !in_array($currentID, $contactID) && !in_array($currentID, $eventsID) && !in_array($currentID, $menuID) && !in_array($currentID, $galleryID) && !in_array($currentID, $fullID) || isset($_POST['post_type']) || $currentID==0) {
	$box_array[] = array( 'id' => 'show-image-post', 'title' => ''.$image.' Show Image In Single Post / News Page', 'page' => 'post', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'single_image', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
	$box_array[] = array( 'id' => 'show-image-page', 'title' => ''.$image.' Show Image In Single Page / News Page', 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Image:', 'std' => '', 'id' => $prefix. 'single_image', 'type'=> 'show_hide' ) ), 'size' => 10, 'first' => 'no' );
}


//events template
if(in_array($currentID, $eventsID) || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'post-count', 'title' => ''.$image.__("Post Count",'quadrum-theme'), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => __("Count",'quadrum-theme'), 'std' => '8', 'id' => $prefix. 'events_items', 'type'=> 'text' ) ), 'size' => 10, 'first' => 'no' );
}

//homepage 
if(in_array($currentID, $homeID) || isset($_POST['post_type'])) {
	$box_array[] = array( 'id' => 'layer-slider-settings', 'title' => ''.$image.__("Show Layer Slider",'quadrum-theme'), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Show', 'std' => '', 'id' => $prefix. 'layer_slider_settings', 'type'=> 'no_yes' ) ), 'size' => 10,'first' => 'yes'  );
	$box_array[] = array( 'id' => 'layer-slider', 'title' => ''.$image.__("Layer Slider",'quadrum-theme'), 'page' => 'page', 'context' => 'normal', 'priority' => 'high', 'fields' => array(array('name' => 'Slider', 'std' => '', 'id' => $prefix. 'layer_slider', 'type'=> 'layer_slider_select' ) ), 'size' => 10,'first' => 'no'  );

	$box_array[] = array( 
		'id' => 'home-drag-drop', 
		'title' => ''.$image.' Homepage Builder', 
		'page' => 'page', 
		'context' => 'normal', 
		'priority' => 'high', 
		'fields' => array(
			array(
				'name' => '', 
				'std' => '', 'id' => $prefix. 'home_drag_drop', 
				'type'=> 'home_drag_drop' 
				) 
			), 
		'size' => 0,
		'first' => 'no'  
	);
}

// Add meta box
function add_sticky_box() {
	global $box_array;
	
	foreach ($box_array as $box) {
		add_meta_box($box['id'], $box['title'], 'sticky_show_box', $box['page'], $box['context'], $box['priority'], array('content'=>$box, 'first'=>$box['first'], 'size'=>$box['size']));
	}

}

function sticky_show_box( $post, $metabox) {
	show_box_funtion($metabox['args']['content'], $metabox['args']['first'], $metabox['args']['size']);
}

// Callback function to show fields in meta box
function show_box_funtion($fields, $first='no', $width='60') {
	global $post, $post_id;

	if($first=="yes") {
		echo '<input type="hidden" name="sticky_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
	}
	if($width!=0) {
		echo '<table class="form-table">';
	}


	foreach ($fields['fields'] as $field) {
		// get current post meta data
		$meta = get_post_meta($post->ID, $field['id'], true);
		//$post_num = htmlentities($_GET['post']);
		if($width!=0) {
			echo '<tr>';
				echo '<th style="width:',$width,'%"><label for="', $field['id'], '">', $field['name'], '</label></th>';
			echo '<td>';
		}
		switch ($field['type']) {
			case 'text':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ';
				break;
			case 'datepicker':
				echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? date("m/d/y, H:i",remove_html_slashes($meta)) : remove_html_slashes($field['std']), '"/> ';
				break;
			case 'slider_image_box':
				echo '<input class="upload input-text-1 ot-upload-field" type="text" name="', $field['id'], '" id="', $field['id'], '" value="',  $meta ? remove_html_slashes($meta) :  remove_html_slashes($field['std']), '" style="width: 140px;"/><a href="#" class="ot-upload-button">Button</a>';
				break;
			case 'image_select':
				ot_gallery_image_select($field['id'],$meta);
				break;
			case 'checkbox':
				echo '<input type="checkbox" value="1" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
				break;
			case 'sidebar_select_box':
				$sidebar_names = get_option( THEME_NAME."_sidebar_names" );
				$sidebar_names = explode( "|*|", $sidebar_names );

				if ( $meta == "off" ) {
					$selected="selected=\"selected\"";
				} else { 
					$selected="";
				}

				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
				echo "<option value=\"\">Default</option>";
				echo "<option value=\"off\" ".$selected.">Off</option>";

					foreach ($sidebar_names as $sidebar_name) {
	
						if ( $meta == $sidebar_name ) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $sidebar_name != "" ) {
							echo "<option value=\"".$sidebar_name."\" ".$selected.">".$sidebar_name."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'sidebar_select_box_small':
				$sidebar_names = get_option( THEME_NAME."_sidebar_names" );
				$sidebar_names = explode( "|*|", $sidebar_names );

				if ( $meta == "default" ) {
					$selected="selected=\"selected\"";
				} else { 
					$selected="";
				}

				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
				echo "<option value=\"off\">Off</option>";
				echo "<option value=\"default\" ".$selected.">Default</option>";
					foreach ($sidebar_names as $sidebar_name) {
	
						if ( $meta == $sidebar_name ) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $sidebar_name != "" ) {
							echo "<option value=\"".$sidebar_name."\" ".$selected.">".$sidebar_name."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'category_select':
				global $wpdb;
				$data = get_terms( "category", 'hide_empty=0' );	
				
				echo '	<select name="', $field['id'], '[]" id="', $field['id'], '" style="min-width:200px; min-height:200px;" multiple>';
					foreach($data as $key => $d) {
						if(is_array($meta) && in_array($d->term_id,$meta)) { $selected=' selected'; } else { $selected=''; }
						echo "<option value=\"".$d->term_id."\" ".$selected.">".$d->name."</option>";
					}

				echo '	</select>';
				break;
			case 'breaking_cat':
				global $wpdb;
				$data = get_terms( "category", 'hide_empty=0' );	
					if ( $meta == "slider_off" || !$meta) {
						$selected="selected=\"selected\"";
					}
				echo '	<select name="', $field['id'], '[]" id="', $field['id'], '" style="min-width:200px; min-height:200px;" multiple>';
					echo '<option value="slider_off" '.$selected.'>'.__("Off",'quadrum-theme').'</option>';
					foreach($data as $key => $d) {
						if(is_array($meta) && in_array($d->term_id,$meta)) { $selected=' selected'; } else { $selected=''; }
						echo "<option value=\"".$d->term_id."\" ".$selected.">".$d->name."</option>";
					}

				echo '	</select>';
				break;
			case 'category_select_2':
				global $wpdb;
				$data = get_terms( "category", 'hide_empty=0' );	
				
				echo '	<select class="home-cat-select" name="', $field['id'], '[]" id="', $field['id'], '" style="min-width:200px; min-height:200px;" multiple disabled>';
					foreach($data as $key => $d) {
						if(is_array($meta) && in_array($d->term_id,$meta)) { $selected=' selected'; } else { $selected=''; }
						echo "<option value=\"".$d->term_id."\" ".$selected.">".$d->name."</option>";
					}

				echo '	</select>';
				break;
			case 'layer_slider_select':
				// Get WPDB Object
				global $wpdb;

				// Table name
				$table_name = $wpdb->prefix . "layerslider";
				
				// Get sliders
				$sliders = $wpdb->get_results( "SELECT * FROM $table_name
													WHERE flag_hidden = '0' AND flag_deleted = '0'
													ORDER BY id ASC LIMIT 200" );
					
				echo '	<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					if(!empty($sliders)) {
						foreach($sliders as $key => $item) {
							$name = empty($item->name) ? 'Unnamed' : $item->name;
							if($meta == $item->id) { $selected='selected="selected"'; } else { $selected=''; }
							echo '<option value="'.$item->id.'" '.$selected.'>'.$name.'</option>';
						}
					}
					if(empty($sliders)) {
						echo '<option value="">'._e("You didn\'t create a slider yet.",'quadrum-theme').'</option>';
					}
				echo '	</select>';
				echo '	<br/><br/>Sliders You can create with LayerSlider WP (included with the theme). By creating homepage slider, choose <strong>fullwidth</strong> skin. And set The slider size <strong>1200x600px.</strong> Max slider width 1200px;';
				break;
			case 'sidebar_position_box':
				$positions = array('Right', 'Left');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'yes_no':
				$positions = array('Yes', 'No');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'no_yes':
				$positions = array('No', 'Yes');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'reviews_style':
				$positions = array('1', '2');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'color':
				echo '<input class="color" type="text" name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' value="', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '"/> ';
				break;
			case 'comment_select':
				$positions = array('Under The Post', 'New Tab');
				$val = array('under', 'new');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $k => $position) {
	
						if ( $meta == strtolower($val[$k])) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($val[$k])."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'days':
				$positions = array('1 day', '2 days', '3 days', '7 days', '14 days', '21 days');
				$val = array('1', '2', '3', '7', '14', '21');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $k => $position) {
	
						if ( $meta == strtolower($val[$k])) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($val[$k])."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'gallery_style':
				$positions = array('Default', 'LightBox');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'show_hide':
				$positions = array('Show', 'Hide');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'small_large':
				$positions = array('Small', 'Large');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;			
				case 'hide_show':
				$positions = array('Hide', 'Show');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'image_size_box':
				$positions = array('Large', 'Small');

				echo '<select name="', $field['id'], '" id="', $field['id'], '" style="min-width:200px;">';
					foreach ($positions as $position) {
	
						if ( $meta == strtolower($position)) {
							$selected="selected=\"selected\"";
						} else { 
							$selected="";
						}
						
						if ( $position != "" ) {
							echo "<option value=\"".strtolower($position)."\" ".$selected.">".$position."</option>";
						}
					}
				echo '	</select>';
				break;
			case 'textarea':
				echo '<textarea name="', $field['id'], '" id="', $field['id'], '" ', $meta ? ' ' : '', ' style="width:400px; height:100px;">', $meta ? remove_html_slashes($meta) : remove_html_slashes($field['std']), '</textarea>';
				if($field['id'] == THEME_NAME."_ratings") { 
					$average = ot_avarage_rating($post_id);
					$average_visitor = ot_avarage_rating($post_id, true);
					echo '<input type="hidden" name="', $field['id'], '_average" id="', $field['id'], '_average" value="',$average[1],'"/> ';
					echo '<input type="hidden" name="', $field['id'], '_average_2" id="', $field['id']."_average_2", '_average" value="',$average_visitor[1],'"/> ';
				}				
				break;

			case 'home_drag_drop':
				global $orangeThemes_fields;
				$orangeThemes_fields = new OrangeThemesManagment(THEME_FULL_NAME,THEME_NAME);
				
				
				get_template_part(THEME_FUNCTIONS."drag-drop");
				$options = $orangeThemes_fields->get_options();

				echo '
					<div style="vertical-align:top;clear: both;">
						'.$orangeThemes_fields->print_options().'
					</div>
				
';
				break;
		}
		if($width!=0) {
			echo '<td>', '</tr>';
		}
	}
	if($width!=0) {
		echo '</table>';
	}
}

function save_data($fields) {
	global $post_id;

	foreach ($fields['fields'] as $field) {
		if($field['id']==THEME_NAME."_ratings") { 
			$old = get_post_meta($post_id, $field['id'], true);
			if(isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];
				
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], $new);
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}//else if closer
			}	

			$old = get_post_meta($post_id, $field['id']."_average", true);
			if(isset($_POST[$field['id']."_average"])) {
				$new =  ot_avarage_rating($post_id);
				$new =  $new[1];
				
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id']."_average", $new);
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id']."_average", $old);
				}//else if closer
			}

		} else {
			$old = get_post_meta($post_id, $field['id'], true);
			if(isset($_POST[$field['id']])) {
				$new = $_POST[$field['id']];
				
				if ($new && $new != $old) {
					update_post_meta($post_id, $field['id'], $new);
				} elseif ('' == $new && $old) {
					delete_post_meta($post_id, $field['id'], $old);
				}//else if closer
			}	
		}
		

	}//foreach closer
	
}

function save_datepicker($fields) {
	global $post_id;

	foreach ($fields['fields'] as $field) {	
		$old = get_post_meta($post_id, $field['id'], true);
		if(isset($_POST[$field['id']])) {
			$new = $_POST[$field['id']];
			
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], strtotime($new));
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], strtotime($old));
			}//else if closer
		}
	}//foreach closer
	
}

function save_numbers($fields) { 
	global $post_id;
	foreach ($fields['fields'] as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if(!is_numeric($new)) { 
			$new = preg_replace("/[^0-9]/","",$new);
		}
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}//else if closer
	}//foreach closer

}

// Save data from meta box
function save_sticky_data($post_id) {
	global $box_array;
	
	// verify nonce
	if (isset($_POST['sticky_meta_box_nonce']) && !wp_verify_nonce($_POST['sticky_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}

	// check permissions
	if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id)) {
			return $post_id;
		}
	} elseif (!current_user_can('edit_post', $post_id)) {
		return $post_id;
	}
	
	foreach ($box_array as $box) {
		if($box["fields"][0]["type"]=="datepicker") {
			save_datepicker($box);
		} else {
			save_data($box);
		}

	}

} //function closer

	add_action('admin_menu', 'add_sticky_box');	
	add_action('save_post', 'save_sticky_data');

	
?>
