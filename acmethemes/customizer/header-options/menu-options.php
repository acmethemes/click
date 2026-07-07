<?php
/*Menu Section*/
$wp_customize->add_section( 'click-menu-options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Menu Options', 'click' ),
    'panel'          => 'click-header-panel'
) );

/*show menu*/
$wp_customize->add_setting( 'click_theme_options[click-enable-sticky]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-enable-sticky'],
    'sanitize_callback' => 'click_sanitize_checkbox'
) );

$wp_customize->add_control( 'click_theme_options[click-enable-sticky]', array(
    'label'		=> __( 'Enable Sticky', 'click' ),
    'section'   => 'click-menu-options',
    'settings'  => 'click_theme_options[click-enable-sticky]',
    'type'	  	=> 'checkbox',
    'priority'  => 20
) );

/*Display hide menu*/
$wp_customize->add_setting( 'click_theme_options[click-enable-toggle-menu]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-enable-toggle-menu'],
    'sanitize_callback' => 'click_sanitize_checkbox'
) );
$wp_customize->add_control( 'click_theme_options[click-enable-toggle-menu]', array(
    'label'		=> __( 'Enable Toggle Header Menu', 'click' ),
    'section'   => 'click-menu-options',
    'settings'  => 'click_theme_options[click-enable-toggle-menu]',
    'type'	  	=> 'checkbox',
    'priority'  => 70
) );