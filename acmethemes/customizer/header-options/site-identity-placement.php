<?php
/*adding sections for menu */
$wp_customize->add_section( 'click-site-identity-placement', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Header Placement', 'click' ),
    'panel'          => 'click-header-panel'
) );

/*header menu type*/
$wp_customize->add_setting( 'click_theme_options[click-front-header-logo-ads-display-position]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-front-header-logo-ads-display-position'],
    'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_header_logo_menu_display_position();
$wp_customize->add_control( 'click_theme_options[click-front-header-logo-ads-display-position]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Site Identity Position On menu', 'click' ),
    'section'   => 'click-site-identity-placement',
    'settings'  => 'click_theme_options[click-front-header-logo-ads-display-position]',
    'type'	  	=> 'select',
    'priority'  => 15
) );