<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	// about authors
	$aboutAuthor = get_option(THEME_NAME."_about_author");
	$aboutAuthorSingle = get_post_meta( $post->ID, THEME_NAME."_about_author", true ); 
	
	// author id
	$user_ID = get_the_author_meta('ID');

	//social
	$flickr = get_user_meta($user_ID, 'flickr', true);
	$youtube = get_user_meta($user_ID, 'youtube', true);
	$twitter = get_user_meta($user_ID, 'twitter', true);
	$facebook = get_user_meta($user_ID, 'facebook', true);
	$google = get_user_meta($user_ID, 'googlepluss', true);
	$dribbble = get_user_meta($user_ID, 'dribbble', true);
	$linkedin = get_user_meta($user_ID, 'linkedin', true);
?>

<?php if($aboutAuthor == "show" || ($aboutAuthor=="custom" && $aboutAuthorSingle=="show") || is_author()) {  ?>

	<div class="about-author">
		<a href="<?php $user_info = get_userdata($user_ID); echo get_author_posts_url($user_ID, $user_info->user_nicename ); ?>">
			<img src="<?php echo ot_get_avatar_url(get_avatar( get_the_author_meta('user_email',$user_ID), 100));?>" class="about-avatar" alt="<?php echo get_the_author_meta('display_name',$user_ID); ?>" />
		</a>
		<div class="about-content">
			<div class="soc-pages right">
				<?php if($facebook) { ?><a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>
				<?php if($twitter) { ?><a href="<?php echo $twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>
				<?php if($google) { ?><a href="<?php echo $google;?>" target="_blank" rel="author"><i class="fa fa-google-plus"></i></a><?php } ?>
				<?php if($linkedin) { ?><a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php } ?>
				<?php if($youtube) { ?><a href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube"></i></a><?php } ?>
				<?php if($dribbble) { ?><a href="<?php echo $dribbble;?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php } ?>
				<?php if($flickr) { ?><a href="<?php echo $flickr;?>" target="_blank"><i class="fa fa-flickr"></i></a><?php } ?>
			</div>
			<h3><?php echo get_the_author_meta('display_name',$user_ID); ?></h3>
			<p>
				<span class="vcard author">
					<span class="fn">
						<?php echo get_the_author_meta('description'); ?>
					</span>
				</span>
			</p>
			<?php if(!is_author()) { ?>
				<div class="item-foot">
					<a href="<?php echo get_author_posts_url($user_ID, $user_info->user_nicename );?>" class="read-more"><i class="fa fa-folder-o"></i><?php _e("More articles by",'quadrum-theme')
;?> <?php echo get_the_author_meta('display_name',$user_ID); ?></a>
				</div>
			<?php } ?>

		</div>
	</div>
<?php } ?>