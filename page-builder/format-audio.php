<?php
/**
 * @package cortex
 */
$c9_post_sub_heading = get_field( 'c9_post_sub_heading' );
$c9_enable_excerpt   = get_field( 'c9_enable_excerpt' ); 

// get iframe HTML
$cortex_iframe = get_field( 'audio_link' );

// display above or below
$cortex_display = get_field( 'display' );

// add extra attributes to iframe html
$attributes = '';

$cortex_iframe = str_replace( '></iframe>', ' ' . $attributes . '></iframe>', $cortex_iframe );

?>
<div class="article-container wow animated fadeInUp">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-xs-12">
			<?php if ( ( $cortex_iframe !== '' ) && ( $cortex_display == 'above') ) { ?>
			<div class="wow animated fadeInUp">
				<div class="audio-container">
					<div class="audio-embed-container"><?php echo $cortex_iframe; ?></div>
				</div>
			</div>
			<?php } ?>
			<figure class="entry-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'cortex-featured-wide', array( 'class' => 'img-responsive' ) ); ?></a>
			</figure>
			<?php if ( ( $cortex_iframe !== '' ) && ( $cortex_display == 'below') ) { ?>
			<div class="audio">
				<div class="audio-container">
					<div class="audio-embed-container"><?php echo $cortex_iframe; ?></div>
				</div>
			</div>
			<?php } ?>

		</div>
		<?php } ?>
		<div class="col-xs-12">
			<header class="entry-header">
				<span class="h5 alternate"><?php cortex_posted_on(); ?></span>
				<h5 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
				<?php if (!empty($c9_post_sub_heading)) { ?><span class="riot_subheading h5 subheading light"><?php echo $c9_post_sub_heading; ?></span><?php } ?>
				<div class="entry-meta">
					<?php cortex_author(); ?> / <?php cortex_post_categories(); ?> <?php cortex_post_tags(); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php 
				if ( $c9_enable_excerpt === false ) {
					echo cortex_the_excerpt( 'Read more', 0, 0 ); 
				} else {
					echo cortex_the_excerpt( 'Read more', 45, 1 ); 
				}
				?>
				<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'cortex' ),
					'after'  => '</div>',
				) );
?>
			</div><!-- .entry-content -->
		</div><!-- .col-md-7-->

		<footer class="entry-footer">
			<?php cortex_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- end row-->
</article><!-- #post-## -->
</div><!--end article container-->