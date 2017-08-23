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
<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/uploads/2016/06/riot-fest-logo-180.png">
<link rel="shortcut icon" href="/wp-content/uploads/2016/06/riot-fest-favicon-2016.png" />
<title>Welcome Window - Riot Fest</title>
<link rel='dns-prefetch' href='//s.w.org' />
<link rel='stylesheet' id='bootstrap-css'  href='/wp-content/themes/cortex/css/bootstrap.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='/wp-content/themes/cortex/css/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='cortex-style-css'  href='/wp-content/themes/cortex/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='cortex-style-light-css'  href='/wp-content/themes/cortex/css/style-light.css' type='text/css' media='all' />
<link rel='stylesheet' id='cortex-typography-css'  href='/wp-content/uploads/cortex%20child%20theme/typography.css?ver=4.8' type='text/css' media='all' />
<link rel='stylesheet' id='cortex-child-style-css'  href='/wp-content/themes/cortex-child/style.css' type='text/css' media='all' />
<script type='text/javascript' src='/wp-includes/js/jquery/jquery.js'></script><script>jQueryWP = jQuery;</script>
<script type='text/javascript' src='/wp-includes/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='/wp-content/plugins/cortex-widgets/widgets/js/mailchimp-widget-min.js'></script>
<script type='text/javascript' src='/wp-content/plugins/wp-retina-2x/js/picturefill.min.js'></script>
<link rel='https://api.w.org/' href='/wp-json/' />
                        <script>
                            /* You can add more configuration options to webfontloader by previously defining the WebFontConfig with your options */
                            if ( typeof WebFontConfig === "undefined" ) {
                                WebFontConfig = new Object();
                            }
                            WebFontConfig['google'] = {families: ['BenchNine:300,400,700']};

                            (function() {
                                var wf = document.createElement( 'script' );
                                wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.5.3/webfont.js';
                                wf.type = 'text/javascript';
                                wf.async = 'true';
                                var s = document.getElementsByTagName( 'script' )[0];
                                s.parentNode.insertBefore( wf, s );
                            })();
                        </script>
<link rel="icon" href="/wp-content/uploads/2016/06/cropped-riot-fest-favicon-2016-150x150.png" sizes="32x32" />
<link rel="icon" href="/wp-content/uploads/2016/06/cropped-riot-fest-favicon-2016-240x240.png" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="/wp-content/uploads/2016/06/cropped-riot-fest-favicon-2016-240x240.png" />
<meta name="msapplication-TileImage" content="/wp-content/uploads/2016/06/cropped-riot-fest-favicon-2016-300x300.png" />
<script src="https://use.typekit.net/abb4aed.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script type="text/javascript" src="//static.ticketfly.com/js/tracking/tfly-tracking.js"></script>
<script type="text/javascript">//<![CDATA[ // Google Analytics - Ticketfly
var _gaq = _gaq || [];
_gaq.push(['_setAccount','UA-31624815-1']);
_gaq.push(['_trackPageview']);
_gaq.push(['ec._setAccount', 'UA-6580485-30'],['ec._setDomainName', 'none'],['ec._setAllowLinker', true],['ec._setAllowHash', false],['ec._trackPageview']);
(function() {
	 var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	 ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	 var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})(); // End of Google Analytics - Ticketfly
//]]>
</script>

</head>
<body class="page page-id-32971 page-template page-template-page_welcome-window page-template-page_welcome-window-php group-blog" id="page-top" style="background-color: #ffffff; background-image: none;">
<!--[if lt IE 8]>
    <p class="browserupgrade">
    	    </p>
<![endif]-->
<!--[if lt IE 10]>
    <script src="/wp-content/themes/cortex/js/html5shiv.js"></script>
    <script src="/wp-content/themes/cortex/js/respond.min.js"></script>
    <link rel="stylesheet" href="/wp-content/themes/cortex/css/ie.css" type="text/css" media="screen" />
<![endif]-->
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
<script type='text/javascript' src='/wp-content/themes/cortex/js/skip-link-focus-fix.js?ver=20130115'></script>
<script type='text/javascript' src='/wp-content/themes/cortex/js/bootstrap.min.js?ver=20150228'></script>
<script type='text/javascript' src='/wp-content/themes/cortex/js/skrollr.min.js?ver=20150331'></script>
<script type='text/javascript' src='/wp-content/themes/cortex/js/classie.js?ver=20150403'></script>
<script type='text/javascript' src='/wp-content/themes/cortex/js/modernizr.min.js?ver=20150608'></script>
</body>
</html>