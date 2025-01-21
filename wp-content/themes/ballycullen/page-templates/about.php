<?php
/**
 * Template Name: About
 *
 * Template for about page
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


<?php get_template_part( 'global-templates/about-who' ); ?>

<?php get_template_part( 'global-templates/about-vision' ); ?>

<?php get_template_part( 'global-templates/about-teach' ); ?>

<?php get_template_part( 'global-templates/about-team' ); ?> 
	

	<?php /*while ( have_posts() ) : the_post(); */?>

		<?php /* get_template_part( 'loop-templates/content', 'page' ); */ ?>

		<?php /*
		
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php endwhile; */?>


</main><!-- #main -->


<?php get_footer();
