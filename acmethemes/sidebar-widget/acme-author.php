<?php
/**
 * Custom author
 *
 * @package Acme Themes
 * @subpackage Click
 */
if ( ! class_exists( 'Click_author_widget' ) ) :
    /**
     * Class for adding author widget
     * A new way to add author
     * @package Acme Themes
     * @subpackage Click
     * @since 1.0.0
     */
    class Click_author_widget extends WP_Widget {
        /*defaults values for fields*/
        private $defaults = array(
            'click_author_title' => '',
            'click_author_image' => '',
            'click_author_link'  => '',
            'click_author_new_window' => 1,
            'click_author_short_disc'  => '',
        );

        function __construct() {
            parent::__construct(
            /*Base ID of your widget*/
                'click_author',
                /*Widget name will appear in UI*/
                __('AT Author', 'click'),
                /*Widget description*/
                array( 'description' => __( 'Add author with different options.', 'click' ), )
            );
        }

        /*Widget Backend*/
        public function form( $instance ) {
            /*merging arrays*/
            $instance = wp_parse_args( (array) $instance, $this->defaults);
            $click_author_title  = esc_attr( $instance['click_author_title'] );
            $click_author_image  = esc_url( $instance['click_author_image'] );
            $click_author_link   = esc_url( $instance['click_author_link'] );
            $click_author_new_window = esc_attr( $instance['click_author_new_window'] );
            $click_author_short_disc = esc_textarea( $instance['click_author_short_disc'] );
            ?>
            <p class="description">
                <?php
                esc_html_e('Note: Use square image. Recommended image size : 250 x 250', 'click' );
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'click_author_title' ) ); ?>">
                    <?php esc_html_e( 'Title:', 'click' ); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'click_author_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'click_author_title' ) ); ?>" type="text" value="<?php echo esc_attr( $click_author_title ); ?>" />
            </p>
            <h4><?php esc_html_e( 'Author Image', 'click' ); ?></h4>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'click_author_image' ) ); ?>">
                    <?php esc_html_e( 'Select Author Image', 'click' ); ?>
                </label>
                <?php
                $click_display_none = '';
                if ( empty( $click_author_image ) ){
                    $click_display_none = ' style="display:none;" ';
                }
                ?>
                <span class="img-preview-wrap" <?php echo esc_attr( $click_display_none ); ?>>
                    <img class="widefat" src="<?php echo esc_url( $click_author_image ); ?>" alt="<?php esc_attr_e( 'Image preview', 'click' ); ?>"  />
                </span><!-- .ad-preview-wrap -->
                <input type="text" class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'click_author_image' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'click_author_image' ) ); ?>" value="<?php echo esc_url( $click_author_image ); ?>" />
                <input type="button" value="<?php esc_attr_e( 'Upload Image', 'click' ); ?>" class="button media-image-upload" data-title="<?php esc_attr_e( 'Select Author Image','click'); ?>" data-button="<?php esc_attr_e( 'Select Author Image','click'); ?>"/>
                <input type="button" value="<?php esc_attr_e( 'Remove Image', 'click' ); ?>" class="button media-image-remove" />
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'click_author_short_disc' ) ); ?>"><?php esc_html_e( 'Author Short Disc:', 'click' ); ?></label>
                <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'click_author_short_disc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'click_author_short_disc' ) ); ?>"><?php echo esc_html( $click_author_short_disc ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'click_author_link' ) ); ?>"><?php esc_html_e( 'Link URL:', 'click' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'click_author_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'click_author_link' ) ); ?>" type="text" value="<?php echo esc_attr( $click_author_link ); ?>" />
            </p>
            <p>
                <input id="<?php echo esc_attr( $this->get_field_id( 'click_author_new_window' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'click_author_new_window' ) ); ?>" type="checkbox" <?php checked( 1 == $click_author_new_window ? $instance['click_author_new_window'] : 0); ?> />
                <label for="<?php echo esc_attr( $this->get_field_id( 'click_author_new_window' ) ); ?>"><?php esc_html_e( 'Open in new window', 'click' ); ?></label>
            </p>
            <hr />
            <?php
        }

        /**
         * Function to Updating widget replacing old instances with new
         *
         * @access public
         * @since 1.0
         *
         * @param array $new_instance new arrays value
         * @param array $old_instance old arrays value
         * @return array
         *
         */
        function update( $new_instance, $old_instance ) {
            $instance = $old_instance;
            $instance['click_author_title'] = ( isset( $new_instance['click_author_title'] ) ) ?  sanitize_text_field( $new_instance['click_author_title'] ): '';
            $instance['click_author_image'] = ( isset( $new_instance['click_author_image'] ) ) ?  esc_url_raw( $new_instance['click_author_image'] ): '';
            $instance['click_author_link'] = ( isset( $new_instance['click_author_link'] ) ) ?  esc_url_raw( $new_instance['click_author_link'] ): '';
            $instance['click_author_short_disc'] = ( isset( $new_instance['click_author_short_disc'] ) ) ?  wp_kses_post( $new_instance['click_author_short_disc'] ): '';
            $instance['click_author_new_window'] = isset($new_instance['click_author_new_window'])? 1 : 0;

            return $instance;
        }

        /**
         * Function to Creating widget front-end. This is where the action happens
         *
         * @access public
         * @since 1.0
         *
         * @param array $args widget setting
         * @param array $instance saved values
         * @return void
         *
         */
        function widget( $args, $instance ) {
            $instance = wp_parse_args( (array) $instance, $this->defaults);
            $click_author_title      = apply_filters( 'widget_title', $instance['click_author_title'], $instance, $this->id_base );
            $click_author_image      = esc_url( $instance['click_author_image'] );
            $click_author_link       = esc_url( $instance['click_author_link'] );
            $click_author_new_window = esc_attr( $instance['click_author_new_window'] );
            $click_author_short_disc = wp_kses_post( $instance['click_author_short_disc'] );

            echo $args['before_widget'];

            if ( !empty($click_author_title) ) {
                echo $args['before_title'] . $click_author_title . $args['after_title'];
            }
            $ad_content_image = '';
            if ( ! empty( $click_author_image ) ) {
                /*creating image and link*/
                $img_html = '<img src="' . $click_author_image . '"/>';
                $link_open = '';
                $link_close = '';
                if ( ! empty( $click_author_link ) ) {
                    $target_text = ( 1 == $click_author_new_window ) ? ' target="_blank" ' : '';
                    $link_open = '<a href="' .  $click_author_link . '" ' . $target_text . '>';
                    $link_close = '</a>';
                }
                $ad_content_image = $link_open . $img_html .  $link_close.$click_author_short_disc;
            }
            if ( !empty( $ad_content_image ) ) {
                echo '<div class="click-author-widget">';
                echo wp_kses_post( $ad_content_image );
                echo '</div>';
            }
            echo $args['after_widget'];
        }
    }
endif;

if ( ! function_exists( 'click_author_widget' ) ) :
    /**
     * Function to Register and load the widget
     *
     * @since 1.0.0
     *
     * @param null
     * @return void
     *
     */
    function click_author_widget() {
        register_widget( 'Click_author_widget' );
    }
endif;
add_action( 'widgets_init', 'click_author_widget' );