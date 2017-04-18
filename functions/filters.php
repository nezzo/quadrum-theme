<?php
function add_p_tags($text) {
  return "<p>" . str_replace("\n", "</p><p>", $text) . "</p>";
}

function remove_html_slashes($content) {
	return filter_var(stripslashes($content), FILTER_SANITIZE_SPECIAL_CHARS);
}

function new_excerpt_length($length) {
	return 30;
}

function new_excerpt_length_7($length) {
	return 7;
}

function new_excerpt_length_10($length) {
	return 10;
}

function new_excerpt_length_16($length) {
	return 16;
}

function new_excerpt_length_20($length) {
	return 20;
}

function new_excerpt_length_30($length) {
	return 30;
}

function new_excerpt_length_40($length) {
	return 40;
}

function new_excerpt_length_50($length) {
	return 50;
}

function new_excerpt_length_70($length) {
	return 70;
}

function new_excerpt_length_5($length) {
	return 5;
}

function new_excerpt_more($more) {
	return '';
}

function remove_objects($content) {
	$content = preg_replace('/\<div(.*?)\>(.*?)\<\/div\>/s', '', $content);
	$content = preg_replace('/\<object(.*?)\>(.*?)\<\/object\>/s', '', $content);
	$content = preg_replace('/\<iframe(.*?)\>(.*?)\<\/iframe\>/s', '', $content);
	return $content;
}

function remove_images($content) {
	$content = preg_replace('#(<[/]?a.*><[/]?img.*></a>)#U', '', $content);
	$content = preg_replace('#(<[/]?img.*>)#U', '', $content);
	$content = preg_replace("/\[caption(.*)\](.*)\[\/caption\]/Usi", "", $content);
    return $content;
}

/* -------------------------------------------------------------------------*
 * 						REMOVE HTML TAGS FROM BLOG PAGE						*
 * -------------------------------------------------------------------------*/
 
function remove_html($content) {
	$content = strip_tags($content);
    return $content;
}

function filter_where( $where = '' ) {
	// posts in the last 30 days
	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
	return $where;
}

function page_read_more($content) {
	$result = preg_split('/<span id="more-\d+"><\/span>/', $content);
	return $result[0];
}


function quadrum_wp_title(  ) {

	if ( is_single() ) { 
		$title = single_post_title('',false).' | '.get_bloginfo('name');
	} elseif ( is_home() || is_front_page() ) { 
		$title = get_bloginfo('name'); 
		if(get_bloginfo('description')) { 
			$title.= ' | '.get_bloginfo('description'); 
		} 
	} elseif ( is_page() ) { 
		$title = single_post_title('',false); 
		if(get_bloginfo('description')) { 
			$title.=  ' | '.get_bloginfo('description'); 
		} 
	} elseif ( is_search() ) { 
		$title = get_bloginfo('name'); 
		$title.= ' | Search results '; 
		if(isset($s))
			$title.=  esc_html($s)
		; 
	} elseif ( is_404() ) { 
		$title = get_bloginfo('name').' | Page not found'; 
	} else { 
		$title = get_bloginfo('name').' | '.get_the_title(); 
	}
	
	
	return $title;


}	


/* -------------------------------------------------------------------------*
 * 						CUSTOM BLOG READ MORE BUTTON						*
 * -------------------------------------------------------------------------*/
function OT_read_more($matches) {
	return '<p>'.$matches[1].'</p> <a '.$matches[3].' class="small-button"><span class="icon">&#59154;</span>'.$matches[4].'</a>';
}
				
	
function blog_read_more($content) {
	return preg_replace_callback('#(.*)(<a(.*) class="more-link">(.*)</a>(.*))#', "OT_read_more", $content);
}

/* -------------------------------------------------------------------------*
 * 						CUSTOM HOME READ MORE BUTTON						*
 * -------------------------------------------------------------------------*/
 
function home_read_more($content) {
    $content = preg_replace('#(<a(.*) class="more-link">(.*)</a>)#U', '</p><a $2 class="more-link"><span>$3</span></a>', $content);
    return $content;
}

function BigFirstChar ($content = '') {
     return '<p class="caps">' . $content;
}


function remove_shortcode_from_index($content) {
  if ( is_home() ) {
    $content = strip_shortcodes( $content );
  }
  return $content;
}

/* -------------------------------------------------------------------------*
 * 							WORD LIMITER									*
 * -------------------------------------------------------------------------*/

function WordLimiter($string, $count){

	$string = remove_html(preg_replace('/\[\/.*?\]/', '', preg_replace('/\[.*?\]/', '', $string)));

	$words = explode(' ', $string);
	if (count($words) > $count){
		array_splice($words, $count);
		$string = implode(' ', $words);
	}
	return $string." ...";
}


function convert_to_class($name){
	return strtolower( str_replace( array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name ) );
}

