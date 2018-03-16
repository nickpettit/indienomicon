<?php
/**
 * Template Name: About
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
          <?php
      		// Start the loop.
      		while ( have_posts() ) : the_post();

            the_content();

      		// End the loop.
      		endwhile;
      		?>
        </div>
      </div>
    </section>
  </div>
</div>
<?php get_footer(); ?>
