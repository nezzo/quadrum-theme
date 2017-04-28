<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$page_layout = get_option(THEME_NAME."_page_layout");
	$headerStyle = get_option(THEME_NAME."_header_style");

	//logo settings
	$logo = get_option(THEME_NAME.'_logo');	

	//top banner	
	$topBanner = get_option(THEME_NAME."_top_banner");
	$topBannerCode = do_shortcode(stripslashes(get_option(THEME_NAME."_top_banner_code")));


	//search
	$search = get_option(THEME_NAME."_search");
	
	//share icons
	$shareIcons = get_option(THEME_NAME."_share_icons");

	//menu layout
	$menuLayout = get_option(THEME_NAME."_menu_layout");	

	//page layout
	$pageWidth = get_option ( THEME_NAME."_page_width" );

	//jumplist
	$jumplist = get_option(THEME_NAME."_jumplist");
	$jumplistCat = get_option(THEME_NAME."_jumplist_cat");
	//social icons
	$social = get_option(THEME_NAME."_social");
	$socialFacebook = get_option(THEME_NAME."_social_facebook");
	$socialTwitter = get_option(THEME_NAME."_social_twitter");
	$socialGoogle = get_option(THEME_NAME."_social_google");

	//weather
	$weatherSet = get_option(THEME_NAME."_weather");
	$locationType = get_option(THEME_NAME."_weather_location_type");
	if($locationType == "custom") {
		$weather = OT_weather_forecast(str_replace(' ', '+', get_option(THEME_NAME."_weather_city")));
	} else {
		$weather = OT_weather_forecast($_SERVER['REMOTE_ADDR']);
	}



