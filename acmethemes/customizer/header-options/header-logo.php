<?php
/*header logo/text display options*/
$wp_customize->add_setting( 'click_theme_options[click-header-id-display-opt]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-header-id-display-opt'],
    'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_header_id_display_opt();
$wp_customize->add_control( 'click_theme_options[click-header-id-display-opt]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Logo/Site Title-Tagline Display Options', 'click' ),
    'section'   => 'title_tagline',
    'settings'  => 'click_theme_options[click-header-id-display-opt]',
    'type'	  	=> 'radio',
    'priority'  => 30
) );