/* -------------------------------------------------------------------------*
 * 							AVATAR URL									*
 * -------------------------------------------------------------------------*/
 
function ot_get_avatar_url($get_avatar){
    if(preg_match("/src='(.*?)'/i", $get_avatar, $matches)) {
    	preg_match("/src='(.*?)'/i", $get_avatar, $matches);
   		return $matches[1];
    } else {
    	preg_match("/src=\"(.*?)\"/i", $get_avatar, $matches);
   		return $matches[1];
    }
}

/* -------------------------------------------------------------------------*
 * 							CUSTOM USER PROFILE								*
 * -------------------------------------------------------------------------*/
 
function OT_extra_contact_info($contactmethods) {
    unset($contactmethods['aim']);
    unset($contactmethods['yim']);
    unset($contactmethods['jabber']);
    $contactmethods['flickr'] = 'Flickr Account Url';
    $contactmethods['youtube'] = 'Youtube Account Url';
    $contactmethods['twitter'] = 'Twitter Account Url';
    $contactmethods['facebook'] = 'Facebook Account Url';
    $contactmethods['googlepluss'] = 'Google+ Account Url';
    $contactmethods['dribbble'] = 'Dribbble Account Url';
    $contactmethods['linkedin'] = 'LinkedIn Account Url';


    return $contactmethods;
}



/* -------------------------------------------------------------------------*
 * 							CUSTOM COMMENT FIELDS							*
 * -------------------------------------------------------------------------*/
 
function OT_fields($fields) {
	$fields['author'] = '<p class="contact-form-user"><label for="c_name">'.__("Nickname",'quadrum-theme')
.'<span class="required">*</span></label><input type="text" placeholder="'.__("Nickname..",'quadrum-theme')
.'" name="author" id="author"></p>';
	$fields['email'] = '<p class="contact-form-email"><label for="c_email">'.__("E-mail",'quadrum-theme')
.'<span class="required">*</span></label><input type="text" placeholder="'.__("E-mail..",'quadrum-theme')
.'" name="email" id="email"></p>';
	$fields['url'] = '<p class="contact-form-webside"><label for="c_webside">'.__("Website",'quadrum-theme')
.'</label><input type="text" placeholder="'.__("Website..",'quadrum-theme')
.'" name="url" id="url"></p>';

	return $fields;
}

/* -------------------------------------------------------------------------*
 * 							CUSTOM COMMENT FIELDS							*
 * -------------------------------------------------------------------------*/
 
function OT_fields_rules($fields) {
	$fields['rules'] = '<p class="contact-info"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-info fa-stack-1x fa-inverse"></i></span>'.__("Your e-mail address will not be published.",'quadrum-theme')
.'<br/>'.__("Required fields are marked",'quadrum-theme')
.'<span class="required">*</span></p>';
	print $fields['rules'];
}

/* -------------------------------------------------------------------------*
 * 									YOUTUBE									*
 * -------------------------------------------------------------------------*/
 
function OT_youtube_image( $link ) {
	
	$ytarray=explode("/", $link);
	$ytendstring=end($ytarray);
	$ytendarray=explode("?v=", $ytendstring);
	$ytendstring=end($ytendarray);
	$ytendarray=explode("&", $ytendstring);
	$ytcode=$ytendarray[0];
	
	
	return $ytcode;

}	

/* -------------------------------------------------------------------------*
 * 		ADDING A CSS CLASS TO EACH LINK OF the_author_posts_link()			*
 * -------------------------------------------------------------------------*/

function the_author_posts_link_css_class($output) {
	$output= preg_replace('#(<a(.*)>(.*)</a>)#U', '<a $2><i class="fa fa-user"></i>$3</a>', $output);
    return $output;
}

function the_author_posts_link_css_class_single($output) {
	$output= preg_replace('#(<a(.*)>(.*)</a>)#U', '<a $2>$3</a>', $output);
    return $output;
}


load_theme_textdomain('quadrum-theme', get_template_directory() . '/languages');
	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );



/* -------------------------------------------------------------------------*
 * 								ATTACHMENT SIZE			 					*
 * -------------------------------------------------------------------------*/

function ot_attachment($p) {
   $p = '<p class="attachment">';
 	 // show the medium sized image representation of the attachment if available, and link to the raw file
	$p .= wp_get_attachment_link(0, 'full', false);
	$p .= '</p>';

	return $p;
}
add_filter('prepend_attachment', 'ot_attachment');	
add_filter('excerpt_length', 'new_excerpt_length');
add_filter('excerpt_more', 'new_excerpt_more');
add_filter('the_content', 'remove_shortcode_from_index');
add_filter('the_author_posts_link','the_author_posts_link_css_class');

add_filter('user_contactmethods', 'OT_extra_contact_info');
add_filter('comment_form_default_fields','OT_fields');
add_filter('wp_title', 'quadrum_wp_title', 10, 2);

?>