<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Acme Themes
 * @subpackage Click
 */
get_header();
global $click_customizer_all_values;
?>
    <div id="primary" class="content-area">
		<main id="main" class="site-main singlepage" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single' );
				
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="nav-title prev" aria-hidden="true">' . esc_html__( 'Previous Post', 'click' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'click' ) . '</span> ' .
						'<br /><h4>%title</h4>',
					'prev_text' => '<span class="nav-title next" aria-hidden="true">' . esc_html__( 'Next Post', 'click' ) . '</span> ' .
						'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'click' ) . '</span> ' .
						'<br/> <h4>%title</h4>',
				) );
				/**
				 * click_related_posts hook
				 * @since click 1.0.0
				 *
				 * @hooked click_related_posts_belo -  10
				 */
				do_action( 'click_related_posts' ,get_the_ID() );
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar( 'left' );
get_sidebar();
get_footer();