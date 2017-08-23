<?php
/**
 * @package cortex
 */
$cortex_person		  = get_field( 'person' );
$cortex_quote_text	  = get_field( 'quote_text' );
$cortex_quote_source = get_field( 'quote_source' );
$cortex_quote_link	  = esc_url( get_field( 'quote_link' ) );
$c9_post_sub_heading = get_field( 'c9_post_sub_heading' );
$c9_enable_excerpt   = get_field( 'c9_enable_excerpt' ); 

?>
<div class="article-container wow animated fadeInUp">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">

		<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-xs-12">
			<figure class="entry-image dark-overlay">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'cortex-featured-wide', array( 'class' => 'img-responsive' ) ); ?></a><span class="h6 quote-source"><strong><?php echo $cortex_person; ?></strong></span>
			</figure>
		</div>
		<?php } ?>



		<div class="col-xs-12">
			<header class="entry-header">
				<h5 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
			</header><!-- .entry-header -->

			<div class="entry-content">

				<blockquote><?php echo $cortex_quote_text; ?><span class="quote-source"><strong><?php echo $cortex_person; ?></strong></span></blockquote>
				<?php if ( $cortex_quote_source != '' ) { ?>

					<?php if ( $cortex_quote_link == '' ) { ?>
						<small><?php echo $cortex_quote_source; ?></small>
					<?php } else { ?>
						<a href="<?php echo $cortex_quote_link; ?>" target="_blank" title="<?php the_title_attribute(); ?>" class="quote_link"><span class="small-link"><?php echo $cortex_quote_source; ?></span></a>
					<?php } ?>

				<?php } ?>
			</div><!-- .entry-content -->
		</div><!-- .col-md-4-->

	</div><!-- end row-->
</article><!-- #post-## -->
</div><!--end article container-->