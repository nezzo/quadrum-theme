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
<!-- END .strict-block -->
</div>

<!-- BEGIN .strict-block -->
<div class="strict-block">
    <!-- BEGIN .block-content -->
    <div class="item-block-5">

        <div class="paragraph-row">
            <div class="column6">
                <?php if ($my_query->have_posts()) : $my_query->the_post(); ?>
                    <?php 
                        $rating = get_post_meta($my_query->post->ID, THEME_NAME."_ratings", true );
                        // author id
                        $user_ID = get_the_author_meta('ID');
                    ?>
                    <div class="article-split-block">
                        <?php if ( comments_open() && $postComments=="on") { ?>
                            <a href="<?php the_permalink();?>#comments" class="item-comment" style="background: <?php echo $pageColor;?>;"><span><?php comments_number("0","1","%"); ?></span><i></i></a>
                        <?php } ?> 
                        <div class="item-photo">
                            <a href="<?php the_permalink();?>">
                                <?php echo ot_image_html($my_query->post->ID,587,345); ?>
                            </a>
                        </div>
                        <div class="item-content">
                            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            <div class="item-icons">
                                <?php 
                                    if($postAuthor=="on") { 
                                        echo the_author_posts_link();
                                    } 
                                ?>
                                <?php if($postDate=="on") { ?>
                                    <a href="<?php echo get_month_link(get_the_time('Y'), get_the_time('m')); ?>">
                                        <i class="fa fa-calendar"></i><?php the_time(get_option('date_format'));?>
                                    </a>
                                <?php } ?>
                            </div>
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
                                add_filter('excerpt_length', 'new_excerpt_length_30');
                                the_excerpt();
                            ?>
                            <a href="<?php the_permalink();?>" class="trans-button"><i class="fa fa-align-right"></i><?php _e("Read More",'quadrum-theme')
;?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="column6">
                <div class="article-split-second">
                    <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <?php 
                            $rating = get_post_meta($my_query->post->ID, THEME_NAME."_ratings", true );
                            // author id
                            $user_ID = get_the_author_meta('ID');
                        ?>
                        <div class="item">
                            <?php if ( comments_open() && $postComments=="on") { ?>
                                <a href="<?php the_permalink();?>#comments" class="item-comment" style="background: <?php echo $pageColor;?>;"><span><?php comments_number("0","1","%"); ?></span><i></i></a>
                            <?php } ?> 
                            <div class="item-photo">
                                <a href="<?php the_permalink();?>">
                                    <?php echo ot_image_html($my_query->post->ID,184,138); ?>
                                </a>
                            </div>
                            <div class="item-content">
                                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <?php if($rating) { ?>
                                    <?php
                                        $ratings = ot_avarage_rating($my_query->post->ID);
                                    ?>
                                        <div>
                                            <div class="ot-star-rating">
                                                <span style="width:<?php echo $ratings[0];?>%"><strong class="rating"><?php echo $ratings[1];?></strong> <?php _e("out of 5",'quadrum-theme')
;?></span>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>

    <!-- END .block-content -->
    </div>
<!-- END .strict-block -->
</div>