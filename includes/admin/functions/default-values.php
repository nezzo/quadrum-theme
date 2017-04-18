<?php
	/* -------------------------------------------------------------------------*
	 * 						SET DEFAULT VALUES BY THEME INSTALL					*
	 * -------------------------------------------------------------------------*/
	global $pagenow;
	get_template_part(THEME_INCLUDES."/lib/class-tgm-plugin-activation");

	// with activate istall option
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
		$theme_logo = get_template_directory_uri()."/images/header-logo.png";
		$theme_logo_f = get_template_directory_uri()."/images/logo-footer.png";
		$favicon = get_template_directory_uri()."/images/favicon.ico";
		$banner = '	<a href="https://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'banner-728x90.jpg" alt="" title="" /></a>';
		$banner1 = '<a href="https://www.orange-themes.com" target="_blank"><img src="'.get_template_directory_uri().'/images/no-banner-468x60.jpg" alt="" title=""/></a>';
		$copyright = '&copy; '.date("Y").' Copyright <b>Quadrum theme</b>. All Rights reserved.<br/>Designed by <strong><a href="https://www.orange-themes.com" target="_blank">Orange Themes</a></strong>';

		update_option(THEME_NAME."_logo", $theme_logo);
		update_option(THEME_NAME."_favicon", $favicon);
		update_option(THEME_NAME.'_page_layout', 'boxed');
		update_option(THEME_NAME.'_post_comment', 'on');
		update_option(THEME_NAME.'_about_author', 'custom');
		update_option(THEME_NAME.'_default_cat_color', '2C3E50');
		update_option(THEME_NAME.'_share_icons', 'on');
		
		update_option(THEME_NAME.'_google_font_1', 'Titillium Web');

		update_option(THEME_NAME."_rss_url", get_bloginfo("rss_url"));
		update_option(THEME_NAME.'_copyright', $copyright);
		update_option(THEME_NAME.'_show_first_thumb', "on");
		update_option(THEME_NAME.'_top_banner', 'on');
		update_option(THEME_NAME.'_top_banner_code', $banner);
		update_option(THEME_NAME.'_search', 'on');
		update_option(THEME_NAME.'_sidebar_position', "custom");
		update_option(THEME_NAME.'_similar_posts', "custom");
		update_option(THEME_NAME.'_image_size', "custom");
		update_option(THEME_NAME.'_show_single_thumb', "on");
		update_option(THEME_NAME.'_share_all', "custom");
		update_option(THEME_NAME.'_color_1', '2c3e50');
		update_option(THEME_NAME.'_color_2', '292929');
		update_option(THEME_NAME.'_color_3', '232323');
		update_option(THEME_NAME.'_color_4', '2c3e50');
		update_option(THEME_NAME.'_color_5', '353535');
		update_option(THEME_NAME.'_color_6', '2c3e50');
		update_option(THEME_NAME.'_responsive', 'on');
		update_option(THEME_NAME.'_similar_posts_gallery', "custom");
		update_option(THEME_NAME.'_post_date', "on");
		update_option(THEME_NAME.'_post_comments', "on");
		update_option(THEME_NAME.'_post_author', "on");
		update_option(THEME_NAME.'_post_author_single', "on");
		update_option(THEME_NAME.'_post_date_single', "on");
		update_option(THEME_NAME.'_body_bg_type', 'color');
		update_option(THEME_NAME.'_bg_color', 'F1F1F1');
		update_option(THEME_NAME.'_page_width', '1240');
		

		
}

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'WPBakery Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),		
		array(
			'name'     				=> 'Wp Print Friendly', // The plugin name
			'slug'     				=> 'wp-print-friendly', // The plugin slug (typically the folder name)
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),			
		array(
			'name'     				=> 'Layer Slider', // The plugin name
			'slug'     				=> 'LayerSlider', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/layersliderwp-6.0.5.installable.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),	

		// This is an example of how to include a plugin pre-packaged with a theme
		array(
			'name'     				=> 'Quadrum Extended', // The plugin name
			'slug'     				=> 'quadrum-extended', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory(). '/includes/lib/plugins/quadrum-extended.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),		

	);


	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> THEME_NAME,         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __('Install Required Plugins','quadrum-theme'),
			'menu_title'                       			=> __('Install Plugins','quadrum-theme'),
			'installing'                       			=> __('Installing Plugin: %s','quadrum-theme'), // %1$s = plugin name
			'oops'                             			=> __('Something went wrong with the plugin API.','quadrum-theme'),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.','quadrum-theme' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.','quadrum-theme' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.','quadrum-theme' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.','quadrum-theme' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.','quadrum-theme' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.','quadrum-theme' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.','quadrum-theme' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.','quadrum-theme' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins','quadrum-theme' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins','quadrum-theme' ),
			'return'                           			=> __('Return to Required Plugins Installer','quadrum-theme'),
			'plugin_activated'                 			=> __('Plugin activated successfully.','quadrum-theme'),
			'complete' 									=> __('All plugins installed and activated successfully. %s','quadrum-theme'), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}

	


?>