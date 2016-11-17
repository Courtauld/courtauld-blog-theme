<?php get_header(); ?>
<!-- This sets the $curauth variable -->
    <?php
        $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    <article>
        <header>
            <?php
            $user_roles = $current_user->roles;
            $user_role = array_shift($user_roles);
            echo '<strong>Current User Role</strong>: ' . $user_role;
            ?>
            <h1>Contributor - <?php echo $curauth->display_name; ?></h1>
        </header>
        <section>
            <?php if ( has_post_thumbnail() ) : ?>
                <div>
                    <?php echo get_avatar( $curauth->id, 512); ?>
                </div>
            <?php endif; ?>
            <div>
                <!--<p><a href="http://twitter.com/<?php echo get_user_meta($curauth->id, 'twitter', true); ?>">Twitter</a></p>
                <p><a href="http://facebook.com/<?php echo $curauth->facebook; ?>">Facebook</a></p>
                <p><a href="http://instagram.com/<?php echo get_user_meta($curauth->id, 'instagram', true); ?>">Instagram</a></p>
                <p><a href="http://pinterest.com/<?php echo get_user_meta($curauth->id, 'pinterest', true); ?>">Pinterest</a></p>-->
            </div>
            <p><?php echo $curauth->user_description; ?></p>
        </section>
    </article>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'post-excerpt' ); ?>
    <?php endwhile; ?>
        <?php get_template_part( 'pagination' ); ?>
    <?php endif; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
