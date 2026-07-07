<?php
/**
 * Reset options
 * Its outside options panel
 *
 * @param  array $reset_options
 * @return void
 *
 * @since Click 1.0.0
 */
if ( ! function_exists( 'click_reset_db_options' ) ) :
    function click_reset_db_options( $reset_options ) {
        set_theme_mod( 'click_theme_options', $reset_options );
    }
endif;

if ( ! function_exists( 'click_reset_customizer_db_setting' ) ) :
    function click_reset_customizer_db_setting( $input, $setting ){
	    $click_customizer_all_values = click_get_theme_options();
	    $input = $click_customizer_all_values['click-reset-options'];
	    if( '0' == $input ){
		    return;
	    }
	    
        $click_default_theme_options = click_get_default_theme_options();
        $click_get_theme_options = get_theme_mod( 'click_theme_options');

        switch ( $input ) {
            case "reset-color-options":
                $click_get_theme_options['click-primary-color'] = $click_default_theme_options['click-primary-color'];
                click_reset_db_options($click_get_theme_options);
                break;

            case "reset-all":
                click_reset_db_options($click_default_theme_options);
                break;

            default:
                break;
        }
    }
endif;

add_action( 'customize_save_after','click_reset_customizer_db_setting' );

/*adding sections for Reset Options*/
$wp_customize->add_section( 'click-reset-options', array(
    'priority'       => 220,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Reset Options', 'click' )
) );

/*Reset Options*/
$wp_customize->add_setting( 'click_theme_options[click-reset-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['click-reset-options'],
    'sanitize_callback' => 'click_sanitize_checkbox',
    'transport'			=> 'postMessage'
) );

$choices = click_reset_options();
$wp_customize->add_control( 'click_theme_options[click-reset-options]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Reset Options', 'click' ),
    'description'   => __( 'Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects. ', 'click' ),
    'section'       => 'click-reset-options',
    'settings'      => 'click_theme_options[click-reset-options]',
    'type'	  	    => 'select'
) );