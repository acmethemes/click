<?php
if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Click_Customize_Category_Dropdown_Control' )):

    /**
     * Custom Control for category dropdown
     * @package Acme Themes
     * @subpackage Click
     * @since 1.0.0
     *
     */
    class Click_Customize_Category_Dropdown_Control extends WP_Customize_Control {

        /**
         * Declare the control type.
         *
         * @access public
         * @var string
         */
        public $type = 'category_dropdown';

        /**
         * Function to  render the content on the theme customizer page
         *
         * @access public
         * @since 1.0.0
         *
         * @param null
         * @return void
         *
         */
        public function render_content() {
            $click_customizer_name = 'click_customizer_dropdown_categories_' . $this->id;;
            $click_dropdown_categories = wp_dropdown_categories(
                array(
                    'name'              => $click_customizer_name,
                    'echo'              => 0,
                    'show_option_none'  => __('Select','click'),
                    'option_none_value' => '0',
                    'selected'          => $this->value(),
                )
            );
            $click_dropdown_final = str_replace( '<select', '<select ' . $this->get_link(), $click_dropdown_categories );
            printf(
                '<label><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $click_dropdown_final
            );
            if ( !empty( $this->description ) ) {
                echo "<br />";
                echo wp_kses_post($this->description);
            }
        }
    } 
endif;