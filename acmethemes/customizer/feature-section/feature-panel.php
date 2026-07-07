<?php
/*adding feature options panel*/
$wp_customize->add_panel( 'click-feature-panel', array(
    'priority'       => 40,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Featured Section Options', 'click' ),
    'description'    => __( 'Customize your awesome site feature section ', 'click' )
) );

/*
* file for feature section enable
*/
require_once click_file_directory('acmethemes/customizer/feature-section/feature-enable.php');

/*
* file for feature slider category
*/
require_once click_file_directory('acmethemes/customizer/feature-section/feature-category.php');