<?php
/*adding sections for category section in front page*/
$wp_customize->add_section( 'click-feature-category', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category Slider Selection', 'click' ),
    'panel'          => 'click-feature-panel'
) );

/* feature cat selection */
$wp_customize->add_setting( 'click_theme_options[click-feature-cat]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-feature-cat'],
    'sanitize_callback' => 'absint'
) );

$wp_customize->add_control(
    new Click_Customize_Category_Dropdown_Control(
        $wp_customize,
        'click_theme_options[click-feature-cat]',
        array(
            'label'		=> __( 'Select Category For Slider', 'click' ),
            'section'   => 'click-feature-category',
            'settings'  => 'click_theme_options[click-feature-cat]',
            'type'	  	=> 'category_dropdown',
            'priority'  => 5
        )
    )
);

/* number of slider*/
$wp_customize->add_setting( 'click_theme_options[click-featured-slider-number]', array(
	'capability'		=> 'edit_theme_options',
	'default'			=> $defaults['click-featured-slider-number'],
	'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'click_theme_options[click-featured-slider-number]', array(
	'label'		=> __( 'Number Of Slides', 'click' ),
	'section'   => 'click-feature-category',
	'settings'  => 'click_theme_options[click-featured-slider-number]',
	'type'	  	=> 'number',
	'priority'  => 20
) );