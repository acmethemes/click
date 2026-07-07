<?php
/*adding sections for default layout options panel*/
$wp_customize->add_section( 'click-archive-sidebar-layout', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Category/Archive Sidebar Layout', 'click' ),
    'panel'          => 'click-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'click_theme_options[click-archive-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-archive-sidebar-layout'],
    'sanitize_callback' => 'click_sanitize_select'
) );
$choices = click_sidebar_layout();
$wp_customize->add_control( 'click_theme_options[click-archive-sidebar-layout]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Category/Archive Sidebar Layout', 'click' ),
    'description'   => __( 'Sidebar Layout for listing pages like category, author etc', 'click' ),
    'section'       => 'click-archive-sidebar-layout',
    'settings'      => 'click_theme_options[click-archive-sidebar-layout]',
    'type'	  	    => 'select'
) );