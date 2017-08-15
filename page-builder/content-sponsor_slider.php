<?php
$cortex_customClass  = esc_html( get_sub_field( 'custom_class' ) );
$cortex_set_width    = sanitize_html_class( get_sub_field( 'width' ) );
$cortex_backgroundImage = esc_url( get_sub_field( 'background_image' ) );
$cortex_background    		= get_sub_field( 'custom_background' );
$cortex_heading = get_sub_field( 'title' );
?>
<section id="section-<?php echo $cortex_counter;
$cortex_counter++; ?>" class="simple_slider<?php if ( $cortex_customClass != '' ) { echo ' '.$cortex_customClass; } ?>">
<div class="section-bg" style="background-image: url(<?php echo $cortex_backgroundImage ?>);background-repeat:no-repeat">
	<div class="<?php if ( ! empty( $cortex_set_width ) ) { echo $cortex_set_width;
} else { echo 'container'; } ?>">
		<?php if ( $cortex_heading) {
			echo "<h2 class='sponsor-slider-title'>" . $cortex_heading . "</h2>";
			} ?>
		<?php if ( have_rows( 'slides' ) ) { ?>
		<div class="flexcarousel">
		<ul class="slides">

		<?php
		while ( have_rows( 'slides' ) ) {
			the_row();

			// vars for slides
			$post_object = get_sub_field( 'Sponsor' );
			// print_r($post_object);
			// $cortex_image     = $post_object->
			// $cortex_content    = get_sub_field( 'content' );
			// $cortex_link     = get_sub_field( 'link' );
			// $cortex_external_link = get_sub_field( 'external_link' );

	?>

			<li class="slide img_slide_container">
				<div class="slide-img">
					<img src="<?php echo esc_url( get_the_post_thumbnail_url($post_object->ID) ); ?>" alt="<?php echo esc_html( $cortex_image['alt'] ); ?>" style="height: auto; width: auto;" />
				</div><!--end slide-img-->

				<?php if ( ! empty( $cortex_content ) ) { ?>
				<div class="flexslider-slide-content">
					<div class="flex-content-container entry-content">
			    	<?php echo $cortex_content; ?>
					</div>
				</div>
			    <?php } ?>

			</li>

		<?php } //endwhile; ?>

		</ul>
		</div><!--end flexslider-->

	<?php } //endif; ?>

		<?php edit_post_link( __( 'Edit', 'cortex' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
</section><!-- #section-## -->
<?php unset( $cortex_customClass, $cortex_set_width, $cortex_image, $cortex_content, $cortex_link, $cortex_external_link ); ?>
