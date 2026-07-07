<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'click-option-pagination-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Pagination Options', 'click' ),
    'panel'          => 'click-options'
) );

/*Pagination Options*/
$wp_customize->add_setting( 'click_theme_options[click-pagination-option]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-pagination-option'],
    'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_pagination_options();
$wp_customize->add_control( 'click_theme_options[click-pagination-option]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Pagination Options', 'click' ),
    'description'   => __( 'Blog and Archive Pages Pagination', 'click' ),
    'section'       => 'click-option-pagination-option',
    'settings'      => 'click_theme_options[click-pagination-option]',
    'type'	  	    => 'select'
) );

/*Show More*/
$wp_customize->add_setting( 'click_theme_options[click-ajax-show-more]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['click-ajax-show-more'],
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'click_theme_options[click-ajax-show-more]', array(
	'label'		=> __( 'Show More Text', 'click' ),
	'section'   => 'click-option-pagination-option',
	'settings'  => 'click_theme_options[click-ajax-show-more]',
	'type'	  	=> 'text',
	'priority'  => 10
) );

/*No More*/
$wp_customize->add_setting( 'click_theme_options[click-ajax-no-more]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['click-ajax-no-more'],
	'sanitize_callback' => 'sanitize_text_field',
) );
$wp_customize->add_control( 'click_theme_options[click-ajax-no-more]', array(
	'label'		=> __( 'No More Text', 'click' ),
	'section'   => 'click-option-pagination-option',
	'settings'  => 'click_theme_options[click-ajax-no-more]',
	'type'	  	=> 'text',
	'priority'  => 20
) );