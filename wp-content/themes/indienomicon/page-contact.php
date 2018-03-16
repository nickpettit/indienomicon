<?php
/**
 * Template Name: Contact
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
              <div class="small-12 large-4 cell">
                <h3>General Questions</h3>
                <p>Just have some <em>general questions</em> about Indienomicon? Want to give us feedback or have a cool idea? Let us know!</p>
                <a class="button" href="mailto:hello@indienomicon.com">Say Hello</a>
              </div>
              <div class="small-12 large-4 cell">
                <h3>Presenting</h3>
                <?php if ( is_user_logged_in() ): ?>
                  <p>Interested in <em>presenting</em> your game at an Indienomicon event? Submit your game and we'll get in touch with you!</p>
                  <a href="<?php echo admin_url( 'post-new.php?post_type=game' ); ?>" class="button">Submit a Game</a>
                <?php else: ?>
                  <p>Interested in <em>presenting</em> at one of our events? Register your Indienomicon account and then come back to this page!</p>
                  <a href="<?php echo wp_registration_url(); ?>" class="button">Register</a>
                <?php endif; ?>
              </div>
              <div class="small-12 large-4 cell">
                <h3>Press</h3>
                <p>Want to <em>publicize</em> our story? Check out our <a href="/press/">press page</a> or contact Christa Rensel to request additional resources.</p>
                <a class="button" href="mailto:christa@indienomicon.com">Email Christa</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
