<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* -------------------------------------------------------------------------*
 * 								HOMEPAGE BUILDER							*
 * -------------------------------------------------------------------------*/
 
class OT_home_builder {

	private static $data;
	public static $counter = 1; 



	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST NEWS						*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$columns = get_option(THEME_NAME."_".$blockType."_columns_".$blockId);
		$showImage = get_option(THEME_NAME."_".$blockType."_show_image_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}


		if($cat) {
			$pageColor = ot_title_color($cat, "category", false);
			$link = get_category_link($cat);
		} else {
			$pageColor = ot_title_color(get_option('page_for_posts'),'page', false);
			$link = get_page_link(get_option('page_for_posts'));
		}

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'columns' =>$columns,
			'showImage' =>$showImage,
			'link' =>$link,
			'pageColor' =>$pageColor,
		);

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-1";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST NEWS STYLE 2						*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_1($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$excerpt = get_option(THEME_NAME."_".$blockType."_excerpt_".$blockId);
		$columns = get_option(THEME_NAME."_".$blockType."_columns_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}


		if($cat) {
			$pageColor = ot_title_color($cat, "category", false);
			$link = get_category_link($cat);
		} else {
			$pageColor = ot_title_color(get_option('page_for_posts'),'page', false);
			$link = get_page_link(get_option('page_for_posts'));
		}

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'excerpt' =>$excerpt,
			'link' =>$link,
			'columns' =>$columns,
			'pageColor' =>$pageColor,
		);

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-2";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 						HOMEPAGE CATEGORIES STYLE 1							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_2($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$columns = get_option(THEME_NAME."_".$blockType."_columns_".$blockId);
		$pageColor = get_option(THEME_NAME."_".$blockType."_color_".$blockId);
	

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'columns' =>$columns,
			'pageColor' =>$pageColor,
		);


		//add all data in array
		$data = array($attr);

		//set data
		$this->set_data($data);
		$block = "categories-1";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST NEWS STYLE 3					*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_3($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);

	
		if(!$offset) {
			$offset = "0";
		}


		if($cat) {
			$pageColor = ot_title_color($cat, "category", false);
			$link = get_category_link($cat);
		} else {
			$pageColor = ot_title_color(get_option('page_for_posts'),'page', false);
			$link = get_page_link(get_option('page_for_posts'));
		}

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'link' =>$link,
			'pageColor' =>$pageColor,
		);

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-3";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE LATEST NEWS STYLE 4					*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_4($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);

	
		if(!$offset) {
			$offset = "0";
		}


		if($cat) {
			$pageColor = ot_title_color($cat, "category", false);
			$link = get_category_link($cat);
		} else {
			$pageColor = ot_title_color(get_option('page_for_posts'),'page', false);
			$link = get_page_link(get_option('page_for_posts'));
		}

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'link' =>$link,
			'pageColor' =>$pageColor,
		);

		//set wp query
		$args = array(
			'post_type' => "post",
			'cat' => $cat,
			'offset' =>$offset,
			'showposts' => $count,
			'ignore_sticky_posts' => "1"
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-4";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE POPULAR NEWS							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_5($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$columns = get_option(THEME_NAME."_".$blockType."_columns_".$blockId);
		$showImage = get_option(THEME_NAME."_".$blockType."_show_image_".$blockId);
		$pageColor = get_option(THEME_NAME."_".$blockType."_color_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}


		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'columns' =>$columns,
			'showImage' =>$showImage,
			'link' =>false,
			'pageColor' =>"#".$pageColor,
		);

		//set wp query
		$args=array(
			'showposts' => $count,
			'order' => 'DESC',
			'cat' => $cat,
			'offset' =>$offset,
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post',
			'ignore_sticky_posts' => true
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-1";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE POPULAR NEWS STYLE 2					*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_6($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$excerpt = get_option(THEME_NAME."_".$blockType."_excerpt_".$blockId);
		$columns = get_option(THEME_NAME."_".$blockType."_columns_".$blockId);
		$pageColor = get_option(THEME_NAME."_".$blockType."_color_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}



		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'excerpt' =>$excerpt,
			'link' =>false,
			'columns' =>$columns,
			'pageColor' =>"#".$pageColor,
		);

		//set wp query
		$args=array(
			'showposts' => $count,
			'order' => 'DESC',
			'cat' => $cat,
			'offset' =>$offset,
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post',
			'ignore_sticky_posts' => true
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-2";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE POPULAR NEWS STYLE 3					*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_7($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$pageColor = get_option(THEME_NAME."_".$blockType."_color_".$blockId);

	
		if(!$offset) {
			$offset = "0";
		}


		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'link' =>false,
			'pageColor' =>"#".$pageColor,
		);

		//set wp query
		$args=array(
			'showposts' => $count,
			'order' => 'DESC',
			'cat' => $cat,
			'offset' =>$offset,
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post',
			'ignore_sticky_posts' => true
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-3";
		return $block;

	}

	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE POPULAR NEWS STYLE 4					*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_8($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$pageColor = get_option(THEME_NAME."_".$blockType."_color_".$blockId);

	
		if(!$offset) {
			$offset = "0";
		}


		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'link' =>false,
			'pageColor' =>"#".$pageColor,
		);

		//set wp query
		$args=array(
			'showposts' => $count,
			'order' => 'DESC',
			'cat' => $cat,
			'offset' =>$offset,
			'orderby'	=> 'meta_value_num',
			'meta_key'	=> THEME_NAME.'_post_views_count',
			'post_type'=> 'post',
			'ignore_sticky_posts' => true
		);

		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "latest-news-4";
		return $block;

	}
	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE HTML BLOCK								*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_html($blockType, $blockId,$blockInputType) {
		global $post;
		$code = get_option(THEME_NAME."_".$blockType."_".$blockId);
		$title = get_option(THEME_NAME."_".$blockType."_title_".$blockId);

		
		//set block attributes
		$attr = array(
			'code' =>wpautop(stripslashes(do_shortcode($code))),
			'title' =>stripslashes($title),
		);


		//add all data in array
		$data = array($attr);

		//set data
		$this->set_data($data);
		$block = "html";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE REVIEWS BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_9($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$columns = get_option(THEME_NAME."_".$blockType."_columns_".$blockId);
		$showImage = get_option(THEME_NAME."_".$blockType."_show_image_".$blockId);
		$pageColor = get_option(THEME_NAME."_".$blockType."_color_".$blockId);
		$type = get_option(THEME_NAME."_".$blockType."_type_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}

		$visitor_rate = get_option(THEME_NAME."_visitor_rate");

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'columns' =>$columns,
			'showImage' =>$showImage,
			'link' =>false,
			'pageColor' =>"#".$pageColor,
		);
		if($type=="top") {
			//set wp query
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'order' => 'DESC',
				'orderby'	=> 'meta_value_num',
				'offset' =>$offset
			);

			if( $visitor_rate == "on" ) {
				$args['meta_key'] = THEME_NAME.'_ratings_average_2';
			} else {
				$args['meta_key'] = THEME_NAME.'_ratings_average';
			}

		} else {
			//set wp query
			$args = array(
				'post_type' => "post",
				'cat' => $cat,
				'order' => 'DESC',
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'meta_query' => array(
				    array(
				        'key' => THEME_NAME.'_ratings_average',
				        'value'   => '0',
				        'compare' => '>='
				    )
				),
				'offset' =>$offset
			);	

			if( $visitor_rate == "on" ) {
				$args['meta_query']['key'] = THEME_NAME.'_ratings_average_2';
			} else {
				$args['meta_query']['key'] = THEME_NAME.'_ratings_average';
			}			
		}


		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "reviews";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE SHOP BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_10($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
		$columns = get_option(THEME_NAME."_".$blockType."_columns_".$blockId);
		$pageColor = get_option(THEME_NAME."_".$blockType."_color_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}


		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'columns' =>$columns,
			'link' =>false,
			'pageColor' =>"#".$pageColor,
		);

		if($cat) {
			//set wp query
			$args = array(
				'post_type' => "product",
				'tax_query' => array(
					array(
						'taxonomy' => 'product_cat',
						'field' => 'id',
						'terms' => $cat
					)
				),
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'offset' =>$offset
			);
		} else {
			//set wp query
			$args = array(
				'post_type' => "product",
				'showposts' => $count,
				'ignore_sticky_posts' => "1",
				'offset' =>$offset
			);
		}


		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "shop";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 						HOMEPAGE LATEST VIDEO BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_news_block_11($blockType, $blockId,$blockInputType) {
		global $post;
		$title = stripslashes(get_option(THEME_NAME."_".$blockType."_title_".$blockId));
		$count = get_option(THEME_NAME."_".$blockType."_count_".$blockId);
		$cat = get_option(THEME_NAME."_".$blockType."_cat_".$blockId);
		$offset = get_option(THEME_NAME."_".$blockType."_offset_".$blockId);
	
		if(!$offset) {
			$offset = "0";
		}

		if($cat) {
			$pageColor = ot_title_color($cat, "category", false);
			$link = get_category_link($cat);
		} else {
			$pageColor = ot_title_color(get_option('page_for_posts'),'page', false);
			$link = get_page_link(get_option('page_for_posts'));
		}

		//set block attributes
		$attr = array(
			'title' =>$title,
			'count' =>$count,
			'cat' => $cat,
			'offset' =>$offset,
			'link' =>false,
			'pageColor' => $pageColor,
		);

		//set wp query
		$args=array(
			'showposts' => $count,
			'order' => 'DESC',
			'cat' => $cat,
			'offset' =>$offset,
			'post_type'=> 'post',
			'ignore_sticky_posts' => true,
			'meta_query' => array(
			    array(
			        'key' => THEME_NAME.'_video',
			        'value'   => array(''),
			        'compare' => 'NOT IN'
			    )
			)
		);


		$my_query = new WP_Query($args);

		//add all data in array
		$data = array($my_query, $attr);

		//set data
		$this->set_data($data);
		$block = "video";
		return $block;

	}


	/* -------------------------------------------------------------------------*
	 * 							HOMEPAGE BANNER BLOCK							*
	 * -------------------------------------------------------------------------*/
	 
	public function homepage_banner($blockType, $blockId,$blockInputType) {
		global $post;
		$code = get_option(THEME_NAME."_".$blockType."_".$blockId);

		
		//set block attributes
		$attr = array(
			'code' =>wpautop(stripslashes(do_shortcode($code)))
		);

		//add all data in array
		$data = array($attr);

		//set data
		$this->set_data($data);
		$block = "banner";
		return $block;

	}

	private static function set_data($data) {
		self::$data = $data;
	}

	public static function get_data() {
		return self::$data;
	}


} 
?>