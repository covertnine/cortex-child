<?php
/**
 * Single Author Information on posts
 *
 * @package Cortex
 **/
global $cortex_options;
$cortex_options = $cortex_theme_options;

if ( $cortex_theme_options['c9-author-info'] == true ) {
?>
<div class="clearfix"></div>
<div class="article-container mar30T">
<div class="author-about wow animated fadeInUp">
	<div class="hidden-xs col-sm-4 col-md-2" id="author-bio">

		<div class="avatar">

			<?php
			// retrieve our additional author meta info, and if it isn't set, use the gravatar image
			$c9_user_meta_image = esc_attr( get_the_author_meta( 'c9_user_meta_image', $post->post_author ) );

		    // make sure the field is set
		    if ( isset( $c9_user_meta_image ) && $c9_user_meta_image ) {

		        // only display if function exists
		        if ( function_exists( 'get_additional_user_meta_thumb' ) ) ?>

 				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
		            <img alt="author avatar-210 photo" src="<?php echo get_additional_user_meta_thumb(); ?>" />
 				</a>

			<?php } else { ?>

			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'email' ), '210' ); ?>
			</a>

			<?php } ?>

		</div><!-- .avatar -->

	</div>
	<div class="col-xs-12 col-sm-8 col-md-10">


		<div class="author-info" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person">
			<span class="vcard author">
				<span class="fn">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" rel="author" itemprop="url" class="h5 accent-color-text">
						<span itemprop="name"><?php the_author_meta( 'display_name' ); ?></span>
					</a>
				</span>
			</span>
			<p itemprop="description" class="author-description">
				<?php the_author_meta( 'description' ); ?>
			</p>
		</div><!-- .info -->

		<div class="author-social">
			<ul class="author-social">
				<?php if ( get_the_author_meta( 'user_url' ) != '' ) { ?>
					<li>
						<a class="user-url third-color-text" href="<?php echo esc_url( get_the_author_meta( 'user_url' ), null ); ?>">
							<?php printf( esc_attr__( 'Website', 'cortex' ), get_the_author() ); ?>
						</a>
					</li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'c9twitter' ) != '' ) { ?>
					<li>
						<a class="twitter-link third-color-text" href="<?php echo esc_url( get_the_author_meta( 'c9twitter' ), null ); ?>">
							<?php printf( esc_attr__( 'Twitter', 'cortex' ), get_the_author() ); ?>
						</a>
					</li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'c9facebook' ) != '' ) { ?>
					<li>
						<a class="facebook-link third-color-text" href="<?php echo esc_url( get_the_author_meta( 'c9facebook' ), null ); ?>">
							<?php printf( esc_attr__( 'Facebook', 'cortex' ), get_the_author() ); ?>
						</a>
					</li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'c9google' ) != '' ) { ?>
					<li>
						<a class="google-link third-color-text" href="<?php echo esc_url( get_the_author_meta( 'c9google' ), null ); ?>?rel=author">
							<?php printf( esc_attr__( 'Google+', 'cortex' ), get_the_author() ); ?>
						</a>
					</li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'c9pinterest' ) != '' ) { ?>
					<li>
						<a class="pinterest-link third-color-text" href="<?php echo esc_url( get_the_author_meta( 'c9pinterest' ), null ); ?>">
							<?php printf( esc_attr__( 'Pinterest', 'cortex' ), get_the_author() ); ?>
						</a>
					 </li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'c9linkedin' ) != '' ) { ?>
					<li>
						<a class="linkedin-link third-color-text" href="<?php echo esc_url( get_the_author_meta( 'c9linkedin' ), null ); ?>">
							<?php printf( esc_attr__( 'LinkedIn', 'cortex' ), get_the_author() ); ?>
						</a>
					 </li>
				<?php } ?>

				<?php if ( get_the_author_meta( 'c9instagram' ) != '' ) { ?>
					<li>
						<a class="instagram-link third-color-text" href="<?php echo esc_url( get_the_author_meta( 'c9instagram' ), null ); ?>">
							<?php printf( esc_attr__( 'Instagram', 'cortex' ), get_the_author() ); ?>
						</a>
					 </li>
				<?php } ?>
			</ul><!-- .author-social -->

		</div>

	</div>
</div>
	<div class="clearfix"></div>
</div>
<?php
} //end checking theme setting
?>
