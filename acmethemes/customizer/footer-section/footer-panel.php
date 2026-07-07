<?php 
/*adding sections for footer options*/
$wp_customize->add_panel( 'click-footer-panel', array(
    'priority'       => 80,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Footer  Options', 'click' )
) );

/*
* file for footer copyright options
*/
require_once click_file_directory('acmethemes/customizer/footer-section/footer-section.php');

/*
* file for footer social options
*/
require_once click_file_directory('acmethemes/customizer/footer-section/social-options.php');