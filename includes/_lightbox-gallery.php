<?php require_once( '../../../../wp-load.php' );?>

<a href="#" onclick="javascript:lightboxclose();" class="light-close"><i class="fa fa-times-circle-o"></i><?php _e("Close Window",'quadrum-theme')
;?></a>
<div class="main-block">
	
	<div class="single-content">
		
		<div class="photo-gallery-full ot-slide-item">
			<span class="next-image" data-next="0"></span>

				<div class="full-photo">
					<span class="inner-photo gal-current-image gallery-full-photo">
						<div class="the-image loading waiter">
							<a href="javascript:void(0);" class="photo-arrow left prev">
								<img src="<?php echo THEME_IMAGE_URL;?>photo-arrow-left.png" alt="<?php _e("Left",'quadrum-theme')
;?>" />
							</a>
							<a href="javascript:void(0);" class="photo-arrow right next">
								<img src="<?php echo THEME_IMAGE_URL;?>photo-arrow-right.png" alt="<?php _e("Right",'quadrum-theme')
;?>" />
							</a>
							<img class="image-big-gallery ot-gallery-image" data-id="0" style="display:none;" src="#" alt="" />
							<span class="photo-num-count the-thumbs" data-total="" id="ot-lightbox-thumbs"></span>
						</div>
					</span>
				</div>
				<div class="photo-gallery-desc">
					<h2 class="ot-light-title"></h2>
					<p id="ot-lightbox-content"></p>		
				</div>

		</div>
		<div class="clear-float"></div>
	</div>
	
</div>
<script>

//show the loading after click
jQuery('.ot-slide-item').on( "click", ".next, .prev, .gal-thumbs", function() {

	ot_page_num =  jQuery(this).attr("rel");
	ot_max_num_pages = jQuery('.photo-gallery-full .photo-num-count').data("total");

	gallery_pagination(ot_page_num,ot_max_num_pages);
	
});
</script>