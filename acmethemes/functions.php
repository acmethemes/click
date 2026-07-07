<?php
/**
 * Callback functions for comments
 *
 * @since Click 1.0.0
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 */
if ( !function_exists('click_commment_list') ) :

    function click_commment_list($comment, $args, $depth) {
        if ('div' == $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        }
        else {
            $tag = 'li';
            $add_below = 'div-comment';
        }
        ?>
        <<?php echo esc_html( $tag ); ?>
        <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ('div' != $args['style']) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
        <?php endif; ?>
        <div class="comment-author vcard">
            <?php
            if ($args['avatar_size'] != 0) echo get_avatar($comment, '64');
            printf(__('<cite class="fn">%s</cite>', 'click' ), get_comment_author_link());
            ?>
        </div>
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation">
                <?php esc_html_e('Your comment is awaiting moderation.', 'click'); ?>
            </em>
            <br/>
        <?php endif; ?>
        <div class="comment-meta commentmetadata">
            <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                <i class="fa fa-clock-o"></i>
                <?php
                /* translators: 1: date, 2: time */
                printf(__('%1$s at %2$s', 'click'), get_comment_date(), get_comment_time()); ?>
            </a>
            <?php edit_comment_link(__('(Edit)', 'click'), '  ', ''); ?>
        </div>
        <?php comment_text(); ?>
        <div class="reply">
            <?php comment_reply_link( array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        </div>
        <?php if ('div' != $args['style']) : ?>
            </div>
        <?php endif;
    }
endif;

/**
 * Select sidebar according to the options saved
 *
 * @since Click 1.0.0
 *
 * @param null
 * @return string
 *
 */
if ( !function_exists('click_sidebar_selection') ) :
	function click_sidebar_selection( ) {
		wp_reset_postdata();
		$click_customizer_all_values = click_get_theme_options();
		global $post;
		if(
			isset( $click_customizer_all_values['click-sidebar-layout'] ) &&
			(
				'left-sidebar' == $click_customizer_all_values['click-sidebar-layout'] ||
				'both-sidebar' == $click_customizer_all_values['click-sidebar-layout'] ||
				'no-sidebar' == $click_customizer_all_values['click-sidebar-layout']
			)
		){
			$click_body_global_class = $click_customizer_all_values['click-sidebar-layout'];
		}
		else{
			$click_body_global_class= 'right-sidebar';
		}

		if( is_front_page() ){
			if( isset( $click_customizer_all_values['click-front-page-sidebar-layout'] ) ){
				if(
					'right-sidebar' == $click_customizer_all_values['click-front-page-sidebar-layout'] ||
					'left-sidebar' == $click_customizer_all_values['click-front-page-sidebar-layout'] ||
					'both-sidebar' == $click_customizer_all_values['click-front-page-sidebar-layout'] ||
					'no-sidebar' == $click_customizer_all_values['click-front-page-sidebar-layout']
				){
					$click_body_classes = $click_customizer_all_values['click-front-page-sidebar-layout'];
				}
				else{
					$click_body_classes = $click_body_global_class;
				}
			}
			else{
				$click_body_classes= $click_body_global_class;
			}
		}
        elseif (is_singular() && isset( $post->ID )) {
			$post_class = get_post_meta( $post->ID, 'click_sidebar_layout', true );
			if ( 'default-sidebar' != $post_class ){
				if ( $post_class ) {
					$click_body_classes = $post_class;
				} else {
					$click_body_classes = $click_body_global_class;
				}
			}
			else{
				$click_body_classes = $click_body_global_class;
			}

		}
        elseif ( is_archive() ) {
			if( isset( $click_customizer_all_values['click-archive-sidebar-layout'] ) ){
				$click_archive_sidebar_layout = $click_customizer_all_values['click-archive-sidebar-layout'];
				if(
					'right-sidebar' == $click_archive_sidebar_layout ||
					'left-sidebar' == $click_archive_sidebar_layout ||
					'both-sidebar' == $click_archive_sidebar_layout ||
					'no-sidebar' == $click_archive_sidebar_layout
				){
					$click_body_classes = $click_archive_sidebar_layout;
				}
				else{
					$click_body_classes = $click_body_global_class;
				}
			}
			else{
				$click_body_classes= $click_body_global_class;
			}
		}
		else {
			$click_body_classes = $click_body_global_class;
		}
		return $click_body_classes;
	}
endif;

/**
 * Return content of fixed lenth
 *
 * @since Click 1.0.0
 *
 * @param string $click_content
 * @param int $length
 * @return string
 *
 */
if ( ! function_exists( 'click_words_count' ) ) :
    function click_words_count( $click_content = null, $length = 16 ) {

        $length = absint( $length );
        $source_content = preg_replace( '`\[[^\]]*\]`', '', $click_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;
    }
endif;

/**
 * BreadCrumb Settings
 */
/**
 * BreadCrumb Settings
 */
if( ! function_exists( 'click_breadcrumbs' ) ):
	function click_breadcrumbs() {
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require_once click_file_directory('acmethemes/library/breadcrumbs/breadcrumbs.php');
		}
		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
            'show_on_front'   => false
		);
		echo "<div class='breadcrumbs '><div id='click-breadcrumbs'>";
		breadcrumb_trail( $breadcrumb_args );
		echo "</div></div>";
	}
endif;