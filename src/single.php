<?php get_header();
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <article class="post">
                <header class="post__header">
                    <h1 class="post__title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link"><?php the_title(); ?></a>
                    </h1>
                    <?php get_template_part( 'post-meta' ); ?>
                </header>
                <section class="post__content">
                    <?php get_template_part( 'post-image' ); ?>
                    <?php the_content( 'Continue...' );	?>
                </section>
                <?php get_template_part( 'post-footer' ); ?>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <?php get_template_part( 'post-lost' ); ?>
    <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
