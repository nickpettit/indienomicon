<?php
/**
 * Template Name: Home
 */

the_post();
get_header(); ?>

	<section class="hero">
		<div class="row collapse">
			<div class="small-12 columns">
				<div class="row">
					<div class="small-12 medium-5 columns">
						<div class="content-block-padded">
							<div class="next-event">
								<?php the_content(); ?>
								<p class="event-loc"><a href="https://www.google.com/maps/place/Melrose+Center+(Inside+of+Orlando+Public+Library)/@28.542464,-81.377149,17z/data=!3m1!4b1!4m2!3m1!1s0x88e77afc378b4f97:0x88eb726c5efaecd4" title="View on Google Maps" target="new"><strong>The Melrose Center <br>at the Downtown Library</strong><br>101 E Central Blvd, Orlando, FL 32801</a></p>
								<a href="https://www.facebook.com/events/1402429833382749/" class="button">Tell us you're coming!</a>
							</div>
						</div>
					</div>
					<div class="small-12 medium-7 columns">
						<p class="site-headline">Celebrating the culture and creativity of the independent games created in Central Florida.</p>
						<ul class="social">
							<li class="facebook"><a href="http://www.facebook.com/indienomicon" target="new">Facebook</a></li>
							<li class="twitter"><a href="http://www.twitter.com/indienomicon" target="new">Twitter</a></li>
							<li class="youtube"><a href="https://www.youtube.com/user/IndieNomicon" target="new">YouTube</a></li>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</section>


	<section id="game-index" class="row">
		<div class="small-12 columns">
			<h2>Featured Games</h2>
			<div>
				<p>Indienomicon events feature games created by indie developers local to the Central Florida area. Here are this month's games!</p>
			</div>

      <?php

        // Create a WordPress query to gather all of the games.
        $args = array(
        	'post_type' => 'game',
					'category_name' => 'featured',
        	'posts_per_page' => -1, // Unlimited posts
        	'orderby' => 'project_title', // Order alphabetically by title
        );
        $games = new WP_Query( $args );

        // Render all of the games returned by the query.
        if( $games->have_posts() ):
          while ( $games->have_posts() ) : $games->the_post();
            get_template_part( 'game-listing' );
          endwhile;
        endif;

        // Restore global post data stomped by the_post().
        wp_reset_query();

      ?>

		</div>
	</section>

<?php get_footer(); ?>
