<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	wp_reset_query();


	//single page titile
	$titleShow = get_post_meta ( OT_page_id(), THEME_NAME."_title_show", true ); 

	$pagePrint = get_post_meta ( OT_page_id(), THEME_NAME."_page_print", true ); 

	//meta settings
	$postDateSingle = get_option(THEME_NAME."_post_date_single");
	$postAuthorSingle = get_option(THEME_NAME."_post_author_single");
?>

	<?php get_template_part(THEME_LOOP."loop-start"); ?>
		<?php get_template_part(THEME_SINGLE."post-header"); ?>
			<?php if (have_posts()) : ?>
				<?php if($titleShow!="no") { ?> 
					<h1 class="entry-title"><?php echo ot_page_title(); ?></h1>
				<?php } ?>

				<div class="article-header">
					<?php get_template_part(THEME_SINGLE."image"); ?>
					<div class="article-meta<?php if($postDateSingle!="on") { ?> no-date<?php } ?><?php if($postAuthorSingle!="on") { ?> no-author<?php } ?>">
						<div class="meta-date updated">
							<?php if($postDateSingle=="on") { ?>
								<span class="date"><?php echo get_the_time('d');?></span>
								<span class="month"><?php echo get_the_time('M, Y');?></span>
							<?php } ?> 
							<?php if($postAuthorSingle=="on") { ?>
							<span class="author"><?php _e("by",'quadrum-theme')
;?> 
								<?php 
									remove_filter('the_author_posts_link','the_author_posts_link_css_class');
									add_filter('the_author_posts_link','the_author_posts_link_css_class_single');
									echo the_author_posts_link();
								?>
							</span>
							<?php } ?>
						</div>
						<div class="meta-tools<?php if($pagePrint=="hide") { ?> no-print<?php } ?>">
							<?php if($pagePrint!="hide") { ?>
								<a href="<?php the_permalink();?>print" target="_blank"><i class="fa fa-print"></i><?php _e("Print this article",'quadrum-theme')
;?></a>
							<?php } ?>
							<span><i class="fa fa-text-height"></i><?php _e("Font size",'quadrum-theme')
;?> <span class="f-size"><a href="#font-size-down">-</a><span class="f-size-number">16</span><a href="#font-size-up">+</a></span></span>
						</div>
					</div>
				</div>

				<?php the_content();?>		
				<?php 
					$args = array(
						'before'           => '<div class="post-pages"><p>' . __('Pages:','quadrum-theme')
,
						'after'            => '</p></div>',
						'link_before'      => '',
						'link_after'       => '',
						'next_or_number'   => 'number',
						'nextpagelink'     => __('Next page','quadrum-theme')
,
						'previouspagelink' => __('Previous page','quadrum-theme')
,
						'pagelink'         => '%',
						'echo'             => 1
					);

					wp_link_pages($args); 
				?>	

				<?php get_template_part(THEME_SINGLE."about-author"); ?>
				<?php get_template_part(THEME_SINGLE."post-ratings"); ?>
				<?php get_template_part(THEME_SINGLE."share"); ?>
				<?php get_template_part(THEME_SINGLE."post-tags"); ?>
				<hr />
		<?php get_template_part(THEME_SINGLE."post-footer"); ?>

		<?php get_template_part(THEME_SINGLE."post-banner"); ?>
		<?php get_template_part(THEME_SINGLE."post-related"); ?>

		<?php wp_reset_query(); ?>
		<?php if ( comments_open() ) : ?>
			<?php comments_template(); // Get comments.php template ?>
		<?php endif; ?>

		<?php else: ?>
			<p><?php  _e('Sorry, no posts matched your criteria.','quadrum-theme')
; ?></p>
		<?php endif; ?>
	<?php get_template_part(THEME_LOOP."loop-end"); ?>