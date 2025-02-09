<?php
/**
 * To edit this file, please copy the contents of this file to one of these locations:
 * - `/wp-content/themes/<your_theme>/partials/content-sermon-archive.php`
 * - `/wp-content/themes/<your_theme>/template-parts/content-sermon-archive.php`
 * - `/wp-content/themes/<your_theme>/content-sermon-archive.php`
 *
 * That will ensure that your changes are not deleted on plugin update.
 *
 * Sometimes, we need to edit this file to add new features or to fix some bugs, and when we do so, we will modify the
 * changelog in this header comment.
 *
 * @package SermonManager\Views\Partials
 *
 * @since   2.13.0 - added.
 * @since   2.15.2 - fix $args not being loaded from shortcode.
 */

global $post;

if ( empty( $GLOBALS['wpfc_partial_args'] ) ) {
	$GLOBALS['wpfc_partial_args'] = array();
}

$GLOBALS['wpfc_partial_args'] += array(
	'image_size' => 'post-thumbnail',
);

$args = $GLOBALS['wpfc_partial_args'];

$theme = get_option( 'template' );

$sm_image_html = '';

if ( get_sermon_image_url() && ! \SermonManager::getOption( 'disable_image_archive' ) ) {
	$sm_image_html .= '<div class="wpfc-sermon-image"><a href="' . get_the_permalink() . '">';
	$sm_image_html .= '<div class="wpfc-sermon-image-img" style="background-image: url(' . get_sermon_image_url( true, $args['image_size'] ) . ')"></div>';
	$sm_image_html .= '</a></div>';
}

?>
<?php if ( ! ( \SermonManager::getOption( 'theme_compatibility' ) || ( defined( 'WPFC_SM_SHORTCODE' ) && WPFC_SM_SHORTCODE === true ) ) ) : ?>
  
