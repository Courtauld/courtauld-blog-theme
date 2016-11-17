<?php

$current_page_id = get_the_ID();

// WP_Query arguments
$args = array (
	'post_parent'            => $current_page_id,
	'post_type'              => array( 'page' ),
    'orderby'               => 'menu_order',
);

// The Query
$query = new WP_Query( $args );

if ( $query->have_posts() ) : ?>
    <aside class="content-box">
        <header class="content-box__header">
            <h1>See more</h1>
        </header>
        <ul class="content-box__list row">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li class="content-box__item col-xs-12 col-md-6">
                    <div class="content-box__wrapper">
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <figure class="content-box__image">
                                    <?php the_post_thumbnail('lead-image'); ?> <!-- This displays the featured image -->
                                </figure>
                            <?php endif; ?>
                                <div class="content-box__text">
                                    <h2 class="content-box__title">
                                        <?php the_title(); ?>
                                    </h2>
                            </div>
                        </a>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </aside>
<?php endif; wp_reset_query(); ?>

