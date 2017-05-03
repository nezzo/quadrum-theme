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
	//add_action('wp_ajax_raport_callback', 'raport');
	//add_action('wp_ajax_nopriv_raport_callback', 'raport');
	add_action('wp_raport', 'raport',1,1);
	//функция ищет по символу в базе  ajax
	add_action('wp_ajax_searchSymbol_callback', 'searchSymbol');
	add_action('wp_ajax_nopriv_searchSymbol_callback', 'searchSymbol');
	//функция по скачиванию картинки на сервер ajax
	add_action('wp_ajax_getImage_callback', 'getImage');
	add_action('wp_ajax_nopriv_getImage_callback', 'getImage');
	//регистрация скрипта Autocomplete
 	add_action( 'wp_enqueue_scripts', 'raportAutocomplete');
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
 	
 	//регистрируем хук на проверку существования категории
 	add_action('wp_searcCategory','searcCategory',1,3);
 	//хук по добавлению нового объекта
 	add_action('wp_newSub','newSub',1,4);
 	 
   	

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
	
	//подключаю свой скрипт (фильтр по геолокации)
	function raportAutocomplete(){
	  wp_enqueue_script( 'jquery-ui-autocomplete');
	  wp_enqueue_style('wp_ui-autocomplete', '/wp-content/themes/quadrum' . '/css/jquery-ui.min.css');

	}
	
	
	//подключаю скрипт bootstrap
	function bootstrapJS(){
	  wp_enqueue_script( 'wp_footer_bootstrapJS_js', '/wp-content/themes/quadrum' . '/js/bootstrap.js', array(), null, true );

	}
 
	//подключаем script raport
	function raportAjax_data(){
 	  wp_enqueue_script( 'raportAjaxJS', home_url( '/wp-content/themes/quadrum/js/raport.js'), array('jquery'));
 	  

	  wp_localize_script('raportAjaxJS', 'raportAjax_object', 
		  array(
			  'url' => admin_url('admin-ajax.php'),
			  'nonce' => wp_create_nonce('add_object')
		  )
	  );  

	}
	
	
	//создаем новый пост из рапорта
	function raport($mas){
	 global $wpdb;
	# Надо узнать как редактировать по почте можно или высылать доступы какие то хз. И насчет инфы для 
	#админа мета_бокс если память не изменяет. Надо как то впихнуть и сюда данные и привязать к посту, добавление инфы в доп поле и 
	# и мета_бокс
	#Надо разобраться с условием на прием субъекта, какой то баг!!!!!!
	
	
	    //по ajax получаем массив данных для разбора
 	    if(!empty($mas)){
 	    
 	     
 	    //картинка 
 	    $file = $mas[9];
 	    
 	    $subName = $mas[3];
 	    
 	   //проверяем есть ли субъект и какое нам имя ставить
 	    if(empty($mas[3]) || $mas[3] == "Субъект не найден!" ){
 		//проверяем заполнено ли поле ФИО
		  if(!empty($mas[4])){
		  //регистрируем нового субъекта
		    $subName = $mas[4];
		  }else{
		    $subName = " ";
		  }
		  
		 
		  
 	    } 
 	    
 	    //создаем текст сообщения в рапорте
 	     $content = "
		Место: $mas[1]
		$mas[2]
		
		Cубъект рапорта: $subName
		$mas[8]
		
 		
		";
	       
	       
	      // Создаем массив данных новой записи
	      $post_data = array(
		'post_title'    => wp_strip_all_tags($mas[0]),
		'post_content'  => $content,
		'post_status'   => 'pending',
  	      );

	      //Вставляем запись в базу данных
	      $post_id = wp_insert_post($post_data);
	      
 	      var_dump($post_id);
	      
	      
	      //wp_set_object_terms( 1050, 43, 'category' );
	      
	      //делаем проверку, что бы это была картинка
	       if($file["type"] =="image/png" || $file["type"] =="image/jpg" || $file["type"] =="image/jpeg" || $file["type"] =="image/bmp"){
		
		//получаем картинку с поля и  клеем ее к посту только что созданому
	       $attachment_id = media_handle_upload("raport_file_upload", $post_id );
	       
	       // новую картинку заносим в миниатюры
	       set_post_thumbnail( $post_id, $attachment_id );
	       
 	       
	       }
	      
	      //если пост создан то призначаем ему категории
	      if(!empty($post_id)){
		//передаем параметры для добавление поста в категорию
		do_action("wp_searcCategory",$post_id,$mas[1], $mas[2]);
	      }
	      
	    
		//проверка создавать нам или нет субъект
	      if(empty($mas[3]) || $mas[3] == "Субъект не найден!" ){
	      
 	         //добавляем нового субъекта (внизу из-за бага)
		do_action('wp_newSub',$mas[4],$mas[5],$mas[6],$mas[7]);
	      }
	      
	      
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
	 
	 
	 //поиск  по букве
	 function searchSymbol(){
	  global $wpdb;
	  
	  $nameCategory = $_POST['category'];
	  
	   if(!empty($nameCategory)){
	   
	    switch($nameCategory){
	      case "city":
	      //переменная с названием таблицы Базы данных
	    $table = $wpdb->prefix . 'raportTableCity';
	    
	    //делаем поиск по 1 букве и возвращаем результат
	      $selectNameUrl = $wpdb->get_results("SELECT name FROM $wpdb->terms
			      INNER JOIN $table on ".$table.".term_id = wp_terms.term_id");
			      
	      
	    
	    //возвращаем не пустой массив
	      if(!empty($selectNameUrl)){
	      
		echo json_encode($selectNameUrl);
	    
	      }
	      
	      break;
	      
	      case "instant":
		//переменная с названием таблицы Базы данных
	    $table = $wpdb->prefix . 'raportTableInstant';
	    
	    //делаем поиск по 1 букве и возвращаем результат
	      $selectNameUrl = $wpdb->get_results("SELECT name FROM $wpdb->terms
			      INNER JOIN $table on ".$table.".term_id = wp_terms.term_id");
			      
	      
	    
	    //возвращаем не пустой массив
	      if(!empty($selectNameUrl)){
	      
		echo json_encode($selectNameUrl);
	    
	      }
	      
	      break;
	      
	      case "subject":
	      
		//переменная с названием таблицы Базы данных
		$table = $wpdb->prefix . 'raportTableSub';
		
		//делаем поиск по 1 букве и возвращаем результат
		  $selectNameUrl = $wpdb->get_results("SELECT name FROM $table");
				  
		//возвращаем не пустой массив
		  if(!empty($selectNameUrl)){
		  
		    echo json_encode($selectNameUrl);
		
		  }
	      
	      break;
	      
	    
	    }
	  
	  }
	   
	   // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	    wp_die();
	 }
	 
	 
	 //добавляем нового субъекта
	 function newSub($name, $doljnost, $workInstant, $infoSub){
	  global $wpdb;
	  
	  //проверяем не пустая ли переменная
	    if(!empty($name)){
	      
	      //проверяем  имеют ли значения переменные если нет то оставляем пустыми
	      if(empty($doljnost)){
		$doljnost = "";
	      }
	      
	      if(empty($workInstant)){
		$workInstant = "";
	      }
	      
	      if(empty($infoSub)){
		$infoSub = "";
	      }
	      
	      //полученные данные добавляем в базу
	      $sub = $wpdb->insert(
		  $wpdb->prefix . 'raportTableSub',
		  array( 'name' => $name, 'doljnost' => $doljnost, 'mestoWork' => $workInstant, 'description' => $infoSub ),
		  array( '%s', '%s', '%s', '%s' )
	      );
	
	      //если все ок то сообщаем об этом
	      if($sub){
		echo $sub;
	      }
	      
	      
	    }
	    
	    
	    // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	    wp_die();
	 }
	 
	 
	 
	 //проверяем существует ли такая категория
	 function searcCategory($idPost,$city, $instant){
	 global $wpdb;
	  
	  $tableCity = $wpdb->prefix.'raportTableCity';
	  $tableInstant = $wpdb->prefix.'raportTableInstant';
	  
	      //поиск категории в таблице города
 	       if(!empty($city)){
		  
		    $getCategoryId = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE name = %s",$city));
	  
 	 
		    //проверяем  ответ
		    if(!empty($getCategoryId)){
			$getCategoryCityId = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $tableCity WHERE term_id = %d",$getCategoryId));
			
			//получаем id категории
			if(!empty($getCategoryCityId)){
			//после успешных проверок регистрируем переменную с id  категории
			  $getCity =  $getCategoryCityId;
			  
			}else{
			  $getCity = "";
			} 
			
		      
		    }
		  
		}
		
		 //поиск категории в таблице инстанции
 		if(!empty($instant)){
		  
		  $getCategoryId = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE name = %s",$instant));
	  
 	 
		    //проверяем  ответ
		    if(!empty($getCategoryId)){
			$getCategoryCityId = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $tableInstant WHERE term_id = %d",$getCategoryId));
			
			//получаем id категории
			if(!empty($getCategoryCityId)){
			//после успешных проверок регистрируем переменную с id  категории
			  $getInstant =  $getCategoryCityId;
			  
			}else{
			  $getInstant = "";
			} 
			
		      
		    }
		  
		}
 
		 //формируем массив с категориями 
		$masCategory = array($getCity,$getInstant);
		
		#TODO возможно категорий которых нету лучше создавать автоматом, но лучше уточнить
		
		//добавляем данный пост в категории
		$masCategory = array_map('intval', $masCategory );
		wp_set_object_terms($idPost, $masCategory, 'category' );
	  
	 
	 // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	    wp_die();
	 
	 }

 	

?>