<?php
/**
 * Partial template for Location on contact page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>




<div class="section" id="visit">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center">

            <div class="col-12 col-md-10 text-center">

              
                
                    <h2 class="section-title">our location</h2>

               

            </div>

        </div>


        <div class="row justify-content-center align-items-center mt-3 mt-lg-5">

            <div class="col-12 col-md-10 col-lg order-md-2 order-lg-1">

                <div class="bcc-location-address">

                    <h3><?php the_field('address_title'); ?></h3>

                    <p><?php the_field('address_details'); ?></p>

                </div>

                <div class="bcc-location-directions">
                  


                    <h3><?php the_field('directions_title'); ?></h3>

                    <?php if( have_rows('directions') ): ?>

                        <div class="bcc-location-directions-accordion" id="directionsAccordion">

                            <?php while( have_rows('directions') ): the_row(); 

                                // vars
                                $contentID = get_sub_field('content_id');
                                $contentTitle = get_sub_field('directions_title');
                                $contentDetail = get_sub_field('direction_details');
                                $dataTarget = get_sub_field('data_target');

                                ?>

                                <div class="bcc-location-directions-item">
                                    <div class="bcc-location-directions-item-header" id="<?php echo $contentID; ?>">
                                        <button class="btn d-block w-100 text-left" type="button" data-toggle="collapse" data-target="#<?php echo $dataTarget; ?>" aria-expanded="true" aria-controls="<?php echo $contentTitle; ?>">
                                            <?php echo $contentTitle; ?>
                                            <i class="far fa-chevron-down"></i>
                                        </button>
                                    </div>
                                    <div id="<?php echo $dataTarget; ?>" class="collapse" aria-labelledby="<?php echo $contentID; ?>" data-parent="#directionsAccordion">
                                        <div class="bcc-location-directions-body">
                                            <?php echo $contentDetail; ?>
                                        </div>
                                    </div>
                                </div>


                            <?php endwhile; ?>

                        </div>

                    <?php endif; ?>



                </div>

            </div>

            <div class="col-12 col-md-10 mb-md-5 mb-lg-0 col-lg text-center order-md-1 order-lg-2">

                
                <?php if( get_field('map') ): ?>

                <div class="position-relative">

                  
                    <?php
                    // Use an ACF image field
                    // Set the 'return value' option to "array" (this is the default)
                    // This example uses three image sizes, called medium, medium_large, thumbnail
                    $imageobject = get_field('map');
                    if( !empty($imageobject) ):
                        echo '<picture>
                        <source srcset="' . $imageobject['sizes']['tile-md'] .'" media="(min-width: 320px) and (max-width:399px)">
                        <source srcset="' . $imageobject['sizes']['tile-lg'] .'" media="(min-width: 400px)">
                        <img src="' . $imageobject['sizes']['tile-lg'] .'"> </picture>';
                    endif;
                    ?>



                    <a href="<?php the_field('map_link', 'option'); ?>" class="bcc-map-link btn btn-green" target="_blank">View on Google Maps</a>
                    </div>

                <?php endif; ?>



            </div>

        </div>




    </div>

</div>
