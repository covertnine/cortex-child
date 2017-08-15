<?php
$cortex_background    				= get_sub_field( 'custom_background' );
$cortex_backgroundColor     		= get_sub_field( 'background_color' );
$cortex_backgroundImage     		= esc_url( get_sub_field( 'background_image' ) );
$cortex_limit       				= get_sub_field( 'limit_by_category' );
$cortex_category       				= get_sub_field( 'garden_category' );
$cortex_orderBy      				= get_sub_field( 'order_by' );
$cortex_backgroundPattern    		= esc_url( get_sub_field( 'background_pattern' ) );
$cortex_backgroundRepeat    		= get_sub_field( 'background_pattern_repeat' );
$cortex_backgroundParallax    		= get_sub_field( 'background_image_parallax' );
$cortex_gardens_title      			= get_sub_field( 'title' );
$cortex_gardens_container_width  	= sanitize_html_class( get_sub_field( 'width' ) );
$cortex_columns      				= sanitize_html_class( get_sub_field( 'columns' ) );
$cortex_customClass					= get_sub_field( 'custom_class' );
?>
<section id="section-<?php echo $cortex_counter; ?>" class="garden-listing section-bg masonry_garden<?php if ( $cortex_customClass != '' ) { echo ' '.sanitize_html_class( $cortex_customClass ); } ?>">
	<div class="section-bg" <?php if ( $cortex_backgroundParallax == 'yes' ) { echo "data-bottom-top=\"background-position: 0px 0px;\" data-top-bottom=\"background-position: 0% -200%;\" data-anchor-target=\"#section-$cortex_counter\""; } cortex_section_style($cortex_background, $cortex_backgroundColor, $cortex_backgroundImage, $cortex_backgroundPattern, $cortex_backgroundRepeat); ?>>
		<div class="<?php if ( ! empty( $cortex_gardens_container_width ) ) { echo $cortex_gardens_container_width;
} else { echo 'container'; } ?>">
			<?php if ( ( ! empty( $cortex_gardens_title )) || ( ! empty( $cortex_gardens_sub_title )) ) { ?>
			<div class="<?php if ( $cortex_gardens_container_width == 'container-fluid' ) { echo 'container';
} else { echo 'gardens_container';} ?>">
				<span class="h1 center mar20B">
				<?php echo $cortex_gardens_title; ?>
				</span>
				<span class="center garden_masonry_description subtitle mar30B"><?php echo $cortex_gardens_sub_title; ?></span>
				</div>
			<?php
}

// WP_Query arguments
if ( $cortex_limit == false ) { // query all portfolios
	$args = array(
		'post_type'              => 'garden',
		'post_status'    => 'publish',
		'order'                  => 'ASC',
		'orderby'                => $cortex_orderBy,
	);
} else { // a specific category is needed

	$args = array(
		'post_type'              => 'garden',
		'post_status'    => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'gardens-category',
				'terms'		=> $cortex_category,
			),
		),
		'order'                  => 'ASC',
		'orderby'                => $cortex_orderBy,
	);
}

// The Query
$cortex_query = new WP_Query( $args );

if ( $cortex_query->have_posts() ) { ?>
			<div class="masonry_gardens">
	         	<div class="garden-listing grid-tiles isotope c9-garden-caption">

				<?php
				while ( $cortex_query->have_posts() ) {
					$cortex_query->the_post();
					$cortex_image   = get_the_post_thumbnail( get_the_id(), 'large' );
					$cortex_heading  = get_field( 'garden_name' );
					$cortex_sub_heading = get_field( 'garden_sub_heading' );

			?>
						<article id="post-<?php the_ID(); ?>" class="tile isotope-item <?php if ( ! empty( $cortex_columns ) ) { echo $cortex_columns;
} else { echo 'cm50'; } ?>">
								<?php if ( ! empty( $cortex_image ) ) { ?>
								<figure class="img_garden">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php echo $cortex_image; ?>
									</a>
									<figcaption>

												<?php if ( ! empty( $cortex_sub_heading ) ) { ?>
												<span class="masonry_garden_sub_heading"><?php echo $cortex_sub_heading; ?></span>
												<?php } ?>

												<?php if ( ! empty( $cortex_heading ) ) { ?>
												<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><span class="masonry_garden_heading"><?php echo $cortex_heading; ?></span></a></h3>
												<?php } ?>
												<?php if ( ( $cortex_columns == 'cm50' ) || ( $cortex_columns == 'cm100' ) ) { ?>
												<div class="garden-description"><?php the_excerpt();?></div>
												<?php } ?>
												<?php edit_post_link( __( 'Edit', 'cortex' ), '<span class="edit-link">', '</span>' ); ?>

									</figcaption>
								</figure>
								<?php } else { ?>
								<figure class="img_container">
									<img src="http://placehold.it/720x480" alt="" />
								</figure>
								<?php } ?>

							</article><!-- #post-## -->
			<?php
				} //endwhile

				wp_reset_postdata();
?>
						</div><!-- .garden-listing -->
			</div><!--end masonry_gardens-->
						<?php } else { ?>

				      	<div class="garden-listing grid-tiles">
							<?php esc_html_e( 'No gardens were found.', 'cortex' ); ?>
						</div>

						<?php } //endif ?>

		</div><!-- #container -->
	</div><!--end section-bg-->
</section>
<?php $cortex_counter++;
unset( $cortex_backgroundImage, $cortex_backgroundColor, $cortex_backgroundPattern, $cortex_style, $cortex_customClass ); // reset variables that are used on other page builder layouts ?>