?>
		<!-- BEGIN .boxed -->
		<div class="boxed<?php echo $page_layout=="boxed" ? " active" : false; ?><?php echo $pageWidth=="1000" ? " active width1000" : false; ?>">
			
			<!-- BEGIN .header -->
			<header class="header">
	
				<?php
					if ( function_exists( 'register_nav_menus' )) {
						$walker = new OT_Walker_Top;
						$args = array(
							'container' => '',
							'theme_location' => 'top-menu',
							'items_wrap' => '<ul class="right ot-menu-add" rel="'.__("Top Menu",'quadrum-theme')
.'">%3$s</ul>',
							'depth' => 3,
							"echo" => false,
							"walker" => $walker
						);
									
									
						if(has_nav_menu('top-menu') || $shareIcons=="on") {
							$link = home_url();
				?>
					<div class="header-topmenu">
						<!-- BEGIN .wrapper -->
						<div class="wrapper">
							<?php if($shareIcons=="on") { ?>
								<ul class="left">
									<li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $link;?>" data-url="<?php echo $link;?>" data-url="<?php echo $link;?>" class="topmenu-link topmenu-facebook ot-share"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" data-hashtags="" data-url="<?php echo $link;?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php echo urlencode(remove_html(get_the_title()));?>" class="topmenu-link topmenu-twitter ot-tweet"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://plus.google.com/share?url=<?php echo $link; ?>" class="topmenu-link topmenu-google ot-pluss"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $link;?>&title=<?php echo urlencode(remove_html(get_the_title()));?>" data-url="<?php echo $link;?>" class="topmenu-link topmenu-linkedin ot-link"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							<?php } ?>
							<?php 
								if(has_nav_menu('top-menu')) {
									echo wp_nav_menu($args); 
								} 
							?>
						<!-- END .wrapper -->
						</div>
					</div>
				<?php 					
						}		

					}	

				?>

				<!-- BEGIN .wrapper -->
				<div class="wrapper">
					<?php if($headerStyle=="2") { ?>
					<div class="wraphead header-2-content">
						<?php if($weatherSet=="on" && !isset($weather['error'])) { ?>
							<div class="header-weather">
								<img src="<?php echo THEME_IMAGE_URL.$weather['image'];?>.png" class="weather-icon" alt="<?php echo $weather['weatherDesc'];?>" />
								<span class="small-title"><?php _e("Weather Report",'quadrum-theme')
;?></span>
								<strong><?php echo $weather['city'].', '.$weather['country'];?></strong>
								<span class="default-title"><?php echo $weather['temp_'.get_option(THEME_NAME."_temperature")];?>, <?php echo $weather['weatherDesc'];?></span>
								<div class="clear-float"></div>
							</div>
						<?php 
							} else if($weatherSet=="on") {
								echo $weather['error'];
							} 
						?>
						
						<div class="row">
						
						  <div class="col-md-8">
						    <div class="header-logo">
							    <?php if($logo) { ?>
								    <a href="<?php echo home_url(); ?>"><img src="<?php echo $logo;?>" alt="<?php bloginfo('name'); ?>" /></a>
							    <?php } else { ?>
								    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
							    <?php } ?>
						    </div>
						  </div> 
						  <div class="col-md-1">
						    <div class="raport">
						    <?php /*подставляем id нужной нам страницы (страница рапорта)*/ ?>
						      <a class="btn btn-danger" href="<?=get_page_link(675,false, true)?>">Рaпорт</a>
						    </div>
						  </div>
						  <div class="col-md-3">
						    <?php if($topBanner=="on") { ?>
							    <div class="header-advert">
								    <?php echo do_shortcode(stripslashes($topBannerCode));?>
							    </div>
						    <?php } ?>
						    
						    
						    <?php if($search=="on") { ?>
							    <div class="header-search">
								    <form method="get" action="<?php echo home_url(); ?>" name="searchform">
									    <i class="fa fa-search"></i>
									    <input type="text" placeholder="<?php _e("Type &amp; hit enter",'quadrum-theme')
    ;?>" value="" class="search-box" name="s" id="s" />
								    </form>
							    </div>
						    <?php } ?>
						 </div>
						</div> 
					</div>
					<?php } else { ?>
						<div class="wraphead header-1-content">
							<div class="header-logo">
								<?php if($logo) { ?>
									<a href="<?php echo home_url(); ?>"><img src="<?php echo $logo;?>" alt="<?php bloginfo('name'); ?>" /></a>
								<?php } else { ?>
									<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
								<?php } ?>
							</div>
							<?php if($topBanner=="on") { ?>
							<div class="header-advert">
								<?php echo do_shortcode(stripslashes($topBannerCode));?>
							</div>
							<?php } ?>
						</div>
					<?php } ?>

				<!-- END .wrapper -->
				</div>

				<div id="main-menu"<?php if($menuLayout=="on") { ?> class="thisisfixed"<?php } ?>>
					<!-- BEGIN .wrapper -->
					<div class="wrapper">
						<?php	
			
							wp_reset_query();
							if ( function_exists( 'register_nav_menus' )) {
								$walker = new OT_Walker;
								if(get_option(THEME_NAME."_menu_effect")=="on") {
									$class = " transition-active";
								} else {
									$class = false;
								}
								$args = array(
									'container' => '',
									'theme_location' => 'main-menu',
									'items_wrap' => '<ul class="%2$s ot-menu-add" rel="'.__("Main Menu",'quadrum-theme')
.'">%3$s</ul>',
									'depth' => 3,
									"echo" => false,
									'walker' => $walker
								);
											
											
								if(has_nav_menu('main-menu')) {
									echo wp_nav_menu($args);		
								} else {
									echo "<ul rel=\"".__("Main Menu",'quadrum-theme')
."\"><li class=\"navi-none ot-menu-add\"><a href=\"".admin_url("nav-menus.php") ."\">Please set up ".THEME_FULL_NAME." menu!</a></li></ul>";
								}		

							}
						?>
					<!-- END .wrapper -->
					</div>
				</div>
					
				<div class="menu-overlay"></div>
				<?php
					if ( function_exists( 'register_nav_menus' )) {
						$args = array(
							'container' => '',
							'theme_location' => 'secondary-menu',
							'items_wrap' => '<ul class="ot-menu-add" rel="'.__("Secondary Menu",'quadrum-theme')
.'">%3$s</ul>',
							'depth' => 1,
							"echo" => false,
						);
									
									
						if(has_nav_menu('secondary-menu')) {
				?>
					<div id="top-sub-menu">
						<!-- BEGIN .wrapper -->
						<div class="wrapper">
							<?php
								echo wp_nav_menu($args);	
							?>
						<!-- END .wrapper -->
						</div>
					</div>
				<?php
						}		

					}	

				?>		
			<!-- END .header -->
			</header>



			<!-- BEGIN .content -->
			<section class="content">
				<?php if($jumplist=="on" || $social=="on") { ?>
					<div class="ot-jumplist">
						<?php if($jumplist=="on") { ?>
							<a href="#open-jumplist" class="open-jumplist"><strong><?php _e("Category Jumptlist",'quadrum-theme')
;?>&nbsp;&nbsp;<i class="fa fa-arrow-up"></i></strong></a>

							<div class="actual-list">
								<a href="#close-jumplist" class="close-jumplist"><strong><?php _e("Jumptlist",'quadrum-theme')
;?><i class="fa fa-arrow-right"></i></strong></a>
								<ul>
									<?php foreach($jumplistCat as $cat) { ?>
										<li><a href="<?php echo get_category_link($cat);?>"><?php echo get_cat_name($cat);?></a></li>
									<?php } ?>
								</ul>
							</div>
						<?php } ?>
						<?php if($social=="on") { ?>
							<?php if($socialFacebook) { ?><a href="<?php echo $socialFacebook; ?>" class="jumplist-facebook" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>
							<?php if($socialTwitter) { ?><a href="<?php echo $socialTwitter; ?>" class="jumplist-twitter" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
							<?php if($socialGoogle) { ?><a href="<?php echo $socialGoogle; ?>" class="jumplist-google" target="_blank"><i class="fa fa-google-plus"></i></a><?php } ?>
						<?php } ?>
					</div>
				<?php } ?>
<?php wp_reset_query(); ?>


