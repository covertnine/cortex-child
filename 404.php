<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package cortex
 */

get_header();
global $cortex_options;
$cortex_theme_options = $cortex_options;
$cortex_navigation_type      = sanitize_html_class( $cortex_theme_options['c9-navigation-type'] );
?>

	<div id="primary" class="content-area page-home page-search page-404<?php echo ' '.$cortex_navigation_type; ?>">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<header class="entry-header entry-header-page mar30B blog-latest-header">
					<div class="entry-header-standard-wrapper center">
						<div class="entry-header-standard">
							<div class="entry-header-standard-inner" data-130-top="opacity: 1" data-top-bottom="opacity: 0" data-anchor-target=".entry-header-standard-inner .container">
								<div class="container">
									<h1 class="entry-title blog_latest_title center oops-riotfest-broke-it"><?php esc_html_e( 'You done lost yourself on the internet.', 'cortex' ); ?></h1>
								</div><!--end container-->
							</div><!--end entry-header-standard-inner-->
						</div><!--end entry-header-standard-->
					</div><!--entry-header-standard-wrapper-->
				</header><!-- .entry-header -->

				<div class="container">


						<div class="page-content">
							<div class="article-container">
							<p><?php _e( 'Try to help yourself out and search, or maybe, ask your mom for help?', 'cortex' ); ?></p>
							<div class="search-form-404 mar50B">
								<?php get_search_form(); ?>
							</div>
							</div>
						</div><!-- .page-content -->
				</div><!--end container-->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar( 'footer-top' ); ?>
<?php get_footer(); ?>
