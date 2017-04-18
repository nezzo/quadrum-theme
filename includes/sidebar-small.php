<?php
	wp_reset_query();

	$sidebar = get_post_meta( OT_page_ID(), THEME_NAME.'_sidebar_select_small', true );
	$position = get_post_meta( OT_page_ID(), THEME_NAME.'_sidebar_position_small', true );

	if(is_category()) {
		$sidebar = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_select_small', false );
		$position = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_position_small', false );
	} elseif(is_tax()){
		$position = ot_get_option( get_queried_object()->term_id, 'sidebar_position_small', false );
		$sidebar = ot_get_option( get_queried_object()->term_id, 'sidebar_select_small', false );
	}



	if ( $sidebar=='' || $sidebar=='default' ) {
		$sidebar='default';
	}	
	if ( $position=='' ) {
		$position='right';
	}	

?>

					<!-- BEGIN .content-block -->
					<div class="mini-sidebar <?php echo $position;?>">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
						<?php endif; ?>
					</div>
<?php wp_reset_query();  ?>