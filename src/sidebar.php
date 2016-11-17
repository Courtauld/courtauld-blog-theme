<aside class="col-xs-offset-1 col-xs-10 col-md-2 sidebar">
    <section class="widget">
        <h2>Search</h2>
        <?php get_search_form(); ?>
    </section>
    <?php if ( is_active_sidebar( 'sidebar-main' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-main' ); ?>
    <?php else : ?>
        <section class="widget">
            <h2>Menu</h2>
            <?php wp_page_menu('sort_column=menu_order&depth=2&order=asc'); ?>
        </section>
    <?php endif; ?>
</aside>
