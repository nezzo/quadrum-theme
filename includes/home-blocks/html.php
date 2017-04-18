<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //extract array data
    extract($data[0]); 


   
?>
<div class="strict-block">
    <?php if($title) { ?>
        <div class="block-title">
            <h2><?php echo $title;?></h2>
       </div>
    <?php } ?>
        <div class="block-content">
            <div class="main-article">
                <?php echo do_shortcode($code);?>
            </div>
        </div>
</div>