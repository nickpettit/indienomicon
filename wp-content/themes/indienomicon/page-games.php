<?php get_header(); ?>

<section id="game-index" class="row">
  <div class="small-12 columns">
    <h2><?php the_title(); ?></h2>
    <div class="row">
      <div class="small-12 columns">
        <?php

          // Display basic page content
          the_post();
          the_content();

    		?>
      </div>
    </div>


    <div class="content-block-padded">
      <div class="row game-submission">
        <?php if ( is_user_logged_in() ): ?>
          <div class="small-12 medium-4 columns">
            <a href="<?php echo admin_url( 'post-new.php?post_type=game' ); ?>" class="button">Submit a Game</a>
          </div>
          <div class="small-12 medium-8 columns">
            <p>Interested in presenting at an Indienomicon event? Submit your game!</p>
          </div>
        <?php else: ?>
          <div class="small-12 medium-4 columns">
            <a href="<?php echo wp_registration_url(); ?>" class="button">Register</a>
          </div>
          <div class="small-12 medium-8 columns">
            <p>Interested in presenting your game at an Indienomicon event? Register your Indienomicon account and then come back to this page to submit your game!</p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <div class="item-index">
      <?php

        // Create a WordPress query to gather all of the games.
        $args = array(
        	'post_type' => 'game',
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
</section>

<?php get_footer(); ?>