<article id="post-<?php the_ID(); ?>" class="col-12 col-md-6 col-lg-4 col-xl-4 mb-5 wow fadeInLeft wpfc-sermon-block" data-wow-duration="2s" data-wow-delay=".25s">
	<?php endif; ?>
	<?php if ( 'x' === $theme ) : ?>
		<?php echo $sm_image_html; ?>
	<?php endif; ?>
	<div class="wpfc-sermon-inner entry-wrap">
		<?php if ( 'x' !== $theme ) : ?>
			<?php echo $sm_image_html; ?>
		<?php endif; ?>

		<div class="wpfc-sermon-main <?php echo get_sermon_image_url() ? '' : 'no-image'; ?>">
			<div class="wpfc-sermon-header <?php echo \SermonManager::getOption( 'archive_meta' ) ? 'aside-exists' : ''; ?>">
				<div class="wpfc-sermon-header-main">

					<div class="row align-items-center wpfc-latest-meta">

						

							<?php if ( has_term( '', 'wpfc_preacher', $post->ID ) ) : ?>
								<div class="col-12 col-sm-8  mb-3 mb-sm-0 wpfc-sermon-meta-item wpfc-sermon-meta-preacher">
									<?php
									echo apply_filters( 'sermon-images-list-the-terms', '', // phpcs:ignore
										array(
											'taxonomy'     => 'wpfc_preacher',
											'after'        => '',
											'after_image'  => '',
											'before'       => '',
											'before_image' => '',
										)
									);
									?>
									<span class="wpfc-sermon-meta-prefix font-weight-bold">
										<?php echo ( \SermonManager::getOption( 'preacher_label', '' ) ) ?: __( 'Preacher', 'sermon-manager-for-wordpress' ); ?>
										:</span>
									<span class="wpfc-sermon-meta-text"><?php the_terms( $post->ID, 'wpfc_preacher' ); ?></span>
								</div>
							<?php endif; ?>

						
						

							<?php if ( has_term( '', 'wpfc_sermon_series', $post->ID ) ) : ?>
							<div class="col-12 col-sm-4 text-sm-right wpfc-sermon-meta-item wpfc-sermon-meta-series">
								<?php the_terms( $post->ID, 'wpfc_sermon_series' ); ?>
							</div>
							<?php endif; ?>

						

					</div>

		


				
					<?php if ( ! ( \SermonManager::getOption( 'theme_compatibility' ) && ! ( defined( 'WPFC_SM_SHORTCODE' ) && WPFC_SM_SHORTCODE === true ) ) ) : ?>
						<h3 class="wpfc-sermon-title">
							<a class="wpfc-sermon-title-text" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
					<?php endif; ?>
					<div class="wpfc-sermon-meta-item wpfc-sermon-meta-date">
						<?php if ( 'date' === SermonManager::getOption( 'archive_orderby' ) ) : ?>
							<?php the_date(); ?>
						<?php else : ?>
							<?php echo SM_Dates::get(); ?>
						<?php endif; ?>
					</div>
				</div>
				<?php if ( \SermonManager::getOption( 'archive_meta' ) ) : ?>
					<div class="wpfc-sermon-header-aside">
						<?php if ( get_wpfc_sermon_meta( 'sermon_audio' ) ) : ?>
							<a class="wpfc-sermon-att-audio dashicons dashicons-media-audio"
									href="<?php echo get_wpfc_sermon_meta( 'sermon_audio' ); ?>"
									download="<?php echo basename( get_wpfc_sermon_meta( 'sermon_audio' ) ); ?>"
									title="Audio"></a>
						<?php endif; ?>
						<?php if ( get_wpfc_sermon_meta( 'sermon_notes' ) ) : ?>
							<a class="wpfc-sermon-att-notes dashicons dashicons-media-document"
									href="<?php echo get_wpfc_sermon_meta( 'sermon_notes' ); ?>"
									download="<?php echo basename( get_wpfc_sermon_meta( 'sermon_notes' ) ); ?>"
									title="Notes"></a>
						<?php endif; ?>
						<?php if ( get_wpfc_sermon_meta( 'sermon_bulletin' ) ) : ?>
							<a class="wpfc-sermon-att-bulletin dashicons dashicons-media-text"
									href="<?php echo get_wpfc_sermon_meta( 'sermon_bulletin' ); ?>"
									download="<?php echo basename( get_wpfc_sermon_meta( 'sermon_bulletin' ) ); ?>"
									title="Bulletin"></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( ! post_password_required( $post ) ) : ?>
				<div class="wpfc-sermon-description">
					<div class="sermon-description-content">
						<?php if ( has_excerpt( $post ) ) : ?>
							<?php echo get_the_excerpt( $post ); ?>
						<?php else : ?>
							<?php echo wp_trim_words( get_post_meta( $post->ID, 'sermon_description', true ), 30 ); ?>
						<?php endif; ?>
						<br/>
					</div>
					<?php if ( SermonManager::getOption( 'hide_read_more_when_not_needed' ) && str_word_count( get_post_meta( $post->ID, 'sermon_description', true ) ) > 30 ) : ?>
						<div class="wpfc-sermon-description-read-more">
							<a href="<?php echo get_permalink(); ?>"><?php echo __( 'Continue reading...', 'sermon-manager-for-wordpress' ); ?></a>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( \SermonManager::getOption( 'archive_player' ) ) : ?>
					<div class="wpfc-sermon-audio">
						<?php echo wpfc_render_audio( $post->ID ); ?>
					</div>
				<?php endif; ?>
			<?php else : ?>
				<?php echo get_the_password_form( $post ); ?>
			<?php endif; ?>

			<div class="wpfc-sermon-footer">
				<?php if ( has_term( '', 'wpfc_preacher', $post->ID ) ) : ?>
					<div class="wpfc-sermon-meta-item wpfc-sermon-meta-preacher">
						<?php
						echo apply_filters( 'sermon-images-list-the-terms', '', // phpcs:ignore
							array(
								'taxonomy'     => 'wpfc_preacher',
								'after'        => '',
								'after_image'  => '',
								'before'       => '',
								'before_image' => '',
							)
						);
						?>
						<span class="wpfc-sermon-meta-prefix d-none">
							<?php /* echo ( \SermonManager::getOption( 'preacher_label', '' ) ) ?: __( 'Preacher', 'sermon-manager-for-wordpress' ); */ ?>
							</span>
						<span class="wpfc-sermon-meta-text"><?php /*the_terms( $post->ID, 'wpfc_preacher' ); */?></span>
					</div>
				<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'bible_passage', true ) ) : ?>
					<div class="wpfc-sermon-meta-item wpfc-sermon-meta-passage">
						<span class="wpfc-sermon-meta-prefix">
							<?php echo __( 'Scripture', 'sermon-manager-for-wordpress' ); ?>:</span>
						<span class="wpfc-sermon-meta-text"><?php wpfc_sermon_meta( 'bible_passage' ); ?></span>
					</div>
				<?php endif; ?>
				<?php if ( has_term( '', 'wpfc_service_type', $post->ID ) ) : ?>
					<div class="wpfc-sermon-meta-item wpfc-sermon-meta-service">
						<span class="wpfc-sermon-meta-prefix">
							<?php echo __( 'Service Type', 'sermon-manager-for-wordpress' ); ?>:</span>
						<span class="wpfc-sermon-meta-text"><?php the_terms( $post->ID, 'wpfc_service_type' ); ?></span>
					</div>
				<?php endif; ?>

				<div class="wpfc_buttons row no-gutters">	
					<div class="col mb-2 mb-md-0">
						<a href="<?php the_permalink(); ?>" class="btn btn-primary btn-lg d-block mx-1">Listen</a> 
					</div>
					<div class="col">
						<a href="/sundays#sermons" class="btn btn-outline-green btn-lg d-block mx-1">Subscribe</a> 
					</div>			
				</div>

				


				<div class="wpfc-sermon-sharing row align-items-center">
					
						<div class="col-3 col-md-3 col-lg-2">
							<span class="label text-uppercase">Share</span>
						</div>
						
						<div class="col">
							<?php echo do_shortcode('[addtoany]'); ?>
						</div>
						
				</div>

			</div>
		</div>
	</div>

	<?php if ( ! ( \SermonManager::getOption( 'theme_compatibility' ) || ( defined( 'WPFC_SM_SHORTCODE' ) && WPFC_SM_SHORTCODE === true ) ) ) : ?>
</article>
<?php endif; ?>
