<?php
/**
 * The template for displaying all single posts.
 *
 * @package cortex
 */

get_header();

global $cortex_options;
$cortex_theme_options = $cortex_options;
?>
	<div id="primary" class="content-area post-content<?php echo ' '.$GLOBALS['cortex_navigation_type']; ?>">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) {
			the_post();

			include( locate_template( 'parts/content-single-garden-none.php' ) );
			wp_reset_query();

			break;

		} // end of the loop.
?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar( 'footer-top' ); ?>
<?php get_footer(); ?>
