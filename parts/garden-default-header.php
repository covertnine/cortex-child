<?php
$cortex_subheading      = get_field( 'subheading' );
$cortex_heading   	    = get_field( 'heading' );
$cortex_sponsor 		= get_field( 'sponsor' );
?>
	<header class="entry-header entry-header-default<?php if ( ! empty($cortex_enable_overlay) ) { echo $cortex_enable_overlay; } ?>">
		<?php if ( has_post_thumbnail() ) { ?>
		<figure class="entry-image" <?php if ( ! empty( $cortex_featured_header ) ) { echo 'style="background: url('.esc_url( $cortex_featured_header[0] ).') center fixed no-repeat; background-size: cover;"'; } ?>></figure>
		<?php } ?>
		<div class="entry-header-standard-wrapper">
			<div class="entry-header-standard">
				<div class="entry-header-standard-inner" data-100-top="opacity: 1" data--75-top="opacity: 0" data-anchor-target=".entry-header-standard-inner .container">
					<div class="container">
						<h1 class="entry-title<?php if ( ! empty( $cortex_color_switch ) ) { echo $cortex_color_switch;} ?>">
							<?php the_title(); ?>
						</h1>

						<?php if ( ! empty($cortex_subheading) ) { ?>
						<h2 class="subheading h3 ultra-light mar30B<?php if ( ! empty( $cortex_color_switch ) ) { echo $cortex_color_switch;} ?>"><?php echo $cortex_subheading; ?></h2>
						<?php } ?>

						<?php
							if ( ! empty( $cortex_sponsor )) { ?>
						<h2 class="h5 subheading sponsor-title">Sponsored by <?php echo $cortex_sponsor[0]->post_title ?></h2>
							<?php }
?>
					</div><!--end container-->
				</div><!--end entry-header-standard-inner-->
			</div><!--end entry-header-standard-->
		</div><!--entry-header-standard-wrapper-->
	</header><!-- .entry-header -->