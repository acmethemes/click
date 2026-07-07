<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since Click 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('click_file_directory') ){

    function click_file_directory( $file_path ){
    	return apply_filters('click_file_directory', trailingslashit( get_template_directory() ) . $file_path );
    }
}

/**
 * Check empty or null
 *
 * @since  Click 1.0.0
 *
 * @param string $str, string
 * @return boolean
 *
 */
if( !function_exists('click_is_null_or_empty') ){
	function click_is_null_or_empty( $str ){
		return ( !isset($str) || trim($str)==='' );
	}
}

/*
* file for customizer theme options
*/
require_once click_file_directory('acmethemes/customizer/customizer.php');

/*
* file for additional functions files
*/
require_once click_file_directory('acmethemes/functions.php');

/*
* files for hooks
*/
require_once click_file_directory('acmethemes/hooks/slider-selection.php');

require_once click_file_directory('acmethemes/hooks/header.php');

require_once click_file_directory('acmethemes/hooks/social-links.php');

require_once click_file_directory('acmethemes/hooks/dynamic-css.php');

require_once click_file_directory('acmethemes/hooks/masonry.php');

require_once click_file_directory('acmethemes/hooks/footer.php');

require_once click_file_directory('acmethemes/hooks/comment-forms.php');

require_once click_file_directory('acmethemes/hooks/excerpts.php');

require_once click_file_directory('acmethemes/hooks/related-posts.php');

require_once click_file_directory('acmethemes/hooks/navigation.php');

/*
* file for sidebar and widgets
*/
require_once click_file_directory('acmethemes/sidebar-widget/acme-author.php');

require_once click_file_directory('acmethemes/sidebar-widget/sidebar.php');

/*
* file for core functions imported from functions.php while downloading Underscores
*/
require_once click_file_directory('acmethemes/core.php');
require_once click_file_directory('acmethemes/gutenberg/gutenberg-init.php');

/**
 * Implement Custom Metaboxes
 */
require_once click_file_directory('acmethemes/metabox/metabox.php');

/*themes info*/
add_action('init', function() {
    require_once click_file_directory('acmethemes/at-theme-info/class-at-theme-info.php');
});