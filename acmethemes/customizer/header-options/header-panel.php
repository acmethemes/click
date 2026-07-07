<?php
/*adding header options panel*/
$wp_customize->add_panel( 'click-header-panel', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Options', 'click' ),
    'description'    => __( 'Customize your awesome site header ', 'click' )
) );
/*
 * file for menu options
*/
require_once click_file_directory('acmethemes/customizer/header-options/menu-options.php');

/*
 * file for header logo
*/
require_once click_file_directory('acmethemes/customizer/header-options/header-logo.php');

/*file for site identity placement*/
require_once click_file_directory('acmethemes/customizer/header-options/site-identity-placement.php');