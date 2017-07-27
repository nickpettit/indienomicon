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
    <h3>Board of Directors</h3><br>
      <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4 staff">
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/kunal.jpg" alt="Kunal Patel" />
          <h4>Kunal Patel</h4>
          <a class="button" target="new" href="https://www.linkedin.com/in/kunalpatel">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/chad_hoover.jpg" alt="Chad Hoover" />
          <h4>Chad Hoover</h4>
          <a class="button" target="new" href="https://www.linkedin.com/in/chadmhoover">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/necole_pynn.jpg" alt="Necole Pynn" />
          <h4>Necole Pynn</h4>
          <a class="button" target="new" href="https://www.linkedin.com/in/necolepynn">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/bobby_torrez.jpg" alt="Bobby Torrez" />
          <h4>Bobby Torrez</h4>
          <a class="button" target="new" href="https://www.linkedin.com/in/rrtorres">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/kyle_morrand.jpg" alt="Kyle Morrand" />
          <h4>Kyle Morrand</h4>
          <a class="button" target="new" href="https://www.linkedin.com/in/kylemorrand">Connect</a>
        </li>
        <li>
          <img src="<?php bloginfo('template_directory'); ?>/images/staff/jack_henkel.jpg" alt="Jack Henkel" />
          <h4>Jack Henkel</h4>
          <a class="button" target="new" href="https://www.linkedin.com/in/jackhenkel">Connect</a>
        </li>
      </ul>

    <h3>Advisors</h3><br>
    <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4 staff">
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/anthony_bagsby.jpg" alt="Tony Bagsby" />
        <h4>Tony Bagsby</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/anthony-bagsby-3670162">Connect</a>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/nick_pettit.jpg" alt="Nick Pettit" />
        <h4>Nick Pettit</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/nickrp">Connect</a>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/david_sushill.jpg" alt="David Sushil" />
        <h4>David Sushil</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/davidjsushil">Connect</a>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/corey_cochran.jpg" alt="Corey Cochran" />
        <h4>Corey Cochran</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/coreycochran">Connect</a>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/brian_luft.jpg" alt="Brian Luft" />
        <h4>Brian Luft</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/brian-luft-41712130">Connect</a>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/carl_dungca.jpg" alt="Carl Dungca" />
        <h4>Carl Dungca</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/carldungca">Connect</a>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/christa_roethlisberger.jpg" alt="Christa Rensel" />
        <h4>Christa Rensel</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/christamr">Connect</a>
      </li>
      <li>
        <img src="<?php bloginfo('template_directory'); ?>/images/staff/rob_coble.jpg" alt="Rob Coble" />
        <h4>Rob Coble</h4>
        <a class="button" target="new" href="https://www.linkedin.com/in/robcoble">Connect</a>
      </li>
    </ul>

    </div>
  </div>
</section>

<?php get_footer(); ?>
