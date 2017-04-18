<?php
/*
Template Name: Drag & Drop Page Builder
*/	
?>
<?php get_header(); ?>
<?php

	wp_reset_query();
	global $post;
	

	//blocks
	$homepage_layout_order = get_option(THEME_NAME."_homepage_layout_order_".$post->ID);

?>

<?php get_template_part(THEME_LOOP."loop","start"); ?>

	<?php if(get_the_content()) { ?>
		<div class="block">
			<div class="block-content">
				<?php the_content();?>
			</div>
		</div>
	<?php } ?>
	<?php
		$OT_builder = new OT_home_builder;  
		if(is_array($homepage_layout_order)) {
			foreach($homepage_layout_order as $blocks) { 
				$blockType = $blocks['type'];
				$blockId = $blocks['id'];
				$blockInputType = $blocks['inputType'];
				
				$block = $OT_builder->$blockType($blockType, $blockId,$blockInputType);
				get_template_part(THEME_HOME_BLOCKS.$block); 
			}
		}
	?> 
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer();?>