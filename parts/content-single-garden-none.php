<?php
$cortex_featured_header     = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id() ), 'cortex-featured-header' );
$cortex_sidebar      	    = get_field( 'sidebar' );
$cortex_customBackground    = get_field( 'custom_background' );
$cortex_backgroundColor     = get_field( 'background_color' );
$cortex_backgroundImage     = esc_url( get_field( 'background_image' ) );
$cortex_backgroundPattern   = esc_url( get_field( 'background_pattern' ) );
$cortex_backgroundRepeat    = get_field( 'background_pattern_repeat' );
$cortex_enable_big_header 	= get_field( 'c9_enable_big_header' );
$cortex_garden_gallery 		= get_field( 'garden_gallery' );

/*check to see if the background color or background images are set and add in any css to a $cortex_style variable*/
if ( $cortex_customBackground != 'none' ) {

	$cortex_style    = 'style="';

	if ( $cortex_backgroundColor != '' ) {
		$cortex_style  .= "background-color: $cortex_backgroundColor; ";
	}
	if ( $cortex_backgroundImage != '' ) {
		$cortex_style  .= "background-image: url($cortex_backgroundImage); background-size: cover; background-repeat: no-repeat;";
	}
	if ( $cortex_backgroundPattern != '' ) {
		$cortex_style  .= "background-image: url($cortex_backgroundPattern); background-repeat: $cortex_backgroundRepeat;";
	}
	$cortex_style   .= '"';
}
?>
<section id="section-single" class="content-single" <?php if ( ! empty( $cortex_style ) ) { echo ' '.$cortex_style; } ?>>

	<?php include( locate_template( 'parts/content-single-garden-header.php' ) ); ?>

	<div class="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
			<?php if ( get_the_content() ) { ?>
			<div class="row">

				<div class="col-xs-12 col-md-12">

					<div class="entry-content">
						<h3 class="center">About the Garden</h3>
						<?php the_content(); ?>
				</div><!-- .col-md-12-->
			</div><!-- end row-->
			</div>
			<?php } ?>
			<?php	if ( $cortex_sponsor[0]->post_excerpt ) { ?>
			<div class="row mar60T">

				<div class="col-xs-12 col-sm-8 col-sm-offset-2">

					<div class="entry-content">
						<h3 class="center">About the Sponsor</h3>
						<p>
						<?php echo $cortex_sponsor[0]->post_excerpt; ?>
						</p>
				</div><!-- .col-md-12-->
			</div><!-- end row-->
			<?php } ?>
			<?php if ( $cortex_garden_gallery ) { ?>
		<div class="row">
		<div class="col-xs-12">
		<div class="entry-content-gallery-grid masonry mar20T">
					<div class="grid-tiles isotope">
						<div class="gutter-sizer <?php echo $cortex_columns; ?>"></div>
						<?php
							foreach ( $cortex_garden_gallery as $cortex_image ) :  ?>
								<div class="tile isotope-item <?php echo $cortex_columns; ?>">
									<figure class="img_container">
									<a href="<?php echo esc_url($cortex_image['url']); ?>" class="entry-link" title="<?php echo esc_html($cortex_image['caption']); ?>">
									<img src="<?php echo esc_url($cortex_image['sizes']['large']); ?>" alt="<?php echo esc_html($cortex_image['alt']); ?>"  data-no-retina /></a>
									</figure>
								</div>
								<?php endforeach;
			?>
					</div>
					</div>
				</div><!--end entry-content-gallery-grid-->
		</div>
		<?php } ?>


					</div><!-- .entry-content -->

					<?php if ( get_the_tag_list() ) { // check to see if there are tags ?>
					<div class="entry-tags wow fadeIn animated">
						<div class="entry-meta">
							<?php the_tags( '<div class="tags-links">', '', '</div>' ); ?>
						</div>
					</div>
					<?php } ?>

					<?php include( locate_template( 'inc/single-social.php' ) );?>

		</article><!-- #post-## -->
	</div><!--.container -->
</section><!--end section-->
