<?php
/**
 * Partial template for grid boxes
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>


<div class="<?php echo esc_attr( $container ); ?>">






<div class="row justify-content-center pt-5">


    <?php  if( have_rows('grid_boxes') ): ?>

        <?php 

        $counter = 1;
        while( have_rows('grid_boxes') ): the_row(); 

            // vars
            $image = get_sub_field('box_image');
            $content = get_sub_field('box_name');
            $link = get_sub_field('box_link');


        
            ?>

                <div class="col-12 col-md-6 col-lg-4  mb-4"> 
        
                    <?php if( $link ): ?>
                        <a href="<?php echo $link; ?>" class="d-block grid-box-inner wow fadeInLeft">
                    <?php endif; ?>

                        <div class='btn grid-name text-center'>
                            <?php echo $content; ?>

                        </div>

                        <img src="<?php echo $image['sizes']['tile-md']; ?>" alt="<?php echo $image['alt'] ?>" />

                    <?php if( $link ): ?>
                        </a>
                       
                    <?php endif; ?>

                </div>
                

                
         <?php $counter++; ?>

        <?php endwhile; ?>

    <?php endif; ?>


  
    </div>
 <!--row end -->

                 




                <?php 

                $link = get_field('grid_boxes_button');

                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

                <div class="row justify-content-center my-2 my-lg-5">
                    <div class="col mb-5 text-center">
                        <a class="btn btn-outline-secondary btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                            <i class="far fa-chevron-left"></i>
                            <span class="ml-3"> <?php echo esc_html($link_title); ?></span>    
                        </a>
                    </div>
                    <!--col end -->
                </div>
                <!--row end -->

                <?php endif; ?>

  
   


    </div>
               



   