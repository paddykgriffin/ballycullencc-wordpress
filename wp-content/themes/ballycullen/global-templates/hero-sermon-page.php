<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'featured-large' );?>

<div class="hero hero-sermon-page">
    <div class="hero-content hero-content-sermon-page">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </div>
    <?php if( wp_is_mobile()) {  ?>
        <?php the_post_thumbnail('sm'); ?>
    <img src="<?php echo $thumb['0'];?>" />

    <?php } else { ?>
        <img src="<?php echo $thumb['0'];?>" />
    <?php } ?>

</div>