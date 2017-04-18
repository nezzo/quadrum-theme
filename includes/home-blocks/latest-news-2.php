<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //set query
    $my_query = $data[0]; 
    //extract array data
    extract($data[1]); 

    $postDate = get_option(THEME_NAME."_post_date");
    $postComments = get_option(THEME_NAME."_post_comment");
    $postAuthor = get_option(THEME_NAME."_post_author");


?>
<!-- BEGIN .strict-block -->
<div class="strict-block">
    <?php if($title) { ?>
        <div class="block-title" style="background: <?php echo $pageColor;?>;">
            <h2><?php echo $title;?></h2>
            <?php if($link) { ?>
                <a href="<?php echo $link;?>" class="panel-title-right"><?php _e("View all posts",'quadrum-theme')
;?></a>
            <?php } ?>
        </div>
    <?php } ?>
    <!-- BEGIN .block-content -->
    <div class="block-content item-block-2 split-stuff blocks-<?php echo $columns;?>">
        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <?php  
                // author id
                $user_ID = get_the_author_meta('ID');
                $rating = get_post_meta($my_query->post->ID, THEME_NAME."_ratings", true );
                $categories = get_the_category($post->ID); 
                $count = count($categories);
                $randID = rand(0,$count-1);
                $image = get_post_thumb($my_query->post->ID,275,432,THEME_NAME.'_homepage_image');
            ?>
            <div class="item-block" style="background: url(<?php echo $image['src'];?>);">
                <div class="item-header">
                    <?php if ( comments_open() && $postComments=="on") { ?>
                        <a href="<?php the_permalink();?>#comments" class="item-comment" style="background: <?php echo $pageColor;?>;"><span><?php comments_number("0","1","%"); ?></span><i></i></a>
                    <?php } ?>
                    <?php if($categories[$randID]) { ?>
                        <a href="<?php echo get_category_link( $categories[$randID]->term_id );?>" class="item-category"><?php echo $categories[$randID]->name;?></a>
                    <?php } ?>
                    <?php if($postDate=="on") { ?>
                        <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>" class="item-date">
                            <i class="fa fa-clock-o"></i>
                            <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ).__(" ago",'quadrum-theme')
; ?>
                        </a>
                    <?php } ?>
                </div>
                <div class="item-content">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                    <?php if($rating) { ?>
                        <?php
                            $ratings = ot_avarage_rating($my_query->post->ID);
                        ?>
                            <div class="ot-rating-wrapper">
                                <div class="ot-star-rating">
                                    <span style="width:<?php echo $ratings[0];?>%"><strong class="rating"><?php echo $ratings[1];?></strong> <?php _e("out of 5",'quadrum-theme')
;?></span>
                                </div>
                                <span class="ot-star-text"><?php _e("Rating:",'quadrum-theme')
;?> <strong><?php echo $ratings[1];?></strong></span>
                            </div>
                    <?php } ?> 
                    <?php 
                        if($excerpt!="off") {
                            add_filter('excerpt_length', 'new_excerpt_length_20');
                            the_excerpt();
                            remove_filter('excerpt_length', 'new_excerpt_length_20');
                        }
                    ?>
                    <?php if($postAuthor=="on") { ?>
                        <div class="item-author">
                            <a href="<?php $user_info = get_userdata($user_ID); echo get_author_posts_url($user_ID ); ?>" class="author-photo">
                                <img src="<?php echo get_gravatar(get_the_author_meta('user_email',$user_ID), '31', THEME_IMAGE_URL.'_avatar-31x31.jpg', 'G', false, $atts = array() );?>" alt="<?php echo get_the_author_meta('display_name',$user_ID); ?>" />
                            </a>
                            <a href="<?php $user_info = get_userdata($user_ID); echo get_author_posts_url($user_ID ); ?>" class="author-name"><?php echo get_the_author_meta('display_name',$user_ID); ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    <!-- END .block-content -->
    </div>
<!-- END .strict-block -->
</div>