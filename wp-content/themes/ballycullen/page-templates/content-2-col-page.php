<?php
/**
 * Template Name: Generic Content Page 2 Cols
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


<main class="site-main" id="main" role="main">

	<div class="<?php echo esc_attr( $container ); ?> section" id="content">

		<div class="row justify-content-between">

			<div class="col-12 col-lg-7 order-2 order-lg-1"> 

				

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'subpage' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

			

			</div><!-- #primary -->

			<div class="col-12  col-lg-4 order-1 order-lg-2"> 
				<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
			</div>

		</div><!-- .row -->

	</div><!-- #content -->




</main><!-- #main -->


<?php get_footer();

