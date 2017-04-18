<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Archive Page
*/	
?>
<?php get_header(); ?>
<?php
	wp_reset_query();
	global $wpdb;
	$limit = 0;
	$months = $wpdb->get_results("SELECT DISTINCT MONTH( post_date ) AS month ,	YEAR( post_date ) AS year, COUNT( id ) as post_count FROM $wpdb->posts WHERE post_status = 'publish' and post_date <= now( ) and post_type = 'post' GROUP BY month , year ORDER BY post_date DESC");
	$cc=1;

	//page titile
	$titleShow = get_post_meta ( $post->ID, THEME_NAME."_title_show", true ); 


	//sidebars
	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");	

?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php get_template_part(THEME_SINGLE."page","title"); ?>
		<!-- BEGIN .strict-block -->
		<div class="strict-block">
			<!-- BEGIN .block-content -->
			<div class="item-block-4 split-stuff blocks-4">
				<?php 
					$args = array(
						'type'                     => 'post',
						'child_of'                 => 0,
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty'               => 1,
						'hierarchical'             => 1,
						'taxonomy'                 => 'category',
						'pad_counts'               => false );
							
					$categories = get_categories( $args );

					$count_total = count($categories );
					$firstColumnCount = round(($count_total/2), 0, PHP_ROUND_HALF_UP);
					$secondColumnCount = $count_total - $firstColumnCount;
					$counter = 1;
					foreach ( $categories as $category ) { 

						$cat_id = $category->term_id;
						$query='cat='.$cat_id.'&showposts=5';
						$my_query = new WP_Query($query);
						$titleColor = ot_title_color($cat_id, "category", false);
						$postCount = $my_query->post_count;
				?>
					<div class="item-block">
						<?php if ( $my_query->have_posts() ) : $my_query->the_post(); ?>
							<div class="item-header">
								<a href="<?php the_permalink();?>">
									<strong><?php echo get_cat_name($cat_id);?></strong>
									<?php echo ot_image_html($my_query->post->ID,282,180); ?>
								</a>
							</div>
						<?php endif; ?>
						<div class="item-content">
							<ul>
								<?php $my_query = new WP_Query($query); ?>
								<?php if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
									<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
								<?php endwhile; ?>
								<?php endif; ?>
							</ul>
						</div>
					</div>

					<?php $counter++; ?>
				<?php } ?>
			<!-- END .block-content -->
			</div>
		<!-- END .strict-block -->
		</div>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>