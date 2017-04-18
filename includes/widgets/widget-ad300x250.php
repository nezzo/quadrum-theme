<?php
/*
 * Plugin Name: Custom 250x250 Ad Unit
 * Plugin URI: http://www.ormanclark.com
 * Description: A widget that allows the selection and configuration of a single 250x250 Banner
 * Version: 1.0
 * Author: Orman Clark; edited by orange-themes.com
 * Author URI: http://www.ormanclark.com & http://www.orange-themes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'tz_ad300_widgets' );

/*
 * Register widget.
 */
function tz_ad300_widgets() {
	register_widget( 'tz_ad300_widget' );
}

/*
 * Widget class.
 */
class tz_ad300_widget extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function __construct() {
	
		/* Widget settings */
		$widget_ops = array( 'classname' => 'tz_ad300_widget', 'description' => __('A widget that allows the display and configuration of of a single 300x250 Banner.', 'quadrum-theme') );

		/* Widget control settings */
		$control_ops = array( 'width' => 300, 'height' => 250, 'id_base' => 'tz_ad300_widget' );

		/* Create the widget */
		parent::__construct( 'tz_ad300_widget', __(THEME_FULL_NAME.' Custom 300x250 Ad', 'quadrum-theme'), $widget_ops, $control_ops );
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		//$title = apply_filters('widget_title', $instance['title'] );
		$ad = $instance['ad'];
		$link = $instance['link'];

		/* Before widget (defined by themes). */
		echo $before_widget;
		$contactID = ot_get_page("contact");

		/* Display the widget title if one was input (before and after defined by themes). */
		//echo $before_title.$title.$after_title;
		echo '<div class="sidebar-banner">';
			/* Display Ad */
			if ( $link ) {
				echo '<a href="'.$link.'" target="_blank"><img src="'.$ad.'" alt="Banner"/></a>';
			} elseif ( $ad ) {
				echo '<img src="'.$ad.'" alt="Banner"/>';
			}
			if($contactID) {
				//echo '<a href="'.get_page_link($contactID[0]).'" class="ad-link"><span class="icon-text">&#9652;</span>'.__("Advertisement",'quadrum-theme').'<span class="icon-text">&#9652;</span></a>';
			}
		echo '</div>';
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/* ---------------------------- */
	/* ------- Update Widget -------- */
	/* ---------------------------- */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );

		/* No need to strip tags */
		$instance['ad'] = $new_instance['ad'];
		$instance['link'] = $new_instance['link'];

		return $instance;
	}
	
	/* ---------------------------- */
	/* ------- Widget Settings ------- */
	/* ---------------------------- */
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	
	function form( $instance ) {
	
		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'ad' => get_template_directory_uri()."/images/banner-300x250.jpg",
		'link' => 'http://www.orange-themes.com',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:','quadrum-theme');
 ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
 -->
		<!-- Ad image url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'ad' ); ?>"><?php _e('Ad image url:','quadrum-theme');
 ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'ad' ); ?>" name="<?php echo $this->get_field_name( 'ad' ); ?>" value="<?php echo $instance['ad']; ?>" />
		</p>
		
		<!-- Ad link url: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'link' ); ?>"><?php _e('Ad link url:','quadrum-theme');
 ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'link' ); ?>" name="<?php echo $this->get_field_name( 'link' ); ?>" value="<?php echo $instance['link']; ?>" />
		</p>
		
	<?php
	}
}
?>