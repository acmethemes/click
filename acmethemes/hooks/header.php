<?php
/**
 * Setting global variables for all theme options db saved values
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_set_global' ) ) :

    function click_set_global() {
        /*Getting saved values start*/
        $click_saved_theme_options = click_get_theme_options();
        $GLOBALS['click_customizer_all_values'] = $click_saved_theme_options;
        /*Getting saved values end*/
    }
endif;
add_action( 'click_action_before_head', 'click_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_doctype' ) ) :
    function click_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
    <?php
    }
endif;
add_action( 'click_action_before_head', 'click_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_before_wp_head' ) ) :

    function click_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11')?>">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    }
endif;
add_action( 'click_action_before_wp_head', 'click_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_body_class' ) ) :

    function click_body_class( $clickbody_classes ) {
        global $click_customizer_all_values;
        $click_enable_full_slider_only = $click_customizer_all_values['click-enable-full-slider-only'];
        $click_enable_feature = $click_customizer_all_values['click-enable-feature'];

        if ( 'boxed' == $click_customizer_all_values['click-default-layout'] ) {
            $clickbody_classes[] = 'boxed-layout';
        }
        if( !is_front_page() || ( is_front_page() && is_home() && 1 != $click_enable_feature)){
            $clickbody_classes[] = 'not-front-page';
        }
        else{
            $clickbody_classes[] = 'at-front-page';
        }
        if( is_front_page() && 1 == $click_enable_full_slider_only ){
            $clickbody_classes[] = 'at-full-slider-only';
        }
        if( 1 == $click_enable_feature ){
	        $clickbody_classes[] = 'at-enable-feature';
        }
        else{
	        $clickbody_classes[] = 'at-disable-feature';
        }
        $clickbody_classes[] = click_sidebar_selection();

        return $clickbody_classes;
    }
endif;
add_action( 'body_class', 'click_body_class', 10, 1);

/**
 * Page start
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_page_start' ) ) :

    function click_page_start() {
        ?>
        <div id="page" class="hfeed site">
    <?php
    }
endif;
add_action( 'click_action_before', 'click_page_start', 15 );

/**
 * Skip to content
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_skip_to_content' ) ) :

    function click_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content" title="link"><?php esc_html_e( 'Skip to content', 'click' ); ?></a>
    <?php
    }

endif;
add_action( 'click_action_before_header', 'click_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_header' ) ) :

    function click_header() {
        global $click_customizer_all_values;

	    $click_enable_sticky = $click_customizer_all_values['click-enable-sticky'];
	    $click_enable_hide_on_menu = $click_customizer_all_values['click-enable-toggle-menu'];
	    $click_header_logo_ads_display_position = $click_customizer_all_values['click-front-header-logo-ads-display-position'];
	    $click_header_id_display_opt = $click_customizer_all_values['click-header-id-display-opt'];
	    $header_class = 'at-'.$click_header_logo_ads_display_position;
	    if( 1 == $click_enable_sticky ){
	        $header_class .= ' fixed';
        }
	    if( 1 == $click_enable_hide_on_menu ){
		    echo '<i class="fa at-menu-toggle at-open-menu fa-align-justify" aria-hidden="true"></i>';
	    }
	    if ( "center" == $click_header_logo_ads_display_position ){
	        $inner_wrapper = 'wrapper';
		    $outer_wrapper = '';
        }
        else{
	        $inner_wrapper = '';
	        $outer_wrapper = 'wrapper';
        }
        ?>
        <header id="masthead" class="site-header <?php echo esc_attr($header_class);?> <?php echo esc_attr( $click_header_id_display_opt ); ?>" role="banner">
            <div class="header-wrapper <?php echo esc_attr($outer_wrapper );?> clearfix">
                <div class="header-container ">
                    <div class="site-branding clearfix">
                        <div class="<?php echo esc_attr($inner_wrapper );?>">
                            <div class="site-logo">
                                <?php
                                if ( 'disable' != $click_header_id_display_opt ):
                                    if ( 'logo-only' == $click_header_id_display_opt ):
                                        if ( function_exists( 'the_custom_logo' ) ) :
                                            the_custom_logo();
                                        endif;
                                    else:/*else is title-only or title-and-tagline*/
                                        if ( is_front_page() && is_home() ) : ?>
                                            <h1 class="site-title">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                            </h1>
                                        <?php else : ?>
                                            <p class="site-title">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                            </p>
                                        <?php
                                        endif;
                                        if ( 'title-and-tagline' == $click_header_id_display_opt ):
                                            $description = get_bloginfo( 'description', 'display' );
                                            if ( $description || is_customize_preview() ) : ?>
                                                <p class="site-description"><?php echo esc_html( $description ); ?></p>
                                            <?php endif;
                                        endif;
                                    endif;
                                endif;?><!--click-header-id-display-opt-->
                            </div><!--site-logo-->
                        </div>
                    </div>
                    <nav id="site-navigation" class="main-navigation clearfix" role="navigation">
                        <div class="<?php echo esc_attr($inner_wrapper );?>">
                            <div class="header-main-menu clearfix">
                                <?php
                                wp_nav_menu(
	                                array(
		                                'theme_location' => 'primary',
		                                'container' => 'div',
		                                'container_class' => 'acmethemes-nav',
		                                'fallback_cb' => false,
		                                'menu_id' => 'at-'.esc_attr($click_header_logo_ads_display_position)
	                                )
                                );
                               ?>
                            </div>
                        </div>
                    </nav>
                    <!--slick menu container-->
                    <div class="responsive-slick-menu clearfix"></div>
                    <!-- #site-navigation -->
                </div>
                <!-- .header-container -->
            </div>
            <!-- header-wrapper-->
        </header>
        <!-- #masthead -->
    <?php
    }
endif;
add_action( 'click_action_header', 'click_header', 10 );

/**
 * Before main content
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'click_before_content' ) ) :

    function click_before_content() {

        global $click_customizer_all_values;
        $click_enable_feature = $click_customizer_all_values['click-enable-feature'];
        if ( is_front_page() && 1 == $click_enable_feature ) {
            echo '<div class="slider-feature-wrap clearfix">';
            /**
             * Slide
             * click_action_feature_slider
             * @since click 1.0.0
             *
             * @hooked click_feature_slider -  0
             */
            do_action('click_action_feature_slider');

            /**
             * Featured Post Beside Slider
             * click_action_feature_side
             * @since click 1.0.0
             *
             * @hooked click_feature_side-  0
             */
            do_action('click_action_feature_side');
            echo "</div>";
            $click_content_id = "home-content";
        } else {
            $click_content_id = "content";
        }
        ?>
        <div class="wrapper content-wrapper clearfix">
    <div id="<?php echo esc_attr( $click_content_id ); ?>" class="site-content">
    <?php
        if( 1 == $click_customizer_all_values['click-show-breadcrumb'] ){
            click_breadcrumbs();
        }
    }
endif;
add_action( 'click_action_after_header', 'click_before_content', 10 );