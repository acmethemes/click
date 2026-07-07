<?php
/* adding sections for default layout options */
$wp_customize->add_section( 'click-design-default-layout-option', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Layout', 'click' ),
    'panel'          => 'click-design-panel'
) );

/*global default layout*/
$wp_customize->add_setting( 'click_theme_options[click-default-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-default-layout'],
    'sanitize_callback' => 'click_sanitize_select'
) );

$choices = click_default_layout();
$wp_customize->add_control( 'click_theme_options[click-default-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Layout', 'click' ),
    'section'   => 'click-design-default-layout-option',
    'settings'  => 'click_theme_options[click-default-layout]',
    'type'	  	=> 'select'
) );