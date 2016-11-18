<?php

// THEME CUSTOMISERS
function courtauld_blogs_theme_customizer( $wp_customize ) {

    // Remove customizer sections
    $wp_customize->remove_section('nav');
    $wp_customize->remove_section('colors');

    // Remove customizer controls
    $wp_customize->remove_control('display_header_text');

    // Adds custom logo section to customizer
    // Use this rather than the inbuilt setting because this allows us to write custom controls and guides in.
    $wp_customize->add_section( 'courtauld_blogs_logo_section' , array(
    'title'       => __( 'Logo', 'courtauld-blogs' ),
    'priority'    => 10,
    'description' => '<span class="customize-control-title">Default Logo</span><img src="' . get_template_directory_uri() . '/img/courtauld-logo.jpg" alt="The Courtauld Institute of Art"/> <p>Upload a logo to replace the default Courtauld Institute logo.</p><p>Please use PNG images, as these will not blur.</p>',
) );
    $wp_customize->add_setting(
        'courtauld_blogs_logo',
        array(
            'default'       => get_template_directory_uri() . '/img/courtauld-logo.jpg'
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'courtauld_blogs_logo', array(
        'label'    => __( 'Replacement Logo', 'courtauld-blogs' ),
        'section'  => 'courtauld_blogs_logo_section',
        'settings' => 'courtauld_blogs_logo',
) ) );

}
add_action( 'customize_register', 'courtauld_blogs_theme_customizer' );

// Allow custom Header image modified in the WordPress customiser
// Use this rather than the custom control as the customizer provides a lot of good options.
$defaults = array(
    'default-image'          => get_template_directory_uri() . '/img/header.jpg',
    'random-default'         => false,
    'width'                  => 1500,
    'height'                 => 240,
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => '#263744',
    'header-text'            => true,
    'uploads'                => true,
);
add_theme_support( 'custom-header', $defaults );

/* Allow WordPress to use HTML elements */
add_theme_support( 'html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption'
) );

// Adds post thumbnails option and defines this as 200px by 200px and hard crops to centre.
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 200, 200, array( 'center', 'center') ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    // add_image_size( 'lead-image', 700, 9999 ); //300 pixels wide (and unlimited height)
}

// Register menus for the theme
// A number of menus are used in this theme
// If I were to rewrite this I would put many of these as options in the WordPress Customizer.
function register_courtauld_menus() {
  register_nav_menus(
    array(
        'header-menu' => __( 'Header Menu' ), // The Header Menu is typically used for the site navigation.
        'footer-menu' => __( 'Footer Menu' ), // The Footer Menu is typically used to allow
        'smallprint-menu' => __( 'Small Print Menu' ) // The Small Print Menu
    )
  );
}
add_action( 'init', 'register_courtauld_menus' );

// Register sidebar and widgetised area.
function courtauld_widgets_init() {
	register_sidebar( array(
		'name'          => 'Main Sidebar',
		'id'            => 'sidebar-main',
        'description'   => 'The main sidebar appears on the right on each page except the front page template',
		'before_widget' => '<section class="widget col-xs-12 col-sm-6 col-md-12">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>'
	)
    );
}
add_action( 'widgets_init', 'courtauld_widgets_init' );

// CUSTOM COLUMNS

// Remove tags column from pages view
function custom_pages_columns( $columns ) {
  unset(
    $columns['tags']
  );
  return $columns;
}
add_filter( 'manage_pages_columns', 'custom_pages_columns' );

// remove columns for posts and attachments
function custom_post_columns( $columns ) {
        unset(
            $columns['comments'],
            $columns['author']
        );
    return $columns;
  }
add_filter( 'manage_media_columns', 'custom_post_columns', 10, 2 );

// Adds column for Featured Images AKA Post Thumbnails
add_image_size( 'admin-list-thumb', 80, 80, false );

// Add featured thumbnail to admin post columns.
// Redefine all columns to push Post thumbnail to the front.
function courtauld_add_thumbnail_columns( $columns ) {
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'featured_thumb' => 'Thumbnail',
        'title' => 'Title',
        'author' => 'Author',
        'categories' => 'Categories',
        'tags' => 'Tags',
        'date' => 'Date'
    );
    return $columns;
}
add_filter( 'manage_posts_columns' , 'courtauld_add_thumbnail_columns' );
add_filter( 'manage_pages_columns' , 'courtauld_add_thumbnail_columns' );
add_action( 'manage_posts_custom_column' , 'courtauld_add_thumbnail_columns_data', 10, 2 );

function courtauld_add_thumbnail_columns_data( $column, $post_id ) {
    switch ( $column ) {
    case 'featured_thumb':
        echo '<a href="' . get_edit_post_link() . '">';
        echo the_post_thumbnail( 'admin-list-thumb' );
        echo '</a>';
        break;
    }
}
add_action( 'manage_pages_custom_column' , 'courtauld_add_thumbnail_columns_data', 10, 2 );

// Corrects the CSS for the custom thumbnail column
function featured_thumbnail_css() {
  echo '<style>
    .column-featured_thumb {
    width:10%; /* This fixes the custom Featured Thumb column on the admin screen. */
}

    @media screen and (max-width: 782px) {
        .column-featured_thumb {
            display:none !important;
        }
    }
</style>';
}
add_action('admin_head', 'featured_thumbnail_css');

// Add extra social media links to profiles, and remove Yahoo, AOL, and XMPP
function modify_user_contact_methods( $user_contact ) {

	/* Add user contact methods */
	$user_contact['twitter'] = __( 'Twitter Username' );
    $user_contact['facebook'] = __( 'Facebook URL' );
    $user_contact['instagram'] = __( 'instagram Username' );
    $user_contact['pinterest'] = __( 'Pinterest Username' );

	/* Remove user contact methods */
	unset( $user_contact['aim'] );
	unset( $user_contact['jabber'] );
    unset( $user_contact['yim']);

	return $user_contact;
}
add_filter( 'user_contactmethods', 'modify_user_contact_methods' );

// Put a caption beneath the featured image if it has one!
function courtauld_the_post_thumbnail_caption() {
 global $post;

 $thumbnail_id    = get_post_thumbnail_id($post->ID);
 $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
   return '<p class="wp-caption-text">'.$thumbnail_image[0]->post_excerpt.'</p>';
  } else {
    return;
  }
}

// Make the Yoast SEO box move to the bottom.
add_filter( 'wpseo_metabox_prio', function() { return 'low';});

//Change Excerpt Read More
function new_excerpt_more( $more ) {
	return '<a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read the full post here', 'your-text-domain' ) . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Add Categories to Pages
function add_taxonomies_to_pages() {
 register_taxonomy_for_object_type( 'category', 'page' );
 }
add_action( 'init', 'add_taxonomies_to_pages' );

function tags_categories_support_query($wp_query) {
  if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
}

// Add Categories for Attachements
function add_categories_for_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'add_categories_for_attachments' );
?>
