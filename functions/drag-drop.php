<?php
global $orangeThemes_fields;
$orangeThemes_general_options= array(



/* ------------------------------------------------------------------------*
 * HOME SETTINGS
 * ------------------------------------------------------------------------*/   

array(
	"type" => "homepage_blocks",
	"title" => __("Homepage Blocks:",'quadrum-theme')
,
	"id" => $orangeThemes_fields->themeslug."_homepage_blocks",
	"blocks" => array(
		array(
			"title" => __("Latest News",'quadrum-theme')
,
			"type" => "homepage_news_block",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),
				array(
					"type" => "select",
					"title" => __("Columns:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_columns",
					"options"=>array(
						array("slug"=>"3", "name"=>__("3 Blocks in Row",'quadrum-theme')
), 
						array("slug"=>"4", "name"=>__("4 Blocks in Row",'quadrum-theme')
), 
					),
					"home" => "yes"
				),				
				array(
					"type" => "select",
					"title" => __("Show Images:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_show_image",
					"options"=>array(
						array("slug"=>"on", "name"=>__("Yes",'quadrum-theme')
), 
						array("slug"=>"off", "name"=>__("No",'quadrum-theme')
), 
					),
					"home" => "yes"
				),
			),
		),
		array(
			"title" => __("Latest News Style 2",'quadrum-theme')
,
			"type" => "homepage_news_block_1",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_1_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_1_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_1_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_1_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),			
				array(
					"type" => "select",
					"title" => __("Columns:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_1_columns",
					"options"=>array(
						array("slug"=>"3", "name"=>__("3 Blocks in Row",'quadrum-theme')
), 
						array("slug"=>"4", "name"=>__("4 Blocks in Row",'quadrum-theme')
), 
					),
					"home" => "yes"
				),		
				array(
					"type" => "select",
					"title" => __("Show Excerpt:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_1_excerpt",
					"options"=>array(
						array("slug"=>"on", "name"=>__("Yes",'quadrum-theme')
), 
						array("slug"=>"off", "name"=>__("No",'quadrum-theme')
), 
					),
					"home" => "yes"
				),
			),

		),
		array(
			"title" => __("Category News",'quadrum-theme')
,
			"type" => "homepage_news_block_2",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "multiple_select",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array(
					"type" => "select",
					"title" => __("Columns:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_columns",
					"options"=>array(
						array("slug"=>"3", "name"=>__("3 Blocks in Row",'quadrum-theme')
), 
						array("slug"=>"4", "name"=>__("4 Blocks in Row",'quadrum-theme')
), 
					),
					"home" => "yes"
				),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_2_color", 
					"title" => __("Color:",'quadrum-theme')
,
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),

		),
		array(
			"title" => __("Latest News Style 3",'quadrum-theme')
,
			"type" => "homepage_news_block_3",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_3_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),			

			),

		),
		array(
			"title" => __("Latest News Style 4",'quadrum-theme')
,
			"type" => "homepage_news_block_4",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_4_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),			

			),

		),
		array(
			"title" => __("Popular News",'quadrum-theme')
,
			"type" => "homepage_news_block_5",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),
				array(
					"type" => "select",
					"title" => __("Columns:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_columns",
					"options"=>array(
						array("slug"=>"3", "name"=>__("3 Blocks in Row",'quadrum-theme')
), 
						array("slug"=>"4", "name"=>__("4 Blocks in Row",'quadrum-theme')
), 
					),
					"home" => "yes"
				),				
				array(
					"type" => "select",
					"title" => __("Show Images:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_show_image",
					"options"=>array(
						array("slug"=>"on", "name"=>__("Yes",'quadrum-theme')
), 
						array("slug"=>"off", "name"=>__("No",'quadrum-theme')
), 
					),
					"home" => "yes"
				),

				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_5_color", 
					"title" => __("Color:",'quadrum-theme')
,
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),
		),
		array(
			"title" => __("Popular News Style 2",'quadrum-theme')
,
			"type" => "homepage_news_block_6",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),			
				array(
					"type" => "select",
					"title" => __("Columns:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_columns",
					"options"=>array(
						array("slug"=>"3", "name"=>__("3 Blocks in Row",'quadrum-theme')
), 
						array("slug"=>"4", "name"=>__("4 Blocks in Row",'quadrum-theme')
), 
					),
					"home" => "yes"
				),		
				array(
					"type" => "select",
					"title" => __("Show Excerpt:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_excerpt",
					"options"=>array(
						array("slug"=>"on", "name"=>__("Yes",'quadrum-theme')
), 
						array("slug"=>"off", "name"=>__("No",'quadrum-theme')
), 
					),
					"home" => "yes"
				),
				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_6_color", 
					"title" => __("Color:",'quadrum-theme')
,
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),

		),

		array(
			"title" => __("Popular News Style 3",'quadrum-theme')
,
			"type" => "homepage_news_block_7",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),			

				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_7_color", 
					"title" => __("Color:",'quadrum-theme')
