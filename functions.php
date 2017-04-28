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
	
	//функция принимает данные с рапорта и заносит в базу ajax
	add_action('wp_ajax_raport_callback', 'raport');
	add_action('wp_ajax_nopriv_raport_callback', 'raport');
	//подключаем скрипт с ajax запросом  и переименовываем admin_url
	add_action( 'wp_enqueue_scripts', 'raportAjax_data');
 	//регистрация скрипта фильтра
 	add_action( 'wp_enqueue_scripts', 'filterGeoJs');
 	//регистрация скрипта bootstrap
 	add_action( 'wp_enqueue_scripts', 'bootstrapJS');
 	//регистрируем хук на получение id категорий
 	add_action('wp_getRaportCategory','getRaportCategory',1,1);
 	//регистрируем хук для получения списка имен и ЧПУ
 	add_action('wp_getNameSlugCategory', 'getNameSlugCategory',1,1);
	

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
	  wp_enqueue_script( 'wp_footer_sliding_main_js', '/wp-content/themes/quadrum' . '/js/filterGeoJs.js', array(), null, true );

	}
	
	//подключаю скрипт bootstrap
	function bootstrapJS(){
	  wp_enqueue_script( 'wp_footer_bootstrapJS_js', '/wp-content/themes/quadrum' . '/js/bootstrap.js', array(), null, true );

	}
 
	function raportAjax_data(){
 	  wp_enqueue_script( 'raportAjaxJS', home_url( '/wp-content/themes/quadrum/js/raport.js'), array('jquery'));

	  wp_localize_script('raportAjaxJS', 'raportAjax_object', 
		  array(
			  'url' => admin_url('admin-ajax.php'),
			 
		  )
	  );  

	}
	
	
	//создаем новый пост из рапорта
	function raport(){
	    //по ajax получаем массив данных для разбора
 	    if(!empty($_POST['mas'])){
	       $mas = $_POST['mas'];
	       
	       $content = "
		Место: $mas[1]
		$mas[2]
		
		Cубъект рапорта: $mas[3]
		$mas[8]
	       ";
	       
	       
	      // Создаем массив данных новой записи
	      $post_data = array(
		'post_title'    => wp_strip_all_tags($mas[0]),
		'post_content'  => $content,
		'post_status'   => 'pending',
		//'post_author'   => 1,
		//'post_category' => array( 8,39 )
	      );

	      // Вставляем запись в базу данных
	      $post_id = wp_insert_post( $post_data );
	      
	      echo $post_id;
	      
	    }
	    
	    // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	    wp_die();
	 }
	 
	 
	 
	 	 
	 //получаем id категорий
	 function getRaportCategory($table){
	    global $wpdb;
	  
	    $selectData = $wpdb->get_results("SELECT term_id  FROM $table ");
	  
	    foreach ($selectData as $dataId) {
		
		//с помощью JOIN получаем с таблиц данные имена рубрик и ЧПУ
		$selectNameUrl = $wpdb->get_results($wpdb->prepare("SELECT ".$table.".id, name, slug  FROM $wpdb->terms
				INNER JOIN $table on ".$table.".term_id = wp_terms.term_id
				WHERE wp_terms.term_id = %d",$dataId->term_id));
				
		do_action("wp_getNameSlugCategory",$selectNameUrl);
	    }
 
	  
	  
	 
	 }
	 
	 // генерируем список имен и ЧПУ категорий для выпадающего списка
	 function getNameSlugCategory($selectNameUrl){
	   ?>
		 <option value='<?=$selectNameUrl->slug?>'><?=$selectNameUrl->name?></option>
	    <?php	  
	  
	 }
	 
	 
 	

?>