<?php
	//post tags
	$posttags = get_the_tags();
?>
<?php if ($posttags) { ?>
	<hr />
	<div class="tag-cloud">
		<div class="custom-title"><strong><?php _e("Tags assigned to this article:",'quadrum-theme')
;?></strong></div>
		<?php	
			  foreach($posttags as $tag) {
				echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name . '</a>'; 
			  }
		?>
	</div>
<?php } ?>