,
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),

		),
		array(
			"title" => __("Popular News Style 4",'quadrum-theme')
,
			"type" => "homepage_news_block_8",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),			

				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_8_color", 
					"title" => __("Color:",'quadrum-theme')
,
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),

		),
		array(
			"title" => __("Reviews",'quadrum-theme')
,
			"type" => "homepage_news_block_9",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),
				array(
					"type" => "select",
					"title" => __("Columns:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_columns",
					"options"=>array(
						array("slug"=>"3", "name"=>__("3 Blocks in Row",'quadrum-theme')
), 
						array("slug"=>"4", "name"=>__("4 Blocks in Row",'quadrum-theme')
), 
					),
					"home" => "yes"
				),					
				array(
					"type" => "select",
					"title" => __("Type:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_type",
					"options"=>array(
						array("slug"=>"latest", "name"=>__("Latest Reviews",'quadrum-theme')
), 
						array("slug"=>"top", "name"=>__("Top Reviews",'quadrum-theme')
), 
					),
					"home" => "yes"
				),				
				array(
					"type" => "select",
					"title" => __("Show Images:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_show_image",
					"options"=>array(
						array("slug"=>"on", "name"=>__("Yes",'quadrum-theme')
), 
						array("slug"=>"off", "name"=>__("No",'quadrum-theme')
), 
					),
					"home" => "yes"
				),

				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_9_color", 
					"title" => __("Color:",'quadrum-theme')
,
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),
		),
		array(
			"title" => __("Shop",'quadrum-theme')
,
			"type" => "homepage_news_block_10",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_cat",
					"taxonomy" => "product_cat",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),
				array(
					"type" => "select",
					"title" => __("Columns:",'quadrum-theme')
,
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_columns",
					"options"=>array(
						array("slug"=>"3", "name"=>__("3 Blocks in Row",'quadrum-theme')
), 
						array("slug"=>"4", "name"=>__("4 Blocks in Row",'quadrum-theme')
), 
					),
					"home" => "yes"
				),									

				array( 
					"type" => "color", 
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_10_color", 
					"title" => __("Color:",'quadrum-theme')
,
					"std" => get_option(THEME_NAME."_default_cat_color"),
					"home" => "yes"
				),
			),
		),
		array(
			"title" => __("Latest Video Block",'quadrum-theme')
,
			"type" => "homepage_news_block_11",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_11_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "scroller", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_11_count", "title" => __("Count:",'quadrum-theme')
, "max" => 30, "home" => "yes" ),
				array(
					"type" => "categories",
					"id" => $orangeThemes_fields->themeslug."_homepage_news_block_11_cat",
					"taxonomy" => "category",
					"title" => "Set Category",
					"home" => "yes"
				),
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_news_block_11_offset", "title" => __("From which post should start the loop (for example 4 ), for default leave it empty, or add 0. (Offset):",'quadrum-theme')
, "home" => "yes" ),			
			),

		),
		array(
			"title" => "HTML Code",
			"type" => "homepage_html",
			"options" => array(
				array( "type" => "input", "id" => $orangeThemes_fields->themeslug."_homepage_html_title", "title" => __("Title:",'quadrum-theme')
, "home" => "yes" ),
				array( "type" => "textarea", "id" => $orangeThemes_fields->themeslug."_homepage_html", "title" => __("HTML Code:",'quadrum-theme')
, "home" => "yes" ),
			),
		),
		array(
			"title" => "Banner Block",
			"type" => "homepage_banner",
			"options" => array(
				array( "type" => "textarea", "id" => $orangeThemes_fields->themeslug."_homepage_banner", "title" => __("HTML Code:",'quadrum-theme')
, "home" => "yes","sample" => '<a href="http://www.orange-themes.com" target="_blank"><img src="'.THEME_IMAGE_URL.'banner-728x90.jpg" alt="" title="" /></a>', ),
			),
		),

	)
),


 
 );


$orangeThemes_fields->add_options($orangeThemes_general_options);
?>