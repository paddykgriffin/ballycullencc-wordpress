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




<div class="section" id="sermons">

    <div class="<?php echo esc_attr( $container ); ?>">


        <div class="row justify-content-center">

            <div class="col-12 col-lg-5 text-center">

                <h2 class="section-title"> <?php the_field('sermons_title'); ?></h2>

            </div>
            
        </div>

        <div class="row justify-content-center pb-5">

            <div class="col-12 col-lg-8  text-center">

                <?php the_field('sermons_content'); ?>

                <?php 

                $link = get_field('sermons_link');

                if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>

             
                        <a class="btn btn-secondary btn-lg" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                           
                            <span class="mr-3"> <?php echo esc_html($link_title); ?></span>    
                            <i class="far fa-chevron-right"></i>
                        </a>
               

                <?php endif; ?>

            </div>

        </div>

          
        <div class="row justify-content-center " >
         

            <div class="col-12  text-center">

            
                <p><?php the_field('podcast_content'); ?></p>

                <div class="row justify-content-center ">

                    <?php  if( have_rows('podcasts') ): ?>

                        <?php 


                        while( have_rows('podcasts') ): the_row(); 

                            // vars
                        
                            $link = get_sub_field('podcast_url');
                            $title = get_sub_field('podcast_title');
                            $image = get_sub_field('podcast_image');
                            ?>

                                <div class="col-12 col-md-4 mb-4"> 
                        
                                    <?php if( $link ): ?>
                                        <a href="<?php echo $link; ?>" class="d-block link-box" target="_blank">
                                    <?php endif; ?>

                                        <div class="inner">
                                            <h5><?php echo $title; ?></h5>
                                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                                        </div>

                                    <?php if( $link ): ?>
                                        </a>
                                    
                                    <?php endif; ?>

                                </div> 

                        <?php endwhile; ?>

                    <?php endif; ?>
        
                </div>
                <!--row end -->

          
            </div>
            <!--col end -->

    </div>
    <!--row end -->

    </div>
    <!--container end -->

</div>