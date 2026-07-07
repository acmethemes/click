<?php
/* footer copyright options*/
$wp_customize->add_section( 'click-footer-copyright', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Copyright Options', 'click' ),
    'panel'          => 'click-footer-panel'
) );

/*copyright*/
$wp_customize->add_setting( 'click_theme_options[click-footer-copyright]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-footer-copyright'],
    'sanitize_callback' => 'wp_kses_post'
) );
$wp_customize->add_control( 'click_theme_options[click-footer-copyright]', array(
    'label'		=> __( 'Copyright Text', 'click' ),
    'section'   => 'click-footer-copyright',
    'settings'  => 'click_theme_options[click-footer-copyright]',
    'type'	  	=> 'text',
    'priority'  => 2
) );