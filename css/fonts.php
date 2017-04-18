<?php
	header("Content-type: text/css");
	require_once('../../../../wp-load.php');
	//fonts
	$google_font_1 = get_option(THEME_NAME."_google_font_1");



?>

/* Menu & Titles font family */
h1, h2, h3,
h4, h5, h6,
.header #main-menu a,
.header #top-sub-menu a,
.header-topmenu ul li a,
.header-2-content .header-weather strong,
.widget-contact li strong,
.item-block-4 .item-header strong,
.photo-gallery-grid .item .category-photo {
	font-family: "<?php echo $google_font_1;?>", sans-serif;
}



