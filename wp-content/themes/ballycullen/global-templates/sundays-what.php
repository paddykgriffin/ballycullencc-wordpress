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


<div class="section">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center">

            <div class="col-12 col-md-8 text-center">

                    <h2 class="section-title"><?php the_field('sundays_maintitle'); ?></h2>
                   
            </div>

        </div>


        <div class="row justify-content-center mt-2 mt-lg-5">


            <div class="col-12 col-lg-6">

                <?php the_field('sundays_content'); ?>

                <div class="row">

               
                <?php 

                $link = get_field('sundays_content_button');

                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_blank';
                    ?>
                    <div class="col-12 col-md-8">
                        <a class="btn btn-lg btn-secondary d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                <?php endif; ?>

                </div>

            </div>

            <div class="col-12 col-lg-6 mb-5 mb-lg-0 text-md-center text-lg-left">

               
                <?php 

                $image = get_field('sundays_image');

                if( !empty($image) ): ?>



                <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="section-content-image" />

                <?php endif; ?>


            </div>

        </div>



    </div>

</div>










