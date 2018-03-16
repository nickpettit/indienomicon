<?php
/**
 * Template Name: Press
 */

get_header(); ?>

<section class="grid-container">
  <div class="grid-x grid-margin-x">
    <div class="small-12 cell">
      <h2><?php the_title(); ?></h2>
      <div class="grid-x grid-margin-x">
        <div class="small-12 medium-2 medium-order-2 cell sidebar-large">
          <?php wp_nav_menu( array( 'theme_location' => 'about-sidebar-navigation',
                                    'container'      => 'div',
                                    'items_wrap'     => '<ul id="%1$s" class="%2$s content-block">%3$s</ul>') ); ?>
        </div>
        <div class="small-12 medium-10 medium-order-1 cell card page-card">
          <div class="grid-container">
            <div class="grid-x grid-margin-x">
              <div class="small-12 medium-8 cell">
                <?php
            		// Start the loop.
            		while ( have_posts() ) : the_post();

                  the_content();

            		// End the loop.
            		endwhile;
            		?>
              </div>
              <div class="small-12 medium-4 cell sidebar">
                <h3>Share our Story</h3>
                <p>Want to share the Indienomicon story? We would be honored! Download our press kit and <a href="mailto:christa@indienomicon.com">email Christa Rensel</a> for any additional resources you might need.</p>
                <a class="button" href="https://www.dropbox.com/sh/ukyjrz9qixzprsw/HIxomQURGC">Download Press Kit</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
