<?php
/**
 * Partial template for what we teach
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

                    <h2 class="section-title"><?php the_field('teach_title'); ?></h2>
                   

            </div>

        </div>


        <div class="row justify-content-center mt-2 mt-lg-5 align-items-center">


            <div class="col-12 col-lg-6 mb-5 mb-lg-0">

               
            <?php 

            $image = get_field('teach_image');

            if( !empty($image) ): ?>

           

            <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="section-content-image" />



            <?php endif; ?>


            </div>


            <div class="col-12 col-lg-6">

                <?php the_field('teach_content'); ?>


                <div class="pt-5 pb-3">
                    <p class="font-weight-bold mb-0"><?php the_field('teach_buttons_title'); ?></p>
                </div>
                   
                <div class="row">

               
                    <?php 

                    $link = get_field('teach_button_one');

                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_blank';
                        ?>
                        <div class="col-12 col-sm-6 mb-2 mb-md-0">
                            <a class="btn btn-lg btn-primary d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>
                    <?php endif; ?>

     




                    <?php 

                    $link = get_field('teach_button_two');

                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <div class="col-12 col-sm-6">
                            <a class="btn btn-lg btn-outline-secondary d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        </div>
                        <?php endif; ?>
                </div>

              
                    


            </div>

          

        </div>



    </div>

</div>









