<?php
/*adding sections for Search Placeholder*/
$wp_customize->add_section( 'click-search', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Search', 'click' ),
    'panel'          => 'click-options'
) );

/*Search Placeholder*/
$wp_customize->add_setting( 'click_theme_options[click-search-placholder]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-search-placholder'],
    'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'click_theme_options[click-search-placholder]', array(
    'label'		=> __( 'Search Placeholder', 'click' ),
    'section'   => 'click-search',
    'settings'  => 'click_theme_options[click-search-placholder]',
    'type'	  	=> 'text',
    'priority'  => 10
) );