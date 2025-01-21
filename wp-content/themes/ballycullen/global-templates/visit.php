<?php
/**
 * Partial template for Plan Your Visit
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>



<div id="visit-us" class="section section-plan-visit">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center">

            <div class="col col-md-10 col-lg-8 text-center pb-4 pb-md-5">
                <h2 class="section-title"><?php the_field('plan_title', 'option'); ?></h2>
                <p class="lead"><?php the_field('plan_content', 'option'); ?></p>
            </div>

        </div>

    </div>

    <?php if ( 'container' == $container ) : ?>
			<div class="container-fluid p-0 mb-5">
        <?php endif; ?>
        

        <div class="position-relative">


        <?php
            // Use an ACF image field
            // Set the 'return value' option to "array" (this is the default)
            // This example uses three image sizes, called medium, medium_large, thumbnail
            $imageobject = get_field('plan_image', 'option');
            if( !empty($imageobject) ):
                echo '<picture>
                <source srcset="' . $imageobject['sizes']['tile-md'] .'" media="(min-width: 320px) and (max-width:399px)">
                <source srcset="' . $imageobject['sizes']['tile-lg'] .'" media="(min-width: 400px) and (max-width:799px)">
                <source srcset="' . $imageobject['sizes']['desktop-lg-hero'] .'" media="(min-width: 800px) and (max-width:1399px)">
                <source srcset="' . $imageobject['sizes']['desktop-xxl-hero'] .'" media="(min-width: 1400px)">
                <img src="' . $imageobject['sizes']['desktop-lg-hero'] .'"> </picture>';

            endif;
            ?>

            <a href="<?php the_field('map_link', 'option'); ?>" class="bcc-map-link btn btn-green" target="_blank">View on Google Maps</a>

        </div>
            
    </div>


    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center">

            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3 text-center mb-4 mb-md-0">


            <?php 

            $link = get_field('button_one', 'option');

            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-primary btn-lg d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

            </div>

            <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3  text-center">

            <?php 

            $link = get_field('button_two', 'option');

            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="btn btn-outline-secondary btn-lg d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>

            </div>


        </div>
    </div>
        

    
</div>
