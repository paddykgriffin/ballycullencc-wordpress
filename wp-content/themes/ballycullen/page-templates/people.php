<?php
/**
 * Template Name: People
 *
 * Template for People page
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>



<?php get_template_part( 'global-templates/hero-inner-page' ); ?>



<main class="site-main pb-5" id="main" role="main">


<?php get_template_part( 'global-templates/elders' ); ?>

<?php get_template_part( 'global-templates/staff' ); ?>




	<?php while ( have_posts() ) : the_post(); ?>

		<?php /* get_template_part( 'loop-templates/content', 'page' ); */ ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php endwhile; // end of the loop. ?>


	<?php get_template_part( 'global-templates/call-to-action' ); ?>


</main><!-- #main -->


<?php get_footer();
