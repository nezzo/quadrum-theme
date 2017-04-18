<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //extract array data
    extract($data[0]); 



   
?>


    <!-- BEGIN .strict-block -->
    <div class="strict-block">
        <?php if($title) { ?>
            <div class="block-title" style="background: #<?php echo $pageColor;?>;">
                <h2><?php echo $title;?></h2>
            </div>
        <?php } ?>
    <!-- END .strict-block -->
    </div>

    <!-- BEGIN .strict-block -->
    <div class="strict-block">
        <!-- BEGIN .block-content -->
        <div class="item-block-4 split-stuff blocks-<?php echo $columns;?>">

        <?php 
            if(!empty($cat)) {
                foreach($cat as $category) { 
        ?>
            <?php 
                //set wp query
                $args = array(
                    'post_type' => "post",
                    'cat' => $category,
                    'showposts' => $count,
                    'ignore_sticky_posts' => "1"
                );
                $my_query = new WP_Query($args);
            ?>
                <div class="item-block">
                    <div class="item-header">
                        <?php if ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <a href="<?php the_permalink();?>">
                                <strong><?php echo get_cat_name($category);?></strong>
                                <?php echo ot_image_html($my_query->post->ID,282,180); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="item-content">
                        <ul>
                            <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                            <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <!-- END .block-content -->
        </div>
    <!-- END .strict-block -->
    </div>