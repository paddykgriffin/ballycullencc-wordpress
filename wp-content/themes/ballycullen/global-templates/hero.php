<?php
/**
 * Partial template for hero text
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>



<div class="hero">

    <div class="hero-content">


        <h1 class="mb-3 hero-title wow fadeInDown" data-wow-duration="2s" >
           <?php the_field('hero_welcome', 'option'); ?> <span class="d-none">Ballycullen Community Church</span>

        </h1>


        <?php

            $image = get_field('hero_logo', 'option');

            if( !empty($image) ): ?>

                <img data-wow-duration="2s" data-wow-delay=".25s" class="wow hero-logo fadeInDown" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

            <?php endif; ?>

        <div class="row justify-content-center mt-5 ">

            <div class="col-12 col-sm-6 col-lg-6 mb-3 mb-md-0">
                <?php

                $link = get_field('hero_button_one', 'option');

                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="btn btn-green btn-lg d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>

            <div class="col-12 col-sm-6 col-lg-6 mb-3">

                <?php

                $link = get_field('hero_button_two', 'option');

                if( $link ):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class=" btn btn-outline-white btn-lg d-block" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>


            </div>








        </div>

        <div class="row justify-content-center mt-3 ">
            <div class="col-12 col-md-6">

                <?php



$link = get_field('hero_special_button', 'option');

if( $link ):
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    ?>

     <a class="btn btn-green btn-lg d-block" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>




    <?php endif; ?>
    </div>
        </div>








    </div>

    <div class="hero-bottom">
       <a href="#latest-sermon" class="btn btn-begin animated bounce infinite">
  <svg xmlns="http://www.w3.org/2000/svg" height="36px" viewBox="0 0 24 24" width="36px" fill="#FFFFFF"><path d="M24 24H0V0h24v24z" fill="none" opacity=".87"/><path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"/></svg>
            <small class="d-none d-lg-block text-muted">Scroll Down</small>
        </a>
    </div>


        <?php
            // Use an ACF image field
            // Set the 'return value' option to "array" (this is the default)
            // This example uses three image sizes, called medium, medium_large, thumbnail
            $imageobject = get_field('hero_image', 'option');
            if( !empty($imageobject) ):
                echo '<picture>
                <source srcset="' . $imageobject['sizes']['hero'] .'" media="(min-width: 320px) and (max-width:1199px)">
                <source srcset="' . $imageobject['sizes']['desktop-lg-hero'] .'" media="(min-width: 1200px) and (max-width:1399px)">
                <source srcset="' . $imageobject['sizes']['desktop-xxl-hero'] .'" media="(min-width: 1400px) and (max-width: 1920px)">
				<source srcset="' . $imageobject['sizes']['desktop-xxxl-hero'] .'" media="(min-width: 1950px)">
                <img class="hero-image" src="' . $imageobject['sizes']['desktop-lg-hero'] .'"> </picture>';
            endif;
            ?>





</div>


        <!-- <div class="modal fade" tabindex="-1" role="dialog" id="modal-UPDATE">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title"></h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="far fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="modal-body text-center p-5">
                                <h2 class="text-white">COVID-19 Update</h2>
                                <p class="lead mb-5 text-white">Due to the outbreak of COVID-19 (coronavirus) our Sunday services have been cancelled until further notice.</p>



                                <p class="lead mb-5 text-white">There will be a live broadcast each Sunday at 10:45am that will include some readings, prayers and a talk from the Bible.</p>



                                <p class="lead mb-5 text-white"> Do join us on YouTube at the link below and then click to view the latest live stream.</p>


                                <a class="btn btn-outline-white btn-lg " href="https://www.youtube.com/channel/UCOCfknF6_m2RaBZOGAKY2ug" target="_blank" > Watch Live </a>
                            </div>
                        </div>
                    </div>
                </div> -->


                <!-- <div class="modal fade" tabindex="-1" role="dialog" id="modal-LIVE">
                    <div class="modal-dialog modal-xl" role="document" style="max-width:70%;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title text-white">LIVE - SERVICE 29-03-20</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="far fa-times" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="modal-body text-center">

                            <div class="embed-responsive embed-responsive-16by9">



                                    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/uENeKKIlnYE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->