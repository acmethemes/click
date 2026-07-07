<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'click-front-page-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front/Home Sidebar Layout', 'click' ),
    'panel'          => 'click-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'click_theme_options[click-front-page-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-front-page-sidebar-layout'],
    'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_sidebar_layout();
$wp_customize->add_control( 'click_theme_options[click-front-page-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Front/Home Sidebar Layout', 'click' ),
    'section'   => 'click-front-page-sidebar-layout',
    'settings'  => 'click_theme_options[click-front-page-sidebar-layout]',
    'type'	  	=> 'select'
) );