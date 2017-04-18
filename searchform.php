<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

	<form method="get" action="<?php echo home_url(); ?>" name="searchform" >
		<div>
			<label class="screen-reader-text" for="s"><?php _e("Search for:",'quadrum-theme')
;?></label>
			<input type="text" placeholder="<?php printf ( __('search here','quadrum-theme')
);?>" class="search" name="s" id="s" />
			<input type="submit" id="searchsubmit" value="<?php _e("Search",'quadrum-theme')
;?>" />
		</div>
	<!-- END .searchform -->
	</form>
