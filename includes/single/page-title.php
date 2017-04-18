<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	//single page titile
	$titleShow = get_post_meta ( OT_page_id(), THEME_NAME."_title_show", true ); 
	if(is_category()) {
		//custom colors
		$catId = get_cat_id( single_cat_title("",false) );
		$titleColor = ot_title_color($catId, "category", false);
	} else {
		//custom colors
		$titleColor = ot_title_color(OT_page_id(),"page", false);
	}


?>					

<?php if($titleShow!="no") { ?> 
	<?php if (!is_page_template ( 'template-contact.php' )) { ?>
	<!-- BEGIN .strict-block -->
	<div class="strict-block">
	<?php } ?>
		<div class="block-title" style="background-color:<?php echo $titleColor;?>">
			<h2><?php echo ot_page_title(); ?></h2>
			<a href="<?php echo home_url();?>" class="panel-title-right"><?php _e("Back to homepage",'quadrum-theme')
;?></a>
		</div>
		<?php
			if(is_author()) {
				get_template_part(THEME_SINGLE."about-author");
			}
		?>
	<?php if (!is_page_template ( 'template-contact.php' )) { ?>
	<!-- END .strict-block -->
	</div>	
	<?php } ?>
<?php } ?>