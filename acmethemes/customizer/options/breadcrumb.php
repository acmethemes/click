<?php
/*adding sections for breadcrumb */
$wp_customize->add_section( 'click-breadcrumb-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Options', 'click' ),
    'panel'          => 'click-options'
) );

/*show breadcrumb*/
$wp_customize->add_setting( 'click_theme_options[click-show-breadcrumb]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-show-breadcrumb'],
    'sanitize_callback' => 'click_sanitize_checkbox'
) );

$wp_customize->add_control( 'click_theme_options[click-show-breadcrumb]', array(
    'label'		=> __( 'Enable Breadcrumb', 'click' ),
    'section'   => 'click-breadcrumb-options',
    'settings'  => 'click_theme_options[click-show-breadcrumb]',
    'type'	  	=> 'checkbox',
    'priority'  => 7
) );