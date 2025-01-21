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




<div class="section bg-secondary">

    <div class="<?php echo esc_attr( $container ); ?>">



        <div class="row justify-content-center">

            <div class="col-12 col-lg-5 text-center text-md-left">

            <h2 class="section-title section-title--left"><?php the_field('team_title'); ?></h2>

               <?php the_field('team_content'); ?>


               <?php 

                    $image = get_field('team_image');

                    if( !empty($image) ): ?>

                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="d-lg-none" />

                <?php endif; ?>

              

                <div class="row mt-5">

                    <?php 

                    $link = get_field('team_button_one');

                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                    
                            <div class="col-12 col-xl-6 mb-2 mb-xl-0">
                                <a class="btn btn-lg btn-green d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            </div>
                    
                    <?php endif; ?>

                    <?php 

                    $link = get_field('team_button_two');

                    if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_blank';
                        ?>
                    
                            <div class="col-12 col-xl-6">
                                <a class="btn btn-lg btn-outline-white d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            </div>
                    
                    <?php endif; ?>




                </div>





            </div>

            <div class="col-12 col-lg pl-lg-5">

                <?php 

                    $image = get_field('team_image');

                    if( !empty($image) ): ?>

                

                    <img src='<?php echo $image['sizes']['landscape-md'];?>' alt="<?php echo $image['alt']; ?>" class="d-none d-lg-block" />

                <?php endif; ?>

            </div>

        </div>




    </div>

</div>
