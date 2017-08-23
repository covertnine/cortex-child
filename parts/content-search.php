<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package cortex
 */
 $c9_post_sub_heading = get_field( 'c9_post_sub_heading' );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		
		<?php if ( has_post_thumbnail() ) { ?>
		<div class="col-xs-12">
			<figure class="entry-image">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'cortex-featured-wide',array( 'class' => 'img-responsive' ) ); ?></a>
			</figure>
		</div>
		<?php } ?>
		
		<div class="col-xs-12">

			<header class="entry-header">
				<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h4>' ); ?>
				<?php if (!empty($c9_post_sub_heading)) { ?><span class="riot_subheading h5 subheading light"><?php echo $c9_post_sub_heading; ?></span><?php } ?>
				<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php cortex_posted_on(); ?> / <?php cortex_author(); ?> / <?php cortex_post_categories(); ?> <?php cortex_post_tags(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
		
			<div class="entry-summary">
				<?php echo cortex_the_excerpt( 'Read more', 45, 1 ); ?>
			</div><!-- .entry-summary -->
		
			<footer class="entry-footer hide">
				<?php cortex_entry_footer(); ?>
			</footer><!-- .entry-footer -->

		</div><!--end col-->
	</div><!--end row-->
</article><!-- #post-## -->
