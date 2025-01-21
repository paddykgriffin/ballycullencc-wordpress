<?php
/**
 * Partial template for our vision
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
            <div class="col-12 text-center">
                <h2 class="section-title"><?php the_field('vision_title'); ?></h2>
            </div>
        </div>

        <?php if( have_rows('keypoints') ): ?>

            <div class="row justify-content-center mt-4">

            <?php while( have_rows('keypoints') ): the_row(); 

                // vars
                $id = get_sub_field('keypoint_id');
                $title = get_sub_field('keypoint_title');
                $image = get_sub_field('keypoint_image');
                $button = get_sub_field('keypoint_button');
                $modal = get_sub_field('keypoint_modal_content');

                ?>

                <div class="col-md  mb-5 mb-md-0 text-center wow fadeInUp" data-wow-duration="2s" data-wow-delay=".5s" >

                    <a href="#modal-<?php echo $id; ?>" data-toggle="modal" target="_self">
                        <img src='<?php echo $image['sizes']['tile-sm'];?>' class='mb-3' />
                        <h4><?php echo $title; ?></h4>
                        <button class="btn btn-green">Learn more</button>
                    </a>
               

                    <div class="modal fade" tabindex="-1" role="dialog" id="modal-<?php echo $id; ?>">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title"> <?php echo $title; ?></h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="far fa-times" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                    <p class="lead"><?php echo $modal; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
