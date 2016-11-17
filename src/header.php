<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title></title>
        <base href="<?php bloginfo('url'); ?>">
        <meta name="description" content="<?php bloginfo('description'); ?>">

        <meta name="google-site-verification" content="">

        <!-- Scripts -->
        <!--[if lt IE 9]><script src="<?php echo get_template_directory_uri() . '/vendor/html5shiv/dist/html5shiv.min.js'?>"></script><![endif]-->
        <script src="<?php echo get_template_directory_uri() . '/vendor/jquery/dist/jquery.min.js' ?>"></script>

        <!-- Enqueue FLexboxgrid styles -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/vendor/flexboxgrid/dist/flexboxgrid.min.css' ?>" />
        <!-- External CSS -->
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>"/>

        <link href="http://gmpg.org/xfn/11" rel="profile" />
        <link href="<?php bloginfo( 'pingback_url' ); ?>" rel="pingback" />

        <?php wp_head(); // This function is necessary for many plugins, do not remove. ?>
	</head>
	<body>
		<header class="header">
            <div class="row">
                <div class="col-xs-offset-1">
                    <?php if ( get_theme_mod( 'courtauld_blogs_logo' ) ) : ?>
                        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                            <img src='<?php echo esc_url( get_theme_mod( 'courtauld_blogs_logo' ) ); ?>' class="header__logo" alt="<?php bloginfo('title'); ?>" title="<?php bloginfo('title'); ?>">
                        </a>
                    <?php else : ?>
                        <h1 class='header__title'>
                            <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                                The Courtauld Institute of Art
                            </a>
                        </h1>
                    <?php endif; ?>
                </div>
                <a href="#" class="header__menu-link" <?php if ( is_admin_bar_showing() ) echo 'style="top:initial;"'; ?> >Menu</a>
            </div>
            <?php
                if ( has_nav_menu('header-menu') ) {
                    $defaults = array(
                        'theme_location'  => 'header-menu',
                        'container'       => 'nav',
                        'container_class' => 'header__menu',
                        'container_id'    => '',
                        'menu_class'      => 'header__menu-ul',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => false,
                        'depth'           => 1,
                    );
                    wp_nav_menu( $defaults );
            } ?>
        </header>
        <div class="site-wrapper">
            <div class="row middle-xs banner" style="color:#<?php header_textcolor(); ?>; background-image: url(<?php header_image(); ?>);">
                <div class="col-xs-offset-1 col-xs-10 col-md-6">
                    <h1 class="banner__title"><a href="<?php bloginfo('url'); ?>" class="_no-underline"><?php bloginfo('name'); ?></a></h1>
                    <p class="banner__desc"><?php bloginfo( 'description' ); ?></p>
                </div>
            </div>
            <div class="row page-wrapper">
                <main class="col-xs-offset-1 col-xs-10 col-md-7 main">
