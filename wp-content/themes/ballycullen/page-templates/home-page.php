<?php
/**
 * Template Name: Home Page
 *
 * Template for single pages
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>



<main class="site-main" id="main" role="main">

<?php /*get_template_part( 'global-templates/specials' );*/ ?>
	<?php get_template_part( 'global-templates/latest-sermon' ); ?>
	<?php get_template_part( 'global-templates/what-we-do' ); ?>
	<?php get_template_part( 'global-templates/visit' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php /* get_template_part( 'loop-templates/content', 'page' ); */ ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	<?php endwhile; // end of the loop. ?>


</main><!-- #main -->


<?php get_footer();
