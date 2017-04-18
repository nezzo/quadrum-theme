<?php 
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	get_header();
	wp_reset_query();

	global $query_string;
	$query_vars = explode('&',$query_string);
									
	foreach($query_vars as $key) {
		if(strpos($key,'page=') !== false) {
			$i = substr($key,8,12);
			break;
		}
	}
	
	if(!isset($i)) {
		$i = 1;
	}

	$galleryImages = get_post_meta ( $post->ID, THEME_NAME."_gallery_images", true ); 
	$imageIDs = explode(",",$galleryImages);
	$count = count($imageIDs);

	//main image
	$file = wp_get_attachment_url($imageIDs[$i-1]);
	$image = get_post_thumb(false, 1200, 0, false, $file);	

	// similar posts
	$similarPosts = get_option(THEME_NAME."_similar_posts");
	$similarPostsSingle = get_post_meta( $post->ID, THEME_NAME."_similar_posts", true ); 		
?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php get_template_part(THEME_SINGLE."page","title"); ?>
		<?php if (have_posts()): ?>
			<div class="photo-gallery-full ot-slide-item" id="<?php echo $post->ID;?>">
				<span class="next-image" data-next="<?php echo $i+1;?>"></span>
				<div class="full-photo">
					<span class="inner-photo gal-current-image">
						<div class="the-image loading waiter">
							<a href="javascript:void(0);" class="photo-arrow left prev" rel="<?php if($i>1) { echo $i-1; } else { echo $i-1; } ?>">
								<img src="<?php echo THEME_IMAGE_URL;?>photo-arrow-left.png" alt="<?php _e("Left",'quadrum-theme')
;?>" />
							</a>
							<a href="javascript:void(0);" class="photo-arrow right next" rel="<?php if($i<$count) { echo $i+1; } else { echo $i; } ?>">
								<img src="<?php echo THEME_IMAGE_URL;?>photo-arrow-right.png" alt="<?php _e("Right",'quadrum-theme')
;?>" />
							</a>
							<img class="image-big-gallery ot-gallery-image" data-id="<?php echo $i;?>" style="display:none;" src="<?php echo $image['src'];?>" alt="<?php the_title();?>" />
							<span class="photo-num-count the-thumbs" data-total="<?php echo $count;?>"></span>
						</div>
					</span>
				</div>
				<div class="photo-gallery-desc">
					<h2><?php the_title();?></h2>

					<?php 
						if (get_the_content() != "") { 				
							add_filter('the_content','remove_images');
							add_filter('the_content','remove_objects');
							the_content();
						} 
					?>				
				</div>


			</div>

			<?php if($similarPosts == "show" || ($similarPosts=="custom" && $similarPostsSingle=="show")) { ?>
				<!-- BEGIN .strict-block -->
				<div class="strict-block">
					<div class="block-title">
						<h2><?php _e("Similar Photo Galleries",'quadrum-theme')
;?></h2>
						<a href="<?php echo home_url();?>" class="panel-title-right"><?php _e("Back to homepage",'quadrum-theme')
;?></a>
					</div>
					<!-- BEGIN .block-content -->
					<div class="photo-gallery-grid">
						<?php
							$categories = get_terms( 'gallery-cat', 'orderby=count&hide_empty=0' );
							$count = count($categories)-1;
							$randID = rand(1,$count);
							$counter=1;
							$my_query = new WP_Query( 
								array( 
									'post_type' => 'gallery', 
									'showposts' => 3, 
									'tax_query' => array(
										array(
											'taxonomy' => 'gallery-cat',
											'field' => 'id',
											'terms' => $categories[$randID]->term_id,
										)
									),
									'orderby' => 'rand'
								)
							);
							
							if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post(); 
								$src = get_post_thumb($post->ID,221,150);
								$gallery_style = get_post_meta ( $post->ID, THEME_NAME."_gallery_style", true );
						?>
							<div class="item" data-id="gallery-<?php the_ID(); ?>">
								<div class="item-header" style="box-shadow: inset 0 0 0 7px <?php ot_title_color($categories[$randID]->term_id);?>;">
									<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>" data-id="gallery-<?php the_ID(); ?>">
										<img src="<?php echo $src["src"]; ?>" alt="<?php the_title();?>" />
									</a>
								</div>
								<?php if(isset($categories[$randID]->term_id)) { ?>
									<a href="<?php echo get_term_link((int)$categories[$randID]->term_id, OT_POST_GALLERY.'-cat');?>" class="category-photo" style="color: <?php ot_title_color($categories[$randID]->term_id);?>;"><?php echo $categories[$randID]->name;?></a>
								<?php } ?>
								<h3>
									<a href="<?php the_permalink();?>" class="<?php if($gallery_style=="lightbox") { echo 'light-show '; } ?>" data-id="gallery-<?php the_ID(); ?>">
										<?php the_title();?>
										<span><i class="fa fa-camera"></i><?php echo OT_image_count($post->ID);?></span>
									</a>
								</h3>
							</div>
							<?php $counter++; ?>
						<?php endwhile;?>
						<?php else: ?>
							<p><?php  _e('Sorry, no posts matched your criteria.','quadrum-theme')
; ?></p>
						<?php endif; ?>

					<!-- END .block-content -->
					</div>

				<!-- END .strict-block -->
				</div>
			<?php } ?>

		<?php else: ?>
			<p><?php  _e('Sorry, no posts matched your criteria.','quadrum-theme')
; ?></p>
		<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>