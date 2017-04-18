<?php


	//social share icons
	$shareAll = get_option(THEME_NAME."_share_all");
	$shareSingle = get_post_meta( $post->ID, THEME_NAME."_share_single", true ); 
	$image = get_post_thumb($post->ID,0,0); 
?>

		<?php if(($shareAll == "show" || ($shareAll=="custom" && $shareSingle=="show") )) { ?>
			<div class="social-article">
				<div class="custom-title"><strong><?php _e("Share this article:",'quadrum-theme')
;?></strong></div>
				<a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="socialize-icon facebook ot-share" data-url="<?php the_permalink();?>">
					<strong><i class="fa fa-facebook"></i><?php _e("Facebook",'quadrum-theme')
;?></strong>
				</a>
				<a href="#" data-url="<?php the_permalink();?>" data-via="<?php echo get_option(THEME_NAME.'_twitter_name');?>" data-text="<?php the_title();?>" class="socialize-icon twitter ot-tweet">
					<strong><i class="fa fa-twitter"></i><?php _e("Twitter",'quadrum-theme')
;?></strong>
				</a>
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="socialize-icon google ot-pluss">
					<strong><i class="fa fa-google-plus"></i><?php _e("Google+",'quadrum-theme')
;?></strong>
				</a>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink();?>&title=<?php the_title();?>" data-url="<?php the_permalink();?>" class="socialize-icon linkedin ot-link">
					<strong><i class="fa fa-linkedin"></i><?php _e("LinkedIn",'quadrum-theme')
;?></strong>
				</a>
			</div>
		<?php } ?>