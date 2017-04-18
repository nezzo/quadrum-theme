<?php
global $orange_themes_managment;
$orangeThemes_slider_options= array(
 array(
	"type" => "navigation",
	"name" => __("Style Settings",'quadrum-theme'),
	"slug" => "custom-styling"
),

array(
	"type" => "tab",
	"slug"=>'custom-styling'
),

array(
	"type" => "sub_navigation",
	"subname"=>array(
		array("slug"=>"font_style", "name"=>__("Font Style",'quadrum-theme')),
		array("slug"=>"page_colors", "name"=>__("Page Colors/Style",'quadrum-theme')),
		array("slug"=>"page_layout", "name"=>__("Layout",'quadrum-theme'))
		)
),

/* ------------------------------------------------------------------------*
 * PAGE FONT SETTINGS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'font_style'
),

array(
	"type" => "row"
),

array(
	"type" => "google_font_select",
	"title" => "Menu & Titles font family:",
	"id" => $orange_themes_managment->themeslug."_google_font_1",
	"sort" => "alpha",
	"info" => "Font previews You Can find here: <a href='http://www.google.com/webfonts' target='_blank'>Google Fonts</a>",
	"default_font" => array('font' => "Titillium Web", 'txt' => "(default)")
),

array(
	"type" => "close"

),

array(
	"type" => "save",
	"title" => "Save Changes"
),
   
array(
	"type" => "closesubtab"
),
/* ------------------------------------------------------------------------*
 * PAGE COLORS
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_colors'
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Default Category/News page Color",'quadrum-theme')
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_default_cat_color", 
	"title" => __("Color:",'quadrum-theme'),
	"std" => "5a9e25",
),

array(
	"type" => "close"
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Page Color Settings",'quadrum-theme')
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_1", 
	"title" => __("Main Color Scheme:",'quadrum-theme'),
	"std" => "2c3e50",
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_2", 
	"title" => __("Main Menu Color:",'quadrum-theme'),
	"std" => "292929",
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_3", 
	"title" => __("Link color:",'quadrum-theme'),
	"std" => "232323",
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_4", 
	"title" => __("Mouse-Over link color:",'quadrum-theme'),
	"std" => "2c3e50",
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_5", 
	"title" => __("Footer Widget Title Color:",'quadrum-theme'),
	"std" => "353535",
),

array( 
	"type" => "color", 
	"id" => $orange_themes_managment->themeslug."_color_6", 
	"title" => __("Footer Widget Title Bottom Border:",'quadrum-theme'),
	"std" => "2c3e50",
),

array(
	"type" => "close"
),


array(
	"type" => "row",

),
array(
	"type" => "title",
	"title" => __("Body Backgrounds (only boxed view)",'quadrum-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_body_bg_type",
	"radio" => array(
		array("title" => __("Pattern:",'quadrum-theme'), "value" => "pattern"),
		array("title" => __("Custom Image:",'quadrum-theme'), "value" => "image"),
		array("title" => __("Color:",'quadrum-theme'), "value" => "color"),
	),
	"std" => "pattern"
),

array(
	"type" => "select",
	"title" => "Patterns ",
	"id" => $orange_themes_managment->themeslug."_body_pattern",
	"options"=>array(
		array("slug"=>"texture-1", "name"=>__("Texture 1",'quadrum-theme')), 
		array("slug"=>"texture-2", "name"=>__("Texture 2",'quadrum-theme')), 
		array("slug"=>"texture-3", "name"=>__("Texture 3",'quadrum-theme')), 
		array("slug"=>"texture-4", "name"=>__("Texture 4",'quadrum-theme')), 
		array("slug"=>"texture-5", "name"=>__("Texture 5",'quadrum-theme')), 
	),
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_body_bg_type", "value" => "pattern")
	)
),

array(
	"type" => "color",
	"title" => __("Body Background Color:",'quadrum-theme'),
	"id" => $orange_themes_managment->themeslug."_body_color",
	"std" => "f1f1f1",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_body_bg_type", "value" => "color")
	)
),

array(
	"type" => "upload",
	"title" => __("Body Background Image:",'quadrum-theme'),
	"id" => $orange_themes_managment->themeslug."_body_image",
	"protected" => array(
		array("id" => $orange_themes_managment->themeslug."_body_bg_type", "value" => "image")
	)
),

array(
	"type" => "close",
),

array(
	"type" => "save",
	"title" => __("Save Changes",'quadrum-theme'),
),
   
array(
	"type" => "closesubtab"
),
/* ------------------------------------------------------------------------*
 * PAGE LAYOUT
 * ------------------------------------------------------------------------*/

 array(
	"type" => "sub_tab",
	"slug"=> 'page_layout'
),

array(
	"type" => "row"
),
array(
	"type" => "title",
	"title" => __("Enable Responsive",'quadrum-theme'),
),

array(
	"type" => "checkbox",
	"title" => __("Enable",'quadrum-theme'),
	"id" => $orange_themes_managment->themeslug."_responsive"
),

array(
	"type" => "close"
),


array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Page Layout",'quadrum-theme'),
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_page_layout",
	"radio" => array(
		array("title" => __("Boxed:",'quadrum-theme'), "value" => "boxed"),
		array("title" => __("Wide:",'quadrum-theme'), "value" => "wide"),
	),
),

array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Header Style",'quadrum-theme')
),

array(
	"type" => "select",
	"title" => __("Style",'quadrum-theme'),
	"id" => $orange_themes_managment->themeslug."_header_style",
	"options"=>array(
		array("slug"=>"1", "name"=>__("Logo + Banner",'quadrum-theme')), 
		array("slug"=>"2", "name"=>__("Weather Forecast + Logo + Search",'quadrum-theme')),
	)
),
array(
	"type" => "close"
),
array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Main Menu",'quadrum-theme'),
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_menu_layout",
	"radio" => array(
		array("title" => __("Sticky:",'quadrum-theme'), "value" => "on"),
		array("title" => __("Normal:",'quadrum-theme'), "value" => "off"),
	),
),



array(
	"type" => "close"
),

array(
	"type" => "row"
),

array(
	"type" => "title",
	"title" => __("Page Width",'quadrum-theme')
),

array(
	"type" => "radio",
	"id" => $orange_themes_managment->themeslug."_page_width",
	"radio" => array(
		array("title" => __("1240 PX:",'quadrum-theme'), "value" => "1240"),
		array("title" => __("1000 PX:",'quadrum-theme'), "value" => "1000"),
	),
	"std" => "1240"
),



array(
	"type" => "close"
),

array(
	"type" => "save",
	"title" => __("Save Changes",'quadrum-theme')
),
   
array(
	"type" => "closesubtab"
),

array(
	"type" => "closetab"
)
 
);

$orange_themes_managment->add_options($orangeThemes_slider_options);
?>