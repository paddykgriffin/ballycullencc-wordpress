<?php
/**
 * To edit this file, please copy the contents of this file to one of these locations:
 * - `/wp-content/themes/<your_theme>/partials/content-sermon-single.php`
 * - `/wp-content/themes/<your_theme>/template-parts/content-sermon-single.php`
 * - `/wp-content/themes/<your_theme>/content-sermon-single.php`
 *
 * That will ensure that your changes are not deleted on plugin update.
 *
 * Sometimes, we need to edit this file to add new features or to fix some bugs, and when we do so, we will modify the
 * changelog in this header comment.
 *
 * @package SermonManager\Views\Partials
 *
 * @since   2.13.0 - added
 * @since   2.15.0 - fix audio URL edge case
 */

global $post;
?>
<?php if ( ! \SermonManager::getOption( 'theme_compatibility' ) ) : ?>
<div class="col-12 col-md-8 py-5">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php endif; ?>
	<div class="wpfc-sermon-single-inner">
		<?php if ( get_sermon_image_url() && ! \SermonManager::getOption( 'disable_image_single' ) ) : ?>
			<div class="wpfc-sermon-single-image">
				<img class="wpfc-sermon-single-image-img" alt="<?php the_title(); ?>"
						src="<?php echo get_sermon_image_url(); ?>">
			</div>
		<?php endif; ?>
		<div class="wpfc-sermon-single-main">
			<div class="wpfc-sermon-single-header">
				<div class="wpfc-sermon-single-meta-item wpfc-sermon-single-meta-date">
					<?php if ( 'date' === SermonManager::getOption( 'archive_orderby' ) ) : ?>
						<?php the_date(); ?>
					<?php else : ?>
						<?php /*echo SM_Dates::get(); */?>
					<?php endif; ?>
				</div>
				<?php if ( ! \SermonManager::getOption( 'theme_compatibility' ) ) : ?>
					<!-- <h2 class="wpfc-sermon-single-title"><?php the_title(); ?></h2> -->
				<?php endif; ?>

				<div class="wpfc-sermon-single-description text-center"><?php wpfc_sermon_description(); ?></div>
				<?php if ( get_wpfc_sermon_meta( 'sermon_notes' ) || get_wpfc_sermon_meta( 'sermon_bulletin' ) ) : ?>
				<div class="wpfc-sermon-single-attachments"><?php echo wpfc_sermon_attachments(); ?></div>
				<?php endif; ?>


				<div class="wpfc-sermon-single-meta text-center">
					<?php /*if ( has_term( '', 'wpfc_preacher', $post->ID ) ) : ?>
						<div class="wpfc-sermon-single-meta-item wpfc-sermon-single-meta-preacher <?php echo ( \SermonManager::getOption( 'preacher_label', '' ) ) ? 'custom-label' : ''; ?>">
							<span class="wpfc-sermon-single-meta-prefix"><?php echo ( ( \SermonManager::getOption( 'preacher_label', '' ) ) ?: __( 'Preacher', 'sermon-manager-for-wordpress' ) ) . ':'; ?></span>
							<span class="wpfc-sermon-single-meta-text"><?php the_terms( $post->ID, 'wpfc_preacher' ); ?></span>
						</div>
					<?php endif; */ ?>
					<?php /*if ( has_term( '', 'wpfc_sermon_series', $post->ID ) ) : ?>
						<div class="wpfc-sermon-single-meta-item wpfc-sermon-single-meta-series">
							<span class="wpfc-sermon-single-meta-prefix">
								<?php echo __( 'Series', 'sermon-manager-for-wordpress' ); ?>:</span>
							<span class="wpfc-sermon-single-meta-text"><?php the_terms( $post->ID, 'wpfc_sermon_series' ); ?></span>
						</div>
					<?php endif; */?>
					<?php if ( get_post_meta( $post->ID, 'bible_passage', true ) ) : ?>
						<div class="wpfc-sermon-single-meta-item wpfc-sermon-single-meta-passage">
							<h5 class="wpfc-sermon-single-meta-prefix font-weight-bold">
								<?php echo __( 'Scripture', 'sermon-manager-for-wordpress' ); ?></h5>
							<span class="wpfc-sermon-single-meta-text"><?php wpfc_sermon_meta( 'bible_passage' ); ?></span>
						</div>
					<?php endif; ?>
					<?php if ( has_term( '', 'wpfc_sermon_topics', $post->ID ) ) : ?>
				<div class="wpfc-sermon-single-topics text-center mt-3">
					<h5 class="wpfc-sermon-single-topics-prefix font-weight-bold">
						<?php echo __( 'Topics', 'sermon-manager-for-wordpress' ); ?></h5>
					<span class="wpfc-sermon-single-topics-text"><?php the_terms( $post->ID, 'wpfc_sermon_topics' ); ?></span>
				</div>
			<?php endif; ?>
					<?php if ( has_term( '', 'wpfc_service_type', $post->ID ) ) : ?>
						<div class="wpfc-sermon-single-meta-item wpfc-sermon-single-meta-service">
							<span class="wpfc-sermon-single-meta-prefix">
								<?php echo __( 'Service Type', 'sermon-manager-for-wordpress' ); ?>:</span>
							<span class="wpfc-sermon-single-meta-text"><?php the_terms( $post->ID, 'wpfc_service_type' ); ?></span>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="wpfc-sermon-single-media  text-center pt-3">
				<?php if ( get_wpfc_sermon_meta( 'sermon_video_link' ) ) : ?>
					<div class="wpfc-sermon-single-video wpfc-sermon-single-video-link">
						<?php echo wpfc_render_video( get_wpfc_sermon_meta( 'sermon_video_link' ) ); ?>
					</div>
				<?php endif; ?>
				<?php if ( get_wpfc_sermon_meta( 'sermon_video' ) ) : ?>
					<div class="wpfc-sermon-single-video wpfc-sermon-single-video-embed">
						<?php echo do_shortcode( get_wpfc_sermon_meta( 'sermon_video' ) ); ?>
					</div>
				<?php endif; ?>

				

				<?php if ( get_wpfc_sermon_meta( 'sermon_audio' ) || get_wpfc_sermon_meta( 'sermon_audio_id' ) ) : ?>
					<?php
					$sermon_audio_id     = get_wpfc_sermon_meta( 'sermon_audio_id' );
					$sermon_audio_url_wp = $sermon_audio_id ? wp_get_attachment_url( intval( $sermon_audio_id ) ) : false;
					$sermon_audio_url    = $sermon_audio_id && $sermon_audio_url_wp ? $sermon_audio_url_wp : get_wpfc_sermon_meta( 'sermon_audio' );
					?>
					<div class="wpfc-sermon-single-audio player-<?php echo strtolower( \SermonManager::getOption( 'player', 'plyr' ) ); ?>">


					<div class="row">

					<div class="col mb-3 mb-lg-0">
						<div class="bg-light p-5 h-100">
						<h4 class="mb-4">Listen Online</h4>
						<div class="mb-4">
						<?php echo wpfc_render_audio( $sermon_audio_url ); ?>
						</div>

						<a class="btn btn-lg btn-green  wpfc-sermon-single-audio-download"
								href="<?php echo $sermon_audio_url; ?>"
								download="<?php echo basename( $sermon_audio_url ); ?>"
								title="<?php echo __( 'Download Audio File', 'sermon-manager-for-wordpress' ); ?>">
							<!-- <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24"
									xmlns="http://www.w3.org/2000/svg">
								<path d="M0 0h24v24H0z" fill="none"></path>
								<path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM17 13l-5 5-5-5h3V9h4v4h3z"></path>
							</svg> -->
							<i class="far fa-download"></i>
							<span class="ml-2">Download</span></a> 
				
