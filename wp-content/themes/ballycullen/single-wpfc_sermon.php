<?php // phpcs:ignore
/**
 * Template used for displaying single pages
 *
 * @package SM/Views
 */

get_header(); ?>


<div class="hero hero-inner-page hero-inner-page--sermons">
	<div class="hero-content hero-content-inner-page">
	<h1><?php echo (get_the_title()); ?></h1>
		
		<p class="lead mb-0">
			<?php echo SM_Dates::get(); ?>
			
		</p>

		<p class="lead">
	
			<?php the_terms( $post->ID, 'wpfc_preacher' ); ?>
			<?php /*the_terms( $post->ID, 'wpfc_sermon_series' ); */?>
		
		</p>
	
	
	</div>
	

<!-- 	<picture>
		<source srcset="https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1024x310.jpg" media="(min-width: 20em) and (max-width: 63.9375em)">
		<source srcset="https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1024x310.jpg" media="(min-width: 64em) and (max-width: 79.9375em)">
		<source srcset="https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1280x275.jpg" media="(min-width: 80em) and (max-width: 89.9375em)">
		<source srcset="https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1440x320.jpg" media="(min-width: 90em) and (max-width: 104.9375em)">
		<source srcset="https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1680x375.jpg" media="(min-width: 105em) and (max-width: 119.9375em)">
		<source srcset="https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1920x420.jpg" media="(min-width: 120em)">
		
		<img src="https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1280x275.jpg" class="hero-image">
		</picture> -->
		<div style="background-image: url('https://www.ballycullencc.com/wp-content/uploads/2019/10/banner-sermons-1680x375.jpg');background-size:cover; height: 50vh;"></div>
	
	

 

</div>

<main class="site-main" id="main" role="main">



<?php echo wpfc_get_partial( 'content-sermon-wrapper-start' ); ?>

<?php

echo apply_filters( 'single-wpfc_sermon-before-sermons', '' );

while ( have_posts() ) :
	global $post;
	the_post();

	if ( ! post_password_required( $post ) ) {
		wpfc_sermon_single_v2(); // You can edit the content of this function in `partials/content-sermon-single.php`.
	} else {
		echo get_the_password_form( $post );
	}

	// if ( comments_open() || get_comments_number() ) :
	// 	if ( ! apply_filters( 'single-wpfc_sermon-disable-comments', false ) ) {
	// 		comments_template();
	// 	}
	// endif;
endwhile;

echo apply_filters( 'single-wpfc_sermon-after-sermons', '' );

?>

<?php echo wpfc_get_partial( 'content-sermon-wrapper-end' ); ?>



</main>
<!-- #site-main end -->



<?php
get_footer();
