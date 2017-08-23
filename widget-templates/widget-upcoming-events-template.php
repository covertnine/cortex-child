<div class="magazine-recent-posts">
		<div class="widget-single-article-container">
							<div class="bg-container-sm">

	        <?php while ( $cortex_upcoming_events->have_posts() ) : $cortex_upcoming_events->the_post();
		    //custom field renaming for use
		    $u_start				 = get_field( 'date_and_time', false, false );
			$u_date_setup      		 = new DateTime( $u_start );
			$u_date					 = $u_date_setup->format('F j, Y');
			$event_headline			 = get_field('event_headline');
			$location_name			 = get_field('location_name');
			$location_city_country	 = get_field('location_city_country');
			$location_address		 = get_field('location_address');
			$location_map_link		 = get_field('location_map_link');
			$event_ticket_link		 = get_field('event_ticket_link');
			$rsvp_link				 = get_field('rsvp_link');
			$share_buttons			 = get_field('share_buttons');
			 $opener_1				 = get_field('opener_1');
			 $opener_2				 = get_field('opener_2');
			 $opener_3				 = get_field('opener_3');
			 $opener_4				 = get_field('opener_4');
			 $opener_5				 = get_field('opener_5');
	        ?>
			<article class="single-article mar20B clearfix">
				<header class="single-article-title">
					<h5 class="entry-title mar0B"><a href="<?php the_permalink(); ?>" title="<?php echo $event_headline; ?>"><span class="mar0T"><?php echo $event_headline; ?></span></a></h5>
					<span class="h6 alternate"><?php echo $u_date; ?></span>
					<div class="venue">
						<?php if ( !empty($location_map_link) ) { ?>
						<a href="<?php echo $location_map_link; ?>" target="_blank" class="mar0T">
						<?php } ?>
						<?php if ( !empty($location_name) ) { ?><span class="secondary-font h6 mar0T"><?php echo $location_name; ?></span><?php } ?>
						<?php if ( !empty($location_map_link) ) { ?></a><?php } ?>
					</div>
				</header>
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-xs-12">
						<div class="event-tickets-small">
							<?php if ( !empty($event_ticket_link) ) { ?><a class="btn btn-xs btn-default" href="<?php echo $event_ticket_link; ?>" target="_blank"><?php _e('Tickets', 'cortex'); ?></a><?php } ?>
						</div>
					</div><!--end of col-->
				</div><!--end of row-->
			</article>
	        <?php endwhile; ?>
	        				</div><!--end bg-container-sm-->

		</div>
</div><!--end magazine-recent-posts-->
