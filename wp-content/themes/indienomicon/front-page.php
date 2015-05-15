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
