<?php get_header(); ?>

<section id="studio-index" class="grid-container">
  <div class="grid-x grid-margin-x">
    <div class="small-12 cell">
      <h2><?php the_title(); ?></h2>
      <div class="grid-x grid-margin-x">
        <div class="small-12 large-7 cell">
          <?php

            // Display basic page content
            the_post();
            the_content();

      		?>
        </div>
        <div class="small-12 large-5 cell">

          <div class="callout primary cta">
            <div class="grid-x grid-margin-x">
                <div class="small-12 medium-4 large-12 cell">
                  <?php if ( is_user_logged_in() ): ?>
                    <a href="<?php echo admin_url( 'post-new.php?post_type=studio' ); ?>" class="button">Submit a Studio</a>
                  <?php else: ?>
                    <a href="<?php echo wp_registration_url(); ?>" class="button">Register</a>
                  <?php endif; ?>
                </div>
                <div class="small-12 medium-8 large-12 cell">
                  <?php if ( is_user_logged_in() ): ?>
                    <p>Interested in presenting at an Indienomicon event? Submit your studio!</p>
                  <?php else: ?>
                    <p>Interested in presenting at an Indienomicon event? Register your Indienomicon account and then come back to this page to submit your studio!</p>
                  <?php endif; ?>
                </div>
            </div>
          </div>

        </div>
      </div>

      <div class="card-index align-center-middle">
        <?php

          // Create a WordPress query to gather all of the games.
          $args = array(
          	'post_type' => 'studio',
          	'posts_per_page' => -1, // Unlimited posts
            'order' => 'ASC',
          	'orderby' => 'title' // Order alphabetically by title
          );
          $studios = new WP_Query( $args );

          // Render all of the games returned by the query.
          if( $studios->have_posts() ):
            while ( $studios->have_posts() ) : $studios->the_post();
              get_template_part( 'studio-listing' );
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
