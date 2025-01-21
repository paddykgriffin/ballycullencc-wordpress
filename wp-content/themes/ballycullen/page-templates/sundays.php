<?php
/**
 * Template Name: Sundays
 *
 * Template for sundays page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>



<?php get_template_part( 'global-templates/hero-inner-page' ); ?>



<main class="site-main" id="main" role="main">


	

<?php /*while ( have_posts() ) : the_post(); */?>

<?php /* get_template_part( 'loop-templates/content', 'page' ); */ ?>

<?php /*

if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
?>

<?php endwhile; */?>

<!-- <section class="pt-5">

<div class="container">

	<div class="row">
		<div class="col text-center">

		<div class="alert alert-warning">

		<?php the_field('alert_text', 'option'); ?> 


<?php /*

$link = get_field('alert_button', 'option');

if( $link ): 
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_blank';
    ?>
    
        <a class="btn btn-sm btn-primary " href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
    
<?php endif;*/ ?>

</div>

		</div>
	</div>

</div>



</section>  -->




<?php get_template_part( 'global-templates/sundays-what' ); ?>

<?php get_template_part( 'global-templates/sundays-children' ); ?>

<?php get_template_part( 'global-templates/sundays-prayer' ); ?>


<?php get_template_part( 'global-templates/sundays-sermons' ); ?>






</main><!-- #main -->


<?php get_footer();
