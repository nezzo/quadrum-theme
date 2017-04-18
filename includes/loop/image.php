<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	wp_reset_query();

	// Image size
	$imageSizeSingle = get_post_meta( $post->ID, THEME_NAME."_image_size", true ); 
	if(is_category()) {
		$imageSize = ot_get_option( get_cat_id( single_cat_title("",false) ), 'blog_style', false );
	} else {
		$imageSize = false;
	}
	if(!$imageSize) {
		$imageSize = get_option(THEME_NAME."_image_size");	
	}

	if($imageSize=="custom") {
		if($imageSizeSingle=="large") {
			$width = 860;
			$height = 312;
		} else {
			$width = 349;
			$height = 218;	
		}
	} else if($imageSize=="large") {
		$width = 860;
		$height = 312;
	} else {
		$width = 349;
		$height = 218;	
	}





	$image = get_post_thumb($post->ID,$width,$height); 
	if(get_option(THEME_NAME."_show_first_thumb") == "on" && $image['show']==true) {
?>
	<a href="<?php the_permalink();?>" class="item-photo">
		<?php echo ot_image_html($post->ID,$width,$height); ?>
	</a>
<?php } ?>