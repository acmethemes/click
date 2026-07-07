<?php
/*adding sections for Single post options*/
$wp_customize->add_section( 'click-single-post', array(
    'priority'       => 90,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Single Post Options', 'click' )
) );

/*single image layout*/
$wp_customize->add_setting( 'click_theme_options[click-single-image-size]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['click-single-image-size'],
	'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_get_image_sizes_options();
$wp_customize->add_control( 'click_theme_options[click-single-image-size]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Image Layout Options', 'click' ),
	'section'   => 'click-single-post',
	'settings'  => 'click_theme_options[click-single-image-size]',
	'type'	  	=> 'select',
	'priority'  => 20
) );

/*show related posts*/
$wp_customize->add_setting( 'click_theme_options[click-show-related]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-show-related'],
    'sanitize_callback' => 'click_sanitize_checkbox'
) );
$wp_customize->add_control( 'click_theme_options[click-show-related]', array(
    'label'		=> __( 'Show Related Posts In Single Post', 'click' ),
    'section'   => 'click-single-post',
    'settings'  => 'click_theme_options[click-show-related]',
    'type'	  	=> 'checkbox',
    'priority'  => 3
) );

/*Related title*/
$wp_customize->add_setting( 'click_theme_options[click-related-title]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['click-related-title'],
	'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'click_theme_options[click-related-title]', array(
	'label'		=> __( 'Related Posts title', 'click' ),
	'section'   => 'click-single-post',
	'settings'  => 'click_theme_options[click-related-title]',
	'type'	  	=> 'text',
	'priority'  => 40
) );

/*related post by tag or category*/
$wp_customize->add_setting( 'click_theme_options[click-related-post-display-from]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['click-related-post-display-from'],
	'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_related_post_display_from();
$wp_customize->add_control( 'click_theme_options[click-related-post-display-from]', array(
	'choices'  	=> $choices,
	'label'		=> __( 'Related Post Display From Options', 'click' ),
	'section'   => 'click-single-post',
	'settings'  => 'click_theme_options[click-related-post-display-from]',
	'type'	  	=> 'select',
	'priority'  => 50
) );