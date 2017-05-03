<?php


	//social share icons
	$shareAll = get_option(THEME_NAME."_share_all");
	$shareSingle = get_post_meta( $post->ID, THEME_NAME."_share_single", true ); 
	$image = get_post_thumb($post->ID,0,0); 
?>

		<?php if(($shareAll == "show" || ($shareAll=="custom" && $shareSingle=="show") )) { ?>
			<div class="col-md-5">
			<p>Поддержите своим голосом рапорт</p>
			</div>
			<div class="col-md-5">
			<div class="social-article">
			       <a href="https://vk.com/share.php?url=<?php the_permalink();?>" class="socialize-icon facebook ot-share" data-url="<?php the_permalink();?>">
					<strong><i class="fa fa-vk"></i><?php _e("vk",'quadrum-theme')
;?></strong>
				</a>
				
				
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" class="socialize-icon facebook ot-share" data-url="<?php the_permalink();?>">
					<strong><i class="fa fa-facebook"></i><?php _e("Facebook",'quadrum-theme')
;?></strong>
				</a>
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="socialize-icon google ot-pluss">
					<strong><i class="fa fa-google-plus"></i><?php _e("Google+",'quadrum-theme')
;?></strong>
				</a>
				 
			</div>
		</div>
			
		<?php } ?>