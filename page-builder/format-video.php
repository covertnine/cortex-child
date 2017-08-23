<?php
/**
 * @package cortex
 */
$c9_post_sub_heading = get_field( 'c9_post_sub_heading' );
$c9_enable_excerpt   = get_field( 'c9_enable_excerpt' ); 

// get iframe HTML
$cortex_iframe = get_field( 'video_link' );

if ( $cortex_iframe !== '' ) {
	// use preg_match to find iframe src
	preg_match( '/src="(.+?)"/', $cortex_iframe, $matches );
	$src = $matches[1];


	// add extra params to iframe src
	$params = array(
		'controls'     => 1,
		'hd'           => 1,
		'autohide'     => 1,
		'showinfo'    => 0,
		'iv_load_policy'  => 3,
		'modestbranding'  => 1,
		'rel'     => 0,
		'byline'    => 0,
		'portrait'    => 0,
		'title'     => 0,
	);

	$new_src = add_query_arg( $params, $src );

	$cortex_iframe = str_replace( $src, $new_src, $cortex_iframe );
	$cortex_iframe = str_replace( 'frameborder="0"', '', $cortex_iframe );

	// check for SSL and appropriately re-embed the iframe with the proper source being http or https
	if ( ( ! empty( $_SERVER['HTTPS'] ) ) && ( $_SERVER['HTTPS'] != 'off' ) ) {

		// ssl connection
		$cortex_iframe = str_replace( 'http:', 'https:', $cortex_iframe );

	} else {

		// non-ssl connection
		$cortex_iframe = str_replace( 'https:', 'http:', $cortex_iframe );

	}
}
?>
<div class="article-container wow animated fadeInUp">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php if ( $cortex_iframe !== '' ) { ?>
		<div class="col-xs-12">
			<figure class="entry-image">
				<div class="embed-container"><?php echo $cortex_iframe; ?></div>
			</figure>
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
		</div><!-- .col-md-4-->

		<footer class="entry-footer">
			<?php cortex_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div><!-- end row-->
</article><!-- #post-## -->
</div><!--end article container-->
