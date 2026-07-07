<?php
/**
 * Excerpt length 90 return
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('click_alter_excerpt') ) :
    function click_alter_excerpt( $excerpt_number ) {
		if( is_admin() ){
			return $excerpt_number;
		}
        return 90;
    }
endif;
add_filter('excerpt_length', 'click_alter_excerpt');

/**
 * Add '' for more view
 *
 * @since click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('click_excerpt_more') ) :
    function click_excerpt_more($more) {
		if( is_admin() ){
			return $more;
		}
        return ' ';
    }
endif;
add_filter('excerpt_more', 'click_excerpt_more');