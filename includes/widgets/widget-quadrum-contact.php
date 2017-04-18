<?php
add_action('widgets_init', create_function('', 'return register_widget("OT_contact");'));

class OT_contact extends WP_Widget {
	function __construct() {
		 parent::__construct(false, $name = THEME_FULL_NAME.' '.__("Contact",'quadrum-theme')
);	
	}

	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
			'title' => __("Contact",'quadrum-theme')
,
			'email' => '',
			'email_sub' => '',
			'phone' => '',
			'phone_sub' => '',
			'address' => '',
			'address_sub' => '',
			'text' => '',
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		$title = esc_attr($instance['title']);
		$email = esc_attr($instance['email']);
		$email_sub = esc_attr($instance['email_sub']);
		$phone = esc_attr($instance['phone']);
		$phone_sub = esc_attr($instance['phone_sub']);
		$address = esc_attr($instance['address']);
		$address_sub = esc_attr($instance['address_sub']);
		$text = esc_attr($instance['text']);
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php printf ( __('Title:','quadrum-theme')
); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('email'); ?>"><?php printf ( __('Email:','quadrum-theme')
); ?> <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('email_sub'); ?>"><?php printf ( __('Email Subtitle:','quadrum-theme')
); ?> <input class="widefat" id="<?php echo $this->get_field_id('email_sub'); ?>" name="<?php echo $this->get_field_name('email_sub'); ?>" type="text" value="<?php echo $email_sub; ?>" /></label></p>
          	<p><label for="<?php echo $this->get_field_id('phone'); ?>"><?php printf ( __('Phone:','quadrum-theme')
); ?> <input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('phone_sub'); ?>"><?php printf ( __('Phone Subtitle:','quadrum-theme')
); ?> <input class="widefat" id="<?php echo $this->get_field_id('phone_sub'); ?>" name="<?php echo $this->get_field_name('phone_sub'); ?>" type="text" value="<?php echo $phone_sub; ?>" /></label></p>
          	<p><label for="<?php echo $this->get_field_id('address'); ?>"><?php printf ( __('Address:','quadrum-theme')
); ?> <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" /></label></p>
            <p><label for="<?php echo $this->get_field_id('Address_sub'); ?>"><?php printf ( __('Address Subtitle:','quadrum-theme')
); ?> <input class="widefat" id="<?php echo $this->get_field_id('address_sub'); ?>" name="<?php echo $this->get_field_name('address_sub'); ?>" type="text" value="<?php echo $address_sub; ?>" /></label></p>
			<p><label for="<?php echo $this->get_field_id('text'); ?>"><?php  printf ( __('Text:','quadrum-theme')
); ?> <textarea style="height:200px;" class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea></label></p>


        <?php 
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['email'] = strip_tags($new_instance['email']);
		$instance['email_sub'] = strip_tags($new_instance['email_sub']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['phone_sub'] = strip_tags($new_instance['phone_sub']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['address_sub'] = strip_tags($new_instance['address_sub']);
		$instance['text'] = strip_tags($new_instance['text']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        $email = $instance['email'];
        $email_sub = stripslashes($instance['email_sub']);
        $phone = $instance['phone'];
        $phone_sub = stripslashes($instance['phone_sub']);
        $address = stripslashes($instance['address']);
        $address_sub = stripslashes($instance['address_sub']);
        $text = wpautop($instance['text']);

		wp_reset_query();


		

?>		
	<?php echo $before_widget; ?>
		<?php if($title) echo $before_title.$title.$after_title; ?>
			<div>
				<ul class="widget-contact">
					<?php if($email) { ?><li><i class="fa fa-envelope-o"></i><strong><a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></strong><?php if($email_sub) { ?><span><?php echo $email_sub;?></span><?php } ?></li><?php } ?>
					<?php if($phone) { ?><li><i class="fa fa-phone"></i><strong><?php echo $phone;?></strong><?php if($phone_sub) { ?><span><?php echo $phone_sub;?></span><?php } ?></li><?php } ?>
					<?php if($address) { ?><li><i class="fa fa-map-marker"></i><strong><?php echo $address;?></strong><?php if($address_sub) { ?><span><?php echo $address_sub;?></span><?php } ?></li><?php } ?>
				</ul>
				<hr />
				<p><?php echo $text;?></p>
			</div>


	<?php echo $after_widget; ?>
		
	
      <?php
	}
}

?>
