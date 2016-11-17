<article class="post">
    <header class="post__header">
        <h1 class="post__title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link"><?php the_title(); ?></a>
        </h1>
        <?php get_template_part( 'post-meta' ); ?>
    </header>
    <section class="post__content">
        <?php get_template_part( 'post-image' ); ?>
        <?php the_excerpt( 'Continue...' );	?>
    </section>
    <?php get_template_part( 'post-footer' ); ?>
</article>
