<?php
/**
 * Partial template for Latest Sermon
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>




<div id="latest-sermon" class="section">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center">

            <div class="col-12 col-md-10 text-center">

                <div class="latest-sermon">
                
                    <h2 class="section-title">latest sermon</h2>

                    <?php echo do_shortcode('[sermons per_page="1"]'); ?>

                </div>

            </div>

        </div>

    </div>

</div>
