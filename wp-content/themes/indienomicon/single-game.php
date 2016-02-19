<?php

get_header();

// gather all of the game images
$game_media = array(
  $screenshot_1 = get_field('screenshot_1'),
  $screenshot_2 = get_field('screenshot_2'),
  $screenshot_3 = get_field('screenshot_3')
);

$banner_image = get_field('banner_image');
$game_logo = get_field('game_logo');

// gather the studio relationship
$studios = get_field('studio');

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
      <?php if ($banner_image): // If there's a game banner, set it as the background. ?>
        <section class="banner" style="background-image:
                                              radial-gradient(ellipse, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.3) 80%, rgba(0,0,0,0.8) 100%),
                                              url('<?php echo $banner_image['url']; ?>')">
      <?php else: // Otherwise, if there's no game banner, just make it a nice color. ?>
        <section class="banner" style="background-color: rgb(24, 154, 153);">
      <?php endif; ?>
        </section>
      </div>


      <!-- NOTE: This parallax__layer div is closed in the footer template -->
      <div class="parallax__layer parallax__layer--base">

        <section class="basic-info">
          <h2><?php the_field('project_title'); ?></h2>
          <?php if ($studios): ?>
            	<?php foreach( $studios as $studio ): ?>
                  <a href="<?php echo get_permalink( $studio->ID ); ?>" class="studio-name"><?php the_field('studio_name', $studio->ID); ?></a>
            	<?php endforeach; ?>
          <?php endif; ?>
        </section>

        <?php if (current_user_can('edit_post', get_the_ID())): ?>
          <div class="row content-block">
            <div class="small-4 columns">
              <a href="<?php echo get_edit_post_link(); ?>" class="button">Edit this Game</a>
            </div>
            <div class="small-8 columns">
              <p>You're able to edit this game! That usually means you're the person that created it. To see this page <em>without</em> this button, view the page while logged out.</p>
            </div>
          </div>
        <?php endif; ?>

        <section class="row full-info content-block">

          <div class="small-12 medium-9 columns">

            <?php if (   $game_media[0]
                      || $game_media[1]
                      || $game_media[2]
                      || get_field('video_link')
                      ): ?>
              <ul class="screenshot-slider">

                <?php if (get_field('video_link')): ?>
                  <?php
                      // extract the YouTube ID from the full URL
                      $url = get_field('video_link');
                      preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                      $id = $matches[1];
                  ?>
                  <li class="fitvid"><iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $id; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></li>
                <?php endif; ?>

                <?php foreach ($game_media as $image): ?>
                  <?php if ($image): ?>
                    <li>
                      <a href="<?php echo $image['url']; ?>" target="new"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" /></a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>

              </ul>
              <div class="arrows"></div>
            <?php endif; ?>




            <?php if (get_field('short_game_description') || get_field('long_game_description')): ?>
              <div class="description">
                <h3>Synopsis</h3>
                <?php if (get_field('long_game_description')): ?>
                  <?php the_field('long_game_description'); ?>
                <?php elseif (get_field('short_game_description')): ?>
                  <?php the_field('short_game_description'); ?>
                <?php endif; ?>
              </div>
            <?php endif; ?>

          </div>


          <div class="small-12 medium-3 columns sidebar">

            <?php if ($game_logo): ?>
              <img src="<?php echo $game_logo['url']; ?>" alt="<?php the_field('project_title'); ?>" class="logo" />
            <?php endif; ?>

            <?php if ($studios): ?>
              	<?php foreach( $studios as $studio ): ?>
                    <p>
                      <strong>Studio:</strong><br>
                      <a href="<?php echo get_permalink( $studio->ID ); ?>"><?php the_field('studio_name', $studio->ID); ?></a>
                    </p>
              	<?php endforeach; ?>
            <?php endif; ?>

            <?php if (get_field('genre')): ?>
              <?php $term = get_field('genre'); ?>
          		<p><strong>Genre:</strong><br><?php echo $term->name; ?></p>
            <?php endif; ?>

            <?php if (get_field('platforms')): ?>
              <strong>Platforms:</strong>
              <?php $terms = get_field('platforms'); ?>
              <ul>
              	<?php foreach( $terms as $term ): ?>
              		<li><?php echo $term->name; ?></li>
              	<?php endforeach; ?>
            	</ul>
            <?php endif; ?>

            <?php if (get_field('development_status')): ?>
              <p><strong>Development Status:</strong><br> <?php the_field('development_status'); ?></p>
            <?php endif; ?>

            <?php if (get_field('expected_completion')): ?>
              <?php $expected_completion = DateTime::createFromFormat('Ymd', get_field('expected_completion')); ?>
              <p><strong>Expected Completion:</strong><br> <?php echo $expected_completion->format('M Y'); ?></p>
            <?php endif; ?>

            <?php if (get_field('game_website')
                      || get_field('playable_demo_link')
                      || get_field('kickstarter_link')
                      || get_field('indiegogo_link')
                      || get_field('steam_greenlight_link')
                      || get_field('facebook_link')
                      || get_field('twitter_link')
                      || get_field('youtube_link')
                      || get_field('twitch_link')
                      ): ?>
              <strong>Links:</strong>
              <ul class="links">

                <?php if ($game_website = get_field('game_website')): ?>
                	<li><a href="<?php echo $game_website['url'] ?>" class="website" target="new">Game Website</a></li>
                <?php endif; ?>

                <?php if ($playable_demo_link = get_field('playable_demo_link')): ?>
                	<li><a href="<?php echo $playable_demo_link['url'] ?>" class="demo" target="new">Playable Demo</a></li>
                <?php endif; ?>

                <?php if ($kickstarter_link = get_field('kickstarter_link')): ?>
                	<li><a href="<?php echo $kickstarter_link['url'] ?>" class="kickstarter" target="new">Kickstarter</a></li>
                <?php endif; ?>

                <?php if ($indiegogo_link = get_field('indiegogo_link')): ?>
                	<li><a href="<?php echo $indiegogo_link['url'] ?>" class="indiegogo" target="new">Indiegogo</a></li>
                <?php endif; ?>

                <?php if ($steam_greenlight_link = get_field('steam_greenlight_link')): ?>
                	<li><a href="<?php echo $steam_greenlight_link['url'] ?>" class="steam" target="new">Steam Greenlight</a></li>
                <?php endif; ?>

                <?php if ($facebook_link = get_field('facebook_link')): ?>
                	<li><a href="<?php echo $facebook_link['url'] ?>" class="facebook" target="new">Facebook</a></li>
                <?php endif; ?>

                <?php if ($twitter_link = get_field('twitter_link')): ?>
                	<li><a href="<?php echo $twitter_link['url'] ?>" class="twitter" target="new">Twitter</a></li>
                <?php endif; ?>

                <?php if ($youtube_link = get_field('youtube_link')): ?>
                	<li><a href="<?php echo $youtube_link['url'] ?>" class="youtube" target="new">YouTube</a></li>
                <?php endif; ?>

                <?php if ($twitch_link = get_field('twitch_link')): ?>
                	<li><a href="<?php echo $twitch_link['url'] ?>" class="twitch" target="new">Twitch</a></li>
                <?php endif; ?>

            	</ul>
            <?php endif; ?>

          </div>


        </section>





<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
