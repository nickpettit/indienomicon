<?php
/**
 * Template Name: Staff
 */

get_header(); ?>

<div class="row">
  <h2 class="small-12 columns"><?php echo get_the_title(); ?></h2>
</div>

<section class="row">
  <div class="small-12 medium-2 push-10 columns sidebar-large">
    <?php wp_nav_menu( array( 'theme_location' => 'about-sidebar-navigation',
                              'container'      => 'div',
                              'items_wrap'     => '<ul id="%1$s" class="%2$s content-block">%3$s</ul>') ); ?>
  </div>

  <div class="small-12 medium-10 pull-2 columns">
    <div class="content-block-padded">
    <h3>Leadership Board</h3><br>
      <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4 staff">
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/david.jpg" alt="David Sushil" />
          <h4>David Sushil</h4>
          <p>Event Organizer</p>
          <a class="button" target="new" href="https://www.linkedin.com/in/davidjsushil">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/kunal.jpg" alt="Kunal Patel" />
          <h4>Kunal Patel</h4>
          <p>Event Organizer</p>
          <a class="button" target="new" href="https://www.linkedin.com/in/kunalpatel">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/james.jpg" alt="James Morgan" />
          <h4>James Morgan</h4>
          <p>Event Organizer</p>
          <a class="button" target="new" href="https://www.linkedin.com/in/the3rdm">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/steve.jpg" alt="Steve Emberton" />
          <h4>Steve Emberton</h4>
          <p>Event Organizer</p>
          <a class="button" target="new" href="https://www.linkedin.com/in/steveembr">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/tony.jpg" alt="Anothony Bagsby" />
          <h4>Anthony Bagsby</h4>
          <p>Event Organizer</p>
          <a class="button" target="new" href="https://www.linkedin.com/pub/anthony-bagsby/2/16/367">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/jack.jpg" alt="Jack Henkel" />
          <h4>Jack Henkel</h4>
          <p>Event Organizer</p>
          <a class="button" target="new" href="https://www.linkedin.com/in/jackhenkel">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/christa.jpg" alt="Christa Rensel" />
          <h4>Christa Rensel</h4>
          <p>Director of Marketing</p>
          <a class="button" target="new" href="https://www.linkedin.com/in/christamr">Connect</a>
        </li>
      </ul>
    </div>
  </div>
</section>

<?php get_footer(); ?>
