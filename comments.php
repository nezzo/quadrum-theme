<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php printf ( __('This post is password protected. Enter the password to view comments.','quadrum-theme')
);?></p>
	<?php
		return;
	}
	$post_type = get_post_type();
	
	add_action('comment_form_top', 'OT_fields_rules' );
?>
<?php //You can start editing here. ?>
		<?php if (comments_open()) : ?>
			<!-- BEGIN .strict-block -->
			<div class="strict-block">
		<?php endif; ?>
			<?php if ( have_comments() || comments_open()) : ?>
				<div class="block-title">
					<h2><?php comments_number(__("No comments",'quadrum-theme')
,__("1 comment",'quadrum-theme')
,__("% comments",'quadrum-theme')
); ?></h2>
					<a href="#respond" class="panel-title-right"><?php _e("Write a comment",'quadrum-theme')
;?></a>
				</div>
			<?php endif; ?>

			<?php if ( have_comments()) : ?>
				<!-- BEGIN .block-content -->
				<div class="block-content">
					<ol id="comments">
						<?php wp_list_comments('type=comment&callback=orangethemes_comment'); ?>
					</ol>
					
					<div class="pagination"><?php paginate_comments_links(array('prev_text' => '<i class="fa fa-caret-left"></i>','next_text' => '<i class="fa fa-caret-right"></i>')); ?></div>
				<!-- END .block-content -->
				</div>
			<?php endif; ?>
			<?php if (!have_comments() && comments_open()) : ?>
				<!-- BEGIN .block-content -->
				<div class="block-content">
					
					<div class="big-message">
						<div>
							<i class="fa fa-comments"></i>
							<strong><?php _e("No Comments Yet!",'quadrum-theme')
;?></strong>
							<span><?php _e("You can be first to <a href=\"#respond\">comment this post!</a>",'quadrum-theme')
;?></span>
							<div class="clear-float"></div>
						</div>
					</div>

				<!-- END .block-content -->
				</div>
			<?php endif; ?>
		<?php if (comments_open()) : ?>
			<!-- END .strict-block -->
			</div>
		<?php endif; ?>




		<?php if ( comments_open() ) : ?>
			<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
				<p class="registered-user-restriction"><?php printf ( __('Only <a href="%1$s"> registered </a> users can comment.','quadrum-theme')
, wp_login_url( get_permalink() ));?> </p>
			<?php else : ?>
				<!-- BEGIN .strict-block -->
				<div class="strict-block">
					<div class="block-title">
						<h2><?php _e("Write a Comment",'quadrum-theme')
;?></h2>
					</div>
					<!-- BEGIN .block-content -->
					<div class="block-content">
						<!-- BEGIN .writecomment -->
						<div id="writecomment">
							<a href="#" name="respond"></a>
							<?php 
								$defaults = array(
									'comment_field'       	=> '<p class="contact-form-message"><label for="c_message">'.__("Comment",'quadrum-theme')
.'<span class="required">*</span></label><textarea name="comment" id="comment" placeholder="'.__("Your message..",'quadrum-theme')
.'"></textarea></p>',
									'comment_notes_before' 	=> '',
									'comment_notes_after'  	=> '',
									'id_form'              	=> '',
									'id_submit'            	=> 'submit',
									'title_reply'          => '',
									'title_reply_to'       => '',
									'cancel_reply_link'    	=> '',
									'label_submit'         	=> ''.__('Post a Comment','quadrum-theme')
.'',
								);
								comment_form($defaults);			
							?>


						<!-- END #writecomment -->
						</div>

					<!-- END .block-content -->
					</div>
				<!-- END .strict-block -->
				</div>

			<?php endif; // if you delete this the sky will fall on your head ?>

		<?php endif; ?>
						
