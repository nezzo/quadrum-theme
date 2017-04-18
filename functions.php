<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	define("THEME_NAME", 'quadrum');
	define("THEME_FULL_NAME", 'Quadrum');


	// THEME PATHS
	define("THEME_FUNCTIONS_PATH",TEMPLATEPATH."/functions/");
	define("THEME_INCLUDES_PATH",TEMPLATEPATH."/includes/");
	define("THEME_SCRIPTS_PATH",TEMPLATEPATH."/js/");
	define("THEME_ADMIN_INCLUDES_PATH", THEME_INCLUDES_PATH."admin/");
	define("THEME_WIDGETS_PATH", THEME_INCLUDES_PATH."widgets/");

	if (!defined('OT_POST_GALLERY')) {
		//POST TYPES
		define("OT_POST_GALLERY","gallery");
	}

	define("THEME_FUNCTIONS", "functions/");
	define("THEME_INCLUDES", "includes/");
	define("THEME_SLIDERS", THEME_INCLUDES."sliders/");
	define("THEME_LOOP", THEME_INCLUDES."loop/");
	define("THEME_SINGLE", THEME_INCLUDES."single/");
	define("THEME_ADMIN_INCLUDES", THEME_INCLUDES."admin/");
	define("THEME_CACHE", "cache/");
	define("THEME_SCRIPTS", "js/");
	define("THEME_CSS", "css/");

	define("THEME_URL", get_template_directory_uri());

	define("THEME_CSS_URL",THEME_URL."/css/");
	define("THEME_CSS_ADMIN_URL",THEME_URL."/css/admin/");
	define("THEME_JS_URL",THEME_URL."/js/");
	define("THEME_JS_ADMIN_URL",THEME_URL."/js/admin/");
	define("THEME_IMAGE_URL",THEME_URL."/images/");
	define("THEME_IMAGE_CPANEL_URL",THEME_IMAGE_URL."/control-panel-images/");
	define("THEME_IMAGE_MTHEMES_URL",THEME_IMAGE_URL."/more-themes-images/");
	define("THEME_FUNCTIONS_URL",THEME_URL."/functions/");
	define("THEME_SHORTCODES_URL",THEME_URL."/includes/shortcodes/");
	define("THEME_ADMIN_URL",THEME_URL."/includes/admin/");
	define("THEME_HOME_BLOCKS", THEME_INCLUDES."home-blocks/");


	require_once(THEME_FUNCTIONS_PATH."tax-meta-class/tax-meta-class.php");
	require_once(THEME_FUNCTIONS_PATH."init.php");
	require_once(THEME_WIDGETS_PATH."init.php");
	require_once(THEME_INCLUDES_PATH."theme-config.php");




	//remove visual composer notifier
	if(function_exists('vc_set_as_theme')) {
		vc_set_as_theme($notifier = false);
	}

	//woocomerce
	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
	add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
	add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);
	add_action( 'wp_enqueue_scripts', 'filterGeoJs');
	add_action( 'wp_enqueue_scripts', 'raportJs');

	function my_theme_wrapper_start() {
	  echo '<section id="main">';
	}

	function my_theme_wrapper_end() {
	  echo '</section>';
	}
	
	add_theme_support( 'woocommerce' );

	$shopCount = 8; 
	if($shopCount) {
		add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$shopCount.';' ), 20 );
	}

	if ( ot_is_woocommerce_activated() == true && version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
		add_filter( 'woocommerce_enqueue_styles', '__return_false' );
	} else {
		define( 'WOOCOMMERCE_USE_CSS', false );
	}

	//remove layserslider notifier
	$GLOBALS['lsAutoUpdateBox'] = false;
	
	//подключаю свой скрипт (фильтр по геолокации)
	function filterGeoJs(){
	  wp_enqueue_script( 'wp_footer_sliding_main_js', '/wp-content/themes/quadrum-theme' . '/js/filterGeoJs.js', array(), null, true );

	}
	
	//подключаю свой скрипт (рапорт)
	function raportJs(){
	  wp_enqueue_script( 'wp_footer_sliding_main_js', '/wp-content/themes/quadrum-theme' . '/js/raport.js', array(), null, true );

	}
	

?>