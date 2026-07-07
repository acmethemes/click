<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Click
 */

/**
 * click_action_after_content hook
 * @since Click 1.0.0
 *
 * @hooked click_after_content - 10
 */
do_action( 'click_action_after_content' );

/**
 * click_action_before_footer hook
 * @since Click 1.0.0
 *
 * @hooked null
 */
do_action( 'click_action_before_footer' );

/**
 * click_action_footer hook
 * @since Click 1.0.0
 *
 * @hooked click_footer - 10
 */
do_action( 'click_action_footer' );

/**
 * click_action_after_footer hook
 * @since Click 1.0.0
 *
 * @hooked null
 */
do_action( 'click_action_after_footer' );

/**
 * click_action_after hook
 * @since Click 1.0.0
 *
 * @hooked click_page_end - 10
 */
do_action( 'click_action_after' );
wp_footer();
?>
</body>
</html>