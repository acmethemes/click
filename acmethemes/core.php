<?php
/*It is underscores functions.php file and its modification*/
if ( ! function_exists( 'click_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function click_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Click, use a find and replace
         * to change 'click' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'click', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
        * Enable support for custom logo.
        *
        *  @since Click 1.0.0
         */
        add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width' => true
        ) );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 330, 195, true );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary Menu', 'click' ),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'click_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
    }
endif; // click_setup
add_action( 'after_setup_theme', 'click_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function click_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'click_content_width', 640 );
}
add_action( 'after_setup_theme', 'click_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function click_scripts() {
	global $click_customizer_all_values;
    /*google font*/
    wp_enqueue_style( 'click-googleapis', '//fonts.googleapis.com/css?family=PT+Sans:400,700|Josefin+Sans:700,600', array(), '1.0.1' );

    /*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/library/Font-Awesome/css/font-awesome.min.css', array(), '4.7.0' );
     wp_style_add_data( 'font-awesome', 'rtl', 'replace' );

    /*custom-css*/
    wp_enqueue_style( 'click-style', get_stylesheet_uri() );
    wp_style_add_data( 'click-style', 'rtl', 'replace' );

    /*jquery start*/
    /*html5shiv*/
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/assets/library/html5shiv/html5shiv.min.js', array('jquery'), '3.7.3', false);

    /*respond js*/
    wp_enqueue_script('respond', get_template_directory_uri() . '/assets/library/respond/respond.min.js', array('jquery'), '1.1.2', false);


    wp_enqueue_script('slicknav', get_template_directory_uri() . '/assets/library/SlickNav/jquery.slicknav.min.js', array('jquery'), '1.0.7', 1);

    /*masonry js*/
    wp_enqueue_script( 'masonry' );

    /*tooltipster*/
    wp_enqueue_style( 'tooltipster', get_template_directory_uri() . '/assets/library/tooltipster/css/tooltipster.bundle.min.css', array(), '1.3.3' );
    wp_style_add_data( 'tooltipster', 'rtl', 'replace' );
    wp_enqueue_script('tooltipster', get_template_directory_uri() . '/assets/library/tooltipster/js/tooltipster.bundle.min.js', array('jquery'), '1.0.7', 1);

    if( is_front_page() ){
        /*supersized library*/
        wp_enqueue_style( 'supersized', get_template_directory_uri() . '/assets/library/supersized/css/supersized.css', array(), '3.2.7' );
        wp_style_add_data( 'supersized', 'rtl', 'replace' );
        wp_enqueue_style( 'supersized-shutter', get_template_directory_uri() . '/assets/library/supersized/css/supersized-shutter.css', array(), '3.2.7' );
        wp_style_add_data( 'supersized-shutter', 'rtl', 'replace' );

        wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/assets/library/supersized/js/jquery.easing.min.js', array(), '3.2.7' );
        wp_enqueue_script( 'supersized', get_template_directory_uri() . '/assets/library/supersized/js/supersized.3.2.7.js', array(), '3.2.7' );
        wp_enqueue_script( 'supersized-shutter', get_template_directory_uri() . '/assets/library/supersized/js/supersized-shutter.js', array(), '3.2.7' );
        wp_localize_script( 'supersized-shutter', 'click_supersized', array(
            'image_path' => get_template_directory_uri().'/assets/library/supersized/img/'
        ));
    }
    /*custom-js*/
    wp_enqueue_script('click-custom', get_template_directory_uri() . '/assets/js/click-custom.js', array('jquery'), '1.0.1', 1);
    global $wp_query;
    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    $max_num_pages = $wp_query->max_num_pages;
	$click_ajax_show_more = $click_customizer_all_values['click-ajax-show-more'];
	$click_ajax_no_more = $click_customizer_all_values['click-ajax-no-more'];

	/*slider json*/
	$click_feature_cat = $click_customizer_all_values['click-feature-cat'];
	$click_featured_slider_number = $click_customizer_all_values['click-featured-slider-number'];
	$sticky = get_option( 'sticky_posts' );

	$click_cat_post_args = array(
		'cat'                 => $click_feature_cat,
		'posts_per_page'      => $click_featured_slider_number,
		'no_found_rows'       => true,
		'post_status'         => 'publish',
		'ignore_sticky_posts' => true,
		'post__not_in' => $sticky
	);
	$slider_query = new WP_Query( $click_cat_post_args );
	$slides_json_data = array();
	if ( $slider_query->have_posts() ):
		while( $slider_query->have_posts() ):$slider_query->the_post();
			if (has_post_thumbnail()) {
				$image_url_full = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$image_url_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');
			} else {
				$image_url_full[0] = $image_url_thumb[0] = get_template_directory_uri() . '/assets/img/no-image-690-400.jpg';
			}
			$slides_json_data[]= array(
				'image' => esc_url( $image_url_full[0]),
				'title' => the_title_attribute( 'echo=0' ),
				'thumb' => esc_url( $image_url_thumb[0]),
				'url' => esc_url( get_the_permalink() ),
			);
		endwhile;
	else:
		$slides_json_data[]= array(
			'image' => esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ),
			'title' => esc_attr__('Welcome to Click','click'),
			'thumb' => esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ),
			'url' => '#',
		);
		$slides_json_data[]= array(
			'image' => esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ),
			'title' => esc_attr__('Full Screen Photography Theme','click'),
			'thumb' => esc_url( get_template_directory_uri()."/assets/img/no-image-690-400.jpg" ),
			'url' => '#',
		);
	endif;
	/*slider json end*/

    wp_localize_script( 'click-custom', 'click_ajax', array(
        'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
        'paged'     => absint( $paged ),
        'max_num_pages'      => absint( $max_num_pages ),
        'next_posts'      => next_posts( $max_num_pages, false ),
        'show_more'      => esc_html( $click_ajax_show_more ),
        'no_more_posts'  => esc_html( $click_ajax_no_more ),
        'slides'  => json_encode( $slides_json_data ),
        'image_path'  => get_template_directory_uri().'/assets/supersized/img/'
    ));

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'click_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function click_admin_scripts( $hook ) {
	$screen = get_current_screen();

    if ( 'widgets.php' == $hook || $screen->parent_base == 'edit') {
        wp_enqueue_media();
        wp_enqueue_script( 'click-widgets-script', get_template_directory_uri() . '/assets/js/acme-widget.js', array( 'jquery' ), '1.0.0' );
    }
}
add_action( 'admin_enqueue_scripts', 'click_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require_once click_file_directory('acmethemes/core/template-tags.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require_once click_file_directory('acmethemes/core/extras.php');