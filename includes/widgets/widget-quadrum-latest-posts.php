<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_cat_posts");'));

class OT_cat_posts extends WP_Widget {
	function __construct() {
		 parent::__construct(false, $name = THEME_FULL_NAME.' '.__("Latests News",'quadrum-theme')
);	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __("Latests News",'quadrum-theme')
,
			'cat' => '',
			'count' => '3',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$cat = esc_attr($instance['cat']);
		$count = esc_attr($instance['count']);
        ?>
         	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __('Title:','quadrum-theme')
);?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('cat'); ?>"><?php printf ( __('Category:','quadrum-theme')
);?>
			<?php
			$args = array(
				'type'                     => 'post',
				'child_of'                 => 0,
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 1,
				'hierarchical'             => 1,
				'taxonomy'                 => 'category');
				$args = get_categories( $args ); 
			?> 	
			<select name="<?php echo $this->get_field_name('cat'); ?>" style="width: 100%; clear: both; margin: 0;">
				<option value=""><?php _e("Latest News",'quadrum-theme');
;?></option>
				<?php foreach($args as $ar) { ?>
					<option value="<?php echo $ar->term_id; ?>" <?php if($ar->term_id==$cat)  {echo 'selected="selected"';} ?>><?php echo $ar->cat_name; ?></option>
				<?php } ?>
			</select>
			
			</label></p>
			<p><label for="<?php echo $this->get_field_id('count'); ?>"><?php printf ( __('Post count:','quadrum-theme')
);?> <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>

			
        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cat'] = strip_tags($new_instance['cat']);
		$instance['count'] = strip_tags($new_instance['count']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
		$title = $instance['title'];
		$count = $instance['count'];
		$cat = $instance['cat'];



	

	
	$args=array(
		'cat'=> $cat,
		'posts_per_page'=> $count,
		'ignore_sticky_posts' => true
	);
	
	$the_query = new WP_Query($args);
		$counter = 1;

	$blogID = get_option('page_for_posts');

	if($cat) {
		$link = get_category_link( $cat );
	} else {
		$link = get_page_link($blogID);
	}

	$postDate = get_option(THEME_NAME."_post_date");
	$postComments = get_option(THEME_NAME."_post_comment");
?>	
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
			<a href="<?php echo $link;?>" class="widget-top-b"><?php _e("View more",'quadrum-theme');
;?></a>
			<div class="w-news-list">
				<?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<?php $rating = get_post_meta($the_query->post->ID, THEME_NAME."_ratings", true ); ?>
					<?php 
						$image = get_post_thumb($the_query->post->ID,0,0); 
					?>
						<!-- BEGIN .item -->
						<div class="item<?php if($image['show']!=true) { ?> no-image<?php } ?>">
							<?php if($image['show']==true) { ?>
								<div class="item-photo">
									<a href="<?php the_permalink();?>">
										<?php echo ot_image_html($the_query->post->ID,120,90); ?>
									</a>
								</div>
							<?php } ?>
							<div class="item-content">
								<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
	                            <?php if($rating) { ?>
	                                <?php
	                                    $ratings = ot_avarage_rating($the_query->post->ID);
	                                ?>
	                                    <div class="ot-rating-wrapper">
	                                        <div class="ot-star-rating">
	                                            <span style="width:<?php echo $ratings[0];?>%"><strong class="rating"><?php echo $ratings[1];?></strong> <?php _e("out of 5",'quadrum-theme');
;?></span>
	                                        </div>
	                                    </div>
	                            <?php } ?> 
								<?php 
									add_filter('excerpt_length', 'new_excerpt_length_7');
									the_excerpt();
								?>
								<div class="item-foot">
									<a href="<?php the_permalink();?>"><i class="fa fa-reply"></i><b><?php _e("read more",'quadrum-theme');
;?></b></a>
									<?php if($postDate=="on") { ?>
										<a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>"><i class="fa fa-clock-o"></i><?php the_time("F j");?></a>
									<?php } ?>
								</div>
							</div>
						<!-- END .item -->
						</div>
					<?php endwhile; else: ?>
						<p><?php  _e('No posts where found','quadrum-theme');
;?></p>
				<?php endif; ?>
			</div>
	<?php echo $after_widget; ?>

      <?php
	}
}
?>