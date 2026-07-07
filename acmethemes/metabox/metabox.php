<?php
/**
 * Click sidebar layout options
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('click_sidebar_layout_options') ) :
    function click_sidebar_layout_options() {
        $click_sidebar_layout_options = array(
            'default-sidebar' => array(
                'value'     => 'default-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/default-sidebar.jpg'
            ),
            'left-sidebar' => array(
                'value'     => 'left-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/left-sidebar.jpg'
            ),
            'right-sidebar' => array(
                'value' => 'right-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/right-sidebar.jpg'
            ),
            'no-sidebar' => array(
                'value'     => 'no-sidebar',
                'thumbnail' => get_template_directory_uri() . '/acmethemes/images/no-sidebar.jpg'
            )
        );
        return apply_filters( 'click_sidebar_layout_options', $click_sidebar_layout_options );
    }
endif;

/**
 * Custom Metabox
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'click_add_metabox' )):
    function click_add_metabox() {
        add_meta_box(
            'click_sidebar_layout', // $id
            __( 'Sidebar Layout', 'click' ), // $title
            'click_sidebar_layout_callback', // $callback
            'post', // $page
            'normal', // $context
            'high'
        ); // $priority

        add_meta_box(
            'click_sidebar_layout', // $id
            __( 'Sidebar Layout', 'click' ), // $title
            'click_sidebar_layout_callback', // $callback
            'page', // $page
            'normal', // $context
            'high'
        ); // $priority
    }
endif;
add_action('add_meta_boxes', 'click_add_metabox');

/**
 * Callback function for metabox
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('click_sidebar_layout_callback') ) :
    function click_sidebar_layout_callback(){
        global $post;
        $click_sidebar_layout_options = click_sidebar_layout_options();
        $click_sidebar_layout = 'default-sidebar';
        $click_sidebar_meta_layout = get_post_meta( $post->ID, 'click_sidebar_layout', true );
        if( !click_is_null_or_empty($click_sidebar_meta_layout) ){
            $click_sidebar_layout = $click_sidebar_meta_layout;
        }
        wp_nonce_field( basename( __FILE__ ), 'click_sidebar_layout_nonce' );
        ?>
        <table class="form-table page-meta-box">
            <tr>
                <td colspan="4"><h4><?php _e( 'Choose Sidebar Template', 'click' ); ?></h4></td>
            </tr>
            <tr>
                <td>
                    <?php
                    foreach ($click_sidebar_layout_options as $field) {
                        ?>
                        <div class="hide-radio radio-image-wrapper">
                            <input id="<?php echo esc_attr( $field['value'] ); ?>" type="radio" name="click_sidebar_layout" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( $field['value'], $click_sidebar_layout ); ?>/>
                            <label class="description" for="<?php echo esc_attr( $field['value'] ); ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" />
                            </label>
                        </div>
                    <?php
                    } // end foreach
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td><em class="f13"><?php _e( 'You can set up the sidebar content', 'click' ); ?> <a href="<?php echo admin_url('/widgets.php'); ?>"><?php _e( 'here', 'click' ); ?></a></em></td>
            </tr>
        </table>
    <?php
}
endif;

/**
 * save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('click_save_sidebar_layout') ) :
    function click_save_sidebar_layout( $post_id ) {

        // Verify the nonce before proceeding.
        if ( !isset( $_POST[ 'click_sidebar_layout_nonce' ] ) || !wp_verify_nonce( $_POST[ 'click_sidebar_layout_nonce' ], basename( __FILE__ ) ) )
            return;

        // Stop WP from clearing custom fields on autosave
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE)
            return;

        if ('page' == $_POST['post_type']) {
            if (!current_user_can( 'edit_page', $post_id ) )
                return $post_id;
        } elseif (!current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }

        //Execute this saving function
        if(isset($_POST['click_sidebar_layout'])){
            $old = get_post_meta( $post_id, 'click_sidebar_layout', true);
            $new = sanitize_text_field($_POST['click_sidebar_layout']);
            if ($new && $new != $old) {
                update_post_meta($post_id, 'click_sidebar_layout', $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id,'click_sidebar_layout', $old);
            }
        }
    }
endif;
add_action('save_post', 'click_save_sidebar_layout');

function click_is_edit_page() {
	//make sure we are on the backend
	if ( !is_admin() ){
		return false;
	}
	global $pagenow;
	return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}
/**
 * Enqueue admin scripts and styles.
 */
function click_metabox_scripts(  ) {
	if ( click_is_edit_page() ) {
		wp_enqueue_style( 'click-metabox', get_template_directory_uri() . '/css/metabox.css', array(), '1.0.0' );
	}
}
add_action( 'admin_enqueue_scripts', 'click_metabox_scripts' );