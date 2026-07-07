<?php
/**
 * Display featured slider
 *
 * @since Click 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('click_feature_slider') ) :
    function click_feature_slider() {
        ?>
        <!--slider holder-->
        <div id="click-supersised"></div>

        <!--Thumbnail Navigation-->
        <div id="prevthumb"></div>
        <div id="nextthumb"></div>

        <!--Arrow Navigation-->
        <a id="prevslide" class="load-item">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
        </a>
        <a id="nextslide" class="load-item">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
        </a>

        <div id="thumb-tray" class="load-item">
            <div id="thumb-back"></div>
            <div id="thumb-forward"></div>
        </div>

        <!--Time Bar-->
        <div id="progress-back" class="load-item">
            <div id="progress-bar"></div>
        </div>

        <!--Control Bar-->
        <div id="controls-wrapper" class="load-item">
            <div id="controls">

                <a id="play-button"><img id="pauseplay" src="<?php echo esc_url(get_template_directory_uri() )?>/assets/library/supersized/img/pause.png"/></a>

                <!--Slide counter-->
                <div id="slidecounter">
                    <span class="slidenumber"></span> <?php esc_html_e( '/','click')?> <span class="totalslides"></span>
                </div>

                <!--Slide captions displayed here-->
                <div id="slidecaption"></div>

                <!--Thumb Tray button-->
                <a id="tray-button"><img id="tray-arrow" src="<?php echo esc_url(get_template_directory_uri() )?>/assets/library/supersized/img/button-tray-up.png"/></a>

                <!--Navigation-->
                <ul id="slide-list"></ul>

            </div>
        </div>
        <div class="clearfix"></div>
        <?php

    }
endif;
add_action( 'click_action_feature_slider', 'click_feature_slider', 0 );