<?php
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function click_widget_init(){
    register_sidebar(array(
        'name' => __('Main Sidebar Area', 'click'),
        'id'   => 'click-sidebar',
        'description' =>  __('Displays items on sidebar', 'click'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title"><span>',
        'after_title' => '</span></h3>',
    ));
}
add_action('widgets_init', 'click_widget_init');