</div>

					</div>

					<div class="col">
					<div class="bg-light p-5 h-100">
						<h4 class="mb-4">Listen on the go</h4>
						<div class="mb-4">
						<p>Subscribe to our weekly sermon.<p> 
						</div>
						<a href="<?php get_stylesheet_directory_uri(); ?>/sundays#sermons" class="btn btn-green btn-lg">
						<i class="fas fa-podcast"></i>
						<span class="ml-2">Subscribe</span></a> 
				

					</div>

					</div>



					</div>
						
						
						
					</div>
				<?php endif; ?>
			</div>

			
		

			<?php if ( ! \SermonManager::getOption( 'theme_compatibility' ) ) : ?>
				<?php
				$previous_sermon = sm_get_previous_sermon();
				$next_sermon     = sm_get_next_sermon();
				if ( $previous_sermon || $next_sermon ) :
					?>
					<div class="wpfc-sermon-single-navigation text-center mt-5">

						<a href="/sermons" class="btn btn-outline-secondary btn-lg">
						<i class="far fa-chevron-left"></i>
						<span class="ml-3">Back to Sermons</span></a>

						<?php /*
						$previous_attr = apply_filters( 'previous_posts_link_attributes', 'class="previous-sermon"' );
						$next_attr     = apply_filters( 'next_posts_link_attributes', 'class="next-sermon"' );
						if ( null !== $previous_sermon ) :
							?>
							<a href="<?php echo get_the_permalink( $previous_sermon ); ?>" <?php echo $previous_attr; ?>><?php echo preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', '&laquo; ' . get_the_title( $previous_sermon ) ); ?></a>
						<?php else : ?>
							<div></div>
						<?php endif; ?>
						<?php if ( null !== $next_sermon ) : ?>
							<a href="<?php echo get_the_permalink( $next_sermon ); ?>" <?php echo $next_attr; ?>><?php echo preg_replace( '/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', get_the_title( $next_sermon ) . ' &raquo;' ); ?></a>
						<?php else : ?>
							<div></div>
						<?php endif; */?>


					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php
		if ( 'Divi' === get_option( 'template' ) && function_exists( 'et_get_option' ) ) {
			if ( ( comments_open() || get_comments_number() ) && 'on' == et_get_option( 'divi_show_postcomments', 'on' ) ) {
				comments_template( '', true );
			}
		}
		?>
	</div>
	<?php if ( ! \SermonManager::getOption( 'theme_compatibility' ) ) : ?>
</article>
</div>
<?php endif; ?>


