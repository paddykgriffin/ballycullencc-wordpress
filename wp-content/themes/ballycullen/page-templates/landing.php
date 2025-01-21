<?php
/**
 * Template Name: Landing Page
 *
 * Template for Landing page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>



<?php get_template_part( 'global-templates/hero-inner-page' ); ?>



<main class="site-main site-main--landing" id="main" role="main">


	

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'loop-templates/content', 'landing' );  ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php endwhile; // end of the loop. ?>


	<?php get_template_part( 'global-templates/grid-boxes' ); ?>




	<?php get_template_part( 'global-templates/call-to-action' ); ?>


</main><!-- #main -->


<?php get_footer();
