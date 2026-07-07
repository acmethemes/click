<?php
/**
 * Header logo/text display options alternative
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return array $click_header_id_display_opt
 *
 */
if ( !function_exists('click_header_id_display_opt') ) :
    function click_header_id_display_opt() {
        $click_header_id_display_opt =  array(
            'logo-only'         => esc_html__( 'Logo Only ( First Select Logo Above )', 'click' ),
            'title-only'        => esc_html__( 'Site Title Only', 'click' ),
            'title-and-tagline' => esc_html__( 'Site Title and Tagline', 'click' ),
            'disable'           => esc_html__( 'Disable', 'click' )
        );
        return apply_filters( 'click_header_id_display_opt', $click_header_id_display_opt );
    }
endif;

/**
 * Header Site identity and ads display options
 *
 * @since click 1.1.0
 *
 * @param null
 * @return array $click_header_logo_menu_display_position
 *
 */
if ( !function_exists('click_header_logo_menu_display_position') ) :
	function click_header_logo_menu_display_position() {
		$click_header_logo_menu_display_position =  array(
			'left' => __( 'Left', 'click' ),
			'right' => __( 'Right', 'click' ),
			'center' => __( 'Center', 'click' )
		);
		return apply_filters( 'click_header_logo_menu_display_position', $click_header_logo_menu_display_position );
	}
endif;

/**
 * Global layout options
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return array $click_default_layout
 *
 */
if ( !function_exists('click_default_layout') ) :
    function click_default_layout() {
        $click_default_layout =  array(
            'fullwidth' => esc_html__( 'Fullwidth', 'click' ),
            'boxed'     => esc_html__( 'Boxed', 'click' )
        );
        return apply_filters( 'click_default_layout', $click_default_layout );
    }
endif;

/**
 * Sidebar layout options
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return array $click_sidebar_layout
 *
 */
if ( !function_exists('click_sidebar_layout') ) :
    function click_sidebar_layout() {
        $click_sidebar_layout =  array(
            'right-sidebar' => esc_html__( 'Right Sidebar', 'click' ),
            'left-sidebar'  => esc_html__( 'Left Sidebar' , 'click' ),
            'no-sidebar'    => esc_html__( 'No Sidebar', 'click' )
        );
        return apply_filters( 'click_sidebar_layout', $click_sidebar_layout );
    }
endif;

/**
 * Pagination Options
 *
 * @since click 1.0.0
 *
 * @param null
 * @return array click_pagination_options
 *
 */
if ( !function_exists('click_pagination_options') ) :
    function click_pagination_options() {
        $click_pagination_options =  array(
            'default'  => esc_html__( 'Default', 'click' ),
            'numeric'  => esc_html__( 'Ajax Loading', 'click' )
        );
        return apply_filters( 'click_pagination_options', $click_pagination_options );
    }
endif;

/**
 * Related Post Display From Options
 *
 * @since Click 1.1.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('click_related_post_display_from') ) :
	function click_related_post_display_from() {
		$click_related_post_display_from =  array(
			'cat'  => __( 'Related Posts From Categories', 'click' ),
			'tag'  => __( 'Related Posts From Tags', 'click' )
		);
		return apply_filters( 'click_related_post_display_from', $click_related_post_display_from );
	}
endif;

/**
 * 
 * Reset post
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('click_reset_options') ) :
    function click_reset_options() {
        $click_reset_options =  array(
            '0'                    => esc_html__( 'Do Not Reset', 'click' ),
            'reset-color-options'  => esc_html__( 'Reset Colors Options', 'click' ),
            'reset-all'            => esc_html__( 'Reset All', 'click' )
        );
        return apply_filters( 'click_reset_options', $click_reset_options );
    }
endif;

/**
 * Blog layout options
 *
 * @since Click 1.1.0
 *
 * @param null
 * @return array $click_get_image_sizes_options
 *
 */
if ( !function_exists('click_get_image_sizes_options') ) :
	function click_get_image_sizes_options( $add_disable = false ) {
		global $_wp_additional_image_sizes;
		$choices = array();
		if ( true == $add_disable ) {
			$choices['disable'] = __( 'No Image', 'click' );
		}
		foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
			$choices[ $_size ] = $_size . ' ('. get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
		}
		$choices['full'] = __( 'full (original)', 'click' );
		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {

			foreach ($_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key . ' ('. $size['width'] . 'x' . $size['height'] . ')';
			}
		}
		return apply_filters( 'click_get_image_sizes_options', $choices );
	}
endif;

/**
 *  Default Theme layout options
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return array $click_theme_layout
 *
 */
if ( !function_exists('click_get_default_theme_options') ) :
    function click_get_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'click-feature-cat'          => 0,
            'click-featured-slider-number'  => 2,
            'click-enable-feature'       => '',
            'click-enable-sticky'       => 1,
            'click-enable-toggle-menu'       => 1,
            'click-front-header-logo-ads-display-position'       => 'center',

            /*header options*/
            'click-header-id-display-opt'=> 'title-and-tagline',
            'click-facebook-url'         => '',
            'click-twitter-url'          => '',
            'click-instagram-url'        => '',
            'click-youtube-url'          => '',
            'click-enable-social'        => '',

            /*footer options*/
            'click-footer-copyright'     => sprintf( esc_html__( '&copy; All Right Reserved %s', 'click' ),date('Y') ),

            /*layout/design options*/
            'click-enable-full-slider-only'=> '',
            'click-default-layout'       => 'fullwidth',

            'click-sidebar-layout'  => 'right-sidebar',
            'click-front-page-sidebar-layout'  => 'no-sidebar',
            'click-archive-sidebar-layout'  => 'right-sidebar',

            'click-blog-archive-image-size' => 'large',
            'click-blog-archive-hover-image-size' => 'large',

            'click-pagination-option'    => 'default',
            'click-ajax-show-more'    => __( 'Show More', 'click' ),
            'click-ajax-no-more'    => __( 'No More', 'click' ),

            'click-primary-color'        => '#F78E3F',

            /*single related post options*/
            'click-single-image-size'  => 'full',
            'click-show-related'         => 1,
            'click-related-title'  => __( 'Related posts', 'click' ),
            'click-related-post-display-from'  => 'cat',

            /*theme options*/
            'click-search-placholder'    => esc_html__( 'Search', 'click' ),
            'click-show-breadcrumb'      => '',

            /*Reset*/
            'click-reset-options'        => '0'
        );
        return apply_filters( 'click_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return array click_theme_options
 *
 */
if ( !function_exists('click_get_theme_options') ) :

    function click_get_theme_options() {
        $click_default_theme_options = click_get_default_theme_options();
        $click_get_theme_options = get_theme_mod( 'click_theme_options');
        if( is_array( $click_get_theme_options ) ){
            return array_merge( $click_default_theme_options ,$click_get_theme_options );
        }
        else{
            return $click_default_theme_options;
        }
    }
endif;