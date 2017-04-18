<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	$post_type = get_post_type();
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 
	//small sidebar
	$smallSidebar = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_select_small", true ); 
	$sidebarPositionCustomSmall = get_post_meta( OT_page_ID(), THEME_NAME.'_sidebar_position_small', true );

	//large sidebar
	$sidebar = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_select", true ); 
	$sidebarPositionCustom = get_post_meta( OT_page_ID(), THEME_NAME.'_sidebar_position', true );
	
	if(is_category()) {
		$catID = get_cat_id( single_cat_title("",false) );
		$smallSidebar = ot_get_option( $catID, 'sidebar_select_small', false );
		$sidebarPositionCustomSmall = ot_get_option( $catID, 'sidebar_position_small', false );
		//large sidebar
		$sidebar = ot_get_option ( $catID, "sidebar_select", false ); 
		$sidebarPositionCustom = ot_get_option( $catID, 'sidebar_position', false );
	} elseif(is_tax()){
		$smallSidebar = ot_get_option( get_queried_object()->term_id, 'sidebar_select_small', false );
		$sidebarPositionCustomSmall = ot_get_option( get_queried_object()->term_id, 'sidebar_position_small', false );
		//large sidebar
		$sidebar = ot_get_option (get_queried_object()->term_id, "sidebar_select", false ); 
		$sidebarPositionCustom = ot_get_option( get_queried_object()->term_id, 'sidebar_position', false );
	}

	if($smallSidebar=="off" && $sidebar=="off") {
		$sidebarClass = false;
	} elseif($smallSidebar!="off" && $sidebar=="off") {
		$sidebarClass = "with-middle";
	} elseif($smallSidebar && $smallSidebar!="off" && $sidebar!="off") {
		$sidebarClass = "with-sidebar-both";
	} else {
		$sidebarClass = "with-sidebar";
	}
	

	if($sidebarPosition!="custom") {
		$sidebarPositionCustom = $sidebarPosition;
	}
	// layer slider
	$slider = get_post_meta ( ot_page_id(), THEME_NAME."_layer_slider_settings", true ); 
	$sliderId = get_post_meta ( ot_page_id(), THEME_NAME."_layer_slider", true ); 
	if(!$sliderId) $sliderId = 1;
?>
	<!-- BEGIN .wrapper -->
	<div class="wrapper">

			<?php 
				if(($smallSidebar && $smallSidebar!="off") && ($sidebarPositionCustomSmall=="left" && $sidebarPositionCustomSmall!=$sidebarPositionCustom)) {
					get_template_part(THEME_INCLUDES."sidebar","small"); 
				}

				if($sidebar!="off" && $sidebarPositionCustom=="left" && ($sidebarPositionCustomSmall!=$sidebarPositionCustom)) {
					get_template_part(THEME_INCLUDES."sidebar"); 
				}
			?>

		<!-- BEGIN .content-main -->
		<div class="content-main <?php echo $sidebarClass;?> <?php if($sidebar!="off" || $smallSidebar!="off") { OT_content_class(OT_page_ID()); } ?>">


		<?php get_template_part(THEME_SLIDERS."breaking-news");   ?>

		<?php if($slider=="yes" && is_page_template ( 'template-homepage.php' )) { ?>
			<!-- BEGIN .strict-block -->
			<div class="strict-block">
				
				<?php 
					if(function_exists("layerslider")) {
						layerslider($sliderId); 
					}
				?>

			<!-- END .strict-block -->
			</div>

		<?php } ?>
<?php wp_reset_query();  ?>