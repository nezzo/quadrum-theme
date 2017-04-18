<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	//post highlight
	$highlights = get_post_meta ( OT_page_id(), THEME_NAME."_highlights", true );
	$highlights = explode(";",$highlights);
?>
<?php if ($highlights) { ?>
	<?php if($highlights[0]) { ?>
		<h3 class="highlight-title"><?php _e("Story Highlights",'quadrum-theme')
;?></h3>
		<ul>
			<?php foreach($highlights as $highlight) { ?>
				<?php if($highlight) { ?>
					<li><?php echo $highlight;?></li>
				<?php } ?>
			<?php } ?>
		</ul>
	<?php } ?>
<?php } ?>