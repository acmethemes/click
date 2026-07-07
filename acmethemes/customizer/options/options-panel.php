<?php
/*adding theme options panel*/
$wp_customize->add_panel( 'click-options', array(
    'priority'       => 210,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Theme Options', 'click' ),
    'description'    => __( 'Customize your awesome site with theme options ', 'click' )
) );

/*
* file for header breadcrumb options
*/
require_once click_file_directory('acmethemes/customizer/options/breadcrumb.php');

/*
* file for header search options
*/
require_once click_file_directory('acmethemes/customizer/options/search.php');

/*
* file for pagination
*/
require_once click_file_directory('acmethemes/customizer/options/pagination.php');