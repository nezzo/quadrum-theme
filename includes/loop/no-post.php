<?php 

		if (is_pagetemplate_active("template-contact.php") || is_pagetemplate_active("template-contact-2.php")) {
			$contactPages = ot_get_page("contact");
			$contactUrl = get_page_link($contactPages[0]);
		} else {
			$contactUrl = "#";
		}
 ?>
<div class="the-error-msg">
	<strong class="font-replace"><?php _e("No Articles Found",'quadrum-theme')
;?></strong>
	<p><?php printf(__('Sorry, there are no articles here ! <br/>You can <a href="%1$s">contact us</a> to resolve this problem !','quadrum-theme')
, $contactUrl);?></p>
	<p><?php printf(__('Or You can still <a href="%1$s">go back to Homepage</a> !','quadrum-theme')
, home_url());?></p>
</div>