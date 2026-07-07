<?php
/**
 * Content and content wrapper end
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_after_content' ) ) :

    function click_after_content() {
        ?>
        </div><!-- #content -->
        </div><!-- content-wrapper-->
        <?php
    }
endif;
add_action( 'click_action_after_content', 'click_after_content', 10 );

/**
 * Footer content
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_footer' ) ) :

    function click_footer() {

        global $click_customizer_all_values;
        ?>
        <div class="clearfix"></div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class=" footer-wrapper">
                <div class="footer-copyright border text-center">
                    <div class="wrapper">
                        <div class="site-info">
                            <?php
                            if ( 1 == $click_customizer_all_values['click-enable-social'] ) {
                                /**
                                 * Social Sharing
                                 * click_action_social_links
                                 * @since Click 1.0.0
                                 *
                                 * @hooked click_social_links -  10
                                 */
                                do_action('click_action_social_links');
                            }
                            ?>
                            <?php if( isset( $click_customizer_all_values['click-footer-copyright'] ) ): ?>
                                <p><?php echo wp_kses_post( $click_customizer_all_values['click-footer-copyright'] ); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'click' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'click' ), 'WordPress' ); ?></a>
                            <span class="sep"> | </span>
                            <?php printf( esc_html__( '%1$s by %2$s', 'click' ), 'Click', '<a href="https://www.acmethemes.com" rel="designer">Acme Themes</a>' ); ?>
                        </div><!-- .site-info -->
                    </div>
                </div>
            </div><!-- footer-wrapper-->
        </footer><!-- #colophon -->
    </div><!--page end-->
    <?php
    }
endif;
add_action( 'click_action_footer', 'click_footer', 10 );