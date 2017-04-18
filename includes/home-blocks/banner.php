<?php 
    if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
    $OT_builder = new OT_home_builder; 
    //get block data
    $data = $OT_builder->get_data(); 
    //extract array data
    extract($data[0]); 


   
?>


<div class="strict-block">
    <div class="main-banner">
        <?php echo do_shortcode($code);?>
    </div>
<!-- END .strict-block -->
</div>