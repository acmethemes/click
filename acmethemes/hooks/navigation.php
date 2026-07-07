<?php
/**
 * Post Navigation
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('click_posts_navigation') ) :
    function click_posts_navigation() {
        global $click_customizer_all_values;

        if( 'default' == $click_customizer_all_values['click-pagination-option'] ){
            the_posts_navigation();
        }
        else{
	        $click_ajax_show_more = $click_customizer_all_values['click-ajax-show-more'];
            $page_number = get_query_var('paged');
            if( $page_number == 0 ){
                $output_page = 2;
            }
            else{
                $output_page = $page_number + 1;
            }
            echo "<div class='show-more clearfix' data-number='$output_page'>".esc_html($click_ajax_show_more)."</div><div id='click-temp-post'></div>";
        }
    }
endif;
add_action( 'click_action_navigation', 'click_posts_navigation', 10 );