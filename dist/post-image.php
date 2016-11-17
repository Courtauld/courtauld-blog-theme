<?php if ( has_post_thumbnail() ) : ?>
    <figure class="image post__lead">
        <?php the_post_thumbnail('lead-image'); ?> <!-- This displays the featured image -->
        <?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
            <!-- This displays the caption below the featured image -->
            <figcaption class="image__caption"><?php echo $caption; ?></figcaption>
        <?php endif; ?>
    </figure>
<?php endif; ?>
