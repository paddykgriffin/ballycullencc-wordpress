<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );

?>


<div class="<?php echo esc_attr( $container ); ?>">

<div class="row pt-5 justify-content-center">

<article <?php post_class('col-12 col-md-8  text-center'); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->



</article><!-- #post-## -->

	</div>
	</div>
