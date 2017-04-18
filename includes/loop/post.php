<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	$image = get_post_thumb($post->ID,0,0); 
	if(!is_page_template ( 'template-homepage.php' )) { 
		$tag = "h2";
	} else {
		$tag = "h3";
	}
	
	if(get_option(THEME_NAME."_show_first_thumb") != "on" || $image['show']!=true) {
		$class = " image-no";
	} else {
		// Image size
		$imageSizeSingle = get_post_meta( $post->ID, THEME_NAME."_image_size", true ); 

		if(is_category()) {
			$imageSize = ot_get_option( get_cat_id( single_cat_title("",false) ), 'blog_style', false );
		} else {
			$imageSize = false;
		}
		if(!$imageSize) {
			$imageSize = get_option(THEME_NAME."_image_size");	
		}

		if($imageSize=="custom") {
			if(!$imageSizeSingle) $imageSizeSingle = "small";
			$class = " image-".$imageSizeSingle;
		} else if($imageSize=="large") {
			$class = " image-large";
		} else {
			$class = " image-small";	
		}

	}

	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");
	$postAuthor = get_option(THEME_NAME."_post_author");

	if(is_category()) {
		$pageColor = ot_title_color(get_cat_id( single_cat_title("",false) ), "category", false);
	} else {
		$pageColor = ot_title_color(get_option('page_for_posts'),'page', false);;
	}

	$rating = get_post_meta($post->ID, THEME_NAME."_ratings", true );
?>
	<div <?php post_class("item".$class); ?>>
		<?php if($class!=" image-no") { ?>
			<div class="item-header">
				<?php if ( comments_open() && $postComments=="on") { ?>
					<a href="<?php the_permalink();?>#comments" class="item-comment" style="background: <?php echo $pageColor;?>;"><span><?php comments_number("0","1","%"); ?></span><i></i></a>
				<?php } ?>
				<?php get_template_part(THEME_LOOP."image"); ?>
			</div>
		<?php } ?>
		<div class="item-content">
			<h3>
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
				<?php if ( comments_open() && $postComments=="on" && $class==" image-no") { ?>
					<a href="<?php the_permalink();?>#comments" class="item-comment" style="background: <?php echo $pageColor;?>;"><span><?php comments_number("0","1","%"); ?></span></a>
				<?php } ?>
			</h3>
			<div class="item-icons">
				<?php 
					if($postAuthor=="on") { 
						echo the_author_posts_link();
					} 
				?>
				<?php if($postDate=="on") { ?>
					<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
						<i class="fa fa-calendar"></i><?php the_time(get_option('date_format'));?>
					</a>
				<?php } ?>
			</div>
            <?php if($rating) { ?>
                <?php
                    $ratings = ot_avarage_rating($post->ID);
                ?>
                    <div class="ot-rating-wrapper">
                        <div class="ot-star-rating">
                            <span style="width:<?php echo $ratings[0];?>%"><strong class="rating"><?php echo $ratings[1];?></strong> <?php _e("out of 5",'quadrum-theme')
;?></span>
                        </div>
                        <span class="ot-star-text"><?php _e("Rating:",'quadrum-theme')
;?> <strong><?php echo $ratings[1];?></strong></span>
                    </div>
            <?php } ?>
			<?php 
				add_filter('excerpt_length', 'new_excerpt_length_40');
				the_excerpt();
				remove_filter('excerpt_length', 'new_excerpt_length_40');
			?>
			<a href="<?php the_permalink();?>" class="trans-button"><i class="fa fa-align-right"></i><?php _e("Read More",'quadrum-theme')
;?></a>
		</div>
		<div class="clear-float"></div>
	</div>
