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

<div id="REGATHERING" class="section bg-light ">

    <div class="<?php echo esc_attr( $container ); ?>">

        <div class="row justify-content-center">
            <div class="col-12 text-center">
				<h2 class="section-title"><?php the_field('special_main_title', 'option'); ?></h2>
            </div>
        </div>


        <div class="row justify-content-center">
          
            <div class="col-12 col-md text-center">
												<?php /*
                $image = get_field('special_image', 'option');
                if( !empty($image) ): ?>
                 <img src='<?php echo $image;?>' alt="<?php echo $image['alt']; ?>" class="" />
                <?php endif; */?>


                <?php the_field('special_text', 'option'); ?>

            

            </div>
          
        </div>

        <div class="row justify-content-center">
        
                    
                <?php 

$link = get_field('special_document', 'option');

if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_blank';
    ?>
    <div class="col-12 col-sm-6 mb-2 mb-md-0">
        <a class="btn btn-lg btn-primary d-block " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
    </div>
<?php endif; ?>
        
        </div>

       



    </div>
</div>





