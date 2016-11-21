<?php
// WP_Query arguments
$args = array (
	'post_parent'			=> $post->ID,
	'post_type'			  => 'page',
	'orderby'				=> 'menu_order',
	'post_status' => 'publish'
);
// The Query
$query = new WP_Query( $args );

if ( $child_query->have_posts() ) : ?>
	<aside class="content-box">
		<header class="content-box__header">
			<h1>See more</h1>
		</header>
		<ul class="content-box__list row">
			<?php while ( $child_query->have_posts() ) : $child_query->the_post(); ?>
				<li class="content-box__item col-xs-12 col-md-6">
					<div class="content-box__wrapper">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<figure class="content-box__image">
									<?php the_post_thumbnail('large'); ?> <!-- This displays the featured image -->
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
<?php endif; wp_reset_postdata(); ?>
