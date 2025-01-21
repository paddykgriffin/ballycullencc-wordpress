<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>


<div class="bcc-custom-sidebar">

	<h3 class="mb-0">
		<?php echo wp_nav_menu_title('sidebarRightMenu'); ?>
		<button class="btn footer-toggler d-lg-none" data-toggle="collapse" href="#sidebarRightMenu">
			<i class="far fa-chevron-down"></i>
		</button>
	</h3>


	<p class="d-none d-lg-block"><small>Explore our various areas</small></p>


	<?php wp_nav_menu(
		array(
			'theme_location'  => 'sidebarRightMenu',
			'container_class' => 'bcc-custom-sidebar-menu',
			'container_id'    => 'sidebarRightMenu',
			'menu_class'      => 'collapse d-lg-block',
			'fallback_cb'     => '',
			'menu_id'         => 'sidebarRightMenu',
			'depth'           => 2,
			'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
		)
	); ?>


</div>
<!-- .bcc-custom-sidebarmenu end -->
