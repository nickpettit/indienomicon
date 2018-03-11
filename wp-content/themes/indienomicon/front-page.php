<?php
/**
 * Template Name: Home
 */

the_post();
get_header(); ?>

	<section class="hero">
		<div class="grid-container">
			<div class="grid-x grid-margin-x">
				<div class="small-12 small-order-2 medium-order-1 medium-6 large-5 cell">
					<div class="card  next-event">
						<h2 class="event-title">Our Next Event</h2>
						<div class="card-section">
							<?php the_content(); ?>
							<a href="https://www.facebook.com/events/1703997619622455/" class="button">Tell us you're coming!</a>
						</div>
					</div>
				</div>
				<div class="small-12 small-order-1 medium-order-2 medium-6 large-7 cell site-headline">
					<p>Celebrating the culture and creativity of the independent games created in Central Florida.</p>
					<ul class="social">
						<li class="facebook"><a href="http://www.facebook.com/indienomicon" target="new">Facebook</a></li>
						<li class="twitter"><a href="http://www.twitter.com/indienomicon" target="new">Twitter</a></li>
						<li class="instagram"><a href="https://www.instagram.com/indienomicon" target="new">instagram</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>


	<section id="game-index" class="grid-container">
		<div class="grid-x grid-margin-x">

			<div class="small-12 medium-8 large-6 cell">
				<h2>Featured Games</h2>
				<p>Indienomicon events feature games created by indie developers local to the Central Florida area. Here are this month's games!</p>
			</div>

			<div class="small-12 cell">
				<div class="card-index large">
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
			</div>

		</div>
	</section>

<?php get_footer(); ?>
