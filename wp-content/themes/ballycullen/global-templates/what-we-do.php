<?php
/**
 * Partial template for What We Do
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>




<div class="section bg-secondary">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center mb-2 mb-md-5">
            <div class="col col-md-10 col-lg-6 text-center">
                <h2 class="section-title"><?php the_field('boxes_heading'); ?></h2>
                <p class="lead"><?php the_field('boxes_description'); ?></p>
            </div>
            <!--col end -->
        </div>
        <!--row end -->

        <div class='row justify-content-center mb-2 mb-md-5 pb-4'>

        <?php if( have_rows('grid_boxes','option') ): ?>


        <div class='col col-lg-8'>
            <div class='row'>

                <?php while( have_rows('grid_boxes','option') ): the_row(); 

                    // vars
                    $image = get_sub_field('box_image','option');
                    $content = get_sub_field('box_name','option');
                    $link = get_sub_field('box_link','option');

                ?>

                <div class="col-12 col-sm-6 col-md-6 mb-4">

                    <?php if( $link ): ?>
                    <a href="<?php echo $link; ?>" class="d-block grid-box-inner wow fadeInLeft ">
                    <?php endif; ?>

                    <div class='btn grid-name text-center'>
                    <?php echo $content; ?>
                    </div>


                    <img src="<?php echo $image['sizes']['tile-md']; ?>" alt="<?php echo $image['alt'] ?>" />

                    <?php if( $link ): ?>
                    </a>
                    <!--grid-box end -->
                    
                    <?php endif; ?>

                </div>
                <!--col end -->

                <?php endwhile; ?>

            </div>
            <!--row end -->

        </div>
        <!--col end -->


        <?php endif; ?>



  

</div>
<!--row end -->



        <div class="row justify-content-center mt-2 mt-md-5">
            <div class="col text-center">

                <?php 

                $link = get_field('grid_boxes_button','option');

                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-green btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>

            </div>
            <!--col end -->
        </div>
        <!--row end -->

            
    </div>
    <!--container end -->             
</div>
<!--section end -->