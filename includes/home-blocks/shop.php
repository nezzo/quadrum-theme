<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    if (ot_is_woocommerce_activated() != true) exit; // Exit if woocommerce isn't active
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //set query
    $my_query = $data[0]; 
    //extract array data
    extract($data[1]); 

   
?>
<!-- BEGIN .strict-block -->
<div class="strict-block">
    <?php if($title) { ?>
        <div class="block-title" style="background: <?php echo $pageColor;?>;">
            <h2><?php echo $title;?></h2>
            <?php if($link) { ?>
                <a href="<?php echo $link;?>" class="panel-title-right"><?php _e("View All Items:",'quadrum-theme')
;?></a>
            <?php } ?>       
        </div>
    <?php } ?>
    <!-- BEGIN .block-content -->
    <div class="block-content item-block-1 split-stuff blocks-<?php echo $columns;?> products">
        <?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <?php 
            $image = ot_image_html($my_query->post->ID,314,210); 
            global $product;
        ?>
            <div class="item-block product">
                <a href="#" class="product-content">
                    <?php if( $product && $product->is_on_sale()) { ?>
                         <span class="onsale"><?php _e("Sale!",'quadrum-theme')
;?></span>
                    <?php } ?>
                   
                    <?php echo $image;?>
                    <h3><?php the_title();?></h3>
                    <?php
                        if( $product && $product->get_rating_html()) { 
                            echo $product->get_rating_html();
                        } 
                    ?>
                
                    <?php if( $product && $product->get_price_html()) { ?>
                        <span class="price"><?php echo $product->get_price_html();?><span>
                    <?php } ?>
                </a>
                <?php  woocommerce_template_loop_add_to_cart(); ?>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
    <!-- END .block-content -->
    </div>
<!-- END .strict-block -->
</div>
