<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	
	$width = 890;
	$height = 395;
	$image = get_post_thumb($post->ID,$width,$height); 

	//post details
	$singleImage = get_post_meta( $post->ID, THEME_NAME."_single_image", true );

	//video check
	$singleVideo = get_post_meta( $post->ID, THEME_NAME."_video", true );

	if(((get_option(THEME_NAME."_show_single_thumb") == "on"  && $singleImage=="show" && $image['show']==true) || (!$singleImage && $image['show']==true)) && !$singleVideo && !(function_exists("is_bbpress") && is_bbpress())) { 

?>

	<span class="hover-effect">
		<?php echo ot_image_html($post->ID,$width,$height,"article-photo"); ?>
	</span>

<?php } elseif((get_option(THEME_NAME."_show_single_thumb") == "on" ) && $singleImage=="show" && $singleVideo || (!$singleImage && $singleVideo) && !(function_exists("is_bbpress") && is_bbpress())) { ?>
	<?php $video = OT_youtube_image($singleVideo); ?>
		<div class="video-frame">
			<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo $video;?>?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
<?php } ?>