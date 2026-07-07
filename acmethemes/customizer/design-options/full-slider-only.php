<?php
/*active callback function for front-page-header*/
if ( !function_exists('click_active_callback_is_slider_enable') ) :
	function click_active_callback_is_slider_enable() {
		$click_customizer_all_values = click_get_theme_options();
		if( 1 == $click_customizer_all_values['click-enable-feature'] ){
			return true;
		}
		return false;
	}
endif;

/*adding sections for enabling feature section in front page*/
$wp_customize->add_section( 'click-enable-full-slider-only', array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Front Page Full Slider Only', 'click' ),
    'panel'          => 'click-design-panel'
) );

/*enable feature section*/
$wp_customize->add_setting( 'click_theme_options[click-enable-full-slider-only]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-enable-full-slider-only'],
    'sanitize_callback' => 'click_sanitize_checkbox'
) );

$wp_customize->add_control( 'click_theme_options[click-enable-full-slider-only]', array(
    'label'		    => __( 'Enable Full Slider Only', 'click' ),
    'description'	=> __( 'Full Width Slider will display on front/home page. All other contents will disappear', 'click' ),
    'section'       => 'click-enable-full-slider-only',
    'settings'      => 'click_theme_options[click-enable-full-slider-only]',
    'type'	  	    => 'checkbox',
    'priority'      => 10,
    'active_callback'   => 'click_active_callback_is_slider_enable'
) );