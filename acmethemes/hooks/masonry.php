<?php
/**
 * Add div for masonry
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('click_masonry_start') ) :
    function click_masonry_start( ) {
        ?>
        <div class="masonry-start"><div id="masonry-loop">
        <?php
    }
endif;
add_action('click_action_masonry_start', 'click_masonry_start');

/**
 * End div for masonry
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('click_masonry_end') ) :
    function click_masonry_end( ) {
        ?>
        </div><!--#masonry-loop-->
        </div><!--masonry-start-->
        <?php
    }
endif;
add_action('click_action_masonry_end', 'click_masonry_end');