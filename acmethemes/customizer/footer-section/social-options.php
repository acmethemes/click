<?php
/*adding sections for footer social options */
$wp_customize->add_section( 'click-footer-social', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Social Options', 'click' ),
    'panel'          => 'click-footer-panel'
) );

/*enable social*/
$wp_customize->add_setting( 'click_theme_options[click-enable-social]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-enable-social'],
    'sanitize_callback' => 'click_sanitize_checkbox',
) );
$wp_customize->add_control( 'click_theme_options[click-enable-social]', array(
    'label'		=> __( 'Enable social', 'click' ),
    'section'   => 'click-footer-social',
    'settings'  => 'click_theme_options[click-enable-social]',
    'type'	  	=> 'checkbox',
    'priority'  => 10
) );

/*facebook url*/
$wp_customize->add_setting( 'click_theme_options[click-facebook-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-facebook-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'click_theme_options[click-facebook-url]', array(
    'label'		=> __( 'Facebook url', 'click' ),
    'section'   => 'click-footer-social',
    'settings'  => 'click_theme_options[click-facebook-url]',
    'type'	  	=> 'url',
    'priority'  => 20
) );

/*twitter url*/
$wp_customize->add_setting( 'click_theme_options[click-twitter-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-twitter-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'click_theme_options[click-twitter-url]', array(
    'label'		=> __( 'Twitter url', 'click' ),
    'section'   => 'click-footer-social',
    'settings'  => 'click_theme_options[click-twitter-url]',
    'type'	  	=> 'url',
    'priority'  => 25
) );

/*instagram url*/
$wp_customize->add_setting( 'click_theme_options[click-instagram-url]', array(
    'capability'        => 'edit_theme_options',
    'default'           => $defaults['click-instagram-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'click_theme_options[click-instagram-url]', array(
    'label'     => __( 'Instagram url', 'click' ),
    'section'   => 'click-footer-social',
    'settings'  => 'click_theme_options[click-instagram-url]',
    'type'      => 'url',
    'priority'  => 25
) );

/*youtube url*/
$wp_customize->add_setting( 'click_theme_options[click-youtube-url]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-youtube-url'],
    'sanitize_callback' => 'esc_url_raw',
) );
$wp_customize->add_control( 'click_theme_options[click-youtube-url]', array(
    'label'		=> __( 'Youtube url', 'click' ),
    'section'   => 'click-footer-social',
    'settings'  => 'click_theme_options[click-youtube-url]',
    'type'	  	=> 'url',
    'priority'  => 25
) );