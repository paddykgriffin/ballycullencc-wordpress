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




<div class="<?php echo esc_attr( $container ); ?> ">
    <div class="row justify-content-center mt-0 mt-md-5">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="bcc-call-to-action text-center mx-3">

                <div class="row no-gutters">
                    <div class="col-12 col-md-5 bg-light position-relative bcc-call-to-action-image py-3 py-md-0">

                            
                            <?php 
                            $image = get_field('cta_logo', 'option');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>

                    </div>
                    <div class="col-12 col-md-7 bg-secondary p-3 p-md-5 px-md-3">
                            <h3><?php the_field('cta_title'); ?></h3>
                            <p><?php the_field('cta_text'); ?></p>
                            <a href="/contact" class="btn btn-green btn-lg">Contact Us</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>