<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acme Themes
 * @subpackage Click
 */

/**
 * click_action_before_head hook
 * @since click 1.0.0
 *
 * @hooked click_set_global -  0
 * @hooked click_doctype -  10
 */
do_action( 'click_action_before_head' );?>
	<head>

		<?php
		/**
		 * click_action_before_wp_head hook
		 * @since click 1.0.0
		 *
		 * @hooked click_before_wp_head -  10
		 */
		do_action( 'click_action_before_wp_head' );

		wp_head();
		?>
	</head>
<body <?php body_class();?>>
<?php do_action( 'wp_body_open' ); ?>

<?php
/**
 * click_action_before hook
 * @since Click 1.0.0
 *
 * @hooked click_page_start - 10
 * @hooked click_page_start - 15
 */
do_action( 'click_action_before' );

/**
 * click_action_before_header hook
 * @since Click 1.0.0
 *
 * @hooked click_skip_to_content - 10
 */
do_action( 'click_action_before_header' );

/**
 * click_action_header hook
 * @since Click 1.0.0
 *
 * @hooked click_after_header - 10
 */
do_action( 'click_action_header' );

/**
 * click_action_after_header hook
 * @since Click 1.0.0
 *
 * @hooked null
 */
do_action( 'click_action_after_header' );

/**
 * click_action_before_content hook
 * @since Click 1.0.0
 *
 * @hooked click_before_content - 10
 */
do_action( 'click_action_before_content' );