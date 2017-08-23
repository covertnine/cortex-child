<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>

<?php if (have_posts()):?>
	<div class="related-posts magazine_latest">
		<div class="article-container">
			<h3 class="h3">HEAD DOWN THE RELATED RABBIT HOLE</h3>
			<div class="magazine_latest_content">
				<div class="row">
				<?php while (have_posts()) : the_post(); ?>
					<div class="col-xs-12 col-sm-4">
						<article class="magazine-article">
							<?php if (has_post_thumbnail()):?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'cortex-featured-audio', array( 'class' => 'img-responsive mar10B' ) ); ?></a>
							<?php endif; ?>
							<header class="entry-header">
								<div class="magazine-article-header">
									<h5 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
								</div><!--end magazine-article-header-->
							</header><!-- .entry-header -->
						</article>
					</div><!--end single article-->
				<?php endwhile; ?>
				</div><!--end row-->
			</div><!--end magazine_latest_content-->
		</div><!--end article container-->
	</div><!--end related posts-->
<?php else: ?>
<?php endif; ?>
