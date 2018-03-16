<?php

get_header();

// gather all of the studio images
$studio_images = array(
  $studio_image_1 = get_field('studio_image_1'),
  $studio_image_2 = get_field('studio_image_2'),
  $studio_image_3 = get_field('studio_image_3')
);

$studio_banner = get_field('studio_banner');
$studio_logo = get_field('studio_logo');

// gather the studio's games
$games = get_posts(array(
	'post_type' => 'game',
	'meta_query' => array(
		array(
			'key' => 'studio', // name of custom field
			'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
			'compare' => 'LIKE'
		)
	)
));

?>

<?php while ( have_posts() ) : the_post(); ?>
<script>
  jQuery(document).ready(function(){
    jQuery('.screenshot-slider').slick({
      autoplay: false,
      dots: true,
      arrows: true,
      appendArrows: jQuery('.arrows')
    });

    jQuery(".fitvid").fitVids();

  });
</script>

  <div class="parallax">


    <!-- NOTE: This parallax__group div is closed in the footer template -->
    <div class="parallax__group">

      <div class="parallax__layer parallax__layer--deep">
      <?php if ($studio_banner): // If there's a studio banner, set it as the background. ?>
        <section class="banner" style="background-image:
                                              radial-gradient(ellipse, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.3) 80%, rgba(0,0,0,0.8) 100%),
                                              url('<?php echo $studio_banner['url']; ?>')">
      <?php else: // Otherwise, if there's no studio banner, just make it a nice color. ?>
        <section class="banner" style="background-color: rgb(24, 154, 153);">
      <?php endif; ?>
        </section>
      </div>


      <!-- NOTE: This parallax__layer div is closed in the footer template -->
      <div class="parallax__layer parallax__layer--base">

        <section class="basic-info">
          <h2><?php the_field('studio_name'); ?></h2>
        </section>

        <?php if (current_user_can('edit_post', get_the_ID())): ?>
          <div class="grid-container">
            <div class="callout primary cta">
              <div class="grid-container">
                <div class="grid-x grid-margin-x">
                  <div class="small-12 medium-4 cell">
                    <a href="<?php echo get_edit_post_link(); ?>" class="button">Edit this Studio</a>
                  </div>
                  <div class="small-12 medium-8 cell">
                    <p>You're able to edit this studio! That usually means you're the person that created it. To see this page <em>without</em> this button, view the page while logged out.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif; ?>


        <section class="grid-container">
          <div class="grid-x grid-margin-x">
            <div class="small-12 cell">
              <div class="full-info">
                <div class="grid-container">
                  <div class="grid-x grid-margin-x">

                    <div class="small-12 medium-9 cell">

                      <?php if (   $studio_images[0]
                                || $studio_images[1]
                                || $studio_images[2]
                                || get_field('studio_showreel')
                                ): ?>
                        <ul class="screenshot-slider">

                          <?php if (get_field('studio_showreel')): ?>
                            <?php
                                // extract the YouTube ID from the full URL
                                $url = get_field('studio_showreel');
                                preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                $id = $matches[1];
                            ?>
                            <li class="fitvid"><iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $id; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></li>
                          <?php endif; ?>

                          <?php foreach ($studio_images as $image): ?>
                            <?php if ($image): ?>
                              <li>
                                <a href="<?php echo $image['url']; ?>" target="new"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" /></a>
                              </li>
                            <?php endif; ?>
                          <?php endforeach; ?>

                        </ul>
                        <div class="arrows"></div>
                      <?php endif; ?>

                      <?php if (get_field('studio_description')): ?>
                        <div class="studio-description">
                          <h3>About</h3>
                          <p><?php the_field('studio_description'); ?></p>
                        </div>
                      <?php endif; ?>

          						<?php if( $games ): ?>
                        <div class="studio-games">
                          <h3>Games</h3>

            							<?php foreach( $games as $game ): ?>
            								<?php $game_logo = get_field('game_logo', $game->ID); ?>
            									<a href="<?php echo get_permalink( $game->ID ); ?>">
            										<img src="<?php echo $game_logo['url']; ?>" alt="<?php get_field('project_title', $game->ID);?>" />
            										<p><?php echo get_the_title( $game->ID ); ?></p>
            									</a>
            							<?php endforeach; ?>

                        </div>
          						<?php endif; ?>

                    </div>


                    <div class="small-12 medium-3 cell sidebar">

                      <?php if ($studio_logo): ?>

                        <?php if (get_field('gdc')): ?>
                          <div class="studio-logo-container">
                            <img src="<?php echo $studio_logo['url']; ?>" alt="<?php the_field('studio_name'); ?>" class="logo" />
                            <span class="gdc-banner">At GDC 2016</span>
                          </div>
                        <?php else: ?>
                          <div class="studio-logo-container">
                            <img src="<?php echo $studio_logo['url']; ?>" alt="<?php the_field('studio_name'); ?>" class="logo" />
                          </div>
                        <?php endif; ?>



                      <?php endif; ?>

                      <?php if (   get_field('studio_website')
                                || get_field('studio_facebook_link')
                                || get_field('studio_twitter_link')
                                || get_field('studio_youtube_link')
                                || get_field('studio_twitch_link')
                                || get_field('studio_linkedin_link')
                                || get_field('studio_instagram_link')
                                || get_field('studio_contact_email')
                                ): ?>
                        <strong>Links:</strong>
                        <ul class="links">

                          <?php if ($studio_website = get_field('studio_website')): ?>
                          	<li><a href="<?php echo $studio_website['url'] ?>" class="website" target="new">Studio Website</a></li>
                          <?php endif; ?>

                          <?php if ($studio_contact_email = get_field('studio_contact_email')): ?>
                          	<li><a href="mailto:<?php echo $studio_contact_email ?>" class="email">Studio Email</a></li>
                          <?php endif; ?>

                          <?php if ($studio_facebook_link = get_field('studio_facebook_link')): ?>
                          	<li><a href="<?php echo $studio_facebook_link['url'] ?>" class="facebook" target="new">Facebook</a></li>
                          <?php endif; ?>

                          <?php if ($studio_twitter_link = get_field('studio_twitter_link')): ?>
                          	<li><a href="<?php echo $studio_twitter_link['url'] ?>" class="twitter" target="new">Twitter</a></li>
                          <?php endif; ?>

                          <?php if ($studio_youtube_link = get_field('studio_youtube_link')): ?>
                          	<li><a href="<?php echo $studio_youtube_link['url'] ?>" class="youtube" target="new">YouTube</a></li>
                          <?php endif; ?>

                          <?php if ($studio_twitch_link = get_field('studio_twitch_link')): ?>
                          	<li><a href="<?php echo $studio_twitch_link['url'] ?>" class="twitch" target="new">Twitch</a></li>
                          <?php endif; ?>

                          <?php if ($studio_linkedin_link = get_field('studio_linkedin_link')): ?>
                          	<li><a href="<?php echo $studio_linkedin_link['url'] ?>" class="linkedin" target="new">LinkedIn</a></li>
                          <?php endif; ?>

                          <?php if ($studio_instagram_link = get_field('studio_instagram_link')): ?>
                          	<li><a href="<?php echo $studio_instagram_link['url'] ?>" class="instagram" target="new">Instagram</a></li>
                          <?php endif; ?>

                      	</ul>
                      <?php endif; ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
