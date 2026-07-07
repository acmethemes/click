<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'click-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Sidebar Layout', 'click' ),
    'panel'          => 'click-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'click_theme_options[click-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-sidebar-layout'],
    'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_sidebar_layout();
$wp_customize->add_control( 'click_theme_options[click-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Sidebar Layout', 'click' ),
    'section'   => 'click-design-sidebar-layout-option',
    'settings'  => 'click_theme_options[click-sidebar-layout]',
    'type'	  	=> 'select'
) );