<?php
/**
 * Partial template for our people
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="section bg-secondary section--children">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                 <h2 class="section-title"><?php the_field('sundays_children_title'); ?></h2>
            </div>
        </div>


        <div class="row justify-content-center mt-2 mt-lg-5 align-items-center mb-lg-5">
          
            <div class="col-12 col-lg-6 order-2 order-lg-1 text-md-center text-lg-left">
                <?php 
                $image = get_field('sundays_row1_image');
                if( !empty($image) ): ?>
                 <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="" />
                <?php endif; ?>
            </div>
            <div class="col-12 col-lg-6 order-1 order-lg-2 ">
                <?php the_field('sundays_row1_content'); ?>
            </div>
        </div>

        <div class="row justify-content-center mt-lg-5 pt-5">
            <div class="col-12 col-lg-6">
                <?php the_field('sundays_row2_content'); ?>
            </div>
         <div class="col-12 col-lg-6 mb-5 mb-lg-0 text-md-center text-lg-left">
                <?php 
                $image = get_field('sundays_row2_image');
                if( !empty($image) ): ?>
                  <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="" />
                <?php endif; ?>
            </div>
          
           
           
        </div>



    </div>
</div>





