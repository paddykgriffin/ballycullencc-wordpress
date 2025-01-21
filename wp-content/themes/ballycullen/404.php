<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>





<div class="hero hero-inner-page" style="background-image: url('<?php echo get_site_url(); ?>/wp-content/uploads/2019/09/example-inner-1920x480.jpg')">

<div class="hero-content hero-content-inner-page">
<h1 class="page-title "><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'understrap' ); ?></h1>
       
        
    </div>

</div>

<main class="site-main" id="main">


<div class="wrapper section" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row justify-content-center">

			<div class="col col-md-6 content-area text-center" id="primary">

			

				

							<p class="lead"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'understrap' ); ?></p>

							<?php get_search_form(); ?>

							<?php /* the_widget( 'WP_Widget_Recent_Posts' ); */ ?>

							<?php /*if ( understrap_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>

								<div class="widget widget_categories">

									<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'understrap' ); ?></h2>

									<ul>
										<?php
										wp_list_categories(
											array(
												'orderby'    => 'count',
												'order'      => 'DESC',
												'show_count' => 1,
												'title_li'   => '',
												'number'     => 10,
											)
										);
										?>
									</ul>

								</div><!-- .widget -->

							<?php endif; */?>

							<?php /*

							
							$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'understrap' ), convert_smilies( ':)' ) ) . '</p>';
							the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

							the_widget( 'WP_Widget_Tag_Cloud' );
							 */?>

					

				

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

</main><!-- #main -->

<?php get_footer();
