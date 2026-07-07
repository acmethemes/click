<?php
/*adding sections for blog layout options*/
$wp_customize->add_section( 'click-design-blog-layout-option', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Default Blog/Archive Layout', 'click' ),
    'panel'          => 'click-design-panel'
) );

/*blog image size*/
$wp_customize->add_setting( 'click_theme_options[click-blog-archive-image-size]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-blog-archive-image-size'],
    'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_get_image_sizes_options();
$wp_customize->add_control( 'click_theme_options[click-blog-archive-image-size]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Image Size Options', 'click' ),
    'section'   => 'click-design-blog-layout-option',
    'settings'  => 'click_theme_options[click-blog-archive-image-size]',
    'type'	  	=> 'select',
) );

/*blog hover image size*/
$wp_customize->add_setting( 'click_theme_options[click-blog-archive-hover-image-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['click-blog-archive-hover-image-size'],
	'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_get_image_sizes_options();
$wp_customize->add_control( 'click_theme_options[click-blog-archive-hover-image-size]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Hover Image Size Options', 'click' ),
	'section'   => 'click-design-blog-layout-option',
	'settings'  => 'click_theme_options[click-blog-archive-hover-image-size]',
	'type'	  	=> 'select',
) );