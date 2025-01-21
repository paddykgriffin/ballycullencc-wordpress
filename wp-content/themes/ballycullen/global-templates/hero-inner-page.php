<div class="hero hero-inner-page" >
    <div class="hero-content hero-content-inner-page">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </div>
    <?php echo bcc_post_thumbnail($post->ID, 'hero-image'); ?>
</div>