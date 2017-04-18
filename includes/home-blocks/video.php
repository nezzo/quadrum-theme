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

    // author id
    $user_ID = get_the_author_meta('ID');

   
?>
<!-- BEGIN .strict-block -->
<div class="strict-block">
    <?php if($title) { ?>
        <div class="block-title" style="background: <?php echo $pageColor;?>;">
            <h2><?php echo $title;?></h2>
        </div>
    <?php } ?>
    <!-- BEGIN .block-content -->
    <div class="block-content item-block-1 split-stuff blocks-3">
        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <?php 

                $video = OT_youtube_image(get_post_meta( $post->ID, THEME_NAME."_video", true ));
                $image = "http://img.youtube.com/vi/".$video."/0.jpg";
         ?>
            <div class="item-block">
                <div class="item-header">
                    <?php if ( comments_open() && $postComments=="on") { ?>
                        <a href="<?php the_permalink();?>#comments" class="item-comment" style="background: <?php echo $pageColor;?>;"><span><?php comments_number("0","1","%"); ?></span><i></i></a>
                    <?php } ?> 
                    <a href="<?php the_permalink();?>" class="item-photo">
                        <img class="aspect-px" src="<?php echo THEME_IMAGE_URL;?>aspect-px.png" style="background-image: url('<?php echo $image;?>');" alt="<?php the_title();?>" />
                    </a>
                </div>
                <div class="item-content">
                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
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