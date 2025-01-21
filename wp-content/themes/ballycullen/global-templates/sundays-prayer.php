<?php
/**
 * Partial template for sunday prayer
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="section bg-light">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row ">

            <div class="col-12 col-lg-6">

                <h2 class="section-title section-title--left"><?php the_field('prayer_title'); ?></h2>

            </div>
        
        </div>

        <div class="row justify-content-center align-items-center">

            <div class="col-12 col-lg-6">

            
             <?php the_field('prayer_content'); ?>

          
                
            </div>
             <!-- end col -->

             <div class="col-12 col-lg-6 text-center">

                <?php 
                $image = get_field('prayer_content_image');
                if( !empty($image) ): ?>
             

                <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" />

                
                <?php endif; ?>

                

                
            </div>
             <!-- end col -->

        </div>
         <!-- end row -->

    </div>
    <!-- end container -->

</div>