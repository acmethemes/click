<?php
/**
 * Display related posts from same category
 *
 * @since Click 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('click_related_post_below') ) :

    function click_related_post_below( $post_id ) {

        global $click_customizer_all_values;
	    $click_customizer_all_values = click_get_theme_options();
	    if( 0 == $click_customizer_all_values['click-show-related'] ){
		    return;
	    }
	    $click_cat_post_args = array(
		    'post__not_in' => array($post_id),
		    'post_type' => 'post',
		    'posts_per_page'      => 3,
		    'post_status'         => 'publish',
		    'ignore_sticky_posts' => true
	    );
	    if( 0 == $click_customizer_all_values['click-show-related'] ){
		    return;
	    }
	    $click_related_post_display_from = $click_customizer_all_values['click-related-post-display-from'];

	    if( 'tag' == $click_related_post_display_from ){

		    $tags = get_post_meta( $post_id, 'related-posts', true );
		    if ( !$tags ) {
			    $tags = wp_get_post_tags( $post_id, array('fields'=>'ids' ) );
			    $click_cat_post_args['tag__in'] = $tags;
		    }
		    else {
			    $click_cat_post_args['tag_slug__in'] = explode(',', $tags);
		    }

	    }
	    else{

		    $cats = get_post_meta( $post_id, 'related-posts', true );
		    if ( !$cats ) {
			    $cats = wp_get_post_categories( $post_id, array('fields'=>'ids' ) );
			    $click_cat_post_args['category__in'] = $cats;
		    }
		    else {
			    $click_cat_post_args['cat'] = $cats;
		    }

	    }
	    $click_featured_query = new WP_Query( $click_cat_post_args);
	    if ( $click_featured_query->have_posts() ):
		    $click_related_title = $click_customizer_all_values['click-related-title'];
		    ?>
            <div class="related-post-wrapper">
                <?php
                if( !empty( $click_related_title ) ){
	                ?>
                    <h2 class="widget-title">
		                <?php echo esc_html( $click_related_title ); ?>
                    </h2>
	                <?php
                }
                ?>
                <div class="featured-entries-col featured-related-posts">
				    <?php
				    $no_image = '';

				    while ( $click_featured_query->have_posts() ) : $click_featured_query->the_post();
					    if( !has_post_thumbnail() ){
						    $no_image = 'acme-no-image';
					    }
					    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('acme-col-3 masonry-post'); ?>>
                            <div class="inner-wrapper <?php echo esc_attr( $no_image ); ?>">
							    <?php
							    if( has_post_thumbnail() ){
								    ?>
                                    <!--post thumbnal options-->
                                    <div class="post-thumb tooltip" data-tooltip-content="#tooltip-content-<?php the_ID(); ?>">
                                        <a href="<?php the_permalink(); ?>">
										    <?php the_post_thumbnail('large')?>
                                        </a>
                                    </div><!-- .post-thumb-->
								    <?php
							    }
							    else{
								    ?>
                                    <div class="no-post-thumb tooltip" data-tooltip-content="#tooltip-content-<?php the_ID(); ?>">
                                    </div><!-- .post-thumb-->
								    <?php
							    }
							    ?>
                                <div class="tooltip_templates">
                                    <div class="at-tooltip" id="tooltip-content-<?php the_ID(); ?>">
									    <?php the_post_thumbnail('large')?>
                                    </div><!-- .entry-content -->
                                </div>
                            </div>
                        </article><!-- #post-## -->
					    <?php
				    endwhile;
				    wp_reset_postdata();
				    ?>
                </div>
                <div class="clearfix"></div>
            </div>
		    <?php
	    endif;
    }
endif;
add_action( 'click_related_posts', 'click_related_post_below', 10, 1 );