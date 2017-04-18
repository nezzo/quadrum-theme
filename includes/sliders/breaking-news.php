<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();

	//braking slider	
	$breakingSlider = get_post_meta( ot_page_id(), THEME_NAME.'_breaking_slider', true );

	if(is_category()) {
		$breakingSliderCat = ot_get_option( get_cat_id( single_cat_title("",false) ), 'breaking_slider', false );
	}

	//post comments
	$postComments = get_option(THEME_NAME."_post_comment");
?>
<?php if((is_array($breakingSlider) && !empty($breakingSlider) && !in_array("slider_off",$breakingSlider)) || (is_category() && $breakingSliderCat=="on")) { ?>
	<?php
		if(is_category()) {
			$catId = get_cat_id( single_cat_title("",false) );
			$category_in = $catId;
		} else {
			$category_in = $breakingSlider;
		}

		$args=array(
			'category__in' => $category_in,
			'posts_per_page' => 6,
			'order'	=> 'DESC',
			'orderby'	=> 'date',
			'meta_key'	=> THEME_NAME.'_breaking_post',
			'meta_value'	=> 'show',
			'post_type'	=> 'post',
			'ignore_sticky_posts '	=> 1,
			'post_status '	=> 'publish'
		);
		$the_query = new WP_Query($args);

	?>
		<div class="breaking-news">
			<div class="breaking-title">
				<i class="fa fa-comments-o"></i>
				<h3><?php _e("Breaking News",'quadrum-theme')
;?></h3>
			</div>
			<div class="breaking-block">
				<ul>
					<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<li><h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4><p><?php add_filter('excerpt_length', 'new_excerpt_length_16'); the_excerpt();?>...</p><?php if ( comments_open() && $postComments=="on") { ?><a href="<?php the_permalink();?>#comments" class="comment-link"><i class="fa fa-comment-o"></i><?php comments_number("0","1","%"); } ?></a></li>
					<?php endwhile; else: ?>
						<li><?php  _e('No posts were found','quadrum-theme')
;?></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	<?php } ?>
<?php wp_reset_query();  ?>