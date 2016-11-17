                </div> <!-- close page wrapper -->
            <footer class="footer">
                <div class="row">
                    <address class="col-xs-offset-1 col-xs-10 col-sm-2 address">
                            <h1 class="_small address__title"><a href="http://courtauld.ac.uk/">The Courtauld Institute Of Art</a></h1>
                            <p class="_small address__line">Somerset House<br />
                            Strand<br />
                            London WC2R 0RN</p>
                            <p class="_small address__contact">+44 (0) 20 7848 2777</p>
                    </address>
                    <nav class="col-xs-offset-1 col-xs-10 col-sm-8 footer__menu">
                        <?php if ( has_nav_menu( 'footer-menu' ) ) {
                            $defaults = array(
                                'theme_location'  => 'footer-menu',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'row footer__menu-ul',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => false,
                                'depth'           => 0,
                            );
                            wp_nav_menu( $defaults );
                        } ?>
                    </nav>
                </div>
                <section class="row center-xs start-sm partners">
                    <a href="http://www.london.ac.uk/" class="col-xs-4 col-sm-offset-10 col-sm-1 .partner__link">
                        <img src="<?php echo get_template_directory_uri() . '/img/uni-london-logo.png';?>" alt="University of London" class="partner__logo">
                    </a>
                </section>
                <small class="row center-xs start-md">
                    <span class="col-xs-10 col-md-offset-1 col-md-7 copyright">&copy; Copyright <?php echo date('Y'); ?> The Courtauld Institute Of Art, Somerset House, Strand, London WC2R 0RN, UK</span>

                    <?php if ( has_nav_menu( 'smallprint-menu' ) ) {
                        $defaults = array(
                                'theme_location'  => 'smallprint-menu',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'end-md col-md-3 policies policies__list',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => false,
                                'depth'           => 1,
                            );
                            wp_nav_menu( $defaults );
                        } ?>
                 </small>
            </footer>
        </div> <!-- close site wrapper -->
        <!-- Below tag allows plugins and functions to embed content within the footer -->
        <?php wp_footer(); ?>
        <!-- Place my scripts after to allow these to correct any errors in any poorly coded plugin ones  -->
        <script src="<?php echo get_template_directory_uri() . '/js/off-canvas.js';?>"></script>
        <!-- Reframe.js makes container elements responsive -->
        <script src="<?php echo get_template_directory_uri() . '/vendor/reframe.js/dist/reframe.min.js' ?>"></script>
        <script>
            // Reframe matching elements
            reframe(document.querySelectorAll('.wp-video'))
        </script>
	</body>
</html>
