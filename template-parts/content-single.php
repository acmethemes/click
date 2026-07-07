<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Click
 */
$no_image ='';
global $click_customizer_all_values;
$click_single_image_layout = $click_customizer_all_values['click-single-image-size'];

if( !has_post_thumbnail() ){
	$no_image = 'acme-no-image';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($no_image); ?>>
	<!--post thumbnal options-->
	<?php
	if( has_post_thumbnail() ){
		?>
		<div class="single-feat clearfix">
			<figure class="single-thumb single-thumb-full">
				<?php
				the_post_thumbnail( $click_single_image_layout );
				?>
			</figure>
		</div><!-- .single-feat-->
	<?php
	}
	?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<hr class="entry-title-break">
	</header><!-- .entry-header -->
	<div class="entry-meta">
		<?php click_posted_on(); ?>
	</div><!-- .entry-meta -->

	<div class="clearfix"></div>
	<div class="entry-content">
		<?php
        the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'click' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->