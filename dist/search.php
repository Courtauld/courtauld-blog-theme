<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
	foreach($query_args as $key => $string) {
		$query_split = explode("=", $string);
		$search_query[$query_split[0]] = urldecode($query_split[1]);
	} // foreach
} //if

$search = new WP_Query($search_query);
?>

<?php get_header(); ?>
<header>
    <h1>
    <?php echo $wp_query->found_posts; ?>
            <?php _e( 'Search results found for', 'locale' ); ?> '<?php the_search_query(); ?>'
    </h1>
</header>

<?php
global $wp_query;
$total_results = $wp_query->found_posts;
?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'post-excerpt' ); ?>
    <?php endwhile; ?>
        <?php get_template_part( 'pagination' ); ?>
    <?php else : ?>
            <p>Why not try searching for something else, or take a look at the site menu.</p>
    <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
