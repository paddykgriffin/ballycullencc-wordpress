<?php
/**
 * Partial template for staff
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$container = get_theme_mod( 'understrap_container_type' );
?>




<div class="<?php echo esc_attr( $container ); ?> ">
    <div class="row justify-content-center my-5">
        <div class="col-12 col-md-10 col-lg-8 text-center">

        <h2 class="section-title"><?php the_field('elder_main_title' , 'option'); ?></h2>
       
        </div>
    </div>


    <?php if( have_rows('elder_team_member', 'option') ): ?>

	<div class="row justify-content-center">
        <div class="col">
        <div class="row">

	<?php while( have_rows('elder_team_member', 'option') ): the_row(); 

		// vars
        $elderFirstName = get_sub_field('elder_first_name', 'option');
        $elderLastName = get_sub_field('elder_last_name', 'option');
		$staffTitle = get_sub_field('elder_job_title', 'option');
		$image = get_sub_field('elder_image', 'option');

		?>

		<div class="col-12 col-md-3 text-center mb-5">
			<img class="mb-3" src="<?php echo $image['sizes']['tile-md']; ?>" alt="<?php echo $image['alt'] ?>" />
            <h4 class="mb-0"><?php echo $elderFirstName; ?></h4>
            <h4><?php echo $elderLastName; ?></h4>
            <p><?php echo $staffTitle; ?></p> 
        </div>

	<?php endwhile; ?>

</div>
</div>
</div>

<?php endif; ?>


</div>