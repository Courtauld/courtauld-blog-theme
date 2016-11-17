<nav class="row pagination">
    <?php if(get_previous_posts_link()) { ?>
        <div id="newer-page" class="button pagination__button--newer col-xs start-xs">
            <?php previous_posts_link( 'Newer' ); // Display a link to  newer posts, if there are any, with the text 'newer' ?>
        </div>
    <?php }; ?>
    <?php if(get_next_posts_link()) { ?>
        <div id="older-page" class="button button__older col-xs end-xs">
            <?php next_posts_link( 'Older' ); // Display a link to  older posts, if there are any, with the text 'older' ?>
        </div>
    <?php }; ?>
</nav>
