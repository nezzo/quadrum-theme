<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');

	//banner settings
	$banner_type = get_option ( THEME_NAME."_banner_type" );

	//bg type
	$bg_type = get_option ( THEME_NAME."_body_bg_type" );
	$bg_color = get_option ( THEME_NAME."_body_color" );
	$bg_image = get_option ( THEME_NAME."_body_image" );
	$bg_texture = get_option ( THEME_NAME."_body_pattern" );
	if(!$bg_texture) $bg_texture = "texture-1";

	//colors
	$color_1 = get_option(THEME_NAME."_color_1");
	$color_2 = get_option(THEME_NAME."_color_2");
	$color_3 = get_option(THEME_NAME."_color_3");
	$color_4 = get_option(THEME_NAME."_color_4");
	$color_5 = get_option(THEME_NAME."_color_5");
	$color_6 = get_option(THEME_NAME."_color_6");



?>


/* Main Color Scheme */
h1.page-title,
.mini-sidebar .widget > h3,
input[type=submit],
#sidebar .widget > h3,
.item-block .item-comment,
.strict-block .block-title,
.breaking-news .breaking-title,
.tag-cloud a,
#wp-calendar thead,
#wp-calendar caption,
.ot-jumplist .open-jumplist,
.ot-jumplist .actual-list {
	background-color: #<?php echo $color_1;?>;
}
#wp-calendar tbody td#today {
	/* box-shadow: inset 1px 1px 0 1px #fff, inset 1px 0 0 1px #fff, inset 1px 1px 0 3px <-CUSTOM->, inset 1px 0 0 3px <-CUSTOM->; */
	box-shadow: inset 1px 1px 0 1px #fff, inset 1px 0 0 1px #fff, inset 1px 1px 0 3px #<?php echo $color_1;?>, inset 1px 0 0 3px #<?php echo $color_1;?>;
}

/* Main Menu Color */
.header #main-menu {
	background-color: #<?php echo $color_2;?>;
}

/* Link color */
a {
	color: #<?php echo $color_3;?>;
}

/* Mouse-Over link color */
a:hover {
	color: #<?php echo $color_4;?>;
}

/* Footer Widget Title Color */
.footer .widget > h3 {
	color: #<?php echo $color_5;?>;
}

/* Footer Widget Title Bottom Border */
.footer .widget > h3 {
	border-bottom: 3px solid #<?php echo $color_6;?>;
}

/* Background Color/Texture/Image */
body {
	<?php if($bg_type == "color") { ?>
		background: #<?php echo $bg_color;?>;
	<?php } else if ($bg_type == "pattern") { ?> 
		background: url(<?php echo THEME_IMAGE_URL."background-".$bg_texture;?>.jpg);
	<?php } else if ($bg_type == "image") { ?>
		background-image: url(<?php echo $bg_image;?>);background-size: 100%; background-attachment: fixed;
	<?php } else { ?>
		background: #<?php echo $bg_color;?>;
	<?php } ?>

}

<?php
	if ( $banner_type == "image" ) {
	//Image Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; z-index:1002; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php
	} else if ( $banner_type == "text" ) {
	//Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; height:auto; max-width:700px; z-index:1002; border: 1px solid #000; background: #e5e5e5 url(<?php echo get_template_directory_uri(); ?>/images/dotted-bg-6.png) 0 0 repeat; color: #000; font-family: Tahoma,sans-serif;font-size: 14px; line-height: 24px; border: 1px solid #cccccc; -moz-border-radius: 4px; -webkit-border-radius: 4px; border-radius: 4px; text-shadow: #fff 0 1px 0; }
		#popup center { display: block; padding: 20px 20px 20px 20px; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -12px; top: -12px; }
<?php 
	} else if ( $banner_type == "text_image" ) {
	//Image And Text Banner
?>
		#overlay { width:100%; height:100%; position:fixed;  _position:absolute; top:0; left:0; z-index:1001; background-color:#000000; overflow: hidden;  }
		#popup { display: none; position:absolute; width:auto; z-index:1002; color: #000; font-size: 11px; font-weight: bold; }
		#popup center { padding: 15px 0 0 0; }
		#baner_close { width: 22px; height: 25px; background: url(<?php echo get_template_directory_uri(); ?>/images/close.png) 0 0 repeat; text-indent: -5000px; position: absolute; right: -10px; top: -10px; }
<?php } ?>
