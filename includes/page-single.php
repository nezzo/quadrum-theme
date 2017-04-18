<?php
	wp_reset_query();

?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if (have_posts()) :  ?>
		<?php get_template_part(THEME_SINGLE."page","title"); ?>
		<?php get_template_part(THEME_SINGLE."post","header"); ?>
			<?php get_template_part(THEME_SINGLE."image"); ?>
			<?php the_content();?>
			<?php get_template_part(THEME_SINGLE."share"); ?>
			<?php wp_reset_query(); ?>
		<?php get_template_part(THEME_SINGLE."post","footer"); ?>
		<?php get_template_part(THEME_SINGLE."post-banner"); ?>
		<?php if ( comments_open() ) : ?>
			<?php comments_template(); // Get comments.php template ?>
		<?php endif; ?>
	<?php else: ?>
		<p><?php  _e('Sorry, no posts matched your criteria.','quadrum-theme')
; ?></p>
	<?php endif; ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
				