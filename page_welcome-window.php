<?php
/**
 * Template Name: Welcome Window
 *
 * @package cortex
 */
?>
<!DOCTYPE html>
<html class="no-js" lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="/xmlrpc.php">
<title>Welcome Window - Chicago Gateway Green</title>
</head>
<body class="page page-id-32971 page-template page-template-page_welcome-window page-template-page_welcome-window-php group-blog" id="page-top" style="background-color: #ffffff; background-image: none;">
<div id="page" class="hfeed site bright logo-left">
	<div id="skrollr-body">
		<div id="content" class="site-content">

<?php
while ( have_posts() ) {
	the_post();

?>
	<div id="primary" class="content-area page-content">
		<main id="main" class="site-main" role="main">

			<section id="section-single" class="content-single">

				<div class="container">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="row">

							<div class="col-xs-12 col-md-12">

								<div class="entry-content mar20T">
									<?php the_content(); ?>
									<?php
										wp_link_pages( array(
											'before' => '<div class="page-links">' . __( 'Pages:', 'cortex' ),
											'after'  => '</div>',
										) );
									?>
								</div><!-- .entry-content -->

								<footer class="entry-footer">
									<?php cortex_entry_footer(); ?>
								</footer><!-- .entry-footer -->

								<?php the_post_navigation(); ?>
								<?php
									// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
									endif;
								?>

							</div><!-- .col-md-12-->
						</div><!-- end row-->
					</article><!-- #post-## -->
				</div><!--.container -->
			</section><!--end setion-->

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
} //endwhile;  end of the loop.
?>
</body>
</html>