<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();
	$post_type = get_post_type();
	$sidebarPosition = get_option ( THEME_NAME."_sidebar_position" ); 

	//small sidebar
	$smallSidebar = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_select_small", true ); 
	$sidebarPositionCustomSmall = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_position_small", true ); 


	//large sidebar
	$sidebar = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_select", true ); 
	$sidebarPositionCustom = get_post_meta ( OT_page_ID(), THEME_NAME."_sidebar_position", true ); 
			
	if(is_category()) {
		$sidebar = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_select', false );
		$sidebarPositionCustom = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_position', false );

		$smallSidebar = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_select_small', false );
		$sidebarPositionCustomSmall = ot_get_option( get_cat_id( single_cat_title("",false) ), 'sidebar_position_small', false );
	} elseif(is_tax()){
		$smallSidebar = ot_get_option( get_queried_object()->term_id, 'sidebar_select_small', false );
		$sidebarPositionCustomSmall = ot_get_option( get_queried_object()->term_id, 'sidebar_position_small', false );
		//large sidebar
		$sidebar = ot_get_option (get_queried_object()->term_id, "sidebar_select", false ); 
		$sidebarPositionCustom = ot_get_option( get_queried_object()->term_id, 'sidebar_position', false );
	}
	
	if($sidebarPosition!="custom") {
		$sidebar = "default";
		$sidebarPositionCustom = $sidebarPosition;
	}
?>
			<!-- END .content-main -->
			</div>
			<?php 
				if(($smallSidebar && $smallSidebar!="off") && ($sidebarPositionCustomSmall==$sidebarPositionCustom || $sidebarPositionCustomSmall=="right")) {
					get_template_part(THEME_INCLUDES."sidebar","small"); 
				}
			?>


			<?php 
				if(($sidebar!="off") && ($sidebarPositionCustomSmall==$sidebarPositionCustom || $sidebarPositionCustom=="right")) {
					get_template_part(THEME_INCLUDES."sidebar");
				}
			?>	
		</div>


				