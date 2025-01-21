<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>



<footer id="site-footer">





	<div class="site-footer-1 py-3 py-xl-5" id="site-footer-1">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row justify-content-center">

				<div class="col-12 col-xl-4 text-center text-md-left mb-4 mb-xl-0">

					<?php get_template_part( 'sidebar-templates/sidebar', 'mailchimp' ); ?>

				</div>
				<!--col end -->

				<div class="col col-xl-1 d-none d-xl-block">

				</div>
				<!--col end -->

				<div class="w-100 d-lg-none"></div>

				<div class="col-lg-6 col-xl-3 text-left">
					<h4 class="footer-menu-title"><?php echo wp_nav_menu_title('footer1'); ?>
						<button class="btn footer-toggler d-lg-none" data-toggle="collapse" href="#footer-menu-1">
							<!-- <span></span> -->
							<i class="far fa-chevron-down"></i>
						</button>
					</h4>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'footer1',
							//'container_class' => 'col-md-3',
							'container_id'    => 'footer1',
							'menu_class'      => 'collapse d-lg-block',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu-1',
							'depth'           => -1,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
				<!--col end -->

				<div class="w-100 d-lg-none"></div>

				<div class="col-lg-6 col-xl-4 last text-left">
				<h4 class="footer-menu-title"><?php echo wp_nav_menu_title('footer2'); ?>
					<button class="btn footer-toggler d-lg-none" data-toggle="collapse" href="#footer-menu-2">
						<!-- <span></span> -->
						<i class="far fa-chevron-down"></i>
					</button>
				</h4>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'footer2',
							//'container_class' => 'col-md-3',
							'container_id'    => 'footer2',
							'menu_class'      => 'collapse d-lg-flex row no-gutters',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu-2',
							'depth'           => -1,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							
						)
					); ?>
				</div>
				<!--col end -->

				
				<div class="col-lg-6 col-xl-2 text-left last d-none">
				<h4 class="footer-menu-title"><?php echo wp_nav_menu_title('footer3'); ?>
					<button class="btn footer-toggler d-lg-none" data-toggle="collapse" href="#footer-menu-3">
						<!-- <span></span> -->
						<i class="far fa-chevron-down"></i>
					</button>
				</h4>
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'footer3',
							//'container_class' => 'col-md-3',
							'container_id'    => 'footer3',
							'menu_class'      => 'collapse d-lg-block',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu-3',
							'depth'           => -1,
							'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
						)
					); ?>
				</div>
				<!--col end -->

				</div><!-- row end -->

		</div><!-- container end -->

	</div>


	<div class="site-footer-2 text-center text-lg-left" id="site-footer-2">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row justify-content-between pb-3">
				<div class="col-xl-3 mb-4 mb-xl-0">
					<div class="site-info">
						<p>&copy; <?php echo date("Y"); ?> <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> </p>
					</div>
					<!-- .site-info -->
				</div>
				<!--col end -->
			</div>
			<!-- row end -->

			<div class="row justify-content-between">
				<div class="col-12 col-lg-4 mb-5 mb-lg-0">


				<?php 

					$link = get_field('footer_link', 'option');

					if( $link ): ?>
						
						<a class="button" href="<?php echo $link; ?>" target="_blank">
					
						<?php 

							$image = get_field('footer_logo', 'option');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>

						</a>

					<?php endif; ?>

				</div>
				<!--col end -->
				<div class="col-12 col-lg-6 col-xl-5 text-center text-lg-right ">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'footerPrivacy',
							'container'       => 'div',
							'container_id'    => 'footerPrivacy',
							'menu_class'      => '',
							'fallback_cb'     => '',
							'menu_id'         => 'footer-menu-privacy',
							'depth'           => -1,
							'items_wrap' => '%3$s', // removes ul
							'walker'          => new Description_Walker,
						)
					); ?>
					<div class="site-credit">
						<p><?php the_field('credit_text', 'option'); ?> <a href="<?php the_field('credit_url', 'option'); ?>" target="_blank"><?php the_field('credit_author', 'option'); ?></a></p>
					</div>
					<!-- .site-info -->
				</div>
				<!--col end -->
			</div><!-- row end -->
		</div><!-- container end -->
	</div>
	<!-- #site-footer-2 end -->

</footer>
<!-- #site-footer end -->


</div><!-- #page we need this extra closing tag here -->


<div id="donateBtn" class="donate-btn animated">

<a href="/donate" class="btn btn-green">Donate</a>

</div>

<?php wp_footer(); ?>

<script>
	new WOW().init();
	</script>


	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-153629363-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153629363-1');
</script>


			  

</body>

</html>

