<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

	//post banner	
	$postBanner = get_option(THEME_NAME."_post_banner");
	$postBannerCode = stripslashes(get_post_meta ( OT_page_id(), THEME_NAME."_post_banner_code", true )); 
	if(!$postBannerCode) {
		$postBannerCode = stripslashes(get_option(THEME_NAME."_post_banner_code"));
	}
	

	if($postBanner=="on" || $postBannerCode) {
?>						

	<!-- BEGIN .strict-block -->
	<div class="strict-block">
		<div class="main-banner">
			<?php echo do_shortcode($postBannerCode);?>
		</div>
	<!-- END .strict-block -->
	</div>

<?php } ?> 