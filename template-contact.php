<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/*
Template Name: Contact Page
*/	
?>
<?php get_header(); ?>
<?php 
	wp_reset_query();
	$mail_to = get_post_meta ( $post->ID, THEME_NAME."_contact_mail", true ); 
	$map = get_post_meta ( $post->ID, THEME_NAME."_map", true ); 

?>
<?php get_template_part(THEME_LOOP."loop","start"); ?>
	<?php if($mail_to) { ?>
		<?php if (have_posts()) :  ?>
			<!-- BEGIN .strict-block -->
			<div class="strict-block">
				<?php get_template_part(THEME_SINGLE."page-title"); ?>
				<!-- BEGIN .strict-block -->
				<div class="block-content">
					<div class="main-article">
						<div class="paragraph-row">
							<?php if($map) { ?>
								<div class="column6">
									<iframe src="<?php echo $map;?>&amp;iwloc=A&amp;output=embed" width="100%" height="400" frameborder="0" style="border:0"></iframe>
								</div>
							<?php } ?>
							<div class="<?php if($map) { ?>column6<?php } else { ?>column12<?php } ?>">
								<?php the_content();?>
								<div class="writecomment">

									<div class="coloralert contact-success-block" style="display:none; background: #68a117;">
										<p><?php _e("Success!",'quadrum-theme');?></p>
										<a href="#close-alert"><i class="fa fa-minus-circle"></i></a>
									</div>

									<form id="writecomment" name="writecomment" class="contact-form" action="">
										<input type="hidden"  name="form_type" value="contact" />
										<input type="hidden"  name="post_id" value="<?php echo $post->ID;?>" />

										<p class="contact-form-user">
											<label for="c_name"><?php _e("Nickname",'quadrum-theme');?><span class="required">*</span></label>
											<input type="text" name="u_name" id="contact-name-input" placeholder="<?php _e("Nickname",'quadrum-theme');?>" title="<?php _e("Nickname",'quadrum-theme');?>" />
											<span class="error-msg" id="contact-name-error" style="display:none;"><i class="fa fa-minus-circle"></i><font class="ot-error-text"></font></span>
										</p>
										<p class="contact-form-email">
											<label for="c_name"><?php _e("E-mail",'quadrum-theme');?><span class="required">*</span></label>
											<input type="text" name="email" id="contact-mail-input" placeholder="<?php _e("E-mail address",'quadrum-theme');?>" title="<?php _e("E-mail",'quadrum-theme');?>" />
											<span class="error-msg" id="contact-mail-error" style="display:none;"><i class="fa fa-minus-circle"></i><font class="ot-error-text"></font></span>
										</p>
										<p class="contact-form-message">
											<label for="c_name"><?php _e("Your message",'quadrum-theme');?><span class="required">*</span></label>
											<textarea name="message" placeholder="<?php _e("Your message",'quadrum-theme');?>" id="contact-message-input"></textarea>
											<span class="error-msg" id="contact-message-error" style="display:none;"><i class="fa fa-minus-circle"></i><font class="ot-error-text"></font></span>
										</p>
										<p class="form-submit">
											<input name="submit" type="submit" class="styled-button" id="contact-submit" value="<?php printf ( __('Send a Message','quadrum-theme'));?>" />
										</p>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		<?php else: ?>
			<p><?php printf ( __('Sorry, no posts matched your criteria.','quadrum-theme')); ?></p>
		<?php endif; ?>
	<?php } else { echo "<span style=\"color:#000; font-size:14pt;\">You need to set up Your contact mail!</span>"; } ?>
<?php get_template_part(THEME_LOOP."loop","end"); ?>
<?php get_footer(); ?>