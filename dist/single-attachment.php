<?php get_header(); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php $photographer = get_post_meta($post->ID, 'be_photographer_name', true); ?>
        <?php $photographerurl = get_post_meta($post->ID, 'be_photographer_url', true); ?>
        <article class="post">
            <header class="post__header">
                <h1 class="post__title">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="post__link"><?php the_title(); ?></a>
                </h1>
                <?php get_template_part( 'post-meta' ); ?>
            </header>
            <section class="post__content">
                <figure>
                    <?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
                        <h1><a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>"><img src="<?php echo $att_image[0];?>" width="<?php echo $att_image[1];?>" height="<?php echo $att_image[2];?>"  alt="<?php $post->post_excerpt; ?>" /></a></p>
                    <?php else : ?>
                        <a href="<?php echo wp_get_attachment_url($post->ID) ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>"><?php echo basename($post->guid) ?></a>
                    <?php endif; ?>
                </figure>
                <div>
                    <?php echo $photographer; ?>
                    <a href="<?php echo $photographerurl ?>"><?php echo $photographerurl ?></a>
                </div>
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
