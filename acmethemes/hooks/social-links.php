<?php
/**
 * Display Social Links
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return void
 *
 */

if ( !function_exists('click_social_links') ) :

    function click_social_links( ) {

        global $click_customizer_all_values;
        ?>
        <div class="socials">
            <?php
            if ( !empty( $click_customizer_all_values['click-facebook-url'] ) ) { ?>
                <a href="<?php echo esc_url( $click_customizer_all_values['click-facebook-url'] ); ?>" class="facebook" data-title="<?php esc_attr_e('Facebook','click');?>" target="_blank">
                    <span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span>
                </a>
            <?php
            }
            if ( !empty( $click_customizer_all_values['click-twitter-url'] ) ) { ?>
                <a href="<?php echo esc_url( $click_customizer_all_values['click-twitter-url'] ); ?>" class="twitter" data-title="<?php esc_attr_e('Twitter','click');?>" target="_blank">
                    <span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span>
                </a>
            <?php
            }
            if ( !empty( $click_customizer_all_values['click-instagram-url'] ) ) { ?>
                <a href="<?php echo esc_url( $click_customizer_all_values['click-instagram-url'] ); ?>" class="instagram" data-title="<?php esc_attr_e('Instagram','click');?>" target="_blank">
                    <span class="font-icon-social-instagram"><i class="fa fa-instagram"></i></span>
                </a>
            <?php
            }
            if ( !empty( $click_customizer_all_values['click-youtube-url'] ) ) { ?>
                <a href="<?php echo esc_url( $click_customizer_all_values['click-youtube-url'] ); ?>" class="youtube" data-title="<?php esc_attr_e('Youtube','click');?>" target="_blank">
                    <span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span>
                </a>
            <?php } ?>
        </div>
        <?php
    }
endif;
add_filter( 'click_action_social_links', 'click_social_links', 10 );