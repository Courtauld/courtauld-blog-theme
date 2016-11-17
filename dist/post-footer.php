<?php if ( has_category() || has_tag() ) : ?>
    <footer class="post__footer">
        <?php if ( has_category() ) : ?>
            <section class="row meta">
                <h2 class="col-xs-2 meta__title">Categories</h2>
                <div class="col-xs-10"><?php echo get_the_category_list(); ?></div>
            </section>
        <?php endif; ?>
        <?php if ( has_tag() ) : ?>
            <section class="row meta">
                <h2 class="col-xs-2 meta__title">Tags</h2>
                <?php echo get_the_tag_list('<ul class="col-xs-10 meta__list"><li class="meta__item">','</li><li class="meta__item">','</li></ul>'); ?>
            </section>
        <?php endif; ?>
    </footer>
<?php endif; ?>
