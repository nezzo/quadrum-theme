<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();

	if (is_pagetemplate_active("template-contact.php")) {
		$contactPages = ot_get_page("contact");
		if($contactPages[0]) {
			$contactUrl = get_page_link($contactPages[0]);
		}
	} else {
		$contactUrl = "#";
	}
?>
	<!-- BEGIN .wrapper -->
	<div class="wrapper">
		<!-- BEGIN .content-main -->
		<div class="content-main">
			<!-- BEGIN .strict-block -->
			<div class="strict-block">
				<!-- BEGIN .block-content -->
				<div class="error-big-message">
					
					<h1><?php _e("Error 404",'quadrum-theme')
;?></h1>
					<h2><?php _e("Page Not Found",'quadrum-theme')
;?></h2>

					<p><?php _e("Sorry, This page is wanted by the police so it ran<br/>away to Antarctica. If You see it, please let us know.",'quadrum-theme')
;?></p>
					<a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i><?php _e("back to homepage",'quadrum-theme')
;?></a>

				<!-- END .block-content -->
				</div>
			<!-- END .strict-block -->
			</div>
		<!-- END .content-main -->
		</div>
	<!-- END .wrapper -->
	</div>
<?php get_footer(); ?>