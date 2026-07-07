<?php
/**7
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Click
 */
$click_customizer_all_values = click_get_theme_options();
$click_get_image_sizes_options = $click_customizer_all_values['click-blog-archive-image-size'];
$click_blog_archive_hover_image_size = $click_customizer_all_values['click-blog-archive-hover-image-size'];

$no_image ='';
if( !has_post_thumbnail() ){
	$no_image = 'acme-no-image';
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('acme-col-4 masonry-post'); ?>>
	<div class="inner-wrapper <?php echo esc_attr( $no_image ); ?>">
		<?php
		if( has_post_thumbnail() ){
			?>
			<!--post thumbnal options-->
			<div class="post-thumb tooltip" data-tooltip-content="#tooltip-content-<?php the_ID(); ?>">
				<?php
				if( is_sticky() ){
					?>
					<div class="at-sticky">
						<a href="<?php the_permalink(); ?>">
							<span class="fa fa-star-o sticky-format-icon"></span>
						</a>
					</div>
					<?php
				}
				?>
				<a href="<?php the_permalink(); ?>">
					<?php
					the_post_thumbnail( $click_get_image_sizes_options );
                    ?>
				</a>
			</div><!-- .post-thumb-->
			<?php
		}
		else{
			?>
			<div class="no-post-thumb post-thumb tooltip" data-tooltip-content="#tooltip-content-<?php the_ID(); ?>">
				<table class="no-image-table-masonry">
					<tbody>
					<tr valign="middle">
						<td>
							<?php
							the_title( sprintf( '<h2 class="caption-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
							if( !get_the_title() ){
								the_date( '', sprintf( '<h2 class="caption-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
							}
							?>
						</td>
					</tr>
					</tbody>
				</table>
				<?php
				if( is_sticky() ){
					?>
					<div class="at-sticky">
						<a href="<?php the_permalink(); ?>">
							<span class="fa fa-star-o sticky-format-icon"></span>
						</a>
					</div>
					<?php
				}
				?>
			</div><!-- .post-thumb-->
		<?php
		}
		?>
		<div class="tooltip_templates">
			<div class="at-tooltip" id="tooltip-content-<?php the_ID(); ?>">
				<?php
                the_post_thumbnail($click_blog_archive_hover_image_size );
                the_title( '<h2 class="caption-title">', '</h2>' );
                ?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-## -->