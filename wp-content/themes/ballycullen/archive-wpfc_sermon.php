<?php // phpcs:ignore
/**
 * Template used for displaying archive pages
 *
 * @package SM/Views
 */

get_header();



?>



<div class="hero hero-inner-page hero-inner-page--sermons">
	<div class="hero-content hero-content-inner-page">
		<h1>Sermons</h1>
		<a href="<?php echo get_site_url(); ?>/sundays/#sermons" class="btn btn-secondary">Subscribe to our podcast</a>
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

<?php
echo render_wpfc_sorting();?>

<?php echo wpfc_get_partial( 'content-sermon-wrapper-start' ); 



if ( have_posts() ) :

	echo apply_filters( 'archive-wpfc_sermon-before-sermons', '' );

	while ( have_posts() ) :
		the_post();
		wpfc_sermon_excerpt_v2(); // You can edit the content of this function in `partials/content-sermon-archive.php`.
	endwhile;

	echo apply_filters( 'archive-wpfc_sermon-after-sermons', '' );

	echo '</div><div class="row"><div class="col-12 pt-5 pb-5 mb-5 sm-pagination ast-pagination">';
	//sm_pagination();
	
	understrap_pagination(); 


	echo '</div></div>';
else :
	echo __( 'Sorry, but there aren\'t any posts matching your query.' );
endif;
?>

<?php echo wpfc_get_partial( 'content-sermon-wrapper-end' ); ?>



</main>
<!-- #site-main end -->

<?php
get_footer();
 