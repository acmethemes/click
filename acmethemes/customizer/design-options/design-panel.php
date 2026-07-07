<?php
/*
 * adding theme options panel
 * */
$wp_customize->add_panel( 'click-design-panel', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Layout/Design Option', 'click' )
) );


$wp_customize->get_section( 'background_image' )->panel = 'click-design-panel';
$wp_customize->get_section( 'background_image' )->priority = 50;

/*
* file for default layout
*/
require_once click_file_directory('acmethemes/customizer/design-options/full-slider-only.php');

/*
* file for default layout
*/
require_once click_file_directory('acmethemes/customizer/design-options/default-layout.php');

/*
* file for sidebar layout
*/
require_once click_file_directory('acmethemes/customizer/design-options/sidebar-layout.php');

/*
* file for front page sidebar layout options
*/
require_once click_file_directory('acmethemes/customizer/design-options/front-page-sidebar-layout.php');

/*
* file for front archive sidebar layout options
*/
require_once click_file_directory('acmethemes/customizer/design-options/archive-sidebar-layout.php');

/*
* file for color options
*/
require_once click_file_directory('acmethemes/customizer/design-options/colors-options.php');

/*Blog layout*/
require_once click_file_directory('acmethemes/customizer/design-options/blog-layout.php');