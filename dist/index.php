<?php get_header(); ?>
<?php if ( is_archive() ) { ?>
<header>
    <h1>Archive: '<?php single_term_title(); ?>'</h1>
</header>
<?php }; ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'post-excerpt' ); ?>
    <?php endwhile; ?>
        <?php get_template_part( 'pagination' ); ?>
    <?php else : ?>
	   <?php get_template_part( 'post-lost' ); ?>
    <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
