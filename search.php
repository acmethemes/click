<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Acme Themes
 * @subpackage Click
 */

get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'click' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->
			<?php
			/**
			 * click_action_masonry_start hook
			 * @since Click 1.0.0
			 *
			 * @hooked click_masonry_start -  0
			 */
			do_action( 'click_action_masonry_start' );
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			/**
			 * click_action_masonry_end hook
			 * @since Click 1.0.0
			 *
			 * @hooked click_masonry_end -  0
			 */
			do_action( 'click_action_masonry_end' );

			/**
			 * click_action_navigation hook
			 * @since Click 1.0.0
			 *
			 * @hooked: click_posts_navigation - 10
			 *
			 */
			do_action( 'click_action_navigation' );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php
get_sidebar( 'left' );
get_sidebar();
get_footer();