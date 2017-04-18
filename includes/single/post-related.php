<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	$postComments = get_option(THEME_NAME."_post_comment");
	$postDate = get_option(THEME_NAME."_post_date");
	
	//similar news
	$similarPosts = get_option(THEME_NAME."_similar_posts");
	$similarPostsSingle = get_post_meta( $post->ID, THEME_NAME."_similar_posts", true ); 

	if($similarPosts == "show" || ($similarPosts=="custom" && $similarPostsSingle=="show")) {
		$similarPostsShow = true;
	} else {
		$similarPostsShow = false;	
	}

	if($similarPostsShow==true) {
	
		wp_reset_query();
		$categories = get_the_category($post->ID);
		
		if ($categories) {
			$category_ids = array();
			foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

			$args=array(
				'category__in' => $category_ids,
				'post__not_in' => array($post->ID),
				'showposts'=>3,
				'ignore_sticky_posts'=>1,
				'orderby' => 'rand'
			);

			$my_query = new wp_query($args);
			$postCount = $my_query->post_count;
			$counter = 1;
?>
	<!-- BEGIN .strict-block -->
	<div class="strict-block">
		<div class="block-title">
			<h2><?php _e("Related Articles",'quadrum-theme')
;?></h2>
		</div>
		<!-- BEGIN .block-content -->
		<div class="block-content item-block-1 split-stuff blocks-3">
		<?php									
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()) {
					$my_query->the_post();
                    //get all post categories
                    $categories = get_the_category($my_query->post->ID);
                    $catCount = count($categories);
                    //select a random category id
                    $id = rand(0,$catCount-1);
                    //cat id
                    $catId = $categories[$id]->term_id
		?>
			<div class="item-block">
				<div class="item-header">
					<?php if ( comments_open() && $postComments=="on") { ?>
						<a href="<?php the_permalink();?>#comments" class="item-comment"><span><?php comments_number("0","1","%"); ?></span><i></i></a>
					<?php } ?>
					<?php if($catId) { ?>
						<a href="<?php echo get_category_link($catId);?>" class="item-category"><?php echo get_cat_name($catId);?></a>
					<?php } ?>
					<?php if($postDate=="on") { ?>
						<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>" class="item-date">
							<i class="fa fa-clock-o"></i>
							<?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ).__(" ago",'quadrum-theme')
; ?>
						</a>
					<?php } ?>
					<a href="<?php the_permalink();?>" class="item-photo">
						<?php echo ot_image_html($post->ID,374,200); ?>
					</a>
				</div>
				<div class="item-content">
					<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
					<?php 
						add_filter('excerpt_length', 'new_excerpt_length_20');
						the_excerpt();
					?>
				</div>
			</div>
			<?php } ?>
		<?php } ?>

		<!-- END .block-content -->
		</div>
	<!-- END .strict-block -->
	</div>


	<?php } ?>
<?php } ?>
<?php wp_reset_query();  ?>