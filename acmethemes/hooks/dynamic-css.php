<?php
/**
 * Dynamic css
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'click_dynamic_css' ) ) :

    function click_dynamic_css() {

        global $click_customizer_all_values;
        /*Color options */
        $click_primary_color = esc_attr( $click_customizer_all_values['click-primary-color'] );
        $custom_css = '';
        /*background*/
        $custom_css .= "
            mark,
            .comment-form .form-submit input,
            #calendar_wrap #wp-calendar #today,
            #calendar_wrap #wp-calendar #today a,
            .wpcf7-form input.wpcf7-submit:hover,
            .breadcrumb,
            .show-more,
            .sticky-format-icon,
            .post-navigation .nav-next,
            .post-navigation .nav-previous,
            .posts-navigation .nav-links a:hover,
            .slider-feature-wrap #prevslide,
            .slider-feature-wrap #nextslide,
            .site-footer,
            .widget-title,
            .comment-respond .comment-reply-title,
            .comments-title,
            .not-front-page .site-header
            {
                background: {$click_primary_color};
            }";
        /*color*/
        $custom_css .= "
            a:hover,
            .header-wrapper .menu li a:hover,
            .not-front-page .header-wrapper .menu li ul li a:hover,
            .screen-reader-text:focus,
            .bn-content a:hover,
            .socials a:hover,
            .site-title:hover,
            .site-title a:hover,
            .widget_search input#s,
            .slider-feature-wrap a:hover,
            .posted-on a:hover,
            .cat-links a:hover,
            .comments-link a:hover,
            .edit-link a:hover,
            .tags-links a:hover,
            .byline a:hover,
            .nav-links a:hover,
            #click-breadcrumbs a:hover,
            .wpcf7-form input.wpcf7-submit,
            .widget li a:hover,
            .site-header.fixed .header-wrapper .menu li a:hover,
            .header-wrapper .main-navigation ul.sub-menu li a:hover,
            .header-wrapper .menu > li.current-menu-item > a,
            .header-wrapper .menu > li.current-menu-parent > a,
            .header-wrapper .menu > li.current_page_parent > a,
            .header-wrapper .menu > li.current_page_ancestor > a,
            .at-menu-toggle,
            .entry-title,
            #click-breadcrumbs .breadcrumb-trail li,
            .nav-links a,
            .comment-list .fn,
            .page-header .page-title,
            .searchsubmit
            {
                color: {$click_primary_color};
            }";

        /*border*/
         $custom_css .= "
            .wpcf7-form input.wpcf7-submit:hover{
                border: 2px solid {$click_primary_color};
            }
            .breadcrumb::after {
                border-left: 5px solid {$click_primary_color};
            }
            .tagcloud a,
            .at-menu-toggle{
                border: 1px solid {$click_primary_color};
            }
            .posts-navigation .nav-links a {
                border: 1px solid {$click_primary_color};
            }
            ul#thumb-list li {
                border: 2px solid {$click_primary_color};
            }
            .at-sticky::before {
            border-top: 18px solid {$click_primary_color};
        }
         ";
        /*media width*/
        $custom_css .= "
            @media screen and (max-width:992px){
                .slicknav_nav li:hover > a,
                .slicknav_nav li.current-menu-ancestor a,
                .slicknav_nav li.current-menu-item  > a,
                .slicknav_nav li.current_page_item a,
                .slicknav_nav li.current_page_item .slicknav_item span,
                .slicknav_nav li .slicknav_item:hover a{
                    color: {$click_primary_color};
                }
            }";
        wp_add_inline_style( 'click-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'click_dynamic_css', 99 );