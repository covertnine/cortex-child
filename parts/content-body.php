<?php
if ( $cortex_enable_big_header === false ) {
?>
<div class="small-header">
<?php the_post_thumbnail( 'cortex-featured',array( 'class' => 'img-responsive mar20B' ) ); ?>

<h1 class="h4"><?php the_title(); ?></h1>
<?php if (!empty($c9_post_sub_heading)) { ?><span class="riot_subheading h5 subheading light"><?php echo $c9_post_sub_heading; ?></span><?php } ?>
</div>
<?php
}
$cortex_format = get_post_format();
switch ( $cortex_format ) {
	case 'gallery' :
		include( locate_template( 'parts/post-format-gallery-body.php' ) );
	break;
	case 'quote' :
		include( locate_template( 'parts/post-format-quote-body.php' ) );
	break;
	default:
?>

<?php
		the_content();
	break;
}
?>
