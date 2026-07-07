<?php
/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'click-enable-feature', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Enable Feature Section', 'click' ),
    'panel'          => 'click-feature-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'click_theme_options[click-enable-feature]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-enable-feature'],
    'sanitize_callback' => 'click_sanitize_checkbox'
) );

$wp_customize->add_control( 'click_theme_options[click-enable-feature]', array(
    'label'		    => __( 'Enable Feature Section', 'click' ),
    'description'	=> __( 'Feature section will display on front/home page', 'click' ),
    'section'       => 'click-enable-feature',
    'settings'      => 'click_theme_options[click-enable-feature]',
    'type'	  	    => 'checkbox',
    'priority'      => 10